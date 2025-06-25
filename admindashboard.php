<?php include 'inc.adminheader.php'; ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Admin Dashboard</h2>
                    <p>Welcome to the admin dashboard. Here you can manage student inquiries.</p>
                </div>
            </div>
            <br><br>
            <div>
                <img src="images/icon/logo.jpg" alt="" width="200" height="200" class="img-fluid mx-auto d-block">
            </div>

            <!-- Inquiry Buttons -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="inquiryform.php" class="btn btn-primary btn-block mb-2">Add New Inquiry</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="viewinq.php" class="btn btn-secondary btn-block mb-2">View Inquiries</a>
                </div>
            </div>

            <!-- Student Buttons -->
            <div class="row mt-2">
                <div class="col-md-6">
                    <a href="form.php" class="btn btn-success btn-block mb-2">Add Student</a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="view.php" class="btn btn-info btn-block mb-2">View Students</a>
                </div>
            </div>

            <!-- Overview Section -->
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <div class="text">
                                    <h2>50</h2>
                                    <span>Admissions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- /.container-fluid -->
    </div> <!-- /.section__content -->
</div> <!-- /.main-content -->
<?php include 'inc.footer.php'; ?>