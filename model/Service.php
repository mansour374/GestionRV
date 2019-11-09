<?php
class  Service extends Model{
     
   public  $model = "Service";
    public function __construct()
    {
        parent::__construct($this->model);
    }
    public function getAll()
    {
        return $this->findAll();
    }
}