P_FORMULARIOS_ACENTOS

--AS\r\nBEGIN\r\n  /* Trigger body */\r\n  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĄ', 'a');\r\n  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂŠ', 'e');\r\n  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂ­', 'i');\r\n  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂł', 'o');\r\n  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂş', 'u');\r\n  NEW.OPCIONES = UPPER(NEW.OPCIONES);\r\n  \r\n  \r\n  NEW.XROTULO = REPLACE(NEW.ROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĄ', 'a');\r\n  NEW.XROTULO = REPLACE(NEW.XROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂŠ', 'e');\r\n  NEW.XROTULO = REPLACE(NEW.XROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂ­', 'i');\r\n  NEW.XROTULO = REPLACE(NEW.XROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂł', 'o');\r\n  NEW.XROTULO = REPLACE(NEW.XROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂş', 'u');\r\n  NEW.XROTULO = UPPER(NEW.XROTULO);\r\n  \r\n  NEW.XGRUPO = REPLACE(NEW.GRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĄ', 'a');\r\n  NEW.XGRUPO = REPLACE(NEW.XGRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂŠ', 'e');\r\n  NEW.XGRUPO = REPLACE(NEW.XGRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂ­', 'i');\r\n  NEW.XGRUPO = REPLACE(NEW.XGRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂł', 'o');\r\n  NEW.XGRUPO = REPLACE(NEW.XGRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂş', 'u');\r\n  NEW.XGRUPO = UPPER(NEW.XGRUPO);\r\nEND",

AS
BEGIN
  /* Trigger body */
  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĄ', 'a');
  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂŠ', 'e');
  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂ­', 'i');
  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂł', 'o');
  NEW.OPCIONES = REPLACE(NEW.OPCIONES, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂş', 'u');
  NEW.OPCIONES = UPPER(NEW.OPCIONES);
  
  
  NEW.XROTULO = REPLACE(NEW.ROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĄ', 'a');
  NEW.XROTULO = REPLACE(NEW.XROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂŠ', 'e');
  NEW.XROTULO = REPLACE(NEW.XROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂ­', 'i');
  NEW.XROTULO = REPLACE(NEW.XROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂł', 'o');
  NEW.XROTULO = REPLACE(NEW.XROTULO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂş', 'u');
  NEW.XROTULO = UPPER(NEW.XROTULO);
  
  NEW.XGRUPO = REPLACE(NEW.GRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĄ', 'a');
  NEW.XGRUPO = REPLACE(NEW.XGRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂŠ', 'e');
  NEW.XGRUPO = REPLACE(NEW.XGRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂ­', 'i');
  NEW.XGRUPO = REPLACE(NEW.XGRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂł', 'o');
  NEW.XGRUPO = REPLACE(NEW.XGRUPO, 'ĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂĂÂş', 'u');
  NEW.XGRUPO = UPPER(NEW.XGRUPO);
END
