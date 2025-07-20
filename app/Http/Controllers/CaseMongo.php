<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Mongodb\MongodbServiceProvider;

class CaseMongo extends Controller
{
    //
    protected function getPackageProviders($app)
    {
        return [
            MongodbServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'mongodb');
        $app['config']->set('database.connections.mongodb', [
            'name' => 'mongosh',
            'host' => '127.0.0.1:27017',

            'driver' => 'mongodb',
            'database' => 'local',
        ]);
        /**
         * 
            'driver' => 'mongodb',
            'dsn' => env('DB_URI', "mongodb://127.0.0.1:27017/?directConnection=true&serverSelectionTimeoutMS=2000&appName=mongosh+2.2.6"),
            'database' => 'local',
         */
    }
}
