<?php
namespace FebriAnandaLubis\Belajar\CRUD\MVC\Controller;

use FebriAnandaLubis\Belajar\CRUD\MVC\App\View;
use FebriAnandaLubis\Belajar\CRUD\MVC\Config\Database;
use FebriAnandaLubis\Belajar\CRUD\MVC\Repository\MahasiswaRepository;

class HomeController
{
    private MahasiswaRepository $repository;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->repository = new MahasiswaRepository($connection);
    }

    function index() {
        $data = $this->repository->selectAll();
        View::render('Home/index', [
            "title" => 'PHP CRUD MVC'
        ], $data);
    }
}