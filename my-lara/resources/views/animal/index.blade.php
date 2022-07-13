@extends('main')

@section('content')
<a href="{{route('animals-index', ['sort'=>'asc'])}}">A_Z</a>
<a href="{{route('animals-index', ['sort'=>'desc'])}}">Z_A</a>
<a href="{{route('animals-index')}}">Reset</a>

<ul>
  @forelse($animals as $animal)
  <li>
    {{-- galima gauti per modeli trim budais
      $animal->getThisAnimalsColor->color
      $animal->getThisAnimalsColor()->first()->color
      $animal->getThisAnimalsColor()->get()[0]->color
      --}}
    <div class="color-box" style="background: {{$animal->getThisAnimalsColor->color}}">
      {{$animal->getThisAnimalsColor()->first()->title}}
      <h2>{{$animal->name}}</h2>
    </div>
    <div class="controls">
      <a href="{{route('animals-show', $animal->id)}}">SHOW</a>
      <a href="{{route('animals-edit', $animal)}}">EDIT</a>
      <form class="delete" action="{{route('animals-delete', $animal)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Remove</button>
      </form>
    </div>
  </li>
  @empty
  <li>Sorry no animals...</li>
  @endforelse
</ul>

@endsection
