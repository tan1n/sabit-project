<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;

use App\Review;
use App\Test;

class UserController extends Controller
{

    public function appointment(Request $request)
    {
        $doctor=Doctor::findOrFail($request->doctor_id);
        $user_date=Carbon::createFromDate($request->app_date);
        $current=$doctor->appointments()
                ->whereMonth('appointed_at',$user_date)
                ->whereDate('appointed_at',$user_date)
                ->get()
                ->count();
        $max_patient=$doctor->shift->max_patient;
        if($current<$max_patient){
            $start=$user_date->copy()->set('hour',$doctor->shift->start)->set('minute',00);
            $end=$user_date->copy()->set('hour',$doctor->shift->end)->set('minute',00);
            $time_for_each=$end->diffInMinutes($start)/$max_patient;
            $slot=$time_for_each*$current;
            $appointed_at=$start->addMinutes($slot)->floorMinutes(15)->toDateTimeString();
            session(['app_details'=>[
                'doctor_id'=>$doctor->id,
                'appointed_at'=>$appointed_at,
            ]]);
            return view('book',['doctor'=>$doctor,'appointed_at'=>$appointed_at]);
        }else{
            dd('No slots available');
        }
    }

    public function book(Request $request)
    {
        return view('book');
    }

    public function checkout(Request $request)
    {
        $session=session('app_details');
        $doctor=Doctor::find($session['doctor_id']);
        if(Auth::check()){
            $user=Auth::user();
        }else{
            $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'phone'=>$request->phone
            ]);
            Auth::login($user);
        }
        Appointment::create([
            'user_id'=>$user->id,
            'doctor_id'=>$doctor['id'],
            'paid'=>1,
            'appointed_at'=>$session['appointed_at'],
            'payment_id'=>1
        ]);
        session()->forget('app_details');
        return view('success',['appointed_at'=>$session['appointed_at'],'doctor'=>$doctor]);

    }


    public function appointments()
    {
        $apps=Appointment::where('user_id',Auth::id())->get();
        $current=Carbon::now();
//        dd($current->diffInSeconds('2020-07-27 14:15:00',false));
        return view('user_apps',['apps'=>$apps,'current'=>$current]);
    }

    public function review($doctor_id)
    {
        return view('review_add',['doctor_id'=>$doctor_id]);
    }

    public function review_add(Request $request)
    {
        Review::create([
            'user_id'=>Auth::id(),
            'doctor_id'=>$request->doctor_id,
            'rating'=>$request->rating,
            'comment'=>$request->comment
        ]);
        return redirect('/');
    }

    public function report()
    {
        $reports=Test::where('user_id',Auth::id())->get();
        return view('user_reports',['reports'=>$reports]);
    }







}
