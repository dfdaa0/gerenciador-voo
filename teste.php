<?php
  include_once('global.php');

$sistema = new Sistema();
//tentativa de acessar sem login
$sistema->cadastraCompanhia('Latam','001', 'Latam Airlines do Brasil S.A.','LA', '12.085.581/0001-90', 19.2);
echo "\n";
//fazendo login
$sistema->login('admin','secretPass');
echo "\n";
//cadastrando companhias aéreas
$latam = $sistema->cadastraCompanhia('Latam','001', 'Latam Airlines do Brasil S.A.','LA', '12.085.581/0001-90', 19.2);
$azul = $sistema->cadastraCompanhia('Azul','002', 'Azul Linhas Aéreas Brasileiras S.A.','AD', '12.085.581/0001-90', 19.2);

echo "\n";
//cadastrando aeronaves
$sistema->cadastraAeronave('175','Embraer',180,600,$latam,'PX-RUZ');
$aeronaveLatam = $sistema->cadastraAeronave('175','Embraer',180,600,$latam,'PP-RUZ');
$aeronaveAzul = $sistema->cadastraAeronave('175','Embraer',180,600,$azul,'PP-RUZ');

echo "\n";
//cadastrando aeroportod
$Confins = $sistema->cadastraAeroporto('CNF','Confins','Minas Gerais', 'Confins');
$Guarulhos = $sistema->cadastraAeroporto('GRU','Guarulhos','São Paulo','Guarulhos');
$Congonhas = $sistema->cadastraAeroporto('CGH','São Paulo','São Paulo', 'Congonhas');
$Galeão = $sistema->cadastraAeroporto('GIG','Rio de Janeiro','Rio de Janeiro', 'Galeão');
$AfonsoPena = $sistema->cadastraAeroporto('CWB','São Jose dos Pinhais','Parana', 'Afonso Pena');

echo "\n";
//cadastrando vôos
$vooAC1329 = $sistema->cadastraVoo($Confins,$Guarulhos,new DateTime("2021-05-10 08:00:00"),40,"AM1234",$aeronaveAzul,$azul);
echo "\n";
$vooAC1329 = $sistema->cadastraVoo($Confins,$Guarulhos,new DateTime("2021-05-10 08:00:00"), 40 ,"AD1234",$aeronaveAzul,$azul);

echo "\n";

$voos = array();

$vooDiarioManha = $sistema->cadastraVoo($Confins,$Guarulhos,new DateTime("2022-06-06 08:00:00"), 40 ,"AD777",$aeronaveAzul,$azul,'diario');
array_push($voos, $vooDiarioManha);
$vooDiarioTarde = $sistema->cadastraVoo($Confins,$Guarulhos,new DateTime("2022-06-06 15:00:00"), 40 ,"AD000",$aeronaveAzul,$azul,'diario');
array_push($voos, $vooDiarioTarde);
//gerando viagens para os próximos 30 dias
$sistema->gerarViagens($voos);

//criando vôo que inicia amanhã entre confins e afonso pena
$vooIda = $sistema->cadastraVoo($Confins, $AfonsoPena, new DateTime("tomorrow"), 40,"AD111", $aeronaveAzul, $azul, 'diário');
//criando vôo que inicia dois dias depois de amanhã entre confins e afonso pena
$vooVolta = $sistema->cadastraVoo($AfonsoPena, $Confins, new DateTime("+3 days"), 40,"AD222", $aeronaveLatam, $latam, 'diário');

//criando as viagens de ida e volta respectivamente
$viagemIda = new Viagem($vooIda, $aeronaveAzul, $vooIda->getHorarioPartida());
$viagemVolta = new Viagem($vooVolta, $aeronaveLatam, $vooVolta->getHorarioPartida());

//inicializando um endereco
$endereco = new endereco("logradouro", 91, "complemento", "bairro",
         "cidade","estado", "12345-678", 12.5, 1.6);
//criando um cliente
$cliente = new Cliente("Francesco", "00.000.000-0", "CS265436",
"000.000.000-00","Brasileiro", "12/02/2000", "aaaaa@gmail.com", $endereco);

//inicializando um programa de milhas e uma de suas categorias
$categoria = new Categoria("CategoriaAzul", 90);
$programaDeMilhas = new ProgramaDeMilhas("abcdefgh", $categoria, $azul);

$pontos = [];

//criando o passageiro que fará as viagens
$passageiroVip = new PassageiroVip(57, $programaDeMilhas,  $pontos, "Francesco", "00.000.000-0", "CS265436",
          "000.000.000-00","Brasileiro", "12/02/2000", "aaaaa@gmail.com", $endereco);


//inicializando as suas franquias
$franquias = array();
$franquias[] = 21.2;
$franquias[] = 19.2;
$franquias[] = 20.1;

//comprando as passagens do passageiro
$passagemIda = $sistema->compraPassagem($passageiroVip, $viagemIda, "abcdef", $franquias, 400.30, $cliente);
$passagemVolta = $sistema->compraPassagem($passageiroVip, $viagemVolta, "abcdef", $franquias, 400.30, $cliente);

//fazendo Check-In da ida
$passagemIda->fazCheckIn();
//imprime cartão de embarque
$sistema->geraCartaoEmbarque($passageiroVip->getNome(),$viagemIda->getLinha()->getOrigem(), $viagemIda->getLinha()->getDestino(), $viagemIda->getHoraPartida(), 61);

//fazendo Check-In da volta
$passagemVolta->fazCheckIn();

//fazendo Check-In da volta
$passagemVolta->cancelaPassagem();











