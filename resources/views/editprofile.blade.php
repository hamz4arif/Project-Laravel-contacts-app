@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="css/editpage.css">
<!-- <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'> -->
<!-- <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script> -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection
@section('content')
<div class="container rounded bg-white mt-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://i.imgur.com/0eg0aG0.jpg" width="90"><span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span>Pakistan</span></div>
        </div>
        <form class="col-md-8" method="POST" action="/updateprofile/{{$user->id}}">
            @csrf
            @method('PUT')
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6>Back to home</h6>
                    </div>
                    <h6 class="text-right">Edit Profile</h6>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><input name="name" type="text" class="form-control" placeholder="Name" value="{{$user->name}}"></div>
                    <!-- <div class="col-md-6"><input type="text" class="form-control" value="Doe" placeholder="Doe"></div> -->
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><input name="email" type="email" class="form-control" placeholder="Email" value="{{$user->email}}"></div>
                    <!-- <div class="col-md-6"><input type="text" class="form-control" value="+19685969668" placeholder="Phone number"></div> -->
                </div>
                <!-- <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="D-113, right avenue block, CA,USA"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="USA" placeholder="Country"></div>
                </div> -->
                <!-- <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Bank Name" value="Bank of America"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="043958409584095" placeholder="Account Number"></div>
                </div> -->
                <div class="mt-5 text-right">
                    <input type="submit" value="Update" class="btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>
@endsection