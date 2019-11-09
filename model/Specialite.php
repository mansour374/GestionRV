<?php
class  Specialite  extends Model{

  public   $model = "Specialite" ;

    public function __construct()
    {
      parent::__construct($this->model);
    }
    public function specialites() {

       return $this->findAll(['cond'=>["service_id"=>$_SESSION['service_id']]]);
    }
    
}