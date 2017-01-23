@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <a class="btn btn-success" href="{{ URL::previous() }}">Back</a>
                        <span> Edit Profile</span>
                    </div>
                    <div class="panel-body">
                        @if (Session::has("success"))
                            <span class="alert alert-success">
                            <strong>Update Successful...</strong>
                        </span>
                        @endif

                        @if (count($errors) > 0)
                            <span class="alert alert-danger">
                                    <strong>{{ $errors->first() }}</strong>
                                </span>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ url("user/$user->id/edit") }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="first_name" class="control-label col-sm-4 ">First Name</label>
                                <div class="col-sm-8">
                                    <input name="first_name" class="form-control" value="{{ $user->first_name}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="control-label col-sm-4 ">Last Name</label>
                                <div class="col-sm-8">
                                    <input name="last_name" class="form-control" value="{{ $user->last_name}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label col-sm-4 ">Email</label>
                                <div class="col-sm-8">
                                    <input name="email" class="form-control" value="{{ $user->email}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 pull-right">
                                    <button type="submit" name="submit" class="btn btn-success">Update!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
