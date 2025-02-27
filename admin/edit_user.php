<?php  
session_start();
 include_once "library/database.php";
 if(isset($_GET['id_user'])){

$tampil = $koneksi->prepare("SELECT id_user,nama_user,nohp_user,alamat_user,bank_user,rekening_user,username_user,password_user FROM tbl_user WHERE id_user='".$_GET['id_user']."' ");
$tampil->execute();
$tampil->store_result();
$tampil->bind_result($id_user,$nama_user,$nohp_user,$alamat_user,$bank_user,$rekening_user,$username_user,$password_user);
    while($tampil->fetch())
                {
    
        ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>BCORE Admin Dashboard Template | Dashboard </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/css/theme.css" />
    <link rel="stylesheet" href="../assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="../assets/css/layout2.css" rel="stylesheet" />
       <link href="../assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
       <link href="../assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="../assets/plugins/timeline/timeline.css" />
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
                    <a href="index.php" class="navbar-brand">
                        <b class="text-primary">Masjid Baiturrahaman</b>
                    </a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                   <li class="divider"></li>
                            <li><a href="logout.php"><i class="icon-signout"></i> Logout </a>
                    
                   </li>
                </ul>

            </nav>
        </div>
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="../assets/img/masjid.png" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $_SESSION["nama_admin"]; ?></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
                <?php include_once "menu.php"; ?>
            </ul>

        </div>
        <!--END MENU SECTION -->
        <!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Form User </h1>
                    </div>
                </div>
                  <hr />
                 <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-money"></i></div>
                                    <h5>Ubah Data User</h5>
                                    <div class="toolbar">
                                        <ul class="nav">
                                            <li>
                                                <div class="btn-group">
                                                    <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse"
                                                        href="#collapse2">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </header>
                                <div id="collapse2" class="body collapse in">
                                    <form class="form-horizontal" action="library/update_user.php" method="POST" id="popup-validation">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">ID User</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="id_user" class="form-control chzn-select" tabindex="2" readonly="" value="<?php echo $id_user;?>"/>
                                                    
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Nama Lengkap</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="nama" class="form-control chzn-select" tabindex="2" value="<?php echo $nama_user;?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">No Hp</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="no_hp" class="form-control chzn-select" tabindex="2" value="<?php echo $nohp_user;?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4" >Alamat</label>
                                            <div class="col-lg-4">                                              
                                                    <textarea name="alamat" class="form-control" width="500"> <?php echo $alamat_user;?> </textarea>
                                                                                                  
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Bank</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="bank" class="form-control chzn-select" tabindex="2" value="<?php echo $bank_user;?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">No Rekening</label>
                                            <div class="col-lg-4">
                                                <input type="text" name="no_rekening" class="form-control chzn-select" tabindex="2" value="<?php echo $rekening_user;?>"/>
                                            </div>
                                        </div>
                                        

                                        <div style="text-align:center" class="form-actions no-margin-bottom"> 
                                            <button type="submit" class="btn btn-grad btn-success btn-lg ">
                                             <i class="icon-save"></i> Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                
            </div>

        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
      
         <!-- END RIGHT STRIP  SECTION -->
    </div>
<?php
   }
   } 
   ?>
    <!--END MAIN WRAPPER -->

<!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="../assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="../assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#tblbayar').DataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
