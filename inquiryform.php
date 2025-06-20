<?php
include('inc.header.php');
$sql= "SELECT *FROM student_inquiry";
$result=(mysqli_query($conn,$sql));
?>
<div class="container">
    <h1> Student Inquiry</h1>

    <form action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
       <select name="stdid" id="stdid">
        <option value="">Select id</option>

        <?php while($row=mysqli_fetch_assoc($result)){?>
            <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
        <?php } ?>
       </select>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter category description" value="<?php echo $description; ?>">
            <label for="description">Description</label>
        </div>
       
        <div class="form-floating mb-3">
           <label for="icon">icon</label>
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Enter your icon" value="<?php echo $icon; ?> ">
        </div>
        <div class="mt-3">
            <button type="submit" name="save_btn" class="btn btn-primary mb-3" onclick="return confirm('Are you sure you want to save this category?')">Save</button>
        </div>

    </form>
</div>
<?php include('inc.footer.php'); ?>
</body>
</html>