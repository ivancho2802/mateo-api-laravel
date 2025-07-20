analicis de proxmos

en 

nginx -t

da el resultado 

nginx: the configuration file /etc/nginx/nginx.conf syntax is ok
nginx: configuration file /etc/nginx/nginx.conf test is successful

el contenido de /etc/nginx/nginx.conf no tiene el server pero si estas dos configuraciones

 include /etc/nginx/conf.d/*.conf;
        include /etc/nginx/sites-enabled/*;

dentro de este no hay nada
 include /etc/nginx/conf.d/*.conf;


 dentro de este etsa e/etc/nginx/sites-enabled/

 mireview.com

 la unica configuracion de server funcionando

 