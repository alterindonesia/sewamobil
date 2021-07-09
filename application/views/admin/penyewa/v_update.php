<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo base_url('assets/admin/'.$this->session->userdata('theme'));?>/">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo isset($title)?$title:'Admin'?></title>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <?php $this->load->view('admin/'.$this->session->userdata('theme').'/v_header_script');?>
    <script>
         new WOW().init();
    </script>

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

<style type="text/css">

  .img-browse{
    border: 2px solid;
    padding:0;
  }
</style>
<script>


  $(document).ready(function(){
    $("form#uploadfile").submit(function(){
      var formURL = "<?php echo base_url('index/fileupload');?>";
      console.log(formURL);
      var postData = new FormData($("form#uploadfile")[0]);
      $.ajax({
        type:"POST",
        url:formURL,
        data:postData,
        processData: false,
        contentType: false,
        dataType:"json",
        success:function(data){
          $(".upload_err").slideUp();
          $(".upload_success").slideUp();
          if(data.status){
            $(".upload_err").slideUp();
            $(".upload_success_msg").html(data.msg);
            $(".upload_success").slideDown();
            loadImageTersedia();
            $("form#uploadfile").val('');
          } else {
            $(".upload_success").slideUp();
            $(".upload_err_msg").html(data.msg);
            $(".upload_err").slideDown();
          }
        },
        error:function(xhr,status,error){
          console.log(error);
        }
      });
      return false;
    });

    $("#imgfile").on('click',function(){
      $('#main-gambar').trigger('click');
    });

    $('#main-gambar').on('change', function(){
      var formURL = "<?php echo base_url('admin/kendaraan/do_upload');?>";
      console.log(formURL);
      var postData = new FormData($("form#main-form")[0]);
      $.ajax({
        type:"POST",
        url:formURL,
        data:postData,
        processData: false,
        contentType: false,
        dataType:"json",
        success:function(data){
          if(!data.status)
            alert(data.msg);
          else {
            $("#gmbr").val(data.filename);
            var src = "<?php echo base_url('assets/uploads/files/');?>/"+data.filename;
            $("#imgfile").attr("src", src);
          }
        },
        error:function(xhr,status,error){
          console.log(error);
        }
      });
    });

  });
