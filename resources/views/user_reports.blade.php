@extends('layouts.front')
@include('layouts.menu')
@section('content')
    <div class="content success-page-cont">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card success-card">
                        <div class="card-body">
                            <h3>Test Reports</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <th>SN</th>
                                    <th>Diagnostic Center</th>
                                    <th>Report</th>
                                </tr>
                                @php $i=1 @endphp
                                @foreach($reports as $rep)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$rep->diagnostic->name}}</td>
                                        <td><a href="{{url('/download',['file'=>$rep->report_path])}}">Download</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
