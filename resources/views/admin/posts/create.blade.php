@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Posts
                        <a href="{{ url('admin/posts') }}">Posts</a>
                    </div>

                    <div class="card-body">

                        <form action="{{ url('admin/posts') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control"></textarea>
                            </div>

                             <div class="form-group">
                                <input type="submit" name="submit" value="Create Post" class="btn btn-default" />
                             </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
