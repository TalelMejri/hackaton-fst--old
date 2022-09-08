<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>LOG IN as a resident</title>
</head>
<body>
<a class="submit-btn dash" href="login_admin.php">dashboard</a>
    <div class="container d-flex justify-content-center align-items-center">
        <form class="mt-5 p-5 shadow rounded" action="checkresident.php" method="POST">
             <h1 class="text-center mb-5">LOG resident</h1>
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
            <button type="submit" name="submit" class="submit-btn">SUBMIT</button>
            <a class="submit-btn" href="signup_syndicate.php">sign up</a>
        </form>
</div>
</body>
<script>


</script>
</html>