<?php
class Login{
    public function UserLogin($username,$hashpassword){
        global $sql;
        $query = $sql->query("select * from auth_users where username='$username' and password='$hashpassword'");
        if($query->num_rows == 1){
            $row=$query->fetch_assoc();
            return $row['id'];//თუ არის ბაზაში მომხმარებელი დააბრუნებს ID ს
        }else{
            return false;
        }
    }
}
class Info{
    public function index(){
        global $sql;
        $query=$sql->query("select * from news");
        if($query){
            return $query;
        }
        return false;
    }
    public function select($id){
        global $sql;
        $query=$sql->query("select * from news where id='$id'");
        if($query){
            return $query;
        }
        return false;
    }
    public function create($title,$text,$image){
        global $sql;
        $query=$sql->query("insert into news (image,title,text) values ('$image','$title','$text')");
        if($query){
            return true;
        }
        return false;
    }
    public function update($id,$title,$text,$image){
        global $sql;
        if($image==null){// როდესაც სურათი არ იქნა არჩეული
            $sql->query("update news set title='$title',text='$text' where id='$id'");// ცვლილება სურათის გარდა
            return false;//ამ შემთხვევააში სურათს არ შეეხება
        }else{
            $sql->query("update news set title='$title',text='$text',image='$image' where id='$id'");// ცვლილება სურათიანად
            return true;//ამ შემთხვევაში სურათს შეცვლის
        }
    }
    public function delete($id){
        global $sql;
        $res=$sql->query("select * from news where id='$id'")->fetch_assoc();// select image from info
        $sql->query("delete from news where id='$id'");// remove image file from DB
        if($res == 1){//check
            unlink('images/'.$res['image']);//remove file from DIR
        }
    }
}
$info = new Info();
$login = new Login();
require_once ('post.main.php');//აქ არის რექვესთები
