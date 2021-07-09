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
            				<tr>
            					<td>No.</td>
            					<td>Nama</td>
            					<td>No. HP</td>
            					<td>Email</td>
            					<td>Status</td>
            					<td>Aksi</td>
            				</tr>
            			</thead>
            			<tbody>
            				<?php $no=1; ?>
            				<?php foreach ($data as $key): ?>
            					<tr>
            						<td><?= $no ?></td>
            						<td><?= $key->nama?></td>
            						<td><?= $key->no_telpon ?></td>
            						<td><?= $key->email ?></td>
            						<td style="text-align: center;">
                                        <?php if ($key->status_verifikasi == "Terverifikasi"): ?>
                                            <i style="color: #2fdab8;font-size: 10pt" class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            <span style="font-size: 10pt; font-style: italic;color: #2fdab8">
                                                <?= $key->status_verifikasi ?>     
                                            </span>
                                            
                                            <?php elseif($key->status_verifikasi == "Proses Verifikasi"): ?>
                                                <i style="color: #f9a825" class="fa fa-clock-o" aria-hidden="true"></i>
                                                <span style="font-size: 9pt; font-style: italic;color: #ff6f00">
                                                    <?= $key->status_verifikasi ?>
                                                </span>

                                            <?php elseif($key->status_verifikasi == "Belum Terverifikasi"): ?>
                                                <i style="color: red" class="fa fa-exclamation" aria-hidden="true"></i>
                                                <span style="font-size: 9pt; font-style: italic;color: red">
                                                    <?= $key->status_verifikasi ?> 
                                                </span> <br>
                                    
                                                <?php elseif($key->status_verifikasi == "Ditolak"): ?>
                                                <i style="color: red" class="fa fa-exclamation" aria-hidden="true"></i>
                                                <span style="font-size: 9pt; font-style: italic;color: red">
                                                    <?= $key->status_verifikasi ?>  
                                                </span> <br>    

                                        <?php endif ?>       
                                    </td>
            						<td style="text-align: center;">
            							<a href="<?= base_url('admin/penyewa/detail/'.$key->id) ?>">
            								<button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Detail</button>
            							</a>
                                        <a href="<?= base_url('admin/penyewa/update/'.$key->id) ?>">
                                            <button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Update</button>
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