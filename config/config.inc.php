<?php
/**
* @author TecnoEstrategia <develop@tecnoestrategia.com>
*/
  session_name('testMVC');
  session_start();

  date_default_timezone_set("Europe/Madrid");
  
  require_once 'libs/database.php'; 
  require_once 'lang/es.php';
  require_once 'functions/date.php';
  
  /**
  * Params to conect mysql server
  * @const
  */
  define("database", "mvctest");
  define("host_db", "localhost");
  define("charset_db", "utf8");
  define("database_user", "mvctest");
  define("database_pass", "123456");
 
;?>
