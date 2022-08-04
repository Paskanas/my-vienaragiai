<h1>Order from: {{$order->orderClient->name}}</h1>
<ul>
  @foreach($order->animals as $animal)
  <li class="list-group-item">

    <div style="background: {{$animal->getThisAnimalsColor->color}};">
      {{-- {{$color->color}} --}}
      <i>{{$animal->getThisAnimalsColor->title}}</i>
      <h2>{{$animal->name}}: <small>{{$animal->count}} units</small></h2>
    </div>

  </li>
  @endforeach
</ul>
