<?php

$valor = array(
  $_POST['q_regata'] * 19.90,
  $_POST['q_cam_social'] * 59.90,
  $_POST['q_blusa'] * 30.90,
  $_POST['q_pullover'] * 119.90,
  $_POST['q_sapato'] * 99.90,
  $_POST['q_calca'] * 38.90,
  $_POST['q_meias'] * 9.90,
  $_POST['q_luvas'] * 24.90,
  $_POST['q_jaqueta'] * 328.90,
  $_POST['q_bermuda'] * 69.90,
  $_POST['q_chinelo'] * 14.90,
  $_POST['q_bone'] * 6.90,
);

$valorunit = array(
  19.90,
  59.90,
  30.90,
  119.90,
  99.90,
  38.90,
  9.90,
  24.90,
  328.90,
  69.90,
  14.90,
  6.90,
);

$desc = array(
  "Camiseta Regata",
  "Camisa Social",
  "Blusa",
  "Pullover",
  "Sapato",
  "Calças",
  "Meias",
  "Luvas",
  "Jaqueta",
  "Bermuda",
  "Chinelo",
  "Boné",
);

$total = 0;

for ($i = 0; $i < 12; $i++) {
  $total = $total + $valor[$i];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="pag.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <title>Trindade Fullstack</title>
</head>

<body>
  <br>
  <div>
    <a href="carrinho.html"><img class="go-back" src="images/SVG/seta.svg" alt=""></a>
  </div>
  <br>
  <div class="container">
    <center>
      <h2>Itens no carrinho</h2>
    </center>
    <br>
    <center>
      <div class="table" style="align-items: center;">
        <table border=1>
          <tr>
            <td>Quantidade</td>
            <td>Descrição</td>
            <td>Preço Unitário</td>
          </tr>
          <?php

          for ($i = 0; $i < 12; $i++) {
            if ($valor[$i] > 0) {
              $unit_form[$i] = number_format($valorunit[$i], 2, ',', '');
              echo "
                <tr>
                  <td>" . $valor[$i] / $valorunit[$i] . "</td>
                  <td>$desc[$i]</td>
                  <td>$unit_form[$i]</td>
                </tr>
              ";
            }
          }
          ?>
        </table>
      </div>
    </center><br>
    <center>
      <h2>Forma de pagamento</h2>
    </center>
    <br>
    <div class="control">
      <label class="radio">
        <input type="radio" name="answer" id="a_vista" oninput="a_vista()">
        À Vista
      </label>
      <br><br>
      À prazo:<br>
      <label class="radio">
        <input type="radio" id="vezes2" value=2 name="answer" onclick="ativ_botao()" oninput="parcela2()">
        2x
      </label><br>
      <label class="radio">
        <input type="radio" id="vezes3" value=3 name="answer" onclick="ativ_botao()" oninput="parcela3()">
        3x
      </label><br>
      <label class="radio">
        <input type="radio" id="vezes4" value=4 name="answer" onclick="ativ_botao()" oninput="parcela4()">
        4x
      </label><br>
      <label class="radio">
        <input type="radio" id="vezes5" value=5 name="answer" onclick="ativ_botao()" oninput="parcela5()">
        5x
      </label>
      <h3>Preço total: R$<a id=total><?php echo number_format($total, 2, ',', ''); ?></a></h3>
      <h3 id=num_parcelas></h3>
      <h3 id=preco_total></h3>
    </div>
    <br>
    <button onclick="redirect()" class="btn-carrinho" id="btn" disabled>Pagamento</button>
  </div>
  <br>
  <script text="text/javascript">
    total = <?php echo $total; ?>;

    if (<?php echo $total; ?> == 0) {
      alert("Não há itens no carrrinho!");
      window.location.replace("carrinho.html");
    }

    function a_vista() {
      document.getElementById("num_parcelas").innerHTML = "-8,5% de desconto!";
      document.getElementById("btn").disabled = false;
      preco = (<?php echo $total; ?> * 0.85).toFixed(2);
      document.getElementById("preco_total").innerHTML = "R$" + preco.replace(".", ",");
    }

    function parcela2() {
      var x = document.getElementById("vezes2").value;
      var total = document.getElementById("total").value;
      document.getElementById("num_parcelas").innerHTML = x + "x";
      preco = ((<?php echo $total; ?> * 1.06 / x) + 6.9).toFixed(2);
      apresPrecoFinal();
      validParcela();
    }

    function parcela3() {
      var x = document.getElementById("vezes3").value;
      var total = document.getElementById("total").value;
      document.getElementById("num_parcelas").innerHTML = x + "x";
      preco = ((<?php echo $total; ?> * 1.06 / x) + 6.9).toFixed(2);
      apresPrecoFinal();
      validParcela();
    }

    function parcela4() {
      var x = document.getElementById("vezes4").value;
      var total = document.getElementById("total").value;
      document.getElementById("num_parcelas").innerHTML = x + "x";
      preco = ((<?php echo $total; ?> * 1.06 / x) + 6.9).toFixed(2);
      apresPrecoFinal();
      validParcela();
    }

    function parcela5() {
      var x = document.getElementById("vezes5").value;
      var total = document.getElementById("total").value;
      document.getElementById("num_parcelas").innerHTML = x + "x";
      preco = ((<?php echo $total; ?> * 1.06 / x) + 6.9).toFixed(2);
      apresPrecoFinal();
      validParcela();
    }

    function validParcela() {
      if (preco < 10) {
        document.getElementById("preco_total").innerHTML = "O valor da parcela é menor que 10 reais...<br>R$" + preco.replace(".", ",");
        document.getElementById("btn").disabled = true;
      } else {
        ativBotao();
      }
    }

    function apresPrecoFinal() {
      document.getElementById("preco_total").innerHTML = "R$" + preco.replace(".", ",");
    }

    function ativBotao() {
      document.getElementById("btn").disabled = false;
    }

    function redirect() {
      alert('Pedido feito com sucesso!\nObrigado pela preferência.');
      window.location.replace("index.html");
    }
  </script>
</body>

</html>