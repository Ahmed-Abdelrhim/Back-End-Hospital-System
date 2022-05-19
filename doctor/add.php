<?php
include "../shared/head.php";
include "../shared/nav.php";
$select = "SELECT * from categories";
$cat = mysqli_query($con, $select);
$notvalid = false;
//add new doctor
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['catID'];
    if (empty($name) || empty($email) || empty($id)) {
        $notvalid = true;
    } else {
        $ins = "INSERT into doctors(`name`,`email`,`categoryID`) values('$name','$email',$id)";
        $inserted = mysqli_query($con, $ins);
        header("location:/hospital/doctor/list.php");
    }
}
#################################################
$updateBtn = false;  //show button update
if (isset($_GET['edit'])) {
    $updateBtn = true; //show button update
    $id = $_GET['edit']; //get id from url of the doctor you want to update his data
    $sel = "SELECT * from doctors where id =  $id"; //select from database
    $doctor = mysqli_fetch_assoc(mysqli_query($con, $sel)); //return assocciative array
    $name = $doctor['name']; //get name 
    $email = $doctor['email']; //get email
    if (isset($_POST['update'])) { //check if clicks udpate button
        $name = $_POST['name'];
        $email = $_POST['email'];
        $catID = $_POST['catID'];
        if (empty($name) || empty($email)) { //check if any of the values is empty
            $notvalid = true;
        } else {
            $update = "UPDATE docotrs set name = '$name' , email = '$email', categorID = '$catID' where id = $id";
            $updated =  mysqli_query($con, $update);
            header("location:/hospital/doctor/list.php");
        }
    }
}
auth();
?>
<div class="display-1 text-center text-info" style="font-family: 'Nunito';">Wellcome Add</div>
<div class="container col-6" style="font-family: 'Nunito';">
    <div class="card">
        <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" class="form-control" type="text" value="<?php if (isset($name)) echo $name  ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" type="email" value="<?php if (isset($email)) echo $email  ?>">
                </div>
                <div class="form-group">
                    <label>Category Name</label>
                    <select name="catID" class="custom-select">
                        <?php foreach ($cat as $data) { ?>
                            <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?></option1>
                            <?php } ?>
                    </select>
                </div>
                <?php if ($notvalid) { ?>
                    <div class="alert alert-danger">Enter Valid Data</div>
                <?php } ?>
                <?php if (isset($update)) { ?>
                    <button class="btn btn-dark" name="update">Update</button>
                <?php } else { ?>
                    <button name="send" class="btn btn-primary btn-block">Send</button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
<?php
include "../shared/script.php";
?>