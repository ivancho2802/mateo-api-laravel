BEGIN
  /* Trigger body */
  IF ((NEW.XREP IS NOT NULL) AND (NEW.XREP <> '')) THEN
  BEGIN
        SELECT CORREO FROM M_USUARIOS WHERE ID_M_USUARIO = NEW.ID_M_USUARIOS ROWS 1
        INTO XCORREO;
        INSERT INTO D_CORREO(
               DESTINATARIO,IDX,TABLA,COMANDO,TIPO,ESTATUS,ASUNTO,REMITENTE, ORIGEN, FECHA,
               FECHA_REGISTRO, FECHA_ENVIO, FECHA2) values  (
                               :XCORREO,
                               NEW.ID_D_FALLAS,
                               'D_FALLAS',
                               NULL,
                               'OUT',
                               'CONFIRMADO',
                               NEW.XREP,
                               'ach@nohungerforum.org',
                               '0015',
                               CURRENT_TIMESTAMP,
                               CURRENT_TIMESTAMP,
                               CURRENT_TIMESTAMP,
                               CURRENT_TIMESTAMP);
  END
END