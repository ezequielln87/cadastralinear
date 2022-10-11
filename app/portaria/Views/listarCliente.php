<body class="text-center menuPrincipal text-black-50">

    <div class="card-body">
        <div class="card-header text-left">
            <div class=" font-weight-normal float-lg-center">
                <h4> Listar Clientes</h4>
            </div>
        </div>

        <!-- <script type="text/javascript" src="assets/js/ckeditor_menor/ckeditor.js"></script> -->
        <!-- PDF software proprietário -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="js/datatables/vfs_fonts.js"></script>
        <script type="text/javascript" src="js/datatables/datatables.min.js"></script>

        <div class="list-group-item">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <div class="table-responsive">
                <table class="table datatable table-striped table-hover table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Condomínio</th>
                            <th>E-mail</th>
                            <th>DVR Marca</th>
                            <th>DVR Modelo</th>
                            <th>DVR DHCP</th>
                            <th>Usuário Criado</th>
                            <th>Guarita IP DHCP</th>
                            <th>Senha Guarita IP</th>
                            <th>Cadastrado</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($this->dados['list'])) {
                            echo "<div class='alert alert-info'>Nenhum resultado, utilize o filtro acima para gerar um relatório.</div>";
                            exit();
                        }
                        foreach ($this->dados['list'] as $linha) {
                            extract($linha);
                        ?>
                            <tr>
                                <td>
                                    <?=$condominio?>
                                </td>
                                <td>
                                    <?=$email?>
                                </td>
                                <td>
                                    <?=$dvrmarca?>
                                </td>
                                <td>
                                    <?=$dvrmodelo?>
                                </td>
                                <td>
                                    <?=$dvrdhcp?>
                                </td>
                                <td>
                                    <?=$usuariocriado?>
                                </td>
                                <td>
                                    <?=$guaritaipdhcp?>
                                </td>
                                <td>
                                    <?=$senhaguaritaip?>
                                </td>
                                <td>
                                    <?php
                                    $date = new DateTime($created);
                                    echo $date->format('d/m/Y H:i:s') . "\n";
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary btn-sm" href="?id=<?=$id?>"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            //  $.fn.dataTable.ext.classes.sPageButton = 'button primary_button';
            $('#myTable').DataTable({
                "processing": true,
                "lengthMenu": [
                    [25, 50, -1],
                    [25, 50, "Todos"]
                ],
                "columnDefs": [{
                    "searchable": true,
                    "orderable": true,
                    "targets": 0,
                }],


                "order": [
                    [0, 'desc']
                ],
                "language": {
                    "lengthMenu": "Exibir _MENU_ resultados por página",
                    "zeroRecords": "Não funcionou - tente novamente.",
                },
                "oLanguage": {

                    "lengthMenu": "Exibir _MENU_ resultados por página",
                    "sInfo": "Exibindo página _START_ de _END_ de um total de _TOTAL_ registros",
                    "sInfoEmpty": "Tabela vazia",
                    "sSearch": "Pesquisar",
                    "sInfoFiltered": "",
                    "oPaginate": {
                        "sLast": "Último",
                        "sFirst": "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",

                    }
                },

                dom: 'Brtip',
                // dom: 'Bfrtip',
                buttons: [

                    {
                        extend: 'copy',
                        "className": 'btn border-left-success shadow btn-light',
                    },
                    {
                        extend: 'excel',
                        "className": 'btn  shadow  btn-light',
                    },
                    {
                        extend: 'pdf',
                        "className": 'btn  shadow  btn-light',
                    },
                    {
                        extend: 'print',
                        "className": 'btn border-right-success shadow  btn-light',
                    }

                ]


            });

            $('#myTable thead th').each(function() {
                var title = $('#myTable thead th').eq($(this).index()).text();
                $(this).html('<input class="form-control input-sm" type="text" placeholder="' + title + '" />');
            });

            // DataTable
            var table = $('#myTable').DataTable();

            // Apply the search
            table.columns().eq(0).each(function(colIdx) {
                $('input', table.column(colIdx).header()).on('keyup change', function() {
                    table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
                });

            });

        });
    </script>
    </div>
</body>