@extends('main')

@section('content')
<ul>
  <form action="{{route('animals-update', $animal)}}" method="post" enctype="multipart/form-data">
    <input type="text" name="animal_name" value="{{$animal->name}}">
    <select name="color_id">
      @foreach($colors as $color)
      <option value="{{$color->id}}" @if($color->id == $animal->color_id)selected @endif>{{$color->title}}</option>
      @endforeach
    </select>
    <div class="mt-3">
      <label for="anima_photo">Choose animal photo</label>
      <input type="file" name="animal_photo">
    </div>
    @if($animal->photo)
    <div class="image-box">
      <img src="{{$animal->photo}}" alt="Animal photo">
    </div>
    @endif
    @csrf
    @method('put')
    <button type="submit">Save animal</button>
  </form>
  @if($animal->photo)
  <form action="{{route('animals-delete-picture',$animal)}}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-outline-danger m-2" type="submit">Delete photo</button>
  </form>
  @endif
</ul>
@endsection
