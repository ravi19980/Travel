<!DOCTYPE html>
<html lang="en">

<?= 

(isset($head) && is_array($head)) ? view('Home/header_link', $head) : view('Home/header_link') ?>

<body>
    <!-- header Menu -->
    <?= view('Home/header',['view_file'=>$view_file]) ?>
    <!-- Mian Body -->
    <?php
    if (isset($view_file) && !empty($view_file)) {
        if (isset($view_data) && is_array($view_data) && !empty($view_data)) {
            echo view($view_file, $view_data);
        } else {
            echo view($view_file);
        }
    }
    ?>

    <!-- Footer Detail -->
    <?= view('Home/footer') ?>
    <!-- Script Load -->
</body>