<?php
include('inc.header.php');
$sql = "SELECT * FROM student_inquiry";
$sql = "SELECT * FROM inquiry";
$result = mysqli_query($conn, $sql);
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['deleteid'])) {
    $deleteid = safe_input($_GET['deleteid']);
    $deleteSql = "DELETE FROM inquiry WHERE id = '$deleteid'";
    if(mysqli_query($conn, $deleteSql)) {
        header("Location: viewinq.php");
        exit();
    } 
}

?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center mb-4">All Student Inquiries</h1>
                    <a href="inquiryform.php" class="btn btn-primary">Create New Inquiry</a>
                    <br>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Message</th>
                                    <th>Inquiry Status</th>
                                    <th>Created At</th>
                                    <th>Replied By</th>
                                    <th>Reply</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $srno = 1;
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $srno++; ?></td>
                                            <td><?php echo htmlspecialchars($row['std_id']); ?></td>
                                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                                            <td><?php echo htmlspecialchars($row['inquiry_status']); ?></td>
                                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                            <td><?php echo htmlspecialchars($row['replied_by']); ?></td>
                                            <td><?php echo htmlspecialchars($row['reply']); ?></td>
                                            <td>
                                                <a href="replyinq.php?replyid=<?php echo $row['id']; ?>" class="btn btn-success" onclick="return confirm('Are you sure you want to reply to this inquiry?')">Reply</a>
                                                <a href="viewinq.php?deleteid=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this inquiry?')">Ignore</a>
                                            </td>
                                        </tr>
                                <?php } ?>  
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include('inc.footer.php'); ?>
</body>
</html>