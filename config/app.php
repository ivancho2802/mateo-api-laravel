<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'test'),
    //'env' => env('APP_ENV', 'production'),


    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    //'debug' => (bool) env('APP_DEBUG', true),
    'debug' => (bool) env('APP_DEBUG', true),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'America/Bogota',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'es',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    //token de https://eu.kobotoolbox.org sera eliminado
    'tokenkobo' =>  env('ACH_TOKENKOBO', '0a4363a291013a98e3e574a1713f9f9702c1d739'),
    'tokenkobonrc' =>  env('ACH_TOKENKOBONRC', '0a4363a291013a98e3e574a1713f9f9702c1d739'),
    'tokenkobowendy' =>  env('ACH_TOKENKOBONRC', '322f65e3677ee93aa36d34c9a89e70e66fa9bdd4'),
    'tokenactovityinfo' => env('TOKEN_ACTIVITYINFO', "4f477f867dfb56c4ff7065225d2a45b6"),

    //tres para metros {CONDICION1}, {FECHA_DESDE}" '01/01/2021' AND "{FECHA_HASTA}" '12/31/2024'
    'matrizSqlGraficos' => [
        //lpaetnia 00146
        '00146' => "SELECT \"ROTULO\", COUNT(1) AS \"VALOR1\",0 AS \"VALOR2\", 0 AS \"VALOR3\", 0 AS \"VALOR4\", 0 AS \"VALOR5\" FROM(     SELECT \"M_LPA_PERSONAS\".\"ETNIA\" AS \"ROTULO\",            \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",                 \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",              \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"      FROM \"M_LPAS\"     LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")     LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")       WHERE \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND                        \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'     GROUP BY \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\"  ) as X  GROUP BY \"ROTULO\"  ORDER BY \"VALOR1\" ASC       ",
        //LPA PAIS NACIONALIDAD 00145
        '00145' => "SELECT     \"ROTULO\",     COUNT(1) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\" FROM    (        SELECT             \"M_LPA_PERSONAS\".\"NACIONALIDAD\" AS \"ROTULO\",            \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",                 \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",            \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"          FROM \"M_LPAS\"        LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\") LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")         WHERE             \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND                      \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'        GROUP BY             \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\"    )  as X  GROUP BY     \"ROTULO\"",
        //LPA LPA - PERSONAS ATENDIDAS POR GRUPO ETARIO
        '00148' => "SELECT      \"ROTULO\",      COUNT(1) AS \"VALOR1\",     0 AS \"VALOR2\",      0 AS \"VALOR3\",      0 AS \"VALOR4\",      0 AS \"VALOR5\"  FROM(     SELECT          'ECHO-'||         CASE             WHEN date_part('year',Age(\"FECHA_NACIMIENTO\")) BETWEEN 0 AND 5 THEN 'O to 5'             WHEN date_part('year',Age(\"FECHA_NACIMIENTO\")) BETWEEN 6 AND 17 THEN '6 to 17'             WHEN date_part('year',Age(\"FECHA_NACIMIENTO\")) BETWEEN 18 AND 49 THEN '18 to 49'             WHEN date_part('year',Age(\"FECHA_NACIMIENTO\")) BETWEEN 18 AND 49 THEN '18 to 49'             WHEN date_part('year',Age(\"FECHA_NACIMIENTO\")) > 50 THEN '> 50'             ELSE 'OTRA'         END AS \"ROTULO\",         \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",              \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",           \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"      FROM          \"M_LPAS\"     LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")      LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        WHERE          \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND         \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'     GROUP BY          \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\" ) as x GROUP BY \"ROTULO\"        ",
        //LPA LPA - PERSONAS ATENDIDAS POR ORGANIZACIóN
        '00143' => "SELECT      \"ROTULO\",      COUNT(1) AS \"VALOR1\",     0 AS \"VALOR2\",      0 AS \"VALOR3\",      0 AS \"VALOR4\",      0 AS \"VALOR5\"  FROM(     SELECT          \"M_LPA_EMERGENCIAS\".\"SOCIO\" AS \"ROTULO\",         \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",              \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",           \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"      FROM \"M_LPAS\"     LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")      LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")      WHERE \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND                          \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'      GROUP BY          \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\" )as x  GROUP BY \"ROTULO\"        ",
        //LPA - PERSONAS ATENDIDAS POR MES
        '00142' => "SELECT      \"ROTULO\",      COUNT(1) AS \"VALOR1\",     0 AS \"VALOR2\",      0 AS \"VALOR3\",      0 AS \"VALOR4\",      0 AS \"VALOR5\"  FROM(     SELECT EXTRACT(YEAR FROM \"M_LPAS\".\"FECHA_ATENCION\")||'-'||         CASE             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '01' THEN 'ENERO'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '02' THEN 'FEBRERO'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '03' THEN 'MARZO'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '04' THEN 'ABRIL'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '05' THEN 'MAYO'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '06' THEN 'JUNIO'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '07' THEN 'JULIO'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '08' THEN 'AGOSTO'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '09' THEN 'SEPTIEMBRE'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '10' THEN 'OCTUBRE'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '11' THEN 'NOVIEMBRE'             WHEN EXTRACT (MONTH FROM \"M_LPAS\".\"FECHA_ATENCION\")= '12' THEN 'DICIEMBRE'         END AS \"ROTULO\",         \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",              \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",           \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"       FROM          \"M_LPAS\"     LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")      LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        WHERE          \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND         \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'     GROUP BY          \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\" ) as x GROUP BY \"ROTULO\"        ",
        //departamentos
        '00144' => "SELECT     \"ROTULO\",     COUNT(1) AS \"VALOR1\",     0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\" FROM(         SELECT             COALESCE(\"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\") AS \"ROTULO\",                             \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",                             \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",                          \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"            FROM             \"M_LPAS\"            LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")             LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")               WHERE             \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND                                    \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'             GROUP BY             \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\"  ) as x GROUP BY     \"ROTULO\"  ORDER BY     \"VALOR1\" ASC        ",
        //DISCAPACIDAD
        '00147' => " (    SELECT SUM(NUM_SORDOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\",'OIR' AS \"ROTULO\" FROM (        SELECT             (COUNT(\"DISCAPACIDAD_OIR\"))as NUM_SORDOS        FROM        	\"M_LPA_PERSONAS\"        JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")                 LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")               GROUP BY             \"DISCAPACIDAD_OIR\", \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\"        HAVING            \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND            \"DISCAPACIDAD_OIR\" = 'Si - Alguna dificultad' or             \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND            \"DISCAPACIDAD_OIR\" = 'Si - Mucha dificultad'    ) AS G ) UNION ( 	SELECT SUM(NUM_CIEGOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'VER' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_VER\"))as NUM_CIEGOS 		FROM        \"M_LPA_PERSONAS\"        JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")                 LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		 		GROUP BY  			\"DISCAPACIDAD_VER\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING            \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND 			\"DISCAPACIDAD_VER\" = 'Si - Alguna dificultad' or                         \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND            \"DISCAPACIDAD_VER\" = 'Si - Mucha dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND            \"DISCAPACIDAD_VER\" = 'Si - No puede hacerlo' 	) AS A ) UNION ( 	SELECT SUM(NUM_COJOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'CAMINAR' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_CAMINAR\"))as NUM_COJOS 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_CAMINAR\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND 			\"DISCAPACIDAD_CAMINAR\" = 'Si - No puede hacerlo' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND             \"DISCAPACIDAD_CAMINAR\" = 'Si - Alguna dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND             \"DISCAPACIDAD_CAMINAR\" = 'Si - Mucha dificultad' 	) AS B )  UNION ( 	SELECT SUM(NUM_COJOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'CAMINAR' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_CAMINAR\"))as NUM_COJOS 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_CAMINAR\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND 			\"DISCAPACIDAD_CAMINAR\" = 'Si - No puede hacerlo' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND             \"DISCAPACIDAD_CAMINAR\" = 'Si - Alguna dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND            \"DISCAPACIDAD_CAMINAR\" = 'Si - Mucha dificultad' 	) AS B )  UNION ( 	SELECT SUM(NUM_AMNESICOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'RECORDAR' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_RECORDAR\"))as NUM_AMNESICOS 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_RECORDAR\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND 			\"DISCAPACIDAD_RECORDAR\" = 'Si - Alguna dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND            \"DISCAPACIDAD_RECORDAR\" = 'Si - Mucha dificultad' 	) AS B ) UNION ( 	SELECT SUM(NUM_DESCUIDADOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'CUIDADO' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_CUIDADO_PROPIO\"))as NUM_DESCUIDADOS 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_CUIDADO_PROPIO\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND 			\"DISCAPACIDAD_CUIDADO_PROPIO\" = 'Si - Alguna dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND            \"DISCAPACIDAD_CUIDADO_PROPIO\" = 'Si - Mucha dificultad' 	) AS B ) UNION ( 	SELECT SUM(NUM_COMUNICAR) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'COMUNICAR' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_COMUNICAR\"))as NUM_COMUNICAR 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_COMUNICAR\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND 			\"DISCAPACIDAD_COMUNICAR\" = 'Si - Alguna dificultad' or                         \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%' AND            \"DISCAPACIDAD_COMUNICAR\" = 'Si - Mucha dificultad' 	) AS B )",
        //LPA - PERSONAS ATENDIDAS POR SEXO
        '00130' => "SELECT      \"ROTULO\",      COUNT(1) AS \"VALOR1\",     0 AS \"VALOR2\",      0 AS \"VALOR3\",      0 AS \"VALOR4\",      0 AS \"VALOR5\"  FROM(     SELECT          \"M_LPA_PERSONAS\".\"GENERO\" AS \"ROTULO\",         \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",              \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",           \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"      FROM          \"M_LPAS\"     LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")      LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        WHERE          \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND         \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'     GROUP BY          \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\" ) as x GROUP BY \"ROTULO\"        ",
    ],
    

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        Maatwebsite\Excel\ExcelServiceProvider::class,

        Jenssegers\Mongodb\MongodbServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Http' => Illuminate\Support\Facades\Http::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

        'Excel' => Maatwebsite\Excel\Facades\Excel::class,


    ],

];
