@extends('layouts.app')


@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1>All Masters</h1>
        </div>

        <div class="card-body">

          <ul class="list-group">
            @forelse($masters as $master)
            <li class="list-group-item">
              <div class="color-bin">
                <h2>{{$master->master_name}}</h2>

                <div>
                  @forelse($master->skills??[] as $skill)
                  <i style="color: orange">{{$skill->skill}}</i>
                  @empty
                  <i style="color: grey">Looser, No skill</i>
                  @endforelse

                </div>

                <div class="controls">
                  @if(Auth::user()->role >9)
                  <a class="btn btn-outline-success m-2" href="{{route('masters-edit', $master)}}">Add skill</a>
                  <form class="delete" action="{{route('masters-delete', $master)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-primary m-2" type="submit">Kill</button>
                  </form>
                  @endif
                </div>
              </div>
            </li>
            @empty
            <li class="list-group-item">No masters, no services. Do it by yourself</li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
