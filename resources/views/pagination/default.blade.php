@if (isset($paginator) && $paginator->lastPage() > 1)

    <ul class="pagination">
        <?php
        $interval = isset($interval) ? abs(intval($interval)) : 1 ;
        $from = $paginator->currentPage() - $interval;
        if($from < 1){
            $from = 1;
        }

        $to = $paginator->currentPage() + $interval;
        if($to > $paginator->lastPage()){
            $to = $paginator->lastPage();
        }
        ?>

        <!-- first/previous -->
        <?php
        $isFirst = $paginator->currentPage() == 1;
        ?>
        <li class="page-item {{ $isFirst ? 'disabled' : '' }}"">
            <a href="{{ $paginator->url(1) }}" aria-label="First" class="page-link" >
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <li class="page-item {{ $isFirst ? 'disabled' : '' }}"">
            <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="Previous" class="page-link">
                <span aria-hidden="true">&lsaquo;</span>
            </a>
        </li>

        <!-- links -->
        <?php
            if ( $paginator->currentPage() == 1) {
                $to += 1;
            }else if ( $paginator->currentPage() == $paginator->lastPage()) {
                $from -= 1;
            }
            ?>

        @for($i = $from; $i <= $to; $i++)
            <?php
            $isCurrentPage = $paginator->currentPage() == $i;
            ?>
            <li class="page-item {{ $isCurrentPage ? 'active' : '' }}">
                <a href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}"  class="page-link">
                    {{ $i }}
                </a>
            </li>
        @endfor

        <!-- next/last -->
        <?php
            $isLast = $paginator->currentPage() == $paginator->lastPage();
        ?>
        <li class="page-item {{ $isLast ? 'disabled' : '' }}"">
            <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next" class="page-link">
                <span aria-hidden="true">&rsaquo;</span>
            </a>
        </li>

        <li class="page-item {{ $isLast ? 'disabled' : '' }}"">
            <a href="{{ $paginator->url($paginator->lastpage()) }}" aria-label="Last" class="page-link">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
@endif
