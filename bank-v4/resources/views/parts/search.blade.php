<div class="search">
  @if($accounts->count()>0)
  <form class="searchForm" action="{{route('accounts-index')}}" method="get">
    <input class="form-control short" type="text" name="search">
    <button class="btn btn-outline-primary ms-2" type="submit">Search</button>
  </form>
  @endif
  <form action="{{route('accounts-index')}}" method="get">
    <button class="btn btn-outline-primary ms-2" type="submit">Search reset</button>
  </form>
</div>
