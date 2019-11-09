<?php
class  RendezVous extends Model{
     
   public  $model = "Rendezvous";
    public function __construct()
    {
        parent::__construct($this->model);
    }
    
   public function addRv($data)
    {
        $this->create($data);
    }

     public function getLastRv()
    {
    $sql = "SELECT p.nom, p.prenom, p.age, p.telephone, p.sexe, r.date, r.heure, s.nom AS specialite FROM Patient p INNER JOIN Rendezvous r ON (p.id = r.patient_id) INNER JOIN Specialite s ON (s.id = r.specialite_id) INNER JOIN Service sr ON (sr.id = s.service_id) WHERE sr.id = ".$_SESSION['service_id']."";
  
    $q = $this->con->prepare($sql);

     $q->execute();

     $data = [];

     while ($row = $q->fetch(PDO::FETCH_OBJ)) {
         $data[] = $row;
     }

     return $data;
    }
}