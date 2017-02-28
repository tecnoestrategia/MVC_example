<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @link www.tecnoestrategia.com
*/
class DateFunctions {
	public function thisyear()
	{
	return date(Y);
	}
	public function actual_mysql_date(){
	return date("Y-m-d");
	}
	public function actual_mysql_datetime(){
	return date("Y-m-d H:i:s");
	}
	public function actual_mysql_timestamp(){
	return date('F/j/Y',strtotime($result['postDate']));
	}
	function weeks_in_month($month, $year){
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
