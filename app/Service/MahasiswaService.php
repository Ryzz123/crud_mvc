<?php
namespace FebriAnandaLubis\Belajar\CRUD\MVC\Service;

use FebriAnandaLubis\Belajar\CRUD\MVC\Config\Database;
use FebriAnandaLubis\Belajar\CRUD\MVC\Domain\User;
use FebriAnandaLubis\Belajar\CRUD\MVC\Exception\ValidationException;
use FebriAnandaLubis\Belajar\CRUD\MVC\Model\CreateRequest;
use FebriAnandaLubis\Belajar\CRUD\MVC\Model\CreateResponse;
use FebriAnandaLubis\Belajar\CRUD\MVC\Model\DeleteRequest;
use FebriAnandaLubis\Belajar\CRUD\MVC\Model\UpdateRequest;
use FebriAnandaLubis\Belajar\CRUD\MVC\Model\UpdateResponse;
use FebriAnandaLubis\Belajar\CRUD\MVC\Repository\MahasiswaRepository;
use PHPUnit\Exception;

class MahasiswaService
{
    private MahasiswaRepository $repository;

    public function __construct(MahasiswaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(CreateRequest $request): CreateResponse {
             $this->addValidation($request);

            $user = $this->repository->findByNpm($request->npm);

            if ($user != null) {
                throw new ValidationException("Mahasiswa dengan npm $request->npm sudah ada");
            }

            $user = new User();
            $user->nama = $request->nama;
            $user->npm = $request->npm;
            $user->prodi = $request->prodi;

            // simpan data
            $this->repository->addMahasiswa($user);

            $response = new CreateResponse();
            $response->user = $user;

            return $response;
    }

    private function addValidation(CreateRequest $request) {
        if ($request->nama == null || $request->prodi == null || $request->npm == null || trim($request->nama) == "" || trim($request->npm) == "" || trim($request->prodi) == "") {
            throw new ValidationException("Nama, NPM, Prodi can not blank");
        }
    }

    public function update(UpdateRequest $request): UpdateResponse {
        $this->updateValidation($request);

        $user = new User();
        $user->id = $request->id;
        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->prodi = $request->prodi;

        // update data
        $this->repository->updateByid($user);

        $response = new UpdateResponse();
        $response->user = $user;

        return $response;
    }

    private function updateValidation(UpdateRequest $request) {
        if ($request->nama == null || $request->prodi == null || $request->npm == null || trim($request->nama) == "" || trim($request->npm) == "" || trim($request->prodi) == "") {
            throw new ValidationException("Nama, NPM, Prodi can not blank");
        }
    }

    public function delete(DeleteRequest $request) {
        $user = new User();
        $user->id = $request->id;

        $this->repository->deleteByid($user);
    }
}