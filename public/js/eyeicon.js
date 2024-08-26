  $(function () {
      $("#toggle_pwd").click(function () {
          $(this).toggleClass("fa-eye fa-eye-slash");
         var type = $(this).hasClass("fa-eye-slash") ? "password" : "text" ;
          $("#txtPassword").attr("type", type);
      });
  });

    $(function () {
      $("#toggle_rpwd").click(function () {
          $(this).toggleClass("fa-eye fa-eye-slash");
         var type = $(this).hasClass("fa-eye-slash") ? "password" : "text" ;
          $("#r-pass").attr("type", type);
      });
  });
       $(function () {
      $("#toggle_rcpwd").click(function () {
          $(this).toggleClass("fa-eye fa-eye-slash");
         var type = $(this).hasClass("fa-eye-slash") ? "password" : "text" ;
          $("#rc-pass").attr("type", type);
      });
  });