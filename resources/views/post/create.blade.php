@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Posts</h3>
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
                    <form action="{{ route('post.store') }}" method="POST">
                      {{ csrf_field() }}
                        <div class="box-body">
                            <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                            <label for="title">Post title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Post title" name="title">
                                    </div>
                                    <div class="form-group">
                                            <label for="subtitle">Sub-Title</label>
                                            <input type="text" class="form-control" id="subtitle" placeholder="Sub-Title" name="subtitle">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
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