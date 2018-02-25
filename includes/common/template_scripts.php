<!-- JS Global Compulsory -->
<script data-cfasync="false" src="/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../../assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="../../../assets/vendor/popper.min.js"></script>
<script src="../../../assets/vendor/bootstrap/bootstrap.min.js"></script>


<!-- JS Implementing Plugins -->
<script src="../../../assets/vendor/appear.js"></script>
<script src="../../../assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="../../../assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../../../assets/vendor/jquery.maskedinput/src/jquery.maskedinput.js"></script>
<script src="../../../assets/vendor/chosen/chosen.jquery.js"></script>

<!-- JS Unify -->
<script src="../../../assets/js/hs.core.js"></script>
<script src="../../../assets/js/helpers/hs.hamburgers.js"></script>
<script src="../../../assets/js/components/hs.header.js"></script>
<script src="../../../assets/js/components/hs.tabs.js"></script>
<script src="../../../assets/js/components/hs.progress-bar.js"></script>
<script src="../../../assets/js/components/hs.scrollbar.js"></script>
<script src="../../../assets/js/helpers/hs.not-empty-state.js"></script>
<script src="../../../assets/js/helpers/hs.focus-state.js"></script>
<script src="../../../assets/js/components/hs.masked-input.js"></script>
<script src="../../../assets/js/components/hs.select.js"></script>
<script src="../../../assets/js/components/hs.go-to.js"></script>

<!-- JS Customization -->
<script src="../../../assets/js/custom.js"></script>


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
<script  src="../../../assets/vendor/custombox/custombox.min.js"></script>

<!-- JS Unify -->
<script  src="../../../assets/js/components/hs.modal-window.js"></script>

<!-- Sweet Alert (SWAL) -->
<script src="../../../assets/js/components/sweetalert2.min.js"></script>

<!-- Writing some custom script to handle extra features -->
<script>

  $(document).ready(function(){

    // initialization of popups
    $.HSCore.components.HSModalWindow.init('[data-modal-target]');

    // alert('HI'); //General check if script is working or not
    function reload(){

      window.location.reload();

    }



    $('.platformIDUpdate').on('click',function(){

      // alert('Hi!'); // Button is WORKING

      var platformGameID = this.id;
      var platformUserName = $(this).attr('data-platform-user-name');
      var userID = $(this).attr('data-user-id');
      // alert(platformGameID+platformUserName+userID);

        $.ajax ({

          type:'POST',
          url:'../../../api/process/request/addUpdateGameUserProfile.php?request='+'getUserName',
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
              url:'../../../api/process/request/addUpdateGameUserProfile.php?request='+'updateUserName',
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
        url:'../../../api/process/request/addUpdateGameUserProfile.php?request='+'getGameInfo',
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
                url:'../../../api/process/request/addUpdateGameUserProfile.php?request='+'mapusername',
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
      setTimeout(notificationPanel, 100);
      var userID = $('#hiddenUserID').text();
      // alert(userID);

function notificationPanel(){

  var notificationCount = 0;
  // $('#notificationCount').html(notificationCount);
  // alert(notificationCount);
  // alert('Hello');

        $.ajax({

              type:'post',
              url:'../../../api/process/request/notificationCheck.php',
              data:{'userID':userID},
              dataType: 'json',
              success:function(data){

                if(data){
                  // alert(data);

                  var unreadcounts = parseInt(data.unreadcounts);
                  // alert(unreadcounts);
                  var newnotificationCount = notificationCount+unreadcounts;
                  $('#notificationCount').html(newnotificationCount);

                }

              },complete: function() {

                // schedule the next request *only* when the current one is complete:
                setTimeout(notificationPanel, 3500);
                // if(readNotificaionCount > unreadcounts){
                //   alert ('new');
                // }

              }

      });

  }
});
</script>
