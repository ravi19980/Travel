   <!-- Start Breadcrumb 
    ============================================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url(assets/img/acs/aboutbg.jpeg);">
        <div class="container">
            <div class="row">



                <div class="col-lg-12 col-md-12">
                    <h1>Enquiry</h1>
                    <ul class="breadcrumb">
                        <!-- <li><a href="#"><i class="fas fa-home"></i> Home</a></li> -->
                        <li>Join Traveller Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

     <!-- Start Contact Area 
    ============================================= -->
    <div id="contact" class="contact-area pt-50">
        <div class="container">
            <div class="contact-content">
                <div class="row mx-md-50">
                    <div class="col-lg-12 contact-form-box">
                        <div class="form-box">
                            <h2>Join Us</h2>
                            <p>
                            we are passionate about turning travel dreams into unforgettable journeys. With our expertise in crafting personalized travel experiences, we ensure every step of your adventure is seamless and memorable.
                            </p>

                            <!-- <form action="assets/mail/contact.php" method="POST" class="contact-form"> -->
                            <form action="<?= base_url('career') ?>" method="POST"  enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="Message" name="Message" placeholder="Message" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                              
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-lg-12" style=" display: flex;justify-content: center;">
                                            <button type="submit" name="submit" id="submit">
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                <div  class="row"></div>
                                <!-- Alert Message -->
                                <div class="col-lg-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('success')) : ?>
            var successMsg = "<?= session()->getFlashdata('success') ?>";
            toastr.success(successMsg);
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            var errorMsg = "<?= session()->getFlashdata('error') ?>";
            toastr.error(errorMsg);
        <?php endif; ?>
    });
</script>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
    $(document).ready(function() {
        <?php if (session()->getFlashdata('success')) : ?>
            var successMsg = "<?= session()->getFlashdata('success') ?>";
            toastr.success(successMsg);
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            var errorMsg = "<?= session()->getFlashdata('error') ?>";
            toastr.error(errorMsg);
        <?php endif; ?>
    });
</script>
    <!-- End Contact Area -->
