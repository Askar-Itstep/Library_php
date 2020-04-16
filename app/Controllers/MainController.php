<?php

namespace App\Controllers;

class MainController
{
    public function run()
    {
        $views = new \App\Views\Main();
        $views->render();

    }


}