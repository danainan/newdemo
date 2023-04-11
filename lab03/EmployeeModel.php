<?php
class EmployeeModel{
   // property
   public $firstName;
   // contructor
   function __construct($firstName) {
       $this->firstName = $firstName;
   }
   // method  // http://localhost/backend/models/EmployeeModel.php
   function getFirstName(){
       return $this->firstName;
   }
   function setFirstName($firstName){
       $this->firstName = $firstName;
   }
}
$o = new EmployeeModel("tumtpk");
echo $o->firstName." ".$o->getFirstName();
?>

