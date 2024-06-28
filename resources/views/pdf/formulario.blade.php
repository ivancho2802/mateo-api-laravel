<html lang="es-" dir="ltr">

<head>
  <title>{{$formdata->title}}</title>
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
  <link rel="stylesheet" media="all" type="text/css" href="http://ach.dyndns.info:6280/theme-grid.css">

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
            @forelse ($formdata->metadata as $metadata)
            <img src="{{$metadata->url}}" alt="brand logo">
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
        <h3 dir="auto" id="form-title">{{$formdata->title}}</h3>

        <section class="or-group or-appearance-field-list " name="/anbSobwmtUQ75RZS5cvrNh/datos_generales">
          <label class="question non-select readonly">
            <span lang="default" class="option-label active"></span>

            <!--alguna foto-->
            @forelse ($formdata->metadata as $metadata)
            <!--<img lang="default" class="active" data-offline-src="{{$metadata->url}}" src="{{$metadata->url}}" data-itext-id="/anbSobwmtUQ75RZS5cvrNh/datos_generales/logo:label" alt="image">-->
            @empty
            no hay
            @endforelse

            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/logo" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000">
          </label>
          -----------------------------------

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
              <span lang="" class="question-label active">{{isset($data->keys()[$i]) ? is_string($data->keys()[$i]) ? $data->keys()[$i] : ($data->keys()[$i]): 'N/A'}}:</span>
              <span class="required">*</span>
              <!-- <input type="date" name="{{isset($data->values()[$i]) ? is_string($data->values()[$i]) ? $data->values()[$i] : implode($data->values()[$i]): 'N/A'}}"  data-type-xml="date" style="display: none;"> -->
              <div class="widget date">
                <input class="ignore input-small" type="text" placeholder="yyyy-mm-dd" value="{{isset($data->values()[$i]) ? is_string($data->values()[$i]) ? $data->values()[$i] : json_encode($data->values()[$i]): 'N/A'}}">
              </div>
            </label>
          @endfor
          -----------------------------------

          <label class="question non-select ">
            <span lang="" class="question-label active">Fecha de aplicación de la encuesta:</span>
            <span class="required">*</span>
            <input type="date" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/fecha_encuesta" data-required="true()" data-constraint=".=today()" data-calculate="today()" data-type-xml="date" style="display: none;">
            <div class="widget date"><input class="ignore input-small" type="text" placeholder="yyyy-mm-dd"><button type="button" class="btn-icon-only btn-reset" aria-label="reset">
                <i class="icon icon-refresh"> </i>

              </button></div>
            <span lang="" class="or-constraint-msg active">Fecha de hoy**</span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>

          <label class="question or-appearance-minimal-autocomplete ">
            <span lang="" class="question-label active">Departamento</span>
            <span class="required">*</span><input name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/departamento" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/departamento" data-required="true()" data-type-xml="select1" type="text" list="anbSobwmtUQ75RZS5cvrNhdatosgeneralesdepartamento" class="hide">
            <input type="text" class="ignore widget autocomplete" list="anbSobwmtUQ75RZS5cvrNhdatosgeneralesdepartamento"><datalist id="anbSobwmtUQ75RZS5cvrNhdatosgeneralesdepartamento">
              <option value="..." data-value=""></option>
              <option value="Antioquia" data-value="antioquia"></option>
              <option value="Atlántico" data-value="atlantico"></option>
              <option value="Bogotá D.C." data-value="bogota"></option>
              <option value="Bolívar" data-value="bolivar"></option>
              <option value="Boyacá" data-value="boyaca"></option>
              <option value="Caldas" data-value="caldas"></option>
              <option value="Caquetá" data-value="caqueta"></option>
              <option value="Cauca" data-value="cauca"></option>
              <option value="Cesar" data-value="cesar"></option>
              <option value="Córdoba" data-value="cordoba"></option>
              <option value="Cundinamarca" data-value="cundinamarca"></option>
              <option value="Chocó" data-value="choco"></option>
              <option value="Huila" data-value="huila"></option>
              <option value="La Guajira" data-value="laguajira"></option>
              <option value="Magdalena" data-value="magdalena"></option>
              <option value="Meta" data-value="meta"></option>
              <option value="Nariño" data-value="narino"></option>
              <option value="Norte de Santander" data-value="nortedesantander"></option>
              <option value="Quindio" data-value="quindio"></option>
              <option value="Risaralda" data-value="risaralda"></option>
              <option value="Santander" data-value="santander"></option>
              <option value="Sucre" data-value="sucre"></option>
              <option value="Tolima" data-value="tolima"></option>
              <option value="Valle del Cauca" data-value="valledelcauca"></option>
              <option value="Arauca" data-value="arauca"></option>
              <option value="Casanare" data-value="casanare"></option>
              <option value="Putumayo" data-value="putumayo"></option>
              <option value="San Andrés" data-value="sanandres"></option>
              <option value="Amazonas" data-value="amazonas"></option>
              <option value="Guainía" data-value="guainia"></option>
              <option value="Guaviare" data-value="guaviare"></option>
              <option value="Vaupes" data-value="vaupes"></option>
              <option value="Vichada" data-value="vichada"></option>
            </datalist>
            <span class="or-option-translations" style="display:none;">
            </span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
          <label class="question or-appearance-minimal-autocomplete ">
            <span lang="" class="question-label active">Municipio</span>
            <span class="required">*</span><input name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/municipio" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/municipio" data-required="true()" data-type-xml="select1" type="text" list="anbSobwmtUQ75RZS5cvrNhdatosgeneralesmunicipio" class="hide">
            <input type="text" class="ignore widget autocomplete" list="anbSobwmtUQ75RZS5cvrNhdatosgeneralesmunicipio"><datalist id="anbSobwmtUQ75RZS5cvrNhdatosgeneralesmunicipio">
              <option class="itemset-template" value="" data-items-path="instance('municipio')/root/item[departamento= /anbSobwmtUQ75RZS5cvrNh/datos_generales/departamento ]">...</option>
            </datalist>
            <span class="or-option-translations" style="display:none;"></span>
            <span class="itemset-labels" data-value-ref="name" data-label-type="itext" data-label-ref="itextId">
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-0">Abejorral</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1">Abrego</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-2">Abriaquí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-3">Acacias</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-4">Acandí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-5">Acevedo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-6">Achí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-7">Agrado</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-8">Agua De Dios</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-9">Aguachica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-10">Aguada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-11">Aguadas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-12">Aguazul</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-13">Agustín Codazzi</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-14">Aipe</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-15">Alban</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-16">Albán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-17">Albania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-18">Albania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-19">Albania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-20">Alcala</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-21">Aldana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-22">Alejandría</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-23">Algarrobo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-24">Algeciras</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-25">Almaguer</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-26">Almeida</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-27">Alpujarra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-28">Altamira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-29">Alto Baudó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-30">Altos Del Rosario</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-31">Alvarado</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-32">Amaga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-33">Amalfi</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-34">Ambalema</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-35">Anapoima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-36">Ancuya</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-37">Andalucía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-38">Andes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-39">Angelopolis</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-40">Angostura</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-41">Anolaima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-42">Anorí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-43">Anserma</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-44">Ansermanuevo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-45">Anza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-46">Anzoátegui</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-47">Apartadó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-48">Apía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-49">Apulo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-50">Aquitania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-51">Aracataca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-52">Aranzazu</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-53">Aratoca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-54">Arauca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-55">Arauquita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-56">Arbeláez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-57">Arboleda</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-58">Arboledas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-59">Arboletes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-60">Arcabuco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-61">Arenal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-62">Argelia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-63">Argelia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-64">Argelia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-65">Ariguaní</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-66">Arjona</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-67">Armenia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-68">Armenia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-69">Armero</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-70">Arroyohondo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-71">Astrea</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-72">Ataco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-73">Atrato</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-74">Ayapel</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-75">Bagadó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-76">Bahía Solano</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-77">Bajo Baudó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-78">Balboa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-79">Balboa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-80">Baranoa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-81">Baraya</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-82">Barbacoas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-83">Barbosa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-84">Barbosa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-85">Barichara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-86">Barranca De Upia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-87">Barrancabermeja</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-88">Barrancas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-89">Barranco De Loba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-90">Barrancominas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-91">Barranquilla</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-92">Becerril</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-93">Belalcázar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-94">Belen</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-95">Belén</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-96">Belén De Bajirá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-97">Belén De Los Andaquíes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-98">Belén De Umbría</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-99">Bello</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-100">Belmira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-101">Beltrán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-102">Berbeo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-103">Betania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-104">Betéitiva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-105">Betulia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-106">Betulia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-107">Bituima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-108">Boavita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-109">Bochalema</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-110">Bogotá D.C.</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-111">Bojacá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-112">Bojaya</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-113">Bolívar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-114">Bolívar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-115">Bolívar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-116">Bosconia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-117">Boyacá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-118">Briceño</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-119">Briceño</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-120">Bucaramanga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-121">Bucarasica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-122">Buenaventura</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-123">Buenavista</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-124">Buenavista</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-125">Buenavista</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-126">Buenavista</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-127">Buenos Aires</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-128">Buesaco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-129">Guadalajara de Buga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-130">Bugalagrande</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-131">Buriticá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-132">Busbanzá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-133">Cabrera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-134">Cabrera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-135">Cabuyaro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-136">Cacahual</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-137">Cáceres</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-138">Cachipay</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-139">Cachirá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-140">Cácota</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-141">Caicedo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-142">Caicedonia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-143">Caimito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-144">Cajamarca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-145">Cajibío</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-146">Cajicá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-147">Calamar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-148">Calamar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-149">Calarca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-150">Caldas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-151">Caldas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-152">Caldono</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-153">Cali</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-154">California</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-155">Calima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-156">Caloto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-157">Campamento</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-158">Campo De La Cruz</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-159">Campoalegre</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-160">Campohermoso</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-161">Canalete</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-162">Candelaria</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-163">Candelaria</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-164">Cantagallo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-165">El Canton Del San Pablo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-166">Cañasgordas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-167">Caparrapí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-168">Capitanejo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-169">Caqueza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-170">Caracolí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-171">Caramanta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-172">Carcasí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-173">Carepa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-174">Carmen De Apicalá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-175">Carmen De Carupa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-176">Carmén Del Darién</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-177">Carolina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-178">Cartagena</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-179">Cartagena Del Chairá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-180">Cartago</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-181">Caruru</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-182">Casabianca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-183">Castilla La Nueva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-184">Caucasia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-185">Cepitá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-186">Cereté</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-187">Cerinza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-188">Cerrito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-189">Cerro San Antonio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-190">Certegui</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-191">Chachagüi</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-192">Chaguaní</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-193">Chalán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-194">Chameza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-195">Chaparral</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-196">Charalá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-197">Charta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-198">Chía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-199">Chibolo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-200">Chigorodó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-201">Chima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-202">Chimá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-203">Chimichagua</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-204">Chinácota</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-205">Chinavita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-206">Chinchina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-207">Chinú</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-208">Chipaque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-209">Chipatá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-210">Chiquinquirá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-211">Chíquiza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-212">Chiriguana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-213">Chiscas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-214">Chita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-215">Chitagá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-216">Chitaraque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-217">Chivatá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-218">Chivor</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-219">Choachí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-220">Chocontá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-221">Cicuco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-222">Ciénaga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-223">Ciénaga De Oro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-224">Ciénega</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-225">Cimitarra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-226">Circasia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-227">Cisneros</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-228">Ciudad Bolívar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-229">Clemencia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-230">Cocorná</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-231">Coello</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-232">Cogua</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-233">Colombia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-234">Colon</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-235">Colón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-236">Coloso</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-237">Cómbita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-238">Concepción</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-239">Concepción</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-240">Concordia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-241">Concordia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-242">Condoto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-243">Confines</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-244">Consaca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-245">Contadero</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-246">Contratación</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-247">Convención</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-248">Copacabana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-249">Coper</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-250">Córdoba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-251">Córdoba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-252">Córdoba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-253">Corinto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-254">Coromoro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-255">Corozal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-256">Corrales</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-257">Cota</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-258">Cotorra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-259">Covarachía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-260">Coveñas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-261">Coyaima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-262">Cravo Norte</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-263">Cuaspud</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-264">Cubará</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-265">Cubarral</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-266">Cucaita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-267">Cucunubá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-268">Cúcuta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-269">Cucutilla</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-270">Cuítiva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-271">Cumaral</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-272">Cumaribo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-273">Cumbal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-274">Cumbitara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-275">Cunday</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-276">Curillo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-277">Curití</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-278">Curumaní</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-279">Dabeiba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-280">Dagua</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-281">Dibulla</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-282">Distracción</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-283">Dolores</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-284">Don Matias</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-285">Dosquebradas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-286">Duitama</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-287">Durania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-288">Ebéjico</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-289">El Águila</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-290">El Bagre</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-291">El Banco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-292">El Cairo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-293">El Calvario</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-294">El Carmen</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-295">El Carmen De Atrato</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-296">El Carmen De Bolívar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-297">El Carmen De Chucurí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-298">El Carmen De Viboral</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-299">El Castillo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-300">El Cerrito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-301">El Charco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-302">El Cocuy</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-303">El Colegio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-304">El Copey</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-305">El Doncello</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-306">El Dorado</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-307">El Dovio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-308">El Encanto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-309">El Espino</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-310">El Guacamayo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-311">El Guamo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-312">El Litoral Del San Juan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-313">El Molino</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-314">El Paso</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-315">El Paujil</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-316">El Peñol</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-317">El Peñon</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-318">El Peñón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-319">El Peñón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-320">El Piñon</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-321">El Playón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-322">El Reten</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-323">El Retorno</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-324">El Roble</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-325">El Rosal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-326">El Rosario</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-327">El Santuario</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-328">El Tablon De Gomez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-329">El Tambo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-330">El Tambo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-331">El Tarra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-332">El Zulia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-333">Elías</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-334">Encino</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-335">Enciso</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-336">Entrerrios</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-337">Envigado</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-338">Espinal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-339">Facatativá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-340">Falan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-341">Filadelfia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-342">Filandia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-343">Firavitoba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-344">Flandes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-345">Florencia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-346">Florencia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-347">Floresta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-348">Florián</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-349">Florida</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-350">Floridablanca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-351">Fomeque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-352">Fonseca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-353">Fortúl</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-354">Fosca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-355">Francisco Pizarro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-356">Fredonia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-357">Fresno</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-358">Frontino</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-359">Fuente De Oro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-360">Fundacion</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-361">Funes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-362">Funza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-363">Fúquene</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-364">Fusagasugá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-365">Gachala</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-366">Gachancipá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-367">Gachantivá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-368">Gacheta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-369">Galán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-370">Galapa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-371">Galeras</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-372">Gama</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-373">Gamarra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-374">Gambita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-375">Gameza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-376">Garagoa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-377">Garzón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-378">Genova</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-379">Gigante</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-380">Ginebra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-381">Giraldo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-382">Girardot</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-383">Girardota</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-384">Girón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-385">Gómez Plata</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-386">González</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-387">Gramalote</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-388">Granada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-389">Granada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-390">Granada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-391">Guaca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-392">Guacamayas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-393">Guacarí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-394">Guachené</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-395">Guachetá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-396">Guachucal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-397">Guadalupe</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-398">Guadalupe</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-399">Guadalupe</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-400">Guaduas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-401">Guaitarilla</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-402">Gualmatan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-403">Guamal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-404">Guamal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-405">Guamo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-406">Guapi</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-407">Guapotá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-408">Guaranda</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-409">Guarne</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-410">Guasca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-411">Guatape</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-412">Guataquí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-413">Guatavita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-414">Guateque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-415">Guática</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-416">Guavatá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-417">Guayabal De Siquima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-418">Guayabetal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-419">Guayatá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-420">Güepsa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-421">Güicán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-422">Gutiérrez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-423">Hacarí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-424">Hatillo De Loba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-425">Hato</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-426">Hato Corozal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-427">Hatonuevo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-428">Heliconia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-429">Herrán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-430">Herveo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-431">Hispania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-432">Hobo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-433">Honda</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-434">Ibague</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-435">Icononzo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-436">Iles</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-437">Imues</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-438">Inírida</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-439">Inzá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-440">Ipiales</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-441">Iquira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-442">Isnos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-443">Istmina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-444">Itagüí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-445">Ituango</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-446">Iza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-447">Jambalo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-448">Jamundí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-449">Jardín</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-450">Jenesano</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-451">Jericó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-452">Jericó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-453">Jerusalén</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-454">Jesús María</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-455">Jordán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-456">Juan De Acosta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-457">Junín</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-458">Juradó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-459">La Apartada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-460">La Argentina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-461">La Belleza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-462">La Calera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-463">La Capilla</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-464">La Ceja</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-465">La Celia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-466">La Chorrera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-467">La Cruz</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-468">La Cumbre</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-469">La Dorada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-470">La Esperanza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-471">La Estrella</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-472">La Florida</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-473">La Gloria</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-474">La Guadalupe</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-475">La Jagua De Ibirico</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-476">La Jagua Del Pilar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-477">La Llanada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-478">La Macarena</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-479">La Merced</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-480">La Mesa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-481">La Montañita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-482">La Palma</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-483">La Paz</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-484">La Paz</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-485">La Pedrera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-486">La Peña</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-487">La Pintada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-488">La Plata</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-489">La Playa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-490">La Primavera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-491">La Salina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-492">La Sierra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-493">La Tebaida</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-494">La Tola</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-495">La Unión</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-496">La Unión</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-497">La Unión</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-498">La Unión</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-499">La Uvita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-500">La Vega</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-501">La Vega</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-502">La Victoria</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-503">La Victoria</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-504">La Victoria</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-505">La Virginia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-506">Labateca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-507">Labranzagrande</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-508">Landázuri</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-509">Lebrija</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-510">Puerto Leguízamo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-511">Leiva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-512">Lejanías</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-513">Lenguazaque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-514">Lerida</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-515">Leticia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-516">Libano</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-517">Liborina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-518">Linares</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-519">Lloró</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-520">Lopez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-521">Lorica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-522">Los Andes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-523">Los Córdobas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-524">Los Palmitos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-525">Los Patios</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-526">Los Santos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-527">Lourdes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-528">Luruaco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-529">Macanal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-530">Macaravita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-531">Maceo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-532">Macheta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-533">Madrid</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-534">Magangué</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-535">Magüí Payán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-536">Mahates</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-537">Maicao</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-538">Majagual</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-539">Málaga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-540">Malambo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-541">Mallama</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-542">Manati</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-543">Manaure</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-544">Manaure</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-545">Maní</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-546">Manizales</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-547">Manta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-548">Manzanares</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-549">Mapiripan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-550">Mapiripana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-551">Margarita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-552">María La Baja</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-553">Marinilla</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-554">Maripí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-555">Mariquita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-556">Marmato</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-557">Marquetalia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-558">Marsella</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-559">Marulanda</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-560">Matanza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-561">Medellín</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-562">Medina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-563">Medio Atrato</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-564">Medio Baudó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-565">Medio San Juan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-566">Melgar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-567">Mercaderes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-568">Mesetas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-569">Milan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-570">Miraflores</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-571">Miraflores</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-572">Miranda</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-573">Mirití Paraná</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-574">Mistrató</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-575">Mitú</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-576">Mocoa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-577">Mogotes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-578">Molagavita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-579">Momil</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-580">Mompós</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-581">Mongua</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-582">Monguí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-583">Moniquirá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-584">Montebello</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-585">Montecristo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-586">Montelíbano</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-587">Montenegro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-588">Montería</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-589">Monterrey</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-590">Moñitos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-591">Morales</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-592">Morales</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-593">Morelia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-594">Morichal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-595">Morroa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-596">Mosquera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-597">Mosquera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-598">Motavita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-599">Murillo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-600">Murindó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-601">Mutata</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-602">Mutiscua</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-603">Muzo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-604">Nariño</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-605">Nariño</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-606">Nariño</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-607">Nátaga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-608">Natagaima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-609">Nechí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-610">Necoclí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-611">Neira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-612">Neiva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-613">Nemocon</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-614">Nilo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-615">Nimaima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-616">Nobsa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-617">Nocaima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-618">Norcasia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-619">Norosí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-620">Nóvita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-621">Nueva Granada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-622">Nuevo Colón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-623">Nunchía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-624">Nuquí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-625">Obando</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-626">Ocamonte</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-627">Ocaña</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-628">Oiba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-629">Oicatá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-630">Olaya</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-631">Olaya Herrera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-632">Onzaga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-633">Oporapa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-634">Orito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-635">Orocué</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-636">Ortega</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-637">Ospina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-638">Otanche</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-639">Ovejas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-640">Pachavita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-641">Pacho</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-642">Pacoa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-643">Pácora</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-644">Padilla</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-645">Páez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-646">Páez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-647">Paicol</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-648">Pailitas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-649">Paime</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-650">Paipa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-651">Pajarito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-652">Palermo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-653">Palestina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-654">Palestina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-655">Palmar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-656">Palmar De Varela</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-657">Palmas Del Socorro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-658">Palmira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-659">Palmito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-660">Palocabildo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-661">Pamplona</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-662">Pamplonita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-663">Pana Pana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-664">Pandi</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-665">Panqueba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-666">Papunahua</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-667">Páramo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-668">Paratebueno</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-669">Pasca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-670">Pasto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-671">Patia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-672">Pauna</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-673">Paya</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-674">Paz De Ariporo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-675">Paz De Río</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-676">Pedraza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-677">Pelaya</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-678">Pensilvania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-679">Peñol</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-680">Peque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-681">Pereira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-682">Pesca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-683">Piamonte</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-684">Piedecuesta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-685">Piedras</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-686">Piendamo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-687">Pijao</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-688">Pijiño Del Carmen</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-689">Pinchote</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-690">Pinillos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-691">Piojó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-692">Pisba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-693">Pital</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-694">Pitalito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-695">Pivijay</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-696">Planadas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-697">Planeta Rica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-698">Plato</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-699">Policarpa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-700">Polonuevo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-701">Ponedera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-702">Popayán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-703">Pore</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-704">Potosí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-705">Pradera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-706">Prado</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-707">Providencia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-708">Providencia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-709">Pueblo Bello</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-710">Pueblo Nuevo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-711">Pueblo Rico</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-712">Pueblo Viejo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-713">Pueblorrico</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-714">Puente Nacional</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-715">Puerres</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-716">Puerto Alegría</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-717">Puerto Arica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-718">Puerto Asis</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-719">Puerto Berrio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-720">Puerto Boyaca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-721">Puerto Caicedo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-722">Puerto Carreño</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-723">Puerto Colombia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-724">Puerto Colombia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-725">Puerto Concordia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-726">Puerto Escondido</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-727">Puerto Gaitán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-728">Puerto Guzman</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-729">Puerto Libertador</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-730">Puerto Lleras</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-731">Puerto Lopez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-732">Puerto Nare</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-733">Puerto Nariño</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-734">Puerto Parra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-735">Puerto Rico</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-736">Puerto Rico</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-737">Puerto Rondón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-738">Puerto Salgar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-739">Puerto Santander</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-740">Puerto Santander</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-741">Puerto Tejada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-742">Puerto Triunfo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-743">Puerto Wilches</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-744">Puli</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-745">Pupiales</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-746">Purace</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-747">Purificación</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-748">Purísima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-749">Quebradanegra</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-750">Quetame</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-751">Quibdó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-752">Quimbaya</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-753">Quinchia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-754">Quípama</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-755">Quipile</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-756">Ragonvalia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-757">Ramiriquí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-758">Ráquira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-759">Recetor</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-760">Regidor</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-761">Remedios</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-762">Remolino</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-763">Repelon</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-764">Restrepo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-765">Restrepo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-766">Retiro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-767">Ricaurte</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-768">Ricaurte</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-769">Río Blanco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-770">Río De Oro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-771">Río Iró</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-772">Río Quito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-773">Río Viejo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-774">Riofrio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-775">Riohacha</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-776">Rionegro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-777">Rionegro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-778">Riosucio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-779">Riosucio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-780">Risaralda</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-781">Rivera</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-782">Roberto Payan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-783">Roldanillo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-784">Roncesvalles</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-785">Rondón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-786">Rosas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-787">Rovira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-788">Sabana De Torres</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-789">Sabanagrande</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-790">Sabanalarga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-791">Sabanalarga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-792">Sabanalarga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-793">Sabanas De San Angel</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-794">Sabaneta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-795">Saboyá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-796">Sácama</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-797">Sáchica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-798">Sahagún</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-799">Saladoblanco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-800">Salamina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-801">Salamina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-802">Salazar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-803">Saldaña</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-804">Salento</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-805">Salgar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-806">Samacá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-807">Samaná</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-808">Samaniego</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-809">Sampués</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-810">San Agustín</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-811">San Alberto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-812">San Andrés</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-813">San Andrés</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-814">San Andrés de Cuerquia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-815">San Andrés de Tumaco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-816">San Andrés Sotavento</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-817">San Antero</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-818">San Antonio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-819">San Antonio DeL Tequendama</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-820">San Benito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-821">San Benito Abad</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-822">San Bernardo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-823">San Bernardo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-824">San Bernardo Del Viento</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-825">San Calixto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-826">San Carlos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-827">San Carlos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-828">San Carlos De Guaroa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-829">San Cayetano</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-830">San Cayetano</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-831">San Cristobal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-832">San Diego</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-833">San Eduardo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-834">San Estanislao</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-835">San Felipe</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-836">San Fernando</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-837">San Francisco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-838">San Francisco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-839">San Francisco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-840">San Gil</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-841">San Jacinto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-842">San Jacinto Del Cauca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-843">San Jerónimo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-844">San Joaquín</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-845">San José</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-846">San José De La Montaña</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-847">San José De Miranda</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-848">San José De Pare</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-849">San José de Uré</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-850">San Jose Del Fragua</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-851">San José Del Guaviare</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-852">San José Del Palmar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-853">San Juan De Arama</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-854">San Juan De Betulia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-855">San Juan De Río Seco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-856">San Juan De Uraba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-857">San Juan Del Cesar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-858">San Juan Nepomuceno</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-859">San Juanito</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-860">San Lorenzo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-861">San Luis</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-862">San Luis</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-863">San Luis De Gaceno</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-864">San Luis De Palenque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-865">San Luis De Sincé</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-866">San Marcos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-867">San Martín</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-868">San Martín</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-869">San Martin De Loba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-870">San Mateo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-871">San Miguel</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-872">San Miguel</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-873">San Miguel De Sema</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-874">San Onofre</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-875">San Pablo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-876">San Pablo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-877">San Pablo dE Borbur</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-878">San Pedro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-879">San Pedro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-880">San Pedro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-881">San Pedro De Cartago</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-882">San Pedro De Uraba</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-883">San Pelayo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-884">San Rafael</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-885">San Roque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-886">Santa Rosa De Viterbo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-887">San Sebastian</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-888">San Sebastian De Buenavista</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-889">San Vicente</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-890">San Vicente De Chucurí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-891">San Vicente Del Caguán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-892">San Zenon</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-893">Sandoná</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-894">Santa Ana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-895">Santa Bárbara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-896">Santa Bárbara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-897">Santa Bárbara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-898">Santa Barbara De Pinto</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-899">Santa Catalina</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-900">Santacruz</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-901">Santa Helena Del Opón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-902">Santa Isabel</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-903">Santa Lucia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-904">Santa María</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-905">Santa María</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-906">Santa Marta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-907">Santa Rosa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-908">Santa Rosa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-909">Santa Rosa De Cabal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-910">Santa Rosa De Osos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-911">Santa Rosa Del Sur</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-912">Santa Rosalía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-913">Santa Sofía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-914">Santafé De Antioquia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-915">Santana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-916">Santander De Quilichao</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-917">Santiago</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-918">Santiago</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-919">Santiago De Tolú</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-920">Santo Domingo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-921">Santo Tomas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-922">Santuario</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-923">Sapuyes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-924">Saravena</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-925">Sardinata</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-926">Sasaima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-927">Sativanorte</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-928">Sativasur</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-929">Segovia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-930">Sesquilé</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-931">Sevilla</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-932">Siachoque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-933">Sibaté</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-934">Sibundoy</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-935">Silos</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-936">Silvania</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-937">Silvia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-938">Simacota</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-939">Simijaca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-940">Simití</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-941">Sincelejo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-942">Sipí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-943">Sitionuevo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-944">Soacha</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-945">Soatá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-946">Socha</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-947">Socorro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-948">Socotá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-949">Sogamoso</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-950">Solano</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-951">Soledad</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-952">Solita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-953">Somondoco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-954">Sonson</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-955">Sopetran</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-956">Soplaviento</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-957">Sopó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-958">Sora</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-959">Soracá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-960">Sotaquirá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-961">Sotara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-962">Suaita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-963">Suan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-964">Suarez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-965">Suárez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-966">Suaza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-967">Subachoque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-968">Sucre</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-969">Sucre</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-970">Sucre</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-971">Suesca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-972">Supatá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-973">Supía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-974">Surata</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-975">Susa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-976">Susacón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-977">Sutamarchán</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-978">Sutatausa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-979">Sutatenza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-980">Tabio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-981">Tadó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-982">Talaigua Nuevo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-983">Tamalameque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-984">Támara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-985">Tame</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-986">Támesis</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-987">Taminango</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-988">Tangua</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-989">Taraira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-990">Tarapacá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-991">Tarazá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-992">Tarqui</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-993">Tarso</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-994">Tasco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-995">Tauramena</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-996">Tausa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-997">Tello</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-998">Tena</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-999">Tenerife</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1000">Tenjo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1001">Tenza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1002">Teorama</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1003">Teruel</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1004">Tesalia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1005">Tibacuy</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1006">Tibaná</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1007">Tibasosa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1008">Tibirita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1009">Tibú</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1010">Tierralta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1011">Timaná</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1012">Timbio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1013">Timbiqui</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1014">Tinjacá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1015">Tipacoque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1016">Tiquisio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1017">Titiribí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1018">Toca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1019">Tocaima</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1020">Tocancipá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1021">Togüí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1022">Toledo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1023">Toledo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1024">Tolú Viejo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1025">Tona</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1026">Tópaga</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1027">Topaipi</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1028">Toribio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1029">Toro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1030">Tota</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1031">Totoro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1032">Trinidad</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1033">Trujillo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1034">Tubara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1035">Tuchín</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1036">Tuluá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1037">Tunja</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1038">Tununguá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1039">Tuquerres</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1040">Turbaco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1041">Turbana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1042">Turbo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1043">Turmequé</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1044">Tuta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1045">Tutazá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1046">Ubalá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1047">Ubaque</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1048">Ulloa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1049">Umbita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1050">Une</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1051">Unguía</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1052">Union Panamericana</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1053">Uramita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1054">Uribe</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1055">Uribia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1056">Urrao</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1057">Urumita</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1058">Usiacuri</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1059">Útica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1060">Valdivia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1061">Valencia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1062">Valle De Guaméz</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1063">Valle de San José</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1064">Valle De San Juan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1065">Valledupar</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1066">Valparaiso</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1067">Valparaiso</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1068">Vegachí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1069">Vélez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1070">Venadillo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1071">Venecia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1072">Venecia</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1073">Ventaquemada</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1074">Vergara</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1075">Versalles</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1076">Vetas</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1077">Vianí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1078">Victoria</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1079">Vigía Del Fuerte</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1080">Vijes</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1081">Villa Caro</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1082">Villa De Leyva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1083">Villa De San Diego De Ubaté</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1084">Villa Del Rosario</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1085">Villa Rica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1086">Villagarzón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1087">Villagomez</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1088">Villahermosa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1089">Villamaria</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1090">Villanueva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1091">Villanueva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1092">Villanueva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1093">Villanueva</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1094">Villapinzón</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1095">Villarrica</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1096">Villavicencio</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1097">Villavieja</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1098">Villeta</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1099">Viotá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1100">Viracachá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1101">Vista Hermosa</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1102">Viterbo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1103">Yacopí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1104">Yacuanquer</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1105">Yaguará</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1106">Yalí</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1107">Yarumal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1108">Yavaraté</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1109">Yolombó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1110">Yondó</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1111">Yopal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1112">Yotoco</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1113">Yumbo</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1114">Zambrano</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1115">Zapatoca</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1116">Zapayan</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1117">Zaragoza</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1118">Zarzal</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1119">Zetaquira</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1120">Zipacon</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1121">Zipaquirá</span>
              <span lang="default" class="option-label active" data-itext-id="static_instance-municipio-1122">Zona Bananera</span>
            </span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span></label>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">¿Cuál es su nacionalidad?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad" value="colombia" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Colombiano/a</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad" value="venezuela" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Venezolano/a</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad" value="doble_nacionalidad" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Doble (Colombiano(a)/Venezolano(a))</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad" value="otra" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Otra</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset><label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">¿Qué otra nacionalidad?</span>
            <span class="required">*</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/otra_nacionalidad" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad  = 'otra'" data-type-xml="string" maxlength="2000" disabled="">
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span></label>
          <fieldset class="question simple-select or-branch disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">¿Cuál es su condición migratoria en el país?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria" value="pendular" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad  = 'venezuela' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad  = 'doble_nacionalidad'" data-type-xml="select1">
                  <span lang="" class="option-label active">Pendular (desplazamientos diarios entre países)</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria" value="transito" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad  = 'venezuela' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad  = 'doble_nacionalidad'" data-type-xml="select1">
                  <span lang="" class="option-label active">En tránsito, de paso por Colombia hacia otro país</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria" value="permanencia" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad  = 'venezuela' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/nacionalidad  = 'doble_nacionalidad'" data-type-xml="select1">
                  <span lang="" class="option-label active">Con intención de permanecer en Colombia</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">¿Vive en una zona urbana o rural?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural" value="urbana" data-required="true()" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))" data-type-xml="select1">
                  <span lang="" class="option-label active">Urbana (ciudad o capital)</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural" value="rural" data-required="true()" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))" data-type-xml="select1">
                  <span lang="" class="option-label active">Rural (Cabecera municipal)</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural" data-name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural" value="rural_disperso" data-required="true()" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))" data-type-xml="select1">
                  <span lang="" class="option-label active">Rural dispersa (Veredas o áreas dispersas)</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset><label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">Nombre del barrio o asentamiento</span>
            <span class="required">*</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/barrio" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'urbana'" data-type-xml="string" maxlength="2000" disabled="">
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
          <label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">Nombre del corregimiento, vereda, consejo comunitario afrodescendiente, resguardo indígena</span>
            <span class="required">*</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/corregimiento_vereda" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="string" maxlength="2000" disabled="">
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
          <label class="question non-select clearfix">
            <span lang="" class="question-label active">Ingrese la localización por GPS</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/datos_generales/localizacion" data-type-xml="geopoint" style="display: none;">
            <div class="geopicker widget">
              <div class="search-bar">
                <button type="button" class="hide-map-btn btn btn-default">
                  <span class="icon icon-arrow-left"> </span>
                </button>
                <button name="geodetect" type="button" class="btn btn-default" title="detect current location" data-placement="top">
                  <span class="icon icon-crosshairs"> </span>
                </button>
                <div class="input-group">
                  <input class="geo ignore" name="search" type="text" placeholder="buscar lugar o dirección" data-i18n="geopicker.searchPlaceholder">
                  <button type="button" class="btn btn-default search-btn"><i class="icon icon-search"> </i>
                  </button>
                </div>
              </div>
              <div class="map-canvas-wrapper">
                <div class="map-canvas leaflet-container leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag" id="map96982" tabindex="0" style="position: relative;">
                  <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);">
                    <div class="leaflet-pane leaflet-tile-pane">
                      <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                        <div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/1/0/0.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-69px, -119px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://b.tile.openstreetmap.org/1/1/0.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(187px, -119px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://b.tile.openstreetmap.org/1/0/1.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-69px, 137px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://c.tile.openstreetmap.org/1/1/1.png" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(187px, 137px, 0px); opacity: 1;"></div>
                      </div>
                    </div>
                    <div class="leaflet-pane leaflet-shadow-pane"></div>
                    <div class="leaflet-pane leaflet-overlay-pane"></div>
                    <div class="leaflet-pane leaflet-marker-pane"></div>
                    <div class="leaflet-pane leaflet-tooltip-pane"></div>
                    <div class="leaflet-pane leaflet-popup-pane"></div>
                    <div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(256px, 256px, 0px) scale(1);"></div>
                  </div>
                  <div class="leaflet-control-container">
                    <div class="leaflet-top leaflet-left">
                      <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">−</a></div>
                    </div>
                    <div class="leaflet-top leaflet-right"></div>
                    <div class="leaflet-bottom leaflet-left"></div>
                    <div class="leaflet-bottom leaflet-right">
                      <div class="leaflet-control-attribution leaflet-control">© <a href="http://openstreetmap.org">OpenStreetMap</a> | <a href="www.openstreetmap.org/copyright">Terms</a></div>
                    </div>
                  </div>
                </div>
                <button type="button" class="toggle-input-visibility-btn" aria-label="toggle input">
                </button>
              </div>
              <div class="geo-inputs">
                <label class="geo lat">
                  <span data-i18n="geopicker.latitude">latitud (x.y °)</span>
                  <input class="ignore" name="lat" type="number" step="0.000001" min="-90" max="90">
                </label>
                <label class="geo long">
                  <span data-i18n="geopicker.longitude">longitud (x.y °)</span>
                  <input class="ignore" name="long" type="number" step="0.000001" min="-180" max="180">
                </label>
                <label class="geo alt">
                  <span data-i18n="geopicker.altitude">altitud (m)</span>
                  <input class="ignore" name="alt" type="number" step="0.1">
                </label>
                <label class="geo acc">
                  <span data-i18n="geopicker.accuracy">precisión (m)</span>
                  <input class="ignore" name="acc" type="number" step="0.1">
                </label>
                <button type="button" class="btn-icon-only btn-remove" aria-label="remove">
                  <span class="icon icon-trash"> </span>
                </button>
              </div>
            </div>
          </label>
        </section><!--end of group -->

        <label class="question non-select readonly">
          <span lang="" class="question-label active">Tenga en cuenta: la persona que responde la encuesta brinda información de su hogar (no a nivel individual) y a lo largo de la encuesta se va a preguntar sobre los efectos del Fenómeno * en los últimos tres meses*</span>
          <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/indicaciones" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>

        <section class="or-group or-branch" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))">
          <h4>
            <span lang="" class="question-label active">Composición del hogar</span>
          </h4>
          <label class="question non-select ">
            <span lang="" class="question-label active">1. ¿Cuántas personas vivien en su hogar?</span>
            <input type="number" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/n_total_hogar" data-type-xml="int"></label>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">2. ¿En el hogar hay niños/as menores de 5 años?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/nna_5anos_hogar" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/nna_5anos_hogar" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/nna_5anos_hogar" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/nna_5anos_hogar" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">3. ¿En el hogar hay mujeres gestantes o lactantes?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/mujeres_gestantes_lactantes" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/mujeres_gestantes_lactantes" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/mujeres_gestantes_lactantes" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/mujeres_gestantes_lactantes" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">4. ¿En el hogar hay adultos mayores de 60 años?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/adultos_mayores" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/adultos_mayores" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/adultos_mayores" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/adultos_mayores" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">5. ¿ En el hogar hay personas con alguna condición de discapacidad?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pob_condicion_discapacidad" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pob_condicion_discapacidad" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pob_condicion_discapacidad" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pob_condicion_discapacidad" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">6. ¿Algún miembro del hogar pertenece a uno de estos grupos étnicos?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" value="indigena" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Pueblos indigenas</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" value="afrodescendiente" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Pueblos afrodescendiente</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" value="raizal" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Poblaciones raizales</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" value="palenqueros" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Palenqueros</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" value="rom" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Rom (Gitanos)</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" data-name="/anbSobwmtUQ75RZS5cvrNh/composicion_hogar/pertenencia_etnica" value="ninguno" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Ninguno / Prefiero no responder</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
        </section><!--end of group -->

        <section class="or-group or-branch or-appearance-field-list" name="/anbSobwmtUQ75RZS5cvrNh/contexto" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))">
          <h4>
            <span lang="" class="question-label active">General</span>
          </h4>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">1. ¿Conoce que es el Fenómeno El Niño?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino" data-name="/anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino" data-name="/anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">2. ¿En dónde obtiene información sobre este tipo de fenómenos?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fuentes_infomacion" value="medios_comunicacion" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Medios de comunicación</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fuentes_infomacion" value="redes_sociales" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Redes Sociales</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fuentes_infomacion" value="entidades_territoriales" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Entidades territoriales</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fuentes_infomacion" value="familiares" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Familiares</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fuentes_infomacion" value="asociaciones_Comunitarias" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Asociaciones /Grupos Comunitarios</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fuentes_infomacion" value="otro" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/contexto/fenomeno_nino  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Otros</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset><label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">Otro, Cuál:</span>
            <span class="required">*</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/contexto/fuente_informacion_otro" data-required="true()" data-relevant="selected( /anbSobwmtUQ75RZS5cvrNh/contexto/fuentes_infomacion ,'otro')" data-type-xml="string" maxlength="2000" disabled="">
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </label>
          <label class="question non-select readonly">
            <span lang="" class="question-label active">El Fenómeno del Niño es un fenómeno que se caracteriza por los cambios en el clima.</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/contexto/explicacion_fen" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">3. En los últimos tres meses ¿ha experimentado alguno de estos problemas por motivo del cambio en el clima?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas" value="acceso_agua" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Problemas en el acceso a agua.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas" value="racionamiento_energia" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Racionamiento de energía.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas" value="aumento_precio_alimentos" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Aumento en el precio de los alimentos.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas" value="aumento_temperatura" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Aumento de temperaturas.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas" value="lluvias_extremas" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Lluvias extremas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas" value="ninguno" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Ninguno de estos problemas.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas" value="otro" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Otro problema</span></label>
              </div>
            </fieldset>
            <span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset><label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">¿Qué otro problema?</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas_otro" data-relevant="selected( /anbSobwmtUQ75RZS5cvrNh/contexto/principales_problemas ,'otro')" data-type-xml="string" maxlength="2000" disabled=""></label>
        </section><!--end of group -->
        <section class="or-group or-branch or-appearance-field-list" name="/anbSobwmtUQ75RZS5cvrNh/agua" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))">
          <h4>
            <span lang="" class="question-label active">Acceso Agua</span>
          </h4>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">4. ¿Cuál es la fuente principal de agua que utiliza para el consumo del hogar?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" value="acueducto_servicio_publico" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Acueducto (Servicio público)</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" value="acueducto_comunitario" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Acueducto Comunitario</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" value="rio" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Río o quebrada</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" value="nacimiento" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Nacimiento</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" value="pozo" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Pozo subterráneo, artesanal, puntillo, moya</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" value="agua_de_lluvia" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Agua de lluvia</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" value="jaguey" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Jagüey</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo" value="otro" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Otro</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset><label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">¿Qué otra fuente de agua?</span>
            <span class="required">*</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo_otro" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_consumo  = 'otro'" data-type-xml="string" maxlength="2000" disabled="">
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span></label>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">4.1 ¿Usted le hace algún tratamiento al agua?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/tratamiento_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/tratamiento_agua" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/tratamiento_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/tratamiento_agua" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">4.2 ¿El acceso al agua es pago?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/pago_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/pago_agua" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/pago_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/pago_agua" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch or-appearance-horizontal or-appearance-columns or-columns-initialized disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">4.3 ¿Ha visto algún incremento en los costos del agua en los últimos tres (3) meses?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/aumento_costo_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/aumento_costo_agua" value="si" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/agua/pago_agua  = 'si'" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/aumento_costo_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/aumento_costo_agua" value="no" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/agua/pago_agua  = 'si'" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/aumento_costo_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/aumento_costo_agua" value="no_sabe" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/agua/pago_agua  = 'si'" data-type-xml="select1">
                  <span lang="" class="option-label active">No sabe, no responde</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">4.4 ¿Se enfrenta con alguna de estas barreras para acceder al agua?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/barreras_acceso_agua" value="transporte" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Dificultades en el transporte</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/barreras_acceso_agua" value="inseguridad" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Inseguridad</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/barreras_acceso_agua" value="costos" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Costos</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/barreras_acceso_agua" value="desabastecimiento" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Desabastecimiento</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/barreras_acceso_agua" value="ninguno" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Ninguna</span></label>
              </div>
            </fieldset>
            <span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">5. ¿Durante los últimos tres meses usted ha tenido que cambiar la fuente principal de recolección de agua para consumo?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambio_fuente_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambio_fuente_agua" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambio_fuente_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambio_fuente_agua" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">6. Durante los últimos tres meses su acceso al agua se ha:</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_acceso_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_acceso_agua" value="reducido" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Reducido</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_acceso_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_acceso_agua" value="igual" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sigue igual</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_acceso_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_acceso_agua" value="intermitencia" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Ha tenido intermitencia</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_acceso_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_acceso_agua" value="suspension" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No hay acceso a agua</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">7. Durante los últimos 3 meses usted ha tenido que:</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/impacto_reduccion_agua" value="produccion" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Disminuir el agua para la producción.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/impacto_reduccion_agua" value="higiene_personal" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Disminuir el agua para la higiene personal.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/impacto_reduccion_agua" value="aseo_hogar" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Disminuir el agua para el aseo del hogar.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/impacto_reduccion_agua" value="agua_consumo" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Reducir el agua para consumo.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/impacto_reduccion_agua" value="agua_preparacion_alimentos" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Reducir el agua para la preparación de alimentos</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/impacto_reduccion_agua" value="otro" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Otro</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/agua/impacto_reduccion_agua" value="ninguno" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Ninguna</span></label>
              </div>
            </fieldset>
            <span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset><label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">¿Qué otra medida ha tomado?</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/agua/otro_impacto_reduccion_agua" data-relevant="selected( /anbSobwmtUQ75RZS5cvrNh/agua/impacto_reduccion_agua ,'otro')" data-type-xml="string" maxlength="2000" disabled=""></label>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">8. Durante los últimos tres meses la calidad del agua que utiliza para consumo ha:</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_calidad_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_calidad_agua" value="empeorado" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Empeorado</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_calidad_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_calidad_agua" value="igual" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Se maniente igual.</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_calidad_agua" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/cambios_calidad_agua" value="mejorado" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Mejorado</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">9. ¿Cuál es la fuente principal de agua que usa para cultivos y actividades pecuarias?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="acueducto_servicio_publico" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">Acueducto (Servicio público)</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="acueducto_comunitario" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">Acueducto Comunitario</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="rio" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">Río o quebrada</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="nacimiento" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">Nacimiento</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="pozo" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">Pozo subterráneo, artesanal, puntillo, moya</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="agua_de_lluvia" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">Agua de lluvia</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="jaguey" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">Jagüey</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="otro" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">Otro</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos" value="no_aplica" data-required="true()" data-constraint="(not(selected(.,'no_aplica') and count-selected(.)>1))" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso'" data-type-xml="select1">
                  <span lang="" class="option-label active">No aplica (no tiene cultivos o cría de animales)</span></label>
              </div>
            </fieldset>
            <span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch or-appearance-horizontal or-appearance-columns or-columns-initialized disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">10. La disponibilidad de agua para sus cultivos ha cambiado durante los últimos tres meses:</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/disponibilidad_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/disponibilidad_agua_cultivos" value="empeorado" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso' and (not (selected( /anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos , 'no_aplica')))" data-type-xml="select1">
                  <span lang="" class="option-label active">Empeorado</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/disponibilidad_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/disponibilidad_agua_cultivos" value="igual" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso' and (not (selected( /anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos , 'no_aplica')))" data-type-xml="select1">
                  <span lang="" class="option-label active">Se maniente igual.</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/disponibilidad_agua_cultivos" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/disponibilidad_agua_cultivos" value="mejorado" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso' and (not (selected( /anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos , 'no_aplica')))" data-type-xml="select1">
                  <span lang="" class="option-label active">Mejorado</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch or-appearance-horizontal or-appearance-columns or-columns-initialized disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">11. En el caso de tener animales ¿El agua que tiene le alcanza para los bebederos?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/suficiencia_agua_animales" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/suficiencia_agua_animales" value="si" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso' and (not (selected( /anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos , 'no_aplica')))" data-type-xml="select1">
                  <span lang="" class="option-label active">Si</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/suficiencia_agua_animales" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/suficiencia_agua_animales" value="no" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso' and (not (selected( /anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos , 'no_aplica')))" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/agua/suficiencia_agua_animales" data-name="/anbSobwmtUQ75RZS5cvrNh/agua/suficiencia_agua_animales" value="no_aplica" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural' or  /anbSobwmtUQ75RZS5cvrNh/datos_generales/urbana_rural  = 'rural_disperso' and (not (selected( /anbSobwmtUQ75RZS5cvrNh/agua/origen_agua_cultivos , 'no_aplica')))" data-type-xml="select1">
                  <span lang="" class="option-label active">No aplica (no tiene cultivos o cría de animales)</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
        </section><!--end of group -->
        <section class="or-group or-branch or-appearance-field-list" name="/anbSobwmtUQ75RZS5cvrNh/energia" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))">
          <h4>
            <span lang="" class="question-label active">Acceso Energia</span>
          </h4>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">12. ¿Cuál es la principal fuente de energía eléctrica para su hogar?</span>
                <span class="required">*</span>
                <span lang="" class="or-hint active">Energía para iluminación y uso de electrodomésticos.</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" value="energia_publica" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Energía pública</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" value="paneles_solares" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Páneles solares</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" value="planta_electrica" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Planta eléctrica</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" value="otro" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Otro</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia" value="no_tiene" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No tengo energía</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset><label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">Otro, Cual:</span>
            <span class="required">*</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia_otro" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia  = 'otro'" data-type-xml="string" maxlength="2000" disabled="">
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span></label>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">13. Actualmente ¿Qué tipo de energía utiliza para cocinar los alimentos en su hogar?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" value="electrica" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Eléctrica</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" value="gas" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Gas</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" value="gasolina" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Gasolina</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" value="leña" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Leña</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" value="carbon" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Carbón</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/energia_consumo_alimentos" value="otro" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Otro</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">14. Durante los últimos tres meses ¿ha visto un incremento en los costos de la energía?</span>
                <span class="required">*</span>
                <span lang="" class="or-hint active">Ya se para iluminación, uso de electrodomésticos y/o cocción de alimentos.</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/aumento_costo_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/aumento_costo_energia" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/aumento_costo_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/aumento_costo_energia" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">15. Durante los últimos tres meses ¿Ha tenido que reducir el uso de electrodomésticos o luz en su hogar?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/impacto_reduccion_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/impacto_reduccion_energia" value="si" data-required="true()" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia , 'no_tiene'))" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/energia/impacto_reduccion_energia" data-name="/anbSobwmtUQ75RZS5cvrNh/energia/impacto_reduccion_energia" value="no" data-required="true()" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/energia/acceso_energia , 'no_tiene'))" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
        </section><!--end of group -->
        <section class="or-group or-branch or-appearance-field-list" name="/anbSobwmtUQ75RZS5cvrNh/samv" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))">
          <h4>
            <span lang="" class="question-label active">Seguridad Alimentaria y medios de vida</span>
          </h4>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">16. ¿Cuál de estas actividades es su principal fuente de ingresos?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="agricultura" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Agricultura (cultivo o cosecha del campo)</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="pecuario" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Pecuario (crianza animales para consumo)</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="comercio" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Comercio</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="artesania" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Artesanías</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="mineria" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Minería</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="transporte" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Transporte</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="servicio" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Servicios</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="construcion" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Construcción</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos" value="otro" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Otro</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset><label class="question or-branch non-select disabled">
            <span lang="" class="question-label active">Otro, Cual:</span>
            <span class="required">*</span>
            <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos_otro" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/fuentes_ingresos  = 'otro'" data-type-xml="string" maxlength="2000" disabled="">
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span></label>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">17. ¿Durante los últimos tres meses sus ingresos se han visto afectados por los cambios en el clima?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/afectacion_fen_fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/afectacion_fen_fuentes_ingresos" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/afectacion_fen_fuentes_ingresos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/afectacion_fen_fuentes_ingresos" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">18. ¿Los cambios climaticos en los últimos meses han tenido impacto en el transporte?</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/afectacion_transporte" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/afectacion_transporte" value="si" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/afectacion_transporte" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/afectacion_transporte" value="no" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">19. En su hogar ¿Cuáles de estos grupos de alimentos consumen diariamente en su dieta?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="verdura" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Verduras</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="frutas" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Frutas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="lacteos" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Lácteos y derivados</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="proteina" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Proteína animal (carne, pollo, pescado, cerdo, chivo)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="huevos" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Huevos</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="leguminosas" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Leguminosas (fríjol, lenteja, garbanzo, arveja)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="aceite" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Aceite</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="harinas" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Harinas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="cereales" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Cereales (arroz, sorgo, maíz)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="tuberculos" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Tuberculos y raices</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_dieta" value="azucar" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Azúcar o panela</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">20. ¿Durante los últimos tres meses ha identificado escasez de algunos alimentos?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos" data-name="/anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">¿Qué tipo de alimentos considera que se han visto escazos durante los últimos tres meses?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="verdura" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Verduras</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="frutas" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Frutas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="lacteos" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Lácteos y derivados</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="proteina" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Proteína animal (carne, pollo, pescado, cerdo, chivo)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="huevos" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Huevos</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="leguminosas" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Leguminosas (fríjol, lenteja, garbanzo, arveja)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="aceite" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Aceite</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="harinas" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Harinas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="cereales" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Cereales (arroz, sorgo, maíz)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="tuberculos" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Tuberculos y raices</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/alimentos_escasez" value="azucar" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/samv/escasez_alimentos  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Azúcar o panela</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">23. Por cuenta de los costos o escasez de alimentos, en los últimos tres meses usted ha tenido que:</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/lcsi" value="venta_activos_domesticos" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Vender objetos domésticos (radio, muebles, televisor, electrodomésticos)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/lcsi" value="gastar_ahorros" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Gastar ahorros</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/lcsi" value="venta_animales" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Venta de animales fuera de lo planeado o lo normal</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/lcsi" value="credito_alimentos" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Comprar alimentos a crédito</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/lcsi" value="dinero_prestado" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Pedir dinero prestado</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/lcsi" value="venta_activos_productivos" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Vender activos como herramientas de trabajo o agrícolas, o vender medios de transporte.</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/lcsi" value="disminucion_gasto_productivo" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Disminuir los gastos para los insumos de agricultura o ganado</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/samv/lcsi" value="ninguno" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Ninguna</span></label>
              </div>
            </fieldset>
            <span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
        </section><!--end of group -->
        <section class="or-group or-branch or-appearance-field-list" name="/anbSobwmtUQ75RZS5cvrNh/salud" data-relevant="not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'transito')) and not (selected( /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria , 'pendular'))">
          <h4>
            <span lang="" class="question-label active">Acceso a Salud</span>
          </h4>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">24. ¿Cuánto tiempo le toma desplazarse al centro de salud mas cercano?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/salud_acceso_distancia" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/salud_acceso_distancia" value="menos_1_hora" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Menos de una hora</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/salud_acceso_distancia" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/salud_acceso_distancia" value="1_2horas" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">De 1 a 2 horas</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/salud_acceso_distancia" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/salud_acceso_distancia" value="3_5horas" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">De 3 a 5 horas</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/salud_acceso_distancia" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/salud_acceso_distancia" value="mas_1_horas" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Más de 5 horas</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">25. ¿Cree que los cambios en el clima, acceso a agua y alimentos durante los últimos tres meses ha afectado la salud de su hogar?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_salud" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_salud" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_salud" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_salud" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">26. ¿Ha percibido un aumento de mosquitos en los últimos tres meses?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/aumento_mosquitos" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/aumento_mosquitos" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/aumento_mosquitos" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/aumento_mosquitos" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch or-appearance-horizontal or-appearance-columns or-columns-initialized disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">27.En los últimos tres meses ¿en su hogar ha identificado o sospechado de casos de zika, chikunguña, dengue o malaria?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/enfermedades_vectores" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/enfermedades_vectores" value="si" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/salud/aumento_mosquitos  = 'si'" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/enfermedades_vectores" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/enfermedades_vectores" value="no" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/salud/aumento_mosquitos  = 'si'" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">28. ¿Ha percibido un aumento de serpientes o alacranes en los últimos tres meses?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/aumento_serpientes_alacranes" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/aumento_serpientes_alacranes" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/aumento_serpientes_alacranes" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/aumento_serpientes_alacranes" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span>
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-appearance-horizontal or-appearance-columns or-columns-initialized">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">29. ¿Alguna de estas enfermedades las asocia a los cambios en el clima?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/salud/enfermedades" value="enfermedades_respiratorias" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Enfermedad respiratoria</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/salud/enfermedades" value="enfermedades_estomacales" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Enfermedad estomacal</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/salud/enfermedades" value="hipertensión" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Hipertensión</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/salud/enfermedades" value="ninguno" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select">
                  <span lang="" class="option-label active">Ninguna</span>
                </label>
                <label class="filler">
                </label>
                <label class="filler"></label>
              </div>
            </fieldset>
            <span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">30. En los últimos tres meses algún miembro del hogar ha presentado:</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_calor" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_calor" value="golpes_de_calor" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select1">
                  <span lang="" class="option-label active">Golpes de calor</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_calor" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_calor" value="deshidratación" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select1">
                  <span lang="" class="option-label active">Deshidratación</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_calor" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_calor" value="golpes_calor_deshidratacion" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select1">
                  <span lang="" class="option-label active">Ambos</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_calor" data-name="/anbSobwmtUQ75RZS5cvrNh/salud/afectacion_calor" value="ninguno" data-required="true()" data-constraint="(not(selected(.,'ninguno') and count-selected(.)>1))" data-type-xml="select1">
                  <span lang="" class="option-label active">Ninguno</span></label>
              </div>
            </fieldset>
            <span class="or-constraint-msg active" lang="" data-i18n="constraint.invalid">Este valor no está permitido.</span>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
        </section><!--end of group -->
        <section class="or-group or-branch disabled" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/datos_generales/condicion_migratoria  = 'transito'">
          <h4>
            <span lang="" class="question-label active">Afectaciones del FEN para población migrante</span>
          </h4>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">1. En los últimos 3 meses ¿en su ruta migratoria ha experimentado alguna de estas situaciones?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/afectacion_migrante" value="calor_extremo" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Calor extremo</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/afectacion_migrante" value="lluvias_extremas" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Lluvias extremas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/afectacion_migrante" value="deslizamiento" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Deslizamientos o cierres de vías</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/afectacion_migrante" value="innundaciones" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Innundaciones.</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">2. En su hogar o grupo de viaje ¿Cuáles de estos grupos de alimentos consumen diariamente en su dieta?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="verdura" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Verduras</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="frutas" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Frutas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="lacteos" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Lácteos y derivados</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="proteina" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Proteína animal (carne, pollo, pescado, cerdo, chivo)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="huevos" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Huevos</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="leguminosas" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Leguminosas (fríjol, lenteja, garbanzo, arveja)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="aceite" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Aceite</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="harinas" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Harinas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="cereales" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Cereales (arroz, sorgo, maíz)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="tuberculos" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Tuberculos y raices</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/dieta_migrante" value="azucar" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Azúcar o panela</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">3. ¿Durante los últimos 3 meses ha identificado escasez de alimentos?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante" data-name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante" data-name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select or-branch disabled" disabled="">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">3.1 ¿Qué tipo de alimentos considera que se han visto escazos durante los últimos tres meses?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="verdura" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Verduras</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="frutas" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Frutas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="lacteos" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Lácteos y derivados</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="proteina" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Proteína animal (carne, pollo, pescado, cerdo, chivo)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="huevos" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Huevos</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="leguminosas" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Leguminosas (fríjol, lenteja, garbanzo, arveja)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="aceite" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Aceite</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="harinas" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Harinas</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="cereales" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Cereales (arroz, sorgo, maíz)</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="tuberculos" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Tuberculos y raices</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/alimentos_escasez_001" value="azucar" data-required="true()" data-relevant=" /anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/escasez_alimentos_migrante  = 'si'" data-type-xml="select">
                  <span lang="" class="option-label active">Azúcar o panela</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">4. Durante los últimos 3 meses ¿Ha tenido dificultades para acceder a agua para su consumo o higiene personal?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/acceso_agua_migrante" data-name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/acceso_agua_migrante" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/acceso_agua_migrante" data-name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/acceso_agua_migrante" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">5. Durante los últimos 3 meses ¿Ha experimentado alguna de estas situaciones de salud?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/salud_migrante" value="golpes_calor" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Golpes de Calor</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/salud_migrante" value="deshidratacion" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Deshidratación</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/salud_migrante" value="picaduras_mosquito" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Aumento de picaduras de mosquitos</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/salud_migrante" value="picaduras_alacranes" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Picaduras de alacranes</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/salud_migrante" value="picaduras_serpiente" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Picaduras de serpientes</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/salud_migrante" value="malestar_estomacal" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Diarreas o malestares estomacales</span>
                </label>
                <label class="">
                  <input type="checkbox" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/salud_migrante" value="ninguna" data-required="true()" data-type-xml="select">
                  <span lang="" class="option-label active">Ninguna de las anteriores</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
          <fieldset class="question simple-select ">
            <fieldset>
              <legend>
                <span lang="" class="question-label active">6. Durante los últimos 3 meses ¿los cambios en el clima han afectado su ruta migratoria?</span>
                <span class="required">*</span>
              </legend>
              <div class="option-wrapper"><label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/cambios_ruta_migrante" data-name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/cambios_ruta_migrante" value="si" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">Sí</span>
                </label>
                <label class="">
                  <input type="radio" name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/cambios_ruta_migrante" data-name="/anbSobwmtUQ75RZS5cvrNh/poblacion_migrante/cambios_ruta_migrante" value="no" data-required="true()" data-type-xml="select1">
                  <span lang="" class="option-label active">No</span></label>
              </div>
            </fieldset>
            <span class="or-required-msg active" lang="" data-i18n="constraint.required">Este campo es obligatorio</span>
          </fieldset>
        </section><!--end of group -->

        <label class="question non-select readonly">
          <span lang="" class="question-label active">Muchas gracias por su participación en la encuesta de monitoreo de impactos del Fenómeno del Niño</span>
          <input type="text" name="/anbSobwmtUQ75RZS5cvrNh/cierre" data-type-xml="string" readonly="readonly" class="empty" maxlength="2000"></label>

        <fieldset id="or-preload-items" style="display:none;"><label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/start" data-preload="timestamp" data-preload-params="start" data-type-xml="dateTime" value="2024-06-27T14:25:43.334">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/end" data-preload="timestamp" data-preload-params="end" data-type-xml="dateTime" value="2024-06-27T14:25:43.356">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/today" data-preload="date" data-preload-params="today" data-type-xml="date" value="2024-06-26">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/username" data-preload="property" data-preload-params="username" data-type-xml="string" value="username not found" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/deviceid" data-preload="property" data-preload-params="deviceid" data-type-xml="string" value="ee.acf-e.org:YMn1YH2cwOG1WspJ" maxlength="2000"></label>
        </fieldset>
        <fieldset id="or-calculated-items" style="display:none;"><label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/__version__" data-calculate="'vEbXYuEqxYCQk36qoTS2a5'" data-type-xml="string" value="vEbXYuEqxYCQk36qoTS2a5" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/_version_" data-calculate="'vu6RQs44hoEjn5dTmAFC45'" data-type-xml="string" value="vu6RQs44hoEjn5dTmAFC45" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/meta/instanceID" data-type-xml="string" value="uuid:9ba9e433-6da9-4563-b8a7-7312074d07a1" maxlength="2000">
          </label>
          <label class="calculation non-select ">
            <input type="hidden" name="/anbSobwmtUQ75RZS5cvrNh/formhub/uuid" data-calculate="'d170f6625d3f4f66b59194a565a71178'" data-type-xml="string" value="d170f6625d3f4f66b59194a565a71178" maxlength="2000"></label>
        </fieldset>
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