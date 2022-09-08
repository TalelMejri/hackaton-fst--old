<?php
 $db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db));
 /** second commit */
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>log out</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .data {
    display: grid;
    grid-template-columns: repeat(3, 1fr);/
    
}
    a{
        text-decoration: none ;
    }
    body{
        margin-top: 3%;
        margin-left:6%;
    }
</style>
<body class=" ">
<a class="submit-btn dash" href="login_admin.php">dashboard</a>
    <div class="Container data"> 
    <div>   
    <?php $db= new mysqli('localhost' , 'root', '', '3imara') or die(mysqli_error($db));
    $req=$db->query("select * from facture where type='steg'");
    if($req->num_rows){    
        $row=$req->fetch_array();
        $montant=$row['montant'];
        $date_arrive=$row['date_arrive'];
        $date_delee=$row['date_delee'];
        $paye=$row['paye'];
        $nom_bloc=$row['nom_bloc'];
    }
    $req=$db->query("select * from bloc where nom_bloc='$nom_bloc'");
    if($req->num_rows){
    $row=$req->fetch_array();
    $id_bloc=$row['id_bloc'];
    }
    $req=$db->query("select * from syndicate where id_bloc='$id_bloc'");
    if($req->num_rows){
        $row=$req->fetch_array();
        $sindicate_nom=$row['nom'];
        $sindicate_prenom=$row['prenom'];
    }
    ?>
    <div class="card" style="width: 18rem;">
        <img src="steg.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title align-middle" style="text-align: center;">facture steg</h5>
                <div >
                <div >montant :<?php echo $montant ;?></div><br>
                <div >date arrivé :<?php echo $date_arrive ;?></div><br>
                <div >date delee :<?php echo $date_delee ;?></div><br>
                <div >sindicate nom : <?php echo $sindicate_nom ;?> <br>sindicate prenom : <?php echo $sindicate_prenom ;?></div><br>
                <center>
                <?php if($paye==0) : ?>
                    <div class="col"><button class="btn btn-danger">cette facture n'est pas paye</button></div><br>
                <?php else : ?>
                    <div class="col"><button class="btn btn-success">cette facture est paye</button></div><br>
                <?php endif; ?>
                </center> 
            </div>
        </div>
    </div>
    </div>
    <?php $db= new mysqli('localhost' , 'root', '', '3imara') or die(mysqli_error($db));
    $req=$db->query("select * from facture where type='sonned'");
    if($req->num_rows){    
        $row=$req->fetch_array();
        $montant=$row['montant'];
        $date_arrive=$row['date_arrive'];
        $date_delee=$row['date_delee'];
        $paye=$row['paye'];
        $nom_bloc=$row['nom_bloc'];
    }
    $req=$db->query("select * from bloc where nom_bloc='$nom_bloc'");
    if($req->num_rows){
    $row=$req->fetch_array();
    $id_bloc=$row['id_bloc'];
    $req=$db->query("select * from syndicate where id_bloc='$id_bloc'");
    if($req->num_rows){
        $row=$req->fetch_array();
        $sindicat=$row['nom'];
        $sindi=$row['prenom'];
    }}
    
    ?>
     <div class="card" style="width: 18rem;">
        <img src="sonede.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title align-middle" style="text-align: center;">facture sonede</h5>
            <div class="">
                <div class="">montant :<?php echo $montant ;?></div><br>
                <div class="">date arrivé :<?php echo $date_arrive ;?></div><br>
                <div class="">date delee :<?php echo $date_delee ;?></div><br>
                <div class="">sindicate nom : <?php echo $sindicat ;?> <br>sindicate prenom : <?php echo $sindi ;?></div><br>
                <?php if($paye==0) : ?>
                    <center>
                    <div class="col"><button class="btn btn-danger">cette facture n'est pas paye</button></div><br>
                <?php else : ?>
                    <div class="col"><button class="btn btn-success">cette facture est paye</button></div><br>
                <?php endif; ?>
                    </center>
            </div>
        </div>
    </div>
    
    <div>
    <?php $db= new mysqli('localhost' , 'root', '', '3imara') or die(mysqli_error($db));
    $req=$db->query("select * from facture where type='location'");
    if($req->num_rows){    
        $row=$req->fetch_array();
        $montant=$row['montant'];
        $date_arrive=$row['date_arrive'];
        $date_delee=$row['date_delee'];
        $paye=$row['paye'];
        $nom_bloc=$row['nom_bloc'];
    }
    $req=$db->query("select * from bloc where nom_bloc='$nom_bloc'");
    if($req->num_rows){
    $row=$req->fetch_array();
    $id_bloc=$row['id_bloc'];
    $req=$db->query("select * from syndicate where id_bloc='$id_bloc'");
    if($req->num_rows){
        $row=$req->fetch_array();
        $sindicate_nom=$row['nom'];
        $sindicate_prenom=$row['prenom'];
    }}
    ?>
    <div>
    <div class="card" style="width: 18rem;">
        <img src="logo_location.png" class="card-img-top" alt="..."> 
        
        <div class="card-body">
            <h5 class="card-title align-middle" style="text-align: center;">facture location : </h5>
            <div>
                <div class="">montant :<?php echo $montant ;?></div><br>
                <div class="">date arrivé :<?php echo $date_arrive ;?></div><br>
                <div class="">date delee :<?php echo $date_delee ;?></div><br>
                <div class="">sindicate nom : <?php echo $sindicate_nom ;?>  <br>sindicate prenom : <?php echo $sindicate_prenom ;?></div><br>
                <center>
                <?php if($paye==0) : ?>
                    <div class="col"><button class="btn btn-danger">cette facture n'est pas paye</button></div><br>
                <?php else : ?>
                    <div class="col"><button class="btn btn-success">cette facture est paye</button></div><br>
                <?php endif; ?>
                </center>
            </div>
        </div>
    </div>
    <button class="btn btn-danger" id="btn_out"><a href="logout_resident.php">log out</a></button>
</body>

</html>