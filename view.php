<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
<body>
    <div class="container">
        <h1>Student Inquiries</h1>
        <a href="stdform.php" type="button" class="btn btn-primary mb-3">+ Add Inquiry</a>
        <table class="datatable table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
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
                        <td><?php echo $row['message']; ?></td>
                        <td><?php echo $row['Phone']?></td>
                        <td>
                            <img src="<?php echo $row['photo']; ?>" width="100" alt="">
                        </td>
                        <td><?php echo $row['gender']; ?></td>
                        <td>
                            <a href="view.php?replyid=<?php echo $row['id']; ?>" type="button" class="btn btn-success" onclick="return confirm('Are you sure you want to reply to this inquiry')">Reply</a>
                            <a href="view.php?deleteid=<?php echo $row['id']; ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to ignore this inquiry')">Ignore</a>
                            
                    </td>
                    </tr>

                <?php }?>

            </tbody>

        </table>
    </div>
    
</body>
<?php
include('inc.footer.php');
?>
</html>