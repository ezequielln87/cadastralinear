<?php
function Enviar()
{
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (isset($dados)) {
        unset($dados['SendLogin']);
        echo '<pre>', var_dump($dados), '</pre>';
        $_SESSION['msg'] = "<div class='alert alert-success'>Obrigado, formulário enviado com sucesso</div>";
        exit();
        return $dados;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Formulário de cadastro de configuração do situator">
    <meta name="author" content="Ezequiel Leal Nascimento">
    <!-- <link rel="icon" href="imagens/icone/favicon.png"> -->
    <title>Form</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="fonts/css.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/personalizado.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!-- <link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <script src="js/jquery.min.js"></script>
    <!-- <script src="js/jquery-3.2.1.slim.min.js"></script> -->
    <!-- <script src="<?php //echo URLADM; 
                        ?>js/popper.min.js"></script>  -->

    <script src="js/scrollreveal.min.js"></script>

    <script>
        window.onload = function() {
            document.getElementById("tipo1").style.display = 'none';
        };
    </script>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="js/jquery.min.js"></script> -->

</head>

<body class="text-center menuPrincipal text-black-50">
    <form class="form-signin rounded-lg" method="POST" action="">
        <div class="card-body">
            <div class="card text-left">
                <div class="card-header">
                    <div class=" font-weight-normal float-lg-center">
                        <h4>Formulário de cadastro de configuração Portaria Remota</h4>
                    </div>
                    <!-- <img class="mb-4" src="<?php //echo URLADM . 'imagens/logo.png'; 
                                                ?>" alt="STV Segurança" width="150" > -->
                </div>

                <div class="card-body">

                    <?php

                    $dados = enviar();

                    require 'phpmailer/PHPMailerAutoload.php';
                    $mail = new PHPMailer();
                    $mail->setLanguage('pt');

                    $from = 'no-reply@stv.com.br';
                    $fromName = 'Enviado pelo formulário de Configurações da Portaria Remota';
                    $host = '192.168.0.49';
                    $username = '';
                    $password = '';
                    $port = 25;
                    $secure = '';

                    $mail->isSMTP();
                    $mail->Host = $host;
                    $mail->SMTPAuth = false;
                    $mail->Username = $username;
                    $mail->Password = $password;
                    $mail->Port = $port;
                    $mail->SMTPSecure = $secure;

                    $mail->From = $from;
                    $mail->FromName = $fromName;
                    $mail->addReplyTo($from, $fromName);

                    $mail->addAddress('thiago.ferraz@stv.com.br', 'Teste');

                    $mail->isHTML(true);
                    $mail->CharSet = 'utf-8';
                    $mail->WordWrap = 70;

                    $mail->Subject = 'Enviando E-mail PHP Mailer';
                    // $mail->Body ="teste";
                    $mail->AltBody = '';

                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    // echo '<pre>', var_dump($dados), '</pre>'; 


                    if (isset($dados)) {
                        $mail->Body .= "<h4>Condomínio: " . $dados['condominio'] . " </h4>
                                        E-mail do instalador: " . $dados['email'] . " <br>
                                        DVR está em DHCP: " . $dados['dvrdhcp'] . " <br>
                                        Usuário stv: " . $dados['usuariocriado'] . " <br>
                                        Guarita IP está em DHCP: " . $dados['guaritaipdhcp'] . " <br><br>";


                        $i = 0;
                        $a = 0;
                        while ($i <= $a) {

                            $mail->Body .= "Receptor $i " . $dados['receptor'][$i] . " | 
                                Índice  " . $dados['indice'][$i] . " | 
                                Saída  " . $dados['indice'][$i] . " | 
                                Nome Recurso  " . $dados['nomerecurso'][$i] . " <br>";
                            $i++;
                            if (!empty($dados['receptor'][$i])) {
                                $a++;
                            }
                        }


                        $send = $mail->Send();

                        if ($send)
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                                echo $mail->Body;
                            } else
                                echo 'Erro:' . $mail->ErrorInfo;
                        exit();
                    }


                    ?>
                    <div class="form-group">
                        <label>Nome do Condomínio?</label>
                        <input name="condominio" type="text" required="" class="form-control" placeholder="Digite o nome do condomínio" value="">
                    </div>

                    <div class="form-group">
                        <label>E-mail do instalador</label>
                        <input name="email" type="email" required="" class="form-control" placeholder="Digite o nome do condomínio" value="">
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label label-align">O DVR está em DHCP?</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div id="dvrdhcp" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="dvrdhcp" required="" value="Sim" class="join-btn"> &nbsp; Sim &nbsp;
                                </label>
                                <label class="btn btn-dark" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="dvrdhcp" required="" value="Não" class="join-btn"> Não
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label label-align">Foi criado o usuário: <b> stv </b> e senha: <b> stv33581400 </b> no DVR?</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div id="usuariocriado" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="usuariocriado" required="" value="Sim" class="join-btn"> &nbsp; Sim &nbsp;
                                </label>
                                <label class="btn btn-dark" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="usuariocriado" required="" value="Não" class="join-btn"> Não
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="item form-group">
                        <label class="col-form-label label-align">O Guarita IP está em DHCP?</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div id="guaritaipdhcp" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="guaritaipdhcp" required="" value="Sim" class="join-btn"> &nbsp; Sim &nbsp;
                                </label>
                                <label class="btn btn-dark" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="guaritaipdhcp" required="" value="Não" class="join-btn"> Não
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label label-align">Foi alterada a senha do Guarita IP para <b>STVSEG</b> em maiúsculo?</label>
                        <div class="col-md-6 col-sm-6 ">
                            <div id="senhaguaritaip" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="senhaguaritaip" required="" value="Sim" class="join-btn"> &nbsp; Sim &nbsp;
                                </label>
                                <label class="btn btn-dark" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="senhaguaritaip" required="" value="Não" class="join-btn"> Não
                                </label>
                            </div>
                        </div>
                    </div>

                    <h5>Quais os receptores Guarita IP?</h5>
                    <hr>
                    <h4>Equipamento 1</h4>
                    <div class="form-group">
                        <div class="card-header">
                            <label>Índice</label>
                            <input type="text" name="device[1][indice]" class="form-control" placeholder="Digite o índice">
                            <label>Receptor</label>
                            <select class="form-control" id="multifuncao1" onchange="mudaReceptor(1)" name="device[1][receptor1]">
                                <option selected disabled>Selecione</option>
                                <option value="Multifunção">MultiFunção</option>
                                <option value="CTW">CTW</option>
                                <option value="TX">TX</option>

                            </select>
                            <div id='tipo1'>
                                <label>Modo Operação</label>
                                <select class="form-control" name="device[1][modoOperacao1]">
                                    <option selected disabled>Selecione</option>
                                    <option value="CTW">CTW</option>
                                    <option value="TX">TX</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Saída 1</label>
                                    <input name="device[1][saida1]" type="text" class="form-control" placeholder="Saída 1">
                                </div>
                                <div class="col-lg-4">
                                    <label>CAM. nº1</label>
                                    <input name="device[1][camera1]" type="text" class="form-control" placeholder="Câmera 1" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label>Nome do Recurso?</label>
                                    <input name="device[1][nomecurso1]" type="text" class="form-control" placeholder="Digite o nome do recurso" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label>Saída 2</label>
                                    <input name="device[1][saida2]" type="text" class="form-control" placeholder="Saída 2">
                                </div>
                                <div class="col-lg-4">
                                    <label>CAM. nº2</label>
                                    <input name="device[1][camera2]" type="text" class="form-control" placeholder="Câmera 2" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label>Nome do Recurso?</label>
                                    <input name="device[1][nomerecurso2]" type="text" class="form-control" placeholder="Digite o nome do recurso" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label>Saída 3</label>
                                    <input name="device[1][saida3]" type="text" class="form-control" placeholder="Saída 3">
                                </div>
                                <div class="col-lg-4">
                                    <label>CAM. nº3</label>
                                    <input name="device[1][camera3]" type="text" class="form-control" placeholder="Câmera 3" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label>Nome do Recurso?</label>
                                    <input name="device[1][nomerecurso3]" type="text" class="form-control" placeholder="Digite o nome do recurso" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label>Saída 4</label>
                                    <input name="device[1][saida4]" type="text" class="form-control" placeholder="Saída 4">
                                </div>
                                <div class="col-lg-4">
                                    <label>CAM. nº4</label>
                                    <input name="device[1][camera4]" type="text" class="form-control" placeholder="Câmera 4" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label>Nome do Recurso?</label>
                                    <input name="device[1][nomerecurso4]" type="text" class="form-control" placeholder="Digite o nome do recurso" value="">
                                </div>
                            </div>
                        </div>



                    </div>

                    <div id="formulario"></div>
                    <div class="text-right">
                        <button type="button" class="btn btn-success" id="add-campo"> <i class="far fa-arrow-alt-circle-right"></i> Adicionar Receptor</button>
                    </div>
                </div>
                <div class="card-footer">
                    <button name="SendLogin" type="submit" class="btn btn-secondary"><i class="fa fa-share"></i> Enviar Configurações</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function mudaReceptor(id) {
            var value = document.getElementById("multifuncao" + id).value;
            if (value == 'Multifunção') {
                console.log('exibe modo de operação');
                $('modoOperacao' + id).attr('required', 1);
                document.getElementById("tipo" + id).style.display = 'block';
            } else {
                console.log('não exibe modo');
                $('modoOperacao' + id).attr('required', 0);
                document.getElementById("tipo" + id).style.display = 'none';
            }
            // console.log(value); // pt
        }
        var cont = 1;
        $("#add-campo").click(function() {
            cont++;

            // $("#formulario").append('<div class="form-group" id="campo' + cont + '"><div class="row border rounded resultadoFechado"><div class="col"><div class="form-group"><h5>Receptor ' + cont + '</h5><p><input type="radio" name="receptor[' + cont + ']" value="Multifunção TX"> Multifunção TX <br><input type="radio" name="receptor[' + cont + ']" value="Multifunção CTW"> Multifunção CTW<br><input type="radio" name="receptor[' + cont + ']" value="CTW"> CTW <br> <input type="radio" name="receptor[' + cont + ']" value="TX"> TX </p></div></div><div class="col"><div class="form-group"><h5>Índice</h5><p><input type="radio" name="indice[' + cont + ']" value="1"> 1<br><input type="radio" name="indice[' + cont + ']" value="2"> 2<br><input type="radio" name="indice[' + cont + ']" value="3"> 3<br><input type="radio" name="indice[' + cont + ']" value="4"> 4<br><input type="radio" name="indice[' + cont + ']" value="5"> 5</p></div></div><div class="col"><div class="form-group"><h5>Saída</h5><p><input type="radio" name="saida[' + cont + ']" value="1"> 1<br><input type="radio" name="saida[' + cont + ']" value="2"> 2<br><input type="radio" name="saida[' + cont + ']" value="3"> 3<br><input type="radio" name="saida[' + cont + ']" value="4"> 4</p></div></div><div class="col"><div class="form-group"><label>Nome do Recurso?</label><input name="nomerecurso" type="text" class="form-control" placeholder="Digite o nome do recurso" value=""> </div><div class="form-group"><label>Qual Câmera?</label><input name="camera" type="text" class="form-control" placeholder="Digite o nome para identificação da câmera" value=""> </div></div><div class="text-right"><button type="button" id="' + cont + '" class="btn-apagar"> x </button></div></div></div>');
            $("#formulario").append('\
                <div id="campo' + cont + '">\
                <hr>\
                <div class="row">\
                <div class="col-lg-10">\
                <h4>Equipamento ' + cont + '</h4>\
                </div>\
                <div class="col-lg-2 align-right">\
                <div class="text-right"><button type="button" id="' + cont + '" class="btn-apagar btn btn-danger"><i class="fas fa-trash"></i></button></div>\
                </div>\
                <div class="form-group">\
                <div class="card-header">\
                <label>Índice</label>\
                <input type="text" name="device[' + cont + '][indice]" class="form-control" placeholder="Digite o indice">\
                <label>Receptor</label>\
                <select class="form-control" id="multifuncao' + cont + '" onchange="mudaReceptor(' + cont + ')" name="device[' + cont + '][receptor' + cont + ']">\
                <option value="" selected disabled>Selecione</option>\
                <option value="Multifunção">MultiFunção</option>\
                <option value="CTW">CTW</option>\
                <option value="TX">TX</option>\
                </select>\
                <div id="tipo' + cont + '">\
                <label>Modo Operação</label>\
                <select class="form-control" name="device[' + cont + '][modoOperacao]">\
                <option selected disabled>Selecione</option>\
                <option value="CTW">CTW</option>\
                <option value="TX">TX</option>\
                </select>\
                </div>\
                <div class="row">\
                <div class="col-lg-4">\
                <label>Saída 1</label>\
                <input name="device[' + cont + '][saida1]" type="text"class="form-control" placeholder="Saída 1">\
                </div>\
                <div class="col-lg-4">\
                <label>CAM. nº1</label>\
                <input name="device[' + cont + '][camera1]" type="text" class="form-control" placeholder="Câmera 1" value="">\
                </div>\
                <div class="col-lg-4">\
                <label>Nome do Recurso?</label>\
                <input name="device[' + cont + '][nomerecurso1]" type="text" class="form-control" placeholder="Digite o nome do recurso" value="">\
                </div>\
                <div class="col-lg-4">\
                <label>Saída 2</label>\
                <input name="device[' + cont + '][saida2]" type="text" class="form-control" placeholder="Saída 2">\
                </div>\
                <div class="col-lg-4">\
                <label>CAM. nº2</label>\
                <input name="device[' + cont + '][camera2]" type="text" class="form-control" placeholder="Câmera 2" value="">\
                </div>\
                <div class="col-lg-4">\
                <label>Nome do Recurso?</label>\
                <input name="device[' + cont + '][nomerecurso2]" type="text" class="form-control" placeholder="Digite o nome do recurso" value="">\
                </div>\
                <div class="col-lg-4">\
                <label>Saída 3</label>\
                <input name="device[' + cont + '][saida3]" type="text" class="form-control" placeholder="Saída 3">\
                </div>\
                <div class="col-lg-4">\
                <label>CAM. nº3</label>\
                <input name="device[' + cont + '][camera3]" type="text" class="form-control" placeholder="Câmera 3" value="">\
                </div>\
                <div class="col-lg-4">\
                <label>Nome do Recurso?</label>\
                <input name="device[' + cont + '][nomerecurso3]" type="text" class="form-control" placeholder="Digite o nome do recurso" value="">\
                </div>\
                <div class="col-lg-4">\
                <label>Saída 4</label>\
                <input name="device[' + cont + '][saida4]" type="text" class="form-control" placeholder="Saída 4">\
                </div>\
                <div class="col-lg-4">\
                <label>CAM. nº4</label>\
                <input name="device[' + cont + '][camera4]" type="text" class="form-control" placeholder="Câmera 4" value="">\
                </div>\
                <div class="col-lg-4">\
                <label>Nome do Recurso?</label>\
                <input name="device[' + cont + '][nomerecurso4]" type="text" class="form-control" placeholder="Digite o nome do recurso" value="">\
                </div>\
                </div>\
                </div>\
                </div>\
                </div>');
            document.getElementById("tipo" + id).style.display = 'none';
        });

        $('form').on('click', '.btn-apagar', function() {
            var button_id = $(this).attr("id");
            $('#campo' + button_id + '').remove();
        });
    </script>
</body>

</html>