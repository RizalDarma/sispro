
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title?></h3>
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
                      <div><?=form_open('admin/tambah_users');?>
                      <?php //echo form_input(array('type'=>'submit','class'=>'btn btn-success btn-sm','value'=>'Tambah Users','name'=>'submit'));?>
                      </div>
                      <?php //echo $message;?>
                      
                      <!-- Tabel -->
                      <div class="table-responsive">
                        <Table class="table table-striped table-bordered">
                            <thead align="center">
                                <tr>
                                <td>No.</td>
                                <td>NIDN</td>
                                <td>Nama</td>
                                <td>Jumlah Mahasiswa</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach($hasil3 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "1";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil4 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "2";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil5 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "3";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil6 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "4";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil7 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "5";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil8 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "6";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil9 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "7";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil10 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "8";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil11 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "9";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil12 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "10";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil13 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "11";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil14 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "12";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil15 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "13";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php $no=0; foreach($hasil16 as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo "14";?></td>
                                <td align="center"><?php echo $row->username;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td align="center"><?php echo $row->jumlah;?></td>
                                </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td colspan="4"><a href="Admin/Pendaftaran" class="btn btn-success btn-sm" title="Kembali"><span><i class="fa  fa-mail-reply"> Kembali</i></span></button></a></td>
                                </tr>
                             </tbody>
                        </Table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

