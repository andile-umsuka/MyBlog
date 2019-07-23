@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">            
                <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Users</h3>
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

                        <form action="{{ route('user.store') }}" method="POST">
                          {{ csrf_field() }}
                            <div class="box-body">

                                <div class="col-lg-offset-3 col-lg-6">
                                        <div class="form-group">
                                                <label for="name">User Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="User Name" name="name" value="{{ old('name') }}">
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="email">Email</label>
                                          <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
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
                                            <div class="checkbox">
                                                <label>Select All Permissions <input type="checkbox" id="selectall" onclick="selectAll(this)" ></label>
                                        </div>
                                            <div class="form-group">
                                                    <label>Give Permission</label>   
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
<script language="JavaScript">
        function selectAll(source) {
            checkboxes = document.getElementsByName('permission[]');
            for(var i in checkboxes)
                checkboxes[i].checked = source.checked;
        }
    </script>