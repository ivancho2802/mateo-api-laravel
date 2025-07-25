SELECT ROTULO, COUNT(1) AS VALOR1,0 AS VALOR2, 0 AS VALOR3, 0 AS VALOR4, 0 AS VALOR5\nFROM(\nSELECT M_LPA_DISCAP.XDESCRIPCION AS ROTULO,\n       M_LPA.TIPO_IDENTIF,\n       M_LPA_TIPO_IDENTIF.XDESCRIPCION AS NOMBRE_TIPO_IDENTIF,\n       M_LPA.NUM_IDENTIF\nFROM M_LPA\nLEFT JOIN M_LPA_TIPO_IDENTIF ON (M_LPA_TIPO_IDENTIF.TIPO_IDENTIF_ID = M_LPA.TIPO_IDENTIF)\nLEFT JOIN M_LPA_DISCAP ON (M_LPA_DISCAP.DISCAP_ID = M_LPA.DISCAP_ID)\nWHERE M_LPA.FECHA_ACTIV BETWEEN '2020-01-01' AND '2024-04-08' AND\n           M_LPA.DEPARTAMENTO LIKE '%%'\nGROUP BY ROTULO,TIPO_IDENTIF,NOMBRE_TIPO_IDENTIF,NUM_IDENTIF\n)\nGROUP BY ROTULO

SELECT 
    "ROTULO", 
    COUNT(1) AS "VALOR1",
    0 AS "VALOR2", 
    0 AS "VALOR3", 
    0 AS "VALOR4", 
    0 AS "VALOR5" 
FROM( 
    SELECT 
        M_LPA_DISCAP.XDESCRIPCION AS ROTULO, 
           
        "M_LPAS"."FK_LPA_PERSONA" AS "TIPO_IDENTIF",                 
        "M_LPA_PERSONAS"."TIPO_DOCUMENTO" AS "NOMBRE_TIPO_IDENTIF",            
        "M_LPA_PERSONAS"."DOCUMENTO" AS "NUM_IDENTIF"       
    FROM
        "M_LPAS" 

    LEFT JOIN M_LPA_DISCAP ON (M_LPA_DISCAP.DISCAP_ID = M_LPA.DISCAP_ID) 
    LEFT JOIN "M_LPA_PERSONAS" ON ("M_LPA_PERSONAS"."ID" = "M_LPAS"."FK_LPA_PERSONA")         
    
    WHERE 
        M_LPA.FECHA_ACTIV BETWEEN '2020-01-01' AND '2024-04-08' AND 
        M_LPA.DEPARTAMENTO LIKE '%%' 
    GROUP BY 
        ROTULO,TIPO_IDENTIF,NOMBRE_TIPO_IDENTIF,NUM_IDENTIF 
)
GROUP BY ROTULO

