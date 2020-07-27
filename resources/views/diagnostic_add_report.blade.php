@extends('layouts.front')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                @include('layouts.diagnostic_sidebar')

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <h4>Add a new report for user</h4>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('diagnostic.report.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="start">User phone no:</label>
                                        <input type="text" class="form-control" required id="start" name="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end">Test Report</label>
                                        <input type="file" class="form-control" required id="end" name="report">
                                    </div>
                                </div>
                                <br>
                                <input type="submit" value="Save" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
