<?php
include('inc.header.php');
$name=$email=$address=$gender=$phone=$nameError=$emailError=$phoneError=$img="";
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['editid'])) {
    $editid = $_GET['editid'];
    $sql = "SELECT * FROM student_inquiry WHERE id='$editid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $address = $row['Address'];
        $gender = $row['gender'];
        $phone = $row['Phone'];
    }
} 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_btn'])){
     $editid = $_POST['editid'];
    if(empty($_POST['name'])) {
        $nameError = 'Name is required';
    } else {
        $name = safe_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
            $nameError = "Only letters and white space allowed";
        }
    }
    if(empty($_POST['email'])) {
        $emailError = 'Email is required';
    } else {
        $email = safe_input($_POST['email']);
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
        }
    }

    $address = safe_input($_POST['address']);
    $gender = safe_input($_POST['gender']);
    $img= "insert/img/".uniqid().".png";
                if (move_uploaded_file($_FILES["imgfile"]["tmp_name"],$img)) {
                    echo  "<script>
                            alert('icon uploaded successfully');
                        </script>";
                } else {
                    echo "<script>
                        alert('icon not uploaded successfully');
                    </script>";
                }
    if(empty($_POST['phone'])) {
        $phoneError = 'Phone number is required';
    } else {
            $phone = safe_input($_POST['phone']);
        if (!preg_match("/^03[0-9]{2}-?[0-9]{7}$/", $_POST['phone'])) {
            $phoneError = "Invalid phone number format";
        }
    }
    if(empty($nameError) && empty($emailError) && empty($phoneError)) {
     $sql = "UPDATE student_inquiry SET 
                    name='$name', 
                    email='$email', 
                    Address='$address', 
                    Phone='$phone', 
                    gender='$gender'
                    $update_photo_sql
                WHERE id='$editid'";
        if(mysqli_query($conn, $sql)){
            header('Location: view.php');
            exit();
    }
}
}
?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit Student </strong>
                        </div>
                        <div class="card-body card-block">

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="editid" value="<?php echo $editid; ?>">
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="name" class="form-control-label">Name</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo $name; ?>" class="form-control">
            <small class="text-danger form-text">* <?php echo $nameError; ?></small>
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="email" class="form-control-label">Email</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="email" id="email" name="email" placeholder="Enter your Email" value="<?php echo $email; ?>" class="form-control">
            <small class="text-danger form-text">* <?php echo $emailError; ?></small>
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="Address" class="form-control-label">Address</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="message" name="address" placeholder="Enter your Address" value="<?php echo $address; ?>" class="form-control">
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Gender</label>
        </div>
        <div class="col col-md-9">
            <div class="form-check-inline form-check">
                <label for="gender_male" class="form-check-label">
                    <input type="radio" id="gender_male" name="gender" value="male" class="form-check-input" <?php if($gender=='male') echo 'checked'; ?>>Male
                </label>
                <label for="gender_female" class="form-check-label">
                    <input type="radio" id="gender_female" name="gender" value="female" class="form-check-input" <?php if($gender=='female') echo 'checked'; ?>>Female
                </label>
            </div>
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="phone" class="form-control-label">Phone</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $phone; ?>" class="form-control">
            <small class="text-danger form-text">* <?php echo $phoneError; ?></small>
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="imgfile" class="form-control-label">Student Photo</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="file" id="imgfile" name="imgfile" class="form-control-file">
            <img src="" id="imgid" width="100" alt="" class="mt-2">
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3"></div>
        <div class="col-12 col-md-9">
            <button type="submit" name="update_btn" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById('imgfile').onchange = function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById('imgid').src = fr.result;
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    }
</script>

<?php include('inc.footer.php'); ?>