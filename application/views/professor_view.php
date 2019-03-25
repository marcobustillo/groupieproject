<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href= "<?php echo base_url('assets/css/materialize.css');?>">
	<link rel="stylesheet" href= "<?php echo base_url('assets/css/professorview.css');?>">	
	
	<script src ="<?php echo base_url('assets/js/jquery-3.1.1.js');?>"></script>
	<script src ="<?php echo base_url('assets/js/materialize.js');?>"></script>
	<script>
	$(function(){
	$(".dropdown-button").dropdown();
	  });
	</script>
</head>
<body>
	<nav>
	    <div class="nav-wrapper">

     		<a href="<?php echo base_url('newsfeedcontroller/newsfeed');?>" class="brand-logo center"><img src="<?php echo base_url();?>assets/images/logo1.jpg" height="64" width="70"></a>
				
	    	<ul id="nav-mobile" class="right hide-on-med-and-down">
		        
		        
		        <li><a href="<?php echo base_url('Login/logout');?>">Log Out</a></li>

		    </ul>
	    </div>
	</nav>
	<div class="container">		
		<div class="row">
	      
	      <div class="col s4">
	      	<img class="prof_pic"src="<?php echo base_url();?>assets/images/def.jpg">
	      </div>
	      <div class="col s8">
	      	 <ul class="collection with-header">
		        <li class="collection-header"><h4>Professor Name</h4></li>
		        <li class="collection-item"><a href="">Create Group</a></li>
		         <li><a class="collection-item dropdown-button" href="#!" data-activates="current_groups">Manage Current Groups<i class="material-icons right">arrow_drop_down</i></a><br><br><br><br><br><br><br></li>
		     </ul>

	      </div>
	    </div>     
	</div> 
	<div>
		<ul id="current_groups" class="dropdown-content">
			 <li><a href="#!">Sample Subjects</a></li>
			 <li><a href="#!">Sample Subjects</a></li>
			 <li><a href="#!">Sample Subjects</a></li>
		</ul>
	</div>  
</body>
</html>