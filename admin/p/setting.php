<?php 
$id_ukm = $_SESSION['id_ukm'];
include('../koneksi/db.php');

$a = "SELECT maks FROM regist_maks WHERE id_ukm='$id_ukm' ";
$b = $db->prepare($a); 
$b->execute();
$c = $b->fetchColumn(); 
if ($c==0) {
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
		    <div class="panel-heading">
		         Jumlah maksimal pendaftar sementara adalah: 
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
		    </div>
		    <div class="panel-body">
		        <div class="table-responsive">
		            <form role="form" method="post" action="input_maks1.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contoh: 35" name="jumlah" type="text">
                                <input type="hidden" name="id_ukm" value="<?=$id_ukm?>">

                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-sm btn-success" value="Submit">
                        </fieldset>
                    </form>
		        </div>
		        
		    </div>
		</div>	
	</div>
</div>
<?php
}


else{
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
		    <div class="panel-heading">
		         Jumlah maksimal pendaftar sementara adalah: 
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
		    </div>
		    <div class="panel-body">
		        <div class="table-responsive">
		            <form role="form" method="post" action="input_maks2.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contoh: 35" name="jumlah" type="text" value="<?=$c?>">
                                <input type="hidden" name="id_ukm" value="<?=$id_ukm?>">

                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-sm btn-success" value="Submit">
                        </fieldset>
                    </form>
		        </div>
		        
		    </div>
		</div>	
	</div>
</div>
<?php
}

?>
