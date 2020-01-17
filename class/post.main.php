<?php
if(isset($_POST['login'])){
    if(isset($_POST['username'])){$username=$sql->real_escape_string($_POST['username']);}
    if(isset($_POST['password'])){$password=$sql->real_escape_string($_POST['password']);}
    if(empty($username) && empty($password)){
        $message = "შეავსეთ ავტორიზაციის ველები!";
    }else{
        $hashpassword=md5($password);
        $check_user=$login->UserLogin($username,$hashpassword);
        if($check_user == false){
            $message = "სახელი ან პაროლი არასწორია!";
        }else{
            if($check_user == 1){
                $_SESSION['id']=$check_user;
                header("Location:?p=home");
            }
        }
    }
}
if(isset($_POST['addinfo'])){
    if(isset($_POST['title'])){$title=$sql->real_escape_string($_POST['title']);}
    if(isset($_POST['text'])){$text=$sql->real_escape_string($_POST['text']);}
    $image = $_FILES['file']['name'];
    $dirname = './images/'.$image;
    if(empty($title) && empty($text)){
        $message = "შეავსეთ ველები!";
    }else{
        $result=$info->create($title,$text,$image);
        if($result==true){//ფუნქცია დააბრუნებს თანხმობას და შემდეგ ატვირთავს
            move_uploaded_file($_FILES['file']['tmp_name'],$dirname);
        }
        header("Location:?p=home");//გვერდზე გადამისამართება, რეფრეშის შემდეგ რომ აღარ დაამატოს
        exit();
    }
}
if(isset($_POST['editinfo'])){
    if(isset($_POST['id'])){$id=$sql->real_escape_string($_POST['id']);}
    if(isset($_POST['title'])){$title=$sql->real_escape_string($_POST['title']);}
    if(isset($_POST['text'])){$text=$sql->real_escape_string($_POST['text']);}
    $image = $_FILES['file']['name'];
    $dirname = './images/'.$image;
    if(empty($title) && empty($text)){
        echo "<script>$('.infosideform').show();</script>";
        $message = "შეავსეთ ველები!";
    }else{
        $result=$info->update($id,$title,$text,$image);
        if($result==true){//როდესაც სურათი იყო არჩეული ფუნქცია დააბრუნებს თანხმობას, ჯერ წაშლის და შემდეგ ატვირთავს
            $res=$info->select($id)->fetch_array();
            if($res){
                unlink('./images/'.$res['image']);
            }
            move_uploaded_file($_FILES['file']['tmp_name'],$dirname);
        }
        header("Location:?p=home");//გვერდზე გადამისამართება, რეფრეშის შემდეგ რომ აღარ დაამატოს
        exit();
    }
}
if(isset($_POST['delinfo'])){
    if(isset($_POST['delinfo'])){$id=$sql->real_escape_string($_POST['delinfo']);}
    $res=$info->select($id)->fetch_array();
    if($res){//ბაზიდან გამოძახებული სურათის ლინკი
        unlink('./images/'.$res['image']);//თუ არსებობს წაშლის
    }
    $result=$info->delete($id);
}
?>
