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
}
;?>
