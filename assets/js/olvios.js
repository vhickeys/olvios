$(document).ready(function () {
  $("#alert").hide();
  $(".post_spinner").hide();

  $("#submitComment").submit(function (e) {
    e.preventDefault();

    var post_id = $("#post_id").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var message = $("#message").val();
    var submitBtn = $("#submit_post_btn");

    if (first_name == "") {
      var alertDisplay = AlertError("Please enter your first name!");
      $("#alert").html(alertDisplay);
      $("#alert").show();
      $("#alert").fadeOut(5000);
    } else if (last_name == "") {
      var alertDisplay = AlertError("Please enter your last name!");
      $("#alert").html(alertDisplay);
      $("#alert").show();
      $("#alert").fadeOut(5000);
    } else if (email == "") {
      var alertDisplay = AlertError("Please enter your email!");
      $("#alert").html(alertDisplay);
      $("#alert").show();
      $("#alert").fadeOut(5000);
    } else if (!validateEmail(email)) {
      var alertDisplay = AlertError("invalid Email!");
      $("#alert").html(alertDisplay);
      $("#alert").show();
      $("#alert").fadeOut(5000);
    } else if (message == "") {
      var alertDisplay = AlertError("You must leave a message!");
      $("#alert").html(alertDisplay);
      $("#alert").show();
      $("#alert").fadeOut(5000);
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
          } else if (response == "failed") {
            SomethingWentWrong();
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

  function AlertError(alertMessage) {
    var alert = `<div class="alert alert-danger solid alert-dismissible fade show">
          <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
          <strong>Error!</strong> ${alertMessage}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
          </button>
      </div>`;

    return alert;
  }

  function AlertSuccess(alertMessage) {
    var alert = `<div class="alert alert-success solid alert-dismissible fade show">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
    <strong>Success!</strong> ${alertMessage}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    </button>
  </div>`;

    return alert;
  }

  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  function SomethingWentWrong() {
    submitBtn.prop("disabled", false);
    $("#submitComment")[0].reset();
    var alertDisplay = AlertError("Something went wrong!");
    $("#alert").html(alertDisplay);
    $("#alert").show();
    $("#alert").fadeOut(5000);
    $(".post_spinner").hide();
  }
  function CommentAdded() {
    submitBtn.prop("disabled", false);
    $("#submitComment")[0].reset();
    var alertDisplay = AlertSuccess("Comment added!");
    $("#alert").html(alertDisplay);
    $("#alert").show();
    $("#alert").fadeOut(5000);
    $(".post_spinner").hide();
  }
});
