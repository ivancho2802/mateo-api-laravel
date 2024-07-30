<html lang="es-" dir="ltr">

<head>
  <title>{{$filename}}</title>
  <meta charset="utf-8">
  <meta name="author" content="Martijn van de Rijdt (Enketo LLC)">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="https://ugic.api.ach.dyndns.info/public/download/favicon.ico">
  <link rel="icon" type="image/png" sizes="180x180" href="https://ugic.api.ach.dyndns.info/public/download/logo_ach_only_icon.png">
  <link rel="apple-touch-icon" sizes="180x180" href="https://ugic.api.ach.dyndns.info/public/download/logo_ach_only_icon.png">
  <!-- <script src="https://ee.acf-e.org/js/build/ie11-polyfill.min.js" nomodule=""></script>
  <script src="https://ee.acf-e.org/js/build/obscure-ie11-polyfills.js" nomodule=""></script> -->
  <!-- preload for performance-->
  <link rel="preload" as="font" href="/public/download/OpenSans-Bold-webfont.woff" type="font/woff" crossorigin="">
  <link rel="preload" as="font" href="/public/download/OpenSans-Regular-webfont.woff" type="font/woff" crossorigin="">
  <link rel="preload" as="font" href="/public/download/fontawesome-webfont.woff?v=4.6.2" type="font/woff" crossorigin="">
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
  <link rel="stylesheet" type="text/css" href="/public/download/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/public/download/theme-grid.print.css">
  <link rel="stylesheet" type="text/css" href="/public/download/theme-grid.css">

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
      -webkit-box-shadow: 0 0 0 1px #66afe9, 0 0 8px rgba(102, 175, 233, 0.6) !important;
      box-shadow: 0 0 0 1px #66afe9, 0 0 8px rgba(102, 175, 233, 0.6) !important;
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
      -webkit-box-shadow: 0 0 0 1px #66afe9, 0 0 8px rgba(102, 175, 233, 0.6) !important;
      box-shadow: 0 0 0 1px #66afe9, 0 0 8px rgba(102, 175, 233, 0.6) !important;
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
      background: url('http://ach.dyndns.info:6280/cheque.png') no-repeat;
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
      background: url('http://ach.dyndns.info:6280/cheque.png') no-repeat;
      background-size: contain;
    }

    .option-wrapper-label picture {
      position: relative;
      display: inline-block;
    } */
  </style>

  <!-- src="chrome-extension://nngceckbapebfimnlniiiahkandclblb/content/fido2/page-script.js" -->

</head>

<body cz-shortcut-listen="true">
  <div class="main">
    <article class="paper">

      <header class="form-header">
        <div class="offline-enabled">
          <div class="offline-enabled__icon not-enabled" title="This form is able to launch offline"></div>
          <div class="offline-enabled__queue-length" title="Records Queued">0</div>
        </div>
        <div class="form-progress"></div>
        <div class="form-header__branding">
          <div class="logo-wrapper">
            <!-- Logo init -->
            @forelse ($metaFilesForm as $metadata)
            <img src="{{$metadata->data_file}}" alt="brand logo">
            @empty
            no hay
            @endforelse
          </div>
        </div>

        <div class="form-header__filler"></div>
      </header>

      <form autocomplete="off" novalidate="novalidate" class="or clearfix" dir="ltr" id="anbSobwmtUQ75RZS5cvrNh" onsubmit="return false;" data-edited="false">
        <!--This form was created by transforming a OpenRosa-flavored (X)Form using an XSL stylesheet created by Enketo LLC.-->
        <section class="form-logo"> </section>
        <h3 dir="auto" id="form-title">{{$filename}}</h3>

        <section class="or-group or-appearance-field-list " name="/anbSobwmtUQ75RZS5cvrNh/datos_generales">
          <label class="question non-select readonly">
            <span lang="default" class="option-label active"></span>

            <!--alguna foto-->
            @forelse ($metaFilesForm as $metadata)
            @if(stripos($metadata->data_file, 'data:image')!==false)
            <img src="{{$metadata->data_file}}" alt="brand logo">
            @endif
            @empty
            no hay
            @endforelse

          </label>

          @for ($i = 0; $i < count($data->keys()); $i++)

            <!--solo mostrar subtitulo cuando el anterior sea diferente-->
            @if(
            $i == 0 ||
            (
            strpos($data->keys()[$i], "/") >=0 &&
            isset($data->keys()[$i-1]) &&
            explode("/", $data->keys()[$i])[0] !== explode("/", $data->keys()[$i-1])[0]
            )
            )
            <h4>
              <span lang="" class="question-label active">
                {{
                  explode("/", $data->keys()[$i])[0]
                }}
              </span>
            </h4>
            @endif

            <label class="question non-select ">
              <span lang="" class="question-label active">{{isset($data->keys()[$i]) ? is_string($data->keys()[$i]) ? $data->keys()[$i] : implode($data->keys()[$i]): 'N/A'}}:</span>
              <span class="required">*</span>
              <div class="question date">
                @if((stripos(isset($data->keys()[$i]) ? is_string($data->keys()[$i]) ? $data->keys()[$i] : implode($data->keys()[$i]): 'N/A', 'data:image') !== false))
                <div class="file-preview">
                  <img src="{{isset($data->values()[$i]) ? is_string($data->values()[$i]) ? $data->values()[$i] : json_encode($data->values()[$i]): 'N/A'}}" />
                </div>
                @elseif(is_string($data->values()[$i])) 
                <input class="ignore input-small" type="text" value="{{isset($data->values()[$i]) ? is_string($data->values()[$i]) ? $data->values()[$i] : json_encode($data->values()[$i]): 'N/A'}}">
                @elseif(is_array($data->values()[$i]))
                  @foreach ($data->values()[$i] as $dataf)
                    @for ($j = 0; $j < count(collect($dataf)->keys()); $j++)
                      <label class="question non-select ">
                        <span lang="" class="question-label active">{{isset(collect($dataf)->keys()[$j]) ? is_string(collect($dataf)->keys()[$j]) ? collect($dataf)->keys()[$j] : implode(collect($dataf)->keys()[$j]): 'N/A'}}:</span>
                        <span class="required">*</span>
                        <div class="widget date">
                          <input class="ignore input-small" type="text" value="{{isset(collect($dataf)->values()[$j]) ? is_string(collect($dataf)->values()[$j]) ? collect($dataf)->values()[$j] : json_encode(collect($dataf)->values()[$j]): 'N/A'}}">
                        </div>
                      </label>
                      <br>
                    @endfor
                      <br>
                  @endforeach
                @else
                  <input class="ignore input-small" type="text" value="{{isset($data->values()[$i]) ? is_string($data->values()[$i]) ? $data->values()[$i] : json_encode($data->values()[$i]): 'N/A'}}">
                @endif

              </div>
            </label>
            @endfor

        </section><!--end of group -->

      </form>

    </article>
  </div>

  <script id="main-script" defer="" module="" src="/js/build/enketo-webform-bundle.min.js"></script>
  <script nomodule="">
    var mainScript = document.querySelector('#main-script');
    var mainScriptSrc = mainScript.src;
    mainScript.remove();
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = mainScriptSrc.replace('-bundle.', '-ie11-bundle.');
    document.body.appendChild(script);
  </script>
</body>

</html>