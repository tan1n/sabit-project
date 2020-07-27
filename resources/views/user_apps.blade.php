@extends('layouts.front')
@include('layouts.menu')
@section('content')
    <div class="content success-page-cont">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card success-card">
                        <div class="card-body">
                            <h3>Appointments</h3>

                            <table class="table table-bordered">
                                <tr>
                                    <th>SN</th>
                                    <th>Doctor</th>
                                    <th>Appointment Date</th>
                                    <th>Payment Information</th>
                                    <th>Review</th>
                                </tr>
                                @php $i=1 @endphp
                                @foreach($apps as $app)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$app->doctor->name}}</td>
                                        <td>{{$app->appointed_at}}</td>
                                        <td>{{$app->doctor->charge}}/tk</td>
                                        <td>
                                            @if($current->diffInSeconds($app->appointed_at,false) < 0  && count($app->reviews($app->doctor_id)) == 0)
                                            <form action="{{url('/review/add/'.$app->doctor->id)}}">
                                                <button class="btn-success">Add review</button>
                                            </form>
                                            @elseif(count($app->reviews($app->doctor_id))==0)
                                                N/A

                                            @else
                                                {{$app->reviews($app->doctor_id)[0]->comment}}
                                            @endif
                                        </td>
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
