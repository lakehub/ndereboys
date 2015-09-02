<?php    
date_default_timezone_set("Africa/Nairobi");


error_reporting(0);

$con = mysqli_connect("localhost", "root", "", "ndere_boys" ) or die(mysqli_error());
//if (isset($_POST["submit"])) {

$studentFName = mysqli_real_escape_string($con, $_POST['studentFName']);
$studentMName = mysqli_real_escape_string($con,$_POST['studentMName']);
$studentLName = mysqli_real_escape_string($con, $_POST['studentLName']);
$studentDOB = mysqli_real_escape_string($con,$_POST['datetimepicker9']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$studentCounty = mysqli_real_escape_string($con,$_POST['studentCounty']);
$formerInstitution = mysqli_real_escape_string($con,$_POST['formerInstitution']);
$classtoJoin = mysqli_real_escape_string($con,$_POST['classtoJoin']);
$parentName = mysqli_real_escape_string($con,$_POST['parentName']);
$mobileNumber = mysqli_real_escape_string($con,$_POST['mobileNumber']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$parentCounty = mysqli_real_escape_string($con,$_POST['County']);
$errStudentFName = '';
$errStudentMName = '';
$errStudentLName = '';
$errEmail = '';
$result = '';
		
		// Check if studentFName has been entered
  		if (!$_POST['studentFName']) {
            $errStudentFName = 'Please enter your First Name';
        }
        //Check if studentMName has been entered
        if (!$_POST['studentMName']) {
        	$errStudentMName = 'Please enter your Middle Name';
        }
        // Check if studentLName has been entered
        if (!$_POST['studentLName']) {
        	$errStudentLName = 'Please enter your Last Name';
        }
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
	    
function GetImageExtension($imagetype)
	     {
	       if(empty($imagetype)) return false;
	       switch($imagetype)
	       {
	           case 'image/bmp': return '.bmp';
	           case 'image/gif': return '.gif';
	           case 'image/jpeg': return '.jpg';
	           case 'image/png': return '.png';
	           default: return false;
	       }
	     }
	if (!empty($_FILES["uploadedimage"]["name"])) {
		
	    $destination_path = "assets/img/";
	    
	    $file_name=$_FILES["uploadedimage"]["name"];
		
		$temp_name=$_FILES["uploadedimage"]["tmp_name"];
        $imagetype=$_FILES["uploadedimage"]["type"];
	    $ext= GetImageExtension($imagetype);
	    $imagename=date("Y-m-d")."-".time().$ext;
			 
	    $target_path = $destination_path.basename($file_name);
	    $date = date("Y-m-d H:i:s");
	    move_uploaded_file($temp_name,$target_path);
	

 if (!$errStudentFName && !$errStudentMName && !$errStudentLName && !$errEmail ) {
    
 

    $query_upload  = "insert into enrolment(studentFName, studentMName, studentLName, datetimepicker9, gender, studentCounty, formerInstitution, classJoin, parentName, mobileNumber, email, County,image, images_path, submission_date ) values ('$studentFName','$studentMName','$studentLName','$studentDOB','$gender','$studentCounty','$formerInstitution','$classtoJoin','$parentName','$mobileNumber','$email','$parentCounty','$temp_name', '$target_path', '$date')";

 mysqli_query($con,$query_upload) or die("error in $query_upload == ----> 
    ".mysqli_error($con)); 
 $result='<div class="alert alert-success">Registration is Successful!</div>';
    } 
	else {
        $result='<div class="alert alert-danger">Sorry there was an error registering your details. Please try again and fill in all the fields.</div>';
    }
}

//}
?>
<!DOCTYPE HTML>
<html>
<head>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<meta charset="utf-8">
<title>Ndere Boys Boarding Primary School | Enrolment</title>

<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/enrolment.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />


<link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
<link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="LakeHub Kisumu">


<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/moment.js"></script>
<script type="text/javascript" src="assets/js/transition.js"></script>
<script type="text/javascript" src="assets/js/collapse.js"></script>
<script type="text/javascript" src="assets/js//bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- styles -->

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
			<script src="../assets/js/html5shiv.js"></script>
		<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>
<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
                                          
<script type="text/javascript">
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#datetimepicker9').datetimepicker({
                viewMode: 'years'
                //datetimepicker9.value: 'years'
                //value: 'YY-MM-DD'
                //format: 'YY-MM-DD'

            });
        });
    
   function resetForm(myFormId)
   {
       var myForm = document.getElementById(myFormId);

       for (var i = 0; i < myForm.elements.length; i++)
       {
           if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type)
           {
               myForm.elements[i].checked = false;
               myForm.elements[i].value = '';
               myForm.elements[i].selectedIndex = 0;
           }
       }
   }
   </script>
  
   
</head>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav pull-right">
				<li><a href="index.html">Home</a></li>
				<li><a href="gallery.html">Gallery</a></li>
				<li class="active"><a href="#">Enrolment</a></li>
				<li><a href="top_performers.html">Top Students</a></li>
				<li><a href="about_us.html">Contact Us</a></li>
			</ul>
		</div>
	</div>
