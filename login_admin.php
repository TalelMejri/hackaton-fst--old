<?php
session_start();
$db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db));
if ( isset($_POST['email']) &&  isset($_POST['password']) ){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    if((empty($email) == true ) OR (empty($pass) == true)){
        header("location:log_in.php?error=you must fill in all the fields !");
    } 
    else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {       
        header("location:log_in.php?error=Enter a valid email!");
    }
     else{
        $req=$db->query("select * from admin where email='$email' AND mot_de_passe='$pass'") or die($db->error);
        if($req->num_rows){
            $row=$req->fetch_array();
            if($row['email']===$email && $row['mot_de_passe']===$pass){
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['avatar'] = $row['avatar'];
                header("location:profil_admis.php");
            }
    }  
    else{
        header("location:log_in.php?error=Incorrect username or password!");
    }
 } 
}
else{
    header("location:log_in.php");
}
     
