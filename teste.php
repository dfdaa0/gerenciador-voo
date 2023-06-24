<?php
  include_once('global.php');

$sistema = new Sistema();

$sistema->cadastraCompanhia('Latam','001', 'Latam Airlines do Brasil S.A.','LA');
echo "\n";

$sistema->login('admin','secretPass');
echo "\n";

$latam = $sistema->cadastraCompanhia('Latam','001', 'Latam Airlines do Brasil S.A.','LA');
$azul = $sistema->cadastraCompanhia('Azul','002', 'Azul Linhas Aéreas Brasileiras S.A.','AD');

echo "\n";

$sistema->cadastraAeronave('175','Embraer',180,600,$latam,'PX-RUZ');
$aeronaveLatam = $sistema->cadastraAeronave('175','Embraer',180,600,$latam,'PP-RUZ');
$aeronaveAzul = $sistema->cadastraAeronave('175','Embraer',180,600,$azul,'PP-RUZ');

echo "\n";

$Confins = $sistema->cadastraAeroporto('CNF','Confins','Minas Gerais', 'Confins');
$Guarulhos = $sistema->cadastraAeroporto('GRU','Guarulhos','São Paulo','Guarulhos');
$Congonhas = $sistema->cadastraAeroporto('CGH','São Paulo','São Paulo', 'Congonhas');
$Galeão = $sistema->cadastraAeroporto('GIG','Rio de Janeiro','Rio de Janeiro', 'Galeão');
$AfonsoPena = $sistema->cadastraAeroporto('CWB','São Jose dos Pinhais','Parana', 'Afonso Pena');

echo "\n";

$vooAC1329 = $sistema->cadastraVoo($Confins,$Guarulhos,new DateTime("2021-05-10 08:00:00"),40,"AM1234",$aeronaveAzul,$azul);
echo "\n";
$vooAC1329 = $sistema->cadastraVoo($Confins,$Guarulhos,new DateTime("2021-05-10 08:00:00"), 40 ,"AD1234",$aeronaveAzul,$azul);

echo "\n";

$vooDiarioManha = $sistema->cadastraVoo($Confins,$Guarulhos,new DateTime("2022-06-06 08:00:00"), 40 ,"AD777",$aeronaveAzul,$azul,'diario');

$vooDiarioTarde = $sistema->cadastraVoo($Confins,$Guarulhos,new DateTime("2022-06-06 15:00:00"), 40 ,"AD000",$aeronaveAzul,$azul,'diario');

$sistema->gerarViagens();
