@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $post->title }}

                        <a href="{{ url('admin/posts') }}">Posts</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ url('admin/posts/'.$post->id.'/update') }}" method="post">
                            {{ csrf_field() }}

                            {{ method_field('put') }}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control" rows="10">{{ $post->body }}</textarea>
                            </div>

                             <div class="form-group">
                                <input type="submit" name="submit" value="Update Post" class="btn btn-default" />
                             </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
