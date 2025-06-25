<?php include 'inc.studentheader.php'; ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Student Dashboard</h2>
                    <p>Welcome to your dashboard. You can fill out your details or check your inquiry status below.</p>
                </div>
            </div>
            <br><br>
            <div>
                <img src="images/icon/logo.jpg" alt="Student Logo" width="200" height="200" class="img-fluid mx-auto d-block">
            </div>

            <!-- Student Actions -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="inquiryform.php" class="btn btn-primary btn-block mb-2">Fill Inquiry Form</a>
                </div>
                <div class="col-md-6">
                    <a href="form.php" class="btn btn-success btn-block mb-2">Submit Student Information</a>
                </div>
            </div>

           

            <!-- Dashboard Overview (Optional for Students) -->
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-time"></i>
                                </div>
                                <div class="text">
                                    <h2>1</h2>
                                    <span>Pending Inquiry</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- /.container-fluid -->
    </div> <!-- /.section__content -->
</div> <!-- /.main-content -->


        
<?php include 'inc.studentfooter.php'; ?>
