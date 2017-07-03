<?php
/**
* This file is = core/common/interfaces/paginator.interface.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
interface Paginator {
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
interface PaginatorPage {
    public function __construct($page_number, $start, $end);

    public function getNumber();
    public function getStart();
    public function getEnd();
    public function getCount(); // Calculated
}

/**
 * Helper for rendering the UI
 */
interface PaginationHelper {
    public function __construct(Paginator $paginator);
    public function render();
}
