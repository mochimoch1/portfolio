<?php
class HomeController {
    public function index() {
        $title = 'ホームページ';
        ob_start();
        include __DIR__ . '/../views/home.phtml';
        return ob_get_clean();
    }
}