<?php
require '../../include/db_conn.php';
page_protect();

if(isset($_POST['submit'])){

  $usrname=$_POST['login_id'];
  $fulname=$_POST['full_name'];

  $query="update admin set username='".$usrname."',Full_name='".$fulname."' where username='".$_SESSION['full_name']."'";

  if(mysqli_query($con,$query)){
  	echo "<head><script>alert('Profile Change ');</script></head></html>";

     echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
  }
  else{
  	echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
	 echo "error".mysqli_error($con);
  }

  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Titan Gym | Quản trị viên</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<style>
    	.page-container .sidebar-menu #main-menu li#adminprofile > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}

    </style>

</head>
     <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">	
	
		<div class="sidebar-menu">
	
			<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="main.php">
					<img src="../../images/logo.png" alt="" width="192" height="80" />
				</a>
			</div>
			
					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Chào mừng <?php echo $_SESSION['full_name']; ?> 
							</li>						
						
							<li>
								<a href="logout.php">
									Đăng xuất <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h3>Chỉnh sửa thông tin người dùng</h3>
		(Bạn sẽ được yêu cầu đăng nhập lại sau khi cập nhật hồ sơ)
		
		<hr />
		
		<?php $user_id_auth = $_SESSION['user_data']; ?>

		
		
		
		
		<div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:600px; margin:0 auto;">
		<div class="a1-container a1-dark-gray a1-center">
        	<h6>THAY ĐỔI THÔNG TIN</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">ID:</td>
           	   <td height="35"><input type="text" name="login_id" value="<?php echo $_SESSION['user_data']; ?>" class="form-control" required/></td>
         	   </tr>
             <tr>
               <td height="35">TÊN ĐẦY ĐỦ:</td>
               <td height="35"><input class="form-control" type="text" name="full_name" id="textfield2" value="<?php echo $_SESSION['username']; ?>" maxlength="25" required></td>
             </tr>
             <tr>
               <td height="35">MẬT KHẨU</td>
               <td height="35"><span class="form-control">*********</span> <a href="change_pwd.php" class="a1-btn a1-orange">Thay đổi mật khẩu</a> <span class="help-block">*Vì lý do bảo mật .Ẩn</span></td><br>
             </tr>
             
             <br>
            
             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="CHẤP NHẬN" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="LÀM LẠI"></td>
             </tr>
           </table></td>
         </tr>
         </table>
       </form>
    </div>
    </div>   
		
		
		
		
		

			<?php include('footer.php'); ?>

    	</div>

    </body>
</html>


										