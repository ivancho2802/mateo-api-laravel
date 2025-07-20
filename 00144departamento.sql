SELECT ROTULO, COUNT(1) AS VALOR1,0 AS VALOR2, 0 AS VALOR3, 0 AS VALOR4, 0 AS VALOR5\nFROM(\nSELECT COALESCE(M_LPA.DEPARTAMENTO,'SIN VALOR') AS ROTULO,\n       M_LPA.TIPO_IDENTIF,\n       M_LPA_TIPO_IDENTIF.XDESCRIPCION AS NOMBRE_TIPO_IDENTIF,\n       M_LPA.NUM_IDENTIF\nFROM M_LPA\nLEFT JOIN M_LPA_TIPO_IDENTIF ON (M_LPA_TIPO_IDENTIF.TIPO_IDENTIF_ID = M_LPA.TIPO_IDENTIF)\nWHERE M_LPA.FECHA_ACTIV BETWEEN '2020-01-01' AND '2024-04-08' AND\n           M_LPA.DEPARTAMENTO LIKE '%%'\nGROUP BY ROTULO,TIPO_IDENTIF,NOMBRE_TIPO_IDENTIF,NUM_IDENTIF\n)\nGROUP BY ROTULO ORDER BY VALOR1

SELECT 
    \"ROTULO\", 
    COUNT(1) AS \"VALOR1\",
    0 AS \"VALOR2\", 
    0 AS \"VALOR3\", 
    0 AS \"VALOR4\", 
    0 AS \"VALOR5\" 
FROM(
        SELECT 
            COALESCE(\"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\") AS \"ROTULO\",                 
            \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",                 
            \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",              
            \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"    
        FROM 
            \"M_LPAS\"    
        LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")     
        LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")       
        WHERE 
            \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND                        
            \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'     
        GROUP BY 
            \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\"  
)
GROUP BY 
    \"ROTULO\"  
ORDER BY 
    \"VALOR1\" ASC

SELECT      \"ROTULO\",      COUNT(1) AS \"VALOR1\",     0 AS \"VALOR2\",      0 AS \"VALOR3\",      0 AS \"VALOR4\",      0 AS \"VALOR5\"  FROM(         SELECT              COALESCE(\"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\") AS \"ROTULO\",                              \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",                              \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",                           \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"             FROM              \"M_LPAS\"             LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")              LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")                WHERE              \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND                                     \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'              GROUP BY              \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\"   ) GROUP BY      \"ROTULO\"   ORDER BY      \"VALOR1\" ASC
SELECT     \"ROTULO\",     COUNT(1) AS \"VALOR1\",     0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\" FROM(         SELECT             COALESCE(\"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\") AS \"ROTULO\",                             \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",                             \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",                          \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"            FROM             \"M_LPAS\"            LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")             LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")               WHERE             \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND                                    \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'             GROUP BY             \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\"  ) as x GROUP BY     \"ROTULO\"  ORDER BY     \"VALOR1\" ASC
SELECT     \"ROTULO\",     COUNT(1) AS \"VALOR1\",     0 AS \"VALOR2\",     0 AS \"VALOR3\",     0 AS \"VALOR4\",     0 AS \"VALOR5\" FROM(         SELECT             COALESCE(\"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\") AS \"ROTULO\",                             \"M_LPAS\".\"FK_LPA_PERSONA\" AS \"TIPO_IDENTIF\",                             \"M_LPA_PERSONAS\".\"TIPO_DOCUMENTO\" AS \"NOMBRE_TIPO_IDENTIF\",                          \"M_LPA_PERSONAS\".\"DOCUMENTO\" AS \"NUM_IDENTIF\"            FROM             \"M_LPAS\"            LEFT JOIN \"M_LPA_PERSONAS\" ON (\"M_LPA_PERSONAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_PERSONA\")             LEFT JOIN \"M_LPA_EMERGENCIAS\" ON (\"M_LPA_EMERGENCIAS\".\"ID\" = \"M_LPAS\".\"FK_LPA_EMERGENCIA\")               WHERE             \"M_LPAS\".\"FECHA_ATENCION\" BETWEEN '{FECHA_DESDE}' AND '{FECHA_HASTA}' AND                                    \"M_LPA_EMERGENCIAS\".\"DEPARTAMENTO\" LIKE '%{CONDICION1}%'             GROUP BY             \"ROTULO\",\"TIPO_IDENTIF\",\"NOMBRE_TIPO_IDENTIF\",\"NUM_IDENTIF\"  ) as x GROUP BY     \"ROTULO\"  ORDER BY     \"VALOR1\" ASC
 