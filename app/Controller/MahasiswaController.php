<?php

namespace FebriAnandaLubis\Belajar\CRUD\MVC\Controller;

use FebriAnandaLubis\Belajar\CRUD\MVC\App\View;
use FebriAnandaLubis\Belajar\CRUD\MVC\Config\Database;
use FebriAnandaLubis\Belajar\CRUD\MVC\Domain\User;
use FebriAnandaLubis\Belajar\CRUD\MVC\Exception\ValidationException;
use FebriAnandaLubis\Belajar\CRUD\MVC\Model\CreateRequest;
use FebriAnandaLubis\Belajar\CRUD\MVC\Model\DeleteRequest;
use FebriAnandaLubis\Belajar\CRUD\MVC\Model\UpdateRequest;
use FebriAnandaLubis\Belajar\CRUD\MVC\Repository\MahasiswaRepository;
use FebriAnandaLubis\Belajar\CRUD\MVC\Service\MahasiswaService;

class MahasiswaController
{
    private MahasiswaService $mahasiswaService;
    private MahasiswaRepository $mahasiswaRepository;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->mahasiswaRepository = new MahasiswaRepository($connection);
        $this->mahasiswaService = new MahasiswaService($this->mahasiswaRepository);
    }

    public function create() {
        View::render('User/create', [
            'title' => "CREATE DATA MAHASISWA"
        ]);
    }

    public function createPost() {
        $request = new CreateRequest();
        $request->nama = $_POST['nama'];
        $request->npm = $_POST['npm'];
        $request->prodi = $_POST['prodi'];

        try {
            $this->mahasiswaService->add($request);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('User/create',[
                'title' => 'CREATE DATA MAHASISWA',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function update() {
        $id = $_GET['id'];
        $user = $this->mahasiswaRepository->selectById($id);
        View::render('User/update', [
            'title' => "UPDATE DATA MAHASISWA",
            'user' => [
                'id' => $user->id,
                'nama' => $user->nama,
                'npm' => $user->npm,
                'prodi' => $user->prodi
            ]
        ]);
    }

    public function updatePost() {
        $request = new UpdateRequest();
        $request->id = $_POST['id'];
        $request->nama = $_POST['nama'];
        $request->npm = $_POST['npm'];
        $request->prodi = $_POST['prodi'];

        try {
            $this->mahasiswaService->update($request);
            View::redirect('/');
        } catch (ValidationException $exception) {
            View::render('User/update',[
                'title' => 'UPDATE DATA MAHASISWA',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $request = new DeleteRequest();
        $request->id = $id;
        $this->mahasiswaService->delete($request);
        View::redirect('/');
    }
}