<style>
    .services-style-six:hover {
        transform: scale(1.05);
        /* Subtle zoom effect */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    }

    .row>.col-xl-4 {
        display: flex;
        /* Ensure columns align properly */
        align-items: stretch;
        /* Stretch to match parent height */
    }

    h1 {
        font-size: 40px;
        color: #418181;
    }

    body {
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 20px;
    }

    .car-option {
        display: inline-block;
        margin: 20px;
        padding: 10px;
        border: 2px solid #ccc;
        cursor: pointer;
        transition: 0.3s;
    }

    .car-option img {
        width: 200px;
        height: auto;
        margin-top: 10px;
    }

    .car-option:hover {
        background-color: #f0f0f0;
    }

    #car-details {
        margin-top: 30px;
        display: none;
    }

    #car-details img {
        max-width: 500px;
        width: 100%;
        height: auto;
    }

    .about-six-thumb img:nth-child(2) {
        position: absolute;
        right: 0;
        left: 0;
        top: 0;
        width: 75%;
    }

    ul.about-list {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        position: absolute;
        left: 14%;
        top: 280px;
        bottom: auto;
        background: var(--bg-gradient);
        right: 0;
        padding: 20px 0;
        align-items: center;
        border-radius: 10px;
    }

    .services-style-six {
        position: relative;
        z-index: 1;
        border-radius: 0;
        border-top-left-radius: 50px;
        border-bottom-right-radius: 50px;
        overflow: hidden;
        padding: 20px;
        background: linear-gradient(45deg, #3e60c0, #1e417c);
        border: 9px double #fff;
    }

    .services-style-six h4 img {
        height: auto !important;
        width: 80px;
        float: right;
    }

    .services-style-six-height {
        height: 250px;
    }

    .provider {
        border: 5px solid #fff;
        padding: 20px;
        border-radius: 10px;
        background: linear-gradient(45deg, #13d0bc, #4e69f1);
    }

    .hero_sec_bg {
        background: url('assets/img/acs/recruitment.avif');
    }

    .owl-stage {
        display: flex;
        align-items: center;
    }

    .owl-theme .owl-nav.disabled+.owl-dots {
        margin-top: -25px;
        display: none;
    }

    .provider img {
        height: 100px;
    }

    .Client_logo .item img {
        width: 75%;
    }

    .accordion-button:not(.collapsed) {
        color: #202942;
        font-size: 19px;
        background-color: transparent;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
    }

    .accordion-button::after {
        background-image: none;
    }

    .accordion-button:not(.collapsed)::after {
        background-image: none;
        transform: rotate(-180deg);
    }

    label {
        display: inline-block;
        font-weight: normal;
        margin-bottom: 5px;
        max-width: 100%;
        color: black;
    }

    .form-box form button {
        border-radius: 30px;
        padding: 10px 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        gap: 8px;
        background-color: var(--brown-color);
    }
</style>


<!-- first section slider start -->
<div class="slider-carousel owl-carousel owl-theme hero_section">
    <div class="item it-banner text-light bg-cover" style="background:url('assets/img/acs/travel.jpg');">
        <div class="container h-100">
            <div class="row hero_bg_h">
                <div class="col-lg-7">
                    <h2>Traveller Destination <strong> All Site Visit</strong></h2>
                </div>
                <div class="col-lg-5 d-flex align-items-center"></div>
            </div>
        </div>
    </div>
    <div class="item it-banner text-light bg-cover" style="background:url('assets/img/acs/photo_travelling.jpg');">
        <div class="container h-100">
            <div class="row hero_bg_h">
                <div class="col-lg-7">

                    <h2> Explore State with <strong> our Quality Cabs</strong></h2>
                </div>
                <div class="col-lg-5 d-flex align-items-center"></div>
            </div>
        </div>
    </div>
    <div class="item it-banner text-light bg-cover" style="background:url('assets/img/acs/slider3.jpg');">
        <div class="container h-100">
            <div class="row hero_bg_h">
                <div class="col-lg-7">

                    <h2> Popular Tour Packages <strong>by Our Travel Agency</strong></h2>
                </div>
                <div class="col-lg-5 d-flex align-items-center"></div>
            </div>
        </div>
    </div>
</div>
<!-- first section slider end -->

<!-- start section oracle EXCELLENCE -->
<div class="about-style-six-area overflow-hidden default-padding">
    <div class="container wow fadeInUp" data-wow-delay="500ms">
        <div class="row column_reverse_md">
            <div class="col-xl-7">
                <div class="about-six-thumb">
                    <img src="assets/img/istockphoto.jpg" class="d-none" alt="Image not found">
                    <img src="assets/img/istockphoto.jpg" alt="Image not found">
                    <ul class="about-list">
                        <li>
                            <div class="experience">
                                <img class="wow fadeInUp" data-wow-delay="500ms" src="assets/img/gettyimages.jpg" alt="Image Not Found" style="width:125px">
                            </div>
                        </li>
                        <li>
                            <h4>Navigating Success with Oracle Precision </h4>
                            <p>
                                Your Trusted Partner for E-Business Suite, Oracle ERP Cloud and Supply Chain Solutions.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-5 mt-30">
                <div class="site-heading">
                    <h4 class="title-sub wow fadeInUp" data-wow-delay="500ms">Experience</h4>
                    <h2 class="title-regular">"Choose Destination"</h2>
                </div>
                <div class="row">
                    <div class="destination-dropdown mt-3">
                        <label for="destination_state" class="form-label">Select State:</label>
                        <select id="destination_state" name="destination_state" class="form-select" onchange="Showcitydata()">
                            <option value="" selected disabled>Choose Destination</option>
                            <!-- Loop through the state data to generate options dynamically -->
                            <?php foreach ($state_data as $state): ?>
                                <option value="<?= htmlspecialchars($state['state_id']); ?>"><?= htmlspecialchars($state['state_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Dropdown to Choose City -->
                    <div class="destination-dropdown mt-3">
                        <label for="destination_district" class="form-label">Select City:</label>
                        <select id="destination_district" name="destination_district" class="form-select">
                            <option value="" selected disabled>Choose Destination</option>
                            <!-- Cities will be populated here dynamically -->
                        </select>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- End section oracle EXCELLENCE -->

<!-- what we do start  -->
<div id="service" class="services-style-six-area bottom-less text-light" style="background-image: url(assets/img/shape/48.png);">
    <div class="separate_bg default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4 class="title-sub custom_blue">Our Services</h4>
                        <h2 class="title-regular custom_blue">We make your travel dreams come true</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Single Item -->
                <div class="col-xl-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="services-style-six">
                        <div class="info">
                            <div class="services-style-seven-height">
                                <h4><a href="#">Ghrishneshwar Temple</a></h4>
                                <img src="assets/img/ghrishneshwar.jpg" alt="Ghrishneshwar Temple" class="mb-0">
                                <p class="text-light">
                                    Ghrishneshwar is a sacred pilgrimage site located near Ellora caves. It is one of the 12 Jyotirlinga shrines dedicated to Lord Shiva, offering a serene and spiritual experience amidst natural beauty.
                                </p>
                            </div>
                            <a href="ghrishneshwar">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="services-style-six">
                        <div class="info">
                            <div class="services-style-seven-height">
                                <h4><a href="#">Bhimashankar Temple</a></h4>
                                <img src="assets/img/bhimashankar.jpg" alt="Bhimashankar Temple" class="mb-0">
                                <p class="text-light">
                                    Bhimashankar is a revered Jyotirlinga shrine located in the Sahyadri mountains. It is not only a spiritual center but also a popular destination for trekking and nature lovers.
                                </p>
                            </div>
                            <a href="bhimashankar">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="services-style-six">
                        <div class="info">
                            <div class="services-style-seven-height">
                                <h4><a href="#">Trayambkeshwar Temple</a></h4>
                                <img src="assets/img/trayambkeshwar.jpg" alt="Trayambkeshwar Temple" class="mb-0">
                                <p class="text-light">
                                    Trayambkeshwar is an ancient temple located in the Nashik district of Maharashtra. It is dedicated to Lord Shiva and is known for its unique trident-shaped temple structure.
                                </p>
                            </div>
                            <a href="trayambkeshwar">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="services-style-six">
                        <div class="info">
                            <div class="services-style-seven-height">
                                <h4><a href="#">Shani Singnapur</a></h4>

                                <img src="assets/img/shani_shignapur.jpg" alt="Shani Singnapur" class="mb-0">
                                <p class="text-light">
                                    Shani Singnapur is a village in Maharashtra famous for the Shani temple, where Lord Shani is worshipped. The unique aspect of this temple is that it has no roof, symbolizing the belief that Lord Shani resides in open space.
                                </p>
                            </div>
                            <a href="shani-singnapur">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- End Single Item -->
                <!-- Single Item -->
                <!-- Mahakaleshwar -->
                <div class="col-xl-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="services-style-six">
                        <div class="info">
                            <div class="services-style-seven-height">
                                <!-- Heading First -->
                                <h4><a href="#">Mahakaleshwar Temple</a></h4>

                                <!-- Image Next -->
                                <img src="assets/img/mahakaleswar.jpg" alt="Mahakaleshwar Temple" class="mb-0">

                                <!-- Paragraph Next -->
                                <p class="text-light">
                                    Mahakaleshwar is one of the twelve Jyotirlinga shrines dedicated to Lord Shiva. It is located in Ujjain, MP, and is considered one of the most revered pilgrimage sites in India.
                                </p>
                            </div>
                            <a href="mahakaleshwar">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- End Mahakaleshwar Item -->

                <!-- Omkareshwar -->
                <div class="col-xl-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="services-style-six">
                        <div class="info">
                            <div class="services-style-seven-height">
                                <h4><a href="#">Omkareshwar Temple</a></h4>

                                <img src="assets/img/omkareshwar.jpg" alt="Trayambkeshwar Temple" class="mb-0">
                                <p class="text-light">
                                    Omkareshwar is another prominent Jyotirlinga temple dedicated to Lord Shiva. Located on an island in the Narmada River, it is a place of spiritual significance and scenic beauty.
                                </p>
                            </div>
                            <a href="omkareshwar">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Omkareshwar Item -->

                <!-- End Single Item -->
            </div>
        </div>
    </div>
</div>

<!-- what we do end  -->

<!-- our expertise start -->
<div class="d-flex gap-2 mb-5 flex-column flex-md-row mt-4">
    <a href="#CTAForm" class="btn yellow-btn">

        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
        </svg>
    </a>

</div>
<div class="choose-us-style-two-area default-padding">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6">
                <section class="py-5" id="CTAForm">
                    <div class="CTAheading">
                        <div class="title">
                            <h3>Get Your <br> Quote Instantly!</h3>
                        </div>
                    </div>
                    <div class="form-box shadow-sm aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000" style="background: linear-gradient(45deg, #02EBAC 0%, #5a57fb 50%) !important;">
                        <h3 class="brown-text">Leave A Message</h3>
                        <form id="ContactForm" method="post" class="row mt-4" enctype="multipart/form-data">
                            <input type="hidden" name="party_type" value="lead">
                            <input type="hidden" name="lead_status" value="Hot">
                            <input type="hidden" name="lead_date" value="">
                            <div class="mb-4 col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="contact_person_name" placeholder="Enter Full Name" class="form-control">
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="name" class="form-label"> Email Id</label>
                                <input type="email" name="contact_person_email" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="name" class="form-label">Mobile Number</label>
                                <input type="text" name="contact_person_mobile" placeholder="Enter Mobile Number" class="form-control">
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="name" class="form-label">Pincode</label>
                                <input type="text" name="firm_pincode" placeholder="Enter Pincode" class="form-control">
                            </div>
                            <div class="mb-4 col-md-12">
                                <label for="name" class="form-label">Enter City</label>
                                <input type="text" name="firm_address" placeholder="Enter Full Name" class="form-control">
                            </div>
                            <div class="mb-4 col-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control rounded-4" name="lead_description" id="message" rows="3"></textarea>
                            </div>
                            <div class="col-12">

                                <button type="button" class="btn" onclick="submitContactForm(event)">
                                    Send Message
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- <div class="choose-us-thumb">
                        <img src="assets/img/img4.jpg" alt="Image Not Found">
                        <div class="fun-fact">
                            <div class="counter">
                                <div class="timer" data-to="05" data-speed="2000">05</div>
                            </div>
                            <span class="medium">Complete Project </span>
                        </div>
                    </div> -->
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="choose-us-style-two">
                    <div class="site-heading text-center mb-0">
                        <h4 class="title-sub custom_blue">Why Travel With Us</h4>
                        <h3 class="title-regular custom_blue">Embark on a Journey of Unforgettable Adventures</h3>
                    </div>
                    <h2> </h2>
                    <p>
                        We specialize in crafting personalized travel experiences that cater to your unique preferences. From scenic getaways to cultural explorations, we ensure every moment of your journey is extraordinary and stress-free.
                    </p>

                    <ul class="accordion" id="accordionExample">
                        <li class="accordion-item bg-transparent border-0 mt-0">
                            <h4 class="accordion-header mb-0" id="headingOne">
                                <button class="accordion-button bg-transparent fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Destination Research & Planning
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body py-0">
                                    We meticulously research and plan every detail of your trip, from hidden gems to must-see attractions, ensuring a seamless and memorable experience.
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item bg-transparent border-0 mt-0">
                            <h4 class="accordion-header mb-0" id="headingTwo">
                                <button class="accordion-button bg-transparent fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Expert Guidance
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body py-0">
                                    Our team of travel experts offers invaluable insights and recommendations to help you create an itinerary that matches your interests and budget.
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item bg-transparent border-0 mt-0">
                            <h4 class="accordion-header mb-0" id="headingThree">
                                <button class="accordion-button bg-transparent fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Hassle-Free Experiences
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body py-0">
                                    From bookings to logistics, we handle it all, giving you the freedom to relax and immerse yourself in the joy of travel without any worries.
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- our expertise end -->

<!-- Our clients section start -->
<h1>Select a Car</h1>

<div>
    <div class="car-option" onclick="showCarDetails('wagonr')">
        <h4>WagonR</h4>
        <img src="assets/img/wagoner.jpg" alt="WagonR Image">
    </div>
    <div class="car-option" onclick="showCarDetails('dezire')">
        <h4>Dzire</h4>
        <img src="assets/img/dezire.jpg" alt="Dzire Image">
    </div>
    <div class="car-option" onclick="showCarDetails('ertiga')">
        <h4>Ertiga</h4>
        <img src="assets/img/ertiga.jpg" alt="Ertiga Image">
    </div>
</div>

<div id="car-details">
    <h2 id="car-name"></h2>
    <p id="car-description"></p>
    <img id="car-image" src="" alt="Car Image">
</div>


<!-- <div class="container Client_logo">
        <div class="row" style="background: aliceblue; border-radius: 70px; box-shadow: inset 3px 3px 44px -24px rgba(0,0,0,0.75);">
            <div class="col-lg-10 offset-lg-1  wow fadeInUp" data-wow-delay="500ms">
                <div class="tesimonial-style-two-carousel owl-carousel owl-theme">
                    <div class="item">
                        <div>
                            <img src="assets/img/clienslogo/fourthsquare1.png" alt="Author">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="assets/img/clienslogo/alku.svg" alt="Author">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="assets/img/clienslogo/connorgroup.png" alt="Author">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="assets/img/clienslogo/ferguson.png" alt="Author">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="assets/img/clienslogo/teksystems.png" alt="Author">
                        </div>
                    </div>
                    <div class="item justify-content-center">
                        <div>
                            <img src="assets/img/clienslogo/warby.png" style="height:100px;" alt="Author">
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div> -->
</div>


<!-- Start Blog -->
<div id="blog" class="blog-area default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4 class="title-sub">Latest Blogs</h4>
                    <h2 class="title-regular"> Latest Blogs & Articles </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <!-- Single item -->
            <div class="single-item col-lg-4 col-md-6">
                <div class="item">
                    <div class="thumb" style="height: 245px;">
                        <a href="blog_detail"><img src="assets/img/downloadfamilyblog.jpg" alt="Thumb" class="h-100"></a>
                        <div class="date"><strong>19</strong> <span>March</span></div>
                    </div>
                    <div class="info">
                        <h4>
                            <a href="blog_detail">Top 10 Exotic Destinations to Explore in 2024</a>
                        </h4>
                        <p class="blog_paragraph">
                            Embark on a journey to some of the most breathtaking destinations around the globe. From serene beaches to majestic mountains, discover our top picks for your travel bucket list in 2024.
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Single item -->

            <!-- Single item -->
            <div class="single-item col-lg-4 col-md-6">
                <div class="item">
                    <div class="thumb" style="height: 245px;">
                        <a href="blog_detail2"><img src="assets/img/downloadblog1.jpg" alt="Thumb" class="h-100"></a>
                        <div class="date"><strong>25</strong> <span>March</span></div>
                    </div>
                    <div class="info">
                        <h4>
                            <a href="blog_detail2">Travel Hacks: Save Money and Travel Smarter</a>
                        </h4>
                        <p class="blog_paragraph">
                            Discover essential travel hacks to save money, pack efficiently, and make the most out of your trips. Learn how to find hidden travel deals and avoid common travel mistakes.
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Single item -->

            <!-- Single item -->
            <div class="single-item col-lg-4 col-md-6">
                <div class="item">
                    <div class="thumb" style="height: 245px;">
                        <a href="blog_detail3"><img src="assets/img/womentravel.jpg" alt="Thumb" class="h-100"></a>
                        <div class="date"><strong>30</strong> <span>March</span></div>
                    </div>
                    <div class="info">
                        <h4>
                            <a href="blog_detail3">Cultural Wonders: Immersive Travel Experiences</a>
                        </h4>
                        <p class="blog_paragraph">
                            Step into the heart of diverse cultures around the world. From local festivals to traditional cuisine, explore immersive travel experiences that leave a lasting impression.
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Single item -->

        </div>
    </div>

</div>
<!-- End Blog -->
<script>
    var base_url = "<?php echo base_url(); ?>";

    function Showcitydata() {
        var stateid = $('#destination_state').val(); // Get the selected state ID

        // Make AJAX request to fetch the city list based on selected state
        $.ajax({
            url: base_url + 'Home/getcitylist',
            data: {
                "state_id": stateid
            }, // Send state_id as data
            type: 'POST',
            success: function(data) {

                dataa = JSON.parse(data);
                console.log(dataa);
                debugger;
                // Directly update the city dropdown with the returned HTML options
                $("#destination_district").html(dataa);
            }
        });
    }

    function showCarDetails(car) {
        let carName = '';
        let carDescription = '';
        let carImage = '';

        if (car === 'wagonr') {
            carName = 'Suzuki WagonR';
            carDescription = 'The WagonR is a compact city car offering great fuel efficiency and easy handling.';
            carImage = 'assets/img/wagoner.jpg'; // Local image for WagonR
        } else if (car === 'dezire') {
            carName = 'Suzuki Dzire';
            carDescription = 'The Dzire is a compact sedan, known for its style and comfort along with impressive fuel economy.';
            carImage = 'assets/img/dezire.jpg'; // Local image for Dzire
        } else if (car === 'ertiga') {
            carName = 'Suzuki Ertiga';
            carDescription = 'The Ertiga is a spacious and affordable MPV, offering comfort and practicality for families.';
            carImage = 'assets/img/ertiga.jpg'; // Local image for Ertiga
        }

        // Display the selected car details
        document.getElementById('car-name').innerText = carName;
        document.getElementById('car-description').innerText = carDescription;
        document.getElementById('car-image').src = carImage;
        document.getElementById('car-details').style.display = 'block';
    }
</script>
