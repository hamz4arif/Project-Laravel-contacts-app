@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add contact</h3>
                    <div class="card-body">
                        <form action="/contacts" method="POST">
                            @csrf
                            <div class="form-group @error('name') is-invalid @enderror">
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="contact name">
                                @error('name')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="contact email">
                                @error('email')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="contact phone">
                                @error('phone')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add contact">
                                <a href="/home" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection