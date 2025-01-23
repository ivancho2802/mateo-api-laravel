
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

systemctl status php7.4-fpm 
systemctl status nginx
service apache2 restart
systemctl reload apache2

## para ver los logs errores 

nano /var/log/nginx/example.journaldev.com-access.log
nano /var/log/nginx/example.journaldev.com-error.log

> storage/logs/laravel.log


    access_log /var/log/nginx/example.journaldev.com-access.log;
    error_log  /var/log/nginx/example.journaldev.com-error.log;

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
systemctl restart nginx

# editar el phpini de fpm
 /etc/php/7.3/fpm/php.ini
 /etc/php/7.4/fpm/php.ini

 extension=mongodb.so

post_max_size=100M
upload_max_filesize = 1G

# esto no funciona para reniciar
systemctl reload nginx
systemctl restart php7.3-fpm 
# esto si
service nginx restart
systemctl restart nginx
# este tambien importante
systemctl status php7.3-fpm 

# para que funcione llamadas de pdo conexion con php
# remover ;
; extension=interbase
; extension=pdo_firebird
# importante ara posytgresql
; extension=pgsql
; extension=pdo_pgsql
; extension=gd2
php_xml 
php_zip 
php_gd2 


## APLICAR AL SERVER NO APLICDO

post_max_size = 500M

output_buffering = 1342177280


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


## error timeout excel

= Web.Page(Web.Contents("URL", [Timeout=#duration(0,0,15,0)]))

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

## error de carga de archivo agregar al php.ini
 /etc/php/7.3/fpm/php.ini
 /etc/php/7.4/fpm/php.ini

max_execution_time = 600s
max_input_time = 600s
memory_limit = 1200M

## si actualizo el software ojo con el postgresql y el firebird que van ligados con el php

apt-get install php7.4-pgsql

apt-get install php7.4-firebird
apt-get install php7.4-interbase

apt-get install php7.4-mongodb 

## editar 504 error timeout ngx 

https://easycloudsupport.zendesk.com/hc/en-us/articles/360002057472-How-to-Fix-504-Gateway-Timeout-using-Nginx

nano etc/nginx/conf.d/ach.conf

client_max_body_size 0;
proxy_read_timeout 9600;
...
location ~ \.php$ {
    ...
    fastcgi_read_timeout 300;

}
    
sudo systemctl restart nginx.service
service nginx restart

systemctl restart nginx
service nginx restart

service nginx reload
systemctl reload nginx


systemctl status php7.4-fpm 
systemctl restart php7.4-fpm 

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

## architecture

    dpkg --print-architecture
amd64


## para intalar potgresq directo

https://www.devart.com/dbforge/postgresql/how-to-install-postgresql-on-linux/

sudo sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt $(lsb_release-cs)-pgdg main" &gt; /etc/apt/sources.list.d/pgdg.list'

wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc |   apt-key add - s

sudo apt update

sudo apt install postgresql postgresql-contrib

sudo systemctl start postgresql.service
sudo systemctl enable postgresql.service


sudo -i -u postgres

## creacion de postgresql en linux y configuracion de bd para la conexion

https://www3.ntu.edu.sg/home/ehchua/programming/sql/PostgreSQL_GetStarted.html

...

sudo -u postgres createuser --login --pwprompt SYSDBA


3.4  Using Utility "createuser" and "createdb"


# TYPE  DATABASE        USER            ADDRESS                 METHOD
local   ach             SYSDBA                                  md5

# Database administrative login by Unix domain socket 
local   all             postgres                                peer 
# TYPE  DATABASE        USER            ADDRESS                 METHOD 
local   ach             SYSDBA                                  md5 


host    all             all             0.0.0.0 0.0.0.0         md5

## COMO HACER QUERIES EN LA BASE DE DATOS DE PROUDCCION

sudo systemctl start postgresql.service

# ACCEDER CON EL USUARIO SYSDBA

https://wiki.debian.org/PostgreSql
https://www.commandprompt.com/education/how-to-create-a-read-only-user-in-postgresql/
https://www.todopostgresql.com/crear-usuarios-en-postgresql/
https://www.postgresql.org/docs/current/sql-grant.html


su -c /usr/bin/psql postgres

GRANT SELECT ON ALL TABLES IN SCHEMA public TO harold;

sudo -i -u SYSDBA

psql -h localhost -U SYSDBA -d ach

# CONECTAR A LA BD

psql

# como mostrar las base de datso

\l

# como acceder a la base de datos especifica

\c ach

    poner el usuario y la contraseña que corresponda

# sql 

    normal como siempre

mostrar postgresql las tablas \dt

# describe table 
 \d  "M_LPA_EMERGENCIAS";

# como ver la configuracion actual

SHOW config_file;

# OTRAS FURNTAS 
https://medium.com/coding-blocks/creating-user-database-and-adding-access-on-postgresql-8bfcd2f4a91e
https://www.hostinger.co/tutoriales/instalar-postgresql-ubuntu





agregar la key a github

    https://github.com/IODIAZACF/ach-api-laravel/settings/keys


cuando no haya coneccion reparar el error con 
ssh-agent -s

eval `ssh-agent -s`
ssh-add

## como ver las versiones que puedo descra des de apt get debina

apt-cache policy <packageName>

## localizacion en debian de algunas fuentes de donde salen los proveedores de instaldaores de paquetes

/etc/apt/sources.list.d/

## otra fuentre sde a rchivos esta aqui pero no l si son 

ls /usr/share/keyrings/


## como actualizar debian de 10 a 11

https://phoenixnap.com/kb/upgrade-debian-10-to-11

## mongodb con debian 11 y bullselle

https://www.mongodb.com/docs/manual/tutorial/install-mongodb-on-debian/
## docu mongo

https://www.mongodb.com/docs/manual/tutorial/install-mongodb-on-debian/

## if fail

sudo systemctl daemon-reload

## para entrar a la termianl de mongo

mongosh

https://www.mongodb.com/docs/mongodb-shell/

## php.ini

;php_mongodb

## logos

sudo rm -r /var/log/mongodb
sudo rm -r /var/lib/mongodb

## check status and reset sefvices

systemctl status mongod
systemctl restart mongod



## para php fpm errores

/var/log/php7.4-fpm.log

...timeout 10000

nano /etc/php/7.4/fpm/pool.d/www.conf

request_terminate_timeout 10000

## para el timeout  este funciono hago respaldo del documento ngingx.conf en local en el repositorio del gloval y el local

client_body_timeout 120s;
client_header_timeout 120s;

global

en 

/etc/nginx/nginx.conf

local en 

/etc/nginx/conf.d/ach.conf

systemctl restart nginx
service nginx restart


## nginx logs este

/var/log/nginx/error.log

/var/log/nginx/access.log 

## como ver puertos en uso 

netstat -ano

## como ver si nginx se esta usando 

nginx



## para vel el formatio de nginx config

nginx -t

## para ver la configuracion actual de nginx

cat /proc/$(cat /var/run/nginx.pid)/limits
## OR ##
grep -i 'Max open files' /proc/$(cat /var/run/nginx.pid)/limits
## OR ##

runuser -u nginx -- bash

ulimit -Hn

 ulimit -Sn
## error to many files open
https://www.cyberciti.biz/faq/linux-unix-nginx-too-many-open-files/
## metodo 1
edite el archvios

nano /etc/sysctl.conf
fs.file-max = 70000

nano /etc/security/limits.conf

nginx       soft    nofile   10000
nginx       hard    nofile  30000

sysctl -p


sysctl: setting key "fs.file-max": Read-only file system

## metodo 2 

systemctl edit nginx.service

se editara el archvio 
/etc/systemd/system/nginx.service.d/override.conf
puse [Service]
LimitNOFILE=65535

## otro reinicio de los demon
sudo systemctl daemon-reload


## como descomprimir tar -xf archive.tar.gz
https://www.tecmint.com/add-delete-and-update-files-in-tar-archive/#:~:text=Adding%20files%20to%20an%20existing,files%20you%20want%20to%20add.

tar -xf archive.tar.gz
tar -xvf archive.tar.gz
tar -xf debian-11-turnkey-moodle_17.1-1_amd64.tar.gz -C /var/lib/vz/template/cache/

## para descargar de proxmos imagen

https://mirror.umd.edu/turnkeylinux/images/proxmox/



## como configurar site

https://www.digitalocean.com/community/tutorials/how-to-set-up-nginx-server-blocks-virtual-hosts-on-ubuntu-16-04

cp /etc/nginx/sites-available/default /etc/nginx/sites-available/mireview.com

sudo chown -R $USER:$USER /opt/api/ach-api-laravel
sudo chown -R $USER:$USER /var/www/test.com/html

sudo chmod -R 755 /opt/api/ach-api-laravel

editar para publicar o activar la configuracion

grep -R default_server /etc/nginx/sites-enabled/

para habilitar los bloques

  ln -s /etc/nginx/sites-available/mireview.com /etc/nginx/sites-enabled/
  ln -s /etc/nginx/sites-available/test.com /etc/nginx/sites-enabled/


chmod -R 777 storage bootstrap/cache

chgrp -R www-data /opt/api/ach-api-laravel
chmod -R 775 /opt/api/ach-api-laravel

## para aplicar cambios en nginx.conf

 rm /etc/nginx/sites-enabled/mireview.com
 ln -s /etc/nginx/sites-available/mireview.com /etc/nginx/sites-enabled/
 
grep -R default_server /etc/nginx/sites-enabled/
service nginx restart

## posibles perdidas de datos el dia 21 05 2024 a las 4:04 pm se cambio el servidor la base de daros se migro a las 2 

## tabla de caracteres 
https://www.indalcasa.com/programacion/html/tabla-de-codificaciones-de-caracteres-entre-ansi-utf-8-javascript-html/#google_vignette

## comando instalar ongo

C:\ACH>msiexec.exe /l*v mdbinstall.log  /qb /i mongodb-windows-x86_64-7.0.11-signed.msi

## jobs en laravel se hace con el dispache este crea el job y en job_failed se ven los que fallan

 php artisan queue:listen

## para los estilos se usa por defecto

tailwindcss

en app.css