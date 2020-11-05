// /ddl/config/redis.php
<?php

	// ...
	“redis” => [
     "client" => "phpredis",
     		"options" => [
       	    "cluster" => "redis",
       	    "prefix" => "laravel_database_",],
       	    "default" => [
       		    "url" => null,
       		    "host" => "127.0.0.1",
      		    "password" => null,
       		    "port" => "6379",
      		    "database" => 0,
     		    	],
         "cache" => [
           "url" => null,
           "host" => "127.0.0.1",
           "password" => null,
           "port" => "6379",
           "database" => 1,
         ],
      ]
    ]
	];
