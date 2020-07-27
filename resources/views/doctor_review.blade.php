@extends('layouts.front')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                @include('layouts.doctor_sidebar')

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SN</th>
                                    <th>Patient</th>
                                    <th>Comment</th>
                                    <th>Rating</th>
                                </tr>
                                @php $i=1 @endphp
                                @foreach($reviews as $rev)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$rev->patient->name}}</td>
                                        <td>{{$rev->comment}}</td>
                                        <td>{{$rev->rating}}</td>
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
