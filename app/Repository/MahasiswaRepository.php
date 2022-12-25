<?php
namespace FebriAnandaLubis\Belajar\CRUD\MVC\Repository;

use FebriAnandaLubis\Belajar\CRUD\MVC\Domain\User;

class MahasiswaRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function selectAll() {
        $statement = $this->connection->query("SELECT * FROM users");
        return $statement;
    }

    public function selectById(string $id): ?User {
        $statement = $this->connection->prepare("SELECT id, nama, npm, prodi FROM users WHERE id = ?");
        $statement->execute([
            $id
        ]);

        try {
            if ($row = $statement->fetch()) {
                $user = new User();
                $user->id = $row['id'];
                $user->nama = $row['nama'];
                $user->npm = $row['npm'];
                $user->prodi = $row['prodi'];

                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function findByNpm(string $npm) {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE npm = ?");
        $statement->execute([$npm]);
        $data = $statement->fetch();
        return $data;
    }

    public function addMahasiswa(User $user): User {
        $statement = $this->connection->prepare("INSERT INTO users(nama, npm, prodi) VALUES (?,?,?)");
        $statement->execute([
            $user->nama,
            $user->npm,
            $user->prodi
        ]);
        return $user;
    }

    public function updateByid(User $user): ?User {
        $statement = $this->connection->prepare("UPDATE users SET id = ?, nama = ?, npm = ?, prodi = ? WHERE id = ?");
        $statement->execute([
            $user->id,
            $user->nama,
            $user->npm,
            $user->prodi,
            $user->id,
        ]);
        return $user;
    }

    public function deleteByid(User $user) {
        $statement = $this->connection->prepare("DELETE FROM users WHERE id = ?");
        $statement->execute([$user->id]);
    }
}