--NEW
(
    SELECT SUM(NUM_SORDOS) AS "VALOR1",
    0 AS "VALOR2", 
    0 AS "VALOR3", 
    0 AS "VALOR4", 
    0 AS "VALOR5",'OIR' AS "ROTULO" FROM (
        SELECT 
            (COUNT("DISCAPACIDAD_OIR"))as NUM_SORDOS
        FROM
        	"M_LPA_PERSONAS"
        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")         
        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")       
        GROUP BY 
            "DISCAPACIDAD_OIR", "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO"
        HAVING
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
            "DISCAPACIDAD_OIR" = 'Si - Alguna dificultad' or 
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
            "DISCAPACIDAD_OIR" = 'Si - Mucha dificultad'
    ) AS G
)
UNION
(
	SELECT SUM(NUM_CIEGOS) AS "VALOR1",
    0 AS "VALOR2", 
    0 AS "VALOR3", 
    0 AS "VALOR4", 
    0 AS "VALOR5", 'VER' AS "ROTULO" FROM (
		SELECT 
			(COUNT("DISCAPACIDAD_VER"))as NUM_CIEGOS
		FROM
        "M_LPA_PERSONAS"
        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")         
        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")       
		
		GROUP BY 
			"DISCAPACIDAD_VER" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO"
		HAVING
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
			"DISCAPACIDAD_VER" = 'Si - Alguna dificultad' or 
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
            "DISCAPACIDAD_VER" = 'Si - Mucha dificultad' or 
            
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
            "DISCAPACIDAD_VER" = 'Si - No puede hacerlo'
	) AS A
)
UNION
(
	SELECT SUM(NUM_COJOS) AS "VALOR1",
    0 AS "VALOR2", 
    0 AS "VALOR3", 
    0 AS "VALOR4", 
    0 AS "VALOR5", 'CAMINAR' AS "ROTULO" FROM (
		SELECT 
			(COUNT("DISCAPACIDAD_CAMINAR"))as NUM_COJOS
		FROM
        	"M_LPA_PERSONAS" 
        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")
        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")       
		GROUP BY 
			"DISCAPACIDAD_CAMINAR" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO"
		HAVING
        
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
			"DISCAPACIDAD_CAMINAR" = 'Si - No puede hacerlo' or 
            
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 
            "DISCAPACIDAD_CAMINAR" = 'Si - Alguna dificultad' or 
            
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 
            "DISCAPACIDAD_CAMINAR" = 'Si - Mucha dificultad'
	) AS B
) 
UNION
(
	SELECT SUM(NUM_COJOS) AS "VALOR1",
    0 AS "VALOR2", 
    0 AS "VALOR3", 
    0 AS "VALOR4", 
    0 AS "VALOR5", 'CAMINAR' AS "ROTULO" FROM (
		SELECT 
			(COUNT("DISCAPACIDAD_CAMINAR"))as NUM_COJOS
		FROM
        	"M_LPA_PERSONAS" 
        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")
        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")       
		GROUP BY 
			"DISCAPACIDAD_CAMINAR" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO"
		HAVING
        
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
			"DISCAPACIDAD_CAMINAR" = 'Si - No puede hacerlo' or 
            
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 
            "DISCAPACIDAD_CAMINAR" = 'Si - Alguna dificultad' or 
            
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
            "DISCAPACIDAD_CAMINAR" = 'Si - Mucha dificultad'
	) AS B
) 
UNION
(
	SELECT SUM(NUM_AMNESICOS) AS "VALOR1",
    0 AS "VALOR2", 
    0 AS "VALOR3", 
    0 AS "VALOR4", 
    0 AS "VALOR5", 'RECORDAR' AS "ROTULO" FROM (
		SELECT 
			(COUNT("DISCAPACIDAD_RECORDAR"))as NUM_AMNESICOS
		FROM
        	"M_LPA_PERSONAS" 
        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")
        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")       
		GROUP BY 
			"DISCAPACIDAD_RECORDAR" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO"
		HAVING
        
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
			"DISCAPACIDAD_RECORDAR" = 'Si - Alguna dificultad' or 
            
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
            "DISCAPACIDAD_RECORDAR" = 'Si - Mucha dificultad'
	) AS B
)
UNION
(
	SELECT SUM(NUM_DESCUIDADOS) AS "VALOR1",
    0 AS "VALOR2", 
    0 AS "VALOR3", 
    0 AS "VALOR4", 
    0 AS "VALOR5", 'CUIDADO' AS "ROTULO" FROM (
		SELECT 
			(COUNT("DISCAPACIDAD_CUIDADO_PROPIO"))as NUM_DESCUIDADOS
		FROM
        	"M_LPA_PERSONAS" 
        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")
        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")       
		GROUP BY 
			"DISCAPACIDAD_CUIDADO_PROPIO" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO"
		HAVING
        
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
			"DISCAPACIDAD_CUIDADO_PROPIO" = 'Si - Alguna dificultad' or 
            
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
            "DISCAPACIDAD_CUIDADO_PROPIO" = 'Si - Mucha dificultad'
	) AS B
)
UNION
(
	SELECT SUM(NUM_COMUNICAR) AS "VALOR1",
    0 AS "VALOR2", 
    0 AS "VALOR3", 
    0 AS "VALOR4", 
    0 AS "VALOR5", 'COMUNICAR' AS "ROTULO" FROM (
		SELECT 
			(COUNT("DISCAPACIDAD_COMUNICAR"))as NUM_COMUNICAR
		FROM
        	"M_LPA_PERSONAS" 
        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")
        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")       
		GROUP BY 
			"DISCAPACIDAD_COMUNICAR" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO"
		HAVING
        
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
			"DISCAPACIDAD_COMUNICAR" = 'Si - Alguna dificultad' or 
            
            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND
            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND
            "DISCAPACIDAD_COMUNICAR" = 'Si - Mucha dificultad'
	) AS B
)

