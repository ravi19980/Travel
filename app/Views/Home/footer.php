 <!-- Start Footer 
    ============================================= -->

 <style>
         .f-items .f-item {
         background: #f8f9fa;
         /* Light background for better visibility */
         border: 1px solid #ddd;
         /* Add border to visually separate sections */
         border-radius: 10px;
         padding: 20px;
         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
         /* Subtle shadow for elevation */
     }

     .f-items .f-item.about {
         text-align: center;
     }

     .f-items .f-item.contact-widget {
         text-align: left;
     }

     .f-items .f-item .widget-title {
         font-size: 1.5rem;
         color: #007bff;
         /* Custom color */
         margin-bottom: 20px;
     }

     .f-items .f-item .form-control {
         border-radius: 5px;
     }

    
     .f-items .f-item .btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 11px 44px;
    border-radius: 5px;
}

     .f-items .icon {
         font-size: 1.2rem;
         color: #007bff;
     }

     .f-items .icon a {
         color: inherit;
         text-decoration: none;
     }

     .f-items .icon a:hover {
         color: #0056b3;
     }

     .f-items ul {
         padding: 0;
         list-style: none;
     }

     .f-items li {
         margin-bottom: 15px;
     }
     footer .f-items .f-item form button {
    position: absolute;
    right: -9px;
    top: 0;
    height: 50px;
    width: 50px;
    background: var(--color-primary);
    color: var(--white);
    font-size: 16px;
    line-height: 34px;
    border-radius: 0 5px 5px 0;
}
 </style>


 <footer class="bg-dark text-light">
     <div class="container">
         <div class="f-items pt-4 pb-4">
             <div class="row d-flex align-items-stretch">
                 <!-- Newsletters Section -->
                 <div class="col-lg-4 col-md-6 item">
                     <div class="f-item about h-100">
                         <h4 class="widget-title">Newsletters</h4>
                         <p>Subscribe to our Updates</p>
                         <form action="<?= base_url('') ?>" method="POST">
                             <input type="email" placeholder="Your Email" class="form-control mb-3" name="email">
                             <button type="submit" class="btn btn-primary">Send <i class="arrow_right"></i></button>
                         </form>
                     </div>
                 </div>

                 <!-- Contact Info Section -->
                 <div class="col-lg-4 col-md-6 item">
                     <div class="f-item contact-widget h-100">
                         <h4 class="widget-title">Contact Info</h4>
                         <div class="address">
                             <ul class="list-unstyled">
                                 <li>
                                     <div class="d-flex align-items-start mb-3">
                                         <div class="icon me-3">
                                             <i class="fas fa-envelope"></i>
                                         </div>
                                         <div class="content">
                                             <strong>Email:</strong>
                                             <a href="mailto:travailingdestination@services.com">travailingdestination@services.com</a>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="d-flex align-items-start mb-3">
                                         <div class="icon me-3">
                                             <i class="fas fa-phone"></i>
                                         </div>
                                         <div class="content">
                                             <strong>Phone:</strong>
                                             <a href="tel:123456">+123456</a>
                                         </div>
                                     </div>
                                 </li>
                                 <li>
                                     <div class="d-flex align-items-center mt-4">
                                         <a href="https://www.instagram.com/" class="me-3">
                                             <i class="fab fa-instagram fa-2x"></i>
                                         </a>
                                         <a href="https://www.facebook.com">
                                             <i class="fab fa-facebook-f fa-2x"></i>
                                         </a>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Start Footer Bottom -->
     <div class="footer-bottom">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <p>&copy; Copyright 2024. @Travelling</p>
                 </div>
                 <!-- <div class="col-lg-6 text-end link">
                        <ul>
                            <li>
                                <a href="about-us.html">Terms</a>
                            </li>
                            <li>
                                <a href="about-us.html">Privacy</a>
                            </li>
                            <li>
                                <a href="contact.html">Support</a>
                            </li>
                        </ul>
                    </div> -->
             </div>
         </div>
     </div>

     <!-- End Footer Bottom -->
 </footer>
 <!-- End Footer -->

 <!-- jQuery Frameworks
    ============================================= -->

 <script src="assets/js/jquery-3.6.0.min.js"></script>
 <script src="assets/js/popper.min.js"></script>
 <script src="assets/js/bootstrap.bundle.min.js"></script>
 <script src="assets/js/jquery.appear.js"></script>
 <script src="assets/js/jquery.easing.min.js"></script>
 <script src="assets/js/jquery.magnific-popup.min.js"></script>
 <script src="assets/js/modernizr.custom.13711.js"></script>
 <script src="assets/js/owl.carousel.min.js"></script>
 <script src="assets/js/wow.min.js"></script>
 <script src="assets/js/progress-bar.min.js"></script>
 <script src="assets/js/isotope.pkgd.min.js"></script>
 <script src="assets/js/imagesloaded.pkgd.min.js"></script>
 <script src="assets/js/count-to.js"></script>
 <script src="assets/js/YTPlayer.min.js"></script>
 <script src="assets/js/validnavs.js"></script>
 <script src="assets/js/main.js"></script>
 <!-- aos -->
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script>
     AOS.init();
 </script>
 <!-- fixed form -->
 <script>
     window.onscroll = function() {
         var minthreshold = 300;
         var maxthreshold = 2055;
         var scrollPosition = window.scrollY;
         var screenWidth = window.innerWidth;
         var courseInfoElements = document.getElementById('Course_form');

         console.log(scrollPosition);
         // console.log(screenWidth);
         if (screenWidth >= 768) { // Check for medium screen width (767px)
             if (scrollPosition < minthreshold) {
                 console.log('absolute')
                 courseInfoElements.style.position = 'absolute';
                 courseInfoElements.style.top = '100px';
                 courseInfoElements.style.bottom = 'auto';

             } else if (scrollPosition > minthreshold && scrollPosition < maxthreshold) {
                 console.log('fixed')
                 courseInfoElements.style.position = 'fixed';
             } else if (scrollPosition > maxthreshold) {
                 console.log('absolute')
                 courseInfoElements.style.position = 'absolute';
                 courseInfoElements.style.bottom = '100px';
                 courseInfoElements.style.top = 'auto';
             }
         }
         // else { // For small screen width
         //      courseInfoElements.style.position = 'sticky';
         //         // courseInfoElements.style.bottom = '25px';
         //         // courseInfoElements.style.top = 'auto';
         // }
     };
 </script>
 </body>

 </html>
