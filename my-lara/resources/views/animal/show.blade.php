@extends('layouts.app')

@section('content')
<ul>
  <li>
    <div class="color-box" style="background: {{$animal->animal}};">
      {{$animal->getThisAnimalsColor->color}}

      <h2>{{$animal->name}}</h2>
    </div>
    <div class="controls">
      <a href="{{route('animals-edit', $animal)}}">EDIT</a>
      <form class="delete" action="{{route('animals-delete', $animal)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Destroy</button>
      </form>
    </div>
  </li>
</ul>

@endsection
