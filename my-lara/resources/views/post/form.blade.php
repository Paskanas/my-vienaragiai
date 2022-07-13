@extends('main')
@section('content')
@if($result !== '')
<h1>Result: {{$result}}</h1>
@endif
<form action="{{route('skaiciuokle')}}" method="post">
  <input type="text" name="x" placeholder="X value">
  <input type="text" name="y" placeholder="Y value">
  @csrf
  {{-- <input type="text" name="csrf" value=""> --}}
  <button type="submit">Atimti</button>
</form>
<ul>
  @foreach($colors as $color)
  {{-- <li>{{$color->id}}: {{$color->color}}</li> --}}
  @include('post.li')
  @endforeach
</ul>
@endsection

@section('title')
bla bla bla bla go !
@endsection
