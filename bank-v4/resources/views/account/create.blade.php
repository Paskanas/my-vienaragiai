@extends('layouts.app')
{{--
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
@endsection --}}



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>New account</h1>
        </div>
        <div class="card-body">
          {{-- <div class="container"> --}}
          <form action="{{route('accounts-store')}}" method="post" class="create">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter name">
            <label for="surname">Surname</label>
            <input class="form-control" type="text" name="surname" required placeholder="Enter surname">
            <label for="bankAccount">Bank account</label>
            <input class="form-control" type="text" name="bankAccount" required readonly placeholder="Enter bank account number" value="{{substr($iban, 0, 4) . ' ' . substr($iban, 4, 4) . ' ' . substr($iban, 8, 4) . ' ' . substr($iban, 12, 4) . ' ' . substr($iban, 16, 4)}}">
            <label for="identityCode">Identity code</label>
            <input class="form-control" type="text" name="identityCode" required placeholder="Enter identity code">
            @csrf
            <button class="btn btn-outline-success mt-3" type="submit">Create</button>
          </form>
          {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
