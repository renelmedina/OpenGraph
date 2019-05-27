<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/
include_once __DIR__ . "/base_de_datos.php";
$definicionTabla = "CREATE TABLE IF NOT EXISTS serialesnod32(
	Id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	Identificador TEXT,
	Usuario	TEXT,
	Seriales	TEXT,
	FecVen	TEXT,
	Funciona	INTEGER,
	NoFunciona	INTEGER
);";
#Podemos usar $baseDeDatos porque incluimos el archivo que la crea
$resultado = $baseDeDatos->exec($definicionTabla);
echo "Tablas creadas correctamente";
?>