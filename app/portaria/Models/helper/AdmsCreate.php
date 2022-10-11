<?php

namespace App\portaria\Models\helper;

require './app/portaria/Models/helper/AdmsConn.php';

class AdmsCreate extends AdmsConn
{
    private $Tabela;
    private $Dados;
    private $Query;
    private $Conn;
    private $Resultado;
    private $Entrada;
    private $Linha;
    
    function getResultado()
    {
        return $this->Resultado;
    }

    
    public function newTable($Tabela, array $Dados)
    {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados; 
        $this->getIntrucaoTable();
        $this->executarInstrucao(TRUE);
    }

    public function exeCreate($Tabela, array $Dados)
    {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;  
        $this->getIntrucao();
        $this->executarInstrucao(FALSE);
    }
    
    private function getIntrucao()
    {
        $colunas = implode(', ', array_keys($this->Dados));
        $valores= ':' . implode(', :', array_keys($this->Dados));
        $this->Query = "INSERT INTO {$this->Tabela} ({$colunas}) VALUES ({$valores})";
    }
    
    
    private function getIntrucaoTable()
    {
        $tmp = array_keys($this->Dados['nome']);
        $ultimo = end($tmp);
        for ($i=1; $i <= $ultimo; $i++) {
            if (isset($this->Dados['nome'][$i])) {
                $this->Linha[$i] = $this->Dados['nome'][$i].' '.$this->Dados['tipo'][$i].' '.$this->Dados['exigido'][$i].', ';
            }            
        }
        
        $this->Entrada = implode('', array_values($this->Linha));
        $this->Query = "CREATE TABLE IF NOT EXISTS {$this->Tabela}
                        (
                         id INT NOT NULL AUTO_INCREMENT,
                         {$this->Entrada}
                         created DATETIME NOT NULL,
                         modified DATETIME NULL,
                         PRIMARY KEY (id)
                         )";                        
    }

    private function executarInstrucao($limp)
    {
        $this->conexao();
        try {
            
            if (!$limp) {
                
                $this->Query->execute($this->Dados);
              
            }else{
              
                $this->Query->execute();
            }
            $this->Resultado = $this->Conn->lastInsertId();
            // echo $this->Resultado;
            // exit();
            //  echo '<pre>' , var_dump($this->Query) , '</pre>';
            //  echo '<pre>' , var_dump($this->Dados) , '</pre>'; 
            
            // $arquivo = fopen('meuarquivo.txt','a+');
            // fwrite($arquivo, print_r($this->Query, TRUE));
            // fwrite($arquivo, print_r($this->Dados, TRUE));
            // fclose($arquivo);

        } catch (Exception $ex) {
            $this->Resultado = null;
        }
    }
    
    private function conexao()
    {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Query);
    }
}
