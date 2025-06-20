<?php
include('inc.header.php');
$name = $email = $message = $gender = $phone= "";
$sql = "SELECT * FROM student_inquiry";
$result = mysqli_query($conn, $sql);
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['deleteid'])){
    $deleteid = safe_input($_GET['deleteid']);
    $sql = "DELETE FROM student_inquiry WHERE id='$deleteid'";
    if(mysqli_query($conn, $sql)){
        header('Location: view.php');
        exit();
    }
}
?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <h1 class="text-center">ADD STUDENTS</h1>
                                 <a href="form.php" type="button" class="btn btn-primary mb-3">+ ADD STUDENTS</a>
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Photo</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $srno = 1;
                while($row=mysqli_fetch_assoc($result)){?>
                    <tr>
                        
                        <td scope="row"><?php echo $srno++; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Phone']?></td>
                        <td>
                            <img src="<?php echo $row['photo']; ?>" width="100" alt="">
                        </td>
                        <td><?php echo $row['gender']; ?></td>
                        <td>
                            <a href="editform.php?editid=<?php echo $row['id']; ?>" type="button" class="btn btn-success" onclick="return confirm('Are you sure you want to edit this Data?')">Edit</a>
                            <a href="view.php?deleteid=<?php echo $row['id']; ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Data?')">Delete</a>

                    </td>
                    </tr>

                <?php }?>

            </tbody>

        </table>
        </div>
        </div>
        <?php
        include('inc.footer.php');
        ?>

</html>