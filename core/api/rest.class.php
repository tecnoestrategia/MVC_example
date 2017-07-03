<?php
/**
* This file is = core/common/api/rest.class.php
* @author TecnoEstrategia <develop@tecnoestrategia.com>
* @copyright TecnoEstrategia
* @license GPL
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @link https://github.com/tecnoestrategia This source code
**/
namespace TE\api;

 class Rest {
   public $type = "application/json";
   public $RequestData = array();
   private $_StateCode = 200;
   public function __construct() {
     $this->ProcEntry();
   }
   public function ShowResponse($data, $status) {
     $this->_StateCode = ($status) ? $status : 200;//si no se envía $status por defecto será 200
     $this->setCabecera();
     echo $data;
     exit;
   }
   private function setCabecera() {
     header("HTTP/1.1 " . $this->_StateCode . " " . $this->getStateCode());
     header("Content-Type:" . $this->type . ';charset=utf-8');
   }
   private function CleanRequest($data) {
     $entry = array();
     if (is_array($data)) {
       foreach ($data as $key => $value) {
         $entry[$key] = $this->CleanRequest($value);
       }
     } else {
       if (get_magic_quotes_gpc()) {
         $data = trim(stripslashes($data));
       }
       $data = strip_tags($data);
       $data = htmlentities($data);
       $entry = trim($data);
     }
     return $entry;
   }
   private function ProcEntry() {
     $metodo = $_SERVER['REQUEST_METHOD'];
     switch ($metodo) {
       case "GET":
         $this->RequestData = $this->CleanRequest($_GET);
         break;
       case "POST":
         $this->RequestData = $this->CleanRequest($_POST);
         break;
       case "DELETE":
       case "PUT":
         parse_str(file_get_contents("php://input"), $this->RequestData);
         $this->RequestData = $this->CleanRequest($this->RequestData);
         break;
       default:
         $this->response('', 404);
         break;
     }
   }
   private function getStateCode() {
     $status = array(
       200 => 'OK',
       201 => 'Created',
       202 => 'Accepted',
       204 => 'No Content',
       301 => 'Moved Permanently',
       302 => 'Found',
       303 => 'See Other',
       304 => 'Not Modified',
       400 => 'Bad Request',
       401 => 'Unauthorized',
       403 => 'Forbidden',
       404 => 'Not Found',
       405 => 'Method Not Allowed',
       500 => 'Internal Server Error');
     $response = ($status[$this->_StateCode]) ? $status[$this->_StateCode] : $status[500];
     return $response;
   }
 }
