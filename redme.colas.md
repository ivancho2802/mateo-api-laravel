los comandos

para crear cola

php artisan make:job NewJob

para ver como esos funcionan no recomendado en prod

php artisan queue:list

para produccion toma el por defecto los procesa o finaliza

php artisan queue:work 

para cuando se usa conexion

php artisan queue:work database --queue=cola2
