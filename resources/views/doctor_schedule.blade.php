@extends('layouts.front')

@section('content')
<div class="content">
<div class="container-fluid">

<div class="row">
@include('layouts.doctor_sidebar')

<div class="col-md-7 col-lg-8 col-xl-9">
<div class="card">
    <div class="card-body">
        <form action="{{route('doctor.shifts.update')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="start">Starting time</label>
                    <input type="time" class="form-control" id="start" name="start">
                </div>
                <div class="col-md-6">
                    <label for="end">Finishing time</label>
                    <input type="time" class="form-control" id="end" name="end">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Maximum Patient</label>
                    <input type="number" name="max_patient" class="form-control" min="0">
                </div>
            </div>
            <input type="submit" value="Save" class="btn btn-success">
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
