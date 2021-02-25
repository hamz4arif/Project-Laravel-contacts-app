@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::has('contactAdded'))
                    <div class="alert alert-success">
                        {{Session::get('contactAdded')}}
                    </div>
                    @endif

                    <a href="/contacts/create" class="btn btn-primary">Add contact</a>
                    <a href="/contacts" class="btn btn-primary">Show contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
