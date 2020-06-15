{{--<nav>--}}
{{--    <ul class="pagination pagination-lg">--}}
{{--        <li>--}}
{{--            <a href="javascript:void(0);" class="waves-effect">--}}
{{--                <i class="material-icons">chevron_left</i>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li><a href="javascript:void(0);" class="waves-effect">1</a></li>--}}
{{--        <li><a href="javascript:void(0);" class="waves-effect">2</a></li>--}}
{{--        <li><a href="javascript:void(0);" class="waves-effect">3</a></li>--}}
{{--        <li><a href="javascript:void(0);" class="waves-effect">4</a></li>--}}
{{--        <li><a href="javascript:void(0);" class="waves-effect">5</a></li>--}}
{{--        <li>--}}
{{--            <a href="javascript:void(0);" class="waves-effect">--}}
{{--                <i class="material-icons">chevron_right</i>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-lg">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="waves-effec" aria-hidden="true"><i class="material-icons">chevron_left</i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="waves-effec" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="material-icons">chevron_left</i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="waves-effect">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="waves-effect">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="waves-effect" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="waves-effect" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="material-icons">chevron_right</i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="waves-effect" aria-hidden="true"><i class="material-icons">chevron_right</i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
