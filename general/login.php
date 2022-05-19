<?php
include "../shared/head.php";
include "../shared/nav.php";

if (isset($_POST['login'])) {
    $_SESSION['email'] = '';
    $_SESSION['name'] = '';
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $sel = "SELECT * FROM `admins` where `email` = '$email' and `password` = '$password' ";
    $s = mysqli_query($con, $sel);
    $row = mysqli_fetch_assoc($s);
    if (mysqli_query($con, $sel)) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        header("location:/hospital/index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body style="font-family: 'Nunito';">
    <div class="container col-6 w-50 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="login.php" class="form-group" method="POST">
                    <label>E-mail</label>
                    <input type="text" class="form-control mt-2" name="loginEmail">
                    <label class="mt-2">Password</label>
                    <input type="password" name="loginPassword" class="form-control">
                    <button class="btn btn-primary btn-block mt-5" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include "../shared/script.php";
?>