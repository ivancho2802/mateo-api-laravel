

select           CODIGO, ESTAT, cast(cast(DPTO as blob sub_type text character set ISO8859_1) as varchar(2000)) DEPARTAMENTO, cast(cast(MUNICIP as blob sub_type text character set ISO8859_1) as varchar(2000)) MUNICIP,           cast(cast(ESTADO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000))ESTADO_EMERGENCIA, cast(cast(TIPO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000))      TIPO_EMERGENCIA,      cast(cast(fecha_evento as blob sub_type text character set ISO8859_1) as varchar(2000)) fecha_evento, cast(cast(FECHA_ALERTA as blob sub_type text character set ISO8859_1) as varchar(2000))      FECHA_ALERTA, SOCIO_LIDER ,     OBSERVA_UGC, ENLACE_FSA from           (            select                           CODIGO, ESTAT, ESTADO_EMERGENCIA,TIPO_EMERGENCIA, fecha_evento,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO,SOCIO_LIDER,ENLACE_FSA,  M_KOBO_RESPUESTAS.XVALOR OBSERVA_UGC                  from                           (             select                               CODIGO, ESTAT, ESTADO_EMERGENCIA,TIPO_EMERGENCIA, fecha_evento,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO,SOCIO_LIDER,  M_KOBO_RESPUESTAS.XVALOR ENLACE_FSA                      from                               (                        select                                   CODIGO, ESTAT, ESTADO_EMERGENCIA,TIPO_EMERGENCIA, fecha_evento,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO,  M_KOBO_RESPUESTAS.XVALOR SOCIO_LIDER                          from                                   (                                        select                                               CODIGO, ESTAT, ESTADO_EMERGENCIA,TIPO_EMERGENCIA,M_KOBO_RESPUESTAS.XVALOR fecha_evento,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO                                       from                                               (                                                       SELECT                                                               CODIGO, ESTAT, M_KOBO_RESPUESTAS.XVALOR FECHA_ALERTA, ESTADO_EMERGENCIA,TIPO_EMERGENCIA, IDFORM, FECHA_RECEPCION,MUNICIP,DPTO                                                           FROM(                                                                           SELECT                                                                                   CODIGO, ESTAT, M_KOBO_RESPUESTAS.XVALOR ESTADO_EMERGENCIA,TIPO_EMERGENCIA, IDFORM, FECHA_RECEPCION,MUNICIP,DPTO                                                                               FROM(                                                                                               SELECT                                                                                                       M_KOBO_RESPUESTAS.XVALOR TIPO_EMERGENCIA, m_kobo_formularios.xCODIGO_ALERTA CODIGO, m_kobo_formularios.fecha FECHA_RECEPCION, M_KOBO_FORMULARIOS.MUNICIPIO MUNICIP,                                                                                                       M_KOBO_FORMULARIOS.DEPARTAMENTO DPTO, M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IDFORM, m_kobo_formularios.ESTATUS ESTAT                                                                                               FROM                                                                                                       M_KOBO_RESPUESTAS                                                                                               INNER JOIN                                                                                                       M_KOBO_FORMULARIOS                                                                                               ON                                                                                                       M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS                                                                                               WHERE                                                                                                       M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001475' and m_kobo_formularios.id_m_formularios='0011'                                                  )                                                                                                            INNER JOIN                                                                                       M_KOBO_RESPUESTAS                                                                               ON                                                                                       IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                                                                               WHERE                                                                                       M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012173'                                                          )                                                           INNER JOIN                                                                   M_KOBO_RESPUESTAS                                                           ON                                                                   IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                                                           WHERE                                                                   M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001428'                                          )                                       INNER JOIN                                               M_KOBO_RESPUESTAS                                       ON                                               IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                                       WHERE                                               M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001477'                              )                              INNER JOIN                                       M_KOBO_RESPUESTAS                               ON                                       IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                               WHERE                                       M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012170'                  )                          INNER JOIN                                   M_KOBO_RESPUESTAS                           ON                                   IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                           WHERE                                   M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012172'            )                      INNER JOIN                               M_KOBO_RESPUESTAS                       ON                               IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                       WHERE                               M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012171'       )         


select           
    CODIGO, 
    ESTAT, 
    cast(cast(DPTO as blob sub_type text character set ISO8859_1) as varchar(2000)) DEPARTAMENTO, 
    cast(cast(MUNICIP as blob sub_type text character set ISO8859_1) as varchar(2000)) MUNICIP,           
    cast(cast(ESTADO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000)) ESTADO_EMERGENCIA, 
    cast(cast(TIPO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000))      TIPO_EMERGENCIA,      
    cast(cast(fecha_evento as blob sub_type text character set ISO8859_1) as varchar(2000)) fecha_evento, 
    cast(cast(FECHA_ALERTA as blob sub_type text character set ISO8859_1) as varchar(2000))      FECHA_ALERTA, 
    SOCIO_LIDER ,     
    OBSERVA_UGC, ENLACE_FSA 
from           
    (            
        select                           
            CODIGO, 
            ESTAT, 
            ESTADO_EMERGENCIA,
            TIPO_EMERGENCIA, 
            fecha_evento,
            IDFORM, 
            FECHA_RECEPCION,
            MUNICIP,
            FECHA_ALERTA,
            DPTO,
            SOCIO_LIDER,
            ENLACE_FSA,  
            M_KOBO_RESPUESTAS.XVALOR OBSERVA_UGC                  
        from                           
            (             
                select                               
                    CODIGO, 
                    ESTAT, 
                    ESTADO_EMERGENCIA,
                    TIPO_EMERGENCIA, 
                    fecha_evento,
                    IDFORM, 
                    FECHA_RECEPCION,
                    MUNICIP,
                    FECHA_ALERTA,
                    DPTO,
                    SOCIO_LIDER,  
                    M_KOBO_RESPUESTAS.XVALOR ENLACE_FSA                      
                from                               
                    (                        
                        select                                   
                            CODIGO, 
                            ESTAT, 
                            ESTADO_EMERGENCIA,
                            TIPO_EMERGENCIA, 
                            fecha_evento,
                            IDFORM, 
                            FECHA_RECEPCION,
                            MUNICIP,
                            FECHA_ALERTA,
                            DPTO,  
                            M_KOBO_RESPUESTAS.XVALOR SOCIO_LIDER                          
                        from                                   
                            (                                        
                                select                                               
                                    CODIGO, 
                                    ESTAT, 
                                    ESTADO_EMERGENCIA,
                                    TIPO_EMERGENCIA,
                                    M_KOBO_RESPUESTAS.XVALOR fecha_evento,
                                    IDFORM, 
                                    FECHA_RECEPCION,
                                    MUNICIP,
                                    FECHA_ALERTA,
                                    DPTO                                       
                                from                                               
                                    (                                                       
                                        SELECT                                                               
                                            CODIGO, 
                                            ESTAT, 
                                            M_KOBO_RESPUESTAS.XVALOR FECHA_ALERTA, 
                                            ESTADO_EMERGENCIA,
                                            TIPO_EMERGENCIA, 
                                            IDFORM, 
                                            FECHA_RECEPCION,
                                            MUNICIP,
                                            DPTO                                                           
                                        FROM(                                                                           
                                                SELECT                                                                                   
                                                    CODIGO, 
                                                    ESTAT, 
                                                    M_KOBO_RESPUESTAS.XVALOR ESTADO_EMERGENCIA,
                                                    TIPO_EMERGENCIA, 
                                                    IDFORM, 
                                                    FECHA_RECEPCION,
                                                    MUNICIP,
                                                    DPTO                                                                               
                                                FROM(                                                                                               
                                                        SELECT                                                                                                       
                                                            M_KOBO_RESPUESTAS.XVALOR TIPO_EMERGENCIA, 
                                                            m_kobo_formularios.xCODIGO_ALERTA CODIGO, 
                                                            m_kobo_formularios.fecha FECHA_RECEPCION, 
                                                            M_KOBO_FORMULARIOS.MUNICIPIO MUNICIP,                                                                                                       
                                                            M_KOBO_FORMULARIOS.DEPARTAMENTO DPTO, 
                                                            M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IDFORM, 
                                                            m_kobo_formularios.ESTATUS ESTAT                                                                                               
                                                        FROM                                                                                                       
                                                            M_KOBO_RESPUESTAS                                                                                               
                                                        INNER JOIN                                                                                                       
                                                            M_KOBO_FORMULARIOS                                                                                              
                                                        ON                                                                                                       
                                                            M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS                                                                                               
                                                        WHERE                                                                                                       
                                                            M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001475' and m_kobo_formularios.id_m_formularios='0011'                                                  
                                                )                                                                                                            
                                                INNER JOIN                                                                                       
                                                    M_KOBO_RESPUESTAS                                                                               
                                                ON                                                                                       
                                                    IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                                                                               
                                                WHERE                                                                                       
                                                    M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012173'                                                          
                                        )                                                           
                                        INNER JOIN                                                                   
                                            M_KOBO_RESPUESTAS                                                           
                                        ON                                                                   
                                            IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                                                           
                                        WHERE                                                                   
                                            M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001428'                                          
                                    )                                       
                                INNER JOIN                                               
                                    M_KOBO_RESPUESTAS                                       
                                ON                                               
                                    IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                                       
                                WHERE                                               
                                    M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001477'                              
                        )                              
                        INNER JOIN                                       
                            M_KOBO_RESPUESTAS                               
                        ON                                       
                            IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                               
                        WHERE                                       
                            M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012170'                  
                    )                          
                    INNER JOIN                                   
                        M_KOBO_RESPUESTAS                           
                    ON                                   
                        IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                           
                    WHERE                                   
                        M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012172'            
            )                      
        INNER JOIN                               
            M_KOBO_RESPUESTAS                       
        ON                               
            IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS                       
        WHERE                               
            M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012171'       
)         



query de ia chatgpt con chat de sql expert ERROR

SELECT 
    CODIGO, 
    ESTAT, 
    CAST(DPTO AS VARCHAR(2000)) AS DEPARTAMENTO, 
    CAST(MUNICIP AS VARCHAR(2000)) AS MUNICIP, 
    CAST(ESTADO_EMERGENCIA AS VARCHAR(2000)) AS ESTADO_EMERGENCIA, 
    CAST(TIPO_EMERGENCIA AS VARCHAR(2000)) AS TIPO_EMERGENCIA, 
    CAST(fecha_evento AS VARCHAR(2000)) AS fecha_evento, 
    CAST(FECHA_ALERTA AS VARCHAR(2000)) AS FECHA_ALERTA, 
    SOCIO_LIDER, 
    OBSERVA_UGC, 
    ENLACE_FSA 
FROM 
    (
        SELECT 
            CODIGO, 
            ESTAT, 
            ESTADO_EMERGENCIA, 
            TIPO_EMERGENCIA, 
            fecha_evento, 
            IDFORM, 
            FECHA_RECEPCION, 
            MUNICIP, 
            FECHA_ALERTA, 
            DPTO, 
            SOCIO_LIDER, 
            ENLACE_FSA,  
            M_KOBO_RESPUESTAS.XVALOR AS OBSERVA_UGC 
        FROM 
            M_KOBO_RESPUESTAS 
        INNER JOIN 
            M_KOBO_FORMULARIOS 
            ON M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS = M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS
        WHERE 
            M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001475' 
            AND M_KOBO_FORMULARIOS.ID_M_FORMULARIOS = '0011'
            AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS IN ('0012173', '001428', '001477', '0012170', '0012172', '0012171')
    ) AS datos

    SELECT      CODIGO,      ESTAT,      CAST(DPTO AS VARCHAR(2000)) AS DEPARTAMENTO,      CAST(MUNICIP AS VARCHAR(2000)) AS MUNICIP,      CAST(ESTADO_EMERGENCIA AS VARCHAR(2000)) AS ESTADO_EMERGENCIA,      CAST(TIPO_EMERGENCIA AS VARCHAR(2000)) AS TIPO_EMERGENCIA,      CAST(fecha_evento AS VARCHAR(2000)) AS fecha_evento,      CAST(FECHA_ALERTA AS VARCHAR(2000)) AS FECHA_ALERTA,      SOCIO_LIDER,      OBSERVA_UGC,      ENLACE_FSA  FROM      (         SELECT              CODIGO,              ESTAT,              ESTADO_EMERGENCIA,              TIPO_EMERGENCIA,              fecha_evento,              IDFORM,              FECHA_RECEPCION,              MUNICIP,              FECHA_ALERTA,              DPTO,              SOCIO_LIDER,              ENLACE_FSA,               M_KOBO_RESPUESTAS.XVALOR AS OBSERVA_UGC          FROM              M_KOBO_RESPUESTAS          INNER JOIN              M_KOBO_FORMULARIOS              ON M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS = M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS         WHERE              M_KOBO_RESPUESTAS.ID_P_FORMULARIOS = '001475'              AND M_KOBO_FORMULARIOS.ID_M_FORMULARIOS = '0011'             AND M_KOBO_RESPUESTAS.ID_P_FORMULARIOS IN ('0012173', '001428', '001477', '0012170', '0012172', '0012171')     ) AS datos