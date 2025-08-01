<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Creer</title>


  @extends('layouts.user_type.guest')

  @section('content')

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <style>
    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    html {
      line-height: 1.15;
      -webkit-text-size-adjust: 100%
    }

    body {
      margin: 0
    }

    a {
      background-color: transparent
    }

    [hidden] {
      display: none
    }

    html {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
      line-height: 1.5
    }

    *,
    :after,
    :before {
      box-sizing: border-box;
      border: 0 solid #e2e8f0
    }

    a {
      color: inherit;
      text-decoration: inherit
    }

    svg,
    video {
      display: block;
      vertical-align: middle
    }

    video {
      max-width: 100%;
      height: auto
    }

    .bg-white {
      --bg-opacity: 1;
      background-color: #ccc;
      background-color: rgba(255, 255, 255, var(--bg-opacity))
    }

    .bg-gray-100 {
      --bg-opacity: 1;
      background-color: #f7fafc;
      background-color: rgba(247, 250, 252, var(--bg-opacity))
    }

    .border-gray-200 {
      --border-opacity: 1;
      border-color: #edf2f7;
      border-color: rgba(237, 242, 247, var(--border-opacity))
    }

    .border-t {
      border-top-width: 1px
    }

    .flex {
      display: flex
    }

    .grid {
      display: grid
    }

    .hidden {
      display: none
    }

    .items-center {
      align-items: center
    }

    .justify-center {
      justify-content: center
    }

    .font-semibold {
      font-weight: 600
    }

    .h-5 {
      height: 1.25rem
    }

    .h-8 {
      height: 2rem
    }

    .h-16 {
      height: 4rem
    }

    .text-sm {
      font-size: .875rem
    }

    .text-lg {
      font-size: 1.125rem
    }

    .leading-7 {
      line-height: 1.75rem
    }

    .mx-auto {
      margin-left: auto;
      margin-right: auto
    }

    .ml-1 {
      margin-left: .25rem
    }

    .mt-2 {
      margin-top: .5rem
    }

    .mr-2 {
      margin-right: .5rem
    }

    .ml-2 {
      margin-left: .5rem
    }

    .mt-4 {
      margin-top: 1rem
    }

    .ml-4 {
      margin-left: 1rem
    }

    .mt-8 {
      margin-top: 2rem
    }

    .ml-12 {
      margin-left: 3rem
    }

    .-mt-px {
      margin-top: -1px
    }

    .max-w-6xl {
      max-width: 72rem
    }

    .min-h-screen {
      min-height: 100vh
    }

    .overflow-hidden {
      overflow: hidden
    }

    .p-6 {
      padding: 1.5rem
    }

    .py-4 {
      padding-top: 1rem;
      padding-bottom: 1rem
    }

    .px-6 {
      padding-left: 1.5rem;
      padding-right: 1.5rem
    }

    .pt-8 {
      padding-top: 2rem
    }

    .fixed {
      position: fixed
    }

    .relative {
      position: relative
    }

    .top-0 {
      top: 0
    }

    .right-0 {
      right: 0
    }

    .shadow {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
    }

    .text-center {
      text-align: center
    }

    .text-gray-200 {
      --text-opacity: 1;
      color: #edf2f7;
      color: rgba(237, 242, 247, var(--text-opacity))
    }

    .text-gray-300 {
      --text-opacity: 1;
      color: #e2e8f0;
      color: rgba(226, 232, 240, var(--text-opacity))
    }

    .text-gray-400 {
      --text-opacity: 1;
      color: #cbd5e0;
      color: rgba(203, 213, 224, var(--text-opacity))
    }

    .text-gray-500 {
      --text-opacity: 1;
      color: #a0aec0;
      color: rgba(160, 174, 192, var(--text-opacity))
    }

    .text-gray-600 {
      --text-opacity: 1;
      color: #718096;
      color: rgba(113, 128, 150, var(--text-opacity))
    }

    .text-gray-700 {
      --text-opacity: 1;
      color: #4a5568;
      color: rgba(74, 85, 104, var(--text-opacity))
    }

    .text-gray-900 {
      --text-opacity: 1;
      color: #1a202c;
      color: rgba(26, 32, 44, var(--text-opacity))
    }

    .underline {
      text-decoration: underline
    }

    .antialiased {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale
    }

    .w-5 {
      width: 1.25rem
    }

    .w-8 {
      width: 2rem
    }

    .w-auto {
      width: auto
    }

    .grid-cols-1 {
      grid-template-columns: repeat(1, minmax(0, 1fr))
    }

    @media (min-width:640px) {
      .sm\:rounded-lg {
        border-radius: .5rem
      }

      .sm\:block {
        display: block
      }

      .sm\:items-center {
        align-items: center
      }

      .sm\:justify-start {
        justify-content: flex-start
      }

      .sm\:justify-between {
        justify-content: space-between
      }

      .sm\:h-20 {
        height: 5rem
      }

      .sm\:ml-0 {
        margin-left: 0
      }

      .sm\:px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem
      }

      .sm\:pt-0 {
        padding-top: 0
      }

      .sm\:text-left {
        text-align: left
      }

      .sm\:text-right {
        text-align: right
      }
    }

    @media (min-width:768px) {
      .md\:border-t-0 {
        border-top-width: 0
      }

      .md\:border-l {
        border-left-width: 1px
      }

      .md\:grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr))
      }
    }

    @media (min-width:1024px) {
      .lg\:px-8 {
        padding-left: 2rem;
        padding-right: 2rem
      }
    }

    @media (prefers-color-scheme:dark) {
      .dark\:bg-gray-800 {
        --bg-opacity: 1;
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--bg-opacity))
      }

      .dark\:bg-gray-900 {
        --bg-opacity: 1;
        background-color: #1a202c;
        background-color: rgba(256, 256, 256, var(--bg-opacity))
      }

      .dark\:border-gray-700 {
        --border-opacity: 1;
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--border-opacity))
      }

      .dark\:text-white {
        --text-opacity: 1;
        color: #ccc;
        color: rgba(2, 2, 2, var(--text-opacity))
      }

      .dark\:text-gray-400 {
        --text-opacity: 1;
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--text-opacity))
      }
    }
  </style>

  <style>
    body {
      font-family: 'Nunito';
    }

    .ach-icon {
      width: 6%;
    }

    .circle-creer {
      border-radius: 50%;
      border-width: 4px;
      border-color: #fff;
      text-align: center;
      vertical-align: middle;
      align-items: center;
      align-content: center;
      align-items: center;
      align-self: center;
    }

    .circle-creer-1 {
      width: 30px;
      height: 30px;
    }

    .circle-creer-2 {
      width: 40px;
      height: 40px;
    }

    .circle-creer-3 {
      width: 45px;
      height: 45px;
    }

    .circle-creer-4 {
      width: 50px;
      height: 50px;
    }

    .circle-creer-5 {
      width: 55px;
      height: 55px;
    }

    .circle-creer-6 {
      width: 60px;
      height: 60px;
    }

    .circle-creer-7 {
      width: 65px;
      height: 65px;
    }

    .circle-creer-8 {
      width: 70px;
      height: 70px;
    }

    .circle-creer-9 {
      width: 75px;
      height: 75px;
    }

    .circle-creer-10 {
      width: 80px;
      height: 80px;
    }
  </style>
