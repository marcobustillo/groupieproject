<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		var ajaxResult=[];
    	$('ul.tabs').tabs('select_tab', 'Generate_Reports');
 			var ctx = $("#myChart");
			var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ["COS", "CAFA", "CLA", "COE", "CIE", "CIT"],
		        datasets: [{
		            label: 'Average Score',
		            data: [12, 19, 3, 5, 2, 3],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255,99,132,1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
			$('.dropdown-button').dropdown({
		      inDuration: 300,
		      outDuration: 225,
		      constrainWidth: false, // Does not change width of dropdown to that of the activator
		      hover: true, // Activate on hover
		      gutter: 0, // Spacing from edge
		      belowOrigin: false, // Displays dropdown below the button
		      alignment: 'left', // Displays dropdown with edge aligned to the left of button
		      stopPropagation: false // Stops event propagation
    	});
		
		$('#sendEmail').on('click',function(){
			if(ajaxResult.length == 0){
				alert('noEmail');
			}else{
				$.ajax({
					type:"POST",
					url: '<?php echo base_url('sendEmail')?>',
					data:{ajaxResult:ajaxResult},
					success:function(){
						alert('success');
					}
				});
			}
		});

		$('#dropdown1 li').on('click',function(){
			var id = $(this).attr('id');
			ajaxResult.length = 0;
			$('#college_content').empty();
			$.ajax({
				type:"POST",
				url:'<?php echo base_url('getGraduates');?>',
				data:{id:id},
				dataType:'json',
				success:function(data){
					console.log(data);
					$(data).each(function(){
						ajaxResult.push(this.accounts_email);
						$('#college_content').append($('<li>'+this.accounts_fname+'\t'+this.accounts_mname+'\t'+this.accounts_lname+'\t'+this.account_college+'</li>'
						));
					});
				},error:function(){
					alert('error');
				}
			});

		});
  });
  </script>
</head>
<body>
	<nav>
	    <div class="nav-wrapper">
	    	<div class="row">     
          		<div>
          			<a id="brandLogo" class="brand-logo center"><img src="<?php echo base_url();?>assets/images/logo1.jpg" height="64" width="70"></a>	
          		</div>		 
          		<div class="col s4 offset-s8">
          			<ul id="nav-mobile" class="right hide-on-med-and-down">		 
  		        		<li><a href="<?php echo base_url('Login/logout');?>">Log Out</a></li>          
		    		</ul>
              	</div>
		    </div>     		 
	    </div>
	</nav>
	<div class="container">
		<div class="row">
		    <div class="col s12">
			    <ul class="tabs">
			        <li class="tab col s3"><a class="black-text" href="#Generate_Reports">Generate Reports</a></li>
			        <li class="tab col s3"><a class="black-text" href="#Content_Management">Content Management</a></li>
			        <li class="tab col s3"><a class="black-text" href="#Email_Notice">Send E-mail Notice</a></li>
			    </ul>
		    </div>
		    <div id="Content_Management">
		    	<h4>CMS mo to</h4>
		    </div>
		    <div id="Generate_Reports">
		    	<canvas id="myChart" width="400" height="400"></canvas>
		    	<a target="_blank" href="<?php echo base_url('GeneratePDF');?>">Generate PDF</a>
		    </div>
		    <div id="Email_Notice">
		    	<div class="col s12">
		    		<div class="row">
		    			<h4>Send E-mail Notice</h4>
		    			<div class="input-field col s12">
	                    	<a id = "selectID" class='dropdown-button btn red col s3' href='#' data-activates='dropdown1'>Select College</a>
	                    	<a id="sendEmail" class="waves-effect waves-light btn red col s2 offset-s6"><i class="material-icons right">send</i>Send</a>
						</div>				
		    		</div>
		    	</div>
                
				<div id="dropdown_content">
					<ul id='dropdown1' class='dropdown-content'>
					    <li id="CAFA" value="CAFA">CAFA</li>
					    <li id="COS" value="COS">COS</li>
					    <li id="CIE" value="CIE">CIE</li>
					    <li id="CLA" value="CLA">CLA</li>
					    <li id="CIT" value="CIT">CIT</li>
					    <li id="COE" value="COE">COE</li>
					</ul>	
		    	</div>	

				<div id="college_content">
					<div class="col s12">
						<h4>Graduate Lists</h4>
					</div>
				</div>                           
                 
		    </div>
	  </div>
        
	</div>
</body>
</html>