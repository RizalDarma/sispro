<?php $id = $this->session->userdata['id_users'];?>
<?php $nama = $this->session->userdata['nama'];?>
<?php $usern = $this->session->userdata['username'];?>
<?php $periode = $this->session->userdata['periode'];?>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?=$title;?></h3>
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
                    <h2>Data Pendaftaran</h2>
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
                       <!-- content -->
                       <?=form_open('Mahasiswa/data_mahasiswa');?>
                       
                      <table border=0>
                        <tr>
                            <td>
                            
                            <label class="col-sm-3 control-label">ID Users</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$id,'readonly'=>'readonly','name'=>'id_users'));?>
                            </div>
                  
                            <label class="col-sm-3 control-label">Nama Users</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$nama,'readonly'=>'readonly','name'=>'nama'));?>
                            </div>
                  
                            <label class="col-sm-3 control-label">NPM</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$usern,'readonly'=>'readonly','name'=>'npm'));?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Periode Pendaftaran</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$periode,'readonly'=>'readonly','name'=>'periode'));?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'email','class'=>'form-control','placeholder'=>'E-mail','value'=>'','name'=>'email','required'=>''));?>
                            </div>
                            
                            <label class="col-sm-3 control-label">No. Hp</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','placeholder'=>'Nomor Telp.','value'=>'','name'=>'nomor','required'=>''));?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Kelas</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','placeholder'=>'Kelas','value'=>'','name'=>'kelas','required'=>''));?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Kategori Judul</label>
                            <div class="col-sm-9">
                            <?php $dd_attribute = 'class="form-control select2"'; ?>
                            <?=form_dropdown('nama_kriteria1', $dd , $nama_kriteria , $dd_attribute); ?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Kategori Pemrograman</label>
                            <div class="col-sm-9">
                            <?=form_dropdown('nama_kriteria2', $dd1 , $nama_kriteria2 , $dd_attribute); ?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Metode</label>
                            <div class="col-sm-9">
                            <?=form_dropdown('nama_kriteria3', $dd2 , $nama_kriteria3 , $dd_attribute); ?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Pengajuan Pendaftaran</label>
                            <div class="col-sm-9">
                            <?=form_dropdown('nama_kriteria4', $dd3 , $nama_kriteria4 , $dd_attribute); ?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Judul</label>
                            <div class="col-sm-9">
                            <?=form_textarea('judul',set_value(''),'class="form-control"');?>
                            </div>
                            
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                            <?=  form_input(array('type'=>'submit','class'=>'btn btn-success submit','value'=>'Simpan','name'=>'submit'));?>
                            </div>
                            
                            </td>
                        </tr>
                    </table>
                  </div>      
                </div>
              </div>
            </div>
          </div>
