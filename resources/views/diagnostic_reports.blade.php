@extends('layouts.front')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                @include('layouts.diagnostic_sidebar')

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <h4>Reports</h4>

                            <table class="table table-bordered">
                                <tr>
                                    <th>SN</th>
                                    <th>Patient</th>
                                    <th>Report</th>
                                </tr>
                                @php $i=1 @endphp
                                @foreach($reports as $rep)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$rep->patient->name}}</td>
                                        <td><a href="{{url('/download',['file'=>$rep->report_path])}}">Download</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$reports ? $reports->links() : ''}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
