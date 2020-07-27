@extends('layouts.front')
@include('layouts.menu')

@section('content')
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- Checkout Form -->
                            <form action="{{url('/review/add/'.$doctor_id)}}" method="post">
                            @csrf
                                    <div class="info-widget">
                                        <h4 class="card-title">Add review</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group card-label">
                                                    <label>Rating</label>
                                                    <input class="form-control" name="rating" type="number" min="1" max="5">
                                                </div>
                                                <div class="form-group card-label">
                                                    <label>Comment</label>
                                                    <textarea name="comment" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit Section -->
                                    <div class="submit-section mt-4">
                                        <button type="submit" class="btn btn-primary submit-btn">Add</button>
                                    </div>
                                    <!-- /Submit Section -->

                                </div>
                            </form>
                            <!-- /Checkout Form -->

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
