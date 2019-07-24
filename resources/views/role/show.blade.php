@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($role as $roles)
                {{ $roles->id }}
                {{ $roles->name }}
            @endforeach
        </div>
    </div>
@endsection