<?php

session_start();

if (isset($_SESSION['admin'])) {
    echo 'Bem vindo ' . $_SESSION['admin'] . ' - Administração';
} else if (isset($_SESSION['normal'])) {
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
}

include_once 'Codes/Cadastro_cliente.php';
$id = filter_input(INPUT_GET, 'id',   FILTER_SANITIZE_NUMBER_INT);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/EditarProduto.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <title>Editar cliente</title>
</head>

<body>
    <?php

    $sttm = " SELECT * FROM tb_produto WHERE id = $id";

    $sttm_resultado = $conexao->prepare($sttm);

    $sttm_resultado->execute();

    $rowSttm = $sttm_resultado->fetch(PDO::FETCH_ASSOC);



    ?>
    <div class="container text-white p-5">
        <div class="row">
            <h1 class="display-4 text-center col-12 mt-4">Editar dados do produto</h1>
            <div class="col-md-12">
                <form action="Codes/EditarProduto.php" method="POST">
                    <div class="form-group">
                        <label for="nome_produto">Nome:</label>
                        <input class="form-control" type="text" name="nome_produto" value="<?php if (isset($rowSttm['nome_produto'])) {
                                                                                                echo $rowSttm['nome_produto'];
                                                                                            } ?>">
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?php if (isset($rowSttm['id'])) {
                                                                    echo $rowSttm['id'];
                                                                } ?>">
                    </div>
                    <div class="form-group">
                        <label for="valor_produto">Valor:</label>
                        <input class="form-control" type="number" step="any" name="valor_produto" value="<?php if (isset($rowSttm['valor_produto'])) {
                                                                                                                echo number_format($rowSttm['valor_produto'], 2);
                                                                                                            } ?>">
                    </div>
                    <div class="form-group">
                        <label for="tipo_produto">Tipo de produto:</label>
                        <input class="form-control" type="text" name="tipo_produto" value="<?php if (isset($rowSttm['tipo_produto'])) {
                                                                                                echo $rowSttm['tipo_produto'];
                                                                                            } ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="foto_produto_produto">Foto do produto:</label>
                        <input class="form-control" type="text" name="foto_produto" value="<?php if (isset($rowSttm['foto_produto'])) {
                                                                                                echo $rowSttm['foto_produto'];
                                                                                            } ?>">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info mt-5" type="submit" name="editar_produto" value="Editar Produto">
                        <a class="btn btn-primary btn-block" href="CadastrarProduto.php" role="button">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>