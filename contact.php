<?php
$title = "Contact Me";
$currentPage = "contact";
include_once 'components/head.php';
include_once 'components/side-menu.php';
include_once 'components/top-header.php';
include_once 'components/bottom-header.php';
include_once 'components/color-switcher.php';

?>
<!-- Contact Details section start -->
<section class="pt-120 pb-120 mt-10 mt-lg-0">
  <div class="pb-60 br-bottom-n3">
    <div data-aos="zoom-in" class="page-heading">
      <h3 class="page-title fs-onefw-semibold n5-color mb-2 mb-md-3 text-center">
        Contact
      </h3>
      <p class="fs-seven n5-color mb-4 mb-md-8 text-center">
        Interested in hiring me 🤗 for your project or just want to say hi 😍?
        You can fill in the contact form below or send me an email to
        <a href="mailto:<?= $webSetting['email'] ?: '' ?>" class="p1-color"><?= $webSetting['email'] ?: '' ?></a> .Want
        to
        get connected? Follow me on the social channels below.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-2 align-items-center mt-4">
        <a href="<?= $webSetting['facebook'] ?: '' ?>" class="social-icon">
          <i class="ph ph-facebook-logo p1-color"></i>
        </a>
        <a href="<?= $webSetting['instagram'] ?: '' ?>" class="social-icon">
          <i class="ph ph-instagram-logo p1-color"></i>
        </a>
        <a href="<?= $webSetting['twitter'] ?: '' ?>" class="social-icon">
          <i class="ph ph-x-logo p1-color"></i>
        </a>
        <a href="<?= $webSetting['linkedIn'] ?: '' ?>" class="social-icon">
          <i class="ph ph-linkedin-logo p1-color"></i>
        </a>
        <a href="<?= $getAboutMe['github_link'] ?: '' ?>" class="social-icon">
          <i class="ph ph-github-logo p1-color"></i>
        </a>
        <a href="<?= $webSetting['youtube'] ?: '' ?>" class="social-icon">
          <i class="ph ph-youtube-logo p1-color"></i>
        </a>
        <a href="<?= $webSetting['whatsapp_url'] ?: '' ?>" class="social-icon">
          <i class="ph ph-whatsapp-logo p1-color"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="container mt-8 mt-md-15">
    <div data-aos="fade-left" class="section-heading">
      <div class="d-flex align-items-center gap-2">
        <div class="title-line"></div>
        <h2 class="display-four n5-color fw-semibold">
          Contact Details
        </h2>
      </div>
      <p class="fs-seven n4-color mt-2 mt-md-4">
        Need a professional web developer, UI/UX designer, or software expert for your next project? Whether it’s a
        website, mobile app, e-commerce platform, or custom software, I’m ready to bring your vision to life.
      </p>
    </div>

    <div data-aos="fade-up"
      class="d-flex flex-wrap gap-3 gap-md-6 align-items-center justify-content-between mt-8 mt-md-15">
      <div class="d-flex gap-3 align-items-center p-3 p-md-5 br1-left">
        <i class="ph ph-device-mobile-camera p1-color fs-one"></i>
        <div>
          <span class="n5-color fs-five fw-semibold d-block mb-2">Phone</span>
          <a href="tel:+6494461709" class="n4-color fs-nine"><?= $webSetting['phone'] ?: '' ?></a>
        </div>
      </div>
      <div class="d-flex gap-3 align-items-center p-3 p-md-5 br1-left">
        <i class="ph ph-compass p1-color fs-one"></i>
        <div>
          <span class="n5-color fs-five fw-semibold d-block mb-2">Location</span>
          <span class="n4-color fs-nine"><?= $webSetting['office_address'] ?: '' ?></span>
        </div>
      </div>
      <div class="d-flex gap-3 align-items-center p-3 p-md-5 br1-left">
        <i class="ph ph-envelope-open p1-color fs-one"></i>
        <div>
          <span class="n5-color fs-five fw-semibold d-block mb-2">Email</span>
          <a href="mailto:someone@example.com" class="n4-color fs-nine"><?= $webSetting['email'] ?: '' ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Contact Details section end -->

<!-- Get In Touch section start -->
<section class="pb-120">
  <div class="container">
    <div data-aos="fade-up" class="section-heading">
      <div class="d-flex align-items-center gap-2">
        <div class="title-line"></div>
        <h2 class="display-four n5-color fw-semibold">Get In Touch</h2>
      </div>
      <p class="fs-seven n4-color mt-2 mt-md-4">
        Looking for a web developer, UI/UX designer, or tech expert to bring your ideas to life? I’m here to help!
        Whether you need a website, mobile app, e-commerce platform, or software solution, let’s make it happen.
      </p>
    </div>
    <form data-aos="zoom-in" id="submitContact" class="mt-8 mt-md-15 p-5 p-md-10 rounded-5 brn4" id="submitContact">

      <div id="alert">alert</div>

      <div class="d-flex flex-wrap flex-md-nowrap gap-3 gap-md-6 mb-3 mb-md-6">
        <div class="d-flex align-items-center gap-2 px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100">
          <i class="ph ph-octagon p1-color fs-six mb-1"></i>
          <input class="n5-color border-0" placeholder="Your Name*" type="text" id="name" />
        </div>
        <div class="d-flex align-items-center gap-2 px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100">
          <i class="ph ph-envelope p1-color fs-six mb-1"></i>
          <input class="n5-color border-0" placeholder="Email address*" type="email" id="email" />
        </div>
      </div>
      <div class="d-flex flex-wrap flex-md-nowrap gap-3 gap-md-6">
        <div class="d-flex align-items-center gap-2 px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100">
          <i class="ph ph-device-mobile-camera p1-color fs-six mb-1"></i>
          <input class="n5-color border-0" placeholder="Phone*" type="number" id="phone" />
        </div>
        <div class="d-flex align-items-center gap-2 px-3 px-md-5 py-2 py-md-4 rounded-2 brn4 w-100">
          <i class="ph ph-map-pin p1-color fs-six mb-1"></i>
          <input class="n5-color border-0" placeholder="Location*" type="text" id="location" />
        </div>
      </div>
      <div class="mt-3 mt-md-6">
        <textarea class="n5-color px-3 px-md-6 py-2 py-md-4 rounded-2 brn4 w-100 h-120" placeholder="Your Message:"
          id="message"></textarea>
      </div>

      <button id="submit_contact_btn"
        class="primary-btn fw-medium px-3 px-md-6 py-2 py-md-4 rounded-pill mt-5 mt-md-10">
        <span class="spinner-border spinner-border-sm text-light contact_spinner me-2" role="status"></span> Send
        Message
      </button>
    </form>
  </div>
</section>
<!-- Get In Touch section end -->

<?php
include_once 'components/footer.php';
?>