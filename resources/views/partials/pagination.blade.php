@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" style="display: flex; justify-content: center; align-items: center; gap: 0.5rem; flex-wrap: wrap; margin-top: 3rem;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="opacity: 0.4; cursor: not-allowed; display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-weight: 600; font-size: 0.875rem; background: var(--color-bg-alt); color: var(--color-text-muted);">
                &laquo; Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-weight: 600; font-size: 0.875rem; background: #ffffff; color: var(--color-text); text-decoration: none; transition: all 0.2s ease;">
                &laquo; Prev
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; color: var(--color-text-muted);">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 0.875rem; border: 1px solid var(--color-primary-blue); border-radius: var(--radius-md); font-weight: 700; font-size: 0.875rem; background: var(--color-primary-blue); color: #ffffff;">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 0.875rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-weight: 600; font-size: 0.875rem; background: #ffffff; color: var(--color-text); text-decoration: none; transition: all 0.2s ease;">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-weight: 600; font-size: 0.875rem; background: #ffffff; color: var(--color-text); text-decoration: none; transition: all 0.2s ease;">
                Next &raquo;
            </a>
        @else
            <span style="opacity: 0.4; cursor: not-allowed; display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 1rem; border: 1px solid var(--color-border); border-radius: var(--radius-md); font-weight: 600; font-size: 0.875rem; background: var(--color-bg-alt); color: var(--color-text-muted);">
                Next &raquo;
            </span>
        @endif
    </nav>
@endif
