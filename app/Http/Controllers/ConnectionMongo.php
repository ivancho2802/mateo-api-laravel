<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Collection;
use Jenssegers\Mongodb\Connection;
use Jenssegers\Mongodb\Query\Builder;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\Regex;
use MongoDB\BSON\UTCDateTime;

class ConnectionMongo extends CaseMongo
{
    //
    /**
     * @var Connection
     */
    private $db;

    public function setUp()
    {
        parent::setUp();

        $this->db = $this->app->get('db');
        $this->db->collection('users')->truncate();
    }
}
