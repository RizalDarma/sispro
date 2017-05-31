
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$title?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="periodedaftar" placeholder="Search for..."  id="periodedaftar">
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
                  
                      <!-- Tabel -->
                      <div class="table-responsive">
                        <Table class="table table-striped table-bordered">
                            <thead align="center">
                                <tr>
                                <td>No.</td>
                                <td>NPM</td>
                                <td>Nama</td>
                                <td>Kelas</td>
                                <td>No Hp</td>
                                <td>Dosen Pembimbing</td>
                                <td>Periode</td>
                                <td colspan="3" align="center">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach($anggota as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo $no;?></td>
                                <td><?php echo $row->npm;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td><?php echo $row->kelas;?></td>
                                <td><?php echo $row->no_hp;?></td>
                                <td><?php echo $row->nama_dosen;?></td>
                                <td><?php echo $row->periode;?></td>
                                <td><?=anchor('admin/edit_data/'.$row->npm,'<i class="glyphicon glyphicon-edit"></i>');?></td>
                                <td><?=anchor('admin/hapus_data/'.$row->npm,'<i class="glyphicon glyphicon-trash"></i>');?></td>
                                <td><?=anchor('admin/view_detail/'.$row->npm,'<i class="glyphicon glyphicon-eye-open"></i>');?></td>
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

        <script>
            $(document).ready(function () {
                $(".select2").select2({
                    placeholder: "Please Select"
                });
            });
        </script>