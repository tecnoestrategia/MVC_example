<?php
/**
* The basic config file, with some constants
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
*/
  session_name('testMVC');
  session_start();

  date_default_timezone_set("Europe/Madrid");

  require_once 'lang/en.php';

  /**
  * Load TE/core classes
  * @TODO Implements a spl_autoload
  */

  require_once 'core/common/class/database.class.php';
  require_once 'core/common/class/date.class.php';
  require_once 'core/common/class/pages.class.php';
  require_once 'core/common/class/uploadfile.class.php';

  /**
  * constants to conect mysql server
  * @TODO Implements some interface to make N BD connections
  */
  define("database", "mvctest");
  define("host_db", "localhost");
  define("charset_db", "utf8");
  define("database_user", "mvctest");
  define("database_pass", "123456");
