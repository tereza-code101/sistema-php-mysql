<?php
$conn = new mysqli("localhost","root","","eeep_inscricoes");

$sql = $conn->query("SELECT cursos.nome, COUNT(*) AS total
                     FROM inscricoes 
                     JOIN cursos ON cursos.id = inscricoes.curso_id
                     GROUP BY curso_id");

$response = ["labels"=>[], "valores"=>[]];

while($r = $sql->fetch_assoc()) {
    $response["labels"][] = $r["nome"];
    $response["valores"][] = $r["total"];
}

echo json_encode($response);
?>
