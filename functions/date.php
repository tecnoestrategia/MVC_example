<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
*/
class DateFunctions {
	public function thisyear(){
		/**
		* @return int Returns actual yer in 4 digits format
		*/
		return date(Y);
	}

	public function actual_mysql_date(){
		/**
		* @return int Returns actual date formating for sql sintax
		*/
		return date("Y-m-d");
	}

	public function actual_mysql_datetime(){
		/**
		* @return int Returns actual datetime formating for sql sintax
		*/
		return date("Y-m-d H:i:s");
	}

	public function actual_mysql_timestamp(){
		/**
		* @return int Returns actual timestap formating for sql sintax
		*/
		return date('F/j/Y',strtotime($result['postDate']));
	}

	public function weeks_in_month($month, $year){
		/**
		* @param int $month The numer of month
		* @param int $year The number of year in 4 digits
		* @return int $week Number of weeks for a month in year
		*/
    		$startDate = new DateTime();
    		$startDate->setDate($year, $month, 1);
				$loopDate = $startDate;
    		$week = 1;
    			for($i = $startDate->format('d'); $i <= cal_days_in_month(CAL_GREGORIAN, $month, $year); $i++){
        			if($loopDate->format('w') % 7 == 0){
					$week++;
				}
				$loopDate->modify('+1 day');
			}
    	return $week;
	}
}
;?>
