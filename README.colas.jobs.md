## los comandos

## para crear cola

php artisan make:job NewJob

## para ver como esos funcionan no recomendado en prod

php artisan queue:listen

## para produccion toma el por defecto los procesados o finaliza

php artisan queue:work 

## para cuando se usa conexion

php artisan queue:work database --queue=cola2

## como reintentar un job fallido

php artisan queue:retry all

// lo que se hace es que los pasa a jobs de nuevo

php artisan queue:retry --queue=name
https://medium.com/insiderengineering/optimize-your-laravel-applications-performance-effective-strategies-for-implementing-job-retries-384da22e3a50
https://laravel.com/docs/8.x/queues

