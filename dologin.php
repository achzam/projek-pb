<?php
	include("koneksi.php");
    session_start();

        @$email = $_POST["username"];
        @$password = MD5($_POST["password"]);

        $query = mysqli_query($koneksi,"select * from user where USERNAME = '$email' and PASSWORD ='$password'")or die(mysql_error());
        $nm = mysqli_fetch_array($query);
        if(mysqli_num_rows($query)==1){
            $_SESSION['id_user']=$nm[0];
            $_SESSION['username']=$nm[6];
            switch ($nm[1]) {
                case 'u1':
                header("location:admin/penerimaan.php");
                    break;
                case 'u2':
                header("location:owner/index.html");
					break;
					case 'u3':
                header("location:Pegawai/index.html");
                    break;
                default:
                header("location:login.php?=salah");
                    break;
            }
        }else{
           echo "<script>alert('Username atau Password Salah!!!');window.location='index.php'</script>";
		};
		
		?>