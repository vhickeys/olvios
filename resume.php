<?php
$title = "My Resume";
$currentPage = "resume";
include_once 'components/head.php';
include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';

$work_exps = $aboutMe->getWorkExpByStatus();
?>


<!-- Resume section start -->
<section class="pt-120 pb-120 mt-10 mt-lg-0">
    <div class="pb-60 br-bottom-n3">
        <div data-aos="zoom-in" class="page-heading">
            <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
                Online Resume
            </h3>

            <a href="assets/images/aboutMe/<?= $getAboutMe['resume'] ?: '' ?>"
                class="w-max primary-btn bg1-color fw-medium n1-color px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto"
                download>
                <i class="ph ph-file-pdf"></i>Download PDF Version
            </a>
        </div>
    </div>

    <div class="container mt-8 mt-md-15">
        <div data-aos="fade-up" class="bgn2-color p-4 p-sm-8 p-md-15 rounded-5 brn4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 br-bottom-n3 pb-3 pb-md-6">
                <div>
                    <h2 class="display-three p1-color fw-semibold">
                        <?= $getAboutMe['name'] ?: '' ?>
                    </h2>
                    <span class="n4-color fs-six fw-medium"><?= $getAboutMe['role'] ?: '' ?></span>
                </div>
                <div class="ps-5 br-left-n3">
                    <ul class="d-flex flex-column gap-3">
                        <li>
                            <a href="tel:+6494461709" class="d-flex gap-2 align-items-center n4-color">
                                <i class="ph ph-phone"></i> 0123 4567 890</a>
                        </li>
                        <li>
                            <a href="mailto:<?= $webSetting['email'] ?: '' ?>"
                                class="d-flex gap-2 align-items-center n4-color">
                                <i class="ph ph-envelope-simple"></i><?= $webSetting['email'] ?: '' ?></a>
                        </li>
                        <li class="d-flex gap-2 align-items-center n4-color">
                            <i class="ph ph-globe"></i>
                            <?php
                            $host = $_SERVER['HTTP_HOST'];
                            if (strpos($host, 'www.') === false) {
                                $host = 'www.' . $host;
                            }
                            echo $host;
                            ?>


                        </li>
                        <li class="d-flex gap-2 align-items-center n4-color">
                            <i class="ph ph-map-pin"></i> <?= $webSetting['office_address'] ?: '' ?>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="d-flex flex-wrap flex-md-nowrap align-items-center gap-5 gap-md-10 pb-4 pb-md-8 br-bottom-n3 pt-60">
                <div class="resume-profile flex-shrink-0">
                    <img src="assets/images/aboutMe/<?= $getAboutMe['image'] ?: '' ?>"
                        alt="<?= $getAboutMe['name'] ?: '' ?>" class="object-fit-cover" width="127" height="159" />
                </div>
                <div class="n42-color fs-seven">
                    <?= $getAboutMe['pro_summary'] ?: '' ?>
                </div>
            </div>

            <div class="resume-section row g-6 pt-60 pb-60 br-bottom-n3">
                <div class="col-md-8 col-lg-12 col-xl-8 col-xxl-9">
                    <?php if ($work_exps != []): ?>

                        <div class="d-flex align-items-center gap-2 mb-5 mb-md-10">
                            <div class="title-line2"></div>
                            <h2 class="fs-three p1-color fw-semibold">
                                Work Experiences
                            </h2>
                        </div>

                        <?php foreach ($work_exps as $key => $work_exp): ?>
                            <div class="mb-4 mb-md-6">
                                <div class="d-flex flex-wrap gap-1 gap-sm-3 justify-content-between align-items-center">
                                    <span class="n5-color fs-six fw-medium"><?= $work_exp['job_title'] ?? '' ?></span>
                                    <span class="n4-color fs-eight"><?= $work_exp['company'] ?? '' ?> |
                                        <?= $work_exp['duration'] ?? '' ?></span>
                                </div>
                                <p class="n42-color fs-seven my-2 my-md-5">
                                    <?= $work_exp['description'] ?? '' ?>
                                </p>
                            </div>
                        <?php endforeach ?>

                    <?php endif; ?>

                    <?php if ($allProducts != []): ?>
                        <div class="d-flex align-items-center gap-2 mb-5 mb-md-10">
                            <div class="title-line2"></div>
                            <h2 class="fs-three p1-color fw-semibold">Projects</h2>
                        </div>

                        <?php foreach ($allProducts as $project): ?>
                            <div class="mb-4 mb-md-6">
                                <div
                                    class="d-flex flex-wrap gap-1 gap-sm-3 justify-content-between align-items-center mb-2 mb-md-4">
                                    <span class="n5-color fs-six fw-medium"><?= $project['name'] ?? '' ?></span>
                                </div>
                                <p class="n42-color fs-seven">
                                    <?= $project['caption'] ?? '' ?>
                                </p>
                            </div>
                        <?php endforeach ?>

                    <?php endif; ?>
                </div>

                <!-- right side  -->
                <div class="col-md-4 col-lg-12 col-xl-4 col-xxl-3">
                    <div class="ps-4 ps-xxl-7 br-left-n3 d-flex flex-column gap-8 gap-md-15">
                        <!-- skills  -->
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-5 mb-md-10">
                                <div class="title-line2"></div>
                                <h2 class="fs-three p1-color fw-semibold">Skills</h2>
                            </div>

                            <div class="mb-3 mb-md-6 ms-5 n4-color">
                                <?= $getAboutMe['skills'] ?: '' ?>
                            </div>
                        </div>

                        <!-- education  -->
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-3 mb-md-6">
                                <div class="title-line2"></div>
                                <h2 class="fs-three p1-color fw-semibold">Education</h2>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="ms-5 n4-color">
                                    <?= $getAboutMe['education'] ?: '' ?>
                                </div>
                            </div>
                        </div>

                        <!-- awards  -->
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-3 mb-md-6">
                                <div class="title-line2"></div>
                                <h2 class="fs-three p1-color fw-semibold">Awards</h2>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="ms-5 n4-color">
                                    <?= $getAboutMe['awards'] ?: '' ?>
                                </div>
                            </div>
                        </div>

                        <!-- Languages  -->
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-3 mb-md-6">
                                <div class="title-line2"></div>
                                <h2 class="fs-three p1-color fw-semibold">Languages</h2>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="ms-5 n4-color">
                                    <?= $getAboutMe['languages'] ?: '' ?>
                                </div>
                            </div>
                        </div>


                        <!-- Interests  -->
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-3 mb-md-6">
                                <div class="title-line2"></div>
                                <h2 class="fs-three p1-color fw-semibold">Interests</h2>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="ms-5 n4-color">
                                    <?= $getAboutMe['interest'] ?: '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="d-flex flex-wrap gap-2 gap-md-3 gap-md-5 align-items-center justify-content-center mt-4 mt-md-8">
                <a href="<?= $getAboutMe['github_link'] ?: '' ?>" class="d-flex gap-1 align-items-center resume-icon">
                    <div class="social-icon">
                        <i class="ph ph-github-logo p1-color"></i>
                    </div>
                    <span class="fs-nine n4-color"><?= $getAboutMe['github_link'] ?: '' ?></span>
                </a>
                <a href="<?= $webSetting['linkedIn'] ?: '' ?>" class="d-flex gap-1 align-items-center resume-icon">
                    <div class="social-icon">
                        <i class="ph ph-linkedin-logo p1-color"></i>
                    </div>
                    <span class="fs-nine n4-color">@victorosaronwafor</span>
                </a>
                <a href="<?= $webSetting['youtube'] ?: '' ?>" class="d-flex gap-1 align-items-center resume-icon">
                    <div class="social-icon">
                        <i class="ph ph-youtube-logo p1-color"></i>
                    </div>
                    <span class="fs-nine n4-color">youtube.com/c/gravicsdesigns</span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Resume section end -->

<?php
include_once 'components/footer.php';
?>