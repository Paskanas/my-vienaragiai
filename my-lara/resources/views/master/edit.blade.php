@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>Add skills to {{$master->master_name}}</h1>
        </div>

        <div class="card-body">
          <ul>
            <form action="{{route('masters-update', $master)}}" method="post">
              <div class="form-group">
                {{-- <label for="create_color_input">Skills</label> --}}
                @foreach($skills as $key => $skill)
                <div class="form-check">
                  <input class="form-check-input" {{$skill->checked?'checked': ''}} value="{{$skill->id}}" name="skill[]" type="checkbox" value="" id="_{{$key}}">
                  <label class="form-check-label" for="_{{$key}}">
                    {{$skill->skill}}
                  </label>
                </div>
                @endforeach

              </div>
              @csrf
              @method('put')
              <button class="btn btn-outline-success mt-4" type="submit">Masters new skills</button>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
