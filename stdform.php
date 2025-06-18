<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include('inc.header.php');
$name=$email=$message=$gender=$phone=$nameError=$emailError=$phoneError=$img="";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_btn'])){
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
    
    $message = safe_input($_POST['message']);
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
    $phone = safe_input($_POST['phone']);
    $sql = "INSERT INTO student_inquiry (name, email, message, Phone ,gender,photo) VALUES ('$name', '$email', '$message', '$phone','$gender','$img')";

    if($isinserted = mysqli_query($conn, $sql)){
        header('Location: view.php');
        exit();
    }
}
}
?>

<body>

    <body>
        <div class="container">
            <h1>Student Inquiry Form</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
                enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your  name"
                        value="<?php echo $name; ?>">
                    <label for="name">Name</label>
                    <span class="text-danger">*
                        <?php echo $nameError; ?>
                    </span>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email"
                        value="<?php echo $email; ?>">
                    <label for="email">Email</label>
                    <span class="text-danger">*
                        <?php echo $emailError; ?>
                    </span>
                </div>
                <div class="form-floating mb-3">
                    <label for="message">Message</label>
                    <input type="text" class="form-control" id="message" name="message" placeholder="Enter your message"
                        value="<?php echo $message; ?>">
                </div>
                <div class="form-floating mb-3">
                    <label for="gender">Gender</label>
                    <br>
                    <br>
                    <input type="radio" id="gender_male" name="gender" value="male" <?php if($gender=='male' )
                        echo 'checked' ; ?>>Male
                    <input type="radio" id="gender_female" name="gender" value="female" <?php if($gender=='female' )
                        echo 'checked' ; ?>>Female
                </div>
                <div class="form-floating mb-3">
                    <label for="message">Phone</label>
                    <input type="text" class="form-control" id="message" name="phone"
                        placeholder="Enter your phone number" value="<?php echo $phone; ?>">
                    <span class="text-danger">*
                        <?php echo $phoneError; ?>
                    </span>
                </div>
                <div class="form-floating mb-3">
                    <label>Product Icon</label>
                    <br>
                    <input type="file" class="form-control" name="imgfile" id="imgfile">
                    <br>
                    <img src="" id="imgid" width="100" alt="">
                </div>
                <div class="mt-3">
                    <button type="submit" name="save_btn" class="btn btn-success mb-3">Submit</button>
                </div>

            </form>
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
    </body>
    <?php
include('inc.footer.php');
?>

</html>