</head>

<body class="antialiased">


  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

      <div class="flex justify-center  sm:justify-center sm:pt-0 bg-white ">
        @if(Auth::user())
      <p>Bienvenido(a) {{ Auth::user()->name }}</p>
    @endif
      </div>

      @if(session()->has('success'))
      <div class="flex justify-center  sm:justify-center sm:pt-0 bg-white ">
      <p class="m-0 text-white">{{ session('success')}}</p>
      </div>
    @endif

      <h4 class="text-gray-900 dark:text-white">
        <img src="{{ asset('images/constant_companion.png') }}" alt="Descripción de la imagen">
      </h4>


      <div class="mt-2 bg-white light:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

        @foreach ($preguntapuesta as $key => $pregunta)
        <div class="grid grid-cols-1 md:grid-cols-1">
          <div class="p-6">
          <div class="flex items-center">
            <div class="ml-4 text-lg leading-7 font-semibold">
            <h3 class=" text-danger  ">
              {{$key}}
            </h3>
            </div>
          </div>

          <div class="ml-2 pb-2">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            Concepto
            </div>
          </div>

          @foreach ($pregunta as $key2 => $pregunt)
          <div class="relative border-b border-gray-200" x-init="isOpen{{$loop->index}}=false" x-data="{
          isOpen{{$loop->index}}: false, 
          set(value) {
          this.isOpen{{$loop->index}} = value;
          }
          }">

          <h3 class=" flow-root">
          <!-- Expand/collapse section button -->
          <button class="btn btn-danger flex w-full text-start justify-between   text-sm text-light-400"
            type="button" @click="isOpen{{$loop->index}} = !isOpen{{$loop->index}}" type="button"
            aria-controls="filter-section-0" aria-expanded="false">
            <span class="font-medium text-light-900">{{$key2}}</span>
          </button>
          </h3>

          <div class="" id="filter-section-0" x-show="isOpen{{$loop->index}}">
          <div class="card card-body">

            <div class="row">
            <div class="col-2">
            {{$pregunt[0][4]}}
            </div>
            <div class="col-8">
            <!-- fondo gris -->
            <div class="row" style="
          background: #ccc;    
          border-radius: 50px;     
          vertical-align: middle;    
          align-items: center;
          height:30px;
          width: 630px;">
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            </div>
            <!-- lineas separadoras -->
            <div class="row" style="
          top: 0;
          position: absolute;
          width: 630px;
          ">
            <div class="col">
            </div>
            <div class="col">
              <div style="
          height: 60px;
          background: #DEDEDE;
          width: 2px;"></div>
            </div>
            <div class="col">
              <div style="
          height: 60px;
          background: #DEDEDE;
          width: 2px;"></div>
            </div>
            <div class="col">
              <div style="
          height: 60px;
          background: #DEDEDE;
          width: 2px;"></div>
            </div>
            <div class="col">
              <div style="
          height: 60px;
          background: #DEDEDE;
          width: 2px;"></div>
            </div>
            </div>

            <!-- vaciado -->

            <div class="row align-items-center" style="
          top: -10px;
          position: absolute;
          width: 630px;
          ">
          @foreach ($pregunt as $key3 => $preg)
            @if (round($preg[1]) >= 0)
            <div class="col text-center p-0" style="     height: 80px;   align-items: center;    align-content: center; align-self: center;    text-align: center;">
              @if (round($preg[1]) > 0)
                <div class="circle-creer bg-danger text-light circle-creer-{{round($preg[1]) > 10 ? 10 : round($preg[1])}} m-auto">
                  {{round($preg[3])}}
                </div>
              @endif
            </div>
            @endif
          @endforeach
          </div>

          <!-- textos de abajo -->
          <div class="row pt-4 text-sm" style="">
            @foreach ($pregunt as $key3 => $preg)
              <div class=" {{$key3 == 0 || $key3 == 4 ? 'col text-center' : 'col text-center'}}">
                {{$preg[0]}}
              </div>
            @endforeach
          </div>
        </div>
        <div class="col-2 text-right">
          {{$pregunt[0][5]}}
        </div>
      </div>


          </div>
          </div>


          </div>
        @endforeach

          <!-- LINEA RESUMEN -->
          <!-- <h3 class="text-danger">Resumen</h3>

          <div class="card card-body">
          <div class="row">
          <div class="col-2">
            Ambiental
          </div>
          <div class="col-8">
            <div class="row fondo gris" style="
          background: #ccc;    
          border-radius: 50px;     
          vertical-align: middle;    
          align-items: center;
          height:30px;
          width: 630px;">
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            <div class="col">
            </div>
            </div>
            <div class="row lineas separadoras" style="
          top: 0;
          position: absolute;
          width: 630px;
          ">
            <div class="col">
            </div>
            <div class="col">
            <div style="
          height: 60px;
          background: #DEDEDE;
          width: 2px;"></div>
            </div>
            <div class="col">
            <div style="
          height: 60px;
          background: #DEDEDE;
          width: 2px;"></div>
            </div>
            <div class="col">
            <div style="
          height: 60px;
          background: #DEDEDE;
          width: 2px;"></div>
            </div>
            <div class="col">
            <div style="
          height: 60px;
          background: #DEDEDE;
          width: 2px;"></div>
            </div>
            </div>

            <div class="row align-items-center vaciado" style="
          top: -10px;
          position: absolute;
          width: 630px;
          ">
            @foreach ($pregunt as $key4 => $preg)
          <div class="col text-center"
          style="     height: 80px;   align-items: center;    align-content: center; align-self: center;    text-align: center;">
          <div class="circle-creer bg-danger text-light circle-creer-5 m-auto">
          {{($loop->index == 0) ? 'A' : (($loop->index == 1) ? 'B' : (($loop->index == 2) ? 'C' : (($loop->index == 3) ? 'D' : (($loop->index == 4) ? 'E' : ''))))}}
          </div>
          </div>
          @endforeach
            </div>

            <div class="row pt-4 textos de abajo" style="">
            @foreach ($pregunt as $key3 => $preg)
          <div class="{{$key3 == 2 ? 'col-3' : 'col-2'}}">
          {{$preg[0]}}
          </div>
          @endforeach
            </div>
          </div>
          <div class="col-2 text-right">
            Social
          </div>
          </div>
          <div class="row TABLA RESUMEN" style="
          border-width: 1px;
          border-color: #ccc;
          ">
          <div class="col-10">
            RESPUESTA
          </div>
          <div class="col-2">
            POSICIÓN
          </div>
          </div>

          @foreach ($pregunt as $key5 => $preg)

          <div class="row" style="
          border-width: 1px;
          border-color: #ccc;
          ">
          <div class="col-10">
          {{$preg[2]}}
          </div>
          <div class="col-2">
          {{($loop->index == 0) ? 'A' : (($loop->index == 1) ? 'B' : (($loop->index == 2) ? 'C' : (($loop->index == 3) ? 'D' : (($loop->index == 4) ? 'E' : ''))))}}
          </div>
          </div>
        @endforeach

          </div> -->

          </div>

          <!-- <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show"
          class="position-fixed bg-success rounded top-3 text-sm py-2 px-4">
          <p class="m-0 text-white">{{ session('success')}}</p>
          </div> -->


        </div>
    @endforeach


        <!-- esto no  -->
        <div class="grid grid-cols-1 md:grid-cols-2">


          <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
            <div class="flex items-center">
              <i class="ach-icon">
                <svg xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                  <path
                    d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
                </svg>
              </i>

              <div class="ml-4 text-lg leading-7 font-semibold">
                <a href="/ " class="underline text-gray-900 dark:text-white">

                </a>
              </div>
            </div>

            <div class="ml-12">
              <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm w-full">
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-1">


            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
              <div class="flex items-center">
                <i class="ach-icon">
                  <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                      d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                  </svg>
                </i>

                <div class="ml-4 text-lg leading-7 font-semibold">
                  <a href="/ " class="underline text-gray-900 dark:text-white">
                  </a>
                </div>
              </div>

              <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm w-full">

                  <br>

                </div>
              </div>
            </div>


          </div>

          <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
            <div class="flex items-center">
              <i class="ach-icon">
                <svg xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                  <path
                    d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
                </svg>
              </i>

              <div class="ml-4 text-lg leading-7 font-semibold">
                <a href="/ / " class="underline text-gray-900 dark:text-white">

                </a>
              </div>
            </div>

            <div class="ml-12">
              <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum.

                <br>

              </div>
            </div>
          </div>

        </div>
      </div>


      <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
        Build v{{ Illuminate\Foundation\Application::VERSION }}
      </div>
    </div>
  </div>
  </div>
</body>

</html>