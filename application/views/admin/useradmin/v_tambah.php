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

<style type='text/css'>
    body
    {
        font-family: Arial;
        font-size: 14px;
    }
    a {
        text-decoration: none;
        font-size: 14px;
    }
    a:hover
    {
        text-decoration: underline;
    }
    input, option, select{
        min-height: 30px;
    }
</style>

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
        <div class="container-fluid" >
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <h1 class="page-header">
                        <?php echo isset($judul_1)?$judul_1:'';?> <small><?php echo isset($judul_2)?$judul_2:'';?></small>
                    </h1>
                    <?php $this->load->view('admin/'.$this->session->userdata('theme').'/v_breadcumbs');?>

                </div>

            </div>
            <div class="row">
            	<div class="col-md-offset-3 col-md-6 col-xs-12"> 
                        <div class='form-content form-div'>
                            <form action="" method="post" id="crudForm" enctype="multipart/form-data" accept-charset="utf-8" style="margin-bottom: 10%; border: #e0e0e0 2px solid; padding: 20px">
                                    <div>
                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                Nama
                                            </div>
                                            <div class='form-input-box'>
                                                <input class='form-control' name='nama' type='text' />                
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>

                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                Email
                                            </div>
                                            <div class='form-input-box'>
                                                <input class='form-control' name='email' type='text'/>                
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>

                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                Password
                                            </div>
                                            <div class='form-input-box'>
                                                <input class='form-control' name='password' type='text'/>                
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>
                                    </div>
                                    <div class='buttons-box'>
                                        <div class='form-button-box'>
                                            <button style="width: 100%" type="submit" class="btn btn-success">
                                                Simpan
                                            </button>
                                            
                                        </div>
                                        <div class='clear'></div>
                                    </div>
                                </form>
                            </div>
                    </div>        
                <div class="clearfix"></div>
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