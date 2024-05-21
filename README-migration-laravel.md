## laravel migraciones

# crear migracion 

    php artisan make:migration add_updatecreare_to_dcontact_table --table=D_CONTACTS

# migrar archiv especifico
php artisan migrate --path=/database/migrations/test/
php artisan migrate:refresh --path=/database/migrations/2024_03_13_170435_alter_lpa_table.php

# crar un modelo con su controlador

php artisan make:model -mrc Url

# crar un modelo con su controlador

php artisan make:model Movie -cr