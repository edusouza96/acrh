<?php
session_start();
  if(empty($_SESSION["usuario"]) && empty($_SESSION["senha"])){
	  header("location:../index.php");
  }
?>
<html>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estiloMenu.css">
	<body>
		<table class="menus">
			<tr>
				<td>
					<ul>
						<?php
							session_start();
							$admin = $_SESSION["admin"];
							if($admin == 1){
								echo "<li><a href='../Admin/listaUsuarios.php'>Consultar Colaboradores</a></li>";
								echo "<li><a href='../Admin/listaGerencia.php'>Consultar Gerenciadores </a></li>";
								echo "<li><a href='../Geral/listaEmail.php'>Consultar Email</a></li>";
								echo "<li><a href='../Geral/listaGrupo.php'>Consultar Grupo</a></li>";
								echo "<br>";
								echo "<br>";
								echo "<br>";
								echo "<li><a href='../Admin/cadastroGerencia.php'>Cadastrar Gerenciadores </a></li>";
								echo "<li><a href='../Geral/cadastroInfo.php'>Cadastrar Colaboradores </a></li>";
								echo "<li><a href='../index.php'>Sair</a></li>";
							}else if ($admin == 0){
								echo "<li><a href='../Geral/listaUsuarios.php'>Consultar Colaboradores</a></li>";
								echo "<li><a href='../Geral/listaEmail.php'>Consultar Email</a></li>";
								echo "<li><a href='../Geral/listaGrupo.php'>Consultar Grupo</a></li>";
								echo "<br>";
								echo "<br>";
								echo "<br>";
								echo "<li><a href='../Geral/cadastroInfo.php'>Cadastrar Colaboradores </a></li>";
								echo "<li><a href='../index.php'>Sair</a></li>";
							}
						?>
					</ul>
				</td>
			</tr>
		</table>
	</body>
</html>