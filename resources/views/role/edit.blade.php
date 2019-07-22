@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Role</h3>
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
                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                            <label for="title">Name</label>
                                            <input type="text" class="form-control" id="title" placeholder="Role" name="name" value="{{ $role->name }}">
                                    </div>
                                    <div class="checkbox">
                                            <label for="selectall">Select All</label>
                                            <input type="checkbox" id="selectall" onClick="selectAll(this)">
                                    </div>
                                    <div class="row">
                                            <div class="col-lg-6">
                                                <label for="name">Post Permissions</label>
                                                @foreach($permissions as $permission)
                                                    @if ($permission->for == 'post')
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                            @foreach ($role->permissions as $role_permit)
                                                                @if ($role_permit->id == $permission->id)
                                                                    checked                                                                    
                                                                @endif
                                                            @endforeach
                                                            >{{ $permission->name }}</label>
                                                    </div>
                                                        
                                                    @endif
                                                @endforeach
        
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name">User Permissions</label>
                                                @foreach($permissions as $permission)
                                                    @if ($permission->for == 'user')
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                                            @foreach ($role->permissions as $role_permit)
                                                                @if ($role_permit->id == $permission->id)
                                                                    checked
                                                                @endif
                                                                
                                                            @endforeach
                                                            >{{ $permission->name }}</label>
                                                    </div>
                                                        
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
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
<script language="JavaScript">
        function selectAll(source) {
            checkboxes = document.getElementsByName('permission[]');
            for(var i in checkboxes)
                checkboxes[i].checked = source.checked;
        }
    </script>