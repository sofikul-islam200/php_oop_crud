<?php
class Database{

    public $HOST = DB_HOST;
    public $USER = DB_USER;
    public $PASS = DB_PASSWORD;
    public $NAME = DB_NAME;


    public $link;
    public $error;

    function __construct(){
         $this->ConnectDB();
    }



    private function ConnectDB(){
       $this->link =  new mysqli($this->HOST,$this->USER,$this->PASS,$this->NAME);
       if(!$this->link){
           $this->error = "Connection fail".$this->link->connect_error;
           return false;
       }
    }


    //retrive data from database
    public function Select($query){
       $result = $this->link->query($query) or die($this->link->error.__LINE__);
       if($result->num_rows > 0){
          return $result;
       }else{
         return false;
       }
    }

    //insert data into database
    public function Insert($query){
       $insert_rows = $this->link->query($query) or die($this->link->error.__LINE__);
       if($insert_rows){
         header("Location:index.php?msg=".urlencode('Data Insert Successfully Done'));
         exit();
       }else{
         die("Error : " . $this->link->errno);
       }
    }








}
