<div class="float-left" style="padding-top: 1em;">
  Tổng số <span class="font-weight-bold">{{ $paginator->total() }}</span> kết quả
</div>

@if ($paginator->hasPages())
  <ul class="pagination pagination m-0 mt-2 float-right">
    @if ($paginator->onFirstPage())
      <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
    @else
      <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a></li>
    @endif


    @foreach ($elements as $element)
      @if (is_string($element))
        <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
      @endif

      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <li class="page-item active"><a class="page-link active" href="#">{{ $page }}</a></li>
          @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
          @endif
        @endforeach
      @endif
    @endforeach

    @if ($paginator->hasMorePages())
      <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">&raquo;</a></li>
    @else
      <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
    @endif
  </ul>
@endif
