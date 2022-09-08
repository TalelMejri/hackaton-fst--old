<?php
session_start();
$id=0;
$update=false;
$db = new mysqli('localhost' ,'root','','3imara') or die(mysqli_error($db));
if(isset($_POST['save'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $prenom=$_POST['prenom'];
    $avatar=$_POST['avatar'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cin=$_POST['cin'];
    $tel=$_POST['tel'];
    $nom_bloc=$_POST['bloc'];
    $num_chambre=$_POST['chambre'];
    if (empty($name)) {
        $_SESSION['message']="nom required ";
        $_SESSION['msg_type']="danger";
        header("location:resident.php");
    }
    else if (empty($prenom)) {
        $_SESSION['message']="prenom manager is required ";
        $_SESSION['msg_type']="danger";
        header("location:resident.php");
    }
    else if (empty($email)) {
        $_SESSION['message']="email manager is required ";
        $_SESSION['msg_type']="danger";  
        header("location:resident.php");
    }
    else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        $_SESSION['message']="please enter an email_manager valid ";
        $_SESSION['msg_type']="danger";
        header("location:resident.php");
    }
    else  if (empty($tel)) {
        $_SESSION['message']="Phone Number is required ";
        $_SESSION['msg_type']="danger";
        header("location:resident.php");
    }
    else if((strlen($tel)<8)){
        $_SESSION['message']="Phone Number should countaint 8 numbers ";
        $_SESSION['msg_type']="danger";
        header("location:resident.php");
    }
    else if (empty($avatar)) {
        $_SESSION['message']="avatar is required ";
        $_SESSION['msg_type']="danger";
        header("location:resident.php");
    }
    else if (empty($password)) {
        $_SESSION['message']="password is required ";
        $_SESSION['msg_type']="danger";
        header("location:resident.php");
    }
    else if (empty($cin)) {
        $_SESSION['message']="cin is required ";
        $_SESSION['msg_type']="danger";
        header("location:resident.php");
    }
else{
    $req=$db->query("select * from chambre where nom_chambre='$num_chambre'") or die ($db->error);
    if($req->num_rows){    
        $row=$req->fetch_array();
        $id_cherch=$row['id_chambre'];
    }      
    $db->query("INSERT INTO `resident` VALUES ('$id',' $id_cherch',' $name',' $prenom',' $avatar',' $email','$password','$cin','$tel',' $id_cherch')") or die($db->error);
    $_SESSION['message']="Record has been saved";
    $_SESSION['msg_type']='success';
    header("location:resident.php");
}
}
?>