@extends('layouts.app')

{{-- @section('content')
<a href="{{route('animals-index', ['sort'=>'asc'])}}">A_Z</a>
<a href="{{route('animals-index', ['sort'=>'desc'])}}">Z_A</a>
<a href="{{route('animals-index')}}">Reset</a>

<ul>
  @forelse($animals as $animal)
  <li>
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

@endsection --}}



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Animals</h1>
          <div>
            <a class="btn btn-outline-primary m-2" href="{{route('animals-index', ['sort'=>'asc'])}}">A_Z</a>
            <a class="btn btn-outline-primary m-2" href="{{route('animals-index', ['sort'=>'desc'])}}">Z_A</a>
            <a class="btn btn-outline-primary m-2" href="{{route('animals-index')}}">Reset</a>
          </div>
        </div>

        <div class="card-body">

          {{-- <ul class="list-group">
            @forelse($animals as $animal)
            <li class="list-group-item">
              <div class="color-bin">
                <div class="color-box" style="background: {{$animal->animal}};">
          <h2>{{$animal->name}}</h2>
        </div>

        <div class="controls">
          <a class="btn btn-outline-primary m-2" href="{{route('animals-show', $animal->id)}}">SHOW</a>
          <a class="btn btn-outline-success m-2" href="{{route('animals-edit', $animal)}}">EDIT</a>
          <form class="delete" action="{{route('animals-delete', $animal)}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-outline-primary m-2" type="submit">Destroy</button>
          </form>
        </div>
      </div>
      </li>
      @empty
      <li class="list-group-item">No colors, no life in color world</li>
      @endforelse
      </ul> --}}
      <ul class="list-group">
        @forelse($animals as $animal)
        <li class="list-group-item">
          <div class="color-bin">
            <div class="color-box2" style="background: {{$animal->getThisAnimalsColor()->first()->color}}">
              <i>{{$animal->getThisAnimalsColor()->first()->title}}</i>
              <h2>{{$animal->name}}</h2>
            </div>
            <div class="controls">
              <a class="btn btn-outline-primary m-2" href="{{route('animals-show', $animal->id)}}">SHOW</a>
              <a class="btn btn-outline-primary m-2" href="{{route('animals-edit', $animal)}}">EDIT</a>
              <form class="delete" action="{{route('animals-delete', $animal)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-outline-primary m-2" type="submit">Remove</button>
              </form>
            </div>
          </div>
        </li>
        @empty
        <li>Sorry no animals...</li>
        @endforelse
      </ul>
    </div>
  </div>
</div>
</div>
</div>
@endsection
