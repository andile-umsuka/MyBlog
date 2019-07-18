@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content" style="margin-left: 12px">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List of Permissions</h3>
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
                    <a href="{{ route('permission.create') }}" class="btn btn-info">Create Permission</a>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Permission Number</th>
                      <th>Name</th>
                      <th>For</th>
                      <th>Edit</th>
                      <th>Delete</th></th>
                    </tr>
                    </thead>
                    <tbody>
    
                      @foreach ($permissions as $permission)
                      <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->for }}</td>
                         <td><a href="{{ route('permission.edit',$permission->id) }}">Edit</a></td>  
                      <td>
                     <form id="delete-form-{{ $permission->id }}" action="{{ route('permission.destroy', $permission->id) }}" method="POST" style="display: none">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        </form>
                        <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $permission->id }}').submit();
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
                        <th>Permission Number</th>
                        <th>Name</th>
                        <th>For</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
        </div>
      </div>
    </section>
    </div>
@endsection