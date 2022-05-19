<?php
$select = "SELECT * from theme where id = 1";
$sel = mysqli_query($con, $select);
$row = mysqli_fetch_assoc($sel);
$value = $row['color'];
if (isset($_POST['change'])) {
    $url = $_SERVER['PHP_SELF'];
    if ($value == '1') {
        $update = "UPDATE theme set color = 2";
        $u = mysqli_query($con, $update);
        header("location:$url");
    } else {
        $update = "UPDATE theme set color = 1";
        $u = mysqli_query($con, $update);
        header("location:$url");
    }
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location:/hospital/general/login.php");
}

?>
<nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Hospital</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php if (isset($_SESSION['email']) != "") { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="/hospital/index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Doctors
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="/hospital/doctor/add.php">Add</a>
                            <a class="dropdown-item" href="/hospital/doctor/list.php">List</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="/hospital/category/add.php">Add</a>
                            <a class="dropdown-item" href="/hospital/category/list.php">List</a>
                        </div>
                    </li>
                    <?php if(isset($_SESSION['role'])) 
                    { if($_SESSION['role'] == 0 )  { ?>
                    <li class="nav-item">
                        <a href="/hospital/admin/addAdmin.php" class="nav-link">Admin</a>
                    </li>
                    <?php }} ?>
                    <li class="nav-item">
                        <span class="nav-link"><?php echo $_SESSION['name'] ?></span>
                    </li>
                <?php } ?>
            </ul>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline my-2 my-lg-0" method="POST">
                <!-- <input name="form" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
                <?php if (isset($_SESSION['email']) != "") { ?>
                    <button class="btn btn-danger logout mr-2" name="logout">Logout</button>
                <?php } ?>
                <?php if ($value == '1') { ?>
                    <button name="change" class="btn btn-dark my-2 my-sm-0">Dark Mood</button>
                <?php } else { ?>
                    <button name="change" class="btn btn-light my-2 my-sm-0">Light Mood</button>
                <?php } ?>
            </form>
        </div>
    </nav>
</nav>