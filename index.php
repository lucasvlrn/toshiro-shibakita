<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  ini_set("display_errors", 1);
  header('Content-Type: text/html; charset=iso-8859-1');

  echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

  //Conexão
  $servername = $_ENV["DB_HOST"];
  $username = $_ENV["DB_USERNAME"];
  $password = $_ENV["DB_PASSWORD"];
  $database = $_ENV["DB_DATABASE"];

  $dns = "mysql:host=$servername; dbname=$database";
  $pdo = new PDO($dns, $username, $password);

  $valor_rand1 = rand(1, 999);
  $valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
  $host_name = gethostname();

  $query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2','$host_name')";

  if ($link->query($query) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $link->error;
  }
  ?>
</body>

</html>