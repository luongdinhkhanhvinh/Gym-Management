<?php
require '../../include/db_conn.php';
page_protect();

if (isset($_POST['name'])) {
    $memid = $_POST['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Titan Gym | Chỉnh sửa thành viên</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
	
	<style>
 	#button1
	{
	width:126px;
	}
	#boxxe
	{
		width:230px;
	}
	.page-container .sidebar-menu #main-menu li#hassubopen > a {
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
			<h3>
				Chỉnh sửa chi tiết thành viên</h3>
			<hr/>
			<?php
	    
				    $query  = "SELECT * FROM users u 
				    		   INNER JOIN address a ON u.userid=a.id
				    		   INNER JOIN  health_status h ON u.userid=h.uid
				    		   WHERE userid='$memid'";
				    //echo $query;
				    $result = mysqli_query($con, $query);
				    $sno    = 1;
				    
				    $name="";
				    $gender="";

				    if (mysqli_affected_rows($con) == 1) {
				        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				    
				            $name    = $row['username'];
				            $gender =$row['gender'];
				            $mobile = $row['mobile'];
				            $email   = $row['email'];
				            $dob	 = $row['dob'];         
				            $jdate    = $row['joining_date'];
				          	$streetname=$row['streetName'];
				          	$state=$row['state'];
				          	$city=$row['city'];  
				          	$zipcode=$row['zipcode'];
				            $calorie=$row['calorie'];
				            $height=$row['height'];
				            $weight=$row['weight'];
				            $fat=$row['fat'];
				            $remarks=$row['remarks'];				            
				        }
				    }
				    else{
				    	 echo "<html><head><script>alert('Change Unsuccessful');</script></head></html>";
				    	 echo mysqli_error($con);
				    }


				?>


			
			
			<div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:600px; margin:0 auto;">
		<div class="a1-container a1-dark-gray a1-center">
        	<h6>CHỈNH SỬA THÔNG TIN THÀNH VIÊN</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="edit_mem_submit.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">ID NGƯỜI DÙNG:</td>
           	   <td height="35"><input id="boxxe" type="text" name="uid" readonly required value=<?php echo $memid?>></td>
         	   </tr>
             <tr>
               <td height="35">TÊN:</td>
               <td height="35"><input id="boxxe" type="text" name="uname" value='<?php echo $name?>'></td>
             </tr>
             <tr>
               <td height="35">GIỚI TÍNH:</td>
               <td height="35"><select id="boxxe" name="gender" id="gender" required>

						<option <?php if($gender == 'Male'){echo("selected");}?> value="Male">Nam</option>
						<option <?php if($gender == 'Female'){echo("selected");}?> value="Female">Nữ</option>
						</select></td><br>
             </tr>
			  <tr>
               <td height="35">SỐ ĐIỆN THOẠI:</td>
               <td height="35"><input id="boxxe" type="number" name="phone" maxlength="10" value=<?php echo $mobile?>></td>
             </tr>
             <tr>
               <td height="35">EMAIL:</td>
               <td height="35"><input id="boxxe" type="email" name="email" required value=<?php echo $email?>></td>
             </tr>
			 <tr>
               <td height="35">NGÀY SINH:</td>
               <td height="35"><input type="date" id="boxxe" name="dob" value=<?php echo $dob?>></td>
             </tr>
			 <tr>
               <td height="35">NGÀY THAM GIA:</td>
               <td height="35"><input type="date" id="boxxe" name="jdate" value=<?php echo $jdate?>></td>
             </tr>

			<tr>
               <td height="35">TÊN ĐƯỜNG:</td>
               <td height="35"><input type="text" id="boxxe" name="stname" value='<?php echo $streetname?>'></td>
             </tr>

			 <tr>
               <td height="35">QUẬN, HUYỆN:</td>
               <td height="35"><input type="text" id="boxxe" name="state" value='<?php echo $state?>'></td>
             </tr>
			 <tr>
               <td height="35">THÀNH PHỐ:</td>
               <td height="35"><input type="text" id="boxxe" name="city" value='<?php echo $city?>'></td>
             </tr>
             <tr>
               <td height="35">MÃ BƯU ĐIỆN:</td>
               <td height="35"><input type="text" id="boxxe" name="zipcode" value='<?php echo $zipcode?>'></td>
             </tr>
			 <tr>
               <td height="35">NHIỆT LƯỢNG:</td>
               <td height="35"><input type="text" id="boxxe" name="calorie" value=<?php echo $calorie?>></td>
             </tr>
			 <tr>
               <td height="35">CHIỀU CAO:</td>
               <td height="35"><input type="text" id="boxxe" name="height" value=<?php echo $height?>></td>
             </tr>
			 <tr>
               <td height="35">CÂN NẶNG:</td>
               <td height="35"><input type="text" id="boxxe" name="weight" value=<?php echo $weight?>></td>
             </tr>
			 <tr>
               <td height="35">MẬP:</td>
               <td height="35"><input type="text" id="boxxe" name="fat" value=<?php echo $fat?>></td>
             </tr>
			 <tr>
               <td height="35">NHẬN XÉT:</td>
               <td height="35"><textarea style="resize:none; margin: 0px; width: 230px; height: 53px;" name="remarks" id="boxxe" ><?php echo $remarks?></textarea></td>
             </tr>
			 
			 
			 
             <br>
            
             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="CẬP NHẬP" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Làm lại"></td>
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

<?php
} else {
    
}
?>
