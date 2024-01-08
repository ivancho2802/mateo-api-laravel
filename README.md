
## versio laravel 8.0

## php version 7.4.0

## nstalacion de composer

https://medium.com/techvblogs/update-composer-in-ubuntu-4138e36205eb

## for init server
> composer global require laravel/installer

## para configurar nginx
https://www.nginx.com/blog/setting-up-nginx/
https://nginx.org/en/linux_packages.html#Debian


## servicios para ver el estado de los servicio

systemctl status php7.3-fpm 
systemctl status nginx
service apache2 restart
systemctl reload apache2

## para ver los logs errores 

> tail -f /var/log/nginx/domain1.access.log

## para que mer permita cargar archivos grnades

#falta editar en las lineas de 
http {
    ...
    client_max_body_size 500M; 
    server_names_hash_bucket_size 64; 
}

# no fucnino ngnix -t

# esto no funciona para reniciar
systemctl reload nginx
# esto si
service nginx restart

# editar el phpini de fpm
 /etc/php/7.3/fpm/php.ini

post_max_size=100M
upload_max_filesize = 500M

# esto no funciona para reniciar
systemctl reload nginx
# esto si
service nginx restart
# este tambien importante
systemctl status php7.3-fpm 

# para que funcione llamadas de pdo conexion con php
# remover ;
; extension=interbase
; extension=pdo_firebird
# importante ara posytgresql
; extension=pgsql
; extension=pdo_pgsql

## algunos errores identificados permisos al configurar php en nginx

## error de configuracion de cache

sudo chown -R $USER:www-data storage

sudo chown -R $USER:www-data bootstrap/cache

chmod -R 775 storage

chmod -R 775 bootstrap/cache
## error de configuracion de cache
https://stackoverflow.com/questions/23443398/nginx-error-connect-to-php5-fpm-sock-failed-13-permission-denied
otras actualizaciones mas 
> usermod -aG www-data nginx
systemctl status php7.3-fpm 

## error con los certificados para los get a api externa
descargar de https://curl.se/docs/caextract.html
poner en php.ini
[curl]
curl.cainfo = C:\ACH\php\extras\ssl\cacert.pem
[openssl]
openssl.cafile = C:\ACH\php\extras\ssl\cacert.pem

## error al descargar archivos laravel error "Class 'finfo' not found"

editat php.ini
fileinfo 

line
;extension=fileinfo


## mapa de rutas 

> php artisan route:list

+--------+----------+-----------------------------+-----------------------------+---------+------------+
| Domain | Method   | URI                         | Name                        | Action  | Middleware |
+--------+----------+-----------------------------+-----------------------------+---------+------------+
|        | GET|HEAD | /                           | generated::A4mAn9fIANFXsbg8 | Closure | web        |
|        | GET|HEAD | api/formularios_kobo_master | generated::yFBk3ygDSnUnHrn2 | Closure | api        |
|        | GET|HEAD | api/formularios_master      | generated::icUaK4J45OxhJUky | Closure | api        |
|        | GET|HEAD | api/kobo/{uui}              | generated::ppTA2QSTrQWFYNBE | Closure | api        |
|        | GET|HEAD | api/user                    | generated::DMUKFoQ72sLqfXdM | Closure | api        |
|        |          |                             |                             |         | auth:api   |
+--------+----------+-----------------------------+-----------------------------+---------+------------+
## para descargar formato para la carga de excel en sistema mire sys
http://127.0.0.1:8000/api/meal/lpa/download

## solo para la primra migracio corres estas migraciones

## error 413

en /etc/nginx/nginx.conf

http {
      client_max_body_size 500M;         
}


DO


DOING
    crear servicio para cargar excel de meal formato fuente 1 lpa en la base de datos con adaptacion de tablas existe


DOES


    solucionar error 
        InvalidArgumentException
        Malformed UTF-8 characters, possibly incorrectly encoded

    solucionar errore de conexion crear dos ramas master para produccion y dev para desarrollo en local


Dockerfile

docker build -t ach-api-laravel .

docker run -d -p 80:80 ach-api-laravel


## ver version de linux

cat /etc/issue
Debian GNU/Linux 11 \n \l

## para intalar potgresq directo

https://www.devart.com/dbforge/postgresql/how-to-install-postgresql-on-linux/

sudo sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt $(lsb_release
-cs)-pgdg main" &gt; /etc/apt/sources.list.d/pgdg.list'

wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo
apt-key add - s

sudo apt update

sudo apt install postgresql postgresql-contrib

sudo systemctl start postgresql.service

sudo -i -u postgres

