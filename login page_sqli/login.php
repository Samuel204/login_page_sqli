<?php
session_start();
include "connessione.php";

if(isset($_POST['username']) && isset($_POST['password'])){

    function validate($data)
    {
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = $_POST['password'];

    //errore, inserire username o password
    if(empty($username)){
        header("Location: index.php?error=inserire username");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error = inserire password");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE username= '$username' AND password= '$password'";
        $result = mysqli_query($conn, $sql);

        //check if data is present on the database or not
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] == $username && $row['password']==$password){
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: welcome.php");
                exit();
            }else{
                header("Location: index.php?error=username o password errati");
                exit();
            }

        }else {
            header("Location:index.php?error=username o password errati");
            exit();
        }

    }




}else{
    header("Location: index.php");
    exit();
}

?>