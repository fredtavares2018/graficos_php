<?php

include 'conexao.php';


$atualizar = isset($_POST['teste']) ? $_POST['teste'] : 'nada';

if ($atualizar == '1') {

      $d1 = $_POST['d1'];
      $d2 = $_POST['d2'];
      $d3 = $_POST['d3'];
      $d4 = $_POST['d4'];
      $d5 = $_POST['d5'];

      $recebendo_cadastro = "INSERT INTO dados
        VALUES(null, 'teste','$d1', '$d2', '$d3','$d4', '$d5', '1', '1', 'teste')";
      $query_cadastro = mysqli_query($conn, $recebendo_cadastro) or die(mysqli_error($conn));

     header('location: dados.php');

}

     ?>





<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <form action="dados.php" method="post">

            <input type="text" name="d1">
            <input type="text" name="d2">
            <input type="text" name="d3">
            <input type="text" name="d4">
            <input type="text" name="d5">

            <input type="hidden" name="teste" value="1">

            <input type="submit" value="Enviar">
        </form>

        <br>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>10km</th>
                    <th>20km</th>
                    <th>30km</th>
                    <th>40km</th>
                    <th>50km</th>
                    <!-- <th>Acoes</th> -->
                </tr>
            </thead>

            <tbody id="myTable">

                <?php

                include  'conexao.php';

                $query_listar = " SELECT *
                                FROM dados
                                 ";

                $buscar_cadastros = mysqli_query($conn, $query_listar);

                while ($retorno_cadastros = mysqli_fetch_array($buscar_cadastros)) {

                ?>

                    <tr>
                        <td scope="row"> <?php echo $retorno_cadastros['dataEvento']; ?> </td>

                        <td><?php echo $retorno_cadastros['dUm']; ?> </td>
                        <td><?php echo $retorno_cadastros['dDois']; ?></td>
                        <td><?php echo $retorno_cadastros['dTres']; ?></td>
                        <td><?php echo $retorno_cadastros['dQuatro']; ?></td>
                        <td><?php echo $retorno_cadastros['dCinco']; ?></td>

                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#n<?php echo $retorno_cadastros['id']; ?>">
                                Editar
                            </button>
                        </td>


                        <td>
                            <form action="backend/exclusao.php" method="post">

                                <input type="hidden" name="id" value="<?php echo $retorno_cadastros['id']; ?>">

                                <input type="submit" value="EXCLUIR" class="btn btn-danger">

                            </form>

                        </td>


                    </tr>





                    <!-- The Modal -->
                    <div class="modal" id="n<?php echo $retorno_cadastros['id']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Editando Usuários</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <form action="backend/edicoes.php" method="post">

                                        <input type="text" name="iduser" value="<?php echo $retorno_cadastros['id']; ?>">

                                        <input type="text" name="nome" value="<?php echo $retorno_cadastros['nome']; ?>" class="form-control">

                                        <input type="text" name="cpf" value="<?php echo $retorno_cadastros['cpf']; ?>" class="form-control">

                                        <input type="text" name="acesso" value="<?php echo $retorno_cadastros['codigo_acesso']; ?>" class="form-control">

                                        <input type="text" name="area" value="<?php echo $retorno_cadastros['codigo_area']; ?>" class="form-control">

                                        <input type="text" name="descricao" value="<?php echo $retorno_cadastros['descricao_area']; ?>" class="form-control">


                                        <input type="submit" value="EDITAR" class="btn btn-warning">

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                <?php } ?>

            </tbody>
        </table>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </div>

</body>

</html>