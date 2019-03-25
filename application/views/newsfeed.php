<!DOCTYPE html>
<html>
<head>	 
	<link rel="stylesheet" href= "<?php echo base_url('assets/css/newsfeed.css');?>"> 
  <script type="text/javascript">
    $(document).ready(function(){
        $('a.groupname').on('click', function(event){
          event.preventDefault();
          var href = $(this).attr('href');
          $('#userpage').empty();
          $('#userpage').load(href);
         $("#sidenav-overlay").trigger("click");
        });
    });
  </script>
</head>
<body>

    <div class="container">
    <?php
    if(is_array($init) || is_object($init)){
    foreach($init as $data){
    echo'

      <div id="profile-page-wall-post" class="card z-depth-4">
          <div class="card-profile-title">
              <div class="row">
                  <div class="col s1">  
                      <img src="'.base_url().'assets/images/def.jpg" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                  </div>
                  <div class="col s10">
                      <a href="#!" class=" btn-floating white"><i class="grey medium material-icons prefix">supervisor_account</i>
                      <a href="'.base_url('groups/'.$data->groups_ID.'').'"class="groupname black-text"> &nbsp'.$data->groups_Name.'</a>
                      <p class="grey-text text-darken-4 margin">'.$data->accounts_fname. "\t" . $data->accounts_lname .'</p> 
                      <span class="grey-text text-darken-1 ultra-small">Shared publicly  '.$data->post_date.'</span>
                  </div>
                  <div class="col s1 right-align">
                      <i class="mdi-navigation-expand-more"></i>
                  </div>
              </div> 
              <div class="row">
                  <div class="col s12">
                      <p>'.$data->post_content.'</p>
                  </div>
              </div>
          </div>
          <div class="card-action row">
              <div class="col s12">
                  <a href="#">Like</a>
              </div>
              <div class="input-field col s8 margin">
                  <input id="profile-comments" type="text" class="validate margin">
                  <label for="profile-comments" class="">Comments</label>
              </div>                           
          </div>    
      </div>';
      }
    }
      ?>
     </div>
<div id='userpage'>
</div>
</body>
</html>