@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add contact</h3>
                    <div class="card-body">
                        <form action="/contacts/{{$contact->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group @error('name') is-invalid @enderror">
                                <input type="text" name="name" class="form-control" placeholder="contact name" value="{{$contact->name}}">
                                @error('name')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" value="{{$contact->email}}" placeholder="contact email">
                                @error('email')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" value="{{$contact->phone}}" placeholder="contact phone">
                                @error('name')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection