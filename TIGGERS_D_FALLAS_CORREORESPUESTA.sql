BEGIN
  /* Trigger body */
  IF ((NEW.XREP IS NOT NULL) AND (NEW.XREP <> '')) THEN
  BEGIN
        SELECT CORREO FROM M_USUARIOS WHERE ID_M_USUARIO = NEW.ID_M_USUARIOS1 ROWS 1
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

        INSERT INTO D_CORREO(
               DESTINATARIO,IDX,TABLA,COMANDO,TIPO,ESTATUS,ASUNTO,REMITENTE, ORIGEN, FECHA,
               FECHA_REGISTRO, FECHA_ENVIO, FECHA2) values  (
                               'iodiaz@co.acfspain.org',
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
        AUX1 = REPLACE(NEW.NOMBRE_AREA, 'ÃƒÂƒÃ‚ÂƒÃƒÂ‚Ã‚ÂƒÃƒÂƒÃ‚Â‚ÃƒÂ‚Ã‚ÂƒÃƒÂƒÃ‚ÂƒÃƒÂ‚Ã‚Â‚ÃƒÂƒÃ‚Â‚ÃƒÂ‚Ã‚Â³', 'o');
        
        IF ( NEW.ZONA = 'nrc' OR 'Solicitud de rectificacion de informacion en reportes o en Coordinacion' = :AUX1 ) THEN
            BEGIN
              INSERT INTO D_CORREO(
               DESTINATARIO,IDX,TABLA,COMANDO,TIPO,ESTATUS,ASUNTO,REMITENTE, ORIGEN, FECHA,
               FECHA_REGISTRO, FECHA_ENVIO, FECHA2) values  (
                               'laura.saenz@nrc.no',
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

        IF ( NEW.ZONA = 'acf') THEN
            BEGIN
              INSERT INTO D_CORREO(
               DESTINATARIO,IDX,TABLA,COMANDO,TIPO,ESTATUS,ASUNTO,REMITENTE, ORIGEN, FECHA,
               FECHA_REGISTRO, FECHA_ENVIO, FECHA2) values  (
                               'mgranados@co.acfspain.org',
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

        IF ( NEW.NOMBRE_AREA = 'Ajustes Dashboard de LPA y/o MQR' OR NEW.NOMBRE_AREA = 'Modificacion de datos de LPA (recuerda poner la fecha migracion)' OR NEW.NOMBRE_AREA = 'Modificacion de datos de MQR (recuerda poner la fecha migracion)') THEN
            BEGIN
              INSERT INTO D_CORREO(
                      DESTINATARIO,IDX,TABLA,COMANDO,TIPO,ESTATUS,ASUNTO,REMITENTE, ORIGEN, FECHA,
                      FECHA_REGISTRO, FECHA_ENVIO, FECHA2) values  (
                                      'rmgiraldo@co.acfspain.org',
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
            
        IF ( NEW.NOMBRE_AREA = 'Ediciones en la plataforma MireVIEW' OR NEW.NOMBRE_AREA = 'Ediciones en la plataforma CONSORCIO web Mire+') THEN
            BEGIN
              INSERT INTO D_CORREO(
                      DESTINATARIO,IDX,TABLA,COMANDO,TIPO,ESTATUS,ASUNTO,REMITENTE, ORIGEN, FECHA,
                      FECHA_REGISTRO, FECHA_ENVIO, FECHA2) values  (
                                      'mazuniga@co.acfspain.org',
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
END