<?php
include('inc.header.php');

// Get inquiry
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['replyid'])) {
    $replyid = ($_GET['replyid']);
    $sql = "SELECT * FROM inquiry WHERE id = $replyid";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
// $sql = "SELECT * FROM admin";
// $result = mysqli_query($conn, $sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_btn'])) {
    $replyid = safe_input($_POST['replyid']);
    $reply_message = safe_input($_POST['reply_message']);
    $admin_id = safe_input($_SESSION['user_id']);
    $inquiry_status = safe_input($_POST['inquiry-status']);

    $sql = "UPDATE inquiry 
                   SET reply = '$reply_message', 
                       inquiry_status = '$inquiry_status', 
                       replied_by = '$admin_id' 
                   WHERE id = $replyid";

    if ($isupdate = mysqli_query($conn, $sql)) {
        header('Location:viewinq.php');
        exit();
    }
}
?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Admin Reply Form</h1>
                        </div>
                        <div class="card-body card-block">

                            <form action="replyinq.php" method="POST" class="form-horizontal">

                                <input type="hidden" name="replyid" value="<?php echo $replyid; ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="admin_id" class="form-control-label">Select Admin</label>
                                    </div>
                                    <!-- <div class="col-12 col-md-9">
                                        <select name="admin_id" id="admin_id" class="form-control" required>
                                            <option value="">Select Admin</option>
                                            <?php while ($admin = mysqli_fetch_assoc($result)) { ?>
                                                <option value="<?php echo $admin['id']; ?>">
                                                    <?php echo $admin['role']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div> -->
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="inquiry-status" class="form-control-label">Inquiry Status</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="inquiry-status" id="inquiry-status" class="form-control" required>
                                            <option value="Replied">Replied</option>
                                            <option value="Progress">Progress</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class="form-control-label">Original Message</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea class="form-control" readonly><?php echo($row['message']); ?></textarea>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="reply_message" class="form-control-label">Reply Message</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="reply_message" id="reply_message" placeholder="Enter your reply" class="form-control" required><?php echo htmlspecialchars($row['reply']); ?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"></div>
                                    <div class="col-12 col-md-9">
                                        <button type="submit" name="save_btn" class="btn btn-primary" onclick="return confirm('Are you sure you want to send this reply?')">Send Reply</button>
                                        <a href="viewinq.php" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('inc.footer.php'); ?>
