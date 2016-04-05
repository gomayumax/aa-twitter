@extends('tweet.layout.master')
@include('tweet.layout.header')
@section('title', 'HOME')

@section('main')
{!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('tweet', 'tweet:') !!}
        {!! Form::text('tweet', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('POST', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}

 <table class="table">
    <thead>
      <tr>
        <th>user_name</th>
        <th>tweet</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
@foreach ($tweets as $tweet)
      <tr>
        <td>
            <a href='follow/add/{{$tweet->user_id}}'>{{$tweet->user->name}}
        @if (in_array($tweet->user_id, $followed))
                <span class="glyphicon glyphicon-ok-sign"></span>
        @endif
            </a>
    </td>
        <td>{{$tweet->tweet}}</td>
        <td>
@if ($tweet->user_id == Auth::user()->id)
{!! Form::open(['method' => 'delete', 'url'=> 'tweet/' . $tweet->id]) !!}
        {!! Form::hidden('tweet_id', $tweet->id) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-primary form-control']) !!}
                
{!! Form::close() !!}
<a href="/tweet/{{$tweet->id}}">編集</a>
@endif
        </td>
      </tr>
@endforeach
    </tbody>
  </table>
@endsection
