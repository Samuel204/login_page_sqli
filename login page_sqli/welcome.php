<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
    </head>

    <body>
        <header>Benvenuto, <?php echo $_SESSION['name'];?></header>
    </body>
</html>
<?php
}else{
    header("Location:index.php");
    exit();
}
?>
