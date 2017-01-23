@extends('layouts.app')

@section('content')

    <style>

        #video-frame p{
            margin-top: 2em;
            font-weight: bolder;
        }

        #video-frame iframe {
            width: 100%;
            height: 350px;
        }

        #description {
            text-align: justify;
        }
        @media (max-width: 640px) {
            .col-md-10.col-sm-10.col-xs-10.col-md-offset-1.col-sm-offset-1 {
                padding: 0;
                margin-left: 8%;
            }
        }
    </style>

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1">
                <div id="description">
                    <h3>{{$video->title}}</h3>
                    <p>{{$video->description}}</p>
                </div>
                <div id="video-frame">
                    <iframe src="http://www.youtube.com/embed/oHg5SJYRHA0?autoplay=1" align="middle" frameborder="0" allowfullscreen></iframe>
                    <p><span>Uploaded by: {{str_limit("{$video->user->first_name} {$video->user->last_name}", $limit = 20, $end = '...')}}</span>, {{$video->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>

    </div>
@endsection