</script>

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

                        <?php if ($row->status_verifikasi == "Terverifikasi"): ?>
                                            <i style="color: #2fdab8; font-size: 14pt" class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            <span style="font-size: 14pt; font-style: italic;color: #2fdab8">
                                                Akun <?= $row->status_verifikasi ?>     
                                            </span>
                                            
                                            <?php elseif($row->status_verifikasi == "Proses Verifikasi"): ?>
                                                <i style="color: #ff6f00;font-size: 14pt" class="fa fa-clock-o" aria-hidden="true"></i>
                                                <span style="font-size: 14pt; font-style: italic;color: #ff6f00">
                                                    Akun Dalam <?= $row->status_verifikasi ?>
                                                </span>

                                            <?php elseif($row->status_verifikasi == "Belum Terverifikasi"): ?>
                                                <i style="color: red; font-size: 14pt" class="fa fa-exclamation" aria-hidden="true"></i>
                                                <span style="font-size: 14pt; font-style: italic;color: red">
                                                    Akun <?= $row->status_verifikasi ?> 
                                                </span> <br>
                                    
                                                <?php elseif($row->status_verifikasi == "Ditolak"): ?>
                                                <i style="color: red; font-size: 14pt" class="fa fa-exclamation" aria-hidden="true"></i>
                                                <span style="font-size: 14pt; font-style: italic;color: red">
                                                    Akun <?= $row->status_verifikasi ?>  
                                                </span> <br>    

                                        <?php endif ?>
                                        <br><br>

                        <div class='form-content form-div'>
                            <form method="POST" action="" enctype="multipart/form-data" id="main-form" data-parsley-validate class="form-horizontal form-label-left" style="margin-bottom: 10%; border: #e0e0e0 2px solid; padding: 20px">
                            <!-- <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8" style="margin-bottom: 10%; border: #e0e0e0 2px solid; padding: 20px" id="main-form"> -->
                                    <div class="submit" id="onSubmit">

                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                Nama
                                            </div>
                                            <div class='form-input-box'>
                                                <input class='form-control' name='nama' value="<?= $row->nama ?>" type='text' readonly="readonly"/>                
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>

                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                No. HP
                                            </div>
                                            <div class='form-input-box'>
                                                <input class='form-control' name='no_telpon' value="<?= $row->no_telpon ?>" type='text' readonly="readonly"/>                
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>

                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                Email
                                            </div>
                                            <div class='form-input-box'>
                                                <input class='form-control' name='email' value="<?= $row->email ?>" type='text' readonly="readonly"/>                
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>
                                      
                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                Alamat
                                            </div>
                                            <div class='form-input-box'>
                                                <input class='form-control' name='alamat' value="<?= $row->alamat ?>" type='text' readonly="readonly" />                
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>   

                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                File KTP
                                            </div>
                                            <div class='form-input-box'>
                                                <img src="<?= base_url('assets/uploads/ktp/'.$row->ktp) ?>" style="max-width: 250px" class="img-responsive">         
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>

                                        <div class='form-field-box odd'>
                                            <div class='form-display-as-box'>
                                                Status
                                            </div>
                                            <div class='form-input-box'>
                                                <select style="width: 100%" id='field-status' name='status_verifikasi' class='chosen-select' data-placeholder='Select status'>  
                                                    <option value="<?= $row->status_verifikasi ?>" selected="selected"><?= $row->status_verifikasi ?></option>  
                                                        <option value="Terverifikasi">
                                                            Terverifikasi
                                                        </option>
                                                        <option value="Belum Terverifikasi">
                                                            Belum Terverifikasi
                                                        </option>
                                                        <option value="Proses Verifikasi">
                                                            Proses Verifikasi
                                                        </option>
                                                        <option value="Ditolak">
                                                            Tolak
                                                        </option>
                                                   
                                                </select>                
                                            </div>
                                            <br>
                                            <div class='clear'></div>
                                        </div>
                                              
                                        <div class='line-1px'></div>
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


    <!-- Modal upload gambar -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 100000">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Image Upload</h4>
      </div>
      <div class="modal-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Gambar</a></li>
          <!--li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">File</a></li-->
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Upload</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content" data-spy="scroll" data-target="#home">
          <div role="tabpanel" class="tab-pane active" id="home"  >home</div>
          <!-- <div role="tabpanel" class="tab-pane" id="messages">File</div> -->
          <div role="tabpanel" class="tab-pane" id="profile">
            <form id="uploadfile" enctype="multipart/form-data" method="post" action="">
              <div class="form-group">
                <label for="exampleInputEmail1">Gambar</label>
                <input type="file" class="" name="file" id="exampleInputEmail1">
              </div>
              <input type="submit" value="Upload" class="btn btn-default" id="">
            </form>
            <input type="hidden" id="tmpfile">
            <div class="alert alert-success upload_success" role="alert" style="display: none">
              <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
              <span class="upload_success_msg"></span>
            </div>
            <div class="alert alert-danger upload_err" role="alert" style="display: none">
              <span class="upload_err_msg"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>


</div>
<!-- /#wrapper -->
<?php $this->load->view('admin/'.$this->session->userdata('theme').'/v_footer');?>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<script src="<?= base_url('assets/admin/custom.js') ?>"></script>

<script type="text/javascript">

	$(document).ready(function() {

        $('#main-form').submit(function() {
        $('#gif').css('visibility', 'visible');
        $("#submit").slideUp();
        $("#onSubmit").slideUp();
        });

	    $('#example').DataTable({
	        bFilter: true, 
	        bInfo: true,
	        // "order": ([ 6, "asc" ],[0,"asc"])
	    });
	} );  
</script>
</body>
</html>