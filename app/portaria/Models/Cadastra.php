<?php

namespace App\portaria\Models;

require_once './app/portaria/Models/helper/AdmsCreate.php';
require_once './app/portaria/Models/helper/AdmsPhpMailer.php';

class Cadastra
{
    private $result;
    private $dados;
    private array $cliente;
    private $idCliente;
    private array $dadosMail;
    private array $DadosEmail;


    function getResultado()
    {
        return $this->result;
    }

    public function cadastra(array $dados)
    {
        $this->dados = $dados;

        $this->preparaArray();
    }

    private function preparaArray()
    {
        $this->cliente['condominio'] = $this->dados['condominio'];
        $this->cliente['email'] = $this->dados['email'];
        $this->cliente['dvrdhcp'] = $this->dados['dvrdhcp'];
        $this->cliente['dvrmarca'] = $this->dados['dvrmarca'];
        $this->cliente['dvrmodelo'] = $this->dados['dvrmodelo'];
        $this->cliente['usuariocriado'] = $this->dados['usuariocriado'];
        $this->cliente['guaritaipdhcp'] = $this->dados['guaritaipdhcp'];
        $this->cliente['senhaguaritaip'] = $this->dados['senhaguaritaip'];
        unset($this->dados['condominio'], $this->dados['email'], $this->dados['dvrdhcp'], $this->dados['usuariocriado'], $this->dados['guaritaipdhcp'], $this->dados['senhaguaritaip'],  $this->dados['dvrmarca'], $this->dados['dvrmodelo']);

        $this->dadosMail = $this->dados;
        $this->cadastraCliente();
    }

    private function cadastraCliente()
    {
        $cadSit = new \App\portaria\Models\helper\AdmsCreate;
        $cadSit->exeCreate('cliente', $this->cliente);
        if ($cadSit->getResultado()) {
            $this->idCliente = $cadSit->getResultado();
            $this->result = true;
            $this->cadastraDevices();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A tabela não foi cadastrada!</div>";
            $this->result = false;
        }
    }
    private function cadastraDevices()
    {
        for ($i = 1; isset($this->dados['device'][$i]); $i++) {
            $this->dados['device'][$i]['fk_cliente_ID'] = $this->idCliente;
            $cadDevice = new \App\portaria\Models\helper\AdmsCreate;
            $cadDevice->exeCreate('devices', $this->dados['device'][$i]);
            if ($cadDevice->getResultado()) {
                $this->dadosEmail();
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Ao cadastrar dispositivo(s), favor contatar o administrador!</div>";
                $this->result = false;
                break;
            }
        }
    }

