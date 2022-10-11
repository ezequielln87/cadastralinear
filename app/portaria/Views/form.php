<body class="text-center menuPrincipal text-black-50">
    <form class="form-signin rounded-lg" method="POST" action="">
        <div class="card-body">
            <div class="card text-left">
                <div class="card-header">
                    <div class=" font-weight-normal float-lg-center">
                        <h4>Formulário de cadastro de configuração Portaria Remota</h4>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <div class="form-group">
                        <label>Nome do Condomínio?</label>
                        <input maxlength="150" name="condominio" type="text" required="" class="form-control" placeholder="Digite o nome do condomínio" value="">
                    </div>
                    <div class="form-group">
                        <label>E-mail do instalador</label>
                        <input maxlength="150" name="email" type="email" required="" class="form-control" placeholder="Digite o nome do condomínio" value="">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Qual a marca do DVR?</label>
                            <input maxlength="150" name="dvrmarca" type="text" required="" class="form-control" placeholder="Digite a marca do DVR" value="">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Qual o modelo do DVR?</label>
                            <input maxlength="150" name="dvrmodelo" type="text" required="" class="form-control" placeholder="Digite a marca do DVR" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="item form-group col-md-6">
                            <label class="col-form-label label-align">O DVR está em DHCP?</label>
                            <div class=" col-md-12 col-sm-12 ">
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
                        <div class="item form-group col-md-6">
                            <label class="col-form-label label-align">Foi criado o usuário: <b class="text-danger"> stv </b> e senha: <b class="text-danger"> stv33581400 </b> no DVR?</label>
                            <div class=" col-md-12 col-sm-12 ">
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
                    </div>
                    <div class="row">
                        <div class="item form-group col-md-6">
                            <label class="col-form-label label-align">O Guarita IP está em DHCP?</label>
                            <div class="col-md-12 col-sm-12 ">
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
                        <div class="item form-group col-md-6">
                            <label class="col-form-label label-align">Foi alterada a senha do Guarita IP para <b class="text-danger">STVSEG</b> em maiúsculo?</label>
                            <div class="col-md-12 col-sm-12 ">
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
                    </div>
                    <h5>Quais os receptores Guarita IP?</h5>
                    <hr>
                    <h4>Equipamento 1</h4>
                    <div class="form-group">
                        <div class="card-header">
                            <label>Índice / Endereço</label>
                            <input type="text" name="device[1][indice]" class="form-control">
                            <label>Receptor</label>
                            <select class="form-control" id="multifuncao1" onchange="mudaReceptor(1)" name="device[1][receptor]">
                                <option selected disabled>Selecione</option>
                                <option value="Multifunção">MultiFunção</option>
                                <option value="CTW">CTW</option>
                                <option value="TX">TX</option>
                            </select>
                            <div id='tipo1'>
                                <label>Modo Operação</label>
                                <select class="form-control" name="device[1][modoOperacao]">
                                    <option selected disabled>Selecione</option>
                                    <option value="CTW">CTW</option>
                                    <option value="TX">TX</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Saída 1</label>
                                    <input name="device[1][saida1]" type="text" class="form-control" >
                                </div>
                                <div class="col-lg-6">
                                    <label>CAM. nº1</label>
                                    <input name="device[1][camera1]" type="text" class="form-control"  value="">
                                </div>
                                    <input name="device[1][nomerecurso1]" type="hidden" class="form-control" value="">
                                <div class="col-lg-6">
                                    <label>Saída 2</label>
                                    <input name="device[1][saida2]" type="text" class="form-control" >
                                </div>
                                <div class="col-lg-6">
                                    <label>CAM. nº2</label>
                                    <input name="device[1][camera2]" type="text" class="form-control" value="">
                                </div>           
                                    <input name="device[1][nomerecurso2]" type="hidden" class="form-control" value="">
                                <div class="col-lg-6">
                                    <label>Saída 3</label>
                                    <input name="device[1][saida3]" type="text" class="form-control" >
                                </div>
                                <div class="col-lg-6">
                                    <label>CAM. nº3</label>
                                    <input name="device[1][camera3]" type="text" class="form-control" value="">
                                </div>
                                    <input name="device[1][nomerecurso3]" type="hidden" class="form-control" value="">
                                <div class="col-lg-6">
                                    <label>Saída 4</label>
                                    <input name="device[1][saida4]" type="text" class="form-control" >
                                </div>
                                <div class="col-lg-6">
                                    <label>CAM. nº4</label>
                                    <input name="device[1][camera4]" type="text" class="form-control"  value="">
                                </div>
                                    <input name="device[1][nomerecurso4]" type="hidden" class="form-control"  value="">                             
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
                <input type="text" name="device[' + cont + '][indice]" class="form-control">\
                <label>Receptor</label>\
                <select class="form-control" id="multifuncao' + cont + '" onchange="mudaReceptor(' + cont + ')" name="device[' + cont + '][receptor]">\
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
                <div class="col-lg-6">\
                <label>Saída 1</label>\
                <input name="device[' + cont + '][saida1]" type="text"class="form-control">\
                </div>\
                <div class="col-lg-6">\
                <label>CAM. nº1</label>\
                <input name="device[' + cont + '][camera1]" type="text" class="form-control" value="">\
                </div>\
                <input name="device[' + cont + '][nomerecurso1]" type="hidden" class="form-control" value="">\
                <div class="col-lg-6">\
                <label>Saída 2</label>\
                <input name="device[' + cont + '][saida2]" type="text" class="form-control">\
                </div>\
                <div class="col-lg-6">\
                <label>CAM. nº2</label>\
                <input name="device[' + cont + '][camera2]" type="text" class="form-control" value="">\
                </div>\
                <input name="device[' + cont + '][nomerecurso2]" type="hidden" class="form-control" value="">\
                <div class="col-lg-6">\
                <label>Saída 3</label>\
                <input name="device[' + cont + '][saida3]" type="text" class="form-control">\
                </div>\
                <div class="col-lg-6">\
                <label>CAM. nº3</label>\
                <input name="device[' + cont + '][camera3]" type="text" class="form-control" value="">\
                </div>\
                <input name="device[' + cont + '][nomerecurso3]" type="hidden" class="form-control" value="">\
                <div class="col-lg-6">\
                <label>Saída 4</label>\
                <input name="device[' + cont + '][saida4]" type="text" class="form-control">\
                </div>\
                <div class="col-lg-6">\
                <label>CAM. nº4</label>\
                <input name="device[' + cont + '][camera4]" type="text" class="form-control" value="">\
                </div>\
                <input name="device[' + cont + '][nomerecurso4]" type="hidden" class="form-control" value="">\
                </div>\
                </div>\
                </div>\
                </div>');
            document.getElementById("tipo" + cont).style.display = 'none';
        });

        $('form').on('click', '.btn-apagar', function() {
            var button_id = $(this).attr("id");
            $('#campo' + button_id + '').remove();
        });
    </script>
</body>