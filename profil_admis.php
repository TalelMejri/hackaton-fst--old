<?php
 $db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db));

 session_start();
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
<body>
<a class="submit-btn dash" href="login_admin.php">dashboard</a>
    <div class="container justify-align-center"> 
    <h1 class="text-center"><?php echo $_SESSION['nom']; ?></h1>
     <a class="mb-3 btn btn-warning" href="signup_syndicate.php">ADD SYNDICATE</a>
    <?php if (isset($_SESSION['message'])){?>
             <div class="alert alert-<?= $_SESSION['msg_type']?>">
               <?php
               echo $_SESSION['message'];?>
             </div>
           <?php }?>
           <?php 
           $res=$db->query("select * from syndicate order by id_synd ASC ") or die($db->error);
           while($row=$res->fetch_assoc()){
                 $r=$row['verify'];
                }
                if($r==0) : 
              ?>
    <table class="table">
        <tr>
            <td>nom</td>
            <td>accepter ou non</td>
        </tr>
        <?php 
            $res=$db->query("select * from syndicate order by id_synd ASC ") or die($db->error);
            while($row=$res->fetch_assoc()){
                $rd=$row['id_synd'];
        ?>
        <tr>
            <td><?php echo $row['nom'] ?> | 
                <a href="process.php?regete=<?php echo $rd; ?>" class="btn btn-warning">regeter</a> 
                <a href="process.php?verife=<?php echo $rd; ?>" class="btn btn-warning">confirmation</a> 
            </td>
            <td> <?php if($row['verify']==0) :?>
                     non
                     <?php else :?>
                     accepter
                    <?php endif;?> 
            </td>
        </tr>
        <?php }?>
    </table>
    <?php  else:
              ?>
    <table class="table">
        <tr>
            <td>id</td>
            <td>nom</td>
            <td>prenom</td>
            <td>avatar</td>
            <td>email</td>
            <td>mot de passe</td>
            <td>tel</td>
            <td>id_bloc</td>
            <td>action</td>
        </tr>
        <?php 
            $res=$db->query("select * from syndicate order by id_synd ASC ") or die($db->error);
            while($row=$res->fetch_assoc()){
                $r=$row['id_synd'];
        ?>
        <tr>
            <td><?php echo  $row['id_synd'] ?></td>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['prenom'] ?></td>
            <td><?php echo $row['avatar'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['mot_de_passe'] ?></td>
            <td><?php echo $row['tel'] ?></td>
            <td><?php echo $row['id_bloc'] ?></td>
            <td>
                <a class="btn btn-danger" href="process.php?delete=<?php echo $r ?>">delete</a>
                <a href="signup_syndicate.php?edit=<?php echo $r; ?>" class="btn btn-info" >edit</a>
            </td>
        </tr>
        <?php }?>
    </table>
    <?php endif; ?>
    <table class="table">
        <tr>
            <td>id</td>
            <td>nom</td>
            <td>prenom</td>
            <td>avatar</td>
            <td>email</td>
            <td>mot de passe</td>
            <td>tel</td>
            <td>id_bloc</td>
            <td>action</td>
        </tr>
        <?php 
            $res=$db->query("select * from syndicate order by id_synd ASC ") or die($db->error);
            while($row=$res->fetch_assoc()){
                $r=$row['id_synd'];
        ?>
        <tr>
            <td><?php echo  $row['id_synd'] ?></td>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['prenom'] ?></td>
            <td><?php echo $row['avatar'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['mot_de_passe'] ?></td>
            <td><?php echo $row['tel'] ?></td>
            <td><?php echo $row['id_bloc'] ?></td>
            <td>
                <a class="btn btn-danger" href="process.php?delete=<?php echo $r ?>">delete</a>
                <a href="signup_syndicate.php?edit=<?php echo $r; ?>" class="btn btn-info" >edit</a>
            </td>
        </tr>
        <?php }?>
    </table>
       <h2 class="text-center">RESIDENT for SYNDICAT :</h2>
          <?php
           $req=$db->query("select * from resident") or die($db->error); 
           if($req->num_rows){
               $row=$req->fetch_array();
               $id=$row['id_chambre'];
           }
           $req0=$db->query("select * from chambre where id_chambre='$id' ") or die($db->error);
           if($req0->num_rows){
            $row=$req0->fetch_array();
            $idd=$row['id_bloc'];
         }
?>
   <table class="table">
        <tr>
            <td>id</td>
            <td>nom</td>
            <td>prenom</td>
            <td>avatar</td>
            <td>email</td>
            <td>mot de passe</td>
            <td>tel</td>
            <td>id_bloc</td>
            <td>action</td>
        </tr>
        <?php 
            $res2=$db->query("select * from resident ") or die($db->error);
            while($row=$res2->fetch_assoc()){
                $r=$row['id_resident'];     
        ?>
        <tr>
            <td><?php echo  $row['id_resident'] ?></td>
            <td><?php echo $row['id_facture'] ?></td>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['prenom'] ?></td>
            <td><?php echo $row['avatar'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['cin'] ?></td>
            <td><?php echo $row['tel'] ?></td>
            <td><?php echo $row['id_chambre'] ?></td>
            <td>
                <a class="btn btn-danger" href="processsyndicate.php?delete=<?php echo $r ?>">delete</a>
                <a href="signup_syndicate.php?edit=<?php echo $r; ?>" class="btn btn-info" >edit</a>
            </td>
        </tr>
        <?php }?>
    </table> 
    <button class="text-center submit-btn"><a href="logout_admis.php">log out</a></h3>
    </div>            
</body>
</html>