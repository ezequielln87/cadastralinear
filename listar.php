<!DOCTYPE html>
<html lang="pt-br">
    <?php
    ini_set('display_errors', '1');
    require './core/Config.php';
    require './app/portaria/Controllers/Listar.php';   
    
    use app\portaria\Controllers\Listar as Listar;

    $Url = new Listar();
    $Url->index();
    ?>
</html>