@extends('master')

@section('title')
    ManageBlogPage
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Manage Blog Info
                        </div>
                        <div class="card-body">
                            <h4 class="text-center">{{Session::get('message')}}</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Blog Title</th>
                                    <th>Author Name</th>
                                    <th>Blog Description</th>
                                    <th>Blog Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->author}}</td>
                                    <td>{{$blog->description}}</td>
                                    <td><img src="{{$blog->image}}" width="100" height="100"></td>
                                    <td>
                                        <a href="{{route('blog.edit', ['id' => $blog->id])}}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{route('blog.delete', ['id' => $blog->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection


