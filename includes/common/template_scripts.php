<!-- JS Global Compulsory -->
<script data-cfasync="false" src="http://www.nattsshoother.com/cdn-cgi/scripts/af2821b0/cloudflare-static/email-decode.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/popper.min.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/bootstrap/bootstrap.min.js"></script>


<!-- JS Implementing Plugins -->
<script src="<?php echo $baseURL; ?>assets/vendor/appear.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/jquery.maskedinput/src/jquery.maskedinput.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/chosen/chosen.jquery.js"></script>

<!-- JS Unify -->
<script src="<?php echo $baseURL; ?>assets/js/hs.core.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/helpers/hs.hamburgers.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/components/hs.header.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/components/hs.tabs.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/components/hs.progress-bar.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/components/hs.scrollbar.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/helpers/hs.not-empty-state.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/helpers/hs.focus-state.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/components/hs.masked-input.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/components/hs.select.js"></script>
<script src="<?php echo $baseURL; ?>assets/js/components/hs.go-to.js"></script>

<!-- JS Customization -->
<script src="<?php echo $baseURL; ?>assets/js/custom.js"></script>


<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {

        $.HSCore.helpers.HSFocusState.init();
        $.HSCore.helpers.HSNotEmptyState.init();

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of input masking
        $.HSCore.components.HSMaskedInput.init('[data-mask]');

        // initialization of custom select
        $.HSCore.components.HSSelect.init('.js-custom-select');

        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init( $('.js-scrollbar') );
    });

    $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 991
        });

        // initialization of horizontal progress bars
        setTimeout(function () { // important in this case
            var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
                direction: 'horizontal',
                indicatorSelector: '.js-hr-progress-bar-indicator'
            });
        }, 1);
    });

    $(window).on('resize', function () {
        setTimeout(function () {
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
    });
</script>

<!-- JS Implementing Plugins -->
<script  src="<?php echo $baseURL; ?>assets/vendor/custombox/custombox.min.js"></script>

<!-- JS Unify -->
<script  src="<?php echo $baseURL; ?>assets/js/components/hs.modal-window.js"></script>

<!-- Sweet Alert 2 (SWAL2) -->
<script src="<?php echo $baseURL; ?>assets/js/components/sweetalert2.min.js"></script>

<!-- jQuery Bracket Plugin -->
<script src="<?php echo $baseURL; ?>assets/js/components/bracket/brackets.min.js"></script>

<!-- Moment js library for date_time_stamp functionality -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.js"></script>

<!-- Writing some custom script to handle extra features -->
<script>

  $(document).ready(function(){

    // initialization of popups
    $.HSCore.components.HSModalWindow.init('[data-modal-target]');

    // alert('HI'); //General check if script is working or not
    function reload(){

      window.location.reload();

    }

    //Initializing tooltip calls globally
    $('[data-toggle="tooltip"]').tooltip();

    $('.platformIDUpdate').on('click',function(){

      // alert('Hi!'); // Button is WORKING

      var platformGameID = this.id;
      var platformUserName = $(this).attr('data-platform-user-name');
      var userID = $(this).attr('data-user-id');
      // alert(platformGameID+platformUserName+userID);

        $.ajax ({

          type:'POST',
          url:'<?php echo $baseURL; ?>api/process/request/addUpdateGameUserProfile.php?request='+'getUserName',
          data:{'platformGameID':platformGameID,'platformUserName':platformUserName,'userID':userID},
          dataType:'json',
          success:function(data){

            $('#platformUserName').val(data.userName);
            // $('#platformUserName').attr('placeholder',data.gamePlacehoder);
            $('#platformName').html("Change username");
            $('#gameID').val(data.gameID);

          }

        });

    });

    //Update User ID for existing game and username
    $('#userIDUpdate').on('click',function(e){

      var platformUserName = $('#platformUserName').val();
      var platformGameID = $('#gameID').val();
      var userID = $('.platformIDUpdate').attr('data-user-id');

      if(platformUserName == "" ){

        swal({
          title: "Nothing Provided!",
          text: "No username provided.",
          icon: "error",
          button: {
            text: "RETRY",
          },
          }).then(function() {

          $('#platformUserName').focus();

        });

      }else{

        // alert(platformUserName);

        $.ajax({

              type:'POST',
              url:'<?php echo $baseURL; ?>api/process/request/addUpdateGameUserProfile.php?request='+'updateUserName',
              data:{'platformUserName':platformUserName, 'platformGameID':platformGameID, 'userID':userID},
              dataType:'json',
              success:function(data){

                  if(data.message== 'SAME'){

                    swal({
                      title: "Nothing to update!",
                      text: "Same username provided.",
                      icon: "error",
                      button: false,
                      timer:1200
                    }).then(function() {

                        swal.close();
                        $('#closeModal').click();

                    });


                  }else if(data.message == 'UPDATED'){

                    swal({
                      title: "Username Updated to! "+platformUserName,
                      text: "Your new username updated.",
                      icon: "success",
                      button: false,
                      timer:2000,
                      }).then(function() {

                          window.setTimeout(reload(),2500);
                          swal.close();
                          $('#closeModal').click();

                      });

                  }else{

                    swal({
                      title: "SOME ERROR OCCURED",
                      text: "Unable to update your request.",
                      icon: "warning",
                      button: false,
                      timer:1500
                      }).then(function() {

                          // window.setTimeout(reload(),5500);
                          swal.close();
                          $('#closeModal').click();

                      });


                  }


              }

        });

      }
      e.preventDefault();
    });

    //UserID mapping for game.
    $('.platformIDMapping').on('click',function(){

      // alert('Hi!'); // Button is WORKING

      var getPlatformID = $(this).attr('data-game-id');
      var userID =$(this).attr('data-user-id');

      $.ajax({

        type:'POST',
        url:'<?php echo $baseURL; ?>api/process/request/addUpdateGameUserProfile.php?request='+'getGameInfo',
        data:{'platformGameID':getPlatformID, 'userID':userID},
        dataType:'json',
        success:function(data){

            $('#gamePID').val(data.gameID);
            $('#userID').val(data.userID);
            $('#gamename').html("ADD USERNAME FOR "+data.gameName);
            $('#hiddenGameName').val(data.gameName);
            $('#addPlatformUserName').attr('placeholder',data.gamePlacehoder);

        }

      });

        // alert(getPlatformID+userID); //Checking if game Platform ID and User ID is available

    });

    $('#mapUserID').on('click',function(e){

      var userID = $('#userID').val();
      var gameID = $('#gamePID').val();
      var gamename = $('#hiddenGameName').val();
      var username = $("#addPlatformUserName").val();
      var placeholder = $("#addPlatformUserName").attr('placeholder');

      if(username){

              $.ajax({

                type:'POST',
                url:'<?php echo $baseURL; ?>api/process/request/addUpdateGameUserProfile.php?request='+'mapusername',
                data:{'platformGameID':gameID, 'userID':userID, 'platformUserName':username},
                dataType:'json',
                success:function(data){

                    if(data.message == 'ADDED'){

                      swal({
                        title: "Username added as "+username,
                        text: "You added username for "+gamename,
                        icon: "success",
                        button: false,
                        timer:2000
                        }).then(function() {

                            window.setTimeout(reload(),2500);
                            swal.close();
                            $('#closeModal').click();

                        });

                    }
                }

              });

        }else{

          swal({
            title: "Nothing Provided for "+gamename+"!",
            text: "No "+placeholder+ " provided.",
            icon: "error",
            button: {
              text: "RETRY",
            },
            }).then(function() {

            $('#addPlatformUserName').focus();

          });


      }

      e.preventDefault();
    });

  });

</script>

<!-- Writing some custom script to handle extra features -->
<script>

  $(document).ready(function(){


      // $('#notificationCount').html(notificationCount);
      setTimeout(notificationPanel, 200);
      setTimeout(walletBalance, 200);
      setTimeout(getAllNotification, 200);
      setTimeout(globalActivities, 500);
      var userID = $('#hiddenUserID').text();
      // alert(userID);

function notificationPanel(){

  //Reading the securetiy token Generated
  var token = $('#tokenArea').text();

  var notificationCount = $('#notificationCount').text();
  notificationTrigger = document.getElementById("notificationSound");
  notificationTrigger.src = "<?php echo $baseURL; ?>assets/notification/notification-sound.mp3";

  // $('#notificationCount').html(notificationCount);
  // alert(notificationCount);
  // alert('Hello');

        $.ajax({

              type:'post',
              url:'<?php echo $baseURL; ?>api/process/request/notificationCheck?token='+token,
              data:{'userID':userID,'notification_count':notificationCount,'token':token},
              dataType: 'json',
              success:function(data){

                  var unreadcounts = parseInt(data.unreadcounts);
                  $('#notificationCounts').html(unreadcounts);

                if(data.response == 'NPR'){

                    $('#notificationCount').html(unreadcounts);

                }else if(data.response == 'NUN'){

                    $('#notificationCount').html(unreadcounts);
                    // $('.icon-notifications-bell').effect( "shake" );

                    cheers.success({
                        title: 'New Notification!',
                        icon: 'fa-bell',
                        message: 'You have received a notification.',
                        alert: 'slideleft',
                    });

                    //Play notification sound upon new notification
                    notificationTrigger.play();

                }else{

                    $('#notificationCount').html('0');

                }
              },complete: function() {

                // schedule the next request *only* when the current one is complete:
                setTimeout(notificationPanel, 5500);

              }

      });

  }

  $('.joinGameButton').click(function(e){

    e.preventDefault();
    var gameID = this.id;
    var userID = $('#hiddenUserID').text();

    //alert(gameID);

    joinGame(gameID);

  });

  function joinGame(gameID){

    swal({

     title: 'You are about to join?',
     text: "Please read and check terms before joining game!",
     icon: 'warning',
     buttons: true,
     dangerMode: true,
   })
         .then((willJoin) => {

      if (willJoin) {

            $.ajax({

                type:'post',
                url:'<?php echo $baseURL; ?>api/process/request/userGameJoin',
                data:{'gameID':gameID,'userID':userID},
                dataType:'json',
                success:function(data){

                  if(data.response == 'SUCCESS'){

                      swal({

                       title: "You have successfully joined the tournament.",
                       text: "Please wait for the fixture and rules.",
                       icon: 'success',
                       buttons: false,
                       timer : 1700

                      });

                  }else{

                    swal({

                     title: "You have already joined the tournament.",
                     text: "Please wait for the fixture and rules.",
                     icon: 'warning',
                     buttons: false,
                     timer : 1700

                    });

                  }

                }


            });

      } else {

        swal({

         title: 'You are not joining game!',
         text: "Oops! You opt not to join.",
         icon: 'error',
         buttons: false,
         timer : 1700

       });

       window.setTimeout(reload, 2200);

      }

    });

  };

     $("#notificationLink").click(function(){

        $("#notificationContainer").fadeToggle('slow').delay(500);
        $("#notification_count").fadeOut("slow");
        return false;

      });

    //Document Click hiding the popup
    $(document).click(function(){

      $("#notificationContainer").fadeOut("slow");

    });

    //Popup on click
    $("#notificationContainer").click(function(){

      return false;

    });

    $('.lnkAllNotification').on('click',function(){

      window.location.href="allNotifications";

    });

  // function type(){
  //
  //   if(dots < 3)
  //   {
  //       $('#dots').append('.');
  //       dots++;
  //   }
  //   else
  //   {
  //       $('#dots').html('');
  //       dots = 0;
  //   }
  //
  // }
  //
  // //Run the dots along
  // setInterval (type, 600);

  //Quick User Match function
  $(document).on('click','.quickMatchModal',function(){

    $('#quickMatchArea').html("");

    //Reading the securetiy token Generated
    var token = $('#tokenArea').text();
    var userid = $('#hiddenUserID').text();

    $.ajax({

        type: 'post',
        url: '<?php echo $baseURL; ?>api/process/request/findQuickMatch?token='+token,
        data:{'token':token, 'userid':userid},
        dataType: 'html',
        beforeSend: function(){

          $('#findQuickMatch').show().fadeIn('slow').delay(7200);

        },
        success: function(data){

          $('#findQuickMatch').fadeOut('slow').delay(7800);

          if(data){

            setTimeout(function(){

              $('#quickMatchArea').html(data);
              $('#successtext').html("<i class='icon-target'></i>New Matche(s) Found.");

            },7500);

          }else{

            alert('ERROR');

          }
      }


    });

  });

  $('#rdmvchr').click(function(){

    var vcode = $('#voucherCode').val();
    alert('Hi'+vcode);

  });

  $(document).on('click','.acceptChallenge',function(){

      var quickMatchID = this.id;
      var challengeruserID = $(this).attr('data-id');
      var challengeruserName = $(this).attr('name');

      $.ajax({

          type: 'post',
          url:  '<?php echo $baseURL; ?>api/process/request/acceptQuickMatch',
          // dataType: 'json',
          data: {'acceptoruserID': userID, 'quickMatchID': quickMatchID, 'challengeruserID':challengeruserID, 'challengeruserName': challengeruserName},
          success: function(result){

              if(result == "CA"){

                swal({

                 title: "You have successfully accepted the challenge.",
                 text: "Please proceed with game play.",
                 icon: 'success',
                 buttons: false,
                 timer : 5000
                }).then(function() {

                   window.setTimeout(reload(),5500);
                   swal.close();
                   // $('#closeModal').click();

               });

              }else{

                alert ('Unknow Error');

              }

          }



      });

  });

  //Head ON Macth Logic

  $('#headonMatch').on('click', function(){

      var headOnuserID = $('#userSelect option:selected').val();
      var challengeAmount = $('#challengeAmount option:selected').val();
      var currentDTStamp = moment().format('Hmmss');
      var InvitationCode ='BSLVHOM'+currentDTStamp;
      var challengedUserName = $('#userSelect option:selected').text();
      var headonMatchData = $('#headonMatchForm').serialize();
      var userName = $('.userName').text();
      // alert(userName);
      // alert(InvitationCode);

      // alert('Hi '+headOnuserID+' Amount '+challengeAmount);

      $.ajax({

          type: 'post',
          url: '<?php echo $baseURL; ?>api/process/request/createHeadOnMatch',
          data:{headonMatchData,InvitationCode,userID,challengedUserName,userName},
          dataType: 'json',
          success:function(resp){

            switch (resp.code) {

              case 'UCS':

                        swal({

                         title: resp.result,
                         text: resp.msg,
                         icon: 'success',
                         buttons: false,
                         timer : 5000
                       });

                       break;

              case 'UCM':

                      swal({

                       title: resp.result,
                       text: resp.msg,
                       icon: 'warning',
                       buttons: false,
                       timer : 5000
                     });
                     break;

              case 'WFA':

                      swal({

                       title: resp.result,
                       text: resp.msg,
                       icon: 'warning',
                       buttons: false,
                       timer : 5000
                     });
                     break;

              default:

                  swal({

                   title: 'Unable to create challenge.',
                   text: 'Please try after some moment.',
                   icon: 'error',
                   buttons: false,
                   timer : 5000
                 });

            }

          }

      });

      return false;

  });

  $('#userSelect').on ('change', function(){

    if($(this).val() == 'null')

        $('#gamePlatformChoose').fadeOut('slow').delay(100);

    else

        $('#gamePlatformChoose').fadeIn('slow').delay(100);

  });

  $('#gameSelect').on('change', function(){

    if($(this).val() == 'null'){

      $('#challengeAmountSection').hide();
      $('#challengeAmount').reset();

    }else{

      $('#challengeAmountSection').fadeIn('slow').delay(100);

    }

  });

  $('#headonMatch').hide();
  $('#addMoney').hide();

  $('#challengeAmount').on('change', function(){

      var walletBalance = parseInt($('.walletBalance').text().replace('₹',''));
      var challengeAmount = parseInt($('#challengeAmount option:selected').text().replace('₹',''));

      if(walletBalance < challengeAmount){


        swal({

         title: "Insufficient funds in wallet.",
         text: "Please add "+'₹'+(challengeAmount-walletBalance)+" to your wallet and retry.",
         icon: 'warning',
         buttons: false,
         timer: 2000
        }).then(function() {

          // window.setTimeout(reload(),5500);
          swal.close();
          $('#addMoney').fadeIn('slow').delay(100);
          $('#headonMatch').hide();

      });

      }
      else{

        $('#addMoney').hide();
        $('#headonMatch').fadeIn('slow').delay(100);

      }

  });

  $(document).on('click','.closeHeadOnModal',function(){

    window.location.reload();

  });

  //Accept Headon Match Logic
  $(document).on('click', '.acceptHeadOnChallenge', function(){

    // $('#headonMatchModal').modal('show');
    var headOnGameID = this.id;
    var requestType = 'accept';
    var CurrentWalletBalance = parseInt($('#walletBalanceArea').text());
    // var ChallengeRequestAmount = parseInt($('#challengeRequestAmount').text().replace('₹',''));
    var challengeAmount = $(this).attr('data-amount');
    var gamejoincode = $('#gamejoincode').val();
    //alert(CurrentWalletBalance+ChallengeRequestAmount);
    // alert(challengeAmount);

    if(CurrentWalletBalance >= challengeAmount){

      console.log('Proceed');

      $('#joingame').click(function(){

        var gamejoincode = $('#gamejoincode').val();
        // console.log(gamejoincode);

        if(gamejoincode == ''){
          // alert('No');
          swal({
              title: 'No Game Joining Code!',
              text: 'Please provide game join code.',
              icon: 'warning',
              buttons: false,
              timer: 2000
          });
           $('#gamejoincode').focus();

        }else{

          $.ajax({

            type:'POST',
            url:'<?php echo $baseURL; ?>api/process/request/responseHeadOnMatch?request='+requestType,
            data:{headOnGameID,gamejoincode},
            dataType:'json',
            success:function(response){
              // console.log(response.msg);
              if(response.code == 'HMA'){

                swal({

                 title: 'You have successful accepted the challenge.',
                 text: 'Please proceed with game play.',
                 icon: 'success',
                 buttons: false,
                 timer : 3000
               });
               window.location.reload();

             }else if(response.code == 'IJC'){

               // console.log('Error');

               swal({

                title: response.msg,
                text: response.resp,
                icon: 'error',
                buttons: false,
                timer : 3000

              });
              $('#gamejoincode').val("");
              $('#gamejoincode').focus();


              }else{

                    alert('Unable to handle request at the momemnt.');

              }

            }

          });

        }

      });

    }else{

        swal({

         title: "Insufficient funds in wallet.",
         text: "Please add "+'₹'+(challengeAmount-CurrentWalletBalance)+" to your wallet and retry.",
         icon: 'warning',
         buttons: false,
         timer: 2000
      });

      $('.hm-modal-close').click().delay(2000);

    }

  });



  $("#gameFilter").on("keyup", function() {
    var value = $(this).val();
    $("#gamePlatformArea *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  function walletBalance(){

    $.ajax({

      type:'POST',
      url:'<?php echo $baseURL; ?>api/process/request/getWalletBalance',
      data:{userID},
      dataType:'json',
      success:function(data){

        if(data.code == 'WBF'){

          $('#walletBalanceArea').html(data.msg);
          $('#walletBalanceHere').html(data.msg);
          $('.walletUpdated').html(data.lastUpdatedOn);

        }else{
          console.log(data.code);
        }
      },complete: function() {

        setTimeout(walletBalance, 3500);

      }

    });

  }

  function getAllNotification(){

    $.ajax({

      type:'POST',
      url:'<?php echo $baseURL; ?>api/process/request/getAllNotifications',
      data:{userID},
      dataType:'html',
      success:function(messages){

        if(messages)
          $('#notificationsBody').html(messages).fadeIn('slow').delay(300);
        else
          console.log('Unable to handle request');
      },complete: function() {

        setTimeout(getAllNotification, 8000);

      }

    });

  }

  // $('.dismissNotification').on('click', function(){
  //
  //     var notificationID = this.id;
  //     alert(notificationID);
  //
  //     return false;
  //
  // });

  function globalActivities(){

    $.ajax({

      type:'POST',
      url:'<?php echo $baseURL; ?>api/process/request/globalActivities',
      dataType:'html',
      success:function(activities){

        if(activities)
          $('#globalActivities').html(activities).fadeIn('slow').delay(300);
        else
          console.log('Unable to handle request');
      },complete: function() {

        setTimeout(globalActivities, 3500);

      }

    });

  }

  $('#changePhoto').click(function(e){

    e.preventDefault();

    // alert('Hi!');
    $("#imageUpload").click();

    return;
  });

  function fasterPreview(uploader) {

    if (uploader.files && uploader.files[0]){

        var x = $('#profileImage').attr('src', window.URL.createObjectURL(uploader.files[0]));

        }
    }

  $("#imageUpload").change(function(){

        var image = $(this).val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        var img = $(this).val();

        //validate file type
        if(!img_ex.exec(image)){
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#imageUpload').val('');
            return false;
        }else{
            // $('.uploadProcess').show();
            // $('#uploadForm').hide();
            // $( "#picUploadForm" ).submit();
            // alert('Upload'+img);
            fasterPreview(this);
            $('#uploadimage').submit();

        }


      });

      $('#uploadimage').submit(function(e){

        e.preventDefault();
        var uname = $('#profileImage').attr('alt');
        //Calling the AJAX to update Profile Photo of User
        $.ajax({

          type:'POST',
          url:'<?php echo $baseURL; ?>api/process/request/updateProfilePhoto?username='+uname+'&&userid='+userID,
          // dataType:'json',
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success:function(update){

            if(update == 'SUCCESS')
                    alert('Profile Picture Updated.');
            else
              console.log('Unable to handle request');
          }

        });

        return true;

      });
      //
      // $('#addmny').click(function(e){
      //
      //   e.preventDefault();
      //   var money = $('#');
      //   alert(money);
      //   if(money >= 50){
      //
      //
      //
      //   });

      $('.readNotification').click(function(e){

        var notid = $(this).val();
        e.preventDefault();
        alert('Hi');


      });

  // if(navigator.onLine)
  // {
  //   console.log('You are Online');
  //   $('#internetActivity').fadeOut('slow').delay(100);
  // }
  // else
  // {
  //   console.log('You are Offline');
  //   $('#internetActivity').fadeIn('slow').delay(100);
  // }

  $("#username").keyup(function(){

  var username = $(this).val();
  // console.log(username);
  if(username.length >= 5){

   $("#result").html('checking...');

     $.ajax({

        type : 'POST',
        url  : '<?php echo $baseURL; ?>api/process/request/firstUserUpdate',
        data : {'username':username},
        success : function(data){

                  $("#result").html(data);

        }

      });

      return false;

  }else{

   $("#result").html('');

  }

 });

 $('#profileData').submit(function(e){

   e.preventDefault();

    // var data = $(this).serialize();
    var npass = $('#pass').val();
    var vpass = $('#vpass').val();
    var phone = $('#phone').val();
    var username = $('#username').val();
    var userid = $('#hiddenUserID').text();

    if(npass == vpass){

      $.ajax({

         type : 'POST',
         url  : '<?php echo $baseURL; ?>api/process/request/updateProfile',
         data : {npass,vpass,phone,username,userid},
         success : function(res){

                  alert(res);

         }

       });

    }else{

      alert('Passwords donot match. Please retry.')
      $(this).find('input:password').val('');
      $('#pass').focus();

    }

   return false;

 });

 $(document).on('click','.quickclose',function(){

   var notificationID = $(this).attr('id');
   alert(notificationID);

 });

 //ResultUpload Screenshot
 $('#chooseScreenshot').click(function(e){

   e.preventDefault();

   // alert('Hi!');
   $("#screenshotUpload").click();

   return;
 });

 function fasterPreview(uploader) {

   if (uploader.files && uploader.files[0]){

       var x = $('#matchScreenshot').attr('src', window.URL.createObjectURL(uploader.files[0]));

       }
   }

 $("#screenshotUpload").change(function(){

       var image = $(this).val();
       var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
       var img = $(this).val();

       //validate file type
       if(!img_ex.exec(image)){

           alert('Please upload only .jpg/.jpeg/.png/.gif file.');
           $('#screenshotUpload').val('');
           return false;

       }else{
           // $('.uploadProcess').show();
           // $('#uploadForm').hide();
           // $( "#picUploadForm" ).submit();
           // alert('Upload'+img);
           fasterPreview(this);
           // $('#uploadimage').submit();

       }


     });

    $('#gameName').html("");

     $(document).on('click','.uploadscreenshot',function(){

         var gameID = $(this).attr('id');
         var gameName = $(this).attr('data-game-name');
         $('#gameName').html('<b>'+gameName+'</b>');
         $('#resultgameID').val(gameID);
         $('#matchScreenshot').attr('src',"https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Solid_white_bordered.svg/500px-Solid_white_bordered.svg.png");
         $('#matchScore').val("");
         $('#uploadimage')[0].reset();

     });

     $('#resultscreenshot').submit(function(e){
       e.preventDefault();
       var gameID = $('#resultgameID').val();
       var winnerID = $('#hiddenUserID').text();
       //Calling the AJAX to update Profile Photo of User
       $.ajax({

         type:'POST',
         url:'<?php echo $baseURL; ?>api/process/request/gameResultUpload?request='+'uploadResult'+'&gameID='+gameID+'&winnderuserID='+winnerID,
         // dataType:'json',
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData:false,
         success:function(uploaded){

           if(uploaded == 'SUCCESS'){

           swal({

            title: "Successfully uploaded screenshot.",
            text: "Please wait for the opponent to confirm.",
            icon: 'success',
            buttons: false,
            timer: 2000})
            .then(function(){
              location.reload();
            }
          );
       } else{
             console.log('Unable to handle request');
           }
         }

       });

       return true;

     });

});
</script>
