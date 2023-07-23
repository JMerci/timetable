
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Automatic Time table generator</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
    <div class="center">
       <img src="build/images/ku.png" class="img"/>
      <h1 class="text-center">Kampala University</h1>
    </div>
     
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username"
                 placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name ="password" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-success btn-sm" type="submit" style="width: 40%">Login <i class="fa fa-unlock"></i></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>

      
      </div>
    </div>
    
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <script>
    $("#login").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: "admin/includes/ajax.php?role=login",
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: "POST",
      type: "POST",
      error: (err) => {
        console.log(err);
      },
      success: function (response) {
        // console.log(response); return;
        response = JSON.parse(response);
        if (response.response === "success") {
         window.location.href="admin"
        } else {
          alert("Failed to login");
        }
      },
    });
  });
    
    </script>
  </body>
</html>
