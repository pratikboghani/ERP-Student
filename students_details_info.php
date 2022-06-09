<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

include_once("connect.php");
$msg = '';


if(isset($_POST['btninsert']))
{
    $filename = $_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {        
        $file = fopen($filename, "r");
        while (($col = fgetcsv($file, 10000, ",")) !== FALSE) 
        {
           // echo'<pre>'; print_r($col);
          //stu_info
            $insert1 = "INSERT INTO stu_info(stu_unique_id,stu_title,stu_first_name,stu_middle_name,stu_last_name,stu_gender,stu_dob,stu_email_id,stu_bloodgroup,stu_birthplace,stu_religion,stu_admission_date,stu_languages,stu_mobile_no,stu_info_stu_master_id)values('".$col[0]."','".$col[1]."','".$col[2]."','".$col[3]."','".$col[4]."','".$col[5]."','".$col[6]."','".$col[7]."','".$col[8]."','".$col[9]."','".$col[10]."','".$col[11]."','".$col[12]."','".$col[13]."','".$col[14]."')";

            //stu_address
            $insert2 = "INSERT INTO stu_address(stu_cadd,stu_cadd_city,stu_cadd_state,stu_cadd_country,stu_cadd_pincode,stu_cadd_house_no,stu_cadd_phone_no,stu_padd,stu_padd_city,stu_padd_state,stu_padd_country,stu_padd_pincode,stu_padd_house_no,stu_padd_phone_no)values('".$col[15]."','".$col[16]."','".$col[17]."','".$col[18]."','".$col[19]."','".$col[20]."','".$col[21]."','".$col[22]."','".$col[23]."','".$col[24]."','".$col[25]."','".$col[26]."','".$col[27]."','".$col[28]."')";

            //stu_docs
            $insert3 = "INSERT INTO stu_docs(stu_docs_details,stu_docs_category_id,stu_docs_path,stu_docs_status,stu_docs_stu_master_id)values('".$col[29]."','".$col[30]."','".$col[31]."','".$col[32]."','".$col[33]."')";

            //stu_category
            $insert4 = "INSERT INTO stu_category(stu_category_name,is_status)values('".$col[34]."','".$col[35]."')";

            //guardian
            $insert5 = "INSERT INTO stu_guardians(guardian_name,guardian_relation,guardian_mobile_no,guardian_phone_no,guardian_qualification,guardian_occupation,guardian_income,guardian_email,guardian_home_address,guardian_office_address,is_emg_contact,guardia_stu_master_id,is_status)values('".$col[36]."','".$col[37]."','".$col[38]."','".$col[39]."','".$col[40]."','".$col[41]."','".$col[42]."','".$col[43]."','".$col[44]."','".$col[45]."','".$col[46]."','".$col[47]."','".$col[48]."')";

            //master
            $insert6 = "INSERT INTO stu_master(stu_master_stu_info_id,stu_master_user_id,stu_master_nationality_id,stu_master_category_id,stu_master_course_id,stu_master_batch_id,stu_master_section_id,stu_master_stu_status_id,stu_master_stu_address_id,is_status)values('".$col[49]."','".$col[50]."','".$col[51]."','".$col[52]."','".$col[53]."','".$col[54]."','".$col[55]."','".$col[56]."','".$col[57]."','".$col[58]."')";

            //status
            $insert7 = "INSERT INTO stu_status(stu_status_name,stu_status_description,is_status)values('".$col[59]."','".$col[60]."','".$col[61]."')";
            

            $exe=mysqli_query($con,$insert1)and(mysqli_query($con,$insert2))and(mysqli_query($con,$insert3))and(mysqli_query($con,$insert4))and(mysqli_query($con,$insert5))and(mysqli_query($con,$insert6))and(mysqli_query($con,$insert7))or die(mysqli_error($con));
        }
        
    if ($exe)
    {
      $msg = '<script>alert("Record Submitted")</script>';
      echo $msg;
      //echo '<script>alert("Submitted")</script>';
    }
    else
    {
      echo '<script>alert("Record not Submitted")</script>';
    }
    }
}