-- minify
 (    SELECT SUM(NUM_SORDOS) AS "VALOR1",    0 AS "VALOR2",     0 AS "VALOR3",     0 AS "VALOR4",     0 AS "VALOR5",'OIR' AS "ROTULO" FROM (        SELECT             (COUNT("DISCAPACIDAD_OIR"))as NUM_SORDOS        FROM        	"M_LPA_PERSONAS"        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")                 LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")               GROUP BY             "DISCAPACIDAD_OIR", "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO"        HAVING            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND            "DISCAPACIDAD_OIR" = 'Si - Alguna dificultad' or             "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND            "DISCAPACIDAD_OIR" = 'Si - Mucha dificultad'    ) AS G ) UNION ( 	SELECT SUM(NUM_CIEGOS) AS "VALOR1",    0 AS "VALOR2",     0 AS "VALOR3",     0 AS "VALOR4",     0 AS "VALOR5", 'VER' AS "ROTULO" FROM ( 		SELECT  			(COUNT("DISCAPACIDAD_VER"))as NUM_CIEGOS 		FROM        "M_LPA_PERSONAS"        JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")                 LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")        		 		GROUP BY  			"DISCAPACIDAD_VER" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO" 		HAVING            "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 			"DISCAPACIDAD_VER" = 'Si - Alguna dificultad' or                         "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND            "DISCAPACIDAD_VER" = 'Si - Mucha dificultad' or                                     "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND            "DISCAPACIDAD_VER" = 'Si - No puede hacerlo' 	) AS A ) UNION ( 	SELECT SUM(NUM_COJOS) AS "VALOR1",    0 AS "VALOR2",     0 AS "VALOR3",     0 AS "VALOR4",     0 AS "VALOR5", 'CAMINAR' AS "ROTULO" FROM ( 		SELECT  			(COUNT("DISCAPACIDAD_CAMINAR"))as NUM_COJOS 		FROM        	"M_LPA_PERSONAS"         JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")        		GROUP BY  			"DISCAPACIDAD_CAMINAR" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO" 		HAVING                    "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 			"DISCAPACIDAD_CAMINAR" = 'Si - No puede hacerlo' or                                     "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND             "DISCAPACIDAD_CAMINAR" = 'Si - Alguna dificultad' or                                     "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND             "DISCAPACIDAD_CAMINAR" = 'Si - Mucha dificultad' 	) AS B )  UNION ( 	SELECT SUM(NUM_COJOS) AS "VALOR1",    0 AS "VALOR2",     0 AS "VALOR3",     0 AS "VALOR4",     0 AS "VALOR5", 'CAMINAR' AS "ROTULO" FROM ( 		SELECT  			(COUNT("DISCAPACIDAD_CAMINAR"))as NUM_COJOS 		FROM        	"M_LPA_PERSONAS"         JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")        		GROUP BY  			"DISCAPACIDAD_CAMINAR" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO" 		HAVING                    "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 			"DISCAPACIDAD_CAMINAR" = 'Si - No puede hacerlo' or                                     "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND             "DISCAPACIDAD_CAMINAR" = 'Si - Alguna dificultad' or                                     "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND            "DISCAPACIDAD_CAMINAR" = 'Si - Mucha dificultad' 	) AS B )  UNION ( 	SELECT SUM(NUM_AMNESICOS) AS "VALOR1",    0 AS "VALOR2",     0 AS "VALOR3",     0 AS "VALOR4",     0 AS "VALOR5", 'RECORDAR' AS "ROTULO" FROM ( 		SELECT  			(COUNT("DISCAPACIDAD_RECORDAR"))as NUM_AMNESICOS 		FROM        	"M_LPA_PERSONAS"         JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")        		GROUP BY  			"DISCAPACIDAD_RECORDAR" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO" 		HAVING                    "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 			"DISCAPACIDAD_RECORDAR" = 'Si - Alguna dificultad' or                                     "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND            "DISCAPACIDAD_RECORDAR" = 'Si - Mucha dificultad' 	) AS B ) UNION ( 	SELECT SUM(NUM_DESCUIDADOS) AS "VALOR1",    0 AS "VALOR2",     0 AS "VALOR3",     0 AS "VALOR4",     0 AS "VALOR5", 'CUIDADO' AS "ROTULO" FROM ( 		SELECT  			(COUNT("DISCAPACIDAD_CUIDADO_PROPIO"))as NUM_DESCUIDADOS 		FROM        	"M_LPA_PERSONAS"         JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")        		GROUP BY  			"DISCAPACIDAD_CUIDADO_PROPIO" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO" 		HAVING                    "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 			"DISCAPACIDAD_CUIDADO_PROPIO" = 'Si - Alguna dificultad' or                                     "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND            "DISCAPACIDAD_CUIDADO_PROPIO" = 'Si - Mucha dificultad' 	) AS B ) UNION ( 	SELECT SUM(NUM_COMUNICAR) AS "VALOR1",    0 AS "VALOR2",     0 AS "VALOR3",     0 AS "VALOR4",     0 AS "VALOR5", 'COMUNICAR' AS "ROTULO" FROM ( 		SELECT  			(COUNT("DISCAPACIDAD_COMUNICAR"))as NUM_COMUNICAR 		FROM        	"M_LPA_PERSONAS"         JOIN "M_LPAS" ON ("M_LPAS"."FK_LPA_PERSONA" = "M_LPA_PERSONAS"."ID")        LEFT JOIN "M_LPA_EMERGENCIAS" ON ("M_LPA_EMERGENCIAS"."ID" = "M_LPAS"."FK_LPA_EMERGENCIA")        		GROUP BY  			"DISCAPACIDAD_COMUNICAR" , "M_LPAS"."FECHA_ATENCION", "M_LPA_EMERGENCIAS"."DEPARTAMENTO" 		HAVING                    "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND 			"DISCAPACIDAD_COMUNICAR" = 'Si - Alguna dificultad' or                         "M_LPAS"."FECHA_ATENCION" BETWEEN '2020-01-01' AND '2024-04-08' AND            "M_LPA_EMERGENCIAS"."DEPARTAMENTO" LIKE '%%' AND            "DISCAPACIDAD_COMUNICAR" = 'Si - Mucha dificultad' 	) AS B )
 (    SELECT SUM(NUM_SORDOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\",'OIR' AS \"ROTULO\" FROM (        SELECT             (COUNT(\"DISCAPACIDAD_OIR\"))as NUM_SORDOS        FROM        	\"M_LPA_PERSONAS\"        JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")                 LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")               GROUP BY             \"DISCAPACIDAD_OIR\", \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\"        HAVING            \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND            \"DISCAPACIDAD_OIR\" = 'Si - Alguna dificultad' or             \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND            \"DISCAPACIDAD_OIR\" = 'Si - Mucha dificultad'    ) AS G ) UNION ( 	SELECT SUM(NUM_CIEGOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'VER' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_VER\"))as NUM_CIEGOS 		FROM        \"M_LPA_PERSONAS\"        JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")                 LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		 		GROUP BY  			\"DISCAPACIDAD_VER\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING            \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND 			\"DISCAPACIDAD_VER\" = 'Si - Alguna dificultad' or                         \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND            \"DISCAPACIDAD_VER\" = 'Si - Mucha dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND            \"DISCAPACIDAD_VER\" = 'Si - No puede hacerlo' 	) AS A ) UNION ( 	SELECT SUM(NUM_COJOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'CAMINAR' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_CAMINAR\"))as NUM_COJOS 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_CAMINAR\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND 			\"DISCAPACIDAD_CAMINAR\" = 'Si - No puede hacerlo' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND             \"DISCAPACIDAD_CAMINAR\" = 'Si - Alguna dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND             \"DISCAPACIDAD_CAMINAR\" = 'Si - Mucha dificultad' 	) AS B )  UNION ( 	SELECT SUM(NUM_COJOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'CAMINAR' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_CAMINAR\"))as NUM_COJOS 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_CAMINAR\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND 			\"DISCAPACIDAD_CAMINAR\" = 'Si - No puede hacerlo' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND             \"DISCAPACIDAD_CAMINAR\" = 'Si - Alguna dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND            \"DISCAPACIDAD_CAMINAR\" = 'Si - Mucha dificultad' 	) AS B )  UNION ( 	SELECT SUM(NUM_AMNESICOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'RECORDAR' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_RECORDAR\"))as NUM_AMNESICOS 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_RECORDAR\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND 			\"DISCAPACIDAD_RECORDAR\" = 'Si - Alguna dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND            \"DISCAPACIDAD_RECORDAR\" = 'Si - Mucha dificultad' 	) AS B ) UNION ( 	SELECT SUM(NUM_DESCUIDADOS) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'CUIDADO' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_CUIDADO_PROPIO\"))as NUM_DESCUIDADOS 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_CUIDADO_PROPIO\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND 			\"DISCAPACIDAD_CUIDADO_PROPIO\" = 'Si - Alguna dificultad' or                                     \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND            \"DISCAPACIDAD_CUIDADO_PROPIO\" = 'Si - Mucha dificultad' 	) AS B ) UNION ( 	SELECT SUM(NUM_COMUNICAR) AS \"VALOR1\",    0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\", 'COMUNICAR' AS \"ROTULO\" FROM ( 		SELECT  			(COUNT(\"DISCAPACIDAD_COMUNICAR\"))as NUM_COMUNICAR 		FROM        	\"M_LPA_PERSONAS\"         JOIN \"M_LPAS\" ON (\"M_LPAS\".\"FK_LPA_PERSONA\" = \"M_LPA_PERSONAS\".\"ID\")        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")        		GROUP BY  			\"DISCAPACIDAD_COMUNICAR\" , \"M_LPAS\".\"FECHA_ATENCION\", \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" 		HAVING                    \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND 			\"DISCAPACIDAD_COMUNICAR\" = 'Si - Alguna dificultad' or                         \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '2020-01-01' AND '2024-04-08' AND            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%%' AND            \"DISCAPACIDAD_COMUNICAR\" = 'Si - Mucha dificultad' 	) AS B )
