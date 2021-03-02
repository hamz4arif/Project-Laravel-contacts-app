@extends('layouts.app')
@section('style')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/profile.css">
@endsection
@section('content')
<div class="container">
    @if(Session::has('profileupdated'))
    <div class="alert alert-primary alert-dismissible fade ">
        {{Session::get('profileupdated')}}
        <button type="button" class="close" data-dismiss="alert">&times;</button>

    </div>
    @endif

    <div class="row profile">


        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="https://source.unsplash.com/100x100/?profile,man" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{$user->name}}
                    </div>
                    <div class="profile-usertitle-job">
                        {{$user->email}}
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <!-- <button type="button" class="btn btn-success btn-sm">Follow</button> -->
                    <form action="/deleteprofile/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <!-- <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li> -->
                        <li>
                            <a href="/editprofile/{{$user->id}}">
                                <i class="glyphicon glyphicon-user"></i>
                                Edit Settings </a>
                        </li>
                        <!-- <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Tasks </a>
                        </li> -->
                        <!-- <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                        </li> -->
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                Some user related content goes here...
            </div>
        </div>
    </div>
</div>

<center>
    <!-- <strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong> -->
</center>
<br>
<br>
@endsection