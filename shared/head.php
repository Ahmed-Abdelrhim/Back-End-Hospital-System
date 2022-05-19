<?php
if ($_SERVER['PHP_SELF'] == '/hospital/index.php') {
    include "./general/env.php";
} else {
    include "../general/env.php";
}

$select = "SELECT * from theme where id = 1";
$sel = mysqli_query($con, $select);
$row = mysqli_fetch_assoc($sel);
$value = $row['color'];
$url = $_SERVER['PHP_SELF'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/all.min.css">
    <?php if ($value == '1') { ?>
        <link rel="stylesheet" href="/hospital/css/light.css">
    <?php } else { ?>
        <link rel="stylesheet" href="/hospital/css/dark.css">
    <?php } ?>
    <title>Hospital</title>
</head>

<body style="font-family: 'Nunito';">