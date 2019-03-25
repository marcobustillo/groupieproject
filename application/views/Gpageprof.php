<!DOCTYPE html>
<html>
<head>  
	<link rel="stylesheet" href= "<?php echo base_url('assets/css/newsfeed.css');?>"> 
  <link rel="stylesheet" href="<?php echo base_url('assets/css/member_style.css');?>">
  <script>
    $(document).ready(function(){
        $('#submitButton').on('click',function(){
            var id = $('.grouppage-form').attr('id');
            var text = $.trim($('#PostGroup').val());
            var currentdate = new Date(); 
            var datetime = currentdate.getFullYear() + "-"
                    + (currentdate.getMonth()+1)  + "-" 
                    + currentdate.getDate() + " "  
                    + currentdate.getHours() + ":"  
                    + currentdate.getMinutes() + ":" 
                    + currentdate.getSeconds();
          if($('#PostGroup').val().replace(/^\s+|\s+$/g, "").length != 0){
            $.ajax({
              type: 'POST',
              url:'<?php echo base_url('insertPost');?>',
              data : { id:id, text:text,datetime:datetime},
              dataType : 'json',
              success: function(data){
                $(data).each(function(){
                  $('#grouppost').prepend($('<div id="profile-page-wall-post" class="card">'
                    + '<div class="card-profile-title">'
                    + '<div class="row">'
                    + '<div class="col s1">'
                    + '<img src="<?php echo base_url(); ?>assets/images/def.jpg" alt="" class="circle responsive-img valign profile-post-uer-image">'
                    + '</div>'
                    +  '<div class="col s10">'
                    + '<p class="grey-text text-darken-4 margin">'+this.accounts_fname+'\t'+this.accounts_lname+'</p>'
                    + '<span class="grey-text text-darken-1 ultra-small">Shared publicly  '+datetime+'</span>'
                    + '</div>'
                    + '<div class="col s1 right-align">'
                    +  '<i class="mdi-navigation-expand-more"></i>'
                    + '</div>'
                    + '</div>'
                    + '<div class="row">'
                    +   '<div class="col s12">'
                    +      '<p>'+text+'</p>'
                    +  '</div>'
                    + '</div>'
                    + '</div>'
                    + '<div class="card-action row">'
                    + '<div class="input-field col s8 margin">'
                    +   '<input id="profile-comments" type="text" class="validate margin">'
                    +   '<label for="profile-comments" class="">Comments</label>'
                    + '</div>'                 
                    + '</div>'  
                    + '</div>'
                    ));
                  $('textarea.materialize-textarea').val('');
                  Materialize.updateTextFields();
                });
              },
              error: function(errorw){
                alert('error');
              }
           });
          }else{
            alert('empty');
          }
        });
        
        $('ul.tabs').tabs('select_tab', 'grouppost');

        $('#searchButton').on('click',function(){
          var search = $('#searchstudent').val();
          var groupID = $('#searchID').val();
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('search')?>",
              data : {search:search,groupID:groupID},
              success : function(data){
                console.log(data);
                $('#searchstudent').val('');
                Materialize.updateTextFields();
              },error : function(errorw){
                alert('error')
              }
            });
        });
        
        
        $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
              opacity: .5, // Opacity of modal background
              in_duration: 300, // Transition in duration
              out_duration: 200, // Transition out duration
              starting_top: '4%', // Starting top style attribute
              ending_top: '10%', 
            });


        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            min: new Date(2017,3,20),
            format: 'yyyy-mm-dd'
        });

        $('#removeButton').on('click',function(){
            alert('123');

        });
        $('#setMod').on('click',function (){
            alert('123');
        });

        $('#createEvent').on('click',function(){
            var id = $('.grouppage-form').attr('id');
            var eventName = $('#event_name').val();
            var eventDescr = $('#suggestion').val();
            var eventDate = $('.datepicker').val();
            var accountid = $('#groupID').val();
            
              $.ajax({
                  type:"POST",
                  url:"<?php echo base_url('CreateEvent');?>",
                  data:{id:id, eventName:eventName,eventDescr:eventDescr,eventDate:eventDate,accountid:accountid },
                  dataType :"json",
                  success : function(data){
                    $(data).each(function(){
                      $('#eventsTab').append($('<div id="events">'
                      +'<div class="row">'
                      +    '<div class="col s12 z-depth-2">'
                      +        '<div class="card darken-1 z-depth-0">'
                      +           '<div class="card-content black-text">'
                      +                '<span class="card-title">'+eventName+'</span>'                                   
                      +            '</div>'
                      +            '<div class="card-action">'
                      +                '<p>'+eventDescr+'</p>'
                      +                '<p>'+eventDate+'</p>'
                      +                '<p>'+this.accounts_fname+'\t'+this.accounts_lname+'</p>'
                      +                '<div class="input-field margin">'
                      +                    '<input id="profile-comments" type="text" class="validate margin">'
                      +                    '<label for="profile-comments" class="">Write a Comment</label>'
                      +                '</div>'  
                      +                '<div id="CommentSection" class="z-depth-0 col s12">'
                      +                    '<div class="col s2">'
                      +                        '<img id=""src="assets/images/def.jpg" height="80" width="100">'
                      +                    '</div>'
                      +                    '<div class="col s10">'
                      +                        '<p>User: "Comment Here"</p>'
                      +                        '<p>Date Commented</p>'
                      +                    '</div>'
                      +                '</div>'
                      +                '<div id="CommentSection" class="z-depth-0 col s12">'
                      +                    '<div class="col s2"><img id=""src="assets/images/def.jpg" height="80" width="100"></div>'
                      +                    '<div class="col s10">'
                      +                        '<p>User: "Comment Here"</p>'
                      +                        '<p>Date Commented</p>'
                      +                    '</div>'
                      +                '</div>'
                      +            '</div>'
                      +        '</div>'
                      +    '</div>'
                      + '</div>'
                  + '</div>)'));
                    });
                    $('#event_name').val('');
                    $('#suggestion').val('');
                    $('.datepicker').val('');
                    Materialize.updateTextFields();
                  },error:function(){
                    alert('error');
                  }
              });
            
        });
    });
  </script>

