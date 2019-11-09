<?php
class Model
{
    public $con;
    private $model = '';
    public $validator;

    public function __construct($model)
    {
        $db = new Db();
        $this->con = $db->connect();
        $this->model = $model;
    }
   
    public function findAll(array $options = null)
    {
        $sql = "SELECT * FROM  ".$this->model." ";
        if(!empty($options['cond'])){
            $sql.=" WHERE ";
            $cond = $options['cond'];
            foreach ($cond as $k => $v) {
                $sql.= $k. "='". $v. "' AND ";
            }
        }
       $q = $this->con->prepare(trim($sql,"AND "));

        if($q->execute()){
            $data = [];
            while ($row = $q->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
            return $data;
        }
        
    }

    public function findBy(string $property, $value)
    {
        $sql = "SELECT * FROM ".$this->model." WHERE  ".$property;
        if(is_int($value)){
        $sql.= "=".$value;
        }else{
        $sql.= "='".$value."'";

        }

        $q = $this->con->prepare($sql);

        $q->execute();

        return $q->fetchAll(PDO::FETCH_ASSOC);

    }

    public function create(array $data)
    {


        $sql = "INSERT INTO ".$this->model." SET ";

        foreach ($data as $k => $v) {
            $v = ($v != NULL || $v != "")? $v : null;
            if(is_int($v) || is_null($v) || $v == ""){
              $sql.= $k." = ".$v.", ";
            }else{
                $sql.= $k." = '".$v."', ";
            }
        }

        $sql = trim($sql,", ");


       $q = $this->con->prepare($sql);

        if($q->execute()){
            return 1;
        }
    }

    public function update(int $id, array $data)
    {
        $sql = "UPDATE ".$this->model." SET ";

        foreach ($data as $k => $v) {

            $v = ($v != NULL || $v != "")? $v : null;
            if(is_int($v) || is_null($v) || $v == ""){
              $sql.= $k."=".$v.", ";
            }else{
                $sql.= $k."='".$v." ', ";
            }
        }

        $sql = trim($sql,", ");

        $sql.= " WHERE id=".$id;
        
        $q = $this->con->prepare($sql);

        $q->execute();
    }

    public function delete($id)
    {
      $this->con->exec("DELETE  FROM ".$this->model." WHERE id=".$id);
    }
    

    public function searchWith(string $property, $value)
    {
        $sql = "SELECT * FROM `".$this->model."` WHERE `".$property."` like :searchVal";
        $q = $this->con->prepare($sql);
        $val = "%$value%";
        $q->bindParam(':searchVal', $val , PDO::PARAM_STR);   
        $q->execute();

        $Count = $q->rowCount(); 
        //echo " Total Records Count : $Count .<br>" ;
                    
        $result = [];
        if ($Count  > 0){
            while($data=$q->fetch(PDO::FETCH_ASSOC)) {   
                $result [] = $data;
            }
            return $result;
        }
    }

    public function is_exist($params)
    {
       $sql = "SELECT * FROM ".$this->model." WHERE ";

       foreach ($params as $k => $v) {
           $sql.= $k." = ".$v." AND ";
       }

       $q = $this->con->prepare(trim($sql," AND "));

      return $q->fetchColumn();
    }


}
