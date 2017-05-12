<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
*/
namespace TE\common;

class DateFunctions {
	/**
	* This class used in the common operations where's involved date,time, etc
	*/
	/**
	* @param int $thisyear actual year in 4 digits format
	* @return int $thisyear actual year in 4 digits format
	* @package common class
	*/
	public function thisyear(){
		/**
		* Sumary. metodh to return actual year
		*/
		/**
		* @return int Returns actual year in 4 digits format
		*/
		return date(Y);
	}

	public function actual_mysql_date(){
		/**
		* Use when you need obtains actual date y date format mysql
		*
		* @return int Returns actual date formating for sql sintax
		*/
		return date("Y-m-d");
	}

	public function actual_mysql_datetime(){
		/**
		* Use when you need actual datetime in sql
		*
		* @return int Returns actual datetime formating for sql sintax like Y-m-d H:i:s
		*/
		return date("Y-m-d H:i:s");
	}

	public function actual_mysql_timestamp(){
		/**
		* Use when you need set timestamp y mysql format
		*
		* @return int Returns actual timestap formating for sql sintax
		*/
		return date('F/j/Y',strtotime($result['postDate']));
	}

	public function weeks_in_month($month, $year){
		/**
		* Obtains how many week in a month
		*
		* @var int $month The numer of month
		* @var int $year The number of year in 4 digits
		* @return int $week Number of weeks for a month in year
		*/
    		$startDate = new \DateTime();
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
