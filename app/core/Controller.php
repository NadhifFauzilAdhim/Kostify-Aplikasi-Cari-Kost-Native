<?php
// kostifynative/app/core/Controller.php
class Controller {
    public function view($view, $data = []) {
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            http_response_code(500);
            echo "View \"$view\" tidak ditemukan.";
            exit;
        }
    }

    public function model($model) {
        // asumsikan $model sudah sesuai nama file, misal 'Listing_model'
        $modelFile = __DIR__ . '/../models/' . $model . '.php';
        if (file_exists($modelFile)) {
            require_once $modelFile;               // <<< require_once di sini
            if (!class_exists($model)) {
                http_response_code(500);
                echo "Class model \"$model\" tidak ditemukan dalam file.";
                exit;
            }
            return new $model();
        } else {
            http_response_code(500);
            echo "Model file \"$modelFile\" tidak ditemukan.";
            exit;
        }
    }
}
