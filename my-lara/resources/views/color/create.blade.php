{{--@extends('layouts.app')

 @section('content')
<ul>
  <form action="{{route('colors-store')}}" method="post">
<input type="color" name="create_color_input">
<input type="text" name="color_title">
@csrf
<button type="submit">Create color</button>
</form>
</ul>
@endsection --}}


@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>New color</h1>
        </div>

        <div class="card-body">
          <ul>
            <form action="{{route('colors-store')}}" method="post">
              <div class="form-group">
                <label for="color_title">Choose color</label>
                <input class="form-control" type="color" name="create_color_input">
                <label for="create_color_input">Enter color name</label>
                <input class="form-control" type="text" name="color_title">

              </div>
              @csrf
              {{-- @method('post') --}}
              <button class="btn btn-outline-primary mt-4" type="submit">New color</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
