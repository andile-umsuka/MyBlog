@extends('layouts.app')

@section('content')
<div class="content-wrapper">
      <div class="row">
        <div class="col-md-12">
            
                <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Users</h3>
                        </div>                        
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('PATCH') }}
                            <div class="box-body">

                                <div class="col-lg-offset-3 col-lg-6">
                                        <div class="form-group">
                                                <label for="name">User Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="User Name" name="name" value="{{ $user->name }}">
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="email">Email</label>
                                          <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ $user->email }}">
                                        </div>

                                        
                                        <div class="form-group">
                                        <label>Assign Role</label>
                                        <div class="row">
                                        @foreach($roles as $role)
                                            <div class="col-lg-3">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label>Assign Role</label>
                                        <div class="row">
                                        @foreach($permissions as $permission)
                                            <div class="col-lg-3">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"> {{ $permission->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                                        </div>
                                </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection