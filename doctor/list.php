<?php
include "../shared/head.php";
include "../shared/nav.php";
//select from database
$select = "SELECT * from doctors";
$doc = mysqli_query($con, $select);
$catSelect = "SELECT * From categories";
$category = mysqli_query($con, $catSelect);
$docSelect = "SELECT * From doctors";
$doctor = mysqli_query($con, $docSelect);
$names = array();
foreach ($doctor as $docData) {
    foreach ($category as $catData) {
        if ($docData['categoryID'] == $catData['id']) {
            $str = $catData['name'] . " ";
            echo $str;
        }
    }
}
if (isset($str)) {
    echo "<br>" . $str;
}
//if clicks delete button delete doctor
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $del = "DELETE from doctors where id = $id";
    $d = mysqli_query($con, $del);
    header("location:/hospital/doctor/list.php");
}

auth();

?>
<div class="display-1 text-center text-info" > Wellcome At List Page</div>
<table class="table table-dark  col-6 mx-auto text-center" >
    <tr>
        <th>Doctor ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    <?php foreach ($doc as $data) { ?>
        <tr>
            <th><?php echo $data['id'] ?></th>
            <th><?php echo $data['name'] ?></th>
            <!-- <th><?php echo $data['categoryID'] ?></th> -->
            <!-- <th><?php for ($i = 0; $i < count($names); $i++) {
                            echo $names[$i];
                        } ?></th> -->
            <th><?php foreach ($doctor as $docData) {
                    foreach ($category as $catData) {
                        if ($docData['categoryID'] == $catData['id']) {
                            echo $catData['name'] . " ";
                        }
                    }
                } ?></th>
            <th><a class="btn btn-primary" name="edit" href="/hospital/doctor/add.php?edit=<?php echo $data['id'] ?>">Edit</a></th>
            <th><a class="btn btn-danger" name="del" href="<?php echo $_SERVER['PHP_SELF'] ?>?del=<?php echo $data['id'] ?>">Delete</a></th>
        </tr>
    <?php } ?>
</table>
<?php
include "../shared/script.php";
?>