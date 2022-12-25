<?php

function getDatabaseConfig(): array {
    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=php_crud_mvc_test",
                "username" => "root",
                "password" => ""
            ],
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=php_crud_mvc",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}