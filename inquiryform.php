<?php
include('inc.header.php');
$stdid = $message = $inquiry_status = $std_iderror = $message_error = $inquiry_error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_btn'])) {
    if(empty($_POST['stdid'])){
        $std_iderror = "Student ID is required.";
    }
    $stdid = safe_input($_POST['stdid']);
    if(empty($_POST['message'])){
        $message_error = "Message is required.";
    }

    
    $message = safe_input($_POST['message']);
    if(empty($_POST['inquiry-status'])){
        $inquiry_error = "Inquiry status is required.";
    }
    $inquiry_status = safe_input($_POST['inquiry-status']);
    if(empty($std_iderror) && empty($message_error) && empty($inquiry_error)) {

    $sql = "INSERT INTO inquiry (std_id, message, inquiry_status) VALUES ('$stdid', '$message', '$inquiry_status')";
    if($isinserted = mysqli_query($conn, $sql)) {
        header('Location: inquiryform.php');
        exit();
    } 
}   
}
$sql= "SELECT *FROM student_inquiry";
$result=(mysqli_query($conn,$sql));
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Student Inquiry</h1>
                        </div>
                        <div class="card-body card-block">

                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-horizontal">

                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="stdid" class="form-control-label">Select Student</label>
                                        <span class="text-danger">*<?php echo $std_iderror; ?></span>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="stdid" id="stdid" class="form-control">
                                            <option value="">Select Student</option>
                                            <?php while($row=mysqli_fetch_assoc($result)){ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="message" class="form-control-label">Message</label>
                                        <span class="text-danger">*<?php echo $message_error; ?></span>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="message" id="message" placeholder="Enter your message" class="form-control"><?php echo $message; ?></textarea>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="inquiry-status" class="form-control-label">Inquiry Status</label>
                                        <span class="text-danger">*<?php echo $inquiry_error; ?></span>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="inquiry-status" id="inquiry-status" class="form-control">
                                            <option value="New">New</option>
                                            <option value="Progress">Progress</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-3"></div>
                                    <div class="col-12 col-md-9">
                                        <button type="submit" name="save_btn" class="btn btn-primary" onclick="return confirm('Are you sure you want to save this inquiry?')">Save</button>
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
</body>
</html>