<?php
$q = $_GET["q"];
include('dbconfig.php');
if (isset($_SESSION['userType'])) {  

$sql_faults = "SELECT * FROM `tbl_faults` where faults_type like'$q%'";
$faults_rst=mysqli_query($conn,$sql_faults);
if ($faults_rst->num_rows > 0) {
?>	
		<div class="form-row">
			<div class="col-md-4">                 
				<center>Fault Category </center>
			</div>			
						<div class="col-md-5">
							<select name="fault" id="fault"  class="form-control"  onmousedown="if(this.options.length>8){this.size=8;}" onchange='this.size=0;' onblur="this.size=0;" >
								<option value=""> Select Fault Category*  </option>
									<?php 	while($rowFault =mysqli_fetch_array($faults_rst)):;			 ?>
										<option value ="<?php  	echo $rowFault[0] ;	?>"> <?php echo $rowFault[1] ;?> </option>
									<?php  	endwhile;	?>                                                                                                           
                            </select>  					 	 
						</div>																	
		</div> 									
	  </br> </br>
			<div class="form-row">
					<div class="col-md-4">                 
						<center>Fault Description </center>
					</div>			  		  
			  				<div class="col-md-5">                                             
								<textarea  placeholder="Describe yourself here..." class="form-control"  name="discription" >  </textarea> 
									</br></br>	
								<center>	
									<button type="submit" name="submit" class="btn btn-primary" id="register" onclick="return checkValidations();"  >Submit</button>
								</center>		 
		 			
							</div> 
						<center>					
							<div id="txtDatadd">
	
								</span>
							</div>	
						</center>	 
					</div> 
					
<?php 
}     
 
		else {
			echo "<center>No Results Found</center>";  
			}

		}
		else{
			header("location:index.php");
		}
         
 ?>  
  
 
 
 
 