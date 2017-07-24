 <?php
 
 header("Content-type: application/vnd.ms-excel");
 
 header('Content-Disposition: attachment; filename="'.$title.'"');
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
                    <Table border="1" width="100%" class="table table-striped table-bordered">
                            <thead align="center">
                                <tr>
                                <td>No.</td>
                                <td>NPM</td>
                                <td>Nama</td>
                                <td>No. Telp</td>
                                <td>Judul</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach($anggota as $row ): $no++;?>
                                <tr>
                                <td align="center"><?php echo $no;?></td>
                                <td align="center"><?php echo $row->npm;?></td>
                                <td><?php echo $row->nama;?></td>
                                <td><?php echo $row->no_hp;?></td>
                                <td><?php echo $row->judul;?></td>
                                </tr>
                                <?php endforeach;?>
                             </tbody>
                        </Table>