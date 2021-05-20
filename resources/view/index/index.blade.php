@extends("app.app")
@section("title")
    yoga
@endsection
@section("content")
    <!-- Hero Start -->
    <div class="hero">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6">
                    <div class="hero-text">
                        <h1>Yoga Practice For Good Health</h1>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasell nec pretum mi. Curabi ornare velit non. Aliqua metus tortor auctor quis sem.
                        </p>
                        <div class="hero-btn">
                            <a class="btn" href="">Join Now</a>
                            <a class="btn" href="">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-none d-md-block">
                    <div class="hero-image">
                        <img src="resources/img/hero.png" alt="Hero Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero End -->

    <!-- About Start -->
    <div class="about wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="resources/img/about.png" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p>Learn About Us</p>
                        <h2>Welcome to Yooga</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus.
                        </p>
                        <a class="btn" href="">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="service">
        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>What we do</p>
                <h2>Yoga For Health</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="flaticon-workout"></i>
                        </div>
                        <h3>Heal emotions</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item active">
                        <div class="service-icon">
                            <i class="flaticon-workout-1"></i>
                        </div>
                        <h3>Body Refreshes</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="flaticon-workout-2"></i>
                        </div>
                        <h3>Mind & Serenity</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="flaticon-workout-3"></i>
                        </div>
                        <h3>Enjoy Your life</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="flaticon-workout-4"></i>
                        </div>
                        <h3>Body & Spirituality</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="flaticon-yoga-pose"></i>
                        </div>
                        <h3>Body & Mind</h3>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Class Start -->
    <div class="class">
        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>Our Classes</p>
                <h2>Yoga Class Shedule</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul id="class-filter">
                        <li data-filter="*" class="filter-active">All Classes</li>
                        <li data-filter=".filter-1">Pilates Yoga</li>
                        <li data-filter=".filter-2">Hatha Yoga</li>
                        <li data-filter=".filter-3">Vinyasa yoga</li>
                    </ul>
                </div>
            </div>
            <div class="row class-container">
                <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-1 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="class-wrap">
                        <div class="class-img">
                            <img src="resources/img/class-1.jpg" alt="Image">
                        </div>
                        <div class="class-text">
                            <div class="class-teacher">
                                <img src="resources/img/teacher-1.png" alt="Image">
                                <h3>Elise Moran</h3>
                                <a href="">+</a>
                            </div>
                            <h2>Pilates Yoga</h2>
                            <div class="class-meta">
                                <p><i class="far fa-calendar-alt"></i>Sun, Tue, Thu</p>
                                <p><i class="far fa-clock"></i>9:00 - 10:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-2 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="class-wrap">
                        <div class="class-img">
                            <img src="resources/img/class-2.jpg" alt="Image">
                        </div>
                        <div class="class-text">
                            <div class="class-teacher">
                                <img src="resources/img/teacher-2.png" alt="Image">
                                <h3>Kate Glover</h3>
                                <a href="">+</a>
                            </div>
                            <h2>Iyengar Yoga</h2>
                            <div class="class-meta">
                                <p><i class="far fa-calendar-alt"></i>Sun, Tue, Thu</p>
                                <p><i class="far fa-clock"></i>9:00 - 10:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="class-wrap">
                        <div class="class-img">
                            <img src="resources/img/class-3.jpg" alt="Image">
                        </div>
                        <div class="class-text">
                            <div class="class-teacher">
                                <img src="resources/img/teacher-3.png" alt="Image">
                                <h3>Elina Ekman</h3>
                                <a href="">+</a>
                            </div>
                            <h2>Ashtanga yoga</h2>
                            <div class="class-meta">
                                <p><i class="far fa-calendar-alt"></i>Sun, Tue, Thu</p>
                                <p><i class="far fa-clock"></i>9:00 - 10:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-1 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="class-wrap">
                        <div class="class-img">
                            <img src="resources/img/class-4.jpg" alt="Image">
                        </div>
                        <div class="class-text">
                            <div class="class-teacher">
                                <img src="resources/img/teacher-4.png" alt="Image">
                                <h3>Lilly Fry</h3>
                                <a href="">+</a>
                            </div>
                            <h2>Hatha Yoga</h2>
                            <div class="class-meta">
                                <p><i class="far fa-calendar-alt"></i>Sun, Tue, Thu</p>
                                <p><i class="far fa-clock"></i>9:00 - 10:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-2 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="class-wrap">
                        <div class="class-img">
                            <img src="resources/img/class-5.jpg" alt="Image">
                        </div>
                        <div class="class-text">
                            <div class="class-teacher">
                                <img src="resources/img/teacher-5.png" alt="Image">
                                <h3>Olivia Yates</h3>
                                <a href="">+</a>
                            </div>
                            <h2>Kundalini Yoga</h2>
                            <div class="class-meta">
                                <p><i class="far fa-calendar-alt"></i>Sun, Tue, Thu</p>
                                <p><i class="far fa-clock"></i>9:00 - 10:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 class-item filter-3 wow fadeInUp" data-wow-delay="1s">
                    <div class="class-wrap">
                        <div class="class-img">
                            <img src="resources/img/class-6.jpg" alt="Image">
                        </div>
                        <div class="class-text">
                            <div class="class-teacher">
                                <img src="resources/img/teacher-6.png" alt="Image">
                                <h3>Millie Harper</h3>
                                <a href="">+</a>
                            </div>
                            <h2>Vinyasa yoga</h2>
                            <div class="class-meta">
                                <p><i class="far fa-calendar-alt"></i>Sun, Tue, Thu</p>
                                <p><i class="far fa-clock"></i>9:00 - 10:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Class End -->


    <!-- Discount Start -->
    <div class="discount wow zoomIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-header text-center">
                <p>Awesome Discount</p>
                <h2>Get <span>30%</span> Discount for all Classes</h2>
            </div>
            <div class="container discount-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus.
                </p>
                <a class="btn">Join Now</a>
            </div>
        </div>
    </div>
    <!-- Discount End -->


    <!-- Price Start -->
    <div class="price">
        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>Yoga Package</p>
                <h2>Yoga Pricing Plan</h2>
            </div>
            <div class="row">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="price-item">
                        <div class="price-header">
                            <div class="price-title">
                                <h2>Basic</h2>
                            </div>
                            <div class="price-prices">
                                <h2><small>$</small>49<span>/ mo</span></h2>
                            </div>
                        </div>
                        <div class="price-body">
                            <div class="price-description">
                                <ul>
                                    <li>Personal Trainer</li>
                                    <li>Special Class</li>
                                    <li>Free Tutorials</li>
                                    <li>Group Training</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-footer">
                            <div class="price-action">
                                <a class="btn" href="">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="price-item featured-item">
                        <div class="price-header">
                            <div class="price-status">
                                <span>Popular</span>
                            </div>
                            <div class="price-title">
                                <h2>Standard</h2>
                            </div>
                            <div class="price-prices">
                                <h2><small>$</small>99<span>/ mo</span></h2>
                            </div>
                        </div>
                        <div class="price-body">
                            <div class="price-description">
                                <ul>
                                    <li>Personal Trainer</li>
                                    <li>Special Class</li>
                                    <li>Free Tutorials</li>
                                    <li>Group Training</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-footer">
                            <div class="price-action">
                                <a class="btn" href="">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="price-item">
                        <div class="price-header">
                            <div class="price-title">
                                <h2>Premium</h2>
                            </div>
                            <div class="price-prices">
                                <h2><small>$</small>149<span>/ mo</span></h2>
                            </div>
                        </div>
                        <div class="price-body">
                            <div class="price-description">
                                <ul>
                                    <li>Personal Trainer</li>
                                    <li>Special Class</li>
                                    <li>Free Tutorials</li>
                                    <li>Group Training</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-footer">
                            <div class="price-action">
                                <a class="btn" href="">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price End -->


    <!-- Testimonial Start -->
    <div class="testimonial wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-header text-center">
                <p>Testimonial</p>
                <h2>Our Client Say!</h2>
            </div>
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="resources/img/testimonial-1.jpg" alt="Image">
                    </div>
                    <div class="testimonial-text">
                        <p>
                            Lorem ipsum dolor sit amet consec adipis elit. Etiam accums lacus eget velit tincid, quis suscip justo dictum.
                        </p>
                        <h3>Customer Name</h3>
                        <h4>Profession</h4>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="resources/img/testimonial-2.jpg" alt="Image">
                    </div>
                    <div class="testimonial-text">
                        <p>
                            Lorem ipsum dolor sit amet consec adipis elit. Etiam accums lacus eget velit tincid, quis suscip justo dictum.
                        </p>
                        <h3>Customer Name</h3>
                        <h4>Profession</h4>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="resources/img/testimonial-3.jpg" alt="Image">
                    </div>
                    <div class="testimonial-text">
                        <p>
                            Lorem ipsum dolor sit amet consec adipis elit. Etiam accums lacus eget velit tincid, quis suscip justo dictum.
                        </p>
                        <h3>Customer Name</h3>
                        <h4>Profession</h4>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="resources/img/testimonial-4.jpg" alt="Image">
                    </div>
                    <div class="testimonial-text">
                        <p>
                            Lorem ipsum dolor sit amet consec adipis elit. Etiam accums lacus eget velit tincid, quis suscip justo dictum.
                        </p>
                        <h3>Customer Name</h3>
                        <h4>Profession</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="team">
        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>Yoga Trainer</p>
                <h2>Expert Yoga Trainer</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="resources/img/team-1.jpg" alt="Image">
                            <div class="team-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Millie Harper</h2>
                            <p>Yoga Teacher</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="resources/img/team-2.jpg" alt="Image">
                            <div class="team-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Lilly Fry</h2>
                            <p>Yoga Teacher</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="resources/img/team-3.jpg" alt="Image">
                            <div class="team-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Elise Moran</h2>
                            <p>Yoga Teacher</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="resources/img/team-4.jpg" alt="Image">
                            <div class="team-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-text">
                            <h2>Kate Glover</h2>
                            <p>Yoga Teacher</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Blog Start -->
    <div class="blog">
        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>From Blog</p>
                <h2>Latest Yoga Articles</h2>
            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="resources/img/blog-1.jpg" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <h2>Lorem ipsum dolor</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>Body Fitness</p>
                            <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                            <p><i class="far fa-comments"></i>5</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor
                        </p>
                        <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="resources/img/blog-2.jpg" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <h2>Lorem ipsum dolor</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>Body Fitness</p>
                            <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                            <p><i class="far fa-comments"></i>5</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor
                        </p>
                        <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="resources/img/blog-3.jpg" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <h2>Lorem ipsum dolor</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>Body Fitness</p>
                            <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                            <p><i class="far fa-comments"></i>5</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor
                        </p>
                        <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="resources/img/blog-4.jpg" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <h2>Lorem ipsum dolor</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>Body Fitness</p>
                            <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                            <p><i class="far fa-comments"></i>5</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor
                        </p>
                        <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="resources/img/blog-5.jpg" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <h2>Lorem ipsum dolor</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>Body Fitness</p>
                            <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                            <p><i class="far fa-comments"></i>5</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor
                        </p>
                        <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="resources/img/blog-6.jpg" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <h2>Lorem ipsum dolor</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>Body Fitness</p>
                            <p><i class="far fa-calendar-alt"></i>01-Jan-2045</p>
                            <p><i class="far fa-comments"></i>5</p>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor
                        </p>
                        <a class="btn" href="">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection