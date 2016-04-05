@extends('tweet.layout.master')
@include('tweet.layout.header')
@section('title', 'edit')

@section('main')

{!! Form::open(['method' => 'put', 'url' => 'tweet/'. $tweet->id]) !!}
    <div class="form-group">
        {!! Form::label('tweet', 'tweet:') !!}
        {!! Form::hidden('tweet_id', $tweet->id) !!}
        {!! Form::text('tweet', $tweet->tweet, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('POST', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
@endsection


