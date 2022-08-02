{{-- <span>Yra: {{$count}}</span>
<span class="delete--cart">X</span> --}}




<li class="nav-item dropdown">
  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    Animals in cart {{$count}}
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    @forelse($cart as $animal)
    <span class="dropdown-item">
      <div class="cart-item">
        <span>
          {{$animal->name}}
          {{$animal->getThisAnimalsColor->title}}
          {{$animal->count}}
        </span>
        <b class="delete--cert--item" data-item-id="{{$animal->id}}">
          X
        </b>
      </div>
    </span>

    @empty
    <span class="dropdown-item">
      Your cart is empty
    </span>
    @endforelse
    @if ($cart)
    <form action="" method="post">
      <button class="btn btn-outline-warning mt-2 mb-2 add--cart" type="submit">Buy it!</button>
      @csrf
    </form>
    @endif
  </div>
</li>
