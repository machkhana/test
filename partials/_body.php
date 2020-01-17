<?php
if (!isset($_SESSION['id'])) {
    include('login.php');
}else{
    if(isset($p)){
        if(file_exists('pages/'.$p.'.php')){
            include ('pages/'.$p.'.php');
        }else{
            header("Location:?p=home");
        }
    }
}
?>