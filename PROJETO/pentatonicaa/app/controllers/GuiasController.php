<?php
class GuiasController {
    public function guia() {
        if (isset($_GET['guia'])) {
            $guia = $_GET['guia'];
        require_once __DIR__ . '/../views/pages/' . $guia . '.php';
        }
    }
}