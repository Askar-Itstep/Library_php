<?php

namespace App\Controllers;

use App\Models\Db;

class MainController
{
    public function run()
    {
        $pdo = Db::get();
        $stmt = $pdo->prepare('
            SELECT
                *
            FROM
                `books`
            WHERE
                status = :status
        ');
        $stmt->execute([
            ':status' => 'on'
        ]);
        $views = new \App\Views\Main();
        $data = $stmt->fetchAll();

        $stmt = $pdo->query('
            SELECT* FROM `authors`
        ');
        $authors = $stmt->fetchAll();
        $views->render(
            $data, 0, $authors
        );
    }
}