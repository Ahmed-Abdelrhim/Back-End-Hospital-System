<?php
include "../shared/head.php";
include "../shared/nav.php";

if (isset($_POST['submit'])) {
    $notvalid = true;
    if ($_POST['id'] == '' || $_POST['name'] == '' ||  empty($_POST['name']) || empty($_POST['id'])) {
        $notvalid = true;
    } else {
        $notvalid = false;
        $url = $_SERVER['PHP_SELF'];
        $name = $_POST['name'];
        $id = $_POST['id'];
        $ins = "INSERT INTO categories values($id,'$name')";
        $i = mysqli_query($con, $ins);
        header("location:/hospital/category/list.php");
    }
}
$updatee = false;
if (isset($_GET['edit'])) {
    $updatee = true; //show btn update
    $id = $_GET['edit'];
    $s = "SELECT * FROM categories where id = $id";
    $row = mysqli_fetch_assoc(mysqli_query($con, $s));
    $name = $row['name'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $id = $_POST['id'];
        if (empty($name)) {
            $notvalid = true;
        } else {
            $update = "UPDATE categories set `name` = '$name' where id = $id";
            $updated =  mysqli_query($con, $update);
            header("location:/hospital/category/list.php");
        }
    }
}
// if (isset($_POST['update'])) {
//     $name = $_POST['name'];
//     $id = $_POST['id'];
//     if (empty($name)) {
//         $notvalid = true;
//     } else {
//         $update = "UPDATE categories set `name` = '$name' where id = $id";
//         $updated =  mysqli_query($con, $update);
//         header("location:/hospital/category/list.php");
//     }
// }

auth();

?>
<div class="display-1 text-center text-info" >Add Category</div>
<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>ID</label>
                    <input value="<?php if (isset($id)) echo $id ?>" name="id" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input value="<?php if (isset($name)) echo $name  ?>" name="name" class="form-control" type="text">
                </div>
                <?php if ($updatee == true) { ?>
                    <!-- <button name="update" class="btn btn-dark btn-block">Update</button> -->
                    <button class="btn btn-dark btn-block" name="update">Update</button>
                <?php } else {   ?>
                    <button name="submit" class="btn btn-primary btn-block">Send</button>
                <?php } ?>
            </form>
            <?php if (isset($notvalid) && $notvalid == true) { ?>
                <div class="alert alert-danger ">Enter Valid Data</div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include "../shared/script.php";
// if (isset($_POST['update'])) {
// $notvalid = true;
// if ($_POST['name'] == '' || empty($_POST['name']) ) {
// $notvalid = true;
// } else {
// $notvalid = false;
// $name = $_POST['name'];
// $id = $_POST['id'];
// $update = "UPDATE categories set `name` = '$name' , id = $id where id = $id";
// $u = mysqli_query($con, $update);
// header("location: /hospital/category/list.php");
// }
// }
?>