</nav> 
<body>
<div class="container">
<form class="form-inline well" enctype="multipart/form-data" role="form" method="post" action="enrolment1.php" >
	<fieldset>
	<legend>Student's Details</legend>
	<div class="row">
					<div class="form-inline col-md-3">
						<label for="studentFName">First Name</label>
	<input type="text" class="form-control" id="studentFName" name ="studentFName" placeholder="First Name" value="<?php echo htmlspecialchars($_POST['studentFName']); ?>">  <?php echo "<p class='text-danger'>$errStudentFName</p>";?>
					</div>
					<div class="form-inline col-md-1"></div>
					<div class="form-inline col-md-3">
						<label for="studentMName">Middle Name</label>
	<input type="text" class="form-control"	id ="studentMName" name ="studentMName" placeholder="Middle Name" value="<?php echo htmlspecialchars($_POST['studentMName']); ?>"> <?php echo "<p class='text-danger'>$errStudentMName</p>";?>
					</div>
					<div class="form-inline col-md-1"></div>
					<div class="form-inline col-md-3">
						<label for="studentLName">Last Name</label>
	<input type="text" class="form-control"	id ="studentLName" name ="studentLName" placeholder="Last Name" value="<?php echo htmlspecialchars($_POST['studentLName']); ?>"> <?php echo "<p class='text-danger'>$errStudentLName</p>";?>
					</div>
				</div>
	</fieldset>     <!-- end of fieldset -->
	<fieldset>
	<legend>Bio Data</legend>
		
	<div class="row">
        <div class="form-inline col-md-3" style="height:130px;">
        <label for="datetimepicker9">Date of Birth YY-MM-DD</label>
            
         
            <div class='input-group date' id='datetimepicker9'>
                <input data-provide="datepicker-inline" type='text' class="form-control" id="datetimepicker9" name="datetimepicker9" placeholder="DateTimePicker" value="">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
            
        </div>

					<div class="form-inline col-md-1"></div>
					<div class="form-inline col-md-3">
					    <label for="gender">Select Gender:</label>
						<label for="gender">
							<input type="radio" class="radio-inline" id="1" name="gender" value='Male'> Male
							</label>
						<label for="gender">
							<input type="radio" class="radio-inline" id="2" name="gender" value='Female'> Female
						</label>
					</div>
					<div class="form-inline col-md-1"></div>
					<div class="form-inline col-md-3">
						<label for="studentCounty">Current Residence (County) </label>
	<input type="text" class="form-control" id ="studentCounty" name = "studentCounty"	placeholder="Resident County" value="">
					</div>
               </div>
              

	</fieldset>      <!-- end of fieldset -->
    <fieldset>
		<legend>Educational Background</legend>
		<div class="row">
		<div class="form-inline col-md-3">
						<label for="formerInstitution">Former Institution's Name</label>
	<input type="text" class="form-control"	id = "formerInstitution" name ="formerInstitution" placeholder="Institution" value="">
					</div>
					<div class="form-inline col-md-1"></div>
					<div class="form-inline col-md-3">
						<label for="classtoJoin">Class to Join</label>
	<input type="text" class="form-control" id ="classtoJoin" name = "classtoJoin"	placeholder="Class in Numbers" value="">
					</div>
					<div class="form-inline col-md-1"></div>
					<div class="form-inline col-md-3">
			<label for="Passport">Attach Student Passport Photo</label>
    <table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
	<tbody><tr>
	<td>
    <img id="blah" src="#" alt="" />
    <input  name="uploadedimage" type="file" onchange="readURL(this);" />
    </td>
    </tr>
	<tr>
	<td>
    </td>
	</tr>
	</tbody></table>
    
    </div>
    <div class="form-inline col-md-1"></div>
    </div>  <!-- end of row -->
	</fieldset> <!-- end of fieldset -->
	<fieldset>
		<legend>Parent's Details</legend>
		<div class="row">
			<div class="form-inline col-md-2">
						<label for="parentName">Parent's Name</label>
<input type="text" class="form-control" id ="parentName" name ="parentName"	placeholder="Parent" value="">
					</div>
<div class="form-inline col-md-1"></div>
<div class="form-inline col-md-2">
						<label for="mobileNumber">Mobile Number</label>
<input type="text" class="form-control" id ="mobileNumber" name ="mobileNumber"	placeholder="Phone" value="">
					</div>
<div class="form-inline col-md-1"></div>
<div class="form-inline col-md-2">
						<label for="email">Email Address</label>
<input type="email" class="form-control" id ="email" name ="email" placeholder="username@domain.com"  value="<?php echo htmlspecialchars($_POST['email']); ?>">  <?php echo "<p class='text-danger'>$errEmail</p>";?>
					</div>
<div class="form-inline col-md-1"></div>
<div class="form-inline col-md-3">
						<label for="County">Current Residence (County)</label>
<input type="text" class="form-control"	id ="County" name ="County" placeholder="Resident County" value="">
					</div>
				</div>
	</fieldset>       <!-- end of fieldset -->
    <fieldset>
    <br>
<div class="row">
<div class="form-inline col-md-3"><input type="submit" class="btn btn-info" value="Submit"></div>
<div class="form-inline col-md-3"> <?php echo $result; ?>  </div>
<div class="form-inline col-md-3"></div>
<div class="form-inline col-md-3"> <input type="reset" class="btn btn-info" value="Reset" onclick="resetForm('myFormId'); return false;" /></div>  
</div>
</fieldset>

</form>
</div> <!-- end of container -->

<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>