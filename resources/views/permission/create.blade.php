@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Permissions</h3>
                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                </div>                 
                    <form action="{{ route('permission.store') }}" method="POST">
                      {{ csrf_field() }}
                        <div class="box-body">
                            <div class="col-lg-offset-3 col-lg-6">
                                
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" class="form-control" id="title" placeholder="Permission" name="name">
                                </div>
                                <div class="form-group">
                                        <label for="for">Permission For</label>
                                        <select name="for" id="for" class="form conttrol">
                                            <option selected disable>Select Permission for</option>
                                            <option value="post">Post</option>
                                            <option value="user">User</option>
                                        </select>
                                </div> 
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
                                    </div>
                            </div>
                        </div>
                </div>
                    </form>
                </div>
            </div>
    </section>
</div>
@endsection