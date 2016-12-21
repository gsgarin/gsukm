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
                    echo($c);
                    ?>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
<!-- Advanced Tables -->
<div class="panel panel-default">
    <div class="panel-heading">
         Mahasiswa Diterima di <?php echo($c);?>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIM</th>
                        <th>tgl_lahir</th>
                        <th>motivasi</th>
                        <th>Aksi</th>
                    </tr> 
                </thead>
                <tbody>
                <?php 
                if (isset($_GET['aksi']) and $_GET['aksi']=="terima") {
                    if (isset($_GET['id_ukm_1']) and $_GET['id_ukm_1']==$_GET['id_ukm']) {
                        $query = $db->prepare("UPDATE mahasiswa SET flag_1='2' where id_mhs='$_GET[id]' ");
                        $query->execute();
                        echo    "<script language='javascript'>
                                top.location='index.php?p=diterima';
                            </script>";
                    }else if (isset($_GET['id_ukm_2']) and $_GET['id_ukm_2']==$_GET['id_ukm']) {
                        $query = $db->prepare("UPDATE mahasiswa SET flag_2='2' where id_mhs='$_GET[id]' ");
                        $query->execute();
                        echo    "<script language='javascript'>
                                top.location='index.php?p=diterima';
                            </script>";
                    }    
                }else if (isset($_GET['aksi']) and $_GET['aksi']=="tolak") {
                    if (isset($_GET['id_ukm_1']) and $_GET['id_ukm_1']==$_GET['id_ukm']) {
                        $query = $db->prepare("UPDATE mahasiswa SET flag_1='3' where id_mhs='$_GET[id]' ");
                        $query->execute();
                        echo    "<script language='javascript'>
                                top.location='index.php?p=diterima';
                            </script>";
                    }else if (isset($_GET['id_ukm_2']) and $_GET['id_ukm_2']==$_GET['id_ukm']) {
                        $query = $db->prepare("UPDATE mahasiswa SET flag_2='3' where id_mhs='$_GET[id]' ");
                        $query->execute();
                        echo    "<script language='javascript'>
                                top.location='index.php?p=diterima';
                            </script>";
                    }    
                }
                

                $sql = "SELECT * FROM mahasiswa WHERE (flag_1='2' AND id_ukm_1='$id_ukm' ) OR (flag_2='2' AND id_ukm_2='$id_ukm') ";
                $nomor = 1;
                foreach ($db->query($sql) as $data):

                ?>
                    <tr class="gradeU">
                        <td><?= $nomor; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nim']; ?></td>
                        <td><?= $data['tgl_lahir']; ?></td>
                        <td><?= $data['motivasi']; ?></td>
                        <td>
                            <a href="index.php?p=diterima&aksi=terima&id=<?= $data['id_mhs']; ?>&id_ukm_1=<?= $data['id_ukm_1']; ?>&id_ukm_2=<?= $data['id_ukm_2']; ?>&id_ukm=<?= $id_ukm; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Terima"><i class="fa fa-check"></i></a> |
                            <a href="index.php?p=diterima&aksi=tolak&id=<?= $data['id_mhs']; ?>&id_ukm_1=<?= $data['id_ukm_1']; ?>&id_ukm_2=<?= $data['id_ukm_2']; ?>&id_ukm=<?= $id_ukm; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tolak"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php $nomor++;
                endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>
<!--End Advanced Tables -->
    </div>
</div>