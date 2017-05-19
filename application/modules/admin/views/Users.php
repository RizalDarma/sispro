
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$title?></h3>
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
                    <h2></h2>
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
                      
                      <!-- Tabel -->
                      <div class="table-responsive">
                        <Table class="table table-striped table-bordered">
                            <thead align="center">
                                <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Username</td>
                                <td>Password</td>
                                <td>Status</td>
                                <td colspan="2" align="center">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach($anggota as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo $row->id_users;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td><?php echo $row->username;?></td>
                                <td><?php echo $row->password;?></td>
                                <td><?php echo $row->level;?></td>
                                <td align="center"><?=anchor('admin/dataku/'.$row->id_users,'<i class="glyphicon glyphicon-edit"></i>');?></td>
                                <td align="center"><?=anchor('admin/hapus_data/'.$row->id_users,'<i class="glyphicon glyphicon-trash"></i>');?></td>
                                </tr>
                                <?php endforeach;?>
                             </tbody>
                        </Table>
                      </div>
                      <?php echo $pagination;?>
                  </div>
                </div>
              </div>
            </div>
          </div>

