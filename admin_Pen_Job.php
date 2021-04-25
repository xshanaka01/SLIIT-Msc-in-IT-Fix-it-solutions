<?php
include('dbconfig.php');

//check whether user login with session 
if (isset($_SESSION['userType'])and $_SESSION['userType']=="H" ) {  


// check before user type session
			if (isset($_SESSION['userType'])) {
		
		
					$userType=$_SESSION['userType'];
			
						}
				else{
					$userType="";
			}    
  

//check before Display Name session
    	if (isset($_SESSION['displayName'])) {
		
		
		$displayName=$_SESSION['displayName'];
		
		
		}
            else{
                $displayName="";
}            
             
//check before title session
    	if (isset($_SESSION['title'])) {		
		
		$title=$_SESSION['title'];		
		
		}

        else{
             $title="";
            }
            
            
//check before pic  session
    	if (isset($_SESSION['pic'])) {
		
		
		$pic=$_SESSION['pic'];
		
		
		}

        else{
             $pic="";
            }

 if (isset($_POST['submit'])) { 
 

	
$helpdesk_officer=$_POST['helpdesk_officer'];
$job_no=$_POST['job_no'];
date_default_timezone_set("Asia/colombo");
	
$date=date("Y-m-d H:i:s");
$report_at_id=$_SESSION['report_at'];

$sql_update="UPDATE tbl_jobs SET job_status='2',it_officer_code='$helpdesk_officer',assign_H_user='$report_at_id',assign_date='$date' WHERE job_no=$job_no";	

//$sql_insert="INSERT INTO tbl_jobs(job_status,it_officer_code,assign_date) VALUES ('2','$helpdesk_officer','$date')WHERE job_no=$job_no";		

mysqli_query($conn,$sql_update);

 
}





?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BOI|Help Desk System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/dashboard.css" rel="stylesheet">
  
  <script src="vendor/jquery/jquery220.min.js"></script>
    <script src="vendor/jquery/bootstrap336.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap336.min.js"></script>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


	   
	  
<script>
  function showData() {    
  
			var certNo1 = document.getElementById('f_date').value;
			var folioNo1 = document.getElementById('l_date').value;
			

			   if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	                xmlhttp = new XMLHttpRequest();
	            } else {
	                // code for IE6, IE5
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            xmlhttp.onreadystatechange = function () {
	                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtData").innerHTML = xmlhttp.responseText;
	                }
	            }
	           // xmlhttp.open("GET", "cds_true.php?q=" + certNo.value, true);
				
				xmlhttp.open ("GET", "job_NO.php?certNo="+certNo1+"&folioNo="+folioNo1, true)
				 //xmlhttp.open("GET", "cds_true.php?S=" + folioNo.value, true);
	            xmlhttp.send();
		
				 }
</script> 
	   
	   
	   
	   
	   
       <script type="text/javascript">
            function infoPage(cardno){
            var main = document.getElementById('mainPage');
            var info = document.getElementById('infoPage');
            var cardno = cardno;
            
            main.style.display = "none";
            info.style.display = "block";
            
	            if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	                xmlhttp = new XMLHttpRequest();
	            } else {
	                // code for IE6, IE5
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            xmlhttp.onreadystatechange = function () {
	                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                    document.getElementById("info").innerHTML = xmlhttp.responseText;
	                }
	            }
	            xmlhttp.open("GET", "job_InfoPage.php?cardno=" + cardno, true);
	            xmlhttp.send();
            }
       </script> 
   

   
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <?php include('navbar.php'); ?> 
  
  <!-- ------------------------------------------------------------------------------------------------------- -->
  <div class="content-wrapper">
  
   <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pending Jobs / Helpdesk Officer</li>
								<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
