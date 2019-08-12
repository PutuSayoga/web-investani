<?php

    include_once 'Koneksi.php';

    $id = $_POST['getDetail'];
    $sql = mysqli_query($koneksi, "SELECT * from kegiatan where id='$id'");
    $row = mysqli_fetch_array($sql);
    $_SESSION['proyek']= $row['proyek'];    

?>
<!-- Modal -->
<form class="form-donation">
    <div class="row">
        <div class="col-lg-12">
            <!--Timeline -->
            <div class="panel-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>&nbsp; History Keuangan 
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Jumlah Dana</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php
                                                    $sql = "select * from proyek";

                                                    $query = mysqli_query($koneksi, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                    {
                                                        $nama1 = $row['namaProyek'];
                                                        $nama2 = $_SESSION['proyek'];
                                                            if ($nama1==$nama2) {
                                                                echo '<tr>
                                                                <td>'.$row['tanggalAmbil'].'</td>
                                                                <td>'.number_format($row['jumlahAmbil'],0,',','.').'</td>
                                                                <td>'.$row['deskripsiAmbil'].'</td>
                                                            </tr>';
                                                            }
                                                                                                                    
                                                    }?>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>