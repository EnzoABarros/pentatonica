<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css "href="src/style.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pentatonica</title>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
        <img src="src/img/logo.png" alt="logo" style="width:70px;" href="javascript:void(0)">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      </ul>
      <a href="cadguit.php"><button class="botao d-flex" type="button" style="margin-right: 15px;">Guitarras</button></a>
      <a href="cadlei.php"><button class="botao d-flex" type="button">Leilões</button></a>
    </div>
  </div>
  </nav>

    <h1>Cadastro de leilões</h1>

  <div class="row" style="margin-top: 5rem;">
		<div class="col">
			 <a href="" class="btn btn-primary">Adicionar novo registro</a>
			 
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Descrição</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$obj = conecta_db();
				$query = "SELECT * FROM tb_leilao";
				$resultado = $obj->query($query);
				while($linha = $resultado->fetch_object()){
						$html = "<tr>";
						$html .= "<td>";
						$html .= "<a class='btn btn-danger' href='index.php?page=2&id=".$linha->teste_id."'> Excluir </a>";
						$html .= "<a class='btn btn-success' href='index.php?page=3&id=".$linha->teste_id."'> Alterar </a>";
						$html .= "</td>";
						$html .= "<td>".$linha->teste_id."</td>";
						$html .= "<td>".$linha->descricao."</td>";
						$html .= "</tr>";
						echo $html;
				}
			?>
			</tbody>
		</table>
		</div>
	</div>

<div class="form d-flex" style="visibility: hidden;">
        <h1>asdasdasd</h1>

</div>
</body>
</html>