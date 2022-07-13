@extends('main')

@section('content')
<div class="container">
  <form action="{{route('accounts-update',['account'=>$account,'addOrWithdraw'=>'withdraw'])}}" method="post" class="funds">
    @include('account.show')
    <input type="text" name="sum" placeholder="Suma">
    <button type="submit">Withdraw</button>
    @csrf
    @method('put')
  </form>
</div>
@endsection
