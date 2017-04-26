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

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-university"></i> <span>T.Informatika</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url(); ?>images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata['nama']; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                
                <?php if($this->session->userdata['level']=='mahasiswa'){ ?>
                
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><?=anchor('Mahasiswa','Welcome');?></li>
                      <li><?=anchor('Mahasiswa/data_mahasiswa/','Data Mahasiswa');?></li>
                      <li><?=anchor('Mahasiswa/pengumuman/','Pengumuman');?></li>
                      <li><?=anchor('Mahasiswa/about/','About');?></li>
                    </ul>
                  </li>
                </ul>
                
                <?php }elseif($this->session->userdata['level']=='dosen') { ?>
                
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><?=anchor('dosen','Welcome');?></li>
                        <li><?=anchor('dosen/data_dosen/','Data Dosen');?></li>  
                        <li><?=anchor('dosen/check_mahasiswa/','List Data Mahasiswa');?></li>
                        <li><?=anchor('dosen/about/','About');?></li>
                    </ul>
                  </li>
                </ul>
                
                <?php }
                elseif($this->session->userdata['level']=='admin') { ?>
                
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><?=anchor('admin','welcome');?></li>  
                        <li><?=anchor('admin/pendaftaran/','Pendaftaran');?></li> 
                        <li><?=anchor('admin/list_dosen/','Daftar Data Dosen');?></li>
                        <li><?=anchor('admin/Dataset/','Dataset');?></li>
                        <li><?=anchor('admin/Users/','Users');?></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-exclamation-circle"></i> About <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu"><li><?=anchor('admin/about/','About');?></li></ul></li>
                </ul>
                
                <?php }?>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class=" fa fa-user"></span>
                    <?php echo $this->session->userdata['nama']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                   <?php $level = $this->session->userdata['level']; ?>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li><?php echo anchor($level.'/profile','<i class="fa fa-user pull-right"></i> Account');?></li>
                    <li><?php echo anchor('login/logout','<i class="fa fa-sign-out pull-right"></i> Log Out');?></li>
                  </ul>
                </li>
              </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if(isset($contents)){echo $contents;}?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©2017 All Rights Reserved Teknik Informatika
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>vendors/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>vendors/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url(); ?>vendors/gantalella/js/custom.min.js"></script>
  </body>
</html>
