@extends('admin.layouts.master')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admin Information</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 m-auto">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Admin Information</h3>
                        </div>


                        <form method="POST" action="{{route('users.update', ['id' => $user->id])}}" role="form">

                            @method('PUT')

                            {{csrf_field()}}

                            <div class="card-body">

                                @if(session()->has('message'))

                                    <p class="alert alert-success">{{session()->get('message')}}</p>

                                @endif

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" value="{{$user->name}}" class="form-control" id="name">
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" value="{{$user->email}}" class="form-control" id="email">
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input name="current_password" type="password" class="form-control" id="current_password">
                                    <span class="text-danger">{{$errors->first('incorrect_password')}}</span>
                                </div>

                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input name="password" type="password" class="form-control" id="password">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">New Password Confirmation</label>
                                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>

                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection