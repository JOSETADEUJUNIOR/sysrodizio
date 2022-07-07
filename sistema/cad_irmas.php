<?php # Sistema de rodizio by Eduteu
require_once 'RodizioDAO.php';
$dao = new RodizioDAO();


if (isset($_GET['cod'])) {
    $IrmID = $_GET['cod'];
    $dados = $dao->DetalhaIrma($IrmID);
}

if (isset($_POST['btnSalvar'])) {
    $dao = new RodizioDAO();
    $IrmID = trim($_POST['IrmID']);
    $IrmaNome = trim($_POST['IrmNome']);
    $ret = $dao->CadastrarIrma($IrmID, $IrmaNome);
    
}
$irmas = $dao->RetornaIrmas();

?>
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

                        <h2>Cadastre as organistas</h2>


                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <form id="formCargo" action="cad_irmas.php" method="post">
                        <input type="hidden" value="<?= $dados[0]['IrmID'] ?>" name="IrmID">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nome Completo</label>
                                <input name="IrmNome" id="IrmNome" type="text" placeholder="Nome Completo" value="<?= $dados[0]['IrmNome']?>" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" id="btnSalvar" name="btnSalvar" class="btn btn-success col-md-6">Salvar</button>
                            <a href="#" class="btn btn-warning col-md-6">Voltar</a>
                        </div>
                    </form>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                irmas cadastradas
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($irmas as $Irm) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $Irm['IrmNome'] ?></td>
                                                    <td style="padding: 3px 1px 3px 3px;">
                                                        <a href="cad_irmas.php?cod=<?= $Irm['IrmID'] ?>"><i title="Alterar Irma" style=" color:#c09046; font-size:18px;margin-left:20px; margin-right:5px" class="fa fa-pencil"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $cat['id_categoria'] ?>"><i title="Excluir Categoria" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>

                </div>
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

</body>