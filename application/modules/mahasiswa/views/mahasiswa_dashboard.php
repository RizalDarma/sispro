
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Welcome <?php echo $this->session->userdata['nama']; ?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2>Welcome</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- thumbnail menu welcome -->
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?= base_url(); ?>images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Welcome</p>
                              <div class="tools tools-bottom">
                                <?=anchor('mahasiswa','<i class="fa fa-home"></i>');?></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p align='center'>Welcome</p>
                          </div>
                        </div>
                      </div>
                      <!-- thumbnail menu Data Dosen -->
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?= base_url(); ?>images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Data Dosen</p>
                              <div class="tools tools-bottom">
                                <?=anchor('Mahasiswa/data_mahasiswa/','<i class="fa fa-male"></i>');?></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p align='center'>Data Mahasiswa</p>
                          </div>
                        </div>
                      </div>
                      <!-- thumbnail menu Data Dosen -->
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?= base_url(); ?>images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>List Data Mahasiswa</p>
                              <div class="tools tools-bottom">
                                <?=anchor('Mahasiswa/Hasil_pengumuman/','<i class="fa fa-list"></i>');?></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p align='center'>Pengumuman</p>
                          </div>
                        </div>
                      </div>
                      <!-- thumbnail menu Account -->
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?= base_url(); ?>images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Account</p>
                              <?php $level = $this->session->userdata['level']; ?>
                              <div class="tools tools-bottom">
                                <?=anchor($level.'/profile/','<i class="fa fa-user"></i>');?></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p align='center'>Account</p>
                          </div>
                        </div>
                      </div>
                      <!-- thumbnail Log Out -->
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?= base_url(); ?>images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Log Out</p>
                              <div class="tools tools-bottom">
                                <?php echo anchor('login/logout','<i class="fa fa-sign-out pull-right"></i>');?>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p align='center'>Log Out</p>
                          </div>
                        </div>
                      </div>
                      <!-- End Thumbnail -->
                  </div>
                </div>
              </div>
            </div>
          </div>
