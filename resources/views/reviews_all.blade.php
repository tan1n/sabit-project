@extends('layouts.front')
@include('layouts.menu')
@section('content')
    <div class="content success-page-cont">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h3>Reviews for {{$doc->name}}</h3>
                    <div class="card success-card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>SN</th>
                                    <th>Patient name</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                </tr>
                                @php $i=1; @endphp
                                @foreach($doc->allReviews() as $app)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$app->patient->name}}</td>
                                        <td>{{$app->rating}}</td>
                                        <td>{{$app->comment}}</td>
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
