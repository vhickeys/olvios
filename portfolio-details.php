<?php

$title = "My Portfolio";
$currentPage = "portfolio";
include_once 'components/head.php';

if (!isset($_GET['portId']) || empty($_GET['portId']) || ($portfolio->getPortfolioBySlugStatus($_GET['portId']) == [])) {
    echo "<script>window.history.back()</script>";
}

include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';
?>

<!-- Portfolio details section start -->
<section class="pt-120 pb-120 mt-10 mt-lg-0">
    <div class="pb-60">
        <div data-aos="zoom-in" class="page-heading">
            <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
                <?= $portfolio_details['title'] ?? '' ?>
            </h3>
            <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
                <?= $portfolio_details['caption'] ?? '' ?>
            </p>
            <a href="contact.php"
                class="w-max primary-btn fw-medium n11-color px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
                <i class="ph ph-paper-plane-tilt"></i>Hire Me
            </a>
        </div>
    </div>
    <div class="container mt-8 mt-md-15 pb-60">
        <div class="row g-6">
            <div data-aos="fade-left" class="col-12 col-xl-3">
                <div class="d-flex flex-column gap-5 position-sticky top-5 brn4 p-3 rounded">
                    <div>
                        <span class="n4-color fs-eight fw-medium d-block">Client:</span>
                        <span class="n5-color fs-six fw-medium">
                            <?= $portfolio_details['client'] ?? '' ?>
                        </span>
                    </div>
                    <div>
                        <span class="n4-color fs-eight fw-medium d-block">Services</span>
                        <span class="n5-color fs-six fw-medium">
                            <?= $portfolio_details['services'] ?? '' ?>
                        </span>
                    </div>
                    <div>
                        <span class="n4-color fs-eight fw-medium d-block">Technologies</span>
                        <span class="n5-color fs-six fw-medium">
                            <?= $portfolio_details['technologies'] ?? '' ?>
                        </span>
                    </div>
                    <div>
                        <span class="n4-color fs-eight fw-medium d-block">Project Start Date</span>
                        <span class="n5-color fs-six fw-medium">
                            <?= date("d M, Y", strtotime($portfolio_details['date'])) ?>
                        </span>
                    </div>
                    <div>
                        <span class="n4-color fs-eight fw-medium d-block">Duration</span>
                        <span class="n5-color fs-six fw-medium">
                            <?= $portfolio_details['duration'] ?? '' ?>
                        </span>
                    </div>
                    <div>
                        <span class="n4-color fs-eight fw-medium d-block">Website</span>
                        <a href="<?= $portfolio_details['project_url'] ?? '' ?>" target="__blank"
                            class="n5-color fs-six fw-medium d-flex align-items-center gap-2">Live
                            preview <i class="ph-bold ph-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div data-aos="fade-right" class="col-12 col-xl-9">
                <div class="project-details-content d-flex flex-column gap-8 gap-md-15">
                    <div class="overflow-hidden">
                        <img src="assets/images/portfolios/<?= $portfolio_details['image'] ?>"
                            alt="<?= $portfolio_details['title'] ?> | Victor Osaronwafor"
                            class="w-100 portfolio-details-img" />
                    </div>
                    <div data-aos="fade-up">
                        <?= $portfolio_details['description'] ?? '' ?>
                    </div>
                    <div data-aos="fade-up">
                        <h2 class="fs-two fw-semibold n5-color mb-2 mb-md-4">
                            The Results
                        </h2>
                        <div class="row g-3 g-md-5">
                            <div class="col-sm-6 col-xl-4 col-xxl-3">
                                <div class="bgn2-color brn4 p-3 p-md-5">
                                    <span class="p1-color fs-six fw-medium mb-2 d-block">Efficiency</span>
                                    <div class="d-flex align-items-end gap-1 mb-2 mb-md-3">
                                        <h4 class="fs-three n5-color fw-semibold">20%</h4>
                                        <span class="fs-six n4-color fw-medium">up</span>
                                    </div>
                                    <p class="fs-eight n4-color">
                                        Metric description lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 col-xxl-3">
                                <div class="bgn2-color brn4 p-3 p-md-5">
                                    <span class="p1-color fs-six fw-medium mb-2 d-block">Customer Happy</span>
                                    <div class="d-flex align-items-end gap-1 mb-2 mb-md-3">
                                        <h4 class="fs-three n5-color fw-semibold">14%</h4>
                                        <span class="fs-six n4-color fw-medium">up</span>
                                    </div>
                                    <p class="fs-eight n4-color">
                                        Metric description lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 col-xxl-3">
                                <div class="bgn2-color brn4 p-3 p-md-5">
                                    <span class="p1-color fs-six fw-medium mb-2 d-block">Sales Generated</span>
                                    <div class="d-flex align-items-end gap-1 mb-2 mb-md-3">
                                        <h4 class="fs-three n5-color fw-semibold">$130K</h4>
                                        <!-- <span class="fs-six n4-color fw-medium">k</span> -->
                                    </div>
                                    <p class="fs-eight n4-color">
                                        Metric description lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 col-xxl-3">
                                <div class="bgn2-color brn4 p-3 p-md-5">
                                    <span class="p1-color fs-six fw-medium mb-2 d-block">Overall Cost</span>
                                    <div class="d-flex align-items-end gap-1 mb-2 mb-md-3">
                                        <h4 class="fs-three n5-color fw-semibold">20%</h4>
                                        <span class="fs-six n4-color fw-medium">down</span>
                                    </div>
                                    <p class="fs-eight n4-color">
                                        Metric description lorem ipsum dolor sit amet.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- next project section start -->
    <div class="next-project pt-120 pb-120">
        <div class="container d-flex gap-3 gap-md-6 flex-wrap justify-content-between align-items-center">
            <div data-aos="zoom-in-left" class="next-project-content">
                <h3 class="display-four n11-color fw-semibold mb-2 mb-md-4">
                    Let’s Work together on your next Project
                </h3>
                <p class="fs-seven n11-color">
                    I am available for freelance projects. Hire me and get your
                    project done.
                </p>
            </div>
            <a data-aos="zoom-in-right" href="contact.php"
                class="primary-btn bg1-color fw-medium n11-color px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 h-100 text-nowrap">
                <i class="ph ph-arrow-right"></i>Let’s get in touch
            </a>
        </div>
    </div>
    <!-- next project section end -->
</section>
<!-- Portfolio details section end -->

<?php
include_once 'components/footer.php';
?>