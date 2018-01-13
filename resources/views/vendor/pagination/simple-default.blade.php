@if ($paginator->hasPages())
  {{-- Previous Page Link --}}
  @if ($paginator->onFirstPage())
      <span class="disabled pagination-previous">@lang('pagination.previous')</span>
  @else
      <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
  @endif

  {{-- Next Page Link --}}
  @if ($paginator->hasMorePages())
      <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
  @else
      <span class="disabled pagination-next">@lang('pagination.next')</span>
  @endif
@endif
