 <?php
 
 header("Content-type: application/vnd.ms-excel");
 
 header('Content-Disposition: attachment; filename="'.$title.'"');
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                      
                      <!-- Tabel -->
                      <div class="table-responsive">
                        <Table border="1" width="100%">
                            <thead align="center">
                                <tr>
                                <td>No.</td>
                                <td>NPM</td>
                                <td>Nama</td>
                                <td>Kelas</td>
                                <td>No Hp</td>
                                <td>Dosen Pembimbing</td>
                                <td>Judul</td>
                                <td>Periode</td>
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
                                <td><?php echo $row->judul;?></td>
                                <td><?php echo $row->periode;?></td>
                                </tr>
                                <?php endforeach;?>
                             </tbody>
                        </Table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>