$stu_photo="";
if (isset($_POST['btnsubmit'])) 
	{
		/*Student Info*/
		$stu_unique_id=$_POST['txtuniqueid'];
		$stu_title=$_POST['txttitle'];
		$stu_first_name=$_POST['txtfname'];
		$stu_middle_name=$_POST['txtmname'];
		$stu_last_name=$_POST['txtlname'];		
		$stu_gender=$_POST['txtgender'];
		$stu_dob=$_POST['txtdob'];
		$stu_email_id=$_POST['txtemail'];
		$stu_bloodgroup=$_POST['txtblood'];
		$stu_birthplace=$_POST['txtbirthplace'];
		$stu_religion=$_POST['txtreligion'];
		$stu_admission_date=$_POST['txtadmission'];		
		$stu_photo= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$stu_languages=$_POST['txtlanguages'];
		$stu_mobile_no=$_POST['txtmobile'];
		$stu_info_stu_master_id=$_POST['txtmid'];

		/*Student Address*/
		$stu_cadd=$_POST['txtcadd'];
		$stu_cadd_city=$_POST['txtccity'];
		$stu_cadd_state=$_POST['txtcstate'];
		$stu_cadd_country=$_POST['txtccountry'];
		$stu_cadd_pincode=$_POST['txtcpincode'];		
		$stu_cadd_house_no=$_POST['txtchno'];
		$stu_cadd_phone_no=$_POST['txtcpno'];

		$stu_padd=$_POST['txtpadd'];
		$stu_padd_city=$_POST['txtpcity'];
		$stu_padd_state=$_POST['txtpstate'];
		$stu_padd_country=$_POST['txtpcountry'];
		$stu_padd_pincode=$_POST['txtppincode'];		
		$stu_padd_house_no=$_POST['txtphno'];
		$stu_padd_phone_no=$_POST['txtppno'];

		//stu_docs
		$stu_docs_details=$_POST['txtdocsdetails'];
		$stu_docs_category_id=$_POST['txtdocscategoryid'];
		$stu_docs_path=$_POST['txtdocspath'];
		$stu_docs_status=$_POST['txtdocsstatus'];
		$stu_docs_stu_master_id=$_POST['txtdocsmasterid'];

		//stu_category
		$stu_category_name=$_POST['txtcategoryname'];
		$is_status=$_POST['txtcategorystatus'];

		//guardian
		$guardian_name=$_POST['txtgname'];
		$guardian_relation=$_POST['txtgrelation'];
		$guardian_mobile_no=$_POST['txtgmobile'];
		$guardian_phone_no=$_POST['txtgphone'];
		$guardian_qualification=$_POST['txtgqualification'];		
		$guardian_occupation=$_POST['txtgoccupation'];
		$guardian_income=$_POST['txtgincome'];
		$guardian_email=$_POST['txtgemail'];
		$guardian_home_address=$_POST['txtghomeadd'];
		$guardian_office_address=$_POST['txtgofficeadd'];
		$is_emg_contact=$_POST['txtgemgcontact'];
		$guardia_stu_master_id=$_POST['txtguardianmasterid'];		
		$is_status=$_POST['txtgstatus'];

		//master
		$stu_master_stu_info_id=$_POST['txtinfo'];
		$stu_master_user_id=$_POST['txtuser'];
		$stu_master_nationality_id=$_POST['txtnationality'];
		$stu_master_category_id=$_POST['txtcategory'];
		$stu_master_course_id=$_POST['txtcourse'];		
		$stu_master_batch_id=$_POST['txtbatch'];
		$stu_master_section_id=$_POST['txtsection'];
		$stu_master_stu_status_id=$_POST['txtstatus'];
		$stu_master_stu_address_id=$_POST['txtaddress'];
		$is_status=$_POST['txtstatus'];

		//stu_status
		$stu_status_name=$_POST['txtstatusname'];
		$stu_status_description=$_POST['txtdescriptionription'];
		$is_status=$_POST['txtisstatus'];

		/*Student info*/
		$insqry1="insert into stu_info values('','$stu_unique_id','$stu_title','$stu_first_name','$stu_middle_name','$stu_last_name','$stu_gender','$stu_dob','$stu_email_id','$stu_bloodgroup','$stu_birthplace','$stu_religion','$stu_admission_date','$stu_photo','$stu_languages','$stu_mobile_no','$stu_info_stu_master_id')";

		/*Student Address*/
		$insqry2="insert into stu_address values('','$stu_cadd','$stu_cadd_city','$stu_cadd_state','$stu_cadd_country','$stu_cadd_pincode','$stu_cadd_house_no','$stu_cadd_phone_no','$stu_padd','$stu_padd_city','$stu_padd_state','$stu_padd_country','$stu_padd_pincode','$stu_padd_house_no','$stu_padd_phone_no')";

		//stu_docs
		$insqry3="insert into stu_docs values('','$stu_docs_details','$stu_docs_category_id','$stu_docs_path','$stu_docs_status','$stu_docs_stu_master_id')";

		//stu_category
		$insqry4="insert into stu_category values('','$stu_category_name','$is_status')";

		//guardian
		$insqry5="insert into stu_guardians values('','$guardian_name','$guardian_relation','$guardian_mobile_no','$guardian_phone_no','$guardian_qualification','$guardian_occupation','$guardian_income','$guardian_email','$guardian_home_address','$guardian_office_address','$is_emg_contact','$guardia_stu_master_id','$is_status')";

		//master
		$insqry6="insert into  stu_master values('','$stu_master_stu_info_id','$stu_master_user_id','$stu_master_nationality_id','$stu_master_category_id','$stu_master_course_id','$stu_master_batch_id','$stu_master_section_id','$stu_master_stu_status_id','$stu_master_stu_address_id','$is_status')";

		//stu_status
		$insqry7="insert into  stu_status values('','$stu_status_name','$stu_status_description','$is_status')";

		$exec=mysqli_query($con,$insqry1)and(mysqli_query($con,$insqry2))and(mysqli_query($con,$insqry3))and(mysqli_query($con,$insqry4))and(mysqli_query($con,$insqry5))and(mysqli_query($con,$insqry6))and(mysqli_query($con,$insqry7)) or die(mysqli_error($con));
		

		if ($exec)
		{
			header("Location:students_details_info.php");
			//echo '<script>alert("Submitted")</script>';
		}
		else
		{
			echo '<script>alert("Record not Submitted")</script>';
		}
	}

