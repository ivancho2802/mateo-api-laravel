set PATH="C:\Program Files\Firebird\Firebird_2_5\bin:$PATH"
connect "/opt/lampp/firebird/db/ach.gdb" user 'SYSDBA' password 'masterkey';
CONNECT "C:\opt\lampp\firebird\db\ach.gdb" user 'SYSDBA' password 'masterkey';





la idea es filtarr para intentar optener por like datos delos formiularios

SELECT * FROM V_M_KOBO_RESPUESTAS WHERE ID_M_KOBO_FORMULARIOS ='{IDX}' AND 
    ID_P_FORMULARIOS IN ('001428','001427','001429','001472','001473','001475','001476','001577','001486','001484','001485') 
    ORDER BY POSICION_GRUPO,POSICION,XROTULO,XROTULO_PLANTILLA


SELECT * FROM V_M_KOBO_RESPUESTAS WHERE ROTULO like '%energia%' or VALOR like '%energia%' ;

ORDER BY POSICION_GRUPO,POSICION,XROTULO,XROTULO_PLANTILLA

SELECT      V_M_KOBO_RESPUESTAS.*, 
	CAST(SUBSTRING(VALOR FROM 1 FOR 32000) AS VARCHAR(32000)) AS VALOR_COMPLETE
FROM        V_M_KOBO_RESPUESTAS
 WHERE ROTULO like '%energia%' or VALOR like '%energia%' ;



SELECT      
    V_M_KOBO_RESPUESTAS.*,
    CAST(SUBSTRING(VALOR FROM 1 FOR 32000) AS VARCHAR(32000)) AS VALOR_COMPLETE
FROM        
    V_M_KOBO_RESPUESTAS
WHERE 
    ROTULO LIKE '%energia%' OR 
    VALOR LIKE '%energia%' OR
    ROTULO LIKE '%Energia%' OR 
    VALOR LIKE '%Energia%' OR
    ROTULO LIKE '%ENERGIA%' OR 
    VALOR LIKE '%ENERGIA%' ;