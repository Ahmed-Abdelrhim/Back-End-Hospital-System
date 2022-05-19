<?php
include '../shared/head.php';
include '../shared/nav.php';
$show = false;
if (isset($_POST['sendAdmin'])) {
    if (trim($_POST['firstName']) != "" && trim($_POST['lastName']) != "" && trim($_POST['email']) != "" && trim($_POST['password']) != "") {
        $firstName = filter_var(trim($_POST['firstName']), FILTER_SANITIZE_STRING);
        $lastName = filter_var(trim($_POST['lastName']), FILTER_SANITIZE_STRING);
        $name = $firstName ." " . $lastName;
        $email = filter_var(trim($_POST['email']),FILTER_VALIDATE_EMAIL);
        $password =  filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
        $insert = "INSERT INTO `admins` values('$email' , '$name' , '$password',1)";
        $ins = mysqli_query($con, $insert);
        if ($ins) {
            $show = true;
        } else {
            $notValidData = true;
        }
    } else {
        $notValidData = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
</head>

<body>
    <div class="container col-6 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" class="form-group">
                    <label class="mt-2">First Name</label>
                    <input type="text" class="form-control" name="firstName">
                    <label class="mt-2">last Name</label>
                    <input type="text" class="form-control" name="lastName">
                    <label class="mt-2">Email</label>
                    <input type="text" class="form-control" name="email">
                    <label class="mt-2">password</label>
                    <input type="password" class="form-control" name="password">
                    <button class="btn btn-primary btn-block mt-5" name="sendAdmin">Login</button>
                    <?php if ($show) { ?>
                        <div class="alert alert-success mt-2">Inserted Successfully Admin</div>
                    <?php } ?>
                </form>
                <?php if(isset($notValidData)) { ?>
                    <div class="alert alert-danger">Not Valid Data</div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include "../shared/script.php";
?>