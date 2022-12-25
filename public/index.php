<?php
require_once __DIR__ . '/../vendor/autoload.php';

use FebriAnandaLubis\Belajar\CRUD\MVC\App\Router;
use FebriAnandaLubis\Belajar\CRUD\MVC\Controller\HomeController;
use FebriAnandaLubis\Belajar\CRUD\MVC\Config\Database;
use FebriAnandaLubis\Belajar\CRUD\MVC\Controller\MahasiswaController;

Database::getConnection("prod");

// Home Controller
Router::add('GET','/',HomeController::class,'index',[]);

// Mahasiswa Controller
Router::add('GET','/create/mahasiswa',MahasiswaController::class, 'create', []);
Router::add('POST','/create/mahasiswa',MahasiswaController::class, 'createPost', []);

// update data
Router::add('GET','/update/mahasiswa',MahasiswaController::class, 'update', []);
Router::add('POST','/update/mahasiswa',MahasiswaController::class, 'updatePost', []);

// delete data
Router::add('GET','/delete/mahasiswa',MahasiswaController::class,'delete',[]);

Router::run();