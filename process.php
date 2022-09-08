<?php 
    session_start();
    $id=0;
    $update=false;
    $name='';
    $prenom='';
    $avatre='';
    $email='';
    $tel='';
    $mot='';
    $id_cherch=0;
    $r=0;
    
    $db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db));
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        $res=$db->query("select * from syndicate where id_synd=$id") or die($db->error);
        if($res->num_rows){
            $row=$res->fetch_array();
            $name=$row['nom'];
            $email=$row['email'];
            $prenom=$row['prenom'];
            $tel=$row['tel'];
            $mot=$row['mot_de_passe'];
            $avatre=$row['avatar'];
        }
    }
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
         $db->query("delete  from syndicate where id_synd=$id") or die($db->error);
         $_SESSION['message']="has been deleted";
         $_SESSION['msg_type']="danger";
         header("location:profil_admis.php");
    }
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $no=$_POST['name'];
        $pre=$_POST['prenom'];
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $tel=$_POST['tel'];
        $ava=$_POST['avatar'];
        $req=$db->query("UPDATE `syndicate` SET `nom`='$no',`prenom`='$pre',`avatar`='$ava',`email`=' $email',`mot_de_passe`=' $pass',`tel`='$tel' WHERE id_synd=$id") or die($db->error);
         $_SESSION['message']="has been updated ";
         $_SESSION['msg_type']="info";
         header("location:profil_admis.php");
    }
if(isset($_POST['save'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $prenom=$_POST['prenom'];
    $avatar=$_POST['avatar'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $tel=$_POST['tel'];
    $nom_bloc=$_POST['bloc'];
    if (empty($name)) {
         $_SESSION['message']="nom required ";
         $_SESSION['msg_type']="danger";
         header("location:signup_syndicate.php");
    }
    else if (empty($prenom)) {
        $_SESSION['message']="prenom manager is required ";
        $_SESSION['msg_type']="danger";
        header("location:signup_syndicate.php");
    }
    else if (empty($email)) {
        $_SESSION['message']="email manager is required ";
        $_SESSION['msg_type']="danger";  
        header("location:signup_syndicate.php");
    }
   else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        $_SESSION['message']="please enter an email_manager valid ";
        $_SESSION['msg_type']="danger";
        header("location:signup_syndicate.php");
    }
  else  if (empty($tel)) {
        $_SESSION['message']="Phone Number is required ";
        $_SESSION['msg_type']="danger";
        header("location:signup_syndicate.php");
    }
   else if((strlen($tel)<8)){
        $_SESSION['message']="Phone Number should countaint 8 numbers ";
        $_SESSION['msg_type']="danger";
        header("location:signup_syndicate.php");
    }
   else if (empty($avatar)) {
        $_SESSION['message']="avatar is required ";
        $_SESSION['msg_type']="danger";
        header("location:signup_syndicate.php");
    }
    else if (empty($password)) {
        $_SESSION['message']="password is required ";
        $_SESSION['msg_type']="danger";
        header("location:signup_syndicate.php");
    }
else{
    $req=$db->query("select * from bloc where nom_bloc='$nom_bloc'");
    if($req->num_rows){    
        $row=$req->fetch_array();
        $id_cherch=$row['id_bloc'];
    }
    $db->query("INSERT INTO `syndicate`(`id_synd`, `nom`, `prenom`, `avatar`, `email`, `mot_de_passe`, `tel`, `id_bloc`) VALUES ('$id','$name','$prenom',' $avatar',' $email',' $password','$tel','$id_cherch')") or die ($db->error);
    $_SESSION['message']="Record has been saved";
    $_SESSION['msg_type']='success';
    header("location: profil_admis.php");
}
}

if(isset($_GET['verife'])){
    $id=$_GET['verife'];
    $verify=1;
    $req=$db->query("UPDATE `syndicate` SET `verify`='$verify' WHERE id_synd=$id") or die($db->error);
    print_r($req);
    $_SESSION['message']="Record has been confirmed !!";
    $_SESSION['msg_type']='success';
    header("location:profil_admis.php");
}

if(isset($_GET['regete'])){
    $id=$_GET['regete'];
    $verify=1;
    $req=$db->query("UPDATE `syndicate` SET `verify`='$verify' WHERE id_synd=$id") or die($db->error);
    $db->query("delete  from syndicate where id_synd=$id") or die($db->error);
    $_SESSION['message']="REGETER !!";
    $_SESSION['msg_type']='danger';
    header("location:profil_admis.php");
}
?>