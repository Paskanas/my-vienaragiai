<div class="card mb-4">
  <div class="card-header"> Sort Filter Search </div>
  <div class="card-body">
    <div class="row">
      <div class="col-7">
        <form class="delete" action="{{route('front-index')}}" method="get">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>What sort do you want?</label>
                <select class="form-control" name="sort">
                  <option value="default" @if($sort==='default' ) selected @endif>Default sort</option>
                  <option value="color-asc" @if($sort==='color-asc' ) selected @endif>Color A-Z</option>
                  <option value="color-desc" @if($sort==='color-desc' ) selected @endif>Color Z-A</option>
                  <option value="animals-asc" @if($sort==='animals-asc' ) selected @endif>Animal A-Z</option>
                  <option value="animals-desc" @if($sort==='animals-desc' ) selected @endif>Animal Z-A</option>
                </select>
              </div>
              <button type="submit" class="btn btn-outline-warning mt-3 mr-2">Sort!</button>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="color_id">What color?</label>
                <select class="form-select" name="color_id">
                  <option value="0" @if( $filter==0 ) selected @endif>No filter, please</option>
                  @foreach($colors as $color)
                  <option value="{{$color->id}}" @if( $filter==$color->id ) selected @endif>{{$color->title}}</option>
                  @endforeach
                </select>
                <button class="btn btn-outline-primary mt-3" type="submit">Filter</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-4">
        <form class="delete" action="{{route('front-index')}}" method="get">
          <div class="form-group">
            <label for="s">Search</label>
            <input class="form-control" type="text" name="s" value="{{$s}}">
            <button class="btn btn-outline-primary mt-3" type="submit">Filter</button>
          </div>
        </form>
      </div>
      <div class="col-1">
        <a class="btn btn-outline-primary mt-4" href="{{route('front-index')}}">Clear</a>
      </div>
    </div>
  </div>
</div>
