<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link href="style.css" rel= "stylesheet">
</head>
<body>
<?php $db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db)); 
    require_once "process.php";
?>
<a class="submit-btn dash" href="login_admin.php">dashboard</a>
<div class=" container d-flex justify-content-center align-items-center mt-5">
<div class="row justify-content-center div_form">
        <form class=" mt-1 p-5 shadow rounded" action="process.php" method="post">
            <?php if($update == true) : ?>
                <h1 class="text-center mb-5">UPDATE</h1>
                <?php else :  ?>
                    <h1 class="text-center mb-5">SIGN UP For Syndic</h1>
                <?php endif; ?>
                <?php if (isset($_SESSION['message'])){?>
             <div class="alert alert-<?= $_SESSION['msg_type']?>">
               <?php
               echo $_SESSION['message'];?>
             </div>
           <?php }?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="name" class="subtitle">name</label>
                <input type="text" class="" name="name" value="<?php echo $name; ?>" id="name">
            </div>
            <br>
            <div class="form-group">
                <label for="prenom" class="subtitle">prenom </label>
                <input type="text" class="" value="<?php echo $prenom; ?>" name="prenom" id="prenom">
            </div>
            <br>
            <div class="form-group">
                <label for="email" class="subtitle">email</label>
                <input type="email" class="" value="<?php echo $email; ?>" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="name" class="subtitle">password</label>
                <input type="text" class="" name="password" value="<?php echo $mot; ?>" id="name">
            </div>
            <br>
            <div class="form-group">
                <label for="tel" class="subtitle">tel</label>
                <input type="tel" class="" value="<?php echo $tel; ?>" name="tel" id="tel">
            </div>
            <br>
            <br>
            <div class="form-group ">
                <label for="avatar" class="subtitle">avatar</label>
                <input type="file" class="form-control" value="<?php echo $avatar; ?>" name="avatar" id="avatar">
            </div>
            <br>
            <?php 
            include "cherche_bloc.php";
          ?>
                <div class="form-group mb-4">
                <label for="bloc" class="subtitle">bloc</label>
                <select name="bloc" id="bloc">
                <?php while($row=$req->fetch_array()){?>
                    <option><?php  echo $row['nom_bloc'] ;?></option>
                <?php }?>
                </select>
            </div>
            <span class="form-group">
                <?php if($update == true) : ?>
                <button type="submit" class="btn btn-info" name="update">update</button>
                <?php else :  ?>
                <button type="submit" class="btn btn-primary" name="save">save</button>
                <?php endif; ?>
                </span>
        </form>
        <div class="Container">
            <img src="" alt="">
                </div>
    </div>
    </div>




         
    