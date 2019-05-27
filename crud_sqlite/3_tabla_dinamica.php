<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/
include_once __DIR__ . "/base_de_datos.php"; #Al incluir este script, podemos usar $baseDeDatos

$resultado = $baseDeDatos->query("SELECT * FROM serialesnod32;");
$videojuegos = $resultado->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla Dinamica</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	

	<style>
		table, th, td {
		    border: 1px solid black;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Identificador</th>
				<th>Usuario</th>
				<th>Seriales</th>
				<th>FecVen</th>
				<th>Funciona</th>
				<th>NoFunciona</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<!-- Notar que siempre se repite lo que hay entre <tr> y </tr> -->
			<!-- Así que lo hacemos en un ciclo foreach -->

			<?php foreach($videojuegos as $videojuego){ /*Notar la llave que dejamos abierta*/ ?>
				<tr>
					<td><?php echo $videojuego->Identificador ?></td>
					<td><?php echo $videojuego->Usuario ?></td>
					<td><?php echo $videojuego->Seriales ?></td>
					<td><?php echo $videojuego->FecVen ?></td>
					<td><?php echo $videojuego->Funciona ?></td>
					<td><?php echo $videojuego->NoFunciona ?></td>
					<td>
						<a href="editar.php?id=<?php echo $videojuego->id ?>">Editar</a>
					</td>
					<td>
						<a href="eliminar.php?id=<?php echo $videojuego->id ?>">Eliminar</a>
					</td>
				</tr>
			<?php } /*Cerrar llave, fin de foreach*/ ?>

		</tbody>
	</table>
</body>
</html>