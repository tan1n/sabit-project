<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Review;
use App\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
//        $this->middleware('auth:doctor');
    }

    public function index()
    {
        $doctors=Doctor::paginate(5);
        return view('doctors',['doctor'=>$doctors]);
    }

    public function appointments()
    {
        $apps=Appointment::where('doctor_id',Auth::guard('doctor')->user()->id)->with('patient')->get();

        return view('doctor_appointments',['appointments'=>$apps]);
    }


    public function dashboard()
    {
        $upcoming=Appointment::whereDate('appointed_at','>',Carbon::now()->toDateTime())
                            ->where('doctor_id',Auth::guard('doctor')->user()->id)->get();

        $today=Appointment::whereDate('appointed_at','=',Carbon::now()->toDateTime())
            ->where('doctor_id',Auth::guard('doctor')->user()->id)->get();

        $total_patient=Appointment::where('doctor_id',Auth::guard('doctor')->user()->id)->groupBy('user_id')->get()->count();


        $total_appointment=Appointment::where('doctor_id',Auth::guard('doctor')->user()->id)->get()->count();

        return view('doctor_dashboard', [
            'upcoming'=>$upcoming,
            'today'=>$today,
            'total_patient'=>$total_patient,
            'todays_patient'=>$today->count(),
            'total_appointment'=>$total_appointment
        ]);
    }




    public function schedule()
    {
        return view('doctor_schedule');
    }

    public function updateSchedule(Request $request)
    {
        $shift=Shift::where('doctor_id',81);

        $shift->update([
            'start'=>intval($request->start),
            'end'=>intval($request->end),
            'max_patient'=>$request->max_patient,
            'doctor_id'=>81
        ]);
        return view('doctor_schedule');
    }

    public function login()
    {
        return view('auth.doctor_login');
    }

    public function loginDoctor(Request $request)
    {
        $doctor=Doctor::where(['email'=>$request->email])->get()->first();
        $result=Auth::guard('doctor')->attempt(['email'=>$request->email,'password'=>$request->password]);
        if($result){
            Auth::guard('doctor')->login($doctor);
            return redirect('doctor/dashboard');
        }else{
            dd('Doctor email or passwor invalid');
        }
    }


    public function filter(Request $request)
    {
        $doctors=Doctor::with('categories')->where('');
    }

    public function reviews(Request $request)
    {
        $reviews=Review::where('doctor_id',Auth::guard('doctor')->user()->id)->get();
        return view('doctor_review',['reviews'=>$reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doc=Doctor::create($request->all());
        return $doc;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return $doctor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
