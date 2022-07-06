<?php # Sistema de rodizio by Eduteu
$m = getCOD(addslashes(preg_replace("/[^0-9]/", "", ($argv[1] ?? 0)))); # Mes que deseja gerar o Rodízio
$IDUltimaIrma = getCOD(addslashes(preg_replace("/[^0-9]/", "", ($argv[2] ?? 0)))); # ID da ultima irmã que tocou no mes passado

$arrIrmas = array(
    1 => 'Cleide',
    2 => 'Josefa',
    3 => 'Rute',
    4 => 'Josefina',
    5 => 'Pedruca',
    6 => 'Pedrosa',
    7 => 'Pedrera',
    8 => 'Filó',
    9 => 'Filé',
    10 => 'Perdida'
);

$arrDiasSemana = array(
    1 => "Segunda-feira",
    2 => "Terça-feira",
    3 => "Quarta-feira",
    4 => "Quinta-feira",
    5 => "Sexta-feira",
    6 => "Sábado",
    7 => "Domingo",
);


percorreMes($m, $IDUltimaIrma);




function getProximaIrma($ultimaIrma){ Global $arrIrmas;
    if ($ultimaIrma > 0){
        if (array_key_exists(($ultimaIrma+1), $arrIrmas)){
            return ($ultimaIrma+1);
        }
    } return 1;
}

function checkDiaDeCulto($n, $arrPerm = array(4,6,7)){
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

function getCOD($cod){
    return str_pad($cod, 2, "0", STR_PAD_LEFT);
}

function percorreMes($m, $ultimaIrma = 0){ Global $arrIrmas,$arrDiasSemana;
    if ($m >= 0 && $m <= 12){ # Mês precisa ser válido
        $diaIni = "01"; $diaFim = date("t", strtotime(date("Y-$m-$diaIni")));
        for ($i = $diaIni; $i <= $diaFim; $i++){ # Percorrendo os dias do Mês selecionado
            $n = date("N", strtotime(date("Y-$m-".getCOD($i)))); # Dia da semana
            if (checkDiaDeCulto($n)){ # Confirma se o dia tem culto
                $ultimaIrma = getProximaIrma($ultimaIrma);
                echo getCOD($i)."/$m/".date("Y")." (".$arrDiasSemana[$n].") - ".$arrIrmas[$ultimaIrma]." [$ultimaIrma]\n"; 
            }
        }
    }
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

                        <h2>Cadastre as organistas</h2>
                        

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form id="formCargo" action="sysrodizio.php" method="post">
                    <div class="col-md-12">
                        <div class="form-group" id="DivCrgNome">
                            <label>Nome Completo</label>
                            <input name="IrmaNome" id="IrmaNome" type="text" placeholder="Nome Completo" value="" class="form-control" >
                        </div>
                    </div>
                   
                   <div class="col-md-12">
                        <button type="submit" id="btnSalvar" name="btnSalvar" class="btn btn-success col-md-6">Salvar</button>
                        <a href="#" class="btn btn-warning col-md-6">Voltar</a>
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

