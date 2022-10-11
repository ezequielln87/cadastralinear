<!DOCTYPE html>
<html lang="pt-br">
    <?php
    ini_set('display_errors', '1');
    require './core/Config.php';
    require './app/portaria/Controllers/Form.php';   
    
    use app\portaria\Controllers\Form as Home;

    $Url = new Home();
    $Url->carregar();
    ?>
</html>