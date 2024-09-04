<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <h2>Register</h2>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong> Form Registrasi </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="doregis.php">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="telp" class="form-control" placeholder="No. Telp" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <select class="form-control" name="kota">
                            <option disabled selected="selected">Kota</option>
                            <?php include 'koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT * from kota ORDER BY ID_KOTA ASC");
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=".$row['0'].">".$row['0']." - ".$row['1']." </option>";
                            }
                            ?>
                            </select> </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="user" class="form-control" placeholder="UserName" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="pass" class="form-control" placeholder="Enter Password" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <select class="form-control" name="role">
                            <option disabled selected="selected">Jabatan</option>
                            <?php include 'koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT * from role ORDER BY id_role ASC");
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=".$row['1'].">".$row['0']." - ".$row['1']." </option>";
                            }
                            ?>
                            </select>
                                        </div>
                                     <button class="btn btn-success" name="regis" style="background-color:rgb(237,173,204);" type="submit">Register</button>
                                    <hr />
                                    </form>
                                    <?php

                                                
                                    ?>
                            </div>
                           
                        </div>
                    </div>
                
           
        </div>
    </div>
    

     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
