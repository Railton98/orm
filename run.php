<?php

// config inicial
require __DIR__ . '/vendor/autoload.php';

use App\Models\Users;
use Tecks\ORM\Drivers\MysqlPdo;

// conexão ao banco de dados
$pdo = new \PDO('mysql:host=mysql;dbname=orm', 'orm', 'orm');

// instanciação da classe de sql (driver)
$driver = new MysqlPdo($pdo);

// exemplo de execução com o driver
$driver->exec("truncate users;");

// instanciação do model
$model = new Users;
$model->setDriver($driver);

// inserção de registros
$model->name = 'tecks';
$model->age = 21;
$model->email = 'tecks@t.com';
$model->save();

$model->name = 'Pedro';
$model->age = 26;
$model->email = 'pedro@p.com';
$model->save();

// busca de vários registros
var_dump($model->findAll());
// busca de um registro
var_dump($model->findFirst(2));

// atualização de um registro
$model->id = 1;
$model->name = 'Rodrigo';
$model->save();

var_dump($model->findFirst(1));

// remoção de um registro
$model->delete(1);
var_dump($model->findAll());
