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
            		
            		<br><br>
            		<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            			<thead>
            				<tr style="text-align: center;">
            					<td>No.</td>
            					<td>Kode Booking</td>
            					<td>Penyewa</td>
            					<td>Waktu Sewa</td>
            					<td>Total Biaya</td>
                                <td>Konfirmasi Bayar</td>
            					<td>Status</td>
            					<td>Aksi</td>
            				</tr>
            			</thead>
            			<tbody>
            				<?php $no=1; ?>
            				<?php foreach ($data as $key): ?>
            					<tr>
            						<td><?= $no ?></td>
            						<td style="font-size: 9pt"><?= $key->kode_booking?></td>
            						<td style="font-size: 9pt"><?= $key->nama_user ?></td>
            						<td style="text-align: center; font-size: 10pt"><?= date('d M Y', strtotime($key->tgl_mulai))." - ".date('d M Y', strtotime($key->tgl_akhir)) ?></td>
            						<td style="text-align: center; font-weight: bold">Rp<?= number_format($key->total_bayar) ?></td>
                                    <td style="text-align: center; font-size: 8pt">
                                        <?php if ($key->tgl_konfirmasi > 0): ?>
                                            <?= date('d M Y H:i:s',strtotime($key->tgl_konfirmasi)) ?>

                                            <?php else: ?>
                                                <i style="font-size: 8pt">Belum Konfirmasi</i>
                                        <?php endif ?>
                                    </td>
                                    <td style="text-align: center; font-size: 10pt">
                                        <?php if ($key->status_pembayaran == "Pembayaran Berhasil"): ?>
                                            <span style="background-color: green" class="badge badge-success">
                                                <?= $key->status_pembayaran ?>
                                            </span>

                                            <?php else: ?>
                                                <?= $key->status_pembayaran ?>
                                            
                                        <?php endif ?>
                                    </td>
            						<td>
            							<a href="<?= base_url('admin/transaksi/update/'.$key->id_transaksi) ?>">
            								<button style="font-size: 9pt" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
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