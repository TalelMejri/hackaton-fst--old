<?php 
    $db=new mysqli("localhost","root","","3imara") or die(mysqli_error($db));
    $req=$db->query("select nom_bloc from bloc");
?>