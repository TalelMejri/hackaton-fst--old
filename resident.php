<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>resident</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
include 'resident_check.php'; ?>
<body>
<a class="submit-btn dash" href="login_admin.php">dashboard</a>
    <canvas class="webgl"></canvas>
    <div class="container d-flex justify-content-center align-items-center ">
        <form class=" p-5 shadow rounded" action="resident_check.php" method="post">
            <h1>sign up resident</h1>
        <?php if (isset($_SESSION['message'])){?>
             <div class="alert alert-<?= $_SESSION['msg_type']?>">
               <?php
               echo $_SESSION['message'];?>
             </div>
           <?php }?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="" name="name" value="" id="name">
            </div>
            <br>
            <div class="form-group">
                <label for="prenom">prenom </label>
                <input type="text" class="" value="" name="prenom" id="prenom">
            </div>
            <br>
            <div class="form-group">
                <label for="avatar">avatar</label>
                <input type="file" class="" value="" name="avatar" id="avatar">
            </div>
            <br>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="" value="" name="email" id="email">
            </div>
            <br>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="" value="" name="password" id="password">
            </div>
            <br>
            <div class="form-group">
                <label for="cin">cin</label>
                <input type="cin" class="" value="" name="cin" id="cin">
            </div>
            <br>
            <div class="form-group">
                <label for="tel">tel</label>
                <input type="tel" class="" value="" name="tel" id="tel">
            </div>
            <br>
            <?php 
            include "cherche_bloc.php";
          ?>
            <div class="form-group">
                <label for="bloc">bloc</label>
                <select name="bloc" id="bloc">
                <?php while($row=$req->fetch_array()){?>
                    <option><?php  echo $row['nom_bloc'] ;?></option>
                <?php }?>
                </select>
            </div>
            <br>
            <?php 
            $db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db));
            $req=$db->query("select nom_chambre from chambre");
            ?>
            <div class="form-group">
                <label for="chambre">chambre</label>
                <select name="chambre" id="chambre">
                <?php while($row=$req->fetch_array()){?>
                    <option><?php  echo $row['nom_chambre'] ;?></option>
                <?php }?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <?php if($update == true) : ?>
                <button type="submit" class="submit-btn" name="update">update</button>
                <?php else :  ?>
                <button type="submit" class="submit-btn" name="save">Sign up</button>
                <?php endif; ?>
                <a class="submit-btn" href="login_resident.php">log in</a>
            </div>
        </form>
    </div>
</body>
</html>