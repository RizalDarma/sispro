
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
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
                      <h2><?=$title?></h2>
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
                  <?php echo $message;?>
                      <!-- content -->
                        <div class="table-responsive">
                        <Table class="table table-striped table-bordered">
                            <thead align="center">
                                <tr>
                                <td>NPM</td>
                                <td>Nama</td>
                                <td>Kelas</td>
                                <td>Dosen Pembimbing</td>
                                <td>Periode</td>
                                <td align="center">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td align="center"><?php echo $npm;?></td>
                                <td align="center"><?php echo $this->session->userdata['nama'];  ?></td>
                                <td align="center"><?php echo $kelas;?></td>
                                <td align="center"><?php if($status=="N"){$nama_dosen = "-"; } echo $nama_dosen;?></td>
                                <td align="center"><?php echo $periode;?></td>
                                <td align="center"><?=anchor('mahasiswa/view_data/','<i class="glyphicon glyphicon-eye-open"></i>');?></td>
                                </tr>
                                <tr><td colspan="6"><?php $judul="JUDUL : "; echo $judul; ?></td></tr>
                                <tr><td colspan="5"><?php echo $judulp; ?></td><td align="center"><?=anchor('mahasiswa/edit_judul/','<i class="glyphicon glyphicon-edit"></i>');?></td></tr>
                             </tbody>
                        </Table>
                            <table>
                                
                            </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
