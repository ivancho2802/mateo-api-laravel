<html lang="es-" dir="ltr">

<head>
  <title>Acuerdo De Transferencia Monetarias - Cash ECHO</title>
  <meta charset="utf-8">
  <meta name="author" content="Martijn van de Rijdt (Enketo LLC)">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="https://ee.acf-e.org/images/favicon.ico">
  <link rel="icon" type="image/png" sizes="180x180" href="https://ee.acf-e.org/images/icon_180x180.png">
  <link rel="apple-touch-icon" sizes="180x180" href="https://ee.acf-e.org/images/icon_180x180.png">
  <!-- <script src="https://ee.acf-e.org/js/build/ie11-polyfill.min.js" nomodule=""></script>
  <script src="https://ee.acf-e.org/js/build/obscure-ie11-polyfills.js" nomodule=""></script> -->
  <!-- preload for performance-->
  <link rel="preload" as="font" href="https://ee.acf-e.org/fonts/OpenSans-Bold-webfont.woff" type="font/woff" crossorigin="">
  <link rel="preload" as="font" href="https://ee.acf-e.org/fonts/OpenSans-Regular-webfont.woff" type="font/woff" crossorigin="">
  <link rel="preload" as="font" href="https://ee.acf-e.org/fonts/fontawesome-webfont.woff?v=4.6.2" type="font/woff" crossorigin="">
  <!-- critical styles inline for performance-->
  <style>
    @keyframes pulsate {
      0% {
        transform: scale(0.5);
        opacity: 0.0;
      }

      50% {
        opacity: 0.8;
      }

      100% {
        transform: scale(1.2);
        opacity: 0;
      }
    }

    html {
      height: 100%;
      overflow-x: hidden;
    }

    body {
      overflow-x: hidden;
      margin: 0;
      min-height: 100%;
      display: flex;
      flex-direction: column;
      transition: background-color 1.3s ease;
    }

    progress {
      display: block;
      margin: 10px auto;
    }

    .preview progress {
      margin: 80px auto;
    }

    .main-loader {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .main-loader.fail .main-loader__image {
      border: transparent;
      animation: none;
    }

    .main-loader__image {
      border: 10px solid #ccc;
      transition: border-color 1.3s ease;
      border-radius: 100px;
      height: 100px;
      width: 100px;
      opacity: 0;
      animation: pulsate 2s ease-out;
      animation-iteration-count: infinite;
    }

    .main-loader~.main,
    .main-loader~.side-slider {
      display: none;
    }

    .loader-animation-small {
      border: 5px solid #ccc;
      transition: border-color 1.3s ease;
      border-radius: 50px;
      height: 50px;
      width: 50px;
      opacity: 0;
      animation: pulsate 2s ease-out;
      animation-iteration-count: infinite;
    }

    .page-break {
      display: none;
    }

    .log {
      word-break: break-all;
    }

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
      .main-loader {
        margin-top: 200px;
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" media="all" type="text/css" href="https://ee.acf-e.org/css/theme-grid.print.css">
  <link rel="stylesheet" media="all" type="text/css" href="http://ach.dyndns.info:6180/theme-grid.css">

  <style>
    input[type=radio]:checked {
      background-color: #0d6efd !important;
      border-color: #0d6efd !important;
      background-image: radial-gradient(4px, blue 0%, blue 99%, transparent 100%) !important;
    }

    .question input[type=radio]:checked {
      border-color: #0d6efd !important;
      background-image: radial-gradient(4px, blue 0%, blue 99%, transparent 100%) !important;
    }
    
    .question input[type=radio]:checked:focus {
      outline: 0 !important;
      -webkit-box-shadow: 0 0 0 1px #66afe9, 0 0 8px rgba(102, 175, 233, 0.6)!important;
      box-shadow: 0 0 0 1px #66afe9, 0 0 8px rgba(102, 175, 233, 0.6)!important; 
    }

    
    input[type=checkbox]:checked {
      background-color: #0d6efd !important;
      border-color: #0d6efd !important;
      background-image: radial-gradient(4px, blue 0%, blue 99%, transparent 100%) !important;
    }

    .question input[type=checkbox]:checked {
      border-color: #0d6efd !important;
      background-image: radial-gradient(4px, blue 0%, blue 99%, transparent 100%) !important;
    }
    
    .question input[type=checkbox]:checked:focus {
      outline: 0 !important;
      -webkit-box-shadow: 0 0 0 1px #66afe9, 0 0 8px rgba(102, 175, 233, 0.6)!important;
      box-shadow: 0 0 0 1px #66afe9, 0 0 8px rgba(102, 175, 233, 0.6)!important; 
    }

    /* 
    input[type="radio"]:checked ~ * { 
      background:pink !important;
    }

    input[type="checkbox"]:checked ~ * { 
      background:pink !important;
    }

    input:checked+span::before {
      content: "";
      position: relative;
      height: 50px;
      top: 10%;
      left: -10%;
      transform: translate(-50%, -50%);
      background: url('http://ach.dyndns.info:6180/cheque.png') no-repeat;
      background-size: contain;
    }

    input:checked+picture {
      content: "";
      position: absolute;
      width: 50px;
      height: 50px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: url('http://ach.dyndns.info:6180/cheque.png') no-repeat;
      background-size: contain;
    }

    .option-wrapper-label picture {
      position: relative;
      display: inline-block;
    } */

  </style>

  <!-- src="chrome-extension://nngceckbapebfimnlniiiahkandclblb/content/fido2/page-script.js" -->
  
</head>

<body cz-shortcut-listen="true" class="">
  <div class="main print-width-adjusted" style="width: 717.12px;">
    <article class="paper">
      <header class="form-header">
        <div class="form-progress"></div>
        <div class="form-header__branding">
          <div class="logo-wrapper"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjAiIHk9IjAiIHdpZHRoPSIyNDMuNjI0IiBoZWlnaHQ9IjYxLjgwNiIgdmlld0JveD0iMCwgMCwgMjQzLjYyNCwgNjEuODA2Ij4KICA8ZyBpZD0icG9zaXRpdmUiPgogICAgPHBhdGggZD0iTTMwLjQzMyw2LjgxMyBDMzIuNjIzLDYuODEzIDM0LjQwNiw4LjU5NiAzNC40MDYsMTAuODA0IEwzNC40MDYsNTMuMjM5IEMzNC40MDYsNTUuNDQ4IDMyLjYyMyw1Ny4yMzEgMzAuNDMzLDU3LjIzMSBMMzAuNDE0LDU3LjIxMSBMNi41NDIsNTcuMjExIEw2LjU2MSw1Ny4yMzEgQzQuMzUzLDU3LjIzMSAyLjU3LDU1LjQ0OCAyLjU3LDUzLjIzOSBMMi41NywxMC44MDQgQzIuNTcsOC41OTYgNC4zNTMsNi44MTMgNi41NjEsNi44MTMgTDMwLjQzMyw2LjgxMyB6IE0yLjU3LDEwLjgwNCBMMi41NywxMC43ODUgTTM0LjQwNiwxMC44MDQgTDM0LjQwNiwxMC43ODUgTTYuNTYxLDYuODEzIEw2LjU0Miw2LjgxMyIgZmlsbD0iI0FBQUFBQSIvPgogICAgPHBhdGggZD0iTTMxLjc1MSw1LjQ3NiBMMzEuNzUxLDUuNDk1IEMzMy45Niw1LjQ5NSAzNS43NDIsNy4yNzggMzUuNzQyLDkuNDY4IEwzNS43MjMsOS40NjggTDM1LjcyMyw1MS45MDIgTDM1Ljc0Miw1MS45MjEgQzM1Ljc0Miw1NC4xMTEgMzMuOTYsNTUuODk0IDMxLjc1MSw1NS44OTQgTDcuODc5LDU1Ljg5NCBDNS42OSw1NS44OTQgMy45MDcsNTQuMTExIDMuOTA3LDUxLjkyMSBMMy44ODgsNTEuOTAyIEwzLjg4OCw5LjQ2OCBMMy45MDcsOS40NjggQzMuOTA3LDcuMjc4IDUuNjksNS40OTUgNy44NzksNS40OTUgTDcuODc5LDUuNDc2IEwzMS43NTEsNS40NzYgeiIgZmlsbD0iIzNFNzVBNiIvPgogICAgPHBhdGggZD0iTTE1LjM3OCw0NC4zNDUgTDI0LjIzMyw0NC4zNDUgTDI0LjI1Miw0NC4zNjUgQzI2LjQ0Miw0NC4zNjUgMjguMjI0LDQyLjU4MiAyOC4yMjQsNDAuMzczIEwyOC4yMjQsMjEuNjk0IEwyOC4yMjQsMjEuNzEzIEMyOC4yMjQsMTkuNTA0IDI2LjQ0MiwxNy43MjIgMjQuMjUyLDE3LjcyMiBMMTUuMzc4LDE3LjcyMiBMMTUuMzk3LDE3LjcyMiBDMTMuMTg4LDE3LjcyMiAxMS40MDYsMTkuNTA0IDExLjQwNiwyMS43MTMgTDExLjQwNiwyMS42OTQgTDExLjQwNiw0MC4zNzMgQzExLjQwNiw0Mi41ODIgMTMuMTg4LDQ0LjM2NSAxNS4zOTcsNDQuMzY1IiBmaWxsPSIjRkZGRkZGIi8+CiAgICA8cGF0aCBkPSJNMTkuODM0LDIzLjk0MiBDMjIuMDI0LDIzLjk0MiAyMy44MDcsMjUuNzI0IDIzLjgwNywyNy45MzMgTDIzLjgwNywzNi44MDggQzIzLjgwNywzOS4wMTcgMjIuMDI0LDQwLjc5OSAxOS44MzQsNDAuNzk5IEwxOS44MTUsNDAuNzggTDE3LjE0MSw0MC43OCBMMTcuMTYsNDAuNzk5IEMxNC45NTIsNDAuNzk5IDEzLjE2OSwzOS4wMTcgMTMuMTY5LDM2LjgwOCBMMTMuMTY5LDI3LjkzMyBDMTMuMTY5LDI1LjcyNCAxNC45NTIsMjMuOTQyIDE3LjE2LDIzLjk0MiBMMTkuODM0LDIzLjk0MiB6IE0xMy4xNjksMjcuOTMzIEwxMy4xNjksMjcuOTE0IE0yMy44MDcsMjcuOTMzIEwyMy44MDcsMjcuOTE0IE0xNy4xNiwyMy45NDIgTDE3LjE0MSwyMy45NDIiIGZpbGw9IiNBQUFBQUEiLz4KICAgIDxwYXRoIGQ9Ik0yMS4xNTIsMjIuNjI0IEMyMy4zNjEsMjIuNjI0IDI1LjE0MywyNC40MDcgMjUuMTQzLDI2LjU5NiBMMjUuMTI0LDI2LjU5NiBMMjUuMTI0LDM1LjQ3MSBMMjUuMTQzLDM1LjQ5IEMyNS4xNDMsMzcuNjggMjMuMzYxLDM5LjQ2MiAyMS4xNTIsMzkuNDYyIEwxOC40NzgsMzkuNDYyIEMxNi4yODksMzkuNDYyIDE0LjUwNiwzNy42OCAxNC41MDYsMzUuNDkgTDE0LjQ4NywzNS40NzEgTDE0LjQ4NywyNi41OTYgTDE0LjUwNiwyNi41OTYgQzE0LjUwNiwyNC40MDcgMTYuMjg5LDIyLjYyNCAxOC40NzgsMjIuNjI0IEwyMS4xNTIsMjIuNjI0IHoiIGZpbGw9IiMzRTc1QTYiLz4KICAgIDxwYXRoIGQ9Ik0xMS44NTEsNS40OTUgQzExLjAxOCw1LjQ5NSA5Ljg1Niw1LjMwMSA4Ljg2Nyw1LjMyMSBDNS4yMjUsNS40MTggNC4yOTQsOC41MTggMy45MDcsMTEuNzkyIEMzLjE3MSwxOC4wNTEgNC40MywyNC45ODggMy45MDcsMzIuNjggQzMuNDQyLDM5LjMyNiAxLjY3OSw0Ni41MTUgMy41NzgsNTAuNTg0IEM1LjIwNSw1NC4xMTEgOS41NDYsNTUuMzEyIDE0LjgzNSw1Ni4yMjMgQzIwLjQzNSw1Ny4yMTEgMjcuMDYyLDU3Ljg3IDMxLjA5Miw1NS44OTMgQzMzLjM5OCw1NC43NyAzNC44MzIsNTIuNzkzIDM1Ljc0Myw1MC40MjkgQzM4LjQzNiw0My4zNTcgMzYuMjI3LDMyLjkxMyAzNi43MzEsMjIuNDExIEMzNi45NjMsMTcuNTg2IDM3Ljc3NywxMi43NDIgMzYuNDAxLDkuNDY3IEMzMy4xNDYsMS43MTcgMTcuNjA2LDIuNzYzIDEwLjUzNCw1LjQ5NSIgZmlsbC1vcGFjaXR5PSIwIiBzdHJva2U9IiMyMzFGMjAiIHN0cm9rZS13aWR0aD0iMC4yIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KICAgIDxwYXRoIGQ9Ik0xNy4xNjEsMTguNzQ5IEMxMC40NTYsMTguNDk3IDguNDQxLDI2Ljc5IDkuODc1LDMzLjM1OSBDMTEuMTczLDM5LjM2NSAxNS4zNzgsNDMuOTM4IDE5LjQ4Niw0My42MjggQzIzLjMwMyw0My4zMzcgMjcuMDYyLDM4Ljg0MiAyOC4xMDgsMzMuMTg0IEMyOC43MjgsMjkuODUyIDI4LjQxOCwyNi4xMTIgMjcuMTIsMjMuMzk5IEMyNS4yMjEsMTkuNDQ2IDIxLjI0OSwxNy42NjQgMTcuMTYxLDE4Ljc0OSIgZmlsbC1vcGFjaXR5PSIwIiBzdHJva2U9IiMzRjNGM0YiIHN0cm9rZS13aWR0aD0iMC4yIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KICAgIDxwYXRoIGQ9Ik0xNy4xNjEsMjYuNzEzIEMxMi41ODgsMjcuMzMyIDEzLjk4MywzMy41MzMgMTYuNTAyLDM1LjAwNiBDMjAuMzM4LDM3LjI3MyAyNi43NzEsMjguNTczIDE3LjE2MSwyNi43MTMiIGZpbGwtb3BhY2l0eT0iMCIgc3Ryb2tlPSIjM0YzRjNGIiBzdHJva2Utd2lkdGg9IjAuMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+CiAgICA8cGF0aCBkPSJNNDcuNjEyLDQ0Ljc5NyBMNTEuMTU1LDQ0Ljc5NyBMNTEuMTU1LDM0LjMzMSBMNTMuNzYyLDMxLjMxOCBMNjIuODAyLDQ0Ljc5NyBMNjYuOTk3LDQ0Ljc5NyBMNTYuMjg2LDI4Ljk5NyBMNjYuMjIzLDE3LjM1IEw2MS44MjUsMTcuMzUgTDUzLjQzNiwyNy42NTMgQzUyLjc0MywyOC41NDkgNTIuMDEsMjkuNTI2IDUxLjI3NywzMC41ODUgTDUxLjE1NSwzMC41ODUgTDUxLjE1NSwxNy4zNSBMNDcuNjEyLDE3LjM1IHoiIGZpbGw9IiMyMzFGMjAiLz4KICAgIDxwYXRoIGQ9Ik03NC44NTYsMjQuNjM5IEM2OS4zOTksMjQuNjM5IDY1LjA4MywyOC41MDggNjUuMDgzLDM1LjEwNSBDNjUuMDgzLDQxLjMzNiA2OS4xOTYsNDUuMjQ1IDc0LjUzMSw0NS4yNDUgQzc5LjI5NSw0NS4yNDUgODQuMzQ1LDQyLjA2OSA4NC4zNDUsMzQuNzc5IEM4NC4zNDUsMjguNzUyIDgwLjUxNywyNC42MzkgNzQuODU2LDI0LjYzOSB6IE03NC43NzUsMjcuMzI3IEM3OS4wMSwyNy4zMjcgODAuNjgsMzEuNTYyIDgwLjY4LDM0LjkwMiBDODAuNjgsMzkuMzQgNzguMTE0LDQyLjU1OCA3NC42OTQsNDIuNTU4IEM3MS4xOTEsNDIuNTU4IDY4LjcwNywzOS4zIDY4LjcwNywzNC45ODMgQzY4LjcwNywzMS4yMzYgNzAuNTQsMjcuMzI3IDc0Ljc3NSwyNy4zMjcgeiIgZmlsbD0iIzIzMUYyMCIvPgogICAgPHBhdGggZD0iTTg1LjkzMyw0NC43MTYgQzg3LjExNCw0NC44NzkgODguOTg4LDQ1LjA0MiA5MS40MzEsNDUuMDQyIEM5NS45MTEsNDUuMDQyIDk5LjAwNiw0NC4yMjcgMTAwLjkyLDQyLjQ3NiBDMTAyLjMwNCw0MS4xMzIgMTAzLjI0MSwzOS4zNCAxMDMuMjQxLDM2Ljk3OCBDMTAzLjI0MSwzMi45MDYgMTAwLjE4NywzMC43NDggOTcuNTgsMzAuMDk2IEw5Ny41OCwzMC4wMTUgQzEwMC40NzIsMjguOTU2IDEwMi4yMjMsMjYuNjM1IDEwMi4yMjMsMjMuOTg4IEMxMDIuMjIzLDIxLjgyOSAxMDEuMzY4LDIwLjIgOTkuOTQyLDE5LjE0MSBDOTguMjMyLDE3Ljc1NyA5NS45NTEsMTcuMTQ2IDkyLjQwOCwxNy4xNDYgQzg5LjkyNCwxNy4xNDYgODcuNDgxLDE3LjM5IDg1LjkzMywxNy43MTYgeiBNODkuNDc2LDIwLjExOSBDOTAuMDQ2LDE5Ljk5NyA5MC45ODMsMTkuODc0IDkyLjYxMiwxOS44NzQgQzk2LjE5NiwxOS44NzQgOTguNjM5LDIxLjEzNyA5OC42MzksMjQuMzU0IEM5OC42MzksMjcuMDAxIDk2LjQ0LDI4Ljk1NiA5Mi42OTMsMjguOTU2IEw4OS40NzYsMjguOTU2IHogTTg5LjQ3NiwzMS42NDQgTDkyLjQwOCwzMS42NDQgQzk2LjI3NywzMS42NDQgOTkuNDk0LDMzLjE5MSA5OS40OTQsMzYuOTM4IEM5OS40OTQsNDAuOTI5IDk2LjExNCw0Mi4yNzMgOTIuNDQ5LDQyLjI3MyBDOTEuMTg3LDQyLjI3MyA5MC4xNjksNDIuMjMyIDg5LjQ3Niw0Mi4xMSB6IiBmaWxsPSIjMjMxRjIwIi8+CiAgICA8cGF0aCBkPSJNMTEzLjM0LDI0LjYzOSBDMTA3Ljg4MywyNC42MzkgMTAzLjU2NywyOC41MDggMTAzLjU2NywzNS4xMDUgQzEwMy41NjcsNDEuMzM2IDEwNy42OCw0NS4yNDUgMTEzLjAxNSw0NS4yNDUgQzExNy43NzksNDUuMjQ1IDEyMi44MjksNDIuMDY5IDEyMi44MjksMzQuNzc5IEMxMjIuODI5LDI4Ljc1MiAxMTkuMDAxLDI0LjYzOSAxMTMuMzQsMjQuNjM5IHogTTExMy4yNTksMjcuMzI3IEMxMTcuNDk0LDI3LjMyNyAxMTkuMTY0LDMxLjU2MiAxMTkuMTY0LDM0LjkwMiBDMTE5LjE2NCwzOS4zNCAxMTYuNTk4LDQyLjU1OCAxMTMuMTc4LDQyLjU1OCBDMTA5LjY3NSw0Mi41NTggMTA3LjE5MSwzOS4zIDEwNy4xOTEsMzQuOTgzIEMxMDcuMTkxLDMxLjIzNiAxMDkuMDI0LDI3LjMyNyAxMTMuMjU5LDI3LjMyNyB6IiBmaWxsPSIjMjMxRjIwIi8+CiAgICA8cGF0aCBkPSJNMTMzLjk4Nyw0NC43OTcgTDEzNy41NzEsNDQuNzk3IEwxMzcuNTcxLDIwLjM2MyBMMTQ1Ljk2LDIwLjM2MyBMMTQ1Ljk2LDE3LjM1IEwxMjUuNjM5LDE3LjM1IEwxMjUuNjM5LDIwLjM2MyBMMTMzLjk4NywyMC4zNjMgeiIgZmlsbD0iIzNFNzVBNiIvPgogICAgPHBhdGggZD0iTTE1MS4yOTUsMjQuNjM5IEMxNDUuODM4LDI0LjYzOSAxNDEuNTIxLDI4LjUwOCAxNDEuNTIxLDM1LjEwNSBDMTQxLjUyMSw0MS4zMzYgMTQ1LjYzNCw0NS4yNDUgMTUwLjk2OSw0NS4yNDUgQzE1NS43MzQsNDUuMjQ1IDE2MC43ODQsNDIuMDY5IDE2MC43ODQsMzQuNzc5IEMxNjAuNzg0LDI4Ljc1MiAxNTYuOTU2LDI0LjYzOSAxNTEuMjk1LDI0LjYzOSB6IE0xNTEuMjEzLDI3LjMyNyBDMTU1LjQ0OSwyNy4zMjcgMTU3LjExOCwzMS41NjIgMTU3LjExOCwzNC45MDIgQzE1Ny4xMTgsMzkuMzQgMTU0LjU1Myw0Mi41NTggMTUxLjEzMiw0Mi41NTggQzE0Ny42Myw0Mi41NTggMTQ1LjE0NiwzOS4zIDE0NS4xNDYsMzQuOTgzIEMxNDUuMTQ2LDMxLjIzNiAxNDYuOTc4LDI3LjMyNyAxNTEuMjEzLDI3LjMyNyB6IiBmaWxsPSIjM0U3NUE2Ii8+CiAgICA8cGF0aCBkPSJNMTcwLjU5OCwyNC42MzkgQzE2NS4xNDEsMjQuNjM5IDE2MC44MjQsMjguNTA4IDE2MC44MjQsMzUuMTA1IEMxNjAuODI0LDQxLjMzNiAxNjQuOTM3LDQ1LjI0NSAxNzAuMjcyLDQ1LjI0NSBDMTc1LjAzNyw0NS4yNDUgMTgwLjA4Nyw0Mi4wNjkgMTgwLjA4NywzNC43NzkgQzE4MC4wODcsMjguNzUyIDE3Ni4yNTksMjQuNjM5IDE3MC41OTgsMjQuNjM5IHogTTE3MC41MTcsMjcuMzI3IEMxNzQuNzUyLDI3LjMyNyAxNzYuNDIxLDMxLjU2MiAxNzYuNDIxLDM0LjkwMiBDMTc2LjQyMSwzOS4zNCAxNzMuODU2LDQyLjU1OCAxNzAuNDM1LDQyLjU1OCBDMTY2LjkzMyw0Mi41NTggMTY0LjQ0OSwzOS4zIDE2NC40NDksMzQuOTgzIEMxNjQuNDQ5LDMxLjIzNiAxNjYuMjgxLDI3LjMyNyAxNzAuNTE3LDI3LjMyNyB6IiBmaWxsPSIjM0U3NUE2Ii8+CiAgICA8cGF0aCBkPSJNMTgxLjU1Myw0NC43OTcgTDE4NS4xMzYsNDQuNzk3IEwxODUuMTM2LDE1Ljg4NCBMMTgxLjU1MywxNS44ODQgeiIgZmlsbD0iIzNFNzVBNiIvPgogICAgPHBhdGggZD0iTTE5MC45OCw0NC43OTcgTDE5MS4xNDMsNDEuNTQgTDE5MS4yNjUsNDEuNTQgQzE5Mi43MzIsNDQuMTQ2IDE5NS4wMTIsNDUuMjQ1IDE5Ny44NjMsNDUuMjQ1IEMyMDIuMjYxLDQ1LjI0NSAyMDYuNyw0MS43NDMgMjA2LjcsMzQuNjk4IEMyMDYuNzQsMjguNzEyIDIwMy4yNzksMjQuNjM5IDE5OC4zOTIsMjQuNjM5IEMxOTUuMjE2LDI0LjYzOSAxOTIuOTM1LDI2LjA2NCAxOTEuNjczLDI4LjI2NCBMMTkxLjU5MSwyOC4yNjQgTDE5MS41OTEsMTUuODg0IEwxODguMDQ4LDE1Ljg4NCBMMTg4LjA0OCwzOS43MDcgQzE4OC4wNDgsNDEuNDU4IDE4Ny45NjcsNDMuNDU0IDE4Ny44ODUsNDQuNzk3IHogTTE5MS41OTEsMzMuMzU0IEMxOTEuNTkxLDMyLjc4NCAxOTEuNzEzLDMyLjI5NSAxOTEuNzk1LDMxLjg4OCBDMTkyLjUyOCwyOS4xNTkgMTk0LjgwOCwyNy40OSAxOTcuMjUyLDI3LjQ5IEMyMDEuMDgsMjcuNDkgMjAzLjExNiwzMC44NyAyMDMuMTE2LDM0LjgyIEMyMDMuMTE2LDM5LjM0IDIwMC44NzYsNDIuMzk1IDE5Ny4xMyw0Mi4zOTUgQzE5NC41MjMsNDIuMzk1IDE5Mi40NDYsNDAuNjg0IDE5MS43NTQsMzguMiBDMTkxLjY3MywzNy43OTMgMTkxLjU5MSwzNy4zNDUgMTkxLjU5MSwzNi44OTcgeiIgZmlsbD0iIzNFNzVBNiIvPgogICAgPHBhdGggZD0iTTIxNi41NzUsMjQuNjM5IEMyMTEuMTE4LDI0LjYzOSAyMDYuODAxLDI4LjUwOCAyMDYuODAxLDM1LjEwNSBDMjA2LjgwMSw0MS4zMzYgMjEwLjkxNCw0NS4yNDUgMjE2LjI0OSw0NS4yNDUgQzIyMS4wMTQsNDUuMjQ1IDIyNi4wNjQsNDIuMDY5IDIyNi4wNjQsMzQuNzc5IEMyMjYuMDY0LDI4Ljc1MiAyMjIuMjM2LDI0LjYzOSAyMTYuNTc1LDI0LjYzOSB6IE0yMTYuNDk0LDI3LjMyNyBDMjIwLjcyOSwyNy4zMjcgMjIyLjM5OSwzMS41NjIgMjIyLjM5OSwzNC45MDIgQzIyMi4zOTksMzkuMzQgMjE5LjgzMyw0Mi41NTggMjE2LjQxMiw0Mi41NTggQzIxMi45MSw0Mi41NTggMjEwLjQyNiwzOS4zIDIxMC40MjYsMzQuOTgzIEMyMTAuNDI2LDMxLjIzNiAyMTIuMjU4LDI3LjMyNyAyMTYuNDk0LDI3LjMyNyB6IiBmaWxsPSIjM0U3NUE2Ii8+CiAgICA8cGF0aCBkPSJNMjI0LjY0MiwyNS4wODcgTDIzMS4zMjEsMzQuNzM5IEwyMjQuMzE3LDQ0Ljc5NyBMMjI4LjI2Nyw0NC43OTcgTDIzMS4xMTgsNDAuMzU5IEMyMzEuODUxLDM5LjE3OCAyMzIuNTQzLDM4LjExOSAyMzMuMTk0LDM2LjkzOCBMMjMzLjI3NiwzNi45MzggQzIzMy45NjgsMzguMTE5IDIzNC42MiwzOS4yMTggMjM1LjM5NCw0MC4zNTkgTDIzOC4yODUsNDQuNzk3IEwyNDIuMzU3LDQ0Ljc5NyBMMjM1LjQzNCwzNC42MTYgTDI0Mi4xNTQsMjUuMDg3IEwyMzguMjg1LDI1LjA4NyBMMjM1LjUxNiwyOS4yODIgQzIzNC44NjQsMzAuMzQgMjM0LjIxMywzMS4zNTkgMjMzLjU2MSwzMi41NCBMMjMzLjQzOSwzMi41NCBDMjMyLjc4NywzMS40NCAyMzIuMTc2LDMwLjQyMiAyMzEuNDQzLDI5LjMyMiBMMjI4LjYzMywyNS4wODcgeiIgZmlsbD0iIzNFNzVBNiIvPgogIDwvZz4KPC9zdmc+Cg==" alt="brand logo"></div>
        </div>
        <div class="form-header__filler"></div><button class="form-header__button--print btn-bg-icon-only" onclick="return false;"></button><span class="form-language-selector hide"><span>Elija idioma</span><select id="form-languages" style="display:none;" data-default-lang="default">
            <option value="default" data-dir="ltr">default</option>
          </select></span><button class="form-header__button--homescreen btn-icon-only hide" type="button" aria-label="add to homescreen"><i class="icon icon-bookmark-o"> </i></button>
        <nav class="pages-toc hide" role="navigation"><label for="toc-toggle"></label><input class="ignore" id="toc-toggle" type="checkbox" value="show">
          <ul class="pages-toc__list"></ul>
          <div class="pages-toc__overlay"></div>
        </nav>
      </header>
      <form autocomplete="off" novalidate="novalidate" class="or clearfix theme-grid no-text-transform print-relevant-only" dir="ltr" id="a4E3J9gkULZe5eRqQph8zh" onsubmit="return false;" data-edited="false">
        <!--This form was created by transforming a OpenRosa-flavored (X)Form using an XSL stylesheet created by Enketo LLC.-->
        <section class="form-logo"> </section>
        <h3 dir="auto" id="form-title">Acuerdo De Transferencia Monetarias - Cash ECHO </h3>


        <section class="or-group or-appearance-field-list " name="/a4E3J9gkULZe5eRqQph8zh/grupo_preambulo">
          <h4><span lang="" class="question-label active">ACUERDO DE TRANSFERENCIAS</span></h4>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 235px;">
            <span lang="default" class="question-label active d-none" data-itext-id="/a4E3J9gkULZe5eRqQph8zh/grupo_preambulo/logo:label">This note can be read out loud</span>
            <img lang="default" class="active" src="https://kc.acf-e.org/comeal13/forms/a4E3J9gkULZe5eRqQph8zh/formid-media/10076" data-itext-id="/a4E3J9gkULZe5eRqQph8zh/grupo_preambulo/logo:label" alt="image">
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_preambulo/logo" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 140px;"><span lang="" class="question-label active">Con el apoyo financiero del Departamento para la Ayuda Humanitaria de la Comunidad Europea (ECHO), la Fundación Acción Contra el Hambre (ACH), ejecuta el proyecto MIRE+ para protección y asistencia humanitaria a personas recientemente desplazadas y comunidades confinadas en Colombia, asegurando que las necesidades humanitarias urgentes insatisfechas de las poblaciones más vulnerables sean cubiertas durante las primeras etapas de la emergencia a través de programa MPCA ayuda en efectivo para múltiples propósitos.</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_preambulo/nota_preambulo" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>
        </section><!--end of group -->
        <section class="or-group " name="/a4E3J9gkULZe5eRqQph8zh/grupo_politica_tratamiento_de_datos">
          <h4><span lang="" class="question-label active">2. POLÍTICA DE TRATAMIENTO DE DATOS Y AUTORIZACIÓN DE TRATAMIENTO DE DATOS PERSONALES.</span></h4><label class="question non-select or-appearance-field-list readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 161px;"><span lang="" class="question-label active">La Fundación Acción contra el Hambre con domicilio social en Madrid, España, número de identificación fiscal en Colombia NIT 812.002.416-5, cuenta con la Política de Privacidad y Protección de Datos Personales, que puede ser consultada en: https://www.accioncontraelhambre.co/politica-privacidad/, dando cumplimiento de la normatividad colombiana de protección de datos Ley 1581 de 2012 y legislación aplicable de la Unión Europea, por tanto es necesario que para la entrega de asistencia humanitaria y firma de este acuerdo de transferencia de efectivo usted, nos autorice mediante su firma el tratamiento de sus datos personales y contestando las siguientes preguntas:</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_politica_tratamiento_de_datos/presentacion_de_la_organizacon" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>
        </section><!--end of group -->
        <section class="or-group or-appearance-field-list " name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo">
          <h4><span lang="" class="question-label active">AUTORIZACIÓN DEL ACUERDO</span></h4>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized print-width-adjusted print-height-adjusted" style="width: 100%; height: 114px;">
            <fieldset>
              <legend><span lang="" class="question-label active">1. Autoriza de manera previa, expresa, e informada a Acción contra el Hambre, para el tratamiento de los datos personales y sensibles suministrados dentro de las finalidades legales, contractuales, comerciales y las aquí contempladas.</span>
              </legend>
              <div class="option-wrapper">
                <label class="option-wrapper-label" data-checked="true">
                  <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos" data-name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos" value="si" data-type-xml="select1" {{isset($data['autorizacion_acuerdo/autorizacion_tratamiento_de_datos']) && $data['autorizacion_acuerdo/autorizacion_tratamiento_de_datos'] == 'si' ? 'checked' : ''}}>
                  <span lang="" class="option-label active">SI</span>
                </label>
                <label class="">
                  <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos" data-name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos" value="no" data-type-xml="select1" {{isset($data['autorizacion_acuerdo/autorizacion_tratamiento_de_datos']) && $data['autorizacion_acuerdo/autorizacion_tratamiento_de_datos'] == 'no' ? 'checked' : ''}}>
                  <span lang="" class="option-label active">NO</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized print-width-adjusted print-height-adjusted" style="width: 100%; height: 135px;">
            <fieldset>
              <legend><span lang="" class="question-label active">2. Autorizo la toma de fotografías / videos /audios en el marco de las actividades desarrolladas para este proyecto por Acción contra el Hambre para publicarse de forma digital o impresa por Acción contra el Hambre. Autorizo el uso de la imagen en las comunicaciones internas y externas dirigidas a los diferentes públicos con los que se relaciona Acción contra el Hambre.</span>
              </legend>
              <div class="option-wrapper"><label class="" data-checked="true">
                  <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_multimedia" data-name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_multimedia" value="si" data-type-xml="select1" {{isset($data['autorizacion_acuerdo/autorizacion_multimedia']) && $data['autorizacion_acuerdo/autorizacion_multimedia'] == 'si' ? 'checked' : ''}}>
                  <span lang="" class="option-label active">SI</span></label><label class="">
                  <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_multimedia" data-name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_multimedia" value="no" data-type-xml="select1" {{isset($data['autorizacion_acuerdo/autorizacion_multimedia']) && $data['autorizacion_acuerdo/autorizacion_multimedia'] == 'no' ? 'checked' : ''}}>
                  <span lang="" class="option-label active">NO</span></label><label class="filler"></label></div>
            </fieldset>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized print-width-adjusted print-height-adjusted" style="width: 100%; height: 114px;">
            <fieldset>
              <legend><span lang="" class="question-label active">3. Autorizo a Acción contra el Hambre el uso de fotografías, videos o audios sin que en esta autorización medien prestaciones en moneda o en especie y sin límite temporal ni territorial, para que pueda ser tomadas durante mi participación en las actividades desarrolladas.</span>
              </legend>
              <div class="option-wrapper"><label class="" data-checked="true">
                  <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias" data-name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias" value="si" data-type-xml="select1" {{isset($data['autorizacion_acuerdo/autorizacion_uso_fotografias']) && $data['autorizacion_acuerdo/autorizacion_uso_fotografias'] == 'si' ? 'checked' : ''}}><span lang="" class="option-label active">SI</span></label><label class="">
                  <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias" data-name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias" value="no" data-type-xml="select1" {{isset($data['autorizacion_acuerdo/autorizacion_uso_fotografias']) && $data['autorizacion_acuerdo/autorizacion_uso_fotografias'] == 'no' ? 'checked' : ''}}><span lang="" class="option-label active">NO</span></label><label class="filler"></label>
              </div>
            </fieldset>
          </fieldset><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">Todos los datos personales que proporcione a Acción contra el Hambre se reunirán, utilizarán y compartirán únicamente con los siguientes fines:</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/datos_recolectados" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• Entrega de la asistencia humanitaria</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/entrega_de_la_asistencia_humanitaria" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• Evaluación, monitoreo y seguimiento de la entrega de asistencia humanitaria</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/monitoreo_de_la_entrega" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• Medios y soportes de comprobación ante el donante.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/medios_soportes" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• Comunicación en caso de que se interpongan peticiones, quejas y retroalimentaciones.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/rendicion_de_cuentas" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 182px;"><span lang="" class="question-label active"><strong>Nota:</strong> Le informamos que todos los datos personales, especialmente los de carácter sensible o especial que usted autorice (Información sobre menores de edad, genero, origen étnico, víctimas de conflicto armado, estatus migratorio, declaración de personas en condición de discapacidad y las que hubiese lugar de especial protección.) y que nos suministre, serán tratados mediante el uso de medidas de seguridad técnicas, físicas y administrativas con el fin garantizar su protección reforzada. En cualquier caso, usted se puede comunicar a nuestros canales para ejercer sus derechos de eliminación, actualización, rectificación y conocimiento sobre sus Datos Personales, mediante la línea celular (+57) 322 341 2814. y el correo electrónico: protecciondatos@co.acfspain.org</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/seguridad_de_los_datos" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>
        </section><!--end of group -->

        <section class="or-group or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <h4><span lang="" class="question-label active">3. DATOS DE LA PERSONA PARTICIPANTE</span></h4>
          <fieldset class="question simple-select print-width-adjusted print-height-adjusted" style="width: 100%; height: 93px;">
            <fieldset>
              <legend><span lang="" class="question-label active">Si la información corresponde a un menor de edad seleccione la siguinte opción, de lo contrario continue con Nombres y apellidos del participante.</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion" value="menor_edad" data-type-xml="select1" {{isset($data['grupo_datos_beneficiario/tipo_persona_autorizacion']) && $data['grupo_datos_beneficiario/tipo_persona_autorizacion'] == 'si' ? 'checked' : ''}}><span lang="" class="option-label active">Persona menor de edad con representante legal</span></label></div>
            </fieldset>
          </fieldset>
          <label class="question non-select print-width-adjusted print-height-adjusted" style="width: 100%; height: 84px;"><span lang="" class="question-label active">Nombres y apellidos:</span><span lang="" class="or-hint active">(Datos del participante dividir por primer nombre, segundo nombre, primer apellido y segundo apellido)</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/nombre_participante" data-constraint="regex(., '^[a-zA-Z\D]{7,60}$')" data-type-xml="string" maxlength="2000" value="{{ ($data['grupo_datos_beneficiario/nombre_participante']) ?? ''}}"><span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span>
          </label>
          <!-- datos del representante legas -->
          <?php if (isset($data['grupo_datos_beneficiario/tipo_persona_autorizacion']) == 'menor_edad') { ?>
            <!-- Datos de representante legal -->
            <section class="or-group or-branch disabled" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'">
              <h4><span lang="" class="question-label active">Datos de representante legal</span></h4>
              <fieldset class="question simple-select or-branch disabled" disabled="">
                <fieldset>
                  <legend><span lang="" class="question-label active">Nacionalidad de representante legal</span><span class="required">*</span>
                  </legend>
                  <div class="option-wrapper">
                    <label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante" value="colombiano_a" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante'] == 'colombiano_a' ? 'checked' : ''}}><span lang="" class="option-label active">Colombiano/a</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante" value="venezolano_a" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante'] == 'venezolano_a' ? 'checked' : ''}}><span lang="" class="option-label active">Venezolano/a</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante" value="colombovenezolano" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante'] == 'colombovenezolano' ? 'checked' : ''}}><span lang="" class="option-label active">Colombo-Venezolano</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante" value="otra_nacionalidad" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante'] == 'otra_nacionalidad' ? 'checked' : ''}}><span lang="" class="option-label active">Otra</span>
                    </label>
                  </div>
                </fieldset><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </fieldset>

              <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Nombre de representante legal</span><span class="required">*</span>
                <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nombre_representante" data-required="true()" data-constraint="regex(., '^[a-zA-Z\D]{10,150}$')" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="string" maxlength="2000" disabled="" value="{{($data['grupo_datos_beneficiario/datos_representante_legal/nombre_representante']) ?? ''}}"><span lang="" class="or-constraint-msg active">Este campo sólo permite texto</span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </label>

              <!-- cuando es otra nacionalidad -->
              <?php
              ///a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  
              ///a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante  = 'otra_nacionalidad' 
              if (isset($data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante']) == 'otra_nacionalidad') {
              ?>
                <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Otra nacionalidad, ¿Cuál?</span><span class="required">*</span>
                  <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/otra_nacionalidad_representante" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante  = 'otra_nacionalidad'" data-type-xml="string" maxlength="2000" disabled="" value="{{ ($data['grupo_datos_beneficiario/datos_representante_legal/otra_nacionalidad_representante']) ?? ''}}">
                  <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

                <label class="question or-appearance-minimal or-branch disabled">
                  <span lang="" class="question-label active">Tipo de documentación de representante legal</span><span class="required">*</span>
                  <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante  = 'otra_nacionalidad'" data-type-xml="select1" style="display: none;" disabled="">
                    <option value="">...</option>
                    <option value="pasaporte_7" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante'] == "pasaporte_7" ? "selected": ''}}>Pasaporte</option>
                    <option value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante'] == "cedula_extranjera" ? "selected": ''}}>Cédula de extranjería</option>
                    <option value="visa" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante'] == "visa" ? "selected": ''}}>Visa</option>
                    <option value="otro_id_4" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante'] == "otro_id_4" ? "selected": ''}}>Otro</option>
                  </select>

                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li class="disabled">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="39643.87468881256" value="pasaporte_7" disabled="" readonly="" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante'] == "pasaporte_7" ? "checked": ''}}>
                            <span class="option-label">Pasaporte</span>
                          </label>
                        </a>
                      </li>
                      <li class="disabled">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="39643.87468881256" value="cedula_extranjera" disabled="" readonly="" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante'] == "cedula_extranjera" ? "checked": ''}}>
                            <span class="option-label">Cédula de extranjería</span>
                          </label>
                        </a>
                      </li>
                      <li class="disabled">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="39643.87468881256" value="visa" disabled="" readonly="" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante'] == "visa" ? "checked": ''}}>
                            <span class="option-label">Visa</span>
                          </label>
                        </a>
                      </li>
                      <li class="disabled">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="39643.87468881256" value="otro_id_4" disabled="" readonly="" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante'] == "otro_id_4" ? "checked": ''}}>
                            <span class="option-label">Otro</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <span class="or-option-translations" style="display:none;">
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

              <?php } ?>

              <!-- fin otra_nacionalidad  -->

              <!-- cuando es colombiano -->

              <?php if (isset($data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante']) == 'colombiano_a') { ?>
                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de identificación de representante legal</span><span class="required">*</span>
                  <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante  = 'colombiano_a'" data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value="" data-items-path="instance('tipo_idcolombia')/root/item[nacionalidad_representante= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante ]">...</option>
                    <option value="cedula_colombiana" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante'] =="cedula_colombiana" ? 'selected' : '' }}>Cédula colombiana</option>
                    <option value="pasaporte_13" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante'] =="pasaporte_13" ? 'selected' : '' }}>Pasaporte colombiano</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">Cédula colombiana</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li class="active">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="6746.255451479954" value="cedula_colombiana" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante'] =="cedula_colombiana" ? 'checked' : '' }}>
                            <span class="option-label">Cédula colombiana</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="6746.255451479954" value="pasaporte_13" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante'] =="pasaporte_13" ? 'checked' : '' }}>
                            <span class="option-label">Pasaporte colombiano</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div>

                  <span class="or-option-translations" style="display:none;"></span>

                  <span class="itemset-labels" data-value-ref="name" data-label-type="itext" data-label-ref="itextId">
                    <span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-0">Cédula colombiana</span>
                    <span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-1">Tarjeta de identidad</span>
                    <span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-2">Registro civil de nacimiento</span>
                    <span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-3">Pasaporte colombiano</span>
                    <span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-4">Certificado de nacido/a vivo/a</span>
                    <span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-5">Acta de nacimiento</span>
                    <span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-6">Sin identificación</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>
              <?php } ?>
              <!-- fin cuando es colombiano -->

              <!-- cuando sea venezolano -->
              <?php if (isset($data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante']) == 'venezolano_a') { ?>
                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de identificación de representante legal</span><span class="required">*</span>
                  <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante  = 'venezolano_a'" data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value="" data-items-path="instance('tipo_idvenezuela')/root/item[nacionalidad_representante= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante ]">...</option>
                    <option value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='cedula_extranjera' ? 'selected': ''}}>Cédula de extranjería</option>
                    <option value="pasaporte_venezolano" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='pasaporte_venezolano' ? 'selected': ''}}>Pasaporte venezolano</option>
                    <option value="permiso_especial_permanencia" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='permiso_especial_permanencia' ? 'selected': ''}}>Permiso Especial de Permanencia (PEP)</option>
                    <option value="pepff" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='pepff' ? 'selected': ''}}>Permiso Especial de Permanencia para el Fomento de la Formalización (PFF)</option>
                    <option value="permiso_permanencia" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='permiso_permanencia' ? 'selected': ''}}>Permiso de Ingreso y Permanencia (PIP)</option>
                    <option value="permiso_temporal_proteccion" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='permiso_temporal_proteccion' ? 'selected': ''}}>Permiso Temporal de Protección (PTP)</option>
                    <option value="permiso_transito_temporal" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='permiso_transito_temporal' ? 'selected': ''}}>Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</option>
                    <option value="tarjeta_movilidad_fronteriza" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='tarjeta_movilidad_fronteriza' ? 'selected': ''}}>Tarjeta de movilidad fronteriza (TMF)</option>
                    <option value="carta_solicitud_asilo" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='carta_solicitud_asilo' ? 'selected': ''}}>Carta Solicitante de Refugio o Asilo</option>
                    <option value="visa" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='visa' ? 'selected': ''}}>Visa</option>
                    <option value="sin_identificacion_col" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='sin_identificacion_col' ? 'selected': ''}}>Sin identificación colombiana con documento venezolano</option>
                    <option value="otro_id_1" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']=='otro_id_1' ? 'selected': ''}}>Otro</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='cedula_extranjera' ? 'checked': ''}}>
                            <span class="option-label">Cédula de extranjería</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="pasaporte_venezolano" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='pasaporte_venezolano' ? 'checked': ''}}>
                            <span class="option-label">Pasaporte venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="permiso_especial_permanencia" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='permiso_especial_permanencia' ? 'checked': ''}}>
                            <span class="option-label">Permiso Especial de Permanencia (PEP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="pepff" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='pepff' ? 'checked': ''}}>
                            <span class="option-label">Permiso Especial de Permanencia para el Fomento de la Formalización (PFF)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="permiso_permanencia" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='permiso_permanencia' ? 'checked': ''}}>
                            <span class="option-label">Permiso de Ingreso y Permanencia (PIP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="permiso_temporal_proteccion" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='permiso_temporal_proteccion' ? 'checked': ''}}>
                            <span class="option-label">Permiso Temporal de Protección (PTP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="permiso_transito_temporal" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='permiso_transito_temporal' ? 'checked': ''}}>
                            <span class="option-label">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="tarjeta_movilidad_fronteriza" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='tarjeta_movilidad_fronteriza' ? 'checked': ''}}>
                            <span class="option-label">Tarjeta de movilidad fronteriza (TMF)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="carta_solicitud_asilo" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='carta_solicitud_asilo' ? 'checked': ''}}>
                            <span class="option-label">Carta Solicitante de Refugio o Asilo</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="visa" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='visa' ? 'checked': ''}}>
                            <span class="option-label">Visa</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="sin_identificacion_col" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='sin_identificacion_col' ? 'checked': ''}}>
                            <span class="option-label">Sin identificación colombiana con documento venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="46844.42235337292" value="otro_id_1" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante'] =='otro_id_1' ? 'checked': ''}}>
                            <span class="option-label">Otro</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div><span class="or-option-translations" style="display:none;"></span><span class="itemset-labels" data-value-ref="name" data-label-type="itext" data-label-ref="itextId"><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-0">Cédula de extranjería</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-1">Pasaporte venezolano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-2">Acta de nacimiento</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-3">Permiso Especial de Permanencia (PEP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-4">Permiso Especial de Permanencia para el Fomento de la Formalización (PFF)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-5">Permiso de Ingreso y Permanencia (PIP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-6">Permiso Temporal de Protección (PTP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-7">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-8">Tarjeta de movilidad fronteriza (TMF)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-9">Carta Solicitante de Refugio o Asilo</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-10">Visa</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-11">Sin identificación colombiana con documento venezolano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-12">Otro</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

              <?php } ?>

              <!-- fin cuando sea venezolano -->

              <!-- cuando sea colombio-venezolano -->
              <?php if (isset($data['grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante']) == 'colombovenezolano') { ?>
                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de identificación de representante legal</span><span class="required">*</span>
                  <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante  = 'colombovenezolano'" data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value="" data-items-path="instance('tipo_idbinacional')/root/item[nacionalidad_representante= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante ]">...</option>
                    <option value="cedula_colombiana" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "cedula_colombiana" ? "selected": ""}}>Cédula colombiana</option>
                    <option value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "cedula_extranjera" ? "selected": ""}}>Cédula de extranjería</option>
                    <option value="pasaporte_venezolano" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "pasaporte_venezolano" ? "selected": ""}}>Pasaporte venezolano</option>
                    <option value="permiso_especial_permanencia" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "permiso_especial_permanencia" ? "selected": ""}}>Permiso Especial de Permanencia (PEP)</option>
                    <option value="permiso_permanencia" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "permiso_permanencia" ? "selected": ""}}>Permiso de Ingreso y Permanencia (PIP)</option>
                    <option value="permiso_temporal_proteccion" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "permiso_temporal_proteccion" ? "selected": ""}}>Permiso Temporal de Protección (PTP)</option>
                    <option value="permiso_transito_temporal" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "permiso_transito_temporal" ? "selected": ""}}>Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</option>
                    <option value="tarjeta_movilidad_fronteriza" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "tarjeta_movilidad_fronteriza" ? "selected": ""}}>Tarjeta de movilidad fronteriza (TMF)</option>
                    <option value="carta_solicitud_asilo" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "carta_solicitud_asilo" ? "selected": ""}}>Carta Solicitante de Refugio o Asilo</option>
                    <option value="visa" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "visa" ? "selected": ""}}>Visa</option>
                    <option value="sin_identificacion_col" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "sin_identificacion_col" ? "selected": ""}}>Sin identificación colombiana con documento venezolano</option>
                    <option value="otro_id_3" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) && $data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante'] == "otro_id_3" ? "selected": ""}}>Otro</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="cedula_colombiana" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "cedula_colombiana" ? "checked": ""}}>
                            <span class="option-label">Cédula colombiana</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "cedula_extranjera" ? "checked": ""}}>
                            <span class="option-label">Cédula de extranjería</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="pasaporte_venezolano" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "pasaporte_venezolano" ? "checked": ""}}>
                            <span class="option-label">Pasaporte venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="permiso_especial_permanencia" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "permiso_especial_permanencia" ? "checked": ""}}>
                            <span class="option-label">Permiso Especial de Permanencia (PEP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="permiso_permanencia" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "permiso_permanencia" ? "checked": ""}}>
                            <span class="option-label">Permiso de Ingreso y Permanencia (PIP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="permiso_temporal_proteccion" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "permiso_temporal_proteccion" ? "checked": ""}}>
                            <span class="option-label">Permiso Temporal de Protección (PTP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="permiso_transito_temporal" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "permiso_transito_temporal" ? "checked": ""}}>
                            <span class="option-label">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="tarjeta_movilidad_fronteriza" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "tarjeta_movilidad_fronteriza" ? "checked": ""}}>
                            <span class="option-label">Tarjeta de movilidad fronteriza (TMF)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="carta_solicitud_asilo" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "carta_solicitud_asilo" ? "checked": ""}}>
                            <span class="option-label">Carta Solicitante de Refugio o Asilo</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="visa" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "visa" ? "checked": ""}}>
                            <span class="option-label">Visa</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="sin_identificacion_col" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "sin_identificacion_col" ? "checked": ""}}>
                            <span class="option-label">Sin identificación colombiana con documento venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="92275.08612544088" value="otro_id_3" {{isset($data['grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante']) == "otro_id_3" ? "checked": ""}}>
                            <span class="option-label">Otro</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div><span class="or-option-translations" style="display:none;"></span><span class="itemset-labels" data-value-ref="name" data-label-type="itext" data-label-ref="itextId"><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-0">Cédula colombiana</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-1">Tarjeta de identidad</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-2">Registro civil de nacimiento</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-3">Certificado de nacido/a vivo/a</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-4">Cédula de extranjería</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-5">Pasaporte venezolano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-6">Acta de nacimiento</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-7">Permiso Especial de Permanencia (PEP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-8">Permiso de Ingreso y Permanencia (PIP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-9">Permiso Temporal de Protección (PTP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-10">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-11">Tarjeta de movilidad fronteriza (TMF)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-12">Carta Solicitante de Refugio o Asilo</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-13">Visa</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-14">Otro tipo de identificación</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-15">Sin identificación colombiana con documento venezolano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-16">Sin identificación</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-17">Otro</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>
              <?php } ?>
              <!-- fin cuando sea colombio-venezolano -->

              <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Número de identificación</span><span class="required">*</span>
                <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/numeroid_representante" data-required="true()" data-relevant="selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion ,'menor_edad') and (( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante !='' and ( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idvenezuela_representante !='' or  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idbinacional_representante !='' or  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idnacionalidad_representante !='')) or (selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/nacionalidad_representante ,'colombiano_a') and not(selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/tipo_idcolombia_representante ,'sin_identificacion'))))" data-type-xml="string" maxlength="2000" disabled="" value="$data['grupo_datos_beneficiario/datos_representante_legal/numeroid_representante']">
                <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </label>

              <label class="question or-branch non-select disabled">
                <span lang="" class="question-label active">Celular/teléfono de representante legal</span>
                <span lang="" class="or-hint active">Opcional</span>
                <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/telefono_representante" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="string" maxlength="2000" disabled="" value="$data['grupo_datos_beneficiario/datos_representante_legal/telefono_representante']">
              </label>

              <fieldset class="question simple-select or-branch disabled" disabled="">
                <fieldset>
                  <legend><span lang="" class="question-label active">En calidad de:</span><span class="required">*</span>
                  </legend>
                  <div class="option-wrapper">
                    <label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/calidad_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/calidad_representante" value="madre" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1" isset($data['grupo_datos_beneficiario/datos_representante_legal/calidad_representante'])=="madre" ? 'checked' : ''>
                      <span lang="" class="option-label active">Madre</span>
                    </label>

                    <label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/calidad_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/calidad_representante" value="padre" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1" isset($data['grupo_datos_beneficiario/datos_representante_legal/calidad_representante'])=="padre" ? 'checked' : ''>
                      <span lang="" class="option-label active">Padre</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/calidad_representante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representante_legal/calidad_representante" value="representante" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1" isset($data['grupo_datos_beneficiario/datos_representante_legal/calidad_representante'])=="representante" ? 'checked' : ''>
                      <span lang="" class="option-label active">Representante legal</span>
                    </label>
                  </div>
                </fieldset><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </fieldset>
            </section>

            <!--end of group -->
            <!-- Datos del/la niño, niña o adolescente representado -->
            <section class="or-group or-branch disabled" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'">
              <h4><span lang="" class="question-label active">Datos del/la niño, niña o adolescente representado</span></h4>
              <fieldset class="question simple-select or-branch disabled" disabled="">
                <fieldset>
                  <legend><span lang="" class="question-label active">Nacionalidad de representante legal</span><span class="required">*</span>
                  </legend>
                  <div class="option-wrapper"><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad" value="colombiano_a" {{isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad'] == "colombiano_a" ? "checked": ""}} data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1"><span lang="" class="option-label active">Colombiano/a</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad" value="venezolano_a" {{isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad'] == "venezolano_a" ? "checked": ""}} data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1"><span lang="" class="option-label active">Venezolano/a</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad" value="colombovenezolano" {{isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad'] == "colombovenezolano" ? "checked": ""}} data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1"><span lang="" class="option-label active">Colombo-Venezolano</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad" value="otra_nacionalidad" {{isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad'] == "otra_nacionalidad" ? "checked": ""}} data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1"><span lang="" class="option-label active">Otra</span></label></div>
                </fieldset><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </fieldset>

              <?php if (isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad']) == 'otra_nacionalidad') { ?>

                <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Otra nacionalidad, ¿Cuál?</span><span class="required">*</span>
                  <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/otra_nacionalidad_menor_edad" value="{{ ($data['grupo_datos_beneficiario/datos_representado/otra_nacionalidad_menor_edad']) ?? ''}}" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad  = 'otra_nacionalidad'" data-type-xml="string" maxlength="2000" disabled=""><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

              <?php } ?>

              <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Nombre completo del/la niño, niña o adolescente</span><span class="required">*</span>
                <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nombre_menor_edad" value="{{ ($data['grupo_datos_beneficiario/datos_representado/nombre_menor_edad']) ?? ''}}" data-required="true()" data-constraint="regex(., '^[a-zA-Z\D]{10,150}$')" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="string" maxlength="2000" disabled=""><span lang="" class="or-constraint-msg active">Este campo sólo permite texto</span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </label>

              <?php if (isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad'])   == 'colombiano_a') { ?>
                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de documento de identidad del/la niño, niña o adolescente</span><span class="required">*</span>
                  <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad  = 'colombiano_a'" data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value="" data-items-path="instance('tipo_idcolombia')/root/item[tipo_persona_autorizacion= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion ]">...</option>
                    <option value="tarjeta_identidad" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "tarjeta_identidad" ? "selected" : ""}}>Tarjeta de identidad</option>
                    <option value="registro_civil" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "registro_civil" ? "selected" : ""}}>Registro civil de nacimiento</option>
                    <option value="certificado_nvivo" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "certificado_nvivo" ? "selected" : ""}}>Certificado de nacido/a vivo/a</option>
                    <option value="acta_nacinamiento" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "acta_nacinamiento" ? "selected" : ""}}>Acta de nacimiento</option>
                    <option value="sin_identificacion_men" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "sin_identificacion_men" ? "selected" : ""}}>Sin identificación</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="3351.519609182674" value="tarjeta_identidad" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "tarjeta_identidad" ? "checked" : ""}}>
                            <span class="option-label">Tarjeta de identidad</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="3351.519609182674" value="registro_civil" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "registro_civil" ? "checked" : ""}}>
                            <span class="option-label">Registro civil de nacimiento</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="3351.519609182674" value="certificado_nvivo" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "certificado_nvivo" ? "checked" : ""}}>
                            <span class="option-label">Certificado de nacido/a vivo/a</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="3351.519609182674" value="acta_nacinamiento" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "acta_nacinamiento" ? "checked" : ""}}>
                            <span class="option-label">Acta de nacimiento</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="3351.519609182674" value="sin_identificacion_men" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad'] == "sin_identificacion_men" ? "checked" : ""}}>
                            <span class="option-label">Sin identificación</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div><span class="or-option-translations" style="display:none;"></span><span class="itemset-labels" data-value-ref="name" data-label-type="itext" data-label-ref="itextId"><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-0">Cédula colombiana</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-1">Tarjeta de identidad</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-2">Registro civil de nacimiento</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-3">Pasaporte colombiano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-4">Certificado de nacido/a vivo/a</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-5">Acta de nacimiento</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-6">Sin identificación</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

                <label class="question or-branch non-select"><span lang="" class="question-label active">Número de identificación del/la niño, niña o adolescente</span><span class="required">*</span>
                  <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/numeroid_menor_edad" value="{{ ($data['grupo_datos_beneficiario/datos_representado/numeroid_menor_edad']) ?? ''}}" data-required="true()" data-relevant="selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion ,'menor_edad') and (( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad !='' and ( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad !='' or  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad !='' or  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad !='')) or (selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad ,'colombiano_a') and not(selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idcolombia_menor_edad ,'sin_identificacion'))))" data-type-xml="string" maxlength="2000"><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

              <?php } ?>

              <?php if (isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad'])   == 'venezolano_a') { ?>

                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de documento de identidad del/la niño, niña o adolescente</span><span class="required">*</span>
                  <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad  = 'venezolano_a'" data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value="" data-items-path="instance('tipo_idvenezuela')/root/item[tipo_persona_autorizacion= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion ]">...</option>
                    <option value="cedula_extranjera" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="cedula_extranjera" ? "selected": ""}}>Cédula de extranjería</option>
                    <option value="pasaporte_venezolano" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="pasaporte_venezolano" ? "selected": ""}}>Pasaporte venezolano</option>
                    <option value="acta_nacinamiento" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="acta_nacinamiento" ? "selected": ""}}>Acta de nacimiento</option>
                    <option value="permiso_especial_permanencia" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="permiso_especial_permanencia" ? "selected": ""}}>Permiso Especial de Permanencia (PEP)</option>
                    <option value="permiso_permanencia" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="permiso_permanencia" ? "selected": ""}}>Permiso de Ingreso y Permanencia (PIP)</option>
                    <option value="permiso_temporal_proteccion" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="permiso_temporal_proteccion" ? "selected": ""}}>Permiso Temporal de Protección (PTP)</option>
                    <option value="permiso_transito_temporal" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="permiso_transito_temporal" ? "selected": ""}}>Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</option>
                    <option value="tarjeta_movilidad_fronteriza" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="tarjeta_movilidad_fronteriza" ? "selected": ""}}>Tarjeta de movilidad fronteriza (TMF)</option>
                    <option value="carta_solicitud_asilo" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="carta_solicitud_asilo" ? "selected": ""}}>Carta Solicitante de Refugio o Asilo</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="cedula_extranjera" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="cedula_extranjera" ? "checked": ""}}>
                            <span class="option-label">Cédula de extranjería</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="pasaporte_venezolano" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="pasaporte_venezolano" ? "checked": ""}}>
                            <span class="option-label">Pasaporte venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="acta_nacinamiento" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="acta_nacinamiento" ? "checked": ""}}>
                            <span class="option-label">Acta de nacimiento</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="permiso_especial_permanencia" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="permiso_especial_permanencia" ? "checked": ""}}>
                            <span class="option-label">Permiso Especial de Permanencia (PEP)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="permiso_permanencia" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="permiso_permanencia" ? "checked": ""}}>
                            <span class="option-label">Permiso de Ingreso y Permanencia (PIP)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="permiso_temporal_proteccion" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="permiso_temporal_proteccion" ? "checked": ""}}>
                            <span class="option-label">Permiso Temporal de Protección (PTP)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="permiso_transito_temporal" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="permiso_transito_temporal" ? "checked": ""}}>
                            <span class="option-label">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="tarjeta_movilidad_fronteriza" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="tarjeta_movilidad_fronteriza" ? "checked": ""}}>
                            <span class="option-label">Tarjeta de movilidad fronteriza (TMF)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="66834.55339487163" value="carta_solicitud_asilo" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idvenezuela_menor_edad"]=="carta_solicitud_asilo" ? "checked": ""}}>
                            <span class="option-label">Carta Solicitante de Refugio o Asilo</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div><span class="or-option-translations" style="display:none;"></span><span class="itemset-labels" data-value-ref="name" data-label-type="itext" data-label-ref="itextId"><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-0">Cédula de extranjería</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-1">Pasaporte venezolano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-2">Acta de nacimiento</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-3">Permiso Especial de Permanencia (PEP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-4">Permiso Especial de Permanencia para el Fomento de la Formalización (PFF)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-5">Permiso de Ingreso y Permanencia (PIP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-6">Permiso Temporal de Protección (PTP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-7">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-8">Tarjeta de movilidad fronteriza (TMF)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-9">Carta Solicitante de Refugio o Asilo</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-10">Visa</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-11">Sin identificación colombiana con documento venezolano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-12">Otro</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

              <?php } ?>

              <?php if (isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad'])   == 'colombovenezolano') { ?>

                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de documento de identidad del/la niño, niña o adolescente</span><span class="required">*</span>
                  <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad  = 'colombovenezolano'" data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value="" data-items-path="instance('tipo_idbinacional')/root/item[tipo_persona_autorizacion= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion ]">...</option>
                    <option value="tarjeta_identidad" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="tarjeta_identidad" ? "selected": ""}}>Tarjeta de identidad</option>
                    <option value="registro_civil" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="registro_civil" ? "selected": ""}}>Registro civil de nacimiento</option>
                    <option value="certificado_nvivo" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="certificado_nvivo" ? "selected": ""}}>Certificado de nacido/a vivo/a</option>
                    <option value="cedula_extranjera" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="cedula_extranjera" ? "selected": ""}}>Cédula de extranjería</option>
                    <option value="pasaporte_venezolano" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="pasaporte_venezolano" ? "selected": ""}}>Pasaporte venezolano</option>
                    <option value="acta_nacinamiento" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="acta_nacinamiento" ? "selected": ""}}>Acta de nacimiento</option>
                    <option value="permiso_especial_permanencia" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="permiso_especial_permanencia" ? "selected": ""}}>Permiso Especial de Permanencia (PEP)</option>
                    <option value="permiso_permanencia" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="permiso_permanencia" ? "selected": ""}}>Permiso de Ingreso y Permanencia (PIP)</option>
                    <option value="permiso_temporal_proteccion" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="permiso_temporal_proteccion" ? "selected": ""}}>Permiso Temporal de Protección (PTP)</option>
                    <option value="permiso_transito_temporal" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="permiso_transito_temporal" ? "selected": ""}}>Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</option>
                    <option value="tarjeta_movilidad_fronteriza" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="tarjeta_movilidad_fronteriza" ? "selected": ""}}>Tarjeta de movilidad fronteriza (TMF)</option>
                    <option value="carta_solicitud_asilo" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="carta_solicitud_asilo" ? "selected": ""}}>Carta Solicitante de Refugio o Asilo</option>
                    <option value="visa" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="visa" ? "selected": ""}}>Visa</option>
                    <option value="otro_id_2" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="otro_id_2" ? "selected": ""}}>Otro tipo de identificación</option>
                    <option value="sin_identificacion_n" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="sin_identificacion_n" ? "selected": ""}}>Sin identificación</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="tarjeta_identidad" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="tarjeta_identidad" ? "checked": ""}}>>
                            <span class="option-label">Tarjeta de identidad</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="registro_civil" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="registro_civil" ? "checked": ""}}>>
                            <span class="option-label">Registro civil de nacimiento</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="certificado_nvivo" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="certificado_nvivo" ? "checked": ""}}>>
                            <span class="option-label">Certificado de nacido/a vivo/a</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="cedula_extranjera" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="cedula_extranjera" ? "checked": ""}}>>
                            <span class="option-label">Cédula de extranjería</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="pasaporte_venezolano" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="pasaporte_venezolano" ? "checked": ""}}>>
                            <span class="option-label">Pasaporte venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="acta_nacinamiento" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="acta_nacinamiento" ? "checked": ""}}>>
                            <span class="option-label">Acta de nacimiento</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="permiso_especial_permanencia" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="permiso_especial_permanencia" ? "checked": ""}}>>
                            <span class="option-label">Permiso Especial de Permanencia (PEP)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="permiso_permanencia" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="permiso_permanencia" ? "checked": ""}}>>
                            <span class="option-label">Permiso de Ingreso y Permanencia (PIP)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="permiso_temporal_proteccion" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="permiso_temporal_proteccion" ? "checked": ""}}>>
                            <span class="option-label">Permiso Temporal de Protección (PTP)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="permiso_transito_temporal" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="permiso_transito_temporal" ? "checked": ""}}>>
                            <span class="option-label">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="tarjeta_movilidad_fronteriza" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="tarjeta_movilidad_fronteriza" ? "checked": ""}}>>
                            <span class="option-label">Tarjeta de movilidad fronteriza (TMF)</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="carta_solicitud_asilo" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="carta_solicitud_asilo" ? "checked": ""}}>>
                            <span class="option-label">Carta Solicitante de Refugio o Asilo</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="visa" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="visa" ? "checked": ""}}>>
                            <span class="option-label">Visa</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="otro_id_2" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="otro_id_2" ? "checked": ""}}>>
                            <span class="option-label">Otro tipo de identificación</span>
                          </label>
                        </a>
                      </li>
                      <li class="">
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="48984.12073574192" value="sin_identificacion_n" {{isset($data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]) && $data["grupo_datos_beneficiario/datos_representado/tipo_idbinacional_menor_edad"]=="sin_identificacion_n" ? "checked": ""}}>>
                            <span class="option-label">Sin identificación</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div><span class="or-option-translations" style="display:none;"></span><span class="itemset-labels" data-value-ref="name" data-label-type="itext" data-label-ref="itextId"><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-0">Cédula colombiana</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-1">Tarjeta de identidad</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-2">Registro civil de nacimiento</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-3">Certificado de nacido/a vivo/a</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-4">Cédula de extranjería</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-5">Pasaporte venezolano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-6">Acta de nacimiento</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-7">Permiso Especial de Permanencia (PEP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-8">Permiso de Ingreso y Permanencia (PIP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-9">Permiso Temporal de Protección (PTP)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-10">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-11">Tarjeta de movilidad fronteriza (TMF)</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-12">Carta Solicitante de Refugio o Asilo</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-13">Visa</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-14">Otro tipo de identificación</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-15">Sin identificación colombiana con documento venezolano</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-16">Sin identificación</span><span lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-17">Otro</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>
              <?php } ?>

              <?php if (isset($data['grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad'])   == 'otra_nacionalidad') { ?>

                <fieldset class="question simple-select or-branch">
                  <fieldset>
                    <legend><span lang="" class="question-label active">Tipo de documento de identidad del/la niño, niña o adolescente</span><span class="required">*</span></legend>
                    <div class="option-wrapper"><label class="">
                        <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad'] == "pasaporte_7" ? "checked" : ""}} data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad" value="pasaporte_7" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad  = 'otra_nacionalidad'" data-type-xml="select1"><span lang="" class="option-label active">Pasaporte</span></label><label class="">
                        <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad'] == "cedula_extranjera" ? "checked" : ""}} data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad" value="cedula_extranjera" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad  = 'otra_nacionalidad'" data-type-xml="select1"><span lang="" class="option-label active">Cédula de extranjería</span></label><label class="">
                        <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad'] == "visa" ? "checked" : ""}} data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad" value="visa" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad  = 'otra_nacionalidad'" data-type-xml="select1"><span lang="" class="option-label active">Visa</span></label><label class="">
                        <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad" {{isset($data['grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad']) && $data['grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad'] == "otro_id_4" ? "checked" : ""}} data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/tipo_idnacionalidad_menor_edad" value="otro_id_4" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/nacionalidad_menor_edad  = 'otra_nacionalidad'" data-type-xml="select1"><span lang="" class="option-label active">Otro</span></label>
                    </div>
                  </fieldset><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </fieldset>

              <?php } ?>

              <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Edad del/la niño, niña o adolescente</span><span class="required">*</span>
                <input type="number" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_representado/edad_menor_edad" value="{{ ($data['grupo_datos_beneficiario/datos_representado/edad_menor_edad']) ?? ''}}" data-required="true()" data-constraint=". >= 0 and . <= 17" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="int" disabled=""><span lang="" class="or-constraint-msg active">Ingrese un valor adecuado'</span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </label>

            </section><!--end of group -->

            <!-- Nacionalidad de la persona participante -->
              
            <section class="or-group-data or-branch disabled" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'">
              <fieldset class="question simple-select or-branch disabled" disabled="">
                <fieldset>
                  <legend><span lang="" class="question-label active">Nacionalidad de la persona participante</span><span class="required">*</span>
                  </legend>
                  <div class="option-wrapper"><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad" value="colombiano_a" {{isset($data["grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad"]) && $data["grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad"] == "colombiano_a" ? "checked": ""}} data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1"><span lang="" class="option-label active">Colombiano/a</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad" value="venezolano_a" {{isset($data["grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad"]) && $data["grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad"] == "venezolano_a" ? "checked": ""}} data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1"><span lang="" class="option-label active">Venezolano/a</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad" value="colombovenezolano" {{isset($data["grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad"]) && $data["grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad"] == "colombovenezolano" ? "checked": ""}} data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1"><span lang="" class="option-label active">Colombo-Venezolano</span></label><label class="">
                      <input type="radio" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad" value="otra_nacionalidad" {{isset($data["grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad"]) && $data["grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad"] == "otra_nacionalidad" ? "checked": ""}} data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="select1"><span lang="" class="option-label active">Otra</span></label>
                    </div>
                </fieldset><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </fieldset>

              <!-- si es otra -->

              <?php if ($data['grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad']   == 'otra_nacionalidad') { ?>

                <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Otra nacionalidad, ¿Cuál?</span><span class="required">*</span>
                  <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/otra_nacionalidad_mayor_edad" value="{{ ($data['grupo_datos_beneficiario/datos_participante/otra_nacionalidad_mayor_edad']) ?? ''}}" data-required="true()" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad  = 'otra_nacionalidad'" data-type-xml="string" maxlength="2000" disabled=""><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>
                

              <?php } ?>
              <!-- end si es otra -->
              
              <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Nombre completo de la persona participante</span><span class="required">*</span>
                <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nombre_mayor_edad" value="{{ ($data['grupo_datos_beneficiario/datos_participante/nombre_mayor_edad']) ?? ''}}" data-required="true()" data-constraint="regex(., '^[a-zA-Z\D]{10,150}$')" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad'" data-type-xml="string" maxlength="2000" disabled=""><span lang="" class="or-constraint-msg active">Este campo sólo permite texto'</span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
              </label>


              <!-- si es colombiano -->
              <?php if ($data['grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad']   == 'colombiano_a') { ?>
                
                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de documento de identidad de la persona participante</span><span class="required">*</span>
                  <select
                    name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad"
                    data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad"
                    data-required="true()"
                    data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad  = 'colombiano_a'"
                    data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value=""
                      data-items-path="instance('tipo_idcolombia')/root/item[nacionalidad_mayor_edad= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad ]">
                      ...</option>
                    <option value="cedula_colombiana" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad'] == "cedula_colombiana" ? "selected" : ""}}>Cédula colombiana</option>
                    <option value="pasaporte_13" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad'] == "pasaporte_13" ? "selected" : ""}}>Pasaporte colombiano</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="62983.862067422146" value="cedula_colombiana" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad'] == "cedula_colombiana" ? "checked" : ""}}>
                            <span class="option-label">Cédula colombiana</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="62983.862067422146" value="pasaporte_13" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad'] == "pasaporte_13" ? "checked" : ""}}>
                            <span class="option-label">Pasaporte colombiano</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div><span class="or-option-translations" style="display:none;"></span><span class="itemset-labels"
                    data-value-ref="name" data-label-type="itext" data-label-ref="itextId"><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idcolombia-0">Cédula colombiana</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-1">Tarjeta de
                      identidad</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idcolombia-2">Registro civil de nacimiento</span><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idcolombia-3">Pasaporte colombiano</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idcolombia-4">Certificado de
                      nacido/a vivo/a</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idcolombia-5">Acta de nacimiento</span><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idcolombia-6">Sin identificación</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

              <?php } ?>

              <!-- end si es colombiano -->

              <!-- si es venezilano -->
              <?php if ($data['grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad']   == 'venezolano_a') { ?>

                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de documento de
                    identidad de la persona participante</span><span class="required">*</span>
                  <select
                    name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad"
                    data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad"
                    data-required="true()"
                    data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad  = 'venezolano_a'"
                    data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value=""
                      data-items-path="instance('tipo_idvenezuela')/root/item[nacionalidad_mayor_edad= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad ]">
                      ...</option>
                    <option value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "cedula_extranjera" ? "selected": ""}}>Cédula de extranjería</option>
                    <option value="pasaporte_venezolano" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "pasaporte_venezolano" ? "selected": ""}}>Pasaporte venezolano</option>
                    <option value="permiso_especial_permanencia" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "permiso_especial_permanencia" ? "selected": ""}}>Permiso Especial de Permanencia (PEP)</option>
                    <option value="pepff" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "pepff" ? "selected": ""}}>Permiso Especial de Permanencia para el Fomento de la Formalización (PFF)</option>
                    <option value="permiso_permanencia" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "permiso_permanencia" ? "selected": ""}}>Permiso de Ingreso y Permanencia (PIP)</option>
                    <option value="permiso_temporal_proteccion" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "permiso_temporal_proteccion" ? "selected": ""}}>Permiso Temporal de Protección (PTP)</option>
                    <option value="permiso_transito_temporal" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "permiso_transito_temporal" ? "selected": ""}}>Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</option>
                    <option value="tarjeta_movilidad_fronteriza" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "tarjeta_movilidad_fronteriza" ? "selected": ""}}>Tarjeta de movilidad fronteriza (TMF)</option>
                    <option value="carta_solicitud_asilo" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "carta_solicitud_asilo" ? "selected": ""}}>Carta Solicitante de Refugio o Asilo</option>
                    <option value="visa" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "visa" ? "selected": ""}}>Visa</option>
                    <option value="sin_identificacion_col" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "sin_identificacion_col" ? "selected": ""}}>Sin identificación colombiana con documento venezolano</option>
                    <option value="otro_id_1" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "otro_id_1" ? "selected": ""}}>Otro</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "cedula_extranjera" ? "checked": ""}}>
                            <span class="option-label">Cédula de extranjería</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="pasaporte_venezolano" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "pasaporte_venezolano" ? "checked": ""}}>
                            <span class="option-label">Pasaporte venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="permiso_especial_permanencia" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "permiso_especial_permanencia" ? "checked": ""}}>
                            <span class="option-label">Permiso Especial de Permanencia (PEP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="pepff" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "pepff" ? "checked": ""}}>
                            <span class="option-label">Permiso Especial de Permanencia para el Fomento de la Formalización (PFF)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="permiso_permanencia" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "permiso_permanencia" ? "checked": ""}}>
                            <span class="option-label">Permiso de Ingreso y Permanencia (PIP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="permiso_temporal_proteccion" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "permiso_temporal_proteccion" ? "checked": ""}}>
                            <span class="option-label">Permiso Temporal de Protección (PTP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="permiso_transito_temporal" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "permiso_transito_temporal" ? "checked": ""}}>
                            <span class="option-label">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="tarjeta_movilidad_fronteriza" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "tarjeta_movilidad_fronteriza" ? "checked": ""}}>
                            <span class="option-label">Tarjeta de movilidad fronteriza (TMF)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="carta_solicitud_asilo" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "carta_solicitud_asilo" ? "checked": ""}}>
                            <span class="option-label">Carta Solicitante de Refugio o Asilo</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="visa" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "visa" ? "checked": ""}}>
                            <span class="option-label">Visa</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="sin_identificacion_col" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "sin_identificacion_col" ? "checked": ""}}>
                            <span class="option-label">Sin identificación colombiana con documento venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="56152.31546827783" value="otro_id_1" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad'] == "otro_id_1" ? "checked": ""}}>
                            <span class="option-label">Otro</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div><span class="or-option-translations" style="display:none;"></span><span class="itemset-labels"
                    data-value-ref="name" data-label-type="itext" data-label-ref="itextId"><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-0">Cédula de extranjería</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-1">Pasaporte
                      venezolano</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idvenezuela-2">Acta de nacimiento</span><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-3">Permiso Especial de Permanencia
                      (PEP)</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idvenezuela-4">Permiso Especial de Permanencia para el Fomento de la
                      Formalización (PFF)</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idvenezuela-5">Permiso de Ingreso y Permanencia (PIP)</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-6">Permiso Temporal de
                      Protección (PTP)</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idvenezuela-7">Permiso de Ingreso y Permanencia de Tránsito Temporal
                      (PIP-TT)</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idvenezuela-8">Tarjeta de movilidad fronteriza (TMF)</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idvenezuela-9">Carta Solicitante de
                      Refugio o Asilo</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idvenezuela-10">Visa</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idvenezuela-11">Sin identificación colombiana con documento
                      venezolano</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idvenezuela-12">Otro</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>

              <?php } ?>

              <!-- end si es venezilano -->

              <!-- si es colombo-venezilano -->
              <?php if ($data['grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad']   == 'colombovenezolano') { ?>
                <label class="question or-appearance-minimal or-branch"><span lang="" class="question-label active">Tipo de documento de identidad de la persona participante</span><span class="required">*</span>
                  <select
                    name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad"
                    data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad"
                    data-required="true()"
                    data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad  = 'colombovenezolano'"
                    data-type-xml="select1" style="display: none;">
                    <option class="itemset-template" value=""
                      data-items-path="instance('tipo_idbinacional')/root/item[nacionalidad_mayor_edad= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad ]">
                      ...</option>
                    <option value="cedula_colombiana" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "cedula_colombiana" ? "selected" : "" }}>Cédula colombiana</option>
                    <option value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "cedula_extranjera" ? "selected" : "" }}>Cédula de extranjería</option>
                    <option value="pasaporte_venezolano" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "pasaporte_venezolano" ? "selected" : "" }}>Pasaporte venezolano</option>
                    <option value="permiso_especial_permanencia" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "permiso_especial_permanencia" ? "selected" : "" }}>Permiso Especial de Permanencia (PEP)</option>
                    <option value="permiso_permanencia" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "permiso_permanencia" ? "selected" : "" }}>Permiso de Ingreso y Permanencia (PIP)</option>
                    <option value="permiso_temporal_proteccion" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "permiso_temporal_proteccion" ? "selected" : "" }}>Permiso Temporal de Protección (PTP)</option>
                    <option value="permiso_transito_temporal" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "permiso_transito_temporal" ? "selected" : "" }}>Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</option>
                    <option value="tarjeta_movilidad_fronteriza" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "tarjeta_movilidad_fronteriza" ? "selected" : "" }}>Tarjeta de movilidad fronteriza (TMF)</option>
                    <option value="carta_solicitud_asilo" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "carta_solicitud_asilo" ? "selected" : "" }}>Carta Solicitante de Refugio o Asilo</option>
                    <option value="visa" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "visa" ? "selected" : "" }}>Visa</option>
                    <option value="sin_identificacion_col" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "sin_identificacion_col" ? "selected" : "" }}>Sin identificación colombiana con documento venezolano</option>
                    <option value="otro_id_3" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "otro_id_3" ? "selected" : "" }}>Otro</option>
                  </select>
                  <div class="btn-group bootstrap-select widget clearfix">
                    <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                      <span class="selected">ninguno seleccionado</span><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="cedula_colombiana" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "cedula_colombiana" ? "checked" : "" }}>
                            <span class="option-label">Cédula colombiana</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="cedula_extranjera" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "cedula_extranjera" ? "checked" : "" }}>
                            <span class="option-label">Cédula de extranjería</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="pasaporte_venezolano" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "pasaporte_venezolano" ? "checked" : "" }}>
                            <span class="option-label">Pasaporte venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="permiso_especial_permanencia" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "permiso_especial_permanencia" ? "checked" : "" }}>
                            <span class="option-label">Permiso Especial de Permanencia (PEP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="permiso_permanencia" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "permiso_permanencia" ? "checked" : "" }}>
                            <span class="option-label">Permiso de Ingreso y Permanencia (PIP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="permiso_temporal_proteccion" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "permiso_temporal_proteccion" ? "checked" : "" }}>
                            <span class="option-label">Permiso Temporal de Protección (PTP)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="permiso_transito_temporal" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "permiso_transito_temporal" ? "checked" : "" }}>
                            <span class="option-label">Permiso de Ingreso y Permanencia de Tránsito Temporal (PIP-TT)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="tarjeta_movilidad_fronteriza" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "tarjeta_movilidad_fronteriza" ? "checked" : "" }}>
                            <span class="option-label">Tarjeta de movilidad fronteriza (TMF)</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="carta_solicitud_asilo" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "carta_solicitud_asilo" ? "checked" : "" }}>
                            <span class="option-label">Carta Solicitante de Refugio o Asilo</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="visa" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "visa" ? "checked" : "" }}>
                            <span class="option-label">Visa</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="sin_identificacion_col" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "sin_identificacion_col" ? "checked" : "" }}>
                            <span class="option-label">Sin identificación colombiana con documento venezolano</span>
                          </label>
                        </a>
                      </li>
                      <li>
                        <a class="option-wrapper" tabindex="-1" href="#">
                          <label>
                            <input class="ignore" type="radio" name="88477.29068247075" value="otro_id_3" {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad'] == "otro_id_3" ? "checked" : "" }}>
                            <span class="option-label">Otro</span>
                          </label>
                        </a>
                      </li>
                    </ul>
                  </div><span class="or-option-translations" style="display:none;"></span><span class="itemset-labels"
                    data-value-ref="name" data-label-type="itext" data-label-ref="itextId"><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idbinacional-0">Cédula colombiana</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-1">Tarjeta de
                      identidad</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idbinacional-2">Registro civil de nacimiento</span><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idbinacional-3">Certificado de nacido/a
                      vivo/a</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idbinacional-4">Cédula de extranjería</span><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idbinacional-5">Pasaporte venezolano</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-6">Acta de
                      nacimiento</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idbinacional-7">Permiso Especial de Permanencia (PEP)</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-8">Permiso de Ingreso
                      y Permanencia (PIP)</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idbinacional-9">Permiso Temporal de Protección (PTP)</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-10">Permiso de Ingreso
                      y Permanencia de Tránsito Temporal (PIP-TT)</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idbinacional-11">Tarjeta de movilidad fronteriza (TMF)</span><span
                      lang="default" class="option-label active" data-itext-id="static_instance-tipo_idbinacional-12">Carta Solicitante
                      de Refugio o Asilo</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idbinacional-13">Visa</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idbinacional-14">Otro tipo de identificación</span><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idbinacional-15">Sin identificación colombiana con
                      documento venezolano</span><span lang="default" class="option-label active"
                      data-itext-id="static_instance-tipo_idbinacional-16">Sin identificación</span><span lang="default"
                      class="option-label active" data-itext-id="static_instance-tipo_idbinacional-17">Otro</span>
                  </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
                </label>
              <?php } ?>

              <!-- end si es colombo-venezilano -->
              
              <!-- si es otra -->

              <?php if ($data['grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad']   == 'otra_nacionalidad') { ?>

                <fieldset class="question simple-select or-branch disabled" disabled="">
                <fieldset>
                  <legend><span lang="" class="question-label active">Tipo de documento de identidad de la persona participante</span><span class="required">*</span>
                  </legend>
                  <div class="option-wrapper"><label class="">
                      <input type="radio"
                        name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad"
                        data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad"
                        value="pasaporte_7" 
                        {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad']=="pasaporte_7" ? "checked": ""}}
                        data-required="true()"
                        data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad  = 'otra_nacionalidad'"
                        data-type-xml="select1"><span lang="" class="option-label active">Pasaporte</span></label><label class="">
                      <input type="radio"
                        name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad"
                        data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad"
                        value="cedula_extranjera" 
                        {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad']=="cedula_extranjera" ? "checked": ""}}
                        data-required="true()"
                        data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad  = 'otra_nacionalidad'"
                        data-type-xml="select1"><span lang="" class="option-label active">Cédula de extranjería</span></label><label
                      class="">
                      <input type="radio"
                        name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad"
                        data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad"
                        value="visa" 
                        {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad']=="visa" ? "checked": ""}}
                        data-required="true()"
                        data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad  = 'otra_nacionalidad'"
                        data-type-xml="select1"><span lang="" class="option-label active">Visa</span></label><label class="">
                      <input type="radio"
                        name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad"
                        data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad"
                        value="otro_id_4" 
                        {{isset($data['grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad']) && $data['grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad']=="otro_id_4" ? "checked": ""}}
                        data-required="true()"
                        data-relevant=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion  = 'menor_edad' and  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad  = 'otra_nacionalidad'"
                        data-type-xml="select1"><span lang="" class="option-label active">Otro</span></label></div>
                </fieldset><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es
                  obligatorio</span>
              </fieldset>
              <?php } ?>


              <!-- end si es otra -->
            </section>

          <?php } //seccion del representante legal cuando es menor
          ?>

          <?php if (
            isset($data['grupo_datos_beneficiario/tipo_persona_autorizacion'])   == 'mayor_edad' && 
            $data['grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad'] == 'colombiano_a' && 
            !isset($data['grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad']) == 'sin_identificacion'
            ) {
              ?>
            <label class="question or-branch non-select disabled"><span lang="" class="question-label active">Número de identificación de la persona participante</span><span class="required">*</span>
              <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/numeroid_mayor_edad" value="{{ ($data['grupo_datos_beneficiario/datos_participante/numeroid_mayor_edad']) ?? ''}}" data-required="true()" data-relevant="selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_persona_autorizacion ,'mayor_edad') and (( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad !='' and ( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idvenezuela_mayor_edad !='' or  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idbinacional_mayor_edad !='' or  /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idnacionalidad_mayor_edad !='')) or (selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/nacionalidad_mayor_edad ,'colombiano_a') and not(selected( /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/datos_participante/tipo_idcolombia_mayor_edad ,'sin_identificacion'))))" data-type-xml="string" maxlength="2000" disabled=""><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
            </label>
          <?php } ?>
          <!--end of group -->

          <label class="question or-appearance-minimal print-width-adjusted print-height-adjusted" style="width: 100%; height: 169px;">
            <span lang="" class="question-label active">Tipo De Documento</span><span class="required">*</span><span lang="" class="or-hint active">Lista de documentos aceptados por proveedor financiero ej.: cedula, Tarjeta de identidad, pasaporte, PEP, PPT entre otras</span>
            <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_documento_participante" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_documento_participante" data-required="true()" data-type-xml="select1" style="display: none;">
              <option value="">...</option>
              <option value="cedula_de_ciudadania" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "cedula_de_ciudadania" ? "selected": ""}}>Cédula de Ciudadanía</option>
              <option value="tarjeta_de_identidad" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "tarjeta_de_identidad" ? "selected": ""}}>Tarjeta de identidad</option>
              <option value="cedula_de_extranjeria" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "cedula_de_extranjeria" ? "selected": ""}}>Cédula de Extranjería</option>
              <option value="cedula_venezolana" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "cedula_venezolana" ? "selected": ""}}>Cédula Venezolana</option>
              <option value="nit" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "nit" ? "selected": ""}}>NIT</option>
              <option value="pasaporte" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "pasaporte" ? "selected": ""}}>Pasaporte</option>
              <option value="permiso_especial_de_permanencia" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "permiso_especial_de_permanencia" ? "selected": ""}}>Permiso Especial de Permanencia</option>
              <option value="permiso_por_proteccion_temporal" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "permiso_por_proteccion_temporal" ? "selected": ""}}>Permiso por Protección Temporal</option>
              <option value="permiso_especial_permanencia_fomento_formalizacion" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "permiso_especial_permanencia_fomento_formalizacion" ? "selected": ""}}>Permiso Especial de Permanencia Fomento Formalización</option>
            </select>
            <div class="btn-group bootstrap-select widget clearfix">
              <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                <span class="selected">Cédula de Ciudadanía</span><span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li class="active">
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label data-checked="true">
                      <input class="ignore" type="radio" name="30122.78395387238" value="cedula_de_ciudadania" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "cedula_de_ciudadania" ? "checked": ""}}>
                      <span class="option-label">Cédula de Ciudadanía</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="30122.78395387238" value="tarjeta_de_identidad" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "tarjeta_de_identidad" ? "checked": ""}}>
                      <span class="option-label">Tarjeta de identidad</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="30122.78395387238" value="cedula_de_extranjeria" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "cedula_de_extranjeria" ? "checked": ""}}>
                      <span class="option-label">Cédula de Extranjería</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="30122.78395387238" value="cedula_venezolana" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "cedula_venezolana" ? "checked": ""}}>
                      <span class="option-label">Cédula Venezolana</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="30122.78395387238" value="nit" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "nit" ? "checked": ""}}>
                      <span class="option-label">NIT</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="30122.78395387238" value="pasaporte" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "pasaporte" ? "checked": ""}}>
                      <span class="option-label">Pasaporte</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="30122.78395387238" value="permiso_especial_de_permanencia" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "permiso_especial_de_permanencia" ? "checked": ""}}>
                      <span class="option-label">Permiso Especial de Permanencia</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="30122.78395387238" value="permiso_por_proteccion_temporal" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "permiso_por_proteccion_temporal" ? "checked": ""}}>
                      <span class="option-label">Permiso por Protección Temporal</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="30122.78395387238" value="permiso_especial_permanencia_fomento_formalizacion" {{isset($data['grupo_datos_beneficiario/tipo_documento_participante']) && $data['grupo_datos_beneficiario/tipo_documento_participante'] == "permiso_especial_permanencia_fomento_formalizacion" ? "checked": ""}}>
                      <span class="option-label">Permiso Especial de Permanencia Fomento Formalización</span>
                    </label>
                  </a>
                </li>
              </ul>
            </div><span class="or-option-translations" style="display:none;">
            </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>

          </label>

          <label class="question non-select print-width-adjusted print-height-adjusted" style="width: 100%; height: 68px;">
            <span lang="" class="question-label active">Número de identificación de participante:</span><span class="required">*</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/numero_identificacion_participante" value="{{ ($data['grupo_datos_beneficiario/numero_identificacion_participante']) ?? ''}}" data-required="true()" data-constraint="regex(.,'^([\d]{6,14})$')" data-type-xml="string" maxlength="2000"><span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
            
          <label class="question non-select print-width-adjusted print-height-adjusted" style="width: 100%; height: 84px;">
            <span lang="" class="question-label active">Dirección (Comunidad)</span><span lang="" class="or-hint active">(Opcional, solo si cuentan con esta información)</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/Direcci_n_Comunidad" value="{{ ($data['grupo_datos_beneficiario/Direcci_n_Comunidad']) ?? ''}}" data-type-xml="string" maxlength="2000">
          </label>
        
          <label class="question or-appearance-minimal-autocomplete print-width-adjusted print-height-adjusted" style="width: 100%; height: 72px;">
            <span lang="" class="question-label active">Departamento</span><span class="required">*</span>
            <input name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/departamento" value="{{ ($data['grupo_datos_beneficiario/departamento']) ?? ''}}" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/departamento" data-required="true()" data-type-xml="select1" type="text" list="a4E3J9gkULZe5eRqQph8zhgrupodatosbeneficiariodepartamento" class="hide">
            <input type="text" class="ignore widget autocomplete" list="a4E3J9gkULZe5eRqQph8zhgrupodatosbeneficiariodepartamento" value="{{ ($data['grupo_datos_beneficiario/departamento']) ?? ''}}">
            
            <datalist id="a4E3J9gkULZe5eRqQph8zhgrupodatosbeneficiariodepartamento">
              <option value="..." data-value=""></option>
              <option value="Antioquia" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Antioquia" ? "checked" : ""}} data-value="antioquia"></option>
              <option value="Atlántico" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Atlántico" ? "checked" : ""}} data-value="atlantico"></option>
              <option value="Bogotá D.C."  {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Bogotá D.C." ? "checked" : ""}} data-value="bogota"></option>
              <option value="Bolívar" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Bolívar" ? "checked" : ""}} data-value="bolivar"></option>
              <option value="Boyacá" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Boyacá" ? "checked" : ""}} data-value="boyaca"></option>
              <option value="Caldas" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Caldas" ? "checked" : ""}} data-value="caldas"></option>
              <option value="Caquetá" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Caquetá" ? "checked" : ""}} data-value="caqueta"></option>
              <option value="Cauca" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Cauca" ? "checked" : ""}} data-value="cauca"></option>
              <option value="Cesar" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Cesar" ? "checked" : ""}} data-value="cesar"></option>
              <option value="Córdoba" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Córdoba" ? "checked" : ""}} data-value="cordoba"></option>
              <option value="Cundinamarca" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Cundinamarca" ? "checked" : ""}} data-value="cundinamarca"></option>
              <option value="Chocó" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Chocó" ? "checked" : ""}} data-value="choco"></option>
              <option value="Huila" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Huila" ? "checked" : ""}} data-value="huila"></option>
              <option value="La Guajira" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "La Guajira" ? "checked" : ""}} data-value="laguajira"></option>
              <option value="Magdalena" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Magdalena" ? "checked" : ""}} data-value="magdalena"></option>
              <option value="Meta" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Meta" ? "checked" : ""}} data-value="meta"></option>
              <option value="Nariño" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Nariño" ? "checked" : ""}} data-value="narino"></option>
              <option value="Norte de Santander" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Norte de Santander" ? "checked" : ""}} data-value="nortedesantander"></option>
              <option value="Quindio" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Quindio" ? "checked" : ""}} data-value="quindio"></option>
              <option value="Risaralda" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Risaralda" ? "checked" : ""}} data-value="risaralda"></option>
              <option value="Santander" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Santander" ? "checked" : ""}} data-value="santander"></option>
              <option value="Sucre" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Sucre" ? "checked" : ""}} data-value="sucre"></option>
              <option value="Tolima" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Tolima" ? "checked" : ""}} data-value="tolima"></option>
              <option value="Valle del Cauca" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Valle del Cauca" ? "checked" : ""}} data-value="valledelcauca"></option>
              <option value="Arauca" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Arauca" ? "checked" : ""}} data-value="arauca"></option>
              <option value="Casanare" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Casanare" ? "checked" : ""}} data-value="casanare"></option>
              <option value="Putumayo" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Putumayo" ? "checked" : ""}} data-value="putumayo"></option>
              <option value="San Andrés" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "San Andrés" ? "checked" : ""}} data-value="sanandres"></option>
              <option value="Amazonas" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Amazonas" ? "checked" : ""}} data-value="amazonas"></option>
              <option value="Guainía" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Guainía" ? "checked" : ""}} data-value="guainia"></option>
              <option value="Guaviare" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Guaviare" ? "checked" : ""}} data-value="guaviare"></option>
              <option value="Vaupes" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Vaupes" ? "checked" : ""}} data-value="vaupes"></option>
              <option value="Vichada" {{isset($data['grupo_datos_beneficiario/departamento']) && $data['grupo_datos_beneficiario/departamento'] == "Vichada" ? "checked" : ""}} data-value="vichada"></option>
            </datalist>
            
            <span class="or-option-translations" style="display:none;">
            </span>
            
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>

          <label class="question or-appearance-minimal-autocomplete print-width-adjusted print-height-adjusted" style="width: 100%; height: 72px;">
            <span lang="" class="question-label active">Municipio</span><span class="required">*</span>
            <input name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/municipio" value="{{ ($data['grupo_datos_beneficiario/municipio']) ?? ''}}" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/municipio" data-required="true()" data-type-xml="select1" type="text" list="a4E3J9gkULZe5eRqQph8zhgrupodatosbeneficiariomunicipio" class="hide">
            
            <input type="text" class="ignore widget autocomplete" list="a4E3J9gkULZe5eRqQph8zhgrupodatosbeneficiariomunicipio" value="{{ ($data['grupo_datos_beneficiario/municipio']) ?? ''}}">
            <datalist id="a4E3J9gkULZe5eRqQph8zhgrupodatosbeneficiariomunicipio">
                <option class="itemset-template" value="" data-items-path="instance('municipio')/root/item[departamento= /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/departamento ]">...</option>
                <option value="Albán" data-value="52019_alban1"></option>
                <option value="Aldana" data-value="52022_aldana"></option>
                <option value="Ancuya" data-value="52036_ancuya"></option>
                <option value="Arboleda" data-value="52051_arboleda"></option>
                <option value="Barbacoas" data-value="52079_barbacoas"></option>
                <option value="Belén" data-value="52083_belen1"></option>
                <option value="Buesaco" data-value="52110_buesaco"></option>
                <option value="Chachagüi" data-value="52240_chachagui"></option>
                <option value="Colon" data-value="52203_colon1"></option>
                <option value="Consaca" data-value="52207_consaca"></option>
                <option value="Contadero" data-value="52210_contadero"></option>
                <option value="Córdoba" data-value="52215_cordoba2"></option>
                <option value="Cuaspud" data-value="52224_cuaspud"></option>
                <option value="Cumbal" data-value="52227_cumbal"></option>
                <option value="Cumbitara" data-value="52233_cumbitara"></option>
                <option value="El Charco" data-value="52250_elcharco"></option>
                <option value="El Peñol" data-value="52254_elpenol"></option>
                <option value="El Rosario" data-value="52256_elrosario"></option>
                <option value="El Tablon De Gomez" data-value="52258_eltablondegomez"></option>
                <option value="El Tambo" data-value="52260_eltambo2"></option>
                <option value="Francisco Pizarro" data-value="52520_franciscopizarro"></option>
                <option value="Funes" data-value="52287_funes"></option>
                <option value="Guachucal" data-value="52317_guachucal"></option>
                <option value="Guaitarilla" data-value="52320_guaitarilla"></option>
                <option value="Gualmatan" data-value="52323_gualmatan"></option>
                <option value="Iles" data-value="52352_iles"></option>
                <option value="Imues" data-value="52354_imues"></option>
                <option value="Ipiales" data-value="52356_ipiales"></option>
                <option value="La Cruz" data-value="52378_lacruz"></option>
                <option value="La Florida" data-value="52381_laflorida"></option>
                <option value="La Llanada" data-value="52385_lallanada"></option>
                <option value="La Tola" data-value="52390_latola"></option>
                <option value="La Unión" data-value="52399_launion4"></option>
                <option value="Leiva" data-value="52405_leiva"></option>
                <option value="Linares" data-value="52411_linares"></option>
                <option value="Los Andes" data-value="52418_losandes"></option>
                <option value="Magüí Payán" data-value="52427_maguipayan"></option>
                <option value="Mallama" data-value="52435_mallama"></option>
                <option value="Mosquera" data-value="52473_mosquera2"></option>
                <option value="Nariño" data-value="52480_narino1"></option>
                <option value="Olaya Herrera" data-value="52490_olayaherrera"></option>
                <option value="Ospina" data-value="52506_ospina"></option>
                <option value="Pasto" data-value="52001_pasto"></option>
                <option value="Policarpa" data-value="52540_policarpa"></option>
                <option value="Potosí" data-value="52560_potosi"></option>
                <option value="Providencia" data-value="52565_providencia"></option>
                <option value="Puerres" data-value="52573_puerres"></option>
                <option value="Pupiales" data-value="52585_pupiales"></option>
                <option value="Ricaurte" data-value="52612_ricaurte2"></option>
                <option value="Roberto Payan" data-value="52621_robertopayan"></option>
                <option value="Samaniego" data-value="52678_samaniego"></option>
                <option value="San Andrés de Tumaco" data-value="52835_tumaco"></option>
                <option value="San Bernardo" data-value="52685_sanbernardo1"></option>
                <option value="San Lorenzo" data-value="52687_sanlorenzo"></option>
                <option value="San Pablo" data-value="52693_sanpablo1"></option>
                <option value="San Pedro De Cartago" data-value="52694_sanpedrodecartago"></option>
                <option value="Sandoná" data-value="52683_sandona"></option>
                <option value="Santa Bárbara" data-value="52696_santabarbara1"></option>
                <option value="Santacruz" data-value="52699_santacruz"></option>
                <option value="Sapuyes" data-value="52720_sapuyes"></option>
                <option value="Taminango" data-value="52786_taminango"></option>
                <option value="Tangua" data-value="52788_tangua"></option>
                <option value="Tuquerres" data-value="52838_tuquerres"></option>
                <option value="Yacuanquer" data-value="52885_yacuanquer"></option>
            </datalist>
            <span class="or-option-translations" style="display:none;"></span>
          </label>
        
          <label class="question non-select print-width-adjusted print-height-adjusted" style="width: 100%; height: 68px;">
            <span lang="" class="question-label active">Corregimiento/Vereda/Barrio/Territorio colectivo/Comunidad</span><span class="required">*</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/corregimiento_comunidad" value="{{ ($data['grupo_datos_beneficiario/corregimiento_comunidad']) ?? ''}}" data-required="true()" data-type-xml="string" maxlength="2000"><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
            
          <label class="question non-select print-width-adjusted print-height-adjusted" style="width: 100%; height: 84px;">
            <span lang="" class="question-label active">Teléfono de Contacto</span>
            <span lang="" class="or-hint active">(Opcional, solo si cuentan con esta información)</span>
            <input type="number" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/Tel_fono_de_Contacto" value="{{ ($data['grupo_datos_beneficiario/Tel_fono_de_Contacto']) ?? ''}}" data-type-xml="int">
          </label>
            
          <label class="question or-appearance-minimal print-width-adjusted print-height-adjusted" style="width: 100%; height: 99px;">
            <span lang="" class="question-label active">Número de miembros de hogar</span><span class="required">*</span>
            
            <select name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/numero_integrantes_hogar" data-name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/numero_integrantes_hogar" data-required="true()" data-type-xml="select1" style="display: none;">
              <option value="">...</option>
              <option value="1_$300.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar'] =="1_$300.000" ? "selected": ""}}>1 - $300.000</option>
              <option value="2_$510.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar'] =="2_$510.000" ? "selected": ""}}>2 - $510.000</option>
              <option value="3_$690.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar'] =="3_$690.000" ? "selected": ""}}>3 - $690.000</option>
              <option value="4_$840.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar'] =="4_$840.000" ? "selected": ""}}>4 -$ 840.000</option>
              <option value="5_$990.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar'] =="5_$990.000" ? "selected": ""}}>5 o Más - $990.000</option>
            </select>

            <div class="btn-group bootstrap-select widget clearfix">
              <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                <span class="selected">3 - $690.000</span><span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="75888.81622464691" value="1_$300.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar']=="1_$300.000" ? "checked": ""}}>
                      <span class="option-label">1 - $300.000</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="75888.81622464691" value="2_$510.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar']=="2_$510.000" ? "checked": ""}}>
                      <span class="option-label">2 - $510.000</span>
                    </label>
                  </a>
                </li>
                <li class="active">
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label data-checked="true">
                      <input class="ignore" type="radio" name="75888.81622464691" value="3_$690.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar']=="3_$690.000" ? "checked": ""}}>
                      <span class="option-label">3 - $690.000</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="75888.81622464691" value="4_$840.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar']=="4_$840.000" ? "checked": ""}}>
                      <span class="option-label">4 -$ 840.000</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="75888.81622464691" value="5_$990.000" {{isset($data['grupo_datos_beneficiario/numero_integrantes_hogar']) && $data['grupo_datos_beneficiario/numero_integrantes_hogar']=="5_$990.000" ? "checked": ""}}>
                      <span class="option-label">5 o Más - $990.000</span>
                    </label>
                  </a>
                </li>
              </ul>
            </div>

            <span class="or-option-translations" style="display:none;"></span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
        
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;">
            <span lang="" class="question-label active">De acuerdo con la composición del hogar el monto a entregar es: <strong>
              <span class="or-output" data-value=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/numero_integrantes_hogar ">
                {{($data['grupo_datos_beneficiario/numero_integrantes_hogar']) ?? ''}}
              </span>
            </strong> 
            </span>
            
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/nota_monto_entregado_condicionado" value="{{ ($data['grupo_datos_beneficiario/nota_monto_entregado_condicionado']) ?? ''}}" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000">
          </label>
          
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;">
            <span lang="" class="question-label active"><strong>Socio Implementador - FUNDACIÓN ACCIÓN CONTRA EL HAMBRE</strong></span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/Socio_Implementador_I_N_CONTRA_EL_HAMBRE" value="{{ ($data['grupo_datos_beneficiario/Socio_Implementador_I_N_CONTRA_EL_HAMBRE']) ?? ''}}" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000">
          </label>
          
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;">
            <span lang="" class="question-label active"><strong>Código del Proyecto - COA1BL</strong></span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/C_digo_del_Proyecto_COA1BL" value="{{ ($data['grupo_datos_beneficiario/C_digo_del_Proyecto_COA1BL']) ?? ''}}" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000">
          </label>
            
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;">
            <span lang="" class="question-label active"><strong>Proyecto Consorcio MIRE – Mecanismo Intersectorial de Respuesta a Emergencias</strong></span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/Proyecto_Consorcio_M_puesta_a_Emergencias" value="{{ ($data['grupo_datos_beneficiario/Proyecto_Consorcio_M_puesta_a_Emergencias']) ?? ''}}" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000">
          </label>
          
          <label class="question non-select print-width-adjusted print-height-adjusted" style="width: 100%; height: 68px;">
            <span lang="" class="question-label active">Código/ Emergencia:</span><span class="required">*</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/C_digo_Emergencia" value="{{ ($data['grupo_datos_beneficiario/C_digo_Emergencia']) ?? ''}}" data-required="true()" data-type-xml="string" maxlength="2000"><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>

        </section>
        <!--end of group -->

        <?php if(isset($data['autorizacion_acuerdo/autorizacion_tratamiento_de_datos'])  == 'si' && $data['autorizacion_acuerdo/autorizacion_uso_fotografias']  == 'si'){?>


        <section class="or-group or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/principios_fundamentales_asistencia" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <h4><span lang="" class="question-label active">4. PRINCIPIOS FUNDAMENTALES DE LA ASISTENCIA HUMANITARIA.</span></h4><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">La asistencia humanitaria a través de efectivo multipropósito pretende cubrir las necesidades básicas de acceso a salud, sanidad, alimentación, educación entre otras. En este sentido y en todo momento:</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/principios_fundamentales_asistencia/La_asistencia_humani_do_y_en_todo_momento" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• Está basada en el registro voluntario de los participantes en el programa de asistencia humanitaria.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/principios_fundamentales_asistencia/_Est_basada_en_el_istencia_humanitaria" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">• Se realiza sin costo alguno para el participante, por lo que los costos asociados a la transferencia en la empresa de giros autorizada por Acción contra el Hambre, los asume el consorcio MIRE.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/principios_fundamentales_asistencia/_Se_realiza_sin_cos_me_el_consorcio_MIRE" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">• Es otorgada exclusivamente a participante seleccionados con base en los criterios de vulnerabilidad del proyecto aprobado por el donante.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/principios_fundamentales_asistencia/_Es_otorgada_exclus_obado_por_el_donante" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">• Es entregado a través de una transferencia monetaria equivalente a los valores establecidos en el proyecto.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/principios_fundamentales_asistencia/_Es_entregado_a_tra_cidos_en_el_proyecto" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 77px;"><span lang="" class="question-label active">• La asistencia humanitaria a través de efectivo está orientada a cubrir necesidades básicas de salud, sanidad, alimentación y educación en un periodo promedio de un mes. Los montos varían según el número de miembros del hogar</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/principios_fundamentales_asistencia/_La_asistencia_huma_e_miembros_del_hogar" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">• La asistencia humanitaria otorgada a través de efectivo para cubrir las necesidades básicas de acceso a alimentos es intransferible y en beneficio de los miembros de la familia declarada.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/principios_fundamentales_asistencia/_La_asistencia_huma_la_familia_declarada" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>
        </section><!--end of group -->
        <section class="or-group or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/grupo_obligaciones_de_ach" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <h4><span lang="" class="question-label active">5. OBLIGACIONES DE ACH COMO RESPONSABLE EN LA IMPLEMENTACIÓN.</span></h4><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">ACH a través de este acuerdo concerniente a la provisión de asistencia humanitaria a través de efectivo se compromete a:</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_obligaciones_de_ach/ACH_a_trav_s_de_este_tivo_se_compromete_a" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 77px;"><span lang="" class="question-label active">• Seleccionar los participante exclusivamente a través de visitas en terreno para verificación de criterios de selección y la Evaluación Rápida de Necesidades realizada por los Equipos de Activación Rápida (EAR).</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_obligaciones_de_ach/_Seleccionar_los_be_tivaci_n_R_pida_EAR" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 77px;"><span lang="" class="question-label active">• Proveer toda la información relevante a los beneficiarios concerniente al proyecto, su funcionamiento, sus limitaciones y sus detalles técnicos y de poner a disposición de los beneficiarios el correo electrónico pqr@co.acfspain.org para la atención de peticiones, quejas y retroalimentaciones</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_obligaciones_de_ach/_Proveer_toda_la_in_retroalimentaciones" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 77px;"><span lang="" class="question-label active">• Otorgar efectivo de acuerdo con los valores establecidos por el proyecto (tabla 1) el cual será transferido en UNA SOLA ENTREGA a través de la plataforma con proveedores contratados por Acción Contra El Hambre.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_obligaciones_de_ach/_Otorgar_efectivo_d_i_n_Contra_El_Hambre" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>
        </section><!--end of group -->
        <section class="or-group or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <h4><span lang="" class="question-label active">6. OBLIGACIONES DEL PARTICIPANTE COMO FIRMANTE DE ESTE ACUERDO</span></h4><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">El beneficiario, a través de este acuerdo concerniente a la provisión de asistencia humanitaria a través de efectivo multipropósito se compromete a:</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/El_beneficiario_a_t_sito_se_compromete_a" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">• Brindar información verídica durante el proceso de registro para el programa de asistencia humanitaria y durante el monitoreo posterior a la distribución si fuese contactad@.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_Brindar_informaci_n_si_fuese_contactad" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">• Utilizará la asistencia humanitaria recibida para satisfacer las necesidades básicas (salud, sanidad, alimento, educación, otras)</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_Utilizar_la_asist_to_educaci_n_otras" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 77px;"><span lang="" class="question-label active">• Presentarse al personal de ACH para operaciones de verificación de identidad y participar – cuando sea solicitado – en encuestas acerca del uso de la asistencia humanitaria (línea Base, Línea de Salida o PDM).</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_Presentarse_al_per_nea_de_Salida_o_PDM" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 77px;"><span lang="" class="question-label active">• Informar inmediatamente a ACH acerca de cualquier fraude o irregularidad concerniente a este programa, cometido por personal de ACH u otras personas a través del correo electrónico dispuesto para tal fin pqr@co.acfspain.org</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_Informar_inmediata_pqr_co_acfspain_org" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• Informar inmediatamente a ACH en caso de cambio de número de teléfono o domicilio/residencia</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_Informar_inmediata_domicilio_residencia" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• NO utilizar la asistencia humanitaria recibida para actividades ilícitas de cualquier naturaleza.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_NO_utilizar_la_asi_cualquier_naturaleza" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">• Evitar gastar la ayuda humanitaria en productos que no aporten beneficios a la situación de vulnerabilidad en la que se encuentra actualmente su hogar.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_Evitar_gastar_la_a_actualmente_su_hogar" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• Asistir y acatar todos las llamadas o visitas de seguimiento.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_Asistir_y_acatar_t_sitas_de_seguimiento" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 98px;"><span lang="" class="question-label active">• Acción contra el Hambre cuenta con una política de Tolerancia cero frente a cualquier tipo de abuso, fraude o corrupción; por lo cual podrá desarrollar medidas e informar a las autoridades y donantes frente a casos que involucren este tipo de comportamientos, así como terminar o suspender la entrega de la asistencia humanitaria.</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/obligaciones_beneficiario/_Acci_n_contra_el_H_istencia_humanitaria" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>
        </section><!--end of group -->
        <section class="or-group or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/grupo_terminacion_acuerdo" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <h4><span lang="" class="question-label active">7. TERMINACIÓN DE ESTE ACUERDO.</span></h4><label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">La validez de este acuerdo se terminará 30 días después de la entrega de efectivo a través de transferencia monetaria</span><input type="text" name="/a4E3J9gkULZe5eRqQph8zh/grupo_terminacion_acuerdo/La_validez_de_este_a_nsferencia_monetaria" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>
        </section><!--end of group -->

        <section class="or-group or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/group_ww55p84" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <h4><span lang="" class="question-label active">8. REGISTRO FOTOGRÁFICO DEL DOCUMENTO DE IDENTIDAD.</span></h4>

          <label class="question non-select with-media clearfix print-width-adjusted print-height-adjusted" style="width: 100%; height: 394px;">
            <span lang="" class="question-label active">Fotografía de documento de identidad o fotocopia lado 1.</span><span class="required">*</span>
            <input type="file" name="/a4E3J9gkULZe5eRqQph8zh/group_ww55p84/imagen_documento_identidad_lado1" value="{{ ($data['group_ww55p84/imagen_documento_identidad_lado1']) ?? ''}}" data-required="true()" data-max-pixels="1024" data-type-xml="binary" accept="image/*" data-loaded-file-name="1696275778312.jpg" class="hide">
            
            <div class="widget file-picker">
              <input class="ignore fake-file-input" readonly="" placeholder="Haga clic aquí para subir el archivo. (<10MB)">
              <button type="button" class="btn-icon-only btn-reset" aria-label="reset">
                <i class="icon icon-refresh"> </i>
              </button>
              <a class="btn-icon-only btn-download" aria-label="download" download="1696275778312.jpg" href="{{ ($data['group_ww55p84/imagen_documento_identidad_lado1']) ?? ''}}"><i class="icon icon-download"> </i></a>
              <div class="file-feedback "></div>
              <div class="file-preview">
                <img src="{{ ($data['group_ww55p84/imagen_documento_identidad_lado1']) ?? ''}}" />
              </div>
            </div>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
          
          <label class="question non-select with-media clearfix print-width-adjusted print-height-adjusted" style="width: 100%; height: 394px;">
            <span lang="" class="question-label active">Fotografía de documento de identidad o fotocopia lado 2.</span><span class="required">*</span>
            <input type="file" name="/a4E3J9gkULZe5eRqQph8zh/group_ww55p84/imagen_documento_identidad_lado2" data-required="true()" data-max-pixels="1024" data-type-xml="binary" accept="image/*" data-loaded-file-name="1696275797719.jpg" class="hide">
            <div class="widget file-picker">
              <input class="ignore fake-file-input" readonly="" placeholder="Haga clic aquí para subir el archivo. (<10MB)"><button type="button" class="btn-icon-only btn-reset" aria-label="reset">
                <i class="icon icon-refresh"> </i>
              </button>
              <a class="btn-icon-only btn-download" aria-label="download" download="1696275797719.jpg" href="{{ ($data['group_ww55p84/imagen_documento_identidad_lado2']) ?? ''}}"><i class="icon icon-download"> </i></a>
              <div class="file-feedback "></div>
              <div class="file-preview">
                <img src="{{ ($data['group_ww55p84/imagen_documento_identidad_lado2']) ?? ''}}"></div>
            </div>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>

        </section><!--end of group -->

        <section class="or-group or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_claves" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <h4><span lang="" class="question-label active">MENSAJES CLAVE SOBRE PROCESO DE RETIRO.</span></h4>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;">
            <span lang="" class="question-label active">• El día de retirar la asistencia, lleve su documento original al punto de pago o transferencia.</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_claves/_El_d_a_de_retirar_pago_o_transferencia" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_claves/_El_d_a_de_retirar_pago_o_transferencia']) ?? ''}}">
          </label>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;">
            <span lang="" class="question-label active">• Solamente se entregará el recurso a la persona titular que firma este documento en el punto del proveedor financiero</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_claves/_Solamente_se_entre_proveedor_financiero" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_claves/_Solamente_se_entre_proveedor_financiero']) ?? ''}}">
          </label>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• No acepte ayudas de terceros o personas inescrupulosas que puedan estafarlo (a).</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_claves/_No_acepte_ayudas_d_puedan_estafarlo_a" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_claves/_No_acepte_ayudas_d_puedan_estafarlo_a']) ?? ''}}">
          </label>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 35px;"><span lang="" class="question-label active">• Asista en compañía de un miembro de su hogar o familiar sí le genera más confianza</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_claves/_Asista_en_compa_a_genera_m_s_confianza" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_claves/_Asista_en_compa_a_genera_m_s_confianza']) ?? ''}}">
          </label>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;"><span lang="" class="question-label active">• Tener en cuenta las recomendaciones de retiro y uso de la asistencia brindadas en las jornadas de sensibilización por los profesionales de Acción Contra el Hambre y el consorcio MIRE</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_claves/_Tener_en_cuenta_la_y_el_consorcio_MIRE" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_claves/_Tener_en_cuenta_la_y_el_consorcio_MIRE']) ?? ''}}">
          </label>
        </section><!--end of group -->

        <section class="or-group or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_fraude" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <h4><span lang="" class="question-label active">MENSAJES CLAVES SOBRE PREVENCIÓN DE FRAUDE:</span></h4>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 77px;">
            <span lang="" class="question-label active">Recuerde que la Fundación Acción contra el Hambre y el Consorcio MIRE realizamos nuestros proyectos bajo principios de NEUTRALIDAD, INDEPENDENCIA E IMPARCIALIDAD. Nuestra asistencia humanitaria es totalmente gratuita. Tenemos CERO tolerancia con cualquier tipo de fraude.</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_fraude/Recuerde_que_la_Fund_quier_tipo_de_fraude" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_fraude/Recuerde_que_la_Fund_quier_tipo_de_fraude']) ?? ''}}">
          </label>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 119px;">
            <span lang="" class="question-label active">Ninguna persona puede ofrecerle ser parte de nuestro programa a cambio de dinero o bienes, en caso de conocer algún caso o si ha sido víctima, por favor reportarlo con nuestro personal en sitio de la emergencia y a través del Mecanismo de retroalimentación dispuesto en nuestros canales MQR: correo electrónico pqr@co.acfspain.org – línea de atención gratuita 01800519758 y buzón WEB www.accioncontraelhambre.co/contacto-pqr</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_fraude/Ninguna_persona_pued_mbre_co_contacto_pqr" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_fraude/Ninguna_persona_pued_mbre_co_contacto_pqr']) ?? ''}}">
          </label>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;">
            <span lang="" class="question-label active">Toda la información que usted proporciona en el marco de cualquier caso de fraude será confidencial y estrictamente protegida, en ningún caso afectará su participación en el proyecto.</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_fraude/Toda_la_informaci_n_aci_n_en_el_proyecto" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_fraude/Toda_la_informaci_n_aci_n_en_el_proyecto']) ?? ''}}">
          </label>
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 56px;">
            <span lang="" class="question-label active">Ambas partes declaran de haber leído y entendido este acuerdo, aceptando todas los numerales y obligaciones contenidas a través de sus firmas:</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/group_mensajes_fraude/Ambas_partes_declara_trav_s_de_sus_firmas" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($data['group_mensajes_fraude/Ambas_partes_declara_trav_s_de_sus_firmas']) ?? ''}}">
          </label>
        </section><!--end of group -->

        <section class="or-group-data or-branch or-appearance-field-list" name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'si' and  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'si'">
          <label class="question or-appearance-minimal print-width-adjusted print-height-adjusted" style="width: 100%; height: 196px;">
            <span lang="" class="question-label active">Nombres y apellidos del personal de Acción contra el Hambre que diligencia el formulario</span><span class="required">*</span>
            <span lang="" class="or-hint active">Nombres y apellidos del la persona que esta diligenciando el formulario</span>
            <select name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/personal_ach" data-name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/personal_ach" data-required="true()" data-constraint="regex(., '^[a-zA-Z\D]{7,60}$')" data-type-xml="select1" style="display: none;">
              <option value="">...</option>
              <option value="alejandra_sanjuan" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'alejandra_sanjuan' ? "selected": ""}}>Alejandra Sanjuan</option>
              <option value="angie_carvajal" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'angie_carvajal' ? "selected": ""}}>Angie Carvajal</option>
              <option value="camilo_ruiz" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'camilo_ruiz' ? "selected": ""}}>Camilo Ruiz</option>
              <option value="david_escobar" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'david_escobar' ? "selected": ""}}>David Escobar</option>
              <option value="gina_roa" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'gina_roa' ? "selected": ""}}>Gina Roa</option>
              <option value="kevin_alir_s_n" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'kevin_alir_s_n' ? "selected": ""}}>Kevin Alir Sánchez</option>
              <option value="laura_juliana_" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'laura_juliana_' ? "selected": ""}}>Laura Juliana Montenegro</option>
              <option value="wendy_rubiano" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'wendy_rubiano' ? "selected": ""}}>Lina Trujillo</option>
              <option value="lizeth_moncada" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'lizeth_moncada' ? "selected": ""}}>Lizeth Moncada</option>
              <option value="camila_morales" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'camila_morales' ? "selected": ""}}>María Camila Morales</option>
              <option value="miguel__ngel_g" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'miguel__ngel_g' ? "selected": ""}}>Miguel Ángel Garavito</option>
              <option value="paolin_andrade" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'paolin_andrade' ? "selected": ""}}>Paolin andrade</option>
              <option value="sofia_mora" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'sofia_mora' ? "selected": ""}}>Sofia Mora</option>
              <option value="camilo_villate" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'camilo_villate' ? "selected": ""}}>Camilo Villate</option>
            </select>
            <div class="btn-group bootstrap-select widget clearfix">
              <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                <span class="selected">Alejandra Sanjuan</span><span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li class="active">
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label data-checked="true">
                      <input class="ignore" type="radio" name="59264.75640967346"  value="alejandra_sanjuan" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'alejandra_sanjuan' ? "checked": ""}}>
                      <span class="option-label">Alejandra Sanjuan</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="angie_carvajal" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'angie_carvajal' ? "checked": ""}}>
                      <span class="option-label">Angie Carvajal</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="camilo_ruiz" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'camilo_ruiz' ? "checked": ""}}>
                      <span class="option-label">Camilo Ruiz</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="david_escobar" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'david_escobar' ? "checked": ""}}>
                      <span class="option-label">David Escobar</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="gina_roa" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'gina_roa' ? "checked": ""}}>
                      <span class="option-label">Gina Roa</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="kevin_alir_s_n" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'kevin_alir_s_n' ? "checked": ""}}>
                      <span class="option-label">Kevin Alir Sánchez</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="laura_juliana_" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'laura_juliana_' ? "checked": ""}}>
                      <span class="option-label">Laura Juliana Montenegro</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="wendy_rubiano" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'wendy_rubiano' ? "checked": ""}}>
                      <span class="option-label">Lina Trujillo</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="lizeth_moncada" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'lizeth_moncada' ? "checked": ""}}>
                      <span class="option-label">Lizeth Moncada</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="camila_morales" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'camila_morales' ? "checked": ""}}>
                      <span class="option-label">María Camila Morales</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="miguel__ngel_g" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'miguel__ngel_g' ? "checked": ""}}>
                      <span class="option-label">Miguel Ángel Garavito</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="paolin_andrade" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'paolin_andrade' ? "checked": ""}}>
                      <span class="option-label">Paolin andrade</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="sofia_mora" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'sofia_mora' ? "checked": ""}}>
                      <span class="option-label">Sofia Mora</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="59264.75640967346" value="camilo_villate" {{isset($data['firma_acuerdo_de_transferencias/personal_ach']) && $data['firma_acuerdo_de_transferencias/personal_ach'] == 'camilo_villate' ? "checked": ""}}>
                      <span class="option-label">Camilo Villate</span>
                    </label>
                  </a>
                </li>
              </ul>
            </div><span class="or-option-translations" style="display:none;">
            </span>
            <span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
          
          <label class="question or-appearance-minimal print-width-adjusted print-height-adjusted" style="width: 100%; height: 126px;">
            <span lang="" class="question-label active">Cargo de personal de Acción contra el Hambre</span><span class="required">*</span>
            <select name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/cargo_personal_ach" data-name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/cargo_personal_ach" data-required="true()" data-type-xml="select1" style="display: none;">
              <option value="">...</option>
              <option value="monitor/a_san" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "monitor/a_san" ? "selected" : ""}}>Monitor/a SAN</option>
              <option value="monitor/a_wash" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "monitor/a_wash" ? "selected" : ""}}>Monitor/a WASH</option>
              <option value="profesional_en_agua_saneamiento en emergencia" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "profesional_en_agua_saneamiento en emergencia" ? "selected" : ""}}>Profesional en agua y saneamiento en emergencia</option>
              <option value="profesional_Seguridad_Alimentaria_Medios de Vida" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "profesional_Seguridad_Alimentaria_Medios de Vida" ? "selected" : ""}}>Profesional Seguridad Alimentaria y Medios de Vida</option>
              <option value="asistente_data" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "asistente_data" ? "selected" : ""}}>Profesional de protección</option>
              <option value="asistente_meal" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "asistente_meal" ? "selected" : ""}}>Oficila MEAL</option>
            </select>
            <div class="btn-group bootstrap-select widget clearfix">
              <button type="button" class="btn btn-default dropdown-toggle clearfix" data-toggle="dropdown">
                <span class="selected">Profesional en agua y saneamiento en emergencia</span><span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="68880.15147503646" value="monitor/a_san" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "monitor/a_san" ? "checked" :""}}>
                      <span class="option-label">Monitor/a SAN</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="68880.15147503646" value="monitor/a_wash" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "monitor/a_wash" ? "checked" :""}}>
                      <span class="option-label">Monitor/a WASH</span>
                    </label>
                  </a>
                </li>
                <li class="active">
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label data-checked="true">
                      <input class="ignore" type="radio" name="68880.15147503646" value="profesional_en_agua_saneamiento en emergencia" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "profesional_en_agua_saneamiento en emergencia" ? "checked": ""}}>
                      <span class="option-label">Profesional en agua y saneamiento en emergencia</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="68880.15147503646" value="profesional_Seguridad_Alimentaria_Medios de Vida" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "profesional_Seguridad_Alimentaria_Medios de Vida" ? "checked" : ""}}>
                      <span class="option-label">Profesional Seguridad Alimentaria y Medios de Vida</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="68880.15147503646" value="asistente_data" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "asistente_data" ? "checked" : ""}}>
                      <span class="option-label">Profesional de protección</span>
                    </label>
                  </a>
                </li>
                <li>
                  <a class="option-wrapper" tabindex="-1" href="#">
                    <label>
                      <input class="ignore" type="radio" name="68880.15147503646" value="asistente_meal" {{isset($data['firma_acuerdo_de_transferencias/cargo_personal_ach']) && $data['firma_acuerdo_de_transferencias/cargo_personal_ach'] == "asistente_meal" ? "checked" : ""}}>
                      <span class="option-label">Oficila MEAL</span>
                    </label>
                  </a>
                </li>
              </ul>
            </div><span class="or-option-translations" style="display:none;">
            </span><span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
          
          <label class="question non-select or-appearance-signature or-signature-initialized print-width-adjusted print-height-adjusted" style="width: 100%; height: 409px;">
            <span lang="" class="question-label active">Firma de personal de Acción contra el Hambre</span><span class="required">*</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/firma_personal_ach" data-required="true()" data-type-xml="binary" accept="image/*" data-loaded-file-name="1696275861284.jpg" data-drawing="true" data-filename-postfix="-22_12_2">
            <div class="widget draw-widget">
              <div class="draw-widget__body">


                <canvas class="draw-widget__body__canvas noSwipe" tabindex="0" width="1495" style="touch-action: none;" height="673">
                  <img class="" src="{{ ($data['firma_acuerdo_de_transferencias/firma_personal_ach']) ?? ''}}" />
                </canvas>
                <div class="draw-widget__colorpicker"></div>

              </div>
              <div class="draw-widget__footer">
                <button type="button" class="btn-icon-only btn-reset" aria-label="reset">
                  <i class="icon icon-refresh"> </i>
                </button>
                
                <a class="btn-icon-only btn-download" aria-label="download" download="1696275861284-22_12_2.jpg" href="{{ ($data['firma_acuerdo_de_transferencias/firma_personal_ach']) ?? ''}}">
                  <i class="icon icon-download"> </i>
                </a>
                <div class="draw-widget__feedback"></div>
              </div>
            </div>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
          
          <label class="question non-select readonly print-width-adjusted print-height-adjusted" style="width: 100%; height: 51px;">
            <span lang="" class="question-label active">Yo, 
              <strong>
                <span class="or-output" data-value=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/nombre_participante ">
                  {{ ($data['grupo_datos_beneficiario/nombre_participante']) ?? ''}}
                </span>
              </strong>
              , identificado/a con documento 
              <span class="or-output" data-value=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/tipo_documento_participante ">
                {{ ($data['grupo_datos_beneficiario/tipo_documento_participante']) ?? ''}}
              </span> y número 
              <span class="or-output" data-value=" /a4E3J9gkULZe5eRqQph8zh/grupo_datos_beneficiario/numero_identificacion_participante ">
                {{ ($data['grupo_datos_beneficiario/numero_identificacion_participante']) ?? ''}}
              </span>
            </span>
            
            <span lang="" class="or-hint active">Nombres y apellidos</span>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/nota_datos_personales_participantes" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" value="{{ ($date['firma_acuerdo_de_transferencias/nota_datos_personales_participantes']) ?? ''}}">
          </label>

          <fieldset class="question simple-select print-width-adjusted print-height-adjusted" style="width: 100%; height: 101px;">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">¿Cómo desea autorizar el acuerdo de transferencia?</span><span class="required">*</span>
              </legend>

              <div class="option-wrapper">
                <label class="">
                  <input type="checkbox" name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/forma_consentimiento_informado" value="audio" {{isset($data['firma_acuerdo_de_transferencias/forma_consentimiento_informado']) && $data['firma_acuerdo_de_transferencias/forma_consentimiento_informado'] == "audio" ? "checked" : ""}} data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Audio / Foto</span>
                </label>
              
                <label class="" data-checked="true">
                  <input type="checkbox" name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/forma_consentimiento_informado" value="firma" {{isset($data['firma_acuerdo_de_transferencias/forma_consentimiento_informado']) && $data['firma_acuerdo_de_transferencias/forma_consentimiento_informado'] == "firma" ? "checked" : ""}} data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Firma</span>
                </label>
              </div>

            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          
          <label class="question or-branch non-select or-appearance-signature or-signature-initialized print-width-adjusted print-height-adjusted" style="width: 100%; height: 409px;">
            <span lang="" class="question-label active">Firma</span><span class="required">*</span>

            <?php if(isset($data['firma_acuerdo_de_transferencias/forma_consentimiento_informado']) == 'firma') {?>
              <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/aceptacion_firma" data-required="true()" data-relevant="selected( /a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/forma_consentimiento_informado , 'firma')" data-max-pixels="1024" data-type-xml="binary" accept="image/*" data-loaded-file-name="1696275896367.jpg" data-drawing="true" data-filename-postfix="-22_12_3">

              <div class="widget draw-widget">
                <div class="draw-widget__body">

                  <canvas class="draw-widget__body__canvas noSwipe" tabindex="0" width="1495" style="touch-action: none;" height="673">
                    <img class="" src="{{ ($data['firma_acuerdo_de_transferencias/aceptacion_firma']) ?? ''}}" />
                  </canvas>
                  <div class="draw-widget__colorpicker"></div>
                </div>

                <div class="draw-widget__footer">
                  <button type="button" class="btn-icon-only btn-reset" aria-label="reset">
                    <i class="icon icon-refresh"> </i>
                  </button>
                  <a class="btn-icon-only btn-download" aria-label="download" download="1696275896367-22_12_3.jpg" href="{{ ($data['firma_acuerdo_de_transferencias/aceptacion_firma']) ?? ''}}"><i class="icon icon-download"> </i></a>
                  <div class="draw-widget__feedback"></div>
                </div>
              </div>
              <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
            <?php }?>
          </label>
          
          <label class="question or-branch non-select with-media clearfix disabled">
            <span lang="" class="question-label active">Foto</span><span class="required">*</span>

            <?php if(isset($data['firma_acuerdo_de_transferencias/forma_consentimiento_informado']) == 'audio'){?>

              <input type="file" name="/a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/Foto" data-required="true()" data-relevant="selected( /a4E3J9gkULZe5eRqQph8zh/firma_acuerdo_de_transferencias/forma_consentimiento_informado , 'audio')" data-max-pixels="1024" data-type-xml="binary" accept="image/*" class="hide">
              <div class="widget file-picker">
                <input class="ignore fake-file-input" placeholder="Haga clic aquí para subir el archivo. (<10MB)">}
                <button type="button" class="btn-icon-only btn-reset" aria-label="reset">
                  <i class="icon icon-refresh"> </i>
                </button>
                
                <a class="btn-icon-only btn-download" aria-label="download" download="" href="{{ ($data['firma_acuerdo_de_transferencias/Foto']) ?? ''}}"><i class="icon icon-download"> </i></a>
                
                <div class="file-feedback "></div>
                <div class="file-preview"></div>
              </div>
            
              <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
            <?php }?>

          </label>
        </section><!--end of group -->
        
        <?php }?>
        
        <label class="question or-branch non-select readonly disabled">
          <span lang="" class="question-label active"><span style="color:red;"><strong>IMPORTANTE:</strong>     </span> 
          <em>Teniendo en cuenta que no se han brindando todas las autorizaciones no se puede continuar con el formulario. Gracias por participar.</em></span>
          <?php if(isset($data['autorizacion_acuerdo/autorizacion_tratamiento_de_datos'])   == 'no' || $data['autorizacion_acuerdo/autorizacion_uso_fotografias']   == 'no'){?>
            <input type="text" name="/a4E3J9gkULZe5eRqQph8zh/nota_final_formulario" value="{{ ($data['nota_final_formulario']) ?? ''}}" data-relevant=" /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_tratamiento_de_datos  = 'no' or  /a4E3J9gkULZe5eRqQph8zh/autorizacion_acuerdo/autorizacion_uso_fotografias  = 'no'" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000" disabled="">
          <?php }?>
        </label>

        <fieldset id="or-preload-items" style="display:none;">
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/start" data-preload="timestamp" data-preload-params="start" data-type-xml="dateTime" value="2023-10-02T14:26:43.343">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/end" data-preload="timestamp" data-preload-params="end" data-type-xml="dateTime" value="2024-03-17T22:09:58.202">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/today" data-preload="date" data-preload-params="today" data-type-xml="date" value="2023-10-02">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/username" data-preload="property" data-preload-params="username" data-type-xml="string" value="codwnl157" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/deviceid" data-preload="property" data-preload-params="deviceid" data-type-xml="string" value="collect:nzDjZd1LxFvg1zJC" maxlength="2000">
          </label>
        </fieldset>
        
        <fieldset id="or-calculated-items" style="display:none;">
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/__version__" data-calculate="'v93k8aUPkQvHk6BJc7xvhe'" data-type-xml="string" value="v93k8aUPkQvHk6BJc7xvhe" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/_version_" data-calculate="'v5rSaPUd4kQTunX4rW6acj'" data-type-xml="string" value="v5rSaPUd4kQTunX4rW6acj" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/_version__001" data-calculate="'vvEafSmX3UmR4okJaEnJ5v'" data-type-xml="string" value="vvEafSmX3UmR4okJaEnJ5v" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/meta/instanceID" data-type-xml="string" value="uuid:cd046eb7-680f-43b6-b06c-b145f3ca0766" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/a4E3J9gkULZe5eRqQph8zh/formhub/uuid" data-calculate="'94d63ebcff7640ad8b407d650bd1c35c'" data-type-xml="string" value="94d63ebcff7640ad8b407d650bd1c35c" maxlength="2000">
          </label>
        </fieldset>
      
      </form>

      <section class="form-footer">
        <div class="form-footer__content">
          <div class="form-footer__content__main-controls"> <button class="btn btn-primary" id="submit-form"><i class="icon icon-check"> </i>Enviar</button><a class="btn btn-primary next-page" href="#">Siguiente</a>
            <div class="logout hide"><a href="/logout" title="log out of all enketo forms that require authentication">Cerrar sesión</a></div><!-- If you're considering changing this, be careful not to violate licence terms.-->
            <div class="enketo-power">Powered by<a href="https://enketo.org" title="enketo.org website"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjIwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCwgMCwgMjIwLCAxMDAiPgogIDxnIGlkPSJMYXllciAxIj4KICAgIDxnPgogICAgICA8cGF0aCBkPSJNMTcuOTUyLDcyLjQ4MiBMMTcuOTUyLDM4LjU0MSBDMTcuOTUyLDM1Ljg2OCAyMC4wNjYsMzMuNzU0IDIyLjczOCwzMy43NTQgTDM2LjQ5NiwzMy43NTQgQzM4Ljg1OSwzMy43NTQgNDAuNzg2LDM1LjY4MSA0MC43ODYsMzguMDQ0IEM0MC43ODYsNDAuNDA3IDM4Ljg1OSw0Mi4yNzEgMzYuNDk2LDQyLjI3MSBMMjcuNDY0LDQyLjI3MSBMMjcuNDY0LDUxLjA5OCBMMzMuNjk5LDUxLjA5OCBDMzYuMDYxLDUxLjA5OCAzNy45ODksNTMuMDI1IDM3Ljk4OSw1NS4zODggQzM3Ljk4OSw1Ny43NSAzNi4wNjEsNTkuNjE1IDMzLjY5OSw1OS42MTUgTDI3LjQ2NCw1OS42MTUgTDI3LjQ2NCw2OC43NTQgTDM2LjgwOCw2OC43NTQgQzM5LjE3LDY4Ljc1NCA0MS4wOTgsNzAuNjggNDEuMDk4LDczLjA0MyBDNDEuMDk4LDc1LjQwNCAzOS4xNyw3Ny4yNyAzNi44MDgsNzcuMjcgTDIyLjczOSw3Ny4yNyBDMjAuMDY2LDc3LjI2OSAxNy45NTIsNzUuMTU2IDE3Ljk1Miw3Mi40ODIgeiIgZmlsbD0iIzAwMDAwMCIvPgogICAgICA8cGF0aCBkPSJNMTE3LjkxOCw3Mi40ODIgTDExNy45MTgsMzguNTQxIEMxMTcuOTE4LDM1Ljg2OCAxMjAuMDMyLDMzLjc1NCAxMjIuNzA1LDMzLjc1NCBMMTM2LjQ2MywzMy43NTQgQzEzOC44MjUsMzMuNzU0IDE0MC43NTIsMzUuNjgxIDE0MC43NTIsMzguMDQ0IEMxNDAuNzUyLDQwLjQwNyAxMzguODI1LDQyLjI3MSAxMzYuNDYzLDQyLjI3MSBMMTI3LjQzLDQyLjI3MSBMMTI3LjQzLDUxLjA5OCBMMTMzLjY2Nyw1MS4wOTggQzEzNi4wMjgsNTEuMDk4IDEzNy45NTUsNTMuMDI1IDEzNy45NTUsNTUuMzg4IEMxMzcuOTU1LDU3Ljc1IDEzNi4wMjgsNTkuNjE1IDEzMy42NjcsNTkuNjE1IEwxMjcuNDMsNTkuNjE1IEwxMjcuNDMsNjguNzU0IEwxMzYuNzc1LDY4Ljc1NCBDMTM5LjEzNiw2OC43NTQgMTQxLjA2NCw3MC42OCAxNDEuMDY0LDczLjA0MyBDMTQxLjA2NCw3NS40MDQgMTM5LjEzNiw3Ny4yNyAxMzYuNzc1LDc3LjI3IEwxMjIuNzA2LDc3LjI3IEMxMjAuMDMyLDc3LjI2OSAxMTcuOTE4LDc1LjE1NiAxMTcuOTE4LDcyLjQ4MiB6IiBmaWxsPSIjMDAwMDAwIi8+CiAgICAgIDxwYXRoIGQ9Ik0xNTMuOTAyLDQyLjU4MiBMMTQ5Ljg4MSw0Mi41ODIgQzE0Ny40NTcsNDIuNTgyIDE0NS40NjcsNDAuNTkzIDE0NS40NjcsMzguMTY4IEMxNDUuNDY3LDM1Ljc0NCAxNDcuNDU3LDMzLjc1NCAxNDkuODgxLDMzLjc1NCBMMTY3LjQ5MywzMy43NTQgQzE2OS45MTcsMzMuNzU0IDE3MS45MDcsMzUuNzQzIDE3MS45MDcsMzguMTY4IEMxNzEuOTA3LDQwLjU5MyAxNjkuOTE3LDQyLjU4MiAxNjcuNDkzLDQyLjU4MiBMMTYzLjQ3Myw0Mi41ODIgTDE2My40NzMsNzIuODU1IEMxNjMuNDczLDc1LjUyOSAxNjEuMzYsNzcuNjQyIDE1OC42ODgsNzcuNjQyIEMxNTYuMDEzLDc3LjY0MiAxNTMuOTAxLDc1LjUyOSAxNTMuOTAxLDcyLjg1NSBMMTUzLjkwMSw0Mi41ODIgeiIgZmlsbD0iIzAwMDAwMCIvPgogICAgICA8cGF0aCBkPSJNNzQuMzgzLDc3Ljk3NyBDNzIuODg2LDc3Ljk3NyA3MS40MjIsNzcuMjI2IDcwLjU3Miw3NS44NjEgTDQ4LjY3Miw0MC42MzQgQzQ3LjM2NCwzOC41MzIgNDguMDEsMzUuNzY4IDUwLjExMiwzNC40NjIgQzUyLjIxMSwzMy4xNTUgNTQuOTc2LDMzLjc5OSA1Ni4yODMsMzUuOTAxIEw3OC4xODMsNzEuMTI4IEM3OS40OSw3My4yMzEgNzguODQ2LDc1Ljk5MyA3Ni43NDQsNzcuMyBDNzYuMDA4LDc3Ljc1OSA3NS4xOSw3Ny45NzcgNzQuMzgzLDc3Ljk3NyB6IiBmaWxsPSIjMDAwMDAwIi8+CiAgICAgIDxwYXRoIGQ9Ik03NS4wMDEsNzcuOTc2IEM3Mi41MjcsNzcuOTc2IDcwLjUyLDc1Ljk3IDcwLjUyLDczLjQ5NiBMNzAuNTIsMzguMjY4IEM3MC41MiwzNS43OTMgNzIuNTI4LDMzLjc4NyA3NS4wMDEsMzMuNzg3IEM3Ny40NzcsMzMuNzg3IDc5LjQ4MiwzNS43OTMgNzkuNDgyLDM4LjI2OCBMNzkuNDgyLDczLjQ5NiBDNzkuNDgyLDc1Ljk3IDc3LjQ3Niw3Ny45NzYgNzUuMDAxLDc3Ljk3NiB6IiBmaWxsPSIjMDAwMDAwIi8+CiAgICAgIDxwYXRoIGQ9Ik01MS4wNTMsNzcuOTc2IEM0OC41NzcsNzcuOTc2IDQ2LjU3Miw3NS45NyA0Ni41NzIsNzMuNDk2IEw0Ni41NzIsMzguMjY4IEM0Ni41NzIsMzUuNzkzIDQ4LjU3OCwzMy43ODcgNTEuMDUzLDMzLjc4NyBDNTMuNTI4LDMzLjc4NyA1NS41MzQsMzUuNzkzIDU1LjUzNCwzOC4yNjggTDU1LjUzNCw3My40OTYgQzU1LjUzNSw3NS45NyA1My41MjksNzcuOTc2IDUxLjA1Myw3Ny45NzYgeiIgZmlsbD0iIzAwMDAwMCIvPgogICAgICA8cGF0aCBkPSJNODkuNjQ4LDc3Ljk3NiBDODcuMTczLDc3Ljk3NiA4NS4xNjcsNzUuOTcgODUuMTY3LDczLjQ5NiBMODUuMTY3LDM4LjI2OCBDODUuMTY3LDM1Ljc5MyA4Ny4xNzQsMzMuNzg3IDg5LjY0OCwzMy43ODcgQzkyLjEyMiwzMy43ODcgOTQuMTI5LDM1Ljc5MyA5NC4xMjksMzguMjY4IEw5NC4xMjksNzMuNDk2IEM5NC4xMyw3NS45NyA5Mi4xMjMsNzcuOTc2IDg5LjY0OCw3Ny45NzYgeiIgZmlsbD0iIzAwMDAwMCIvPgogICAgICA8cGF0aCBkPSJNOTAuNjc5LDY4LjAwNCBDODkuODE2LDY4LjAwNCA4OC45NDEsNjcuNzU1IDg4LjE3Miw2Ny4yMzQgQzg2LjEyMyw2NS44NDUgODUuNTg1LDYzLjA2IDg2Ljk3Myw2MS4wMSBMMTA0LjA2OCwzNS43NTUgQzEwNS40NTcsMzMuNzA1IDEwOC4yNDEsMzMuMTY5IDExMC4yOTMsMzQuNTU2IEMxMTIuMzQyLDM1Ljk0MyAxMTIuODc5LDM4LjcyOSAxMTEuNDkyLDQwLjc3OSBMOTQuMzk2LDY2LjAzNCBDOTMuNTI5LDY3LjMxNCA5Mi4xMTcsNjguMDA0IDkwLjY3OSw2OC4wMDQgeiIgZmlsbD0iIzAwMDAwMCIvPgogICAgICA8cGF0aCBkPSJNMTA5LjA4LDc3Ljk3NyBDMTA3LjYyNyw3Ny45NzcgMTA2LjIwMyw3Ny4yNzEgMTA1LjMzOSw3NS45NyBMOTIuNDMzLDU2LjQ5NSBDOTEuMDY3LDU0LjQzMiA5MS42MzEsNTEuNjUxIDkzLjY5Myw1MC4yODQgQzk1Ljc1NSw0OC45MTYgOTguNTM2LDQ5LjQ4MSA5OS45MDUsNTEuNTQ0IEwxMTIuODExLDcxLjAxOSBDMTE0LjE3OCw3My4wODIgMTEzLjYxNCw3NS44NjMgMTExLjU1MSw3Ny4yMyBDMTEwLjc4OSw3Ny43MzUgMTA5LjkyOSw3Ny45NzcgMTA5LjA4LDc3Ljk3NyB6IiBmaWxsPSIjMDAwMDAwIi8+CiAgICAgIDxwYXRoIGQ9Ik0xODguMTkxLDc4LjAyOCBDMTgwLjU0OSw3OC4wMjggMTc0LjMzMyw3MS44MTEgMTc0LjMzMyw2NC4xNyBMMTc0LjMzMyw0Ny41OTMgQzE3NC4zMzMsMzkuOTUyIDE4MC41NSwzMy43MzYgMTg4LjE5MSwzMy43MzYgQzE5NS44MzIsMzMuNzM2IDIwMi4wNDgsMzkuOTUyIDIwMi4wNDgsNDcuNTkzIEwyMDIuMDQ4LDY0LjE3IEMyMDIuMDQ4LDcxLjgxMSAxOTUuODMyLDc4LjAyOCAxODguMTkxLDc4LjAyOCB6IE0xODguMTkxLDQyLjgwMSBDMTg1LjU0OCw0Mi44MDEgMTgzLjM5OCw0NC45NSAxODMuMzk4LDQ3LjU5MyBMMTgzLjM5OCw2NC4xNyBDMTgzLjM5OCw2Ni44MTMgMTg1LjU0OCw2OC45NjMgMTg4LjE5MSw2OC45NjMgQzE5MC44MzMsNjguOTYzIDE5Mi45ODMsNjYuODEzIDE5Mi45ODMsNjQuMTcgTDE5Mi45ODMsNDcuNTkzIEMxOTIuOTgzLDQ0Ljk1IDE5MC44MzMsNDIuODAxIDE4OC4xOTEsNDIuODAxIHoiIGZpbGw9IiMwMDAwMDAiLz4KICAgICAgPHBhdGggZD0iTTEyNy40ODMsMjkuMzQzIEMxMjcuNDUsMjkuMzQzIDEyNy40MTYsMjkuMzQzIDEyNy4zODIsMjkuMzQyIEMxMjYuMjczLDI5LjMxNSAxMjUuMjE5LDI4Ljg0NCAxMjQuNDU5LDI4LjAzMyBMMTE4LjYzNCwyMS44MTggQzExNy4wNjksMjAuMTQ5IDExNy4xNTIsMTcuNTI2IDExOC44MjMsMTUuOTYgQzEyMC40OTIsMTQuMzk1IDEyMy4xMTYsMTQuNDggMTI0LjY4LDE2LjE1IEwxMjcuNjI0LDE5LjI5IEwxMzcuMDY2LDEwLjE0MiBDMTM4LjcwOSw4LjU1MSAxNDEuMzMyLDguNTkxIDE0Mi45MjYsMTAuMjM1IEMxNDQuNTE5LDExLjg3OSAxNDQuNDc3LDE0LjUwMyAxNDIuODMzLDE2LjA5NSBMMTMwLjM2NCwyOC4xNzQgQzEyOS41OTEsMjguOTI2IDEyOC41NTgsMjkuMzQzIDEyNy40ODMsMjkuMzQzIHoiIGZpbGw9IiNGMTVBMjkiLz4KICAgIDwvZz4KICA8L2c+CiAgPGRlZnMvPgo8L3N2Zz4K" alt="Enketo logo"></a></div><a class="previous-page disabled" href="#">Volver</a>
          </div>
          <div class="form-footer__content__jump-nav"><a class="btn btn-default disabled first-page" href="#">Volver al principio</a><a class="btn btn-default disabled last-page" href="#">Ir al final</a></div>
        </div>
      </section>
    </article>
  </div>
  <div class="alert-box warning" id="feedback-bar"><span class="icon icon-info-circle"></span><button class="btn-icon-only close">×</button></div>
  <!-- <script id="main-script" defer="" module="" src="https://ee.acf-e.org/js/build/enketo-webform-edit-bundle.min.js"></script>
  <script nomodule="">
    var mainScript = document.querySelector('#main-script');
    var mainScriptSrc = mainScript.src;
    mainScript.remove();
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = mainScriptSrc.replace('-bundle.', '-ie11-bundle.');
    document.body.appendChild(script);
  </script> -->
</body>

</html>