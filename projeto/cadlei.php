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

    <h1 style="margin-top: 8rem; text-align: center; font-size: 3.5rem;">Cadastro de leilões</h1>

  <div class="row" style="margin-top: 5rem;">
		<div class="col">
			 <a href="addlei.php" class="add">Criar leilão</a>
			 
		<table class="table table-striped mt-5">
			<thead>
				<tr>
					<th>#</th>
					<th>Imagem</th>
					<th>ID</th>
					<th>Guitarra</th>
					<th>Marca</th>
					<th>Descrição</th>
					<th>Lance mínimo</th>
					<th>Maior lance</th>
					<th>Lance de arrebatamento</th>
          
				</tr>
			</thead>
			<tbody>
			<?php
				include("conecta_db.php");

				$obj = conecta_db();
				$query = "SELECT * FROM tb_leilao";
				$resultado = $obj->query($query);
				while($linha = $resultado->fetch_object()){
						$html = "<tr>";
						$html .= "<td>";
						$html .= "<a class='btn btn-danger' href='index.php?page=2&id=".$linha->id."'> Excluir </a>";
						$html .= "<a class='btn btn-success' href='index.php?page=3&id=".$linha->id."'> Alterar </a>";
						$html .= "</td>";
						$html .= "<td>".$linha->id."</td>";
						$html .= "<td>".$linha->img_leilao."</td>";
						$html .= "<td>".$linha->nome_guitarra."</td>";
						$html .= "<td>".$linha->marca_guitarra."</td>";
						$html .= "<td>".$linha->descricao."</td>";
						$html .= "<td>".$linha->lance_minimo."</td>";
						$html .= "<td>".$linha->lance_maior."</td>";
						$html .= "<td>".$linha->lance_arrebatamento."</td>";

						$html .= "</tr>";
						echo $html;
				}
			?>
			</tbody>
		</table>
		</div>
	</div>
</div>

</body>
</html>