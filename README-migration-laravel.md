## laravel migraciones

# crear migracion 

    php artisan make:migration add_updatecreate_to_dcontact_table --table=D_CONTACTS
    php artisan make:migration create_job_details_table

# migrar archiv especifico
php artisan migrate --path=/database/migrations/test/
php artisan migrate:refresh --path=/database/migrations/2024_03_13_170435_alter_lpa_table.php
php artisan migrate:refresh --path=/database/migrations/2024_07_26_083931_alter_adns_table.php

php artisan migrate:refresh --path=/database/migrations/2024_06_04_150639_alter_analisis_table.php

# crar un modelo con su controlador

php artisan make:model -mrc Url

# crar un modelo con su controlador

php artisan make:model Movie -cr
