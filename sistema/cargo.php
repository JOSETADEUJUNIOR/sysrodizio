<?php require 'sysconecta.php'; ?>
<?php include_once('_head.php'); ?>

<body>
    <div id="wrapper">
        <?php include_once('_topo.php'); ?>
        <?php include_once('_menu.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <h2>Cadastro de cargo</h2>
                        <h5>Cadastre os cargos.</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <?php
                $linha['crgNome'] = "";
                if (isset($_GET['crgID'])) {
                    $crgID = $_GET['crgID'];
                    if (!$linha = aSQL(qSQLR("Select crgID, crgNome from cad_colaborador.cargo where crgID = $crgID"))) {
                    }
                }?>
                <form id="formCargo">
                    <input id="crgID" name="crgID" type="hidden" value="<?= $linha['crgID'] ?>">
                    <div class="col-md-12">
                        <div class="form-group" id="DivCrgNome">
                            <label>Nome Completo</label>
                            <input name="crgNome" id="crgNome" type="text" placeholder="Nome Completo" value="<?= $linha['crgNome'] ?>" class="form-control" onfocusout="SinalizaCampo('DivCrgNome','crgNome')">
                        </div>
                    </div>
                   
                   <div class="col-md-12">
                        <button type="submit" id="formCargo" name="formCargo" form="formCargo" class="btn btn-success col-md-6" onclick="return ValidarCargo()"><?= ($crgID == "" ? 'Cadastrar' : 'Salvar') ?></button>
                        <a href="listarCargo.php" class="btn btn-warning col-md-6">Voltar</a>
                    </div>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jQuery/jquery-3.5.1.min.js"></script>
    <script src="assets/js/validar.js"></script>
    <script>
        $('#formCargo').submit(function(e) {

            e.preventDefault();
            var c_crgID = $('#crgID').val();
            var c_crgNome = $('#crgNome').val();
            $.ajax({
                url: 'cargoAjax.php',
                method: 'POST',
                data: {
                    crgID: c_crgID,
                    crgNome: c_crgNome
                },
                dataType: 'json'
            }).done(function(result) {
                if (result == -1) {
                    Swal.fire({

                        icon: 'success',
                        title: 'Sucesso',
                        width: 'auto',
                        html: '<h3>Ação realizada com sucesso!</h3>',
                        showConfirmButton: false,
                        timer: 2000,
                    })
                } else {
                    Swal.fire({

                        icon: 'error',
                        title: 'Ops......',
                        width: 'auto',
                        html: '<h3>Erro ao realizar a ação, tente mais tarde!</h3>',
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    console.log(result);

                }
                $('#crgNome').val('');
               

            });

        });
    </script>

</body>