    private function dadosEmail()
    {

        $this->DadosEmail['dest_nome'] = '';
        $this->DadosEmail['dest_email'] = EMAILSEND;

        $this->DadosEmail['dest_nome2'] = '';
        $this->DadosEmail['dest_email2'] = $this->cliente['email'];

        $this->DadosEmail['titulo_email'] = "Novo condomínio Linear cadastrado";

        $this->DadosEmail['cont_email'] = "<h4>Condomínio: " . $this->cliente['condominio'] . " </h4>";
        $this->DadosEmail['cont_email'] .= "E-mail do instalador: " . $this->cliente['email'] . " <br>";
        $this->DadosEmail['cont_email'] .= "A marca do DVR é: " . $this->cliente['dvrmarca'] . " <br>";
        $this->DadosEmail['cont_email'] .= "O modelo do DVR é: " . $this->cliente['dvrmodelo'] . " <br>";
        $this->DadosEmail['cont_email'] .= "DVR está em DHCP: " . $this->cliente['dvrdhcp'] . " <br>";
        $this->DadosEmail['cont_email'] .= "Usuário Guarita IP stv: " . $this->cliente['usuariocriado'] . " <br>";
        $this->DadosEmail['cont_email'] .= "Senha Guarita IP STV: " . $this->cliente['senhaguaritaip'] . " <br>";
        $this->DadosEmail['cont_email'] .= "Guarita IP está em DHCP: " . $this->cliente['guaritaipdhcp'] . " <br><br>";

       
        for ($i = 1; isset($this->dadosMail['device'][$i]); $i++) {
            $this->DadosEmail['cont_email'] .= "Índice " . $this->dadosMail['device'][$i]['indice'] . " <br>";
            $this->DadosEmail['cont_email'] .= "Receptor " . $this->dadosMail['device'][$i]['receptor'] . " <br>";
            if (isset($this->dadosMail['device'][$i]['modoOperacao'])) {
                $this->DadosEmail['cont_email'] .= "Modo Operação " . $this->dadosMail['device'][$i]['modoOperacao'] . " <br>";
            }
            if (!empty($this->dadosMail['device'][$i]['saida1'])) {
                $this->DadosEmail['cont_email'] .= "Saída 1 " . $this->dadosMail['device'][$i]['saida1'] . " <br>";
            }
            if (!empty($this->dadosMail['device'][$i]['camera1'])) {
                $this->DadosEmail['cont_email'] .= "Câmera 1 " . $this->dadosMail['device'][$i]['camera1'] . " <br>";
            }
            if (!empty($this->dadosMail['device'][$i]['nomerecurso1'])) {
                $this->DadosEmail['cont_email'] .= "Nome do Recurso 1 " . $this->dadosMail['device'][$i]['nomerecurso1'] . " <br>";
            }
            if (!empty($this->dadosMail['device'][$i]['saida2'])) {
                $this->DadosEmail['cont_email'] .= "Saída 2 " . $this->dadosMail['device'][$i]['saida2'] . " <br>";
            }
            if (!empty($this->dadosMail['device'][$i]['camera2'])) {
                $this->DadosEmail['cont_email'] .= "Câmera 2 " . $this->dadosMail['device'][$i]['camera2'] . " <br>";
            }
            if (!empty($this->dadosMail['device'][$i]['nomerecurso2'])) {
                $this->DadosEmail['cont_email'] .= "Nome do Recurso 2 " . $this->dadosMail['device'][$i]['nomerecurso2'] . " <br>";
            }

            if (!empty($this->dadosMail['device'][$i]['saida3'])) {
                $this->DadosEmail['cont_email'] .= "Saída 3 " . $this->dadosMail['device'][$i]['saida3'] . " <br>";
            }

            if (!empty($this->dadosMail['device'][$i]['camera3'])) {
                $this->DadosEmail['cont_email'] .= "Câmera 3 " . $this->dadosMail['device'][$i]['camera3'] . " <br>";
            }

            if (!empty($this->dadosMail['device'][$i]['nomerecurso3'])) {
                $this->DadosEmail['cont_email'] .= "Nome do Recurso 3 " . $this->dadosMail['device'][$i]['nomerecurso3'] . " <br>";
            }

            if (!empty($this->dadosMail['device'][$i]['saida4'])) {
                $this->DadosEmail['cont_email'] .= "Saída 4 " . $this->dadosMail['device'][$i]['saida4'] . " <br>";
            }
            if (!empty($this->dadosMail['device'][$i]['camera4'])) {
                $this->DadosEmail['cont_email'] .= "Câmera 4 " . $this->dadosMail['device'][$i]['camera4'] . " <br>";
            }
            if (!empty($this->dadosMail['device'][$i]['nomerecurso4'])) {
                $this->DadosEmail['cont_email'] .= "Nome do Recurso 4 " . $this->dadosMail['device'][$i]['nomerecurso4'] . " <br><br>";
            }
        }

        $this->DadosEmail['cont_text_email'] = "Condomínio: " . $this->cliente['condominio'].", ";
        $this->DadosEmail['cont_text_email'] .= "E-mail do instalador: " . $this->cliente['email'].", ";
        $this->DadosEmail['cont_text_email'] .= "A marca do DVR é: " . $this->cliente['dvrmarca'].", ";
        $this->DadosEmail['cont_text_email'] .= "O modelo do DVR é: " . $this->cliente['dvrmodelo'].", ";
        $this->DadosEmail['cont_text_email'] .= "DVR está em DHCP: " . $this->cliente['dvrdhcp'].", ";
        $this->DadosEmail['cont_text_email'] .= "Usuário Guarita IP stv: " . $this->cliente['usuariocriado'].", ";
        $this->DadosEmail['cont_text_email'] .= "Guarita IP está em DHCP: " . $this->cliente['guaritaipdhcp'];

      

        $emailPHPMailer = new \App\portaria\Models\helper\AdmsPhpMailer;
        $emailPHPMailer->emailPhpMailer($this->DadosEmail);

        if ($emailPHPMailer->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Cadastrado " . $this->cliente['condominio'] . " com sucesso!</div>";
            // $_SESSION['msg'] = "<div class='alert alert-success'>Condomínio cadastrado com sucesso.!</div>";
            $this->result = true;
            header('Location: ./');
        } else {
            $_SESSION['msg'] = "<div class='alert alert-primary'>Condomínio cadastrado com sucesso. Erro: Não foi possivel enviar notificação por e-mail!</div>";
            $this->result = false;
            header('Location: ./');
        }
    }
}
