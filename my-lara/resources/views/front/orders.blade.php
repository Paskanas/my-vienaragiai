@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row justify-content-center">
    @forelse($orders as $order)
    <div class="col-md-8">
      <div class="card mt-2">
        <div class="card-header">
          <h1>Order</h1>
          {{-- <div>
            <a class="btn btn-outline-primary m-2" href="{{route('colors-index', ['sort'=>'asc'])}}">A_Z</a>
          <a class="btn btn-outline-primary m-2" href="{{route('colors-index', ['sort'=>'desc'])}}">Z_A</a>
          <a class="btn btn-outline-primary m-2" href="{{route('colors-index')}}">Reset</a>
        </div> --}}
      </div>

      <div class="card-body">

        <div class="d-flex justify-content-end">
          <small>{{$order->time}}</small>
          <small class="ms-3">Status: {{$statuses[$order->status]}}</small>
        </div>


        <ul class="list-group">
          @foreach($order->animals as $animal)
          <li class="list-group-item">

            <div class="color-box" style="background: {{$animal->getThisAnimalsColor->color}};">
              {{-- {{$color->color}} --}}
              <i>{{$animal->getThisAnimalsColor->title}}</i>
              <h2>{{$animal->name}}: <small>{{$animal->count}} units</small></h2>
            </div>

          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  @empty
  <div class="list-group-item">No orders, add order</div>
  @endforelse

</div>
</div>
@endsection
