<?php $db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div></div>
    <div class="conta   iner">
<table class="table">
        <tr>
            <td>id</td>
            <td>id_facture</td>
            <td>nom</td>
            <td>prenom</td>
            <td>avatar</td>
            <td>email</td>
            <td>mot de passe</td>
            <td>tel</td>
            <td>id_chambre</td>
            <td>action</td>
        </tr>
        <?php 
            $res=$db->query("select * from syndicate ");
            if($res->num_rows){
                $row=$res->fetch_array();
                $ide=$row['id_bloc'];
            }
            $res0=$db->query("select * from chambre where id_bloc='$ide'") or die($db->error);
            if($res0->num_rows){
                $row=$res0->fetch_array();
                $ide_chambre=$row['id_chambre'];
            }
            while($row=$res0->fetch_assoc()){
                $r=$row['id_chambre'];
                print_r($row);
                $resf=$db->query("select * from resident where id_chambre='$ide'") or die($db->error);   
                $row=$resf->fetch_assoc();
                print_r($resf); 
            ?>
        <tr>
            <td><?php echo $row['id_resident'] ?></td>
            <td><?php echo $row['id_facture'] ?></td>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['prenom'] ?></td>
            <td><?php echo $row['avatar'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['cin'] ?></td>
            <td><?php echo $row['mot_de_passe'] ?></td>
            <td><?php echo $row['tel'] ?></td>
            <td><?php echo $row['id_chambre'] ?></td>
            <td>
                <a class="btn btn-danger" href="processsyndicate.php?delete=<?php echo $r ?>">delete</a>
                <a href="signup_syndicate.php?edit=<?php echo $r; ?>" class="btn btn-info" >edit</a>
            </td>
        </tr>
        <?php }?>
    </table>
    <button class="text-center submit-btn"><a href="lougoutsynd.php">log out</a></button>
    </div>
    <div class="container d-flex justify-content-right align-items-left">
<img width="500" src="./assets/images/real estate _ house, home, moving, estate, building, outgrow, man, people@2x.png" alt="mawadhi3">
       

</div>
</body>
</html>