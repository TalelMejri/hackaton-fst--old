<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>LOG IN</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center">
    <div class="container d-flex justify-content-right align-items-center">
        <form class="mt-5 p-5 shadow rounded" action="login_admin.php" method="POST">
             <h1 class="text-center mb-5">Admin Log In</h1>
             <?php
                if(isset($_GET['error'])){
             ?>
             <div class="alert alert-danger" role="alert">
               <?= $_GET['error']; ?>
                </div>
             <?php }?>
             <input type="hidden" name="id">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label subtitle">email</label>
              <input type="text" class="" id="exampleInputPassword1" name="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label subtitle">Password</label>
              <input type="password" class="" id="exampleInputPassword1" name="password">
               <p id="message">password is <span id="str"></span></p>
            </div>
            <div>
            <button type="submit" name="submit" class="submit-btn">SUBMIT</button>
            <a href="login_resident.php">Are You A resident ?
            </a>
            <a href="login_syndicate.php">Or are you a Syndivate ?</a>        
                </div>
        </form>

       <div class="container">
        <img width="400" src="./assets/images/security _ lock, key, login, safety, protection, padlock, locked, unlock@2x.png" alt="">
       </div>
    </div>
</div>
<script >
var pass=document.getElementById("password");
var mess=document.getElementById("message");
var str=document.getElementById("str");
 pass.addEventListener("input",()=>{
     if(pass.value.length>0){
         mess.style.display="block";
     }
     else{
         mess.style.display="none";
     }
     if(pass.value.length<4){
         str.innerHTML="weak";
         pass.style.borderColor="red";
         mess.style.color="red";
     }
     else if
       ((pass.value.length>4) &&( pass.value.length<8)){
            str.innerHTML="medium";
            pass.style.borderColor="yellow";
            mess.style.color="yellow";
        }
        else if( pass.value.length>8){
            str.innerHTML="strong";
            pass.style.borderColor="green";
            mess.style.color="green";
        }
 })
</script>
</body>
</html>
