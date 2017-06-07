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
                       <?=form_open('admin/add_users');?>
                      <table border=0>
                        <tr>
                            <td>
                            
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','placeholder'=>'Nama','value'=>'','name'=>'nama','required'=>''));?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'text','class'=>'form-control','placeholder'=>'Username','value'=>'','name'=>'username','required'=>''));?>
                            </div>
                           
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                            <?=form_input(array('type'=>'password','class'=>'form-control','placeholder'=>'Password','value'=>'','name'=>'password','required'=>''));?>
                            </div>
                                                      
                            <label class="col-sm-3 control-label">Pilih Periode</label>
                            <div class="col-sm-9">
                            <?php $dd_attribute = 'class="form-control select2"'; ?>
                            <?=form_dropdown('periode', $dd1 , $periode , $dd_attribute); ?>
                            </div>
                            
                            <label class="col-sm-3 control-label">Level  Users</label>
                            <div class="col-sm-9">
                            <?php $dd_attribute = 'class="form-control select2"'; ?>
                            <?=form_dropdown('level', $dd , $level , $dd_attribute); ?>
                            </div>
                            
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                            <?=  form_input(array('type'=>'submit','class'=>'btn btn-success submit','value'=>'Simpan','name'=>'submit1'));?>
                            <?=  form_input(array('type'=>'submit','class'=>'btn btn-success submit','value'=>'Kembali','name'=>'submit2'));?>
                            </div>
                            </td>
                        </tr>
                    </table>
       <script>
            $(document).ready(function () {
                $(".select2").select2({
                    placeholder: "Please Select"
                });
            });
        </script>
                  </div>      
                </div>
              </div>
            </div>
          </div>
