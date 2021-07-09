<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo base_url('assets/admin/'.$this->session->userdata('theme'));?>/">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css
">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css">
	<script src="js/jquery-1.10.2.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo isset($title)?$title:'Admin'?></title>

    <?php $this->load->view('admin/'.$this->session->userdata('theme').'/v_header_script');?>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Logo And Top Menu Items -->
        <?php $this->load->view('admin/'.$this->session->userdata('theme').'/v_header');?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php $this->load->view('admin/'.$this->session->userdata('theme').'/v_sidebar');?>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo isset($judul_1)?$judul_1:'';?> <small><?php echo isset($judul_2)?$judul_2:'';?></small>
                    </h1>
                    <?php $this->load->view('admin/'.$this->session->userdata('theme').'/v_breadcumbs');?>

                </div>

            </div>
            <div class="row">
            	<div class="col-md-12">
            		<a href="<?= base_url('admin/kendaraan/tambah') ?>">
            			<button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Mobil</button>
            		</a>
            		<br><br>
            		<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            			<thead>
            				<tr>
            					<td>No.</td>
            					<td>Merk/Type</td>
            					<td>Plat Nomor</td>
            					<td>Bahan Bakar</td>
            					<td>Include Driver</td>
            					<td>Lepas Kunci</td>
            					<td>Aksi</td>
            				</tr>
            			</thead>
            			<tbody>
            				<?php $no=1; ?>
            				<?php foreach ($data as $key): ?>
            					<tr>
            						<td><?= $no ?></td>
            						<td><?= $key->nama_merk." ".$key->type?></td>
            						<td><?= $key->plat_nomor ?></td>
            						<td><?= $key->bahan_bakar ?></td>
            						<td style="text-align: center;font-weight: bold;">Rp<?= number_format($key->harga_include_driver) ?></td>
            						<td style="text-align: center;font-weight: bold;">Rp<?= number_format($key->harga_exclude_driver) ?></td>
            						<td style="text-align: center;">
                                        <a href="<?= base_url('admin/kendaraan/detail/'.$key->id_kendaraan) ?>">
                                            <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Detail</button>
                                        </a>
            							<a href="<?= base_url('admin/kendaraan/ubah/'.$key->id_kendaraan) ?>">
            								<button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Ubah</button>
            							</a>
            						</td>
            					</tr>
            				<?php $no++; endforeach ?>
            			</tbody>
            		</table>
            	</div>
            </div>        
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php $this->load->view('admin/'.$this->session->userdata('theme').'/v_footer');?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js
"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable({
	        bFilter: true, 
	        bInfo: true,
	        // "order": ([ 6, "asc" ],[0,"asc"])
	    });
	} );  
</script>
</body>
</html>