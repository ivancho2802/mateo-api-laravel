select

    CODIGO,

    ESTAT,

    cast(cast(DPTO as blob sub_type text character set ISO8859_1) as varchar(2000)) DEPARTAMENTO,

    cast(cast(MUNICIP as blob sub_type text character set ISO8859_1) as varchar(2000)) MUNICIP,

    cast(cast(ESTADO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000))ESTADO_EMERGENCIA,

    cast(cast(TIPO_EMERGENCIA as blob sub_type text character set ISO8859_1) as varchar(2000)) TIPO_EMERGENCIA,

    cast(cast(fecha_evento as blob sub_type text character set ISO8859_1) as varchar(2000)) fecha_evento,

    cast(cast(fuente as blob sub_type text character set ISO8859_1) as varchar(2000)) fuente,

    cast(cast(FECHA_ALERTA as blob sub_type text character set ISO8859_1) as varchar(2000)) FECHA_ALERTA

from (
        select CODIGO, ESTAT, ESTADO_EMERGENCIA,TIPO_EMERGENCIA,M_KOBO_RESPUESTAS.XVALOR fecha_evento,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO, fuente

    from (

        select CODIGO, ESTAT, ESTADO_EMERGENCIA, TIPO_EMERGENCIA, M_KOBO_RESPUESTAS.XVALOR fuente,IDFORM, FECHA_RECEPCION,MUNICIP,FECHA_ALERTA,DPTO

        from (

            SELECT CODIGO, ESTAT, M_KOBO_RESPUESTAS.XVALOR FECHA_ALERTA, ESTADO_EMERGENCIA,TIPO_EMERGENCIA, IDFORM, FECHA_RECEPCION,MUNICIP,DPTO

            FROM (

                SELECT CODIGO, ESTAT, M_KOBO_RESPUESTAS.XVALOR ESTADO_EMERGENCIA,TIPO_EMERGENCIA, IDFORM, FECHA_RECEPCION,MUNICIP,DPTO

                FROM(

                    SELECT M_KOBO_RESPUESTAS.XVALOR TIPO_EMERGENCIA,

                    m_kobo_formularios.xCODIGO_ALERTA CODIGO,

                    m_kobo_formularios.fecha FECHA_RECEPCION,

                    M_KOBO_FORMULARIOS.MUNICIPIO MUNICIP,

                    M_KOBO_FORMULARIOS.DEPARTAMENTO DPTO,

                    M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS IDFORM,

                    m_kobo_formularios.ESTATUS ESTAT

                    FROM M_KOBO_RESPUESTAS INNER JOIN M_KOBO_FORMULARIOS ON M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS=M_KOBO_FORMULARIOS.ID_M_KOBO_FORMULARIOS

                    WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001475' and m_kobo_formularios.id_m_formularios='0011'
                )

                INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS

                WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='0012173'
            )

            INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS

            WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001428'
        )

        INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS

        WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001467'
    )

    INNER JOIN M_KOBO_RESPUESTAS ON IDFORM=M_KOBO_RESPUESTAS.ID_M_KOBO_FORMULARIOS

    WHERE M_KOBO_RESPUESTAS.ID_P_FORMULARIOS='001477'
)