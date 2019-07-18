@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content" style="margin-left: 12px">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Roles</h3>
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
                    <a href="{{ route('role.create') }}" class="btn btn-info">Create Role</a>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Role Id</th>
                      <th>Name</th>
                      <th>Edit</th>
                      <th>Delete</th></th>
                    </tr>
                    </thead>
                    <tbody>
    
                      @foreach ($roles as $role)
                      <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                         <td><a href="{{ route('role.edit',$role->id) }}">Edit</a></td>  
                      <td>
                     <form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy', $role->id) }}" method="POST" style="display: none">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        </form>
                        <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $role->id }}').submit();
                        }else
                        {
                          event.preventDefault();
                        }">
                         Delete
                      </td>
                    </tr>
                      @endforeach
    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Role Id</th>
                        <th>Name</th>
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