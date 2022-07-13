<div class="search">
  @if($accounts->count()>0)
  <form action="{{route('accounts-index')}}" method="get">
    <input type="text" name="search">
    <button type="submit">Search</button>
  </form>
  @endif
  <form class="searchReset" action="{{route('accounts-index')}}" method="get">
    <button type="submit">Search reset</button>
  </form>
</div>
