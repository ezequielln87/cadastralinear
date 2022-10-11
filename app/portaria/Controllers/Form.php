<?php

namespace App\portaria\Controllers;

require './app/portaria/Models/Cadastra.php';

class Form
{
    private $dados;
    private $resultado;

    public function carregar()
    {

        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($this->dados)) {
            unset($this->dados['SendLogin']);
            $envia = new \App\portaria\Models\Cadastra();
            $this->resultado = $envia->cadastra($this->dados);
        }else{
            $this->renderizar();
        }
    }

    public function renderizar()
    {
        header('Cache-Control: no cache'); //no cache
        include_once 'app/portaria/Views/header.php';
        include_once 'app/portaria/Views/form.php';
    }

}
