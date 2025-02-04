    <!-- sidebar start -->
    <div class="side-menu">
      <!-- sidebar-btn  -->
      <div class="sidebar-btn close-btn cursor-pointer d-block d-lg-none">
        <i class="ph ph-x fs-two p1-color"></i>
      </div>

      <div class="d-flex">
        <div class="side-menu-left">
          <div>
            <div class="d-flex flex-column gap-8 justify-content-center align-items-center mt-6">
              <a href="index.php" class="side-icon p1-color bgn2-color brn4">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
                  <g clip-path="url(#clip0_3569_434)">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M5.69145 8.43063L1.72801 5.49387L5.69145 2.54023V0L0 4.21303V6.75919L5.69145 10.9887V8.43063Z"
                      fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M1.72801 5.49387L5.69145 2.54023V0L0 4.21303V6.75919L1.72801 5.49387Z" fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M4.86328 6.5702L8.82672 9.5065L4.86328 12.4606V15.0004L10.5552 10.7864V8.24163L4.86328 4.01172V6.5702Z"
                      fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M4.86328 6.5702L8.82672 9.5065L10.5552 10.7864V8.24163L4.86328 4.01172V6.5702Z"
                      fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M8.72466 2.00391C9.52091 2.00391 10.1657 2.64912 10.1657 3.44491C10.1657 4.24115 9.52091 4.88591 8.72466 4.88591C7.92841 4.88591 7.2832 4.2407 7.2832 3.44491C7.2832 2.64912 7.92841 2.00391 8.72466 2.00391Z"
                      fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M1.83013 12.9972C1.03388 12.9972 0.388672 12.352 0.388672 11.5562C0.388672 10.7604 1.03388 10.1152 1.82967 10.1152C2.62546 10.1152 3.27067 10.76 3.27067 11.5562C3.27067 12.3525 2.62592 12.9972 1.82967 12.9972H1.83013Z"
                      fill="currentColor" />
                  </g>
                  <defs>
                    <clipPath>
                      <rect width="10.5561" height="15" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </a>
              <!-- <a href="checkout.php" class="position-relative">
                <div class="side-icon bg1-color">
                  <i class="ph ph-shopping-cart n11-color"></i>
                </div>
                <div class="cart-counter">
                  <span class="n1-color">02</span>
                </div>
              </a> -->
              <div class="d-flex flex-column align-items-center gap-1">
                <span class="toggle_name fs-eleven n5-color">DarkMode</span>
                <button class="side-icon bg1-color mood_toggle">
                  <i class="mood_icon ph-fill ph-moon fs-six n11-color"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="side-menu-right overflow-y-auto">
          <div class="d-flex flex-column gap-6 justify-content-between py-10 px-5 bgn2-color h-100">
            <div class="">
              <div class="sidebar-profile">
                <div class="position-relative">
                  <div class="profile-img1 d-flex justify-content-center overflow-hidden">
                    <img src="assets/images/aboutMe/<?= $getAboutMe['image'] ?>" alt="<?= $getAboutMe['name'] ?? '' ?>" class="" />
                  </div>
                  <span class="thumb">👋</span>
                </div>

                <h4 class="n5-color fw-semibold fs-five mt-2 text-center">
                <?= $getAboutMe['name'] ?? '' ?>
                </h4>
                <span class="n5-color fs-nine d-block text-center"><?= $getAboutMe['role'] ?? '' ?></span>
                <div class="d-flex justify-content-center gap-2 align-items-center mt-4">
                  <a href="javascript:void(0)" class="social-icon p1-color">
                    <i class="ph ph-facebook-logo"></i>
                  </a>
                  <a href="javascript:void(0)" class="social-icon p1-color">
                    <i class="ph ph-instagram-logo"></i>
                  </a>
                  <a href="javascript:void(0)" class="social-icon p1-color">
                    <i class="ph ph-x-logo"></i>
                  </a>
                  <a href="javascript:void(0)" class="social-icon p1-color">
                    <i class="ph ph-linkedin-logo"></i>
                  </a>
                </div>
              </div>
              <div class="line-divider my-4 my-md-8"></div>

              <div class="menu-list">
                <ul class="d-flex flex-column gap-3">
                  
                  <li class="rounded-3 <?= setActivePage1($currentPage, 'homepage') ?>">
                    <a href="index.php" class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'homepage') ?> fs-eight px-3 py-2"><i
                        class="ph ph-user fs-six"></i> About Me</a>
                  </li>

                  <li class="rounded-3 <?= setActivePage1($currentPage, 'portfolio') ?>">
                    <a href="portfolio.php" class="d-flex justify-content-between align-items-center">
                      <div class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'portfolio') ?> fs-eight px-3 py-2">
                        <i class="ph ph-code-block fs-six"></i> Portfolio
                      </div>
                      <span class="n5-color bg2-color fs-ten px-1 pt-1 rounded-2 me-3"><?= $portfolio->portfolioStatusCount() ?></span>
                    </a>
                  </li>
                  <li class="rounded-3 <?= setActivePage1($currentPage, 'services') ?>">
                    <a href="services.php" class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'services') ?> fs-eight px-3 py-2"><i
                        class="ph ph-briefcase fs-six"></i>Services</a>
                  </li>
                  <li class="rounded-3">
                    <a href="resume.php" class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2"><i
                        class="ph ph-notebook fs-six"></i> Resume</a>
                  </li>
                  <li class="rounded-3 <?= setActivePage1($currentPage, 'products') ?>">
                    <a href="products.php" class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'products') ?> fs-eight px-3 py-2"><i
                        class="ph ph-shopping-bag fs-six"></i>Products</a>
                  </li>
                  <li class="rounded-3 <?= setActivePage1($currentPage, 'blog') ?>">
                    <a href="blog.php" class="d-flex align-items-center gap-2 <?= setActivePage2($currentPage, 'blog') ?> fs-eight px-3 py-2"><i
                        class="ph ph-newspaper-clipping fs-six"></i>Blog</a>
                  </li>
                  <li class="rounded-3">
                    <a href="contact.php" class="d-flex align-items-center gap-2 n5-color fs-eight px-3 py-2"><i
                        class="ph ph-envelope fs-six"></i>Contact</a>
                  </li>
                </ul>
              </div>
            </div>
            <a href="contact.php"
              class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill d-flex align-items-center gap-2 mx-auto">
              <i class="ph ph-paper-plane-tilt"></i>Hire Me
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- sidebar end -->

<div class="main-content w-100">
