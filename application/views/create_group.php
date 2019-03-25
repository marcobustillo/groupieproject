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
	$(document).ready(function() {
    var max_fields      = 30; //maximum input boxes allowed
    var wrapper         = $(".add_member"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 3; //initlal text box count	
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<input id="group_name" type="text" class="validate">
			      <label for="group_name">Add Group Members</label>') //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
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
	    <div class="col s12">
		    <div class="input-field col s6">
		   	  <input id="group_name" type="text" class="validate">
		      <label for="group_name">Group Name</label>
		    </div>     
	    </div>
	    <div class="col s12">
		    <div class="add_member input-field col s7">
		   	  <form>
		   	  	  <input id="group_name" type="text" class="validate">
			      <input id="group_name" type="text" class="validate">	    
			      <input id="group_name" type="text" class="validate">
			      <label for="group_name">Add Group Members</label>
			  
		 	  </form>
		   	  
		    </div>
		    <div class="input-field col s5">
		    <!-- <button id="add_field_button">add</button> -->
		  	  <a id="add_field_button" class="waves-effect waves-light red btn"><i class="material-icons left">add</i>Add More Members</a>
			</div>      
			<div class="input-field col s5">
			  <a class="add_field_button waves-effect waves-light red btn"><i class="material-icons left">done</i>Done</a>
			</div>		
	    </div>
	    

	</div>
</div>
	
</body>
</html>