</div>
      </ol>

    
	   
	<div id="mainPage">
	      <center>
					<?php
					$sql1 ="SELECT job_no,title,f_name,l_name, date_enter , fault_description
							FROM tbl_jobs a, tbl_users b ,tbl_faults c
							WHERE
							a.report_at = b.user_code and a.fault_reqt=c.fault_code
							and  job_status='1'";

					
					$result2= mysqli_query($conn,$sql1);

					if ($result2->num_rows > 0) {
						echo"<center>";
						echo '<table class="table table-hover table-condensed" style="width:800px;">';
						echo "<th> Job No </th> <th> Reported User</th> <th> Job Log Date</th>";
						
						while ($row = $result2->fetch_assoc()){
							
						echo "<tr>";
						echo "	<td><a style='text-decoration: none;' href='javascript:infoPage(\"" . $row['job_no'] . "\")'>" . $row['job_no'] ."</a> </td>	
								<td><a style='text-decoration: none;' href='javascript:infoPage(\"" . $row['job_no'] . "\")'>" . $row['title'] ." ".  $row['f_name'] ." ". $row['l_name'] .".</a></td>   
													<td><a style='text-decoration: none;' href='javascript:infoPage(\"" . $row['job_no'] . "\")'>" . $row['date_enter'] ."</a></td>														";
						echo "</tr>";
						}

						echo "</table>";


						echo"</center>";


					} else {
					  echo "<center>No any Pending Jobs Found</center>";  
					}
						   

					   
					   
					   ?>
             </center>      
            
			<div id="txtData" style=""><b></b></div>	
		</div>
   
   
   
   
   
   
   
   
	   
	  <!-- body -->    

    <div class="card-body"  >
    <div id="infoPage" class="animated slideInRight">
    <div id="info"></div>
	
	
	 
	
	
	
	

    </div>
	      

	
    </div>
		

		
		
		
		
		
		
		
		
		
		
		
		
		

  
  
  </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright @ BOI | IT Department 2021</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
         <center>   <h5 class="modal-title" id="exampleModalLabel">Logout</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         <center> <div class="modal-body">Are you sure you want to logout?</div></center>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
	
	



	
<script>  
   $('#username').blur(function(){

     var username = $(this).val();

	if(username != ""){
     $.ajax({
      url:'check.php',
      method:"POST",
      data:{UserName1:username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Username is already exist</span>');
        $('#register').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Username is not Available</span>');
        $('#register').attr("disabled", false);
       }
      }
     })
	} else {
		$('#availability').html('');
		$('#availability').html('');
		$('#register').attr("disabled", true);
	}

  });
 
 
 
</script>

<script> 

function checkValidations()
{
   
            var f =document.getElementById("fristName").value ;
        if(f=="")
          {``
          document.getElementById("frist").innerHTML="Frist Name is empty";
          
          }  
        else
          document.getElementById("frist").innerHTML="";
    
    
    
       var l =document.getElementById("lastName").value ;
            
          if(l=="")
          {
          document.getElementById("last").innerHTML="Last Name is empty";
         
          }   
         else
          document.getElementById("last").innerHTML="";
    
    
    
    
        var dis =document.getElementById("displayName").value ;
            
          if(dis=="")
          {
          document.getElementById("dis").innerHTML="Display Name is empty";
         
          }   
         else
          document.getElementById("dis").innerHTML="";
      
      
    
          var em =document.getElementById("email").value ;
            
          if(em=="")
          {
          document.getElementById("emailmsg").innerHTML="Email is empty";
         
          }   
         else
          document.getElementById("emailmsg").innerHTML="";
    
    
    
    
           var us =document.getElementById("username").value ;
            
          if(us=="")
          {
          document.getElementById("usmsg").innerHTML="User Name is empty";
         
          }   
         else
          document.getElementById("usmsg").innerHTML="";
    
    
        var ab =document.getElementById("contactNo").value ;
        if(ab=="")
          {
          document.getElementById("conmsg").innerHTML="contact number is empty";
           
        }
         else if(isNaN(ab))
        {
          document.getElementById("conmsg").innerHTML="Enter valid contact number";
          return false ;
        } 
        
        else if(ab.length==10 && ab.charAt(0)==0 )  {
              document.getElementById("conmsg").innerHTML="";
          return true ;
        }
        
        else if(ab.length==12 && ab.charAt(0)=='+' )  {
            document.getElementById("conmsg").innerHTML="";
           return true ;
        }
        else{ 
          document.getElementById("conmsg").innerHTML="Enter valid contact number";
          return false ;
      }      
       
    
    
    
    
    
    
    
    
    
    
    
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
	

	if(pass1.value != "" || pass2.value != ""){
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = ""
        return true;
        
    }

	else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        return false;
        
    }
	}
    
   
  
       
   
       
       
       
       
       
       
}  
	
</script>

   <!-- image validation-->
<script>	
function validateImage() {
    var formData = new FormData();
 
    var file = document.getElementById("img").files[0];
 var file1 = document.getElementById("img");
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();

    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
	document.getElementById("img").value = '';
	document.getElementById('valid_msg').innerHTML="Not a Valid file type";
       
        return false;
		
		
    }
    	

    if (file.size > 102400) {
        document.getElementById("img").value = '';
        document.getElementById('valid_msg').innerHTML="Reach Upload Maxsize 100KB";
        
        return false;
    }
		else
	{
	document.getElementById('valid_msg').innerHTML="";
	
	
	}
	

    return true;
    
}





        
        
</script>	
	

	
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
  

</body>

</html>

 <?php 
        
    }
         
    else{
        header("location:index.php");
    }
         
    ?>  
  




	
	




	   
	      
    
















