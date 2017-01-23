@extends('layouts.app')

@section('content')

    <style>
        .ui-helper-hidden-accessible {
            display: none;
        }

        .ui-autocomplete.ui-front.ui-menu {
            background: #fff;
            width: 15%;
        }

        .ui-autocomplete.ui-front.ui-menu li {
            list-style: none;
            font-weight: bold;
        }

        .ui-autocomplete.ui-front.ui-menu li:hover {
            background-color: #F5F5F5;
        }

        .title-box {
            font-size: larger;
            padding: 2em;
            background-color: #000;
            color: white;
            text-transform: capitalize;
            text-align: center;
            height: 150px;
        }

        .title-box:hover {
            cursor: pointer;
            background-color: white;
            border: 2px solid rgb(237, 41, 57);
            color: black;
        }

        .detail-box {
            padding: 0.5em;
            background-color: rgb(237, 41, 57);
            color: #fff;
            font-size: small;
        }

        .col-md-3.col-sm-3.col-xs-3 {
            margin-bottom: 1em;
        }

        #videos {
            margin-top: 2em;
        }

        @media (max-width: 640px) {
             .col-md-3.col-sm-3.col-xs-3 {
                width: 100%;
            }
        }
    </style>
    <script type="text/javascript">

        $(document).ready(function() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "video/categories", //Relative or absolute path to response.php file
                success: function(data) {
                    $('#search-input').autocomplete({
                        source: $.map(data, function(el) { return el }),
                        autoFocus: true
                    });
                },
                error: function() {
                    console.log('Something Went wrong processing the request');
                }
            });
        });
    </script>

    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/video/category') }}">
                    {{ csrf_field() }}
                    <input name='category' id="search-input" placeholder="Search by category" type="search" required />
                    <button id="submit-search" class="btn btn-danger" type="submit">Search</button>
                </form>
            </div>
        </div>

        @if($videos->count() > 0)
            <div id='videos' class="row">
                @foreach($videos as $video)
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <a href="/video/{{$video->id}}/view"><div class="title-box">{{str_limit($video->title, $limit = 40, $end = '...')}}</div></a>
                        <div class="detail-box"><p><span>Uploaded: {{$video->created_at->diffForHumans()}}</span></p></div>
                    </div>
                @endforeach
            </div>
        
            @if($videos->links())
                <div id="links">{{$videos->links()}}</div>
            @endif
        @else
            <p><strong>There are no videos available...</strong></p>
        @endif

    </div>
@endsection
