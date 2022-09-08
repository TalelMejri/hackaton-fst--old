<?php
session_start();
$db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db));
   if(isset($_GET['delete'])){
    $id=$_GET['delete'];
     $db->query("delete from resident where id_resident=$id") or die($db->error);
     $_SESSION['message']="has been deleted";
     $_SESSION['msg_type']="danger";
     header("location:profil_admis.php");
}
?>