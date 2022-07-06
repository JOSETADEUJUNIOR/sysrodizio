<?php
require_once 'RodizioDAO.php';
$dao = new RodizioDAO();
$m = getCOD(addslashes(preg_replace("/[^0-9]/", "", ($_POST['mes'] ?? 0))));; # Mes que deseja gerar o Rodízio
$IDUltimaIrma = getCOD(addslashes(preg_replace("/[^0-9]/", "", ($_POST['UltimoID'] ?? 0)))); # ID da ultima irmã que tocou no mes passado

$irmas = $dao->RetornaIrmas();
var_dump($irmas);

$arraIrmas = 

for ($i=0; $i<count($irmas); $i++ ) {

    $arrIrmas[] = $irmas[$i]['IrmID'].'-'.$irmas[$i]['IrmNome'];
}

$arrDiasSemana = array(
    1 => "Segunda-feira",
    2 => "Terça-feira",
    3 => "Quarta-feira",
    4 => "Quinta-feira",
    5 => "Sexta-feira",
    6 => "Sábado",
    7 => "Domingo",
);

function getProximaIrma($ultimaIrma)
{
    global $arrIrmas;
    if ($ultimaIrma > 0) {
        if (array_key_exists(($ultimaIrma + 1), $arrIrmas)) {
            return ($ultimaIrma + 1);
        }
    }
    return 1;
}

function checkDiaDeCulto($n, $arrPerm = array(4, 6, 7))
{
    # 1 = Segunda feira 
    # 2 = Terça feira
    # 3 = Quarta feira
    # 4 = Quinta feira
    # 5 = Sexta feira
    # 6 = Sábado
    # 7 = Domingo
    if (in_array($n, $arrPerm)) return true;
    return false;
}

function getCOD($cod)
{
    return str_pad($cod, 2, "0", STR_PAD_LEFT);
}





























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

                        <h2>Gerar Rodizio</h2>
                        <form id="formCargo" action="index.php" method="post">
                            <input type="hidden" value="<?= $dados[0]['IrmID'] ?>" name="IrmID">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Digite o Mês</label>
                                    <input name="mes" id="mes" type="text" placeholder="Digite o Mês" value="<?= $dados[0]['IrmNome'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Informar Ultimo ID de Irma</label>
                                    <input name="UltimoID" id="UltimoID" type="text" placeholder="Ultimo ID" value="<?= $dados[0]['IrmNome'] ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" id="CarregaRodizio" name="CarregaRodizio" class="btn btn-info col-md-12">Carregar Rodízio</button>
                            </div>
                        </form>

                    </div>
                </div>

                <hr />

                <div class="col-md-12">
                    <!--    Context Classes  -->
                    <div class="panel panel-info">

                        <div class="panel-heading">
                            Rodízio do Mês de :
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Dia</th>
                                            <th>Dia da Semana</th>
                                            <th>Organista</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        function percorreMes($m, $ultimaIrma = 0)
                                        {
                                            global $arrIrmas, $arrDiasSemana;
                                            if ($m >= 0 && $m <= 12) { # Mês precisa ser válido
                                                $diaIni = "01";
                                                $diaFim = date("t", strtotime(date("Y-$m-$diaIni")));
                                                for ($i = $diaIni; $i <= $diaFim; $i++) { # Percorrendo os dias do Mês selecionado
                                                    $n = date("N", strtotime(date("Y-$m-" . getCOD($i)))); # Dia da semana
                                                    if (checkDiaDeCulto($n)) { # Confirma se o dia tem culto
                                                        $ultimaIrma = getProximaIrma($ultimaIrma);


                                        ?>


                                                        <tr class="default">
                                                            <td><?= getCOD($i) . "/$m/" . date("Y") ?></td>
                                                            <td><?= $arrDiasSemana[$n] ?></td>
                                                            <td><?= $arrIrmas[$ultimaIrma] ?></td>
                                                        </tr>

                                        <?php
                                                    }
                                                }
                                            }
                                        }

                                        percorreMes($m, $IDUltimaIrma);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
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