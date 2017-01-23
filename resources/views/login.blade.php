@extends('layouts.app')

@section('content')

    <style>

        .login {
            margin-top: 20%;
        }

        .col-xs-4.col-sm-4.col-md-4 {
            text-align: center;
        }

        a {
            color: #000;
        }

        .btn.btn-social {
            margin-top: 2em;
            margin-bottom: 2em;
            border: 2px solid grey;
            font-weight: bolder;
        }

        .btn.btn-social:hover {
            background-color: black;
            color: white;
            border: 0;
        }

        .btn.btn-social i{
            margin-right: 10px;
            font-size: 2em;
        }
    </style>

    <div class="container">
        <div class="row login">
            <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-md-offset-4 col-xs-offset-4">
                <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                    <a href="/sm_login" class="btn btn-social"><i class="fa fa-github"></i> Sign in with Github</a>
                </div>

            </div>
        </div>

    </div>
@endsection
