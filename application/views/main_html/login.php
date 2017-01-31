<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KUISIONER DOSEN</title>

    <!-- Bootstrap -->
    <link href="<?=base_url()?>/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>/assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url()?>/assets/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>/assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?=base_url('mahasiswa/login/do_login')?>" id="formLogin">
              <h1>Kuisioner Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Nim" required="" name="nim" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" id="login">Log in</button>
              </div>

              <div class="clearfix"></div>
            </form>
			<br>
			<br>
			<br>
			<br>
			<p>*Nim : nim_mhs_masing2</p>
			<p>*Password : 12345</p>
          </section>		  
        </div>
      </div>	  
    </div>
  </body>
</html>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<!-- PNotify -->
<script src="<?=base_url()?>assets/pnotify/dist/pnotify.js"></script>
<script src="<?=base_url()?>assets/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?=base_url()?>assets/pnotify/dist/pnotify.nonblock.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#login').on('click', function (e) {
    e.preventDefault();

    $.ajax({
      type: $('form').attr("method"),
      url: $('form').attr("action"),
      data: $('form').serialize(),
      success: function (i) {
        if(i == 'true'){
            new PNotify({
                      title: 'Success',
                      text: 'Login Berhasil, Tunggu Sebentar',
                      type: 'success',
                      hide: true,
                      styling: 'bootstrap3'
                  });
            window.location.replace("<?=base_url('mahasiswa/index')?>");
        }else{
            new PNotify({
                      title: 'Gagal',
                      text: 'Login Gagal, Username Password Tidak Sesuai',
                      type: 'warning',
                      hide: true,
                      styling: 'bootstrap3'
                  });
        }
      }    
    });

  });
});
  </script>