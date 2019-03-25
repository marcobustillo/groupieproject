<html>
<head> 
  <link rel="stylesheet" href= "<?php echo base_url('assets/css/survey.css');?>"> 
	<script>
	$('.datepicker').pickadate({
	     selectMonths: true, // Creates a dropdown to control month
	     selectYears: 15 // Creates a dropdown of 15 years to control year
	});
	</script>
  <script>
  $(document).ready(function() {
      $(".dropdown-button").dropdown();

  });
  
  </script>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <span class="brand-logo center">Graduates Tracer</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li class="college_label"><span class="flow-text">College of Science &nbsp;</span></li>
            </ul>
        </div>
    </nav>
	  <div class="container">
	  	  <form action="#!" method="POST">
	  	      <p class="flow-text">I. PERSONAL INFORMATION</p>
	          <p class="thick">1.) Name</p>
	          <div class="row">
		            <div class="col s12">
		                <div class="row">
		                    <div class="input-field col s4">
		                        <input disabled value="Last Name" id="last_name" type="text" class="invalid">
		                        <label for="last_name">Last Name</label>
		                    </div>
		                    <div class="input-field col s4">
		                        <input disabled value="First Name" id="first_name" type="text" class="invalid">
		                        <label for="first_name">First Name</label>
		                    </div>
		                    <div class="input-field col s4">
              		          <input disabled value="Middle or Maiden Name" id="middle_name" type="text" class="invalid">
              		          <label for="middle_name">Middle or Maiden Name</label>
		                    </div>
		                </div>
		            </div>
      	    </div>
	          <div>
                <p>2.) Mailing Address:</p>
                <div class="input-field">
                    <input id="email" type="text" class="validate">
                    <label></label>
                </div>
            </div>
            <div>
                <p>3.) Sex:</p> 
		            <div class="col s12">
		                <div class="row">
		                    <div class="input-field col s3">
		                        <input class="with-gap" name="sex" type="radio" id="Male" />
    			                  <label for="Male">Male</label>
		                    </div>
		                    <div class="input-field col s3">
		                        <input class="with-gap" name="sex" type="radio" id="Female" />
    			                  <label for="Female">Female</label>
		                    </div>      
		                </div>  
		            </div>
	          </div>
	          <div>
                <p>4.) Date of Birth:</p>
                <div class="input-field">
                    <input type="date" class="datepicker">
                </div>	  	
	          </div>        
            <div>
        	      <p>5.) Civil Status:</p> 
      	        <div class="col s12">
		                <div class="row">
            		        <div class="input-field col s3">
            		            <input name="civil_status" type="radio" id="Single" />
                			      <label for="Single">Single</label>
            		        </div>
		                    <div class="input-field col s3">
		                        <input name="civil_status" type="radio" id="Married" />
    			                  <label for="Married">Married</label>
		                    </div>
            		        <div class="input-field col s3">
            		            <input name="civil_status" type="radio" id="Separated/Divorced" />
                			      <label for="Separated/Divorced">Separated/Divorced</label>
            		        </div>
		                    <div class="input-field col s3">
		                        <input name="civil_status" type="radio" id="Widowed" />
    			                  <label for="Widowed">Widowed</label>
		                    </div>            
		                </div>
		            </div>
            </div>
            <div>
      	        <p>6.) Course Completed:</p>
      	            <div class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <ul id="dropdown1" class="dropdown-content">
                                    <li><a href="#!">College Courses</a></li>
                                    <li><a href="#!">College Courses</a></li>
                                    <li><a href="#!">College Courses</a></li>
                                </ul>
                                <a name="course_completed" class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown1"><i class="material-icons right">arrow_drop_down</i></a>
                                <label for="course_completed">Course Completed</label> <!-- not editable -->
                            </div>
                            <div class="input-field col s6">
                                <input id="year_completed" type="number" class="validate" min="1997" max="2017">
                                <label for="year_completed">Year Completed</label> <!-- 1970 to current year -->
                            </div>
                        </div>
                    </div>
            </div>
            <div>
      	        <p>7.) Current Contact</p>
      	        <div>
      		          <table>
                  			<tr>
                  				  <th>Numbers/Info</th>
                  				  <th>Home</th>
                  				  <th>Office</th>
                  			</tr>
      			            <tr>
                    				<th>Landline Phone Number</th>
                    				<td> 
                                <div class="input-field">
                    					      <input id="home_landline_number" type="number" class="validate">
                                </div>
                       			</td>	
                    				<td>
                                <div class="input-field">
                                    <input id="office_landline_number" type="number" class="validate">
                                </div>	
                    				</td>
                    		</tr>
      			            <tr>
                  				  <th>Cellular Phone Number</th>
                  				  <td> 
                                <div class="input-field">
                                    <input id="home_cell_number" type="number" class="validate">
                                </div>                  					
                     			  </td>	
                  				  <td>
                                <div class="input-field"> 
                                    <input id="office_cell_number" type="number" class="validate">
                                </div>	
                  				  </td>
                  			</tr>
                  			<tr>
                  				  <th>e-Mail Address</th>
                  				  <td>
                                <div class="input-field">
                                    <input id="home_email" type="email" class="validate">
                                </div>
                            </td>	
                  				  <td>
                                <div class="input-field">
                                    <input id="cell_email" type="email" class="validate">
                                </div>
                            </td>
                  			</tr>
      		          </table>
      	        </div>
            </div>
            <div>
      	        <p class="flow-text">II. Graduate Studies Information</p>
                <div>
          	        <p>Did you pursue your graduate studies?</p>   
          	            <div class="col s12">
    		                    <div class="row">
                		            <div class="input-field col s3">
                		                <input name="graduate_study" type="radio" id="Yes1" />
                    			          <label for="Yes1">Yes</label>
    		                        </div> 
    		                        <div class="input-field col s3">
    		                            <input name="graduate_study" type="radio" id="No1" />
        			                      <label for="No1">No, Proceed to III</label>
    		                        </div>     
    		                    </div>
    		                </div>
                </div>
            </div>
            <div>
      	        <table>
      		          <tr>
                  			<th><p>Level</p></th>
                  			<th><p>Course</p></th>
                  			<th><p>Duration<br>(Year Started - Year Graduated)</p></th>
                  			<th><p>Name of Scholarship(if any)</p></th>
                  	</tr>
      		          <tr>
      			            <th><p>Masters</p></th>
      			            <td>
                            <div class="row">
                              <div class="col s12">
                                <input id="master_course" type="text" class="validate">
                              </div>
                            </div>
                        </td>
      			            <td>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s5"> 
                                        <input name="duration_started" type="number" class="validate" min="1970" max="2017">                                  
                                    </div>
                                    <div class="col s5"> 
                                        <input name="duration_graduated" type="number" class="validate" min="1970" max="2017">
                                    </div>
                                </div>
                            </div>      
                        </td>
                  			<td>
                            <div class="row">
                                <div class="col s12">
                                    <input id="master_scholarship" type="text" class="validate">
                                </div>
                            </div>
                        </td>
      		          </tr>
      		          <tr>
      		  	          <th><p>Doctorate</p></th>
      			            <td>
                            <div class="row">
                                <div class="col s12">
                                    <input id="master_course" type="text" class="validate">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s5"> 
                                        <input name="duration_started" type="number" class="validate" min="1970" max="2017">                                       
                                    </div>
                                    <div class="col s5"> 
                                        <input name="duration_graduated" type="number" class="validate" min="1970" max="2017">
                                    </div>
                                </div>
                            </div>      
                        </td>
                        <td>
                            <div class="row">
                                <div class="col s12">
                                    <input id="master_scholarship" type="text" class="validate">
                                </div>
                            </div>
                        </td>
      		          </tr>
      		          <tr>
      			            <th>
                            <p>Post-doctorate</p>
                        </th>
      			            <td>
                            <div class="row">
                                <div class="col s12">
                                    <input id="master_course" type="text" class="validate">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s5"> 
                                        <input name="duration_started" type="number" class="validate" min="1970" max="2017">                                   
                                    </div>
                                    <div class="col s5"> 
                                        <input name="duration_graduated" type="number" class="validate" min="1970" max="2017">
                                    </div>
                                </div>
                            </div>      
                        </td>
                        <td>
                            <div class="row">
                                <div class="col s12">
                                    <input id="master_scholarship" type="text" class="validate">
                                </div>
                            </div>
                        </td>
      		          </tr>
      	        </table>
            </div>
            <div>
      	        <p class="flow-text">III. Career/Current Employment Information</p>
            </div>
            <div>
                <p>1.) Current Employment Information</p>
      	        <div class="col s12">
		                <div class="row">
		                    <div class="input-field col s2">
		                        <input name="employment_info" type="radio" id="employed_locally" />
    			                  <label for="employed_locally">Employed,Locally</label>
		                    </div>
        		            <div class="input-field col s2">
        		                <input name="employment_info" type="radio" id="employed_abroad" />
            			          <label for="employed_abroad">Employed,Abroad</label>
        		            </div>
		                    <div class="input-field col s4">
		                        <input name="employment_info" type="radio" id="self_employed" />
    			                  <label for="self_employed">Self-Employed since</label>
    			                  <input id="self_employed" type="number" class="validate" min="1970" max="2017"><!-- 1970 to current year -->
		                    </div>
            		        <div class="input-field col s2">
            		            <input name="employment_info" type="radio" id="Unemployed" />
                			      <label for="Unemployed">Unemployed</label>
            		        </div>            
		                </div>
		            </div>
            </div>
            <div>
                <p>
                    2.) For those who are currently employed (locally & abroad)<br>
                    2.1 Occupation:
                </p>	
                  	<div class="col s12">
            		        <div class="row">
            		            <div class="input-field col s3">
                    		        <input name="occupation" type="radio" id="Programmer" />
                        			  <label for="Programmer">Programmer</label><br>
                        			  <input name="occupation" type="radio" id="Web Developer" />
                        			  <label for="Web Developer">Web Developer</label><br>
                        			  <input name="occupation" type="radio" id="System Analyst" />
                        			  <label for="System Analyst">System Analyst</label>
            		            </div>
            		            <div class="input-field col s3">
                  		          <input name="occupation" type="radio" id="Animator" />
                      			    <label for="Animator">Animator</label><br>
                      			    <input name="occupation" type="radio" id="Mobile Programmer" />
                      			    <label for="Mobile Programmer">Mobile Programmer</label><br>
                      			    <input name="occupation" type="radio" id="Game Developer" />
                      			    <label for="Game Developer">Game Developer</label>
		                        </div>
                		        <div class="input-field col s3">
                		            <input name="occupation" type="radio" id="Network Admin" />
                    			      <label for="Network Admin">Network Admin</label><br>
                    			      <input name="occupation" type="radio" id="Database Admin" />
                    			      <label for="Database Admin">Database Admin</label><br>
                    			      <input name="occupation" type="radio" id="Software Engineer" />
                    			      <label for="Software Engineer">Software Engineer</label>
                		        </div>
                		        <div class="input-field col s3">
                		            <input name="occupation" type="radio" id="Researcher" />
                    			      <label for="Researcher">Researcher</label><br>
                    			      <input name="occupation" type="radio" id="Educator" />
                    			      <label for="Educator">Educator</label><br>
                    			      <input name="occupation" type="radio" id="IT Support" />
                    			      <label for="IT Support">IT Support</label>
                		        </div>            
		                    </div>
		                </div>
                </div>
                <div>
                    <p>2.2 Sector (Check One):</p>
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s2">
                                <input name="sector" type="radio" id="Government" />
                                <label for="Government">Government</label>
                            </div>
                            <div class="input-field col s2">  
                                <input name="sector" type="radio" id="Private" />
                                <label for="Private">Private</label>
                            </div>
                            <div class="input-field col s2">
                                <input name="sector" type="radio" id="NGO/Foundation" />
                                <label for="NGO/Foundation">NGO/Foundation</label> 
                            </div>
                            <div class="input-field col s2">
                                <input name="sector" type="radio" id="Academe" />
                                <label for="Academe">Academe</label>
                            </div>     
                            <div class="input-field col s2">
                                <input name="sector" type="radio" id="Others" />
                                <label for="Others">Others</label>
                            </div>         
                        </div>
                    </div>
                </div>
                <div>
                    <p>2.4 is current job related to graduate academic training?</p>
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s3">
                                    <input name="job_related" type="radio" id="Yes2" />
                                    <label for="Yes2">Yes</label>
                                </div>
                                <div class="input-field col s3">
                                    <input name="job_related" type="radio" id="No2" />
                                    <label for="No2">No</label>
                                </div>      
                            </div>
                        </div>
                </div>
                <div>
                    <p>2.5 Current Position/Designation:</p>
                        <div class="input-field inline">
                            <input id="position" type="text" class="validate">                  
                        </div>
                </div>
                <div>
                    <p>2.6 Basic Salary per month(in pesos):</p>
                    <div class="input-field inline">
                        <input id="salary" type="number" class="validate" min="0">  
                    </div>         
                </div>
                <div>
                    <p>
                        3.) For those who are currently employed/ self-employed
                    </p>                                         
                    <div class="row">
                        <div class="input-field inline col s12">
                            <p>3.1 Name of Company:</p>
                            <input id="company_name" type="text" class="validate">           
                        </div>               
                        <div class="input-field inline col s12">
                            <p>3.2 Address of Company:</p>
                            <input id="company_address" type="text" class="validate">           
                        </div>
                    </div>
                </div>
                <div>
                    <p>
                        4.) For those who are currently unemployed<br>
                        4.1 Reason(s) for unemployment
                    </p>               
                </div>
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s5">
                            <input name="reason" type="checkbox" id="graduate_studies" />
                            <label for="graduate_studies">Pursuing Graduate Studies</label><br>
                            <input name="reason" type="checkbox" id="resigned" />
                            <label for="resigned">Recently resigned and still looking for a new job</label><br>
                            <input name="reason" type="checkbox" id="planning_abroad" />
                            <label for="planning_abroad">Planning/Preparing to work abroad</label>
                        </div>
                        <div class="input-field col s5">
                            <input name="reason" type="checkbox" id="endo" />
                            <label for="endo">End of contract and now looking for a new job</label><br>
                            <input name="reason" type="checkbox" id="family_matters" />
                            <label for="family_matters">Family/Personal matters</label><br>
                            <input name="reason" type="checkbox" id="Retrenchment" />
                            <label for="Retrenchment">Retrenchment</label><br>
                            <input name="reason" type="checkbox" id="other_reasons" />
                            <label for="other_reasons">Others</label>
                        </div>  
                    </div>
                </div>
                <div>
                    <p> 5.) Employment History (Start with the most recent aside from current employment)</p>
                    <table>
                        <th>
                            <tr>
                                <th><p>Position</p></th>
                                <th><p>Inclusive Period of Employment</p></th>
                                <th><p>Is Job Related to Acad Training</p></th>
                                <th><p>Company Name/Address</p></th>
                                <th><p>Government</p></th>
                                <th><p>Private</p></th>
                                <th><p>Last Basic Salary/Month(in Pesos)</p></th>
                            </tr>
                        </th>            
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_position[]" type="text" class="validate">  
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5"> 
                                            <input id="duration_started[]" name="duration_started" type="number" class="validate" min="1970">                    
                                        </div>
                                        <div class="col s5"> 
                                            <input id="duration_graduated[]" type="number" class="validate" min="1970" max="2017">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5">
                                            <input name="job_related" type="radio" id="YesRelated[]" />
                                            <label for="YesRelated[]">Yes</label>
                                        </div>
                                        <div class="col s5">
                                          <input name="job_related" type="radio" id="NotRelated[]" />
                                          <label for="NotRelated[]">No</label>
                                        </div>
                                    </div>
                                </div>         
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="company_name_address[]" type="text" class="validate">
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="gov[]"/><label for="gov"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="priv[]"/><label for="priv"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_salary[]" type="number" class="validate">
                                    </div>
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_position[]" type="text" class="validate">  
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5"> 
                                            <input id="duration_started[]" name="duration_started" type="number" class="validate" min="1970">                    
                                        </div>
                                        <div class="col s5"> 
                                            <input id="duration_graduated[]" type="number" class="validate" min="1970" max="2017">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5">
                                            <input name="job_related" type="radio" id="YesRelated[]" />
                                            <label for="YesRelated[]">Yes</label>
                                        </div>
                                        <div class="col s5">
                                          <input name="job_related" type="radio" id="NotRelated[]" />
                                          <label for="NotRelated[]">No</label>
                                        </div>
                                    </div>
                                </div>         
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="company_name_address[]" type="text" class="validate">
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="gov[]"/><label for="gov"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="priv[]"/><label for="priv"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_salary[]" type="number" class="validate">
                                    </div>
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_position[]" type="text" class="validate">  
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5"> 
                                            <input id="duration_started[]" name="duration_started" type="number" class="validate" min="1970">                    
                                        </div>
                                        <div class="col s5"> 
                                            <input id="duration_graduated[]" type="number" class="validate" min="1970" max="2017">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5">
                                            <input name="job_related" type="radio" id="YesRelated[]" />
                                            <label for="YesRelated[]">Yes</label>
                                        </div>
                                        <div class="col s5">
                                          <input name="job_related" type="radio" id="NotRelated[]" />
                                          <label for="NotRelated[]">No</label>
                                        </div>
                                    </div>
                                </div>         
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="company_name_address[]" type="text" class="validate">
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="gov[]"/><label for="gov"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="priv[]"/><label for="priv"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_salary[]" type="number" class="validate">
                                    </div>
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_position[]" type="text" class="validate">  
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5"> 
                                            <input id="duration_started[]" name="duration_started" type="number" class="validate" min="1970">                    
                                        </div>
                                        <div class="col s5"> 
                                            <input id="duration_graduated[]" type="number" class="validate" min="1970" max="2017">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5">
                                            <input name="job_related" type="radio" id="YesRelated[]" />
                                            <label for="YesRelated[]">Yes</label>
                                        </div>
                                        <div class="col s5">
                                          <input name="job_related" type="radio" id="NotRelated[]" />
                                          <label for="NotRelated[]">No</label>
                                        </div>
                                    </div>
                                </div>         
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="company_name_address[]" type="text" class="validate">
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="gov[]"/><label for="gov"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="priv[]"/><label for="priv"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_salary[]" type="number" class="validate">
                                    </div>
                                </div> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_position[]" type="text" class="validate">  
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5"> 
                                            <input id="duration_started[]" name="duration_started" type="number" class="validate" min="1970">                    
                                        </div>
                                        <div class="col s5"> 
                                            <input id="duration_graduated[]" type="number" class="validate" min="1970" max="2017">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s5">
                                            <input name="job_related" type="radio" id="YesRelated[]" />
                                            <label for="YesRelated[]">Yes</label>
                                        </div>
                                        <div class="col s5">
                                          <input name="job_related" type="radio" id="NotRelated[]" />
                                          <label for="NotRelated[]">No</label>
                                        </div>
                                    </div>
                                </div>         
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="company_name_address[]" type="text" class="validate">
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="gov[]"/><label for="gov"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input name="comp_sec" type="radio" id="priv[]"/><label for="priv"></label>
                                    </div>
                                </div> 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col s12">
                                        <input id="history_salary[]" type="number" class="validate">
                                    </div>
                                </div> 
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    <p>6.) Professional Advancement</p>   
                    <table>
                        <th>
                            <tr>
                                <th><p>Title of Trainings/Seminar</p></th>
                                <th><p>Date</p></th>
                                <th><p>Sponsor</p></th>  
                            </tr>
                        </th>
                        <tr>
                            <td><input id="trainings[]" type="text" class="validate"></td>  
                            <td><input id="Training_date[]"type="date" class="datepicker"></td>
                            <td><input id="sponsor[]" type="text" class="validate"></td>
                        </tr>   
                    </table>
                </div>
                <div>
                    <p>7.) Suggestions to improve the present curriculum:</p>
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="suggestion" class="materialize-textarea"></textarea>
                                        <label for="suggestion"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div>
                    <div class="row">
                        <button class="btn waves-effect waves-light red col s12" type="submit" name="action">Submit<i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>