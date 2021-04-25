<?php
include('dbconfig.php') ;

//check whether user login with session 
if (isset($_SESSION['userType'])and $_SESSION['userType']!="V" ) {  
 
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

  
//view the fault option list(select from database)
$sql_faults= "SELECT * FROM `tbl_faults` where faults_type='SYS'";
$faults_rst=mysqli_query($conn,$sql_faults);

//view the equipments_types list

$sql_tbl_equipments_type= "SELECT * FROM `tbl_equipments_type`";
$tbl_equipments_type_rst=mysqli_query($conn,$sql_tbl_equipments_type);


?>
 

<!DOCTYPE html>
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
  <script>
function showData() {
           
                
                var s = document.getElementById('equipments_types');
                //alert(l.value + " and " + d.value);
                if(s){
                   if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	                xmlhttp = new XMLHttpRequest();
	            } else {
	                // code for IE6, IE5
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            xmlhttp.onreadystatechange = function () {
	                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                    document.getElementById("Faults_Data").innerHTML = xmlhttp.responseText;
	                }
	            }
	            xmlhttp.open("GET", "load_faults_type.php?q=" + s.value, true);
	            xmlhttp.send(); 
                }
	    }
		
		
		
       </script>


  <script src="vendor/jquery/jquery220.min.js"></script>
    <script src="vendor/jquery/bootstrap336.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap336.min.js"></script>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

   <?php include('navbar.php'); ?> 
  
  
  
  

  
  
  
  <!-- --------------------------------------------------------------------------------------------------------->
  <div class="content-wrapper">
  
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create New Job </li>
		<div align="right">

		
		</ol>

     <div class="card-header">New Ticket </div>
      
       <div class="card-body"  >
        <form   method="post" name="frmChange"  action="job_submit.php">           		   
          <div class="form-group">		   
				<div class="form-row">
						<div class="col-md-10">
								<div class="form-row">
									<div class="col-md-4">                 
										<center>Item Name </center>
									</div>			
									<div class="col-md-5">                                             
										<select name="equipments_types" id="equipments_types" class="form-control" onchange="showData(); myFunction()" >
										<option value=""> Select Item*  </option>
											<?php 	while($row_equipments_type =mysqli_fetch_array($tbl_equipments_type_rst)):;			 ?>											  
                                                      <option value ="<?php 	echo $row_equipments_type[0] ;			 ?>"><?php  	echo $row_equipments_type[1] ;			 ?> </option>
                                             <?php  	endwhile;	?>	
                          				</select>          
                                  	</div> 		  
									</div> 
									</br> </br>
									
		<!-- Load falits deatails from load_faults_type -->	  
		<div  id="Faults_Data">	  </div>
		
								<center>					
							<div id="txtDatadd">
		             <?php 
                        if (isset($_SESSION['message_sucdepo']))
							{ 
							echo  " <span style='color:green; background-color:'>"."<b> " .
									"...Ticket Created Successfully ... </br>"; 
							echo "Job No :- ".$_SESSION['message_sucdepo'];
							unset($_SESSION['message_sucdepo']); 

							}

						?> </b>
								</span>
							</div>	
						</center>	
		
			  
						</div>
			
						<div class="col-md-2">
						</br>

							<div id='CPU' style="display: none">
							<img src="images/systemPng/CPU.png" alt="Smiley face" height="150" width="150">
							 </div>	
							 
 							<div id='PRI' style="display: none">
							<img src="images/systemPng/PRI.png" alt="Smiley face" height="150" width="150">
							 </div>							
							 
							 <div id='MOU' style="display: none">
							<img src="images/systemPng/MOU.png" alt="Smiley face" height="150" width="150">
							 </div>							
							 
							 <div id='MON'style="display: none">
							<img src="images/systemPng/MON.png" alt="Smiley face" height="150" width="150">
							 </div>							
							 
							 <div id='SCA'style="display: none">
							<img src="images/systemPng/SCA.png" alt="Smiley face" height="150" width="150">
							 </div>		
							 
							 <div id='LAP'style="display: none">
							<img src="images/systemPng/LAP.png" alt="Smiley face" height="150" width="150">
							 </div>							
							
							<div id='UPS'style="display: none">
							<img src="images/systemPng/UPS.png" alt="Smiley face" height="150" width="150">
							 </div>

							<div id='KEY' style="display: none">
							<img src="images/systemPng/KEY.png" alt="Smiley face" height="150" width="150">
							 </div>
							 
							<div id='NET' style="display: none">
							<img src="images/systemPng/NET.png" alt="Smiley face" height="150" width="150">
							 </div>

							<div id='SYS' style="display: none">
							<img src="images/systemPng/SYS.png" alt="Smiley face" height="150" width="150">
							 </div>

							
              			</div> 	

                 
				</div>
 
         </div>
	
		
            
        </form>
		 
        </div>

      
     
     
     
      

    </div>
	
	
	
	
	
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small> Copyright &copy; BOI | IT Department 2021</small>
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
function myFunction(){
var div =document.getElementById("equipments_types").value;

 if(div=="CPU"){
	 
	 document.getElementById("CPU").style.display = "block";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
	 
 }
 else if (div=="KEY"){
	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "block";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
}
 
 else if (div=="LAP"){
	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "block";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
} 
 
 else if (div=="MON"){
	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "block";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
} 

 
 else if (div=="MOU"){
	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "block";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
} 
 else if (div=="PRI"){
	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "block";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
}  
 else if (div=="UPS"){
	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "block";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
}  
  else if (div=="SCA"){
	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "block";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
}  
  else if (div=="NET") {
  	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "block";
	 document.getElementById("SYS").style.display = "none";
  
  }
  
   else if (div=="SYS") {
  	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "block";
  
  }
    else if (div=="") {
  	 document.getElementById("CPU").style.display = "none";
	 document.getElementById("KEY").style.display = "none";
	 document.getElementById("LAP").style.display = "none";
	 document.getElementById("MON").style.display = "none";
	 document.getElementById("MOU").style.display = "none";
	 document.getElementById("PRI").style.display = "none";
	 document.getElementById("UPS").style.display = "none";
	 document.getElementById("SCA").style.display = "none";
	 document.getElementById("NET").style.display = "none";
	 document.getElementById("SYS").style.display = "none";
  
  }
 
 
}
</script>

<script> 

function checkValidations()
{
	var equip_types=document.getElementById("equipments_types").value;
	var fault_value=document.getElementById("fault").value;
	if(equip_types==""){
		alert("Select Item" );
		 return false ;
	}
	else if(fault_value==""){
		alert("Select Fault Category" );
		 return false ;
		
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
  // bottem page html       
    }
         
    else{
        header("location:index.php");
    }
         
    ?>  
