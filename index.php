<?php
   require 'functions/includes/session.php' ;

?>
<!DOCTYPE html>
<HTML>
  <HEAD>
    <?php require $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/header.php";?>
    <script>

      $(document).ready(function() {

          setTimeout(function(){
            $('body').addClass('loaded');
          }, 1000);

      });

    </script>

  </HEAD>
  <BODY>
  <?php
  //  include_once 'functions/includes/loader.php';

   ?>


   <?php
     include 'functions/start.php';
   ?>



      <!-- Main component for a primary marketing message or call to action -->

      <div class="container">

      <div class="jumbotron">
        <img src="../../img/Elkem corporate logo.png" width="190px" height="90px"/>
        <div align="center">
        <h2 >
          <?php
            $date = date_create(null, timezone_open("Europe/Paris"));
            date_timezone_set($date, timezone_open("Europe/Paris"));
            $time = localtime();
            $currenttime = $time[2] . ":" . $time[1] . ":" .$time[0];
            $timestampHour = $time[2];

            switch($timestampHour) {

              default :
                echo "Velkommen, " . $_SESSION['givenname'];
            }

          ?>
        </h2>
          </div>
          <div align="center">
        <br>
        <p>IT-support's samling av verktøy.</p>
      <br><br>


      <p>
        <a class="btn btn-lg btn-primary" href="https://itsupport.elkem.com/secure/Dashboard.jspa"target="_blank" role="button">Til Elkem Servicedesk support &raquo;</a>
      </p><br>
        <p>
          <a class="btn btn-lg btn-primary" href="https://itsupport.elkem.com/servicedesk/customer/portal/1"target="_blank" role="button">Til Elkem Servicedesk &raquo;</a>
        </p><br>

        <p>
          <a class="btn btn-lg btn-primary" href="https://support.elkem.com/"target="_blank" role="button">Til gammel Servicedesk &raquo;</a>
        </p>
      </div>
      </div>
    </div> <!-- /container -->
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--   Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<!--    <script>
      $('document').ready(function() {
        var transEffect = Barba.BaseTransition.extend({
            start: function() {
              this.newContainerLoading.then(val => this.fadeInNewcontent($(this.newContainer)));
            },
            fadeInNewcontent: function(nc) {
              nc.hide;
              var _this = this;
              $(this.oldContainer).fadeOut(10).promise().done(() => {
                nc.css('visibility', 'visible');
                nc.fadeIn(10, function(){
                  _this.done();
                })
              });
            }
        });

        Barba.Pjax.getTransition = function() {
          return transEffect;
        }
        Barba.Pjax.start();
      })
    </script> -->


  </body>
</html>
