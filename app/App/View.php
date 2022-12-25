<?php

namespace FebriAnandaLubis\Belajar\CRUD\MVC\App;

class View
{
    // render untuk tampilan halaman
    public static function render(string $view, $model, $data = null) {
        require __DIR__ . '/../View/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/footer.php';
    }

    // redirect untuk memindahkan halaman
    public static function redirect(string $url) {
        header("Location: $url");

        if (getenv('model') != 'test') {
            exit();
        }
    }
}