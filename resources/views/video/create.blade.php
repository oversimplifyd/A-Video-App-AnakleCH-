@extends('layouts.app')

@section('content')

    <style>

    </style>

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <a class="btn btn-success" href="{{ URL::previous() }}">Back</a>
                        <span> Add Video</span>
                    </div>
                    <div class="panel-body">
                        @if (Session::has("success"))
                            <span class="alert alert-success">
                            <strong>Video added successfully..</strong>
                        </span>
                        @endif

                            @if (count($errors) > 0)
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first() }}</strong>
                                </span>
                            @endif


                            <form class="form-horizontal" method="POST" action="{{ url('videos/create') }}">
                            {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="title" class="control-label col-sm-4 ">Title</label>
                                    <div class="col-sm-8">
                                        <input name="title" class="form-control" value="{{ old('title')}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label col-sm-4 ">Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="description" class="form-control" required>{{ old('description')}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="url" class="control-label col-sm-4 ">Embed URL</label>
                                    <div class="col-sm-8">
                                        <input name="url" class="form-control" placeholder="Add Video fully qualified URL" value="{{ old('url')}}" required>
                                    </div>
                                </div>

                               <div class="form-group">
                                   <label for="category" class="control-label col-sm-4 ">Category</label>
                                   <div class="col-sm-8">
                                       <select class="form-control" id="category" name="category">
                                           @foreach(\Acada\Category::getCategories() as $category)
                                               <option value="{{$category}}">{{$category}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 pull-right">
                                    <button type="submit" name="submit" class="btn btn-success">GO!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
