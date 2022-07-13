@extends('main')

@section('content')
<ul>
  <form action="{{route('animals-store')}}" method="post">
    <input type="text" name="animal_name">
    <select name="color_id">
      @foreach($colors as $color)
      <option value="{{$color->id}}">{{$color->title}}</option>
      @endforeach
    </select>
    @csrf
    <button type="submit">Found new animal</button>
  </form>
</ul>
@endsection
