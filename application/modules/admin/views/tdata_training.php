
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
                      <?=form_open('admin/Tdata_simpan');?>
                      <table>
                          <tr>
                              <td>
                                  <label class="col-sm-3 control-label">Pilih kategori 1</label>
                                  <div class="col-sm-9">
                                  <?php $dd_attribute = 'class="form-control select2"'; ?>
                                  <?=form_dropdown('kategori1', $dd1 , $nama_kriteria1 , $dd_attribute); ?>
                                  </div>
                             </td>
                          </tr>
                          <tr>
                              <td>
                                  <label class="col-sm-3 control-label">Pilih kategori 2</label>
                                  <div class="col-sm-9">
                                  <?php $dd_attribute = 'class="form-control select2"'; ?>
                                  <?=form_dropdown('kategori2', $dd2 , $nama_kriteria2 , $dd_attribute); ?>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label class="col-sm-3 control-label">Pilih kategori 3</label>
                                  <div class="col-sm-9">
                                  <?php $dd_attribute = 'class="form-control select2"'; ?>
                                  <?=form_dropdown('kategori3', $dd1 , $nama_kriteria3 , $dd_attribute); ?>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label class="col-sm-3 control-label">Pilih kategori 4</label>
                                  <div class="col-sm-9">
                                  <?php $dd_attribute = 'class="form-control select2"'; ?>
                                  <?=form_dropdown('kategori4', $dd2 , $nama_kriteria4 , $dd_attribute); ?>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label class="col-sm-3 control-label">Pilih Dosen</label>
                                  <div class="col-sm-9">
                                  <?php $dd_attribute = 'class="form-control select2"'; ?>
                                  <?=form_dropdown('dosen', $dos , $pilih_dosen , $dd_attribute); ?>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                                <td align="left"><?=  form_input(array('type'=>'submit','class'=>'btn btn-success submit','value'=>'Tambah Training','name'=>'submit'));?></td>
                          </tr>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
