let forms = document.getElementsByClassName("needs-validation");
let validation = Array.prototype.filter.call(forms, function (form) {
  form.addEventListener(
    "submit",
    function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    },
    false
  );
});

$(".toast").toast("show");

$(document).on("click", "#sidebarCollapse", function () {
  $("#sidebar, #content").toggleClass("active");
  $(".collapse.in").toggleClass("in");
});

$(".dropdown").hover(
  function () {
    $(".dropdown-menu", this).stop().fadeIn(500);
  },
  function () {
    $(".dropdown-menu", this).stop().fadeOut(500);
  }
);
