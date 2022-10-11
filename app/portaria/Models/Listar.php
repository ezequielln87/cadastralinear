<?php

namespace App\portaria\Models;

require './app/portaria/Models/helper/AdmsRead.php';

class Listar  
{
    private $result;
    
    function getResult() {
        return $this->result;
    }

    public function lista()
    {       
        $lista = new \app\portaria\Models\helper\AdmsRead;
        $lista->fullRead("SELECT * FROM cliente", "");
        $this->result = $lista ->getResultado();       
    }
    public function devices(string $id)
    {       
        $listaDevices = new \app\portaria\Models\helper\AdmsRead;
        $listaDevices->fullRead("SELECT 
                                * 
                                FROM devices AS dv
                                LEFT JOIN cliente AS ct ON ct.id=dv.fk_cliente_ID
                                WHERE ct.id=:id
                                ", "id=$id");
                                
        $this->result = $listaDevices->getResultado();   
    }
    
}

  


