<?php


require_once 'Conexao.php';

class RodizioDAO extends Conexao
{

    public function CadastrarIrma($IrmID, $IrmNome)
    {
        if ($IrmNome == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();

        if ($IrmID > 0) {
            $comando_sql = ('UPDATE Irmas set IrmNome = ? WHERE IrmID = ?');
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $IrmNome);
            $sql->bindValue(2, $IrmID);
        } else if ($IrmID == 0) {

            $comando_sql = ('INSERT into Irmas (IrmNome) VALUES (?)');
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $IrmNome);
        }

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function RetornaIrmas()
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'Select IrmID, IrmNome from Irmas';
        $sql = $conexao->prepare($comando_sql);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function DetalhaIrma($IrmID)
    {
        $conexao = parent::retornaConexao();
        $comando_sql = 'Select IrmID, IrmNome from Irmas WHERE IrmID = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $IrmID);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
