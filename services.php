<?php
$title = "My Services";
$currentPage = "services";
include_once 'components/head.php';
include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';
?>


<!-- Services & Pricing section start -->
<section class="pt-120 pb-120 br-bottom-n3 mt-10 mt-lg-0">
    <div class="pb-60 br-bottom-n3">
        <div data-aos="zoom-in" class="page-heading">
            <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
                My Services
            </h3>
            <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
                I have <?= $getAboutMe['years_of_experience'] ?? '' ?>+ years of development experience building
                software for
                the web and mobile devices. You can take a look at my
                <a href="resume.php" class="p1-color">online resume</a> and
                <a href="portfolio.php" class="p1-color">project portfolio</a>
                to find out more about my skills and experiences.
            </p>

            <a href="contact.php"
                class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto w-max">
                <i class="ph ph-paper-plane-tilt"></i>Book a Consultation
            </a>
        </div>
    </div>

    <div class="container mt-8 mt-md-15">
        <div data-aos="zoom-in" class="section-heading">
            <div class="d-flex align-items-center gap-2">
                <div class="title-line"></div>
                <h2 class="display-four n5-color fw-semibold">
                    Services
                </h2>
            </div>
            <p class="fs-seven n4-color mt-2 mt-md-4">
                From powerful web applications to intelligent enterprise solutions, I build high-performance, secure,
                and scalable software tailored to your needs. Whether you need a website, mobile app, enterprise portal,
                SaaS platform, or backend system, I bring your vision to life.
            </p>
        </div>

        <div class="mt-8 mt-md-15">
            <div class="row g-6">
                <div data-aos="fade-up" data-aos-delay="700" class="col-sm-6 col-xl-4">
                    <div class="pricing-card bgn2-color brn4 px-3 px-md-6 py-4 py-md-8 text-center">
                        <h3 class="p1-color fs-two mb-3">Graphics & Brand Design</h3>
                        <span class="fs-eight n5-color">I offer creative design solutions to boost your brand’s identity
                            and visibility.</span>
                        <div class="line-divider my-4 my-md-7"></div>
                        <ul>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Logo & Branding Design
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Business Cards, Flyers &
                                Brochures
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Social Media Graphics
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Digital Marketing
                            </li>
                        </ul>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="800" class="col-sm-6 col-xl-4">
                    <div
                        class="pricing-card bgn2-color brn4 px-3 px-md-6 py-4 py-md-8 text-center overflow-hidden position-relative">

                        <h3 class="p1-color fs-two mb-3">Full-Stack Web Development</h3>
                        <span class="fs-eight n5-color">I develop custom and visually stunning web applications using
                            modern web technologies.</span>
                        <div class="line-divider my-4 my-md-7"></div>
                        <ul>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Custom Business Websites & Blogs
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>E-commerce Platforms
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Online Payment Systems
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Admin Dashboards & Web Portals
                            </li>
                        </ul>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="900" class="col-sm-6 col-xl-4">
                    <div class="pricing-card bgn2-color brn4 px-3 px-md-6 py-4 py-md-8 text-center">
                        <h3 class="p1-color fs-two mb-3">Custom Software Development</h3>
                        <span class="fs-eight n5-color">I build custom applications that meet specific operational
                            needs.</span>
                        <div class="line-divider my-4 my-md-7"></div>
                        <ul>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Business Process Automation Tools
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Workflow/Task Management Systems
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Interactive Dashboards
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>API-Driven Applications
                            </li>
                        </ul>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="700" class="col-sm-6 col-xl-4">
                    <div class="pricing-card bgn2-color brn4 px-3 px-md-6 py-4 py-md-8 text-center">
                        <h3 class="p1-color fs-two mb-3">Enterprise Softwares</h3>
                        <span class="fs-eight n5-color">I create enterprise-level apps that help businesses streamline
                            operations and enhance productivity.</span>
                        <div class="line-divider my-4 my-md-7"></div>
                        <ul>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Employee & HR Management Portals
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Customer Relationship Management
                                Solutions
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Enterprise Resource Planning
                                (ERP) Systems
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Secure Internal Business Tools
                            </li>
                        </ul>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="800" class="col-sm-6 col-xl-4">
                    <div
                        class="pricing-card bgn2-color brn4 px-3 px-md-6 py-4 py-md-8 text-center overflow-hidden position-relative">

                        <h3 class="p1-color fs-two mb-3">Legacy Software Modernization</h3>
                        <span class="fs-eight n5-color">If your old software is slowing down your business, I can revamp
                            or upgrade it for better performance.</span>
                        <div class="line-divider my-4 my-md-7"></div>
                        <ul>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Upgrading Legacy PHP Systems
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Migrating to Cloud & Modern Tech
                                Stacks
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Security Enhancements
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Performance Optimization
                            </li>
                        </ul>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="900" class="col-sm-6 col-xl-4">
                    <div class="pricing-card bgn2-color brn4 px-3 px-md-6 py-4 py-md-8 text-center">
                        <h3 class="p1-color fs-two mb-3">API Dev & Backend Services</h3>
                        <span class="fs-eight n5-color"> I develop secure, high-performance APIs for seamless
                            integration.</span>
                        <div class="line-divider my-4 my-md-7"></div>
                        <ul>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>RESTful & GraphQL API Development
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Authentication & Secure Access
                                Control
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>Scalable Backend Architecture
                            </li>
                            <li class="d-flex gap-3 align-items-center n5-color mb-2 mb-md-3">
                                <i class="ph-fill ph-check-circle fs-six p1-color"></i>API-Driven Web Applications
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div data-aos="zoom-in" class="hire-content mt-8 mt-md-15">
            <h4 class="n5-color fs-three fw-semibold text-center mb-2 mb-md-4">
                Want to hire me for custom package?
            </h4>
            <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
                Your ideas deserve the best execution. Whether it’s a website, mobile app, SaaS platform, enterprise
                system, API, or AI-powered solution, I’m here to turn your vision into reality.
            </p>
            <a href="contact.php"
                class="w-max primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
                <i class="ph ph-paper-plane-tilt"></i>Start Building With Me
            </a>
        </div>
    </div>
</section>
<!-- Services & Pricing section end -->

<?php
include_once 'components/footer.php';
?>