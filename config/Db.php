<?php

class Db{

    public $conf= array(
  
        'host' => 'localhost',
        'database' => 'rendezvous',
        'login' => 'mansour',
        'password' =>'Passer',
    
);

 public $_connect ;

   public function __construct()
   {
    try{
        $this->_connect = new PDO(
            'mysql:host='.$this->conf['host'].';dbname='.$this->conf['database'].';',
            $this->conf['login'],
            $this->conf['password'],
           array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
       );  
        $this->_connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        
       }catch(PDOException $e){
               die($e->getMessage());
          
       } 
   }

   public function connect()
   {
       return $this->_connect;
   }
   
  
  
}
