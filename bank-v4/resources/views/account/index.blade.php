@extends('main')

@section('content')
<div class="listForm" action="" method="post">
  @csrf
  @method('delete')
  <table class="accountsTable">
    <tr>
      <th><a href="{{route('accounts-index',['sortCol'=>'id'          ,'sort'=>$sort ])}}">ID</a></th>
      <th><a href="{{route('accounts-index',['sortCol'=>'name'        ,'sort'=>$sort ])}}">Vardas</a></th>
      <th><a href="{{route('accounts-index',['sortCol'=>'surname'     ,'sort'=>$sort ])}}">Pavarde</a></th>
      <th><a href="{{route('accounts-index',['sortCol'=>'bankAccount' ,'sort'=>$sort ])}}">Sąskaitos nr.</a></th>
      <th><a href="{{route('accounts-index',['sortCol'=>'identityCode','sort'=>$sort ])}}">Asmens kodas</a></th>
      <th><a href="{{route('accounts-index',['sortCol'=>'balance'     ,'sort'=>$sort ])}}">Suma</a></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>

    @if(count($accounts)===0)
  </table>
</div>
@endif

@forelse($accounts as $account)
<tr>
  <td> {{$account->id}} </td>
  <td> {{$account->name}}</td>
  <td> {{$account->surname}} </td>
  <td> {{$account->bankAccount}} </td>
  <td> {{$account->identityCode}} </td>
  <td> {{$account->balance}} </td>
  {{-- <td> <button type="submit" name="delete" value={{$accounts->id}}>Ištrinti</button> </td> --}}

  <td>
    <form action="{{route('accounts-delete',$account)}}" method="post">
      @csrf
      @method('delete')
      <button type="submit" name="delete">Ištrinti</button>
    </form>
  </td>
  <td> <a href="{{route('accounts-edit', ['account'=>$account,'addOrWithdraw'=>'add'])}}">Add funds</a> </td>
  <td> <a href="{{route('accounts-edit', ['account'=>$account,'addOrWithdraw'=>'withdraw'])}}">Withdraw funds</a> </td>
</tr>

@empty
<h2>Sąskaitų sąrašas tuščias</h2>
@endforelse
@if($accounts->count()>0)
</table>
</div>
@endif
@include('parts.search')
@endsection


@section('title')
Home
@endsection
