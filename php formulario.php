<?php
$conn = new mysqli("localhost","root","","eeep_inscricoes");

$nome = $_POST['nome'];
$nasc = $_POST['nascimento'];
$cpf = $_POST['cpf'];
$resp = $_POST['responsavel'];
$renda = $_POST['renda'];
$curso = $_POST['curso'];

$laudo_path = "uploads/laudos/" . $_FILES["laudo"]["name"];
move_uploaded_file($_FILES["laudo"]["tmp_name"], $laudo_path);

$hist_path = "uploads/historicos/" . $_FILES["historico"]["name"];
move_uploaded_file($_FILES["historico"]["tmp_name"], $hist_path);

$sql = "INSERT INTO inscricoes 
(nome_completo, data_nascimento, cpf, responsavel, renda_familiar, laudo_medico, historico_escolar, curso_id)
VALUES ('$nome','$nasc','$cpf','$resp', '$renda', '$laudo_path','$hist_path','$curso')";

$conn->query($sql);

echo "Inscrição realizada com sucesso!";
?>
