﻿<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Titan Gym | Xem thành viên</title>
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

		<h3>Chỉnh sửa thành viên</h3>

		<hr />
		
		<table class="table table-bordered datatable" id="table-1" border=1>
			<thead>
				<tr><h2>
					<th>Số lượng</th>
					<th>Thành viên hết hạn</th>
					<th>ID thành viên</th>
					<th>Tên</th>
					<th>Liên hệ</th>
					<th>E-Mail</th>
					<th>Giới tính</th>
					<th>Ngày tham gia</th>
					<th>Hoạt động</th></h2>
				</tr>
			</thead>
				<tbody>

						<?php
							$query  = "select * from users ORDER BY joining_date";
							//echo $query;
							$result = mysqli_query($con, $query);
							$sno    = 1;

							if (mysqli_affected_rows($con) != 0) {
							    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							        $uid   = $row['userid'];
							        $query1  = "select * from enrolls_to WHERE uid='$uid' AND renewal='yes'";
							        $result1 = mysqli_query($con, $query1);
							        if (mysqli_affected_rows($con) == 1) {
							            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
							                
							                echo "<tr><td>".$sno."</td>";

							                echo "<td>" . $row1['expire'] . "</td>";
							                
							                echo "<td>" . $row['userid'] . "</td>";

							                echo "<td>" . $row['username'] . "</td>";

							                echo "<td>" . $row['mobile'] . "</td>";

							                echo "<td>" . $row['email'] . "</td>";

							                echo "<td>" . $row['gender'] . "</td>";

							                echo "<td>" . $row['joining_date'] ."</td>";
							                
							                $sno++;
							       
							                echo "<td><form action='read_member.php' method='post'><input type='hidden' name='name' value='" . $uid . "'/><input type='submit' class='a1-btn a1-blue' id='button1' value='Xem lịch sử' class='btn btn-info'/></form><form action='edit_member.php' method='post'><input type='hidden'  name='name' value='" . $uid . "'/><input type='submit' class='a1-btn a1-green' id='button1' value='Chỉnh sửa' class='btn btn-warning'/></form><form action='del_member.php' method='post' onsubmit='return ConfirmDelete()'><input type='hidden' name='name' value='" . $uid . "'/><input type='submit' value='Xóa' width='20px' id='button1' class='a1-btn a1-orange'/></form></td></tr>";
							                $msgid = 0;
							            }
							        }
							    }
							}
						?>									
					</tbody>
				</table>

<script>
	
	function ConfirmDelete(name){
	
    var r = confirm("Are you sure! You want to Delete this User?");
    if (r == true) {
       return true;
    } else {
        return false;
    }
}

</script>

			<?php include('footer.php'); ?>
    	</div>
    </body>
</html>





