
@if ($paginator->hasPages())
    <div class="product_pagination">
            {{-- Previous Page Link --}}
        <div class="left_btn" aria-disabled="true" >

        @if ($paginator->onFirstPage())
                <a  rel="prev" class="disabled" aria-disabled="true"  aria-label="@lang('pagination.previous')"><i class="lnr lnr-arrow-left"></i> Quay lại</a></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"  aria-label="@lang('pagination.previous')">
                    <i class="lnr lnr-arrow-left"></i> Quay lại</a>
            @endif
                </div>
            {{-- Pagination Elements --}}
        <div class="middle_list">
            <nav >
                <ul class="pagination">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item" aria-disabled="true"><a class="page-link" href="#">{{ $element }}</a></li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page"><a class="page-link" >{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
                </ul>
            </nav>
        </div>
        <div class="right_btn">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Tiếp <i class="lnr lnr-arrow-right"></i></a>
            @else
                <a class="disabled" rel="next">Tiếp <i class="lnr lnr-arrow-right"></i></a>
            @endif
        </div>
    </div>
@endif
