<?php


namespace ishop;


class ErrorHandler
{  public function __construct(){
    if (DEBUG){
        error_reporting(-1);
    }else{
        error_reporting(0);
    }
    set_exception_handler([$this,'exceptionHandler']);

}
    public function exceptionHandler($e){
      $this->logErrors($e->getMessage() , $e->getFile(), $e->getLine());
      $this->displayError('Exlusion', $e->getMessage(), $e->getFile(), $e->getLine() , $e->getCode());
    }
    public function logErrors($message = '',$file = '',$line = ''){
        error_log("[" . date('Y-m-d H:i:s') . "] Text error: {$message} |
          File: {$file}  | Line: {$line}\n============\n" , 3, ROOT . "/tmp/errors.log" );

    }
    protected function displayError($errno,$errstr,$errfile,$errline,$responce = 404){
        http_response_code($responce);
        if ($responce == 404 && !DEBUG){
            require_once WWW . "/errors/404.php";
            die;
        }
        if (DEBUG){
            require_once  WWW . "/errors/development.php";
        }else{
            require_once  WWW . "/errors/prodaction.php";
        }
        die;
    }



}