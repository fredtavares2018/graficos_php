
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body>

<?php

ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(E_ALL);

$nota1 = 4;
$nota2 = 8;
$nota3 = 9.5;
$nota4 = 7;
$nota5 = 5.1;

$notas = $nota1.','.$nota2.','.$nota3.','.$nota4.','.$nota5;

// disciplinas

$disciplina1 = 'Matemática';
$disciplina2 = 'Inglês';
$disciplina3 = 'Espanhol';
$disciplina4 = 'Geografia';
$disciplina5 = 'História';

$disciplinas = '"'.$disciplina1.'","'.$disciplina2.'","'.$disciplina3.'","'.$disciplina4.'","'.$disciplina5.'"';

// cores

if($nota1 > 8){ $cor1 = 'blue'; $msn1 = 'Show! Você está acima da média em '.$disciplina1;}
if($nota2 > 8){ $cor2 = 'blue'; $msn2 = 'PARABÉNS! Você está acima da média em '.$disciplina2;}
if($nota3 > 8){ $cor3 = 'blue'; $msn3 = 'Muito Bom Mesmo! Você está acima da média em '.$disciplina3;}
if($nota4 > 8){ $cor4 = 'blue'; $msn4 = 'Sem limites! Você está acima da média em '.$disciplina4;}
if($nota5 > 8){ $cor5 = 'blue'; $msn5 = 'Eu já sabia! Você está acima da média em '.$disciplina5;}

if($nota1 == 8){ $cor1 = 'green'; $msn1 = 'Esse é o caminho! Você está na média em '.$disciplina1;}
if($nota2 == 8){ $cor2 = 'green'; $msn2 = 'Continue assim! Você está na média em '.$disciplina2;}
if($nota3 == 8){ $cor3 = 'green'; $msn3 = 'Valeu pelo esforço! Você está na média em '.$disciplina3;}
if($nota4 == 8){ $cor4 = 'green'; $msn4= 'Orgulho de você! Você está na média em '.$disciplina4;}
if($nota5 == 8){ $cor5 = 'green'; $msn5= 'Não pare! Você está na média em '.$disciplina5;}

if($nota1 < 5){ $cor1 = 'red'; $msn1 = 'Vamos retomar o foco! Você está abaixo da média em '.$disciplina1;}
if($nota2 < 5){ $cor2 = 'red'; $msn2 = 'Peça ajuda, é importante! Você está abaixo da média em '.$disciplina2;}
if($nota3 < 5){ $cor3 = 'red'; $msn3 = 'Não desista! Você está abaixo da média em '.$disciplina3;}
if($nota4 < 5){ $cor4 = 'red'; $msn4 = 'Foi só um deslize! Você está abaixo da média em '.$disciplina4;}
if($nota5 < 5){ $cor5 = 'red'; $msn5 = 'Vamos recuperar rapidinho! Você está abaixo da média em '.$disciplina5;}

if(($nota1 >= 5) and ($nota1 < 8)){ $cor1 = 'orange'; $msn1 = 'Está perto! Você está abaixo da média em '.$disciplina1;}
if(($nota2 >= 5) and ($nota2 < 8)){ $cor2 = 'orange'; $msn2 = 'Quase lá! Você está abaixo da média em '.$disciplina2;}
if(($nota3 >= 5) and ($nota3 < 8)){ $cor3 = 'orange'; $msn3 = 'Eita que na próxima...! Você está abaixo da média em '.$disciplina3;}
if(($nota4 >= 5) and ($nota4 < 8)){ $cor4 = 'orange'; $msn4 = 'Foi o sono! Você está abaixo da média em '.$disciplina4;}
if(($nota5 >= 5) and ($nota5 < 8)){ $cor5 = 'orange'; $msn5 = 'Sabia mas, esqueceu! Você está abaixo da média em '.$disciplina5;}

$cores = '"'.$cor1.'","'.$cor2.'","'.$cor3.'","'.$cor4.'","'.$cor5.'"';


?>

<div class="container">
    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
    <hr>
    <h4>Lembrando: Nossa média é 8.0;</h4>
    <p><?php echo $msn1; ?></p>
    <p><?php echo $msn2; ?></p>
    <p><?php echo $msn3; ?></p>
    <p><?php echo $msn4; ?></p>
    <p><?php echo $msn5; ?></p>
</div>



    <script>
        var xValues = [<?php echo $disciplinas; ?>];
        var yValues = [<?php echo $notas; ?>];
        var barColors = [<?php echo $cores; ?>];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: "Resultados do 1º Bimestre",
                    fontSize: 16
                }
            }
        });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>