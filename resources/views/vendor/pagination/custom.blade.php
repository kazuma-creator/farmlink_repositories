@if ($paginator->hasPages())
    <nav class="pagination-container" aria-label="Pagination">
        <div class="pagination-info">
            <p class="text-muted">
                {!! __('Showing') !!}
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                {!! __('of') !!}
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
        <div class="pagination-wrapper">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true">@lucideIcon('chevron-left')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif

<style>
    /* ページネーションのコンテナ */
.pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    z-index: 1000;
}

/* ページネーションラッパー */
.pagination-wrapper {
    display: flex;
    justify-content: flex-end;
}

/* ページ情報テキスト */
.pagination-info {
    align-self: flex-start;
}

.text-muted {
    color: #8b6e4b;
    font-size: 0.875rem;
    background-color: rgba(245, 222, 179, 0.8);
    padding: 0.5rem;
    border-radius: 0.5rem;
    backdrop-filter: blur(5px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* ページネーションの全体設定 */
.pagination {
    display: inline-flex;
    list-style: none;
    padding: 0.25rem;
    margin: 0;
    background-color: rgba(245, 222, 179, 0.8);
    border-radius: 0.5rem;
    backdrop-filter: blur(5px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #d3c6a8;
}

/* ページ項目 */
.page-item {
    margin: 0 0.25rem;
}

.page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #5a3d1b;
    text-decoration: none;
    background: transparent;
    border: none;
    border-radius: 0.375rem;
    transition: all 0.3s ease;
}

.page-link svg{
    width: 1.25rem;
    height: 1.25rem;
}

/* 無効状態 */
.page-item.disabled .page-link {
    color: #d3c6a8;
    cursor: not-allowed;
    opacity: 0.5;
}

/* アクティブページ */
.page-item.active .page-link {
    color: white;
    background: #5e853b;
    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
}

/* ホバー時 */
.page-link:hover:not(.disabled) {
    color: white;
    background: #79a55c;
    transform: scale(1.05);
}
.page-item.active .page-link svg {
    margin-right: 0.25rem;
}



/* アニメーション */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(1rem);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.pagination-container {
    animation: fadeInUp 0.5s ease-out;
}

.page-item {
    transition: transform 0.2s ease;
}

.page-item:active {
    transform: scale(0.95);
}

/* レスポンシブデザイン */
@media (max-width: 640px) {
    .pagination-container {
        flex-direction: column-reverse;
        align-items: center;
    }

    .pagination-wrapper {
        margin-bottom: 1rem;
    }

    .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }

    .page-item {
        margin: 0.25rem;
    }

    .text-muted {
        text-align: center;
        margin-bottom: 1rem;
    }
}
</style>