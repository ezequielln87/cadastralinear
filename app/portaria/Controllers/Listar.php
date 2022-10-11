<?php

namespace App\portaria\Controllers;

require './app/portaria/Models/Listar.php';

class Listar
{
    private $dados;
    private $idDevices;

    public function index()
    {
        $this->idDevices = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);
        if (isset($this->idDevices)) {
            $devices = new \app\portaria\Models\Listar;
            $devices->devices($this->idDevices);
            $this->dados['devices'] = $devices->getResult();
            $this->renderizar('listarDevices.php');

        } else {
            $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (isset($this->dados)) {
                unset($this->dados['SendLogin']);
                $envia = new \App\portaria\Models\Cadastra();
                $this->resultado = $envia->cadastra($this->dados);
            } 
            $cliente = new \app\portaria\Models\Listar;
            $cliente->lista();
            $this->dados['list'] = $cliente->getResult();

            $this->renderizar('listarCliente.php');
        }
    }

    private function renderizar(string $page)
    {
        header('Cache-Control: no cache'); //no cache
        include_once 'app/portaria/Views/header.php';
        include_once 'app/portaria/Views/'.$page;
    }
}
