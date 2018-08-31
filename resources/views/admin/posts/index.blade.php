@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Posts
                        <a href="{{ url('admin/posts/create') }}">+ Add</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th width="100">
                                    control
                                </th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/posts/'.$post->id.'/edit') }}">edit</a>
                                        <a href="{{ url('admin/posts/'.$post->id.'/delete') }}">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