</head>
<body>  
    <div class="container">
      <div id="create_event" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Create Event</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" id="groupID" value="<?php echo $userid?>">
                        <input id="event_name" type="text" class="">
                        <label for="event_name">Type Event Name</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="suggestion" class="materialize-textarea"></textarea>
                        <label for="suggestion">Event Description</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="date" class="datepicker">
                        <label for="date">Set Date</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect btn-flat">Close</a>
                <a href="#!" id = "createEvent" class=" modal-action modal-close waves-effect btn-flat">Create</a>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a href="#student_tbl" class="btn-floating btn-large red tooltipped" data-position="left" data-delay="50" data-tooltip="Add Member"><i class="large material-icons">mode_edit</i></a>       
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3 "><a href="#posts" class="black-text">Posts</a></li>
                    <li class="tab col s3 "><a href="#events_div" class="black-text">Events</a></li>
                    <li class="tab col s3 "><a href="#members" class="black-text">Members</a></li>
                    <br>
                </ul>
            </div>
        </div>
        
       
        <div id="posts">
            <div id="UpdateStatus" class="tab-content col s12  grey lighten-4">
                <div class="row">
                    <div class="col s2">
                        <img src="<?php echo base_url();?>assets/images/def.jpg" alt="" class="circle responsive-img valign profile-image-post">
                    </div>
                    <form class="grouppage-form" method ="POST" id ="<?php echo $groupId?>">
                          <div class="input-field col s10">
                              <textarea name = "textarea" id="PostGroup" row="2" class="materialize-textarea" style="height: 22px;"></textarea>
                              <label for="textarea" class="">Post Upcoming Activities</label>      
                          </div>       
                    </form>
                    <div class="row">
                      <div class="col s3 offset-s2">
                          <button id="submitButton" class="waves-effect waves-light btn red">
                              <i class="mdi-maps-rate-review left"></i>Post
                          </button>
                          <a href="#create_event" class="modal-trigger btn-floating btn-medium red" ><i class="material-icons">assignment</i></a>
                      </div>
                    </div>
                </div>  
            </div>

            <div id="grouppost">
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
                                  <p class="grey-text text-darken-4 margin">'.$data->accounts_fname."\t".$data->accounts_lname.'</p>
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
       
        <div id="eventsTab">
              <?php
            if(is_array($events)||is_object($events)){
              foreach($events as $event){
                echo '
                  <div id="events">
                      <div class="row">
                          <div class="col s12 z-depth-2">
                              <div class="card darken-1 z-depth-0">
                                  <div class="card-content black-text">
                                      <span class="card-title">'.$event->events_name.'</span>                                   
                                  </div>
                                  <div class="card-action">
                                      <p>'.$event->events_description.'</p>
                                      <p>'.$event->events_date.'</p>
                                      <p>'.$event->accounts_fname."\t".$event->accounts_lname.'</p>
                                      <div class="input-field margin">
                                          <input id="profile-comments" type="text" class="validate margin">
                                          <label for="profile-comments" class="">Write a Comment</label>
                                      </div>  
                                      <div id="CommentSection" class="z-depth-0 col s12">
                                          <div class="col s2">
                                              <img id=""src="assets/images/def.jpg" height="80" width="100">
                                          </div>
                                          <div class="col s10">
                                              <p>User: "Comment Here"</p>
                                              <p>Date Commented</p>
                                          </div>
                                      </div>
                                      <div id="CommentSection" class="z-depth-0 col s12">
                                          <div class="col s2"><img id=""src="assets/images/def.jpg" height="80" width="100"></div>
                                          <div class="col s10">
                                              <p>User: "Comment Here"</p>
                                              <p>Date Commented</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>';
                }
              }
            ?>

        </div>
        
        

        <div id="student_tbl" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4 class="flow-text">Students</h4> 
                <div class="row">
                    <div class="input-field col s6">
                      <?php echo '<input type = "hidden" id ="searchID" value="'.$groupId.'">';?>
                      <input id="searchstudent" type="text" class="validate">
                      <label for="searchstudent">Type Student ID</label>
                     
                    </div>
                    <div class="col s12">
                        <a id="searchButton" class="waves-effect btn-flat"><i class="material-icons right">add</i>Add Member</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect btn-flat">Close</a>
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
                                <span id="member_email">'.$GroupMembers->accounts_email.'</span><br>
                                <a href="#" id="setMod" class="teal-text"><i class="material-icons">supervisor_account</i>Set As Moderator</a><br>
                                <a href="#" id="removeButton" class="teal-text"><i class="material-icons">delete</i>Remove from group</a>
                            </div>
                        </div>
                        ';
                        }
                      }

                      ?>
            </div>
        </div>
       
</body>
</html>