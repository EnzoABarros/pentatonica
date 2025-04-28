<?php

require_once __DIR__ . '/../models/Cliente.php';

class LogoutController {
    public function sair()
    {

        Cliente::sair();

        header("Location: /pentatonicaa/PROJETO/pentatonicaa/public/");
        exit;
    }
}
