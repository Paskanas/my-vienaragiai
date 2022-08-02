{{-- @extends('main')

@section('content')
<ul>
  <form action="{{route('animals-store')}}" method="post">
<input type="text" name="animal_name">
<select name="color_id">
  @foreach($colors as $color)
  <option value="{{$color->id}}">{{$color->title}}</option>
  @endforeach
</select>
@csrf
<button type="submit">Found new animal</button>
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
          <h1>New animal</h1>
        </div>

        <div class="card-body">
          {{-- <ul>
            <form action="{{route('colors-store')}}" method="post">
          <div class="form-group">
            <label for="color_title">Choose color</label>
            <input class="form-control" type="color" name="create_color_input">
            <label for="create_color_input">Enter color name</label>
            <input class="form-control" type="text" name="color_title">

          </div>
          @csrf
          <button class="btn btn-outline-primary mt-4" type="submit">New color</button>
          </form>
          </ul> --}}
          {{-- <ul> --}}
          <form action="{{route('animals-store')}}" method="post" enctype="multipart/form-data">
            <label for="animal_name">Animal name</label>
            <input class="form-control" type="text" name="animal_name">
            <label for="color_id">Choose animal color</label>
            <select class="form-select" name="color_id">
              @foreach($colors as $color)
              <option value="{{$color->id}}">{{$color->title}}</option>
              @endforeach
            </select>
            <div class="mt-3">
              <a class="magic--link" href="">see <span></span></a>
            </div>
            <div class="mt-3">
              <label for="anima_photo">Choose animal photo</label>
              <input type="file" name="animal_photo">
            </div>
            @csrf
            <button class="btn btn-outline-primary mt-4" type="submit">Found new animal</button>
          </form>
          {{-- </ul> --}}
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <script>
  const showUrl = "{{route('colors-show-route')}}";

</script> --}}
@endsection
