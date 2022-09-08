<?php
session_start();
$db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db));
if ( isset($_POST['email']) &&  isset($_POST['password']) ){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    if((empty($email) == true ) OR (empty($pass) == true)){
        header("location:login_resident.php?error=you must fill in all the fields !");
    } 
    else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {       
        header("location:login_resident.php?error=Enter a valid email!");
    }
     else{
        $req=$db->query("select * from resident where email='$email' AND password='$pass'") or die($db->error);
        if($req->num_rows){
            $row=$req->fetch_array();
            if($row['email']===$email && $row['password']===$pass){
                $_SESSION['id_resident'] = $row['id_resident'];
                $_SESSION['id_facture'] = $row['id_facture'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['avatar'] = $row['avatar'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['cin'] = $row['cin'];
                $_SESSION['tel'] = $row['tel'];
                $_SESSION['id_chambre'] = $row['id_chambre'];
                header("location:profilresident.php");
            }
    }  
    else{
        header("location:profilresident.php?error=Incorrect username or password!");
    }
 } 
}
else{
    header("location:profilresident.php");
}
     