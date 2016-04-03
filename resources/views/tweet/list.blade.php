@extends('tweet.layout.master')
@include('tweet.layout.header')
@section('title', 'list')

@section('main')
 <table class="table">
    <thead>
      <tr>
        <th>user_name</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
@if (!empty($list))
@foreach ($list as $follow)
      <tr>
        <td>
            <a href='#'>{{$follow->followUser->name}}</a>
    </td>
        <td></td>
        <td>
        </td>
      </tr>
@endforeach
@endif
    </tbody>
  </table>
@endsection


