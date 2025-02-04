<?php
$title = "My Portfolio";
$currentPage = "portfolio";
include_once 'components/head.php';
include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';
?>

<!-- best project section start -->
<section class="pt-120 pb-120 mt-10 mt-lg-0">
  <div class="pb-60 br-bottom-n3">
    <div data-aos="zoom-in" class="page-heading">
      <h3 class="page-title n5-color fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
        A collection of my best projects
      </h3>
      <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
        With many years in web development, I acquired extensive
        experience working on projects across multiple industries and
        technologies. Let me show you my best creations.
      </p>
      <a href="contact.php"
        class="w-max primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
        <i class="ph ph-paper-plane-tilt"></i>Book a Consultation
      </a>
    </div>
  </div>
  <div class="container mt-8 mt-md-15">
    <!-- tab -->
    <div>
      <ul data-aos="zoom-in" data-aos-duration="800"
        class="tabs d-flex gap-3 gap-md-6 justify-content-center flex-wrap p-2 pb-5 pb-md-10">
        <li data-tab-target="#all" class="active fs-seven fw-medium cursor-pointer n3-color pb-1 tab">
          All
        </li>

        <?php if ($categories != []): ?>

          <?php foreach ($categories as $category): ?>

            <li data-tab-target="#<?= $category['slug'] ?>" class="fs-seven fw-medium cursor-pointer n3-color pb-1 tab">
              <?= $category['name'] ?>
            </li>

          <?php endforeach; ?>

        <?php else: ?>
          <li data-tab-target="#all" class="fs-seven fw-medium cursor-pointer n3-color pb-1 tab">
            No Category Found!
          </li>
        <?php endif; ?>

      </ul>

      <div class="tab-content position-relative overflow-hidden">
        <div id="all" data-tab-content class="active">
          <div class="row g-6 g-md-8">

            <?php if ($allPortfolios != []): ?>

              <?php foreach ($allPortfolios as $allPortfolio): ?>

                <div data-aos="fade-up" data-aos-duration="800" class="col-xl-6">
                  <div class="project-card">
                    <a href="portfolio-details.php?portId=<?= $allPortfolio['slug'] ?? '' ?>" class="thumb d-block">
                      <div class="post-thumb">
                        <div class="post-thumb-inner">
                          <img src="assets/images/portfolios/<?= $allPortfolio['image'] ?? '' ?>"
                            alt="<?= $allPortfolio['title'] ?? '' ?> | Victor Osaronwafor" class="w-100 p-2" />
                        </div>
                      </div>
                      <div class="post-thumb">
                        <div class="post-thumb-inner">
                          <img src="assets/images/portfolios/<?= $allPortfolio['image'] ?? '' ?>"
                            alt="<?= $allPortfolio['title'] ?? '' ?> | Victor Osaronwafor" class="w-100 p-2" />
                        </div>
                      </div>
                    </a>

                    <div class="d-flex justify-content-between gap-2 align-items-center pt-4 pt-md-8 px-3 px-md-6">
                      <div>
                        <div class="d-flex gap-2 align-items-center">
                          <a href="javascript:void(0)"
                            class="n5-color fs-nine px-2 px-md-4 py-1 py-md-2 brn3 rounded-pill fw-medium">React
                            JS</a>
                          <a href="javascript:void(0)"
                            class="n5-color fs-nine px-2 px-md-4 py-1 py-md-2 brn3 rounded-pill fw-medium">gsap</a>
                          <a href="javascript:void(0)"
                            class="n5-color fs-nine px-2 px-md-4 py-1 py-md-2 brn3 rounded-pill fw-medium">Web
                            Development</a>
                        </div>
                        <a href="portfolio-details.php?portId=<?= $allPortfolio['slug'] ?? '' ?>"
                          class="project-title fs-five fw-semibold n5-color mt-3 mt-md-5 d-block">
                          <?= $allPortfolio['title'] ?? '' ?>
                        </a>
                      </div>
                      <a href="portfolio-details.php?portId=<?= $allPortfolio['slug'] ?? '' ?>"
                        class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                        <i class="ph-bold ph-arrow-up-right n5-color"></i>
                      </a>
                    </div>
                  </div>
                </div>

              <?php endforeach; ?>

            <?php else: ?>
              <div class="alert alert-info ps-5">
                No Portfolio at the moment, please check again later!
              </div>
            <?php endif; ?>

          </div>
        </div>

        <?php foreach ($categories as $category): ?>

          <div id="<?= $category['slug'] ?>" data-tab-content style="display: none;">
            <div class="row g-6 g-md-8">

              <?php
              $cat_portfolios = $portfolio->getPortfolioByCatId($category['id']);

              if ($cat_portfolios != []) {

                foreach ($cat_portfolios as $cat_portfolio) {
                  ?>

                  <div class="col-xl-6 mb-5">
                    <div class="project-card">
                      <a href="portfolio-details.php?portId=<?= $cat_portfolio['slug'] ?>" class="thumb d-block">
                        <div class="post-thumb">
                          <div class="post-thumb-inner">
                            <img src="assets/images/portfolios/<?= $cat_portfolio['image'] ?? '' ?>"
                              alt="<?= $cat_portfolio['title'] ?? '' ?> | Victor Osaronwafor" class="w-100 p-2" />
                          </div>
                        </div>
                        <div class="post-thumb">
                          <div class="post-thumb-inner">
                            <img src="assets/images/portfolios/<?= $cat_portfolio['image'] ?? '' ?>"
                              alt="<?= $cat_portfolio['title'] ?? '' ?> | Victor Osaronwafor" class="w-100 p-2" />
                          </div>
                        </div>
                      </a>

                      <div class="d-flex justify-content-between gap-2 align-items-center pt-4 pt-md-8 px-3 px-md-6">
                        <div>
                          <div class="d-flex gap-2 align-items-center">
                            <a href="javascript:void(0)"
                              class="n5-color fs-nine px-2 px-md-4 py-1 py-md-2 brn3 rounded-pill fw-medium">React
                              JS</a>
                            <a href="javascript:void(0)"
                              class="n5-color fs-nine px-2 px-md-4 py-1 py-md-2 brn3 rounded-pill fw-medium">gsap</a>
                            <a href="javascript:void(0)"
                              class="n5-color fs-nine px-2 px-md-4 py-1 py-md-2 brn3 rounded-pill fw-medium">Web
                              Development</a>
                          </div>
                          <a href="portfolio-details.php?portId=<?= $cat_portfolio['slug'] ?>"
                            class="project-title fs-five fw-semibold n5-color mt-3 mt-md-5 d-block">
                            <?= $cat_portfolio['title'] ?? '' ?>
                          </a>
                        </div>
                        <a href="portfolio-details.php?portId=<?= $cat_portfolio['slug'] ?>"
                          class="project-link d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ph-bold ph-arrow-up-right n5-color"></i>
                        </a>
                      </div>
                    </div>
                  </div>

                  <?php
                }
              } else {
                ?>
                <div class="alert alert-info ps-5">
                  No Portfolio for this category at the moment, please check again later!
                </div>
                <?php
              }
              ?>

            </div>
          </div>

        <?php endforeach; ?>


      </div>
    </div>
  </div>
</section>
<!-- best project section end -->

<?php
include_once 'components/footer.php';
?>