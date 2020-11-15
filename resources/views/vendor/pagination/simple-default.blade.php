@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a class="disabled btn btn-secondary mb-20 mr-10" href="#"><i class="fa fa-long-arrow-left mr-2"></i> @lang('pagination.previous')</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="bg-primary btn btn-secondary mb-20 mr-10" rel="prev"><i class="fa fa-long-arrow-left mr-2"></i> @lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="bg-primary btn btn-secondary mb-20 ml-10" rel="next">@lang('pagination.next') <i class="fa fa-long-arrow-right mr-2"></i></a></li>
        @else
            <li><a class="disabled btn btn-secondary mb-20 mr-10" href="#">@lang('pagination.next') <i class="fa fa-long-arrow-right mr-2"></i></a></li>
        @endif
    </ul>
@endif
