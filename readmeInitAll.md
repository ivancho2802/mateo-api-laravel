## CONFIGURACION
    
    # CONFIGURACION DE COMPILACION EN LKCAL
    
        para compilar con laravel tengo el php en local por lo que debo invocarlo por el
        path de manera temporal por temas de permisos para editar la variable de entorno
        par el tema de el php lo descarge de php.net la version 7 para usarlo con php 8 y
        sea compatible con el prugin mas reciente de firebird que soporte la version 2,5
        de firebird que es la version en la que esta la base de datos de produccion 

        configure el php.ini quitando el ; de extension=pdo_mysql
        y extension=pdo_firebird

    posiblemente vera el error php not fopund

    set PATH=%PATH%;C:\ACH\php\

    para que funcione laravel comando por terminal

    set PATH=%PATH%;%USERPROFILE%\AppData\Roaming\Composer\vendor\bin

## DOCUMENTACION DE PACKEUTES INSTALADSO

https://github.com/harrygulliford/laravel-firebird



## para la conexion al servidor de mire \\192.168.1.150\opt\lampp\htdocs

esta la ip publica 190.145.110.149


comando en llonux para activar foirebird temporalmemte


export PATH="/opt/firebird/bin:$PATH"
    set PATH=%PATH%;C:\ACH\php\


isql

si no tiene permisos el archivo de base ddartos dale con 

chmod 777 ruta del arcivo

linux

connect "/opt/lampp/firebird/db/ach.gdb" user 'SYSDBA' password 'masterkey';

windows

CONNECT "C:\opt\lampp\firebird\db\ach.gdb" user 'SYSDBA' password 'masterkey

MOSTRAR TABLAS

    

QUERY

    SELECT ROTULO, VALOR FROM V_M_KOBO_RESPUESTAS WHERE ROTULO='Tipo de emergencia' AND ID_M_KOBO_FORMULARIOS ='{IDX}' AND ID_P_FORMULARIOS IN ('001428','001427','001429','001472','001473','001475','001476','001577','001486','001484','001485') ORDER BY POSICION_GRUPO,POSICION,XROTULO,XROTULO_PLANTILLA;


    SELECT ROTULO, VALOR FROM V_M_KOBO_RESPUESTAS WHERE ROTULO='Tipo de emergencia' AND ID_M_KOBO_FORMULARIOS ='0013788' AND ID_P_FORMULARIOS IN ('001428','001427','001429','001472','001473','001475','001476','001577','001486','001484','001485') ORDER BY POSICION_GRUPO,POSICION,XROTULO,XROTULO_PLANTILLA;



## alravel comandos

php artisan make: 

   make:cast
      make:channel
      make:command
      make:component
      make:controller
      make:event
      make:exception
      make:factory
      make:job
      make:listener
      make:mail
      make:middleware
      make:migration
      make:model
      make:notification
      make:observer
      make:policy
      make:provider
      make:request
      make:resource
      make:rule
      make:seeder
      make:test