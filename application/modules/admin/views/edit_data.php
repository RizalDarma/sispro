
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
                  <div class="x_content" ">
                      <?php echo $message;?>
                      <?=form_open('Admin/ubah_pembimbing');?>
                      <table border=0>
                        <tr>
                            <td>
                            
                            <label class="col-sm-3 control-label">NPM</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$npm,'name'=>'npm','readonly'=>'readonly'));?>
                            </div>
                  
                            <label class="col-sm-3 control-label">Nama Users</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$nama,'name'=>'nama','readonly'=>'readonly'));?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Pilih Dosen</label>
                            <div class="col-sm-9">
                            <?php $dd_attribute = 'class="form-control select2"'; ?>
                            <?=form_dropdown('dosen', $dd , $dosen , $dd_attribute); ?>
                            </div>
                            
                            <div>
                            <?=  form_input(array('type'=>'submit','class'=>'btn btn-default submit','value'=>'Simpan','name'=>'submit'));?>
                            </div>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
