@extends('layouts.app')


@section('content')
{{Auth::user()->role}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Orders</h1>
          {{-- <div>
            <a class="btn btn-outline-primary m-2" href="{{route('colors-index', ['sort'=>'asc'])}}">A_Z</a>
          <a class="btn btn-outline-primary m-2" href="{{route('colors-index', ['sort'=>'desc'])}}">Z_A</a>
          <a class="btn btn-outline-primary m-2" href="{{route('colors-index')}}">Reset</a>
        </div> --}}
      </div>

      <div class="card-body">
        <ul class="list-group">
          {{-- <pre>
          {{print_r($orders)}}
          </pre> --}}
          @forelse($orders as $order)
          <li class="list-group-item">
            <div class="d-flex justify-content-end">
              <small>{{$order->time}}</small>
              {{-- <h3>{{$statuses[$order->status]}}</h3> --}}
            </div>
            <div class="color-box" style="background: {{$order->orderAnimal->getThisAnimalsColor->color}};">
              {{-- {{$color->color}} --}}
              <i>{{$order->orderAnimal->getThisAnimalsColor->title}}</i>
              <h2>{{$order->orderAnimal->name}}: <small>{{$order->count}} units</small></h2>
            </div>

          </li>
          @empty
          <li class="list-group-item">No orders, add order</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
