@extends('main')

@section('content')
<div class="container">
  <form action="{{route('accounts-store')}}" method="post" class="create">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Name">
    <label for="surname">Surname</label>
    <input type="text" name="surname" required placeholder="Surname">
    <label for="bankAccount">Bank account</label>
    <input type="text" name="bankAccount" required readonly placeholder="Bank account number" value="{{substr($iban, 0, 4) . ' ' . substr($iban, 4, 4) . ' ' . substr($iban, 8, 4) . ' ' . substr($iban, 12, 4) . ' ' . substr($iban, 16, 4)}}">
    <label for="identityCode">Identity code</label>
    <input type="text" name="identityCode" required placeholder="Identity code">
    @csrf
    <button type="submit">Create</button>
  </form>
</div>
@endsection
