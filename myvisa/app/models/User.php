<?php
require(MODELS . "/connexion.php");
class User extends connection
{
    public $id;
    public $last_name;
    public $first_name;

    public $nationality;


    public function read()
    {
        $sql = "SELECT * FROM user";
        $req = mysqli_query($this->connect(), $sql);
        return $req;
    }

    public function readOne($id)
    {
        $sql = "SELECT * FROM user WHERE id_user = '$id'";
        $req = mysqli_query($this->connect(), $sql);

        $row = mysqli_fetch_assoc($req);

        $this->id = $row['id_user'];
        $this->last_name = $row['last_name'];
        $this->first_name = $row['first_name'];
        $this->nationality = $row['nationality'];
    }

    public function insert()
    {
        $sql = "INSERT INTO `user` (`id_user`, `first_name`, `last_name`,  `nationality`) VALUES ('$this->id', '$this->last_name' , '$this->first_name', '$this->nationality')";
        $req = mysqli_query($this->connect(), $sql);
        return true;

    }






}

?>