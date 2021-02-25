@extends('layouts.app')

@section('content')
@include('sweet::alert')
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
                    <a href="/home" class="btn btn-primary">Go Home</a>
                    <br>
                    <br>
                    @if(count($contacts)>0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                <td><a href="contacts/{{$contact->id}}/edit" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="contacts/{{$contact->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" onclick=' return confirmSubmit()' value="Delete">

                                </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script LANGUAGE="JavaScript">
    function confirmSubmit() {
        var agree = confirm("Are you sure you want to continue?");
        if (agree) {
            return true;
        } else
            return false;
    }
    // -->
</script>
@endsection