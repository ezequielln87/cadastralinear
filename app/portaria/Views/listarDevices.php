<body class="text-center menuPrincipal text-black-50">

    <div class="card-body">
        <div class="card-header text-left">
            <div class=" font-weight-normal float-lg-center">
                <h4> Listar Dispositivo</h4>
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
            <dl>
                <dt>
                    <h3><?= $this->dados['devices'][0]['condominio'] ?></h3>
                </dt>
                <dd></dd>
            </dl>
            <div class="table-responsive">
                <table class="table datatable table-striped table-hover table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Indice</th>
                            <th>Receptor</th>
                            <th>Modo Operação</th>
                            <th>Saída 1</th>
                            <th>Câmera 1</th>
                            <th>Nome Recurso 1</th>
                            <th>Saída 2</th>
                            <th>Câmera 2</th>
                            <th>Nome Recurso 2</th>
                            <th>Saída 3</th>
                            <th>Câmera 3</th>
                            <th>Nome Recurso 3</th>
                            <th>Saída 4</th>
                            <th>Câmera 4</th>
                            <th>Nome Recurso 4</th>
                            <th>Cadastrado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (empty($this->dados['devices'])) {
                            echo "<div class='alert alert-info'>Nenhum resultado, utilize o filtro acima para gerar um relatório.</div>";
                            exit();
                        }
                        foreach ($this->dados['devices'] as $linha) {
                            extract($linha);

                        ?>
                            <tr>
                                <td><?= $indice ?></td>
                                <td><?= $receptor ?></td>
                                <td><?= $modoOperacao ?></td>
                                <td><?= $saida1 ?></td>
                                <td><?= $camera1 ?></td>
                                <td><?= $nomerecurso1 ?></td>
                                <td><?= $saida2 ?></td>
                                <td><?= $camera2 ?></td>
                                <td><?= $nomerecurso2 ?></td>
                                <td><?= $saida3 ?></td>
                                <td><?= $camera3 ?></td>
                                <td><?= $nomerecurso3 ?></td>
                                <td><?= $saida4 ?></td>
                                <td><?= $camera4 ?></td>
                                <td><?= $nomerecurso4 ?></td>

                                <td>
                                    <?php
                                    $date = new DateTime($created);
                                    echo $date->format('d/m/Y H:i:s') . "\n";
                                    ?>
                                </td>
                                <td>
                                    <i class="fas fa-eye"></i>
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