<?php
class Aluno {
    private $matricula;
    private $nome;
    private $nota1;
    private $nota2;
    private $nota3;
    private $nota4;
    private $media;
    private $situacao;
 
    public function __construct($matricula, $nome, $nota1, $nota2, $nota3, $nota4) {
        $this->matricula = $matricula;
        $this->nome = $nome;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->nota3 = $nota3;
        $this->nota4 = $nota4;
        $this->media = 0;
        $this->situacao = '';
    }
 
    public function calcularMedia() {
        $this->media = ($this->nota1 + $this->nota2 + $this->nota3 + $this->nota4) / 4;
    }
 
    public function verificarSituacao() {
        if ($this->media >= 7) {
            $this->situacao = 'Aprovado';
        } elseif ($this->media >= 5) {
            $this->situacao = 'Recuperação';
        } else {
            $this->situacao = 'Reprovado';
        }
    }
 
    public function apresentaAluno() {
        return "
            Matrícula: {$this->matricula} <br>
            Nome: {$this->nome} <br>
            Notas: {$this->nota1}, {$this->nota2}, {$this->nota3}, {$this->nota4} <br>
            Média: {$this->media} <br>
            Situação: {$this->situacao}
        ";
    }
}
?>
 
 
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input {
            width: 200px;
            padding: 8px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Aluno</h1>
   
    <div class="form-container">
        <form method="post">
            <label for="matricula">Matrícula:</label>
            <input type="number" id="matricula" name="matricula" required>
 
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
 
            <label for="nota1">Nota 1:</label>
            <input type="number" id="nota1" name="nota1" step="0.1" required>
 
            <label for="nota2">Nota 2:</label>
            <input type="number" id="nota2" name="nota2" step="0.1" required>
 
            <label for="nota3">Nota 3:</label>
            <input type="number" id="nota3" name="nota3" step="0.1" required>
 
            <label for="nota4">Nota 4:</label>
            <input type="number" id="nota4" name="nota4" step="0.1" required>
           
            <button type="submit" name="calcular_media">Calcular Média</button>
            <button type="submit" name="verificar_situacao">Verificar Situação</button>
        </form>
   
</body>
</html>
 
 
 
 
 
 
<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
                $matricula = $_POST['matricula'];
                $nome = $_POST['nome'];
                $nota1 = $_POST['nota1'];
                $nota2 = $_POST['nota2'];
                $nota3 = $_POST['nota3'];
                $nota4 = $_POST['nota4'];
 
               
                $aluno = new Aluno($matricula, $nome, $nota1, $nota2, $nota3, $nota4);
 
                if (isset($_POST['calcular_media'])) {
                   
                    $aluno->calcularMedia();
                    echo "<strong>Média calculada:</strong> " . number_format($aluno->media, 2) . "<br><br>";
                }
 
                if (isset($_POST['verificar_situacao'])) {
                   
                    $aluno->verificarSituacao();
                    echo "<strong>Situação:</strong> " . $aluno->situacao . "<br><br>";
                }
 
               
                echo $aluno->apresentaAluno();
            }
        ?>