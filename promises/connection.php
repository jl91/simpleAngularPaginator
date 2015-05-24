<?php

$request = json_decode(file_get_contents("php://input"));

$pdo = new \PDO();
$pdo->exec('SET CHARACTER SET UTF-8');

$query = ' SELECT * FROM usuario ';

$params = [];
if($request->limit){
   $query .= " limit :limit " ;
   $params['limit'] = (int) $request->limit;
}

if($request->offset){
   $query .= " offset :offset " ;
   $params['offset'] = (int) $request->offset;
}


$stmt = $pdo->prepare($query);
$stmt->execute($params);
$usuarios = $stmt->fetchAll();

$stmt = $pdo->prepare('select count(*) as total from usuario');
$stmt->execute();
$total = $stmt->fetch();



header('Content-Type: application/json');

echo json_encode(['usuarios' => $usuarios, 'total' => $total['total']]);
