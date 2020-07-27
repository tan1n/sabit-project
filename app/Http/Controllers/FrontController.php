<?php

namespace App\Http\Controllers;

use App\Category;
use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{

    public function index()
    {
        $doctors=Doctor::all()->take(5);
        return view('home',['doctors'=>$doctors]);
    }

    public function search(Request $request)
    {
        $doc=Doctor::where('name',$request->name)->get();
        return view('doctors',['doctor'=>$doc]);
    }

    public function searchByCat(Request $request)
    {
        $doc=Category::where('id',$request->cat_id)->get();
        return view('doctors',['doctor'=>$doc[0]->doctors]);
    }


    public function find(Request $request)
    {
        $doc=Doctor::where('city',$request->city)->where('name', 'like', '%' . $request->name. '%')->get()->first()->toArray();
        return response()->json(['data'=>$doc['name']]);
    }


    public function reviews($doctor_id)
    {
        $doc=Doctor::find($doctor_id);
//        dd($doc->allReviews()[0]->patient->name);
        return view('reviews_all',['doc'=>$doc]);
    }


    public function reportDownload($file)
    {
        return Storage::download('reports/'.$file);
    }


}
