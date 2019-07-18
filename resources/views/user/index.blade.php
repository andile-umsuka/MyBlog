@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content" style="margin-left: 12px">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Users</h3>
          @if(Session::has('message'))
          <div class="alert alert-success alert-dismissible">
            {{-- Used to dismiss the alert --}}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
          </div>
        @endif

        @if(Session::has('failure'))
          <div class="alert alert-danger alert-dismissible">
            {{-- Used to dismiss the alert --}}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('failure') }}
          </div>
        @endif
    
          {{--  <a class="col-lg-offset-5 btn btn-success" href="{{ route('post.create') }}">Add new</a>  --}}
        </div>
        <div class="box-body"style="margin-right: 12px">
            <div class="box">
                 <div class="form-group">
                   @can('users.create', Auth::user())
                    <a href="{{ route('user.create') }}" class="btn btn-info">Create User</a>
                  @endcan
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Assigned Role</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
    
                      @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@foreach ($user->roles as $role)
                            {{ $role->name }},
                        @endforeach</td>
                          <td>
                            @can('users.update', Auth::user())
                            <a href="{{ route('user.edit',$user->id) }}">Edit</a>
                            @endcan
                          </td>  
                      <td>
                        @can('users.delete', Auth::user())
                          <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                          </form>
                          <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $user->id }}').submit();
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
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Assigned Role</th>
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