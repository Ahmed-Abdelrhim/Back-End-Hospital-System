<?php
include "../shared/head.php";
include "../shared/nav.php";
$select = "SELECT * from categories ";
$sel = mysqli_query($con, $select);
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $del = "DELETE FROM categories where id = $id";
    $d = mysqli_query($con, $del);
    header("location:/hospital/category/list.php");
}
auth();

?>
<div class="display-1 text-center text-info" > List Category</div>
<table class="table table-dark col-6 mx-auto text-center" >
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($sel as $data) { ?>
        <tr>
            <th><?php echo $data['id'] ?></th>
            <th><?php echo $data['name'] ?></th>
            <th><a class="btn btn-primary" name="edit" href="/hospital/category/add.php?edit=<?php echo $data['id'] ?>">Edit</a></th>
            <th> <a class="btn btn-danger" onclick="return confirm('Are You Sure ?')" href="/hospital/category/list.php?del=<?php echo $data['id'] ?>">Delete</a></th>
        </tr>
    <?php } ?>

</table>
<?php
include "../shared/script.php";
?>