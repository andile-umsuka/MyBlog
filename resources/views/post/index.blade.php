@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content" style="margin-left: 12px">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">My Posts</h3>
          @if(Session::has('message'))
          <div class="alert alert-success alert-dismissible">
            {{-- Used to dismiss the alert --}}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
          </div>
        @endif
    
          {{--  <a class="col-lg-offset-5 btn btn-success" href="{{ route('post.create') }}">Add new</a>  --}}
        </div>
        <div class="box-body"style="margin-right: 12px">
            <div class="box">
                <div class="form-group">
                  @can('posts.create', Auth::user())
                    <a href="{{ route('post.create') }}" class="btn btn-info">Create Post</a>
                  @elsecan('create-post', Auth::user())
                    <a href="{{ route('post.create') }}" class="btn btn-info">Create Post</a>
                  @endcan
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Post Number</th>
                      <th>Title</th>
                      <th>Sub-Title</th>
                      <th>Edit</th>
                      <th>Delete</th></th>
                    </tr>
                    </thead>
                    <tbody>
    
                      @foreach ($posts as $post)
                      <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->subtitle }}</td>
                        <td>
                          @can('posts.update', Auth::user())
                            <a href="{{ route('post.edit',$post->id) }}">Edit</a>  
                          @endcan
                        </td>
                      <td>
                        @can('posts.delete', Auth::user())
                     <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: none">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        </form>
                        <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $post->id }}').submit();
                        }else
                        {
                          event.preventDefault();
                        }">
                         Delete
                         @endcan
                      </td>
                    </tr>
                      @endforeach
    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Post Number</th>
                        <th>Title</th>
                        <th>Sub-Title</th>
                        <th>Edit</th>
                        <th>Delete</th></th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
        </div>
      </div>
    </section>
    </div>
@endsection