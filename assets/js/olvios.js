$(document).ready(function () {
  $("#alert").hide();
  $(".post_spinner").hide();
  $(".contact_spinner").hide();

  var submitBtn = $("#submit_post_btn"); // Move submitBtn outside the event handler
  var submitContactBtn = $("#submit_contact_btn"); // Move submitBtn outside the event handler

  $("#submitComment").submit(function (e) {
    e.preventDefault();

    var post_id = $("#post_id").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var message = $("#message").val();

    if (first_name == "") {
      showAlert(AlertError("Please enter your first name!"));
    } else if (last_name == "") {
      showAlert(AlertError("Please enter your last name!"));
    } else if (email == "") {
      showAlert(AlertError("Please enter your email!"));
    } else if (!validateEmail(email)) {
      showAlert(AlertError("Invalid Email!"));
    } else if (message == "") {
      showAlert(AlertError("You must leave a message!"));
    } else {
      $(".post_spinner").show();
      submitBtn.prop("disabled", true);

      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=create-comment",
        data: {
          post_id: post_id,
          first_name: first_name,
          last_name: last_name,
          email: email,
          message: message,
        },
        success: function (response) {
          if (response == "success") {
            CommentAdded();
          } else {
            SomethingWentWrong();
          }
        },
        error: function () {
          SomethingWentWrong();
        },
      });
    }
  });

  $("#submitContact").submit(function (e) {
    e.preventDefault();

    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var location = $("#location").val();
    var message = $("#message").val();

    if (name == "") {
      showAlert(AlertError("Please enter your name!"));
    } else if (email == "") {
      showAlert(AlertError("Please enter your email!"));
    } else if (!validateEmail(email)) {
      showAlert(AlertError("Invalid Email!"));
    } else if (phone == "") {
      showAlert(AlertError("Please enter your phone number!"));
    } else if (message == "") {
      showAlert(AlertError("You must leave a message!"));
    } else {
      $(".contact_spinner").show();
      submitContactBtn.prop("disabled", true);

      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=create-contact",
        data: {
          name: name,
          email: email,
          phone: phone,
          location: location,
          message: message,
        },
        success: function (response) {
          if (response == "success") {
            MessageSubmitted();
          } else {
            ContactSubWentWrong();
          }
        },
        error: function () {
          ContactSubWentWrong();
        },
      });
    }
  });

  function showAlert(alertDisplay) {
    $("#alert").html(alertDisplay).show().fadeOut(5000);
  }

  function AlertError(alertMessage) {
    return `<div class="alert alert-danger solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
          <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
          <line x1="15" y1="9" x2="9" y2="15"></line>
          <line x1="9" y1="9" x2="15" y2="15"></line>
        </svg>
        <strong>Error!</strong> ${alertMessage}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>`;
  }

  function AlertSuccess(alertMessage) {
    return `<div class="alert alert-success solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
          <polyline points="9 11 12 14 22 4"></polyline>
          <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
        </svg>
        <strong>Success!</strong> ${alertMessage}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>`;
  }

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function SomethingWentWrong() {
    submitBtn.prop("disabled", false);
    $("#submitComment")[0].reset();
    showAlert(AlertError("Something went wrong!"));
    $(".post_spinner").hide();
  }

  function CommentAdded() {
    submitBtn.prop("disabled", false);
    $("#submitComment")[0].reset();
    showAlert(AlertSuccess("Comment added!"));
    $(".post_spinner").hide();
    $("#postComments").load(location.href + " #postComments");
  }

  function ContactSubWentWrong() {
    submitContactBtn.prop("disabled", false);
    $("#submitContact")[0].reset();
    showAlert(AlertError("Something went wrong!"));
    $(".contact_spinner").hide();
  }

  function MessageSubmitted() {
    submitContactBtn.prop("disabled", false);
    $("#submitContact")[0].reset();
    showAlert(AlertSuccess("Your message has been delivered! You will be contacted soon."));
    $(".contact_spinner").hide();
  }
});