?>


<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

<title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | SignUp Page :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> ERP<span class="dashboard_text">Students</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
			  <!-- Admin Module --> 
			   <li class="treeview">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Admin Module</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="students_details_info.php"><i class="fa fa-angle-right"></i> Student Details</a></li>
                  <li><a href="faculty_details.php"><i class="fa fa-angle-right"></i> Faculty Details</a></li>
                </ul>
              </li>
			 <!-- Faculty Module --> 
			  <li class="treeview">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Faculty Module</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-angle-right"></i> Option 1</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i> Option 2</a></li>
                </ul>
              </li>
			  
			   <!-- Student Module --> 
			  <li class="treeview">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Student Module</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-angle-right"></i> Option 1</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i> Option 2</a></li>
                </ul>
              </li>
			  
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		


	
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         


		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						<li class="dropdown head-dpdn">
							
						</li>	
							
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				<div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div><!--//end-search-box-->
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
									<div class="user-name">
										<p>Admin Name</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
								<li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li> 
								<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start 1693 6578-->
		




				
		<div id="page-wrapper">
			<div class="main-page signup-page1">
				<h2 class="title1">Student Info</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Info Details</h5>
				<form method="post" enctype="multipart/form-data">
					<!--main tabel start -->
				
				<table style="width: 100%;">
					<tr>
						<td>
							<div class="sign-u">
							<input type="text" name="txtuniqueid" placeholder="Student Unique Id" required="">
							<div class="clearfix"> </div>
							</div>
						</td>
						<td>
							<div class="sign-u">
							<input type="text" name="txttitle" placeholder="Student Title" required="">
							<div class="clearfix"> </div>
							</div>
						</td>
						<td style="height: 55px; vertical-align:top;">
							
						<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
							<select name="txtmid">
								<option disabled="disabled" selected="selected">Master id</option>
								<?php
									$res=mysqli_query($con,"select*from stu_master");
									while($row=mysqli_fetch_array($res))
									echo "<option value='".$row['stu_master_id']."'>".$row["stu_master_id"]."</option>";
								?>								
							</select>
							<div class="select-dropdown"></div>
						</div>
						</div>
						
						</td>
					</tr>
					<tr>
						<td>
							<div class="sign-u">
							<input type="text" name="txtfname" placeholder="Student First Name" required="">
							<div class="clearfix"> </div>
							</div>
						</td>
						<td>
							<div class="sign-u">
							<input type="text" name="txtmname" placeholder="Student Middle Name" required="">
							<div class="clearfix"> </div>
							</div>
						</td>
						<td>
							<div class="sign-u">
							<input type="text" name="txtlname" placeholder="Student Last Name" required="">
							<div class="clearfix"> </div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Birth date" name="txtdob" required="">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
						</td>
						<td>
							<div class="input-group">
                        	<input class="input--style-2 js-datepicker" type="text" placeholder="Admission Date" name="txtadmission" required="">
                        	<i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                    	</div>
						</td>
						<td>
							<div class="sign-u">
							<input type="text" name="txtmobile" placeholder="Mobile No" required="" inputmode="numeric" maxlength="10" minlength="10">
							<div class="clearfix"> </div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="sign-u">
							<input type="Email" name="txtemail" placeholder="Student Email Id" required="">
							<div class="clearfix"> </div>
							</div>
						</td>
						<td>
							<div class="sign-u">
							<input type="text" name="txtbirthplace" placeholder="Student Birth Place" required="">
							<div class="clearfix"> </div>
							</div>
						</td>
						<td>
							<div class="sign-u">
							<input type="text" name="txtreligion" placeholder="Student Religion" required="">
							<div class="clearfix"> </div>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtgender">
                                            <option disabled="disabled" selected="selected">Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
						</td>
						
						<td>
							<div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtblood">
                                            <option disabled="disabled" selected="selected">BloodGroup</option>
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                            <option>AB+</option>
                                            <option>AB-</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
						</td>
						<td>
							<div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtlanguages">
                                            <option disabled="disabled" selected="selected">Languages</option>
                                            <option>English</option>
                                            <option>Hindi</option>
                                            <option>Gujarati</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
						</td>
					</tr>
					<tr>
						<table>
							<tr>
								<td>
							<div class="sign-u"><br>
							<label style="color: #808080;">Student Photo :</label>
							</div>
						</td>
						<td>
							<div class="signup-page1">
							<input type="file" name="image" id="image"/>
							</div>
							<div class="clearfix"> </div>
						</td>
							</tr>
						</table>
					</tr>
				
				<!--main tabel end-->

					<!--address tabel start-->
					<table style="width: 100%;">
						<tr>
							<td>
								<h5>Student Current Address :</h5>
							</td>
							<td>
								<h5>Student Permanent Address :</h5>
							</td>
						</tr>
						<tr>
							<td>
								<div class="sign-u">
								<input type="text" name="txtcadd" placeholder="Student Current Address" required="">
								<div class="clearfix"> </div>
								</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtpadd" placeholder="Student Permanent Address" required="">
								<div class="clearfix"> </div>
								</div>
							</td>
						</tr>
						<tr>
							<td style="height: 55px; vertical-align:top;">
								<table style="width: 100%;">
								<tr>
									<td>
									<div class="input-group">
									<div class="rs-select2 js-select-simple select--no-search">
									<select name="txtccity">
									<option disabled="disabled" selected="selected">Current City</option>
									<?php
									$res=mysqli_query($con,"select*from city");
									while($row=mysqli_fetch_array($res))
									echo "<option value='".$row['city_id']."'>".$row["city_name"]."</option>";
									?>								
									</select>
									<div class="select-dropdown"></div>
									</div>
									</div>
									</td>
									<td>
										<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
										<select name="txtcstate">
										<option disabled="disabled" selected="selected">Current State</option>
										<?php
										$res=mysqli_query($con,"select*from state");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['state_id']."'>".$row["state_name"]."</option>";
										?>								
										</select>
										<div class="select-dropdown"></div>
										</div>
										</div>
									</td>
									<td>
										<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
										<select name="txtccountry">
										<option disabled="disabled" selected="selected">Current Country</option>
										<?php
										$res=mysqli_query($con,"select*from country");
										while($row=mysqli_fetch_array($res))
								
										echo "<option value='".$row['country_id']."'>".$row["country_name"]."</option>";
										?>								
										</select>
										<div class="select-dropdown"></div>
										</div>
										</div>
									</td>
								</tr>
							</table>
						</td>
						<td style="height: 55px; vertical-align:top;">
							<table style="width: 100%;">
								<tr>
									<td>
										<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
										<select name="txtpcity">
										<option disabled="disabled" selected="selected">Permanent City</option>
										<?php
										$res=mysqli_query($con,"select*from city");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['city_id']."'>".$row["city_name"]."</option>";
										?>								
										</select>
										<div class="select-dropdown"></div>
										</div>
										</div>
									</td>
									<td>
										<div class="input-group">
										<div class="rs-select2 js-select-simple select--no-search">
										<select name="txtpstate">
										<option disabled="disabled" selected="selected">Permanent State</option>
										<?php
										$res=mysqli_query($con,"select*from state");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['state_id']."'>".$row["state_name"]."</option>";
										?>								
										</select>
										<div class="select-dropdown"></div>
										</div>
										</div>
									</td>
									<td>
											<div class="input-group">
											<div class="rs-select2 js-select-simple select--no-search">
											<select name="txtpcountry">
											<option disabled="disabled" selected="selected">Permanent Country</option>
											<?php
											$res=mysqli_query($con,"select*from country");
											while($row=mysqli_fetch_array($res))
											echo "<option value='".$row['country_id']."'>".$row["country_name"]."</option>";
											?>								
											</select>
											<div class="select-dropdown"></div>
											</div>
											</div>
									</td>	
								</tr>
							</table>
						</td>
						</tr>
						<tr>
							<td>
								<table style="width: 100%;">
									<tr>
										<td>
											<div class="sign-u">
								<input type="text" name="txtchno" placeholder="House No" required="">
						<div class="clearfix"> </div>
					</div>
										</td>

										<td>
											<div class="sign-u">
								<input type="text" name="txtcpincode" pattern="[0-9]{6}" maxlength="6" minlength="6" inputmode="numeric" placeholder="Pincode" required="">
						<div class="clearfix"> </div>
					</div>
										</td>

										<td>
											<div class="sign-u">
								<input type="text" name="txtcpno" placeholder="Phone No" required="" pattern="[789][0-9]{9}" maxlength="10" minlength="10" inputmode="numeric">
						<div class="clearfix"> </div>
					</div>
										</td>
									</tr>
								</table>
							</td>
					
							<td>
								<table style="width: 100%;">
									<tr>
										<td>
											<div class="sign-u">
								<input type="text" name="txtphno" placeholder="House No" required="">
						<div class="clearfix"> </div>
					</div>
										</td>

										<td>
											<div class="sign-u">
								<input type="text" name="txtppincode" pattern="[0-9]{6}" maxlength="6" minlength="6" inputmode="numeric" placeholder="Pincode" required="">
						<div class="clearfix"> </div>
					</div>
										</td>

										<td>
											<div class="sign-u">
								<input type="text" name="txtppno" placeholder="Phone No" required="" pattern="[789][0-9]{9}" maxlength="10" minlength="10" inputmode="numeric">
						<div class="clearfix"> </div>
					</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<!--address tabel end-->

					<!--docs tabel start-->
					<table style="width: 100%;">
						<tr>
							<td>
								<h5>Student Docs Details</h5>
							</td>
						</tr>
						<tr>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtdocscategoryid">
									<option disabled="disabled" selected="selected">Doc Category id</option>
									<?php
										$res=mysqli_query($con,"select*from document_category");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['doc_category_id']."'>".$row["doc_category_name"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
						<div class="rs-select2 js-select-simple select--no-search">
							<select name="txtdocsmasterid">
								<option disabled="disabled" selected="selected">Master id</option>
								<?php
									$res=mysqli_query($con,"select*from stu_master");
									while($row=mysqli_fetch_array($res))
									echo "<option value='".$row['stu_master_id']."'>".$row["stu_master_id"]."</option>";
								?>								
							</select>
							<div class="select-dropdown"></div>
						</div>
					</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="sign-u">
								<input type="text" name="txtdocsdetails" placeholder="Docs Details" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtdocspath" placeholder="Path" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtdocsstatus" placeholder="Status" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
						</tr>
						
					</table>
					<!--docs tabel end-->

					<!--category tabel start-->
					<table style="width: 100%;">
						<tr>
							<td>
								<h5>Student Category Details</h5>
							</td>
						</tr>
						<tr>
							<td>
								<div class="input-group">
								<input type="text" name="txtcategoryname" placeholder="Student Category Name" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="input-group">
								<input type="text" name="txtcategorystatus" placeholder="Is Status" inputmode="numeric" required="0 or 1">
						<div class="clearfix"> </div>
					</div>
							</td>
						</tr>
					</table>
					<!--category tabel end-->

					<!--guardian tabel start-->
					<table style="width: 100%;">
						<tr>
							<td>
								<h5>Student Guardians Details</h5>
							</td>
						</tr>
						<tr>
							<td>
								<div class="sign-u">
								<input type="text" name="txtgname" placeholder="Guardian Name" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="input-group">
								<input type="text" name="txtgmobile" placeholder="Guardian Mobile No" required="" pattern="[789][0-9]{9}" maxlength="10" minlength="10" inputmode="numeric">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="input-group">
								<input type="text" name="txtgphone" placeholder="Guardian Phone No" required="" maxlength="10" minlength="10" inputmode="numeric">
						<div class="clearfix"> </div>
					</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="sign-u">
								<input type="text" name="txtghomeadd" placeholder="Guardian Home Address" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtgofficeadd" placeholder="Guardian Office Address" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
						</tr>
						<tr>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtgrelation">
                                            <option disabled="disabled" selected="selected">Guardian Relation</option>
                                            <option>Father</option>
                                            <option>Mother</option>
                                            <option>Brother</option>
                                            <option>Sun</option>
                                            <option>Daughter</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtgqualification">
                                            <option disabled="disabled" selected="selected">Guardian Qualification</option>
                                            <option>>=SSC</option>
                                            <option>>=HSC</option>
                                            <option>GRADUATE</option>
                                            <option><=8</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
							</td>
						
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtgincome">
                                            <option disabled="disabled" selected="selected">Guardian Income</option>
                                            <option><=1,20,000/-</option>
                                            <option><=5,00,000/-</option>
                                            <option><=10,00,000/-</option>  
                                            <option><=25,00,000/-</option>
                                            <option>>=50,00,000/-</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="sign-u">
								<input type="email" name="txtgemail" placeholder="Guardian Email" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtgemgcontact" placeholder="Is Emergency Contact?" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtgstatus" placeholder="Is Status" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
						</tr>
						<tr>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
						<div class="rs-select2 js-select-simple select--no-search">
							<select name="txtguardianmasterid">
								<option disabled="disabled" selected="selected">Master id</option>
								<?php
									$res=mysqli_query($con,"select*from stu_master");
									while($row=mysqli_fetch_array($res))
									echo "<option value='".$row['stu_master_id']."'>".$row["stu_master_id"]."</option>";
								?>								
							</select>
							<div class="select-dropdown"></div>
						</div>
					</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtgoccupation" placeholder="Guardian Occupation" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
						</tr>
					</table>
					<!--guardian tabel end-->

					<!--master tabel start-->
					<table style="width: 100%;">
						<tr>
							<td>
								<h5>Student Master Details</h5>
							</td>
						</tr>
						<tr>
							<td>
								<div class="sign-u">
								<input type="text" name="txtstatus" placeholder="Student status id" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtinfo">
									<option disabled="disabled" selected="selected">Info id</option>
									<?php
										$res=mysqli_query($con,"select*from stu_info");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['stu_info_id']."'>".$row["stu_info_id"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtuser">
									<option disabled="disabled" selected="selected">User id</option>
									<?php
										$res=mysqli_query($con,"select*from users");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['user_id']."'>".$row["user_id"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtnationality">
									<option disabled="disabled" selected="selected">Nationality</option>
									<?php
										$res=mysqli_query($con,"select*from nationality");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['nationality_id']."'>".$row["nationality_name"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtsection">
									<option disabled="disabled" selected="selected">section id</option>
									<?php
										$res=mysqli_query($con,"select*from section");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['section_id']."'>".$row["section_name"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
							
						</tr>
						<tr>
							<td>
								<div class="sign-u">
								<input type="text" name="txtstatus" placeholder="Student Is Status" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtcourse">
									<option disabled="disabled" selected="selected">cource id</option>
									<?php
										$res=mysqli_query($con,"select*from courses");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['course_id']."'>".$row["course_name"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtbatch">
									<option disabled="disabled" selected="selected">batch id</option>
									<?php
										$res=mysqli_query($con,"select*from batches");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['batch_id']."'>".$row["batch_name"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
								<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtcategory">
									<option disabled="disabled" selected="selected">Category id</option>
									<?php
										$res=mysqli_query($con,"select*from stu_category");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['stu_category_id']."'>".$row["stu_category_name"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
							<td style="height: 55px; vertical-align:top;">
								<div class="input-group">
							<div class="rs-select2 js-select-simple select--no-search">
								<select name="txtaddress">
									<option disabled="disabled" selected="selected">address id</option>
									<?php
										$res=mysqli_query($con,"select*from stu_address");
										while($row=mysqli_fetch_array($res))
										echo "<option value='".$row['stu_address_id']."'>".$row["stu_cadd"]."</option>";
									?>								
								</select>
								<div class="select-dropdown"></div>
							</div>
					</div>
							</td>
						</tr>
					</table>
					<!--master tabel end-->

					<!--status tabel start-->
					<table style="width: 100%;">
						<tr>
							<td>
								<h5>Student Status Details</h5>
							</td>
						</tr>
						<tr>
							<td>
								<div class="sign-u">
								<input type="text" name="txtstatusname" placeholder="Student name" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtdescriptionription" placeholder="Student description" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
							<td>
								<div class="sign-u">
								<input type="text" name="txtisstatus" placeholder="Is status?" required="">
						<div class="clearfix"> </div>
					</div>
							</td>
						</tr>
					</table>
					<!--status tabel end-->


		
				
					<tr>
						<td colspan="3">
							<div class="sub_home">
							<input type="submit" name="btnsubmit" value="Submit">
							<div class="clearfix"> </div>
							</div>
						</td>
					</tr>
				</table>
				<!--main tabel end-->
				</form>


				<form method="post" enctype="multipart/form-data">
				<br>
				<br>
				<tabel>
					<tr>
						<td>
							<div class="sign-u"><br>
							<label style="color: #808080;">Import CSV File :</label>
							</div>

						</td>
						<td>
							<div class="input-group">
							<input type='file' name='file'/>
						</div>
						</td>
						<td>
							<div class="input-group">
							<div class="sub_home1">
							<input type="submit" name="btninsert" value="Import">
							<div class="clearfix"> </div>
						</td>
					</tr>
				</table>
				</form>
				</div>
			</div>
		</div>



		<!--footer-->
		<div class="footer">
		   <p>&copy; 2020 All Rights Reserved | Design by </p>
		</div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
		<!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
</html>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>