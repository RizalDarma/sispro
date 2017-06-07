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
                       <?= $message ?>
                     <?=form_open('dosen/data_dosen');?>
                       
                      <table border=0>
                        <tr>
                            <td>
                            
                            <label class="col-sm-3 control-label">Nomor Telp</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','name'=>'no_telp', 'required'=>''));?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'email','class'=>'form-control','name'=>'email', 'required'=>''));?>
                            </div>
                  
                            <label class="col-sm-3 control-label">Alamat Lengkap</label>
                            <div class="col-sm-9">
                            <?=form_textarea('alamat',set_value(''),'class="form-control"','required=""');?>
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
