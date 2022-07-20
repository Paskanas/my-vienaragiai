@extends('layouts.app')
{{--
@section('content')
<div class="container">
  <form action="{{route('accounts-update',['account'=>$account,'addOrWithdraw'=>'withdraw'])}}" method="post" class="funds">
@include('account.show')
<input type="text" name="sum" placeholder="Sum">
<button type="submit">Withdraw</button>
@csrf
@method('put')
</form>
</div>
@endsection --}}

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Withdraw funds</div>
        <div class="card-body">
          <div class="container">
            <form action="{{route('accounts-update',['account'=>$account,'addOrWithdraw'=>'withdraw'])}}" method="post" class="funds">
              @include('account.show')
              <div class="form-group">
                <input class="form-control short" type="text" name="sum" placeholder="Sum">
                <button class="btn btn-outline-danger mt-3" type="submit">Withdraw</button>
              </div>
              @csrf
              @method('put')
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
