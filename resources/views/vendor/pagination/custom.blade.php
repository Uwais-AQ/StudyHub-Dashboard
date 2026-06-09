@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center" style="gap: 8px;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" style="background-color: #f5f0eb; border-color: #ddd5cc; color: #a89f94; border-radius: 8px; padding: 8px 16px; font-size: 14px;">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" style="background-color: #efe9e3; border-color: #ddd5cc; color: #5c5348; border-radius: 8px; padding: 8px 16px; font-size: 14px; transition: all 0.2s;">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" style="background-color: transparent; border: none; color: #8a8075; padding: 8px 12px; font-size: 14px;">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link" style="background-color: #5c5348; border-color: #5c5348; color: #efe9e3; border-radius: 8px; padding: 8px 16px; font-size: 14px; font-weight: 500;">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}" style="background-color: #efe9e3; border-color: #ddd5cc; color: #5c5348; border-radius: 8px; padding: 8px 16px; font-size: 14px; transition: all 0.2s;">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" style="background-color: #efe9e3; border-color: #ddd5cc; color: #5c5348; border-radius: 8px; padding: 8px 16px; font-size: 14px; transition: all 0.2s;">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" style="background-color: #f5f0eb; border-color: #ddd5cc; color: #a89f94; border-radius: 8px; padding: 8px 16px; font-size: 14px;">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif