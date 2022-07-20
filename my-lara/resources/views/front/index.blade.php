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
                </div>
                <div class="controls">
                  <form class="delete" action="" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-warning m-2" type="submit">Want it!</button>
                  </form>
                </div>
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
