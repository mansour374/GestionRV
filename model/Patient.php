<?php
require "model/RendezVous.php";

class  Patient extends Model{
     
   public  $model = "Patient";
    public function __construct()
    {
        parent::__construct($this->model);
    }
    
   public function addPatient($data)
    {
        $this->create($data);

        


    }
}