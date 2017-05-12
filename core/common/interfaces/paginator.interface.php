<?php
interface iPaginator {
    public function __construct($total_count, $count_per_page, $current_page=1);
    public function getPaginationLimiter();
    public function getPaginationHelper();

    // These return iPaginatorPage objects
    public function getCurrentPage();
    public function getNextPage();
    public function getPreviousPage();

    public function getTotalCount();
    public function getCountPerPage();
    public function getPageCount(); // Calculated
}

/**
 * Page representation
 */
interface iPaginatorPage {
    public function __construct($page_number, $start, $end);

    public function getNumber();
    public function getStart();
    public function getEnd();
    public function getCount(); // Calculated
}

/**
 * Helper for rendering the UI
 */
interface iPaginationHelper {
    public function __construct(iPaginator $paginator);
    public function render();
}
;?>
