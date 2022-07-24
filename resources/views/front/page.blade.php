@if($allCount && $allCount > $perPage)
<nav class="mt-4" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item @if($pageSelected == 1) disabled @endif">
            <a class="page-link" href="{{route('front_index', ['page'=>$pageSelected-1] + $prevQuery)}}" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        @foreach(range(1, ceil($allCount/$perPage)) as $page)
        <li class="page-item @if($pageSelected == $page) active @endif"><a class="page-link" @if($pageSelected != $page)href="{{route('front_index', ['page'=>$page] + $prevQuery)}}" @endif>{{$page}}</a></li>
        @endforeach
        <li class="page-item @if($pageSelected == ceil($allCount/$perPage)) disabled @endif">
            <a class="page-link" href="{{route('front_index', ['page'=>$pageSelected+1] + $prevQuery)}}">Next</a>
        </li>
    </ul>
</nav>
@endif
