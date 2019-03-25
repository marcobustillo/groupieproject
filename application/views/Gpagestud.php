<!DOCTYPE html>
<html>
<head>   
    <link rel="stylesheet" href= "<?php echo base_url('assets/css/newsfeed.css');?>"> 
    <link rel="stylesheet" href="<?php echo base_url('assets/css/member_style.css');?>">
    <script>
    $(document).ready(function(){
      $('#submitButton').on('click',function(){
        var id = $('.grouppage-form').attr('id');
        var text = $('textarea.materialize-textarea').val();
        var currentdate = new Date(); 
        var datetime = currentdate.getFullYear() + "-"
                    + (currentdate.getMonth()+1)  + "-" 
                    + currentdate.getDate() + " "  
                    + currentdate.getHours() + ":"  
                    + currentdate.getMinutes() + ":" 
                    + currentdate.getSeconds();
          $.ajax({
            type : 'POST',
            url  : '<?php echo base_url('insertPost');?>',
            data : { id:id, text:text, datetime:datetime},
            dataType : 'json',
            success: function(data){
              $(data).each(function() {
                $('#groupPost').prepend($('<div id="profile-page-wall-post" class="card">'
                + '<div class="card-profile-title">'
                +   '<div class="row">'
                +     '<div class="col s1">'
                +       '<img src="<?php echo base_url(); ?>assets/images/def.jpg" alt="" class="circle responsive-img valign profile-post-uer-image">'                      
                +     '</div>'
                +   '<div class="col s10">'
                +     '<p class="grey-text text-darken-4 margin">'+this.accounts_fname+'\t'+this.accounts_lname+'</p>'
                +      '<span class="grey-text text-darken-1 ultra-small">Shared publicly  '+datetime+'</span>'
                +  '</div>'
                +  '<div class="col s1 right-align">'
                +      '<i class="mdi-navigation-expand-more"></i>'
                +  '</div>'
                + '</div>'
                + '<div class="row">'
                +   '<div class="col s12">'
                +      '<p>'+text+'</p>'
                +  '</div>'
                + '</div>'
                + '</div>'
                + '<div class="card-action row">'
                +   '<div class="col s12">'
                +     '<a href="#">Like</a>'
                +   '</div>'
                + '<div class="input-field col s8 margin">'
                +   '<input id="profile-comments" type="text" class="validate margin">'
                +   '<label for="profile-comments" class="">Comments</label>'
                + '</div>'                 
                + '</div>'  
                + '</div>'));
              });
              $('textarea.materialize-textarea').val('');
              Materialize.updateTextFields();
            },
            error: function(errorw){
              alert('error');
            }
          });
      });
    });
      
    </script>
</head>
<body> 
    <div class="container">
        <div class="row"> 
            <ul class="tabs">
                <li class="tab col s3 "><a href="#post" class="black-text">Posts</a></li>
                <li class="tab col s3 "><a href="#events" class="black-text">Events</a></li>
                <li class="tab col s3 "><a href="#members" class="black-text">Members</a></li>
            </ul>
            <div id="events">
                <div class="row">
                <?php 
                 if(is_array($events)||is_object($events)){
                    foreach ($events as $event) {
                    echo '       
                    <div class="col s12 z-depth-2">
                        <div class="card darken-1 z-depth-0">
                            <div class="card-content black-text">
                                <span class="card-title">'.$event->events_name.'</span>                                   
                            </div>
                            <div class="card-action">
                                <p>'.$event->events_description.'</p>
                                <p>'.$event->events_date.'</p>
                                <p>'.$event->accounts_fname. "\t".$event->accounts_lname.'</p>
                                <div class="input-field margin">
                                    <input id="profile-comments" type="text" class="validate margin">
                                    <label for="profile-comments" class="">Write a Comment</label>
                                </div>  
                                <div id="CommentSection" class="col s12">
                                    <div class="col s2">
                                        <img id=""src="assets/images/def.jpg" height="80" width="100">
                                    </div>
                                    <div class="col s10">
                                        <p>User: "Comment Here"</p>
                                        <p>Date Commented</p>
                                        <br>
                                    </div>
                                </div>
                                <div id="CommentSection" class="col s12">
                                    <div class="col s2">
                                        <img id=""src="assets/images/def.jpg" height="80" width="100">
                                    </div>
                                    <div class="col s10">
                                        <p>User: "Comment Here"</p>
                                        <p>Date Commented</p>
                                        <br>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                     </div>';
                    }
                }
                    ?>
                </div>            
            </div>
            <div id="members">
                <div class="row">
                    <?php 
                    if(is_array($GroupMembers) || is_object($GroupMembers)){
                        foreach($GroupMembers as $GroupMembers){
                        echo '
                        <div class="col s6 z-depth-1">
                            <div class="col s4">
                                <img class="member_div" src="assets/images/def.jpg" height="120" width="130">
                            </div>
                            <div id="member_details" class="col s8 member_div">
                                <span id="member_name">'.$GroupMembers->accounts_fname."\t".$GroupMembers->accounts_lname.'</span>
                                <span id="member_course">'.$GroupMembers->course_abbv.'</span>
                                <span id="member_email">'.$GroupMembers->accounts_email.'</span>
                            </div>
                        </div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div id="post">
                <div id="UpdateStatus" class="tab-content grey lighten-4">
                    <div class="row">
                        <div class="col s2">
                            <img src="<?php echo base_url();?>assets/images/def.jpg" alt="" class="circle responsive-img valign profile-image-post">
                        </div>
                        
                        <?php
                        echo '
                        <form class="grouppage-form" id ="'.$groupId.'">
                            <div class="input-field col s10">
                                <textarea name = "textarea"  row="2" class="materialize-textarea" style="height: 22px;"></textarea>
                                <label for="textarea" class="">Whats on your mind?</label>    
                            </div>
                        </form>';
                        ?>  
                        <div class="col s2 offset-s2"> 
                            <button id="submitButton" class="waves-effect waves-light btn red"><i class="mdi-maps-rate-review left"></i>Post</button>
                        </div>
                        
                        
                    </div>  
                </div>
                <div id="groupPost">
                  <?php
                  if(is_array($init) || is_object($init)){
                    foreach ($init as $data) {
                     echo '<div id="profile-page-wall-post" class="card">
                                <div class="card-profile-title">
                                    <div class="row">
                                        <div class="col s1">
                                            <img src="'.base_url().'assets/images/def.jpg" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                                        </div>
                                        <div class="col s10">
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

            
        </div>
    </div>
   </body>
</html>