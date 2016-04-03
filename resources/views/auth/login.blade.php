@extends('tweet.layout.master')
@include('tweet.layout.header')
@section('title', 'login')

@section('main')
{!! Form::open(['url' => '/auth/login']) !!}
    <div class="form-group">
        {!! Form::label('email', 'email:') !!}
        {!! Form::text('email', null) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'password:') !!}
        {{ Form::password('password') }}
    </div>

    <div class="form-group">
        {!! Form::submit('login') !!}
    </div>
{!! Form::close() !!}
@endsection
