
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Detail</h3>
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
                      <?=form_open('Admin/pendaftaran');?>
                      <div>
                        <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$nama,'readonly'=>'readonly'));?>
                      </div>
                      <div>
                        <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$k_judul,'readonly'=>'readonly'));?>
                      </div>
                      <div>
                        <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$k_program,'readonly'=>'readonly'));?>
                      </div>
                      <div>
                        <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$metode,'readonly'=>'readonly'));?>
                      </div>
                      <div>
                        <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$pendaftar,'readonly'=>'readonly'));?>
                      </div>
                      <div>
                        <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$email,'readonly'=>'readonly'));?>
                      </div>
                      <div>
                        <?=form_input(array('type'=>'text','class'=>'form-control','value'=>$judul,'readonly'=>'readonly'));?>
                      </div>
                      <hr></hr>
                      <div>
                        <?=form_input(array('type'=>'submit','class'=>'btn btn-success btn-sm','value'=>'Kembali'));?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
