@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('front.box')
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
          @include('front.pager')
          <ul class="list-group">
            @forelse($animals as $animal)
            <li class="list-group-item">
              <div class="color-bin">
                <div class="color-box2" style="background: {{$animal->color}}">
                  <i>{{$animal->title}}</i>
                  <h2>{{$animal->name}}</h2>
                  <a href="https://google.lt/search?q={{$animal->name}}+{{$animal->title}}" target='_blank'> Go and see</a>
                </div>
                @if(Auth::user()?->role>0)
                <div class="controls">
                  <div class="container">
                    <div class="row">
                      {{-- <form class="delete" action="{{route('front-add')}}" method="post"> --}}
                      @csrf
                      @method('post')
                      <button class="btn btn-outline-warning mt-2 mb-2 add--cart" type="submit">Want it!</button>
                      <input class="form-control" type="number" name="animals_count">
                      {{$animal->aid}}
                      <input class="form-control" type="hidden" name="animals_id" value="{{$animal->aid}}">
                      {{-- </form> --}}
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </li>
            @empty
            <li>Sorry no animals...</li>
            @endforelse
          </ul>
        </div>
        @include('front.pager')
      </div>
    </div>
  </div>
</div>
@endsection
