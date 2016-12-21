<?php 
$id_ukm = $_SESSION['id_ukm'];
include('../koneksi/db.php');
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
                <?php
                    $a = "SELECT nama FROM ukm WHERE id_ukm='$id_ukm' ";
                    $b = $db->prepare($a); 
                    $b->execute();
                    $c = $b->fetchColumn(); 
                    echo "Selamat datang ";
                    echo $_SESSION['username'];
                    echo " ";
                    echo($c);
                    ?>
        </h1>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder bg-color-green">
            <div class="panel-body">
                <i class="fa fa-bar-chart-o fa-5x"></i>
                <h3>
                <?php
                    $a = "SELECT COUNT(*) FROM mahasiswa WHERE id_ukm_1='$id_ukm' OR id_ukm_2='$id_ukm' ";
                    $b = $db->prepare($a); 
                    $b->execute();
                    $c = $b->fetchColumn(); 
                    echo($c);
                    ?>
                </h3>
            </div>
            <div class="panel-footer back-footer-green">
                Jumlah Pendaftar
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder bg-color-blue">
            <div class="panel-body">
                <i class="fa fa-users fa-5x"></i>
                <h3>
                <?php
                    $a = "SELECT COUNT(*) FROM mahasiswa WHERE (flag_1='2' AND id_ukm_1='$id_ukm' ) OR (flag_2='2' AND id_ukm_2='$id_ukm') ";
                    $b = $db->prepare($a); 
                    $b->execute();
                    $c = $b->fetchColumn(); 
                    echo($c);
                    ?>
                </h3>
            </div>
            <div class="panel-footer back-footer-blue">
                Jumlah Diterima

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder bg-color-red">
            <div class="panel-body">
                <i class="fa fa fa-users fa-5x"></i>
                <h3>
                <?php
                    $a = "SELECT COUNT(*) FROM mahasiswa WHERE (flag_1='3' AND id_ukm_1='$id_ukm' ) OR (flag_2='3' AND id_ukm_2='$id_ukm') ";
                    $b = $db->prepare($a); 
                    $b->execute();
                    $c = $b->fetchColumn(); 
                    echo($c);
                    ?>
                </h3>
            </div>
            <div class="panel-footer back-footer-red">
                Jumlah Ditolak

            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center no-boder bg-color-brown">
            <div class="panel-body">
                <i class="fa fa-bar-chart-o fa-5x"></i>
                <h3>
                <?php
                    $a = "SELECT maks FROM regist_maks WHERE id_ukm='$id_ukm' ";
                    $b = $db->prepare($a); 
                    $b->execute();
                    $c = $b->fetchColumn(); 
                    if ($c==0) {
                        echo"Belum ditentukan";
                    }else{
                        echo($c);
                    }
                    
                    ?>
                </h3>
            </div>
            <div class="panel-footer back-footer-brown">
                Batas Pendaftar
            </div>
        </div>
    </div>
</div>




<!--div class="row">
    
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                Contact
            </div> 
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Subject</th>
                                <th>Email</th>
                                <th>Isi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Garin Septian</td>
                                <td>Prosedur pendaftaran</td>
                                <td>g@gsgarin.com</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                                <td class="panel-body">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalid"><i class="fa fa-mail-reply"></i></button>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            
                            <div class="modal fade" id="modalid" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Subject: ?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="iniisi">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        Jawaban anda:
                                        <textarea class="form-control"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                                </div>
                              </div>
                            </div>
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>-->