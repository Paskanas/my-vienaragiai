@if($count && $count > 1 )
<nav class="m-3">
  <ul class="pagination">
    <li class="page-item @if($page ==1) disabled @endif"><a class="page-link" href="{{route('front-index', [...$query,'page'=>1])}}">First</a></li>
    <li class="page-item @if($page ==1) disabled @endif"><a class="page-link" href="{{route('front-index', [...$query,'page'=>$page-1])}}">Previous</a></li>
    @if($page>floor($pagesLimit/2)+1)
    <li class="page-item disabled"><a class="page-link" href='#'>...</a></li>
    @endif
    @foreach (range(($page-floor($pagesLimit/2))>0?($page-floor($pagesLimit/2)):1,
    ($page+floor($pagesLimit/2)<$count)? ($page+floor($pagesLimit /2)): ($count)) as $pageNum) <li class="page-item @if($page == $pageNum) active @endif"><a class="page-link" @if($page !=$pageNum) href={{route('front-index', [...$query,'page'=>$pageNum])}} @endif>{{$pageNum}}</a></li>
      @endforeach
      @if($page<$count-floor($pagesLimit /2)) <li class="page-item disabled"><a class="page-link" href='#'>...</a></li>
        @endif
        <li class="page-item @if($page ==$count) disabled @endif"><a class="page-link" href="{{route('front-index', [...$query,'page'=>$page+1])}}">Next</a></li>
        <li class="page-item @if($page ==$count) disabled @endif"><a class="page-link" href="{{route('front-index', [...$query,'page'=>$count])}}">Last</a></li>
  </ul>
</nav>
@endif
