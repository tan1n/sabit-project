<?php

namespace App\Http\Controllers;

use App\Diagnostic;
use App\Doctor;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

class DiagnosticController extends Controller
{
    public function loginShow()
    {
        return view('auth.diagnostic_login');
    }

    public function login(Request $request)
    {
        $doctor=Diagnostic::where(['email'=>$request->email])->get()->first();
        $result=Auth::guard('diagnostic')->attempt(['email'=>$request->email,'password'=>$request->password]);
        if($result){
            Auth::guard('diagnostic')->login($doctor);
            return redirect('diagnostic/dashboard');
        }else{
            dd('Doctor email or passwor invalid');
        }
    }

    public function dashboard()
    {
        return view('diagnostic_dashboarad');
    }

    public function createReport()
    {
        return view('diagnostic_add_report');
    }


    public function storeReport(Request $request)
    {
        $user=User::where(['phone'=>$request->phone])->get()->first();
        $path = $request->file('report')->store('reports');
        Test::create([
            'user_id'=>$user->id,
            'diagnostic_id'=>Auth::guard('diagnostic')->user()->id,
            'report_path'=>$path,
        ]);

        return back();
    }

    public function reports()
    {
        $reports=Test::where('diagnostic_id',Auth::guard('diagnostic')->user()->id)->paginate(10);
        return view('diagnostic_reports',['reports'=>$reports]);
    }


}
