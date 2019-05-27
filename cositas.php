<?php

$db = new SQLite3('seriales.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
// Create a table.
$db->query('CREATE TABLE `seriales` (
	"Id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"Identificador"	TEXT,
	"Usuario"	TEXT,
	"Serial"	TEXT,
	"FecVen"	TEXT,
	"Funciona"	INTEGER,
	"NoFunciona"	INTEGER
)');

$db->exec('BEGIN');
$db->query('INSERT INTO "seriales" ("Identificador", "Usuario", "Serial","FecVen","Funciona","NoFunciona")
    VALUES ("1", "TRIAL-0255694667", "84tm72ntnf","31.05.2019",0,0)');
$db->query('INSERT INTO "seriales" ("Identificador", "Usuario", "Serial","FecVen","Funciona","NoFunciona")VALUES ("1", "EAV-0255770436", "cstetk7ns5","30/06/2019",0,0)');
$db->query('INSERT INTO "seriales" ("Identificador", "Usuario", "Serial","FecVen","Funciona","NoFunciona")VALUES ("1", "EAV-0243056510", "pfdu2p72h9","06/09/2019",0,0)');
$db->query('INSERT INTO "seriales" ("Identificador", "Usuario", "Serial","FecVen","Funciona","NoFunciona")VALUES ("1", "EAV-0254097798", "ea23m9jf6s","29/07/2019",0,0)');
$db->query('INSERT INTO "seriales" ("Identificador", "Usuario", "Serial","FecVen","Funciona","NoFunciona")VALUES ("1", "EAV-0255771905", "phe2vk9pj4","30/06/2019",0,0)');

$db->exec('COMMIT');

$query = 'SELECT * FROM "seriales"';
$lastVisit = $db->exec($query);
while ($row = $lastVisit->fetchArray(SQLITE3_ASSOC)) {
	# code...
	ECHO "HOLA";
};

echo("Last visit of '/test':\n");


$db->close();

?>