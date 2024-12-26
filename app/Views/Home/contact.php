


    ============================================= 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url(assets/img/acs/contact2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Contact Area 
    ============================================= -->
    <div id="contact" class="contact-area default-padding">
        <div class="container">
            <div class="contact-content">
                <div class="shape">
                    <img src="assets/img/illustration/contact.png" alt="illustration">
                </div>
                <div class="row mx-md-50">
                    <div class="col-lg-5 info">
                        <div class="content">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope-open-text"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Our Email</h5>
                                        <a href="travailingdestination@services.com.com">travailingdestination@services.com</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Address</h5>
                                        <p>
                                            <strong>Indore</strong><br> &bull;  
                                             55 Vijay Nagar <br>
                                            <strong>Ujjain</strong><br> &bull; Shahid Square, Freeganj 
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone" style="transform: rotate(90deg); margin-top: 10px;" aria-hidden="true"></i>
                                    </div>
                                    <div class="info">
                                        <h5>Phone</h5>
                                        <a href="tel:+123456"> +123456</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 contact-form-box">
                        <div class="form-box ms-0">
                            <h2>Let's talk?</h2>
                            <p>
                            We pride ourselves on our self-owned fleet of cars and buses, regularly maintained to ensure a seamless travel experience. With our 3+ decades of experience and partnerships with top-rated hotels, choose Our Travels for a hassle-free and memorable travel experience.!
                            </p>
   
                            <!-- <form action="assets/mail/contact.php" method="POST" class="contact-form"> -->
                            <form action="<?= base_url('contact') ?>" method="POST"  enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 mb-2">
                                        <select class="form-select" id="Services" name="Services"  placeholder='Services'>
                                            <option value="1" selected>Choose An Inquiry</option>
                                            <option value="Oracle Cloud & EBS Consulting Solutions">Oracle Cloud & EBS Consulting Solutions</option>
                                            <option value="Application Managed Services">Application Managed Services</option>
                                            <option value="Demo as a Service">Demo as a Service</option>
                                            <option value="Testing as a Service">Testing as a Service</option>
                                            <option value="Recruitment and Staff Augmentation">Recruitment and Staff Augmentation</option>
                                            <option value="Training as a Service">Training as a Service</option>
                                        </select>
                                    </div> -->
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
                                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="company" name="company" placeholder="Company" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" id="subject" name="subject" placeholder="Subject" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group comments">
                                            <textarea class="form-control" id="comments" name="comments" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-12" style="display:flex; justify-content:center;">
                                        <button type="submit" name="submit" id="submit">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
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

   