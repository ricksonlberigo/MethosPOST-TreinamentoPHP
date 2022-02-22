<?php
$email = $_POST["email"]; // Pegando os dados do formulário
$name = $_POST["name"]; // Pegando os dados do formulário

$archive = fopen('../assets/archives/data.txt', 'a+');
fwrite($archive, 'Email: ' . $email . "\r\n");
fwrite($archive, 'Nome: ' . $name . "\r\n");
fwrite($archive, '--------------------------------' . "\r\n");
fclose($archive);

$json = file_get_contents("php://input");

$obj = json_decode($json);

echo json_encode([
  'status' => 'Sucesso',
  'messageName' => "O nome $name foi gravado com sucesso!",
  'messageEmail' => "O $email foi gravado com sucesso!"
]);

header("Location: ../index.php", TRUE, 301);
exit();
