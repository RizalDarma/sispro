<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sispro | Teknik Informatika</title>

    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?= base_url(); ?>vendors/gantalella/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
      <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <img src="<?= base_url(); ?>images/inspiring.png" width="250" hight="120"></img>
            <?=form_open('login/login');?>
              <h1> Sign In </h1>
              <div>
                <?=form_input(array('type'=>'text','class'=>'form-control','placeholder'=>'Username','required'=>'','name'=>'username'));?>
              </div>
              <div>
                <?=form_input(array('type'=>'password','class'=>'form-control','placeholder'=>'Password','required'=>'','name'=>'password'));?>
              </div>
              <div>
                <?=  form_input(array('type'=>'submit','class'=>'btn btn-default submit','value'=>'Login','name'=>'submit'));?>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1><i class="fa fa-university"></i> Teknik Informatika</h1>
                  <p>©2017 All Rights Reserved Teknik Informatika</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
