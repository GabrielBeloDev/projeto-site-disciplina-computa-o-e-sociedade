<?php
  header('Content-Disposition: inline; filename=formulario.php');
  header('Content-Type: text/html');
  if(isset($_POST['enviar'])) 
  {
    include_once('config.php');
  
    /*print_r($_POST['denuncia']);
    print_r($_POST['data']);
    print_r($_POST['relato']);
    print_r($_POST['logradouro']);
    print_r($_POST['complemento']);
    print_r($_POST['cidade']);
    print_r($_POST['bairro']);
    print_r($_POST['descricaoLocal']);
    print_r($_POST['contatos']);
  
    $denuncia = $_POST['denuncia'];
    $data = $_POST['data'];
    $relato = $_POST['relato'];
    $logradouro = $_POST['logradouro'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $descricao = $_POST['descricaoLocal'];
    $contatos = $_POST['contatos'];*/
    
    try {
      // Preparar a consulta SQL
      $query = "INSERT INTO formulario_denuncia.denuncias (id, tipo_de_denuncia, data_do_ocorrido, relato, logradouro, complemento, cidade, bairro, descricao_do_local, contato) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  
      
      // Verificar se a conexão está definida antes de preparar a consulta
      if ($conexao) {
        $stmt = $conexao->prepare($query);
  
        // Fornecer um valor para a coluna id (substitua '1' pelo valor desejado)
        $idValue = 1;
  
        // Atribuir valores diretamente e vincular aos parâmetros
        $stmt->bindValue(1, $idValue);
        $stmt->bindValue(2, $_POST['denuncia']);
        $stmt->bindValue(3, $_POST['data']);
        $stmt->bindValue(4, $_POST['relato']);
        $stmt->bindValue(5, $_POST['logradouro']);
        $stmt->bindValue(6, $_POST['complemento']);
        $stmt->bindValue(7, $_POST['cidade']);
        $stmt->bindValue(8, $_POST['bairro']);
        $stmt->bindValue(9, $_POST['descricaoLocal']);
        $stmt->bindValue(10, $_POST['contatos']);
  
        // Executar a consulta
        $stmt->execute();
  
        echo "Registro inserido com sucesso!";
      }
    } catch (PDOException $e) {
      echo "Erro ao inserir registro: " . $e->getMessage();
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/images/icon plata.png" type="image/x-icon"> 
  <link rel="stylesheet" type="text/css" href="../estilos/formulario.css" />
  <title>Formulário de Denúncia</title>
 
</head>
<body>
  <header class="cabecalho">
    <a href="../index.html"><img src="../assets/images/image 78.svg" alt="simbolo de reciclagem"></a>
      <div>   
        <a href="../index.html"><h1>ECO</h1></a>
        <a href="../index.html"><h1 class="planet">GUARD</h1></a>
      </div>
  </header>
  <main>
    <h1 class="Denunciash1">Faça sua denúncia</h1>
    <form action="formulario.php" method= "POST">
      <label for="denuncia">Qual sua denúncia</label>
      <select name="denuncia" id="denuncia" required>
        <option value="Trafico de animais silvestres">Tráfico de animais silvestres</option>
        <option value="Poluição">Poluição</option>
        <option value="Desmatamento">Desmatamento</option>
        <option value="Queimadas">Queimadas</option>
      </select>
      <label for="data">Data</label>
      <input type="date" id="data" name="data" required>
      <label for="relato">Relato</label>
      <textarea name="relato" id="relato" cols="30" rows="10" required></textarea>
      <label for="logradouro">Logradouro</label>
      <input type="text" name="logradouro" id="logradouro" required>
      <label for="complemento">Complemento</label>
      <input type="text" name="complemento" id="complemento">
      <div>
        <div><label for="cidade">Cidade</label>
        <select name="cidade" id="cidade">
          <option value="saoluis">São Luís</option>
        </select>
        </div>
        <div>
          <label for="bairro">Bairro</label>
          <input type="text" name="bairro" id="bairro" required>
        </div>
      </div>
      <label for="descricaoLocal">Descrição do Local</label>
      <textarea name="descricaoLocal" id="descricaoLocal" cols="30" rows="10"></textarea>
      <label for="contato">Contatos</label>
      <input type="tel" inputmode="numeric" placeholder="Telefone" id="telefone" name="contatos" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" title="Por favor, insira apenas números." required>
      <input type="submit" name="enviar" class="btn">
    </form>
  </main>
  <footer>
    <div class="divRodape">
      <a href="../index.html"><img src="../assets/images/image 78.svg" alt="simbolo de reciclagem"></a>        
      <div>   
        <a href="../index.html"><h1>ECO</h1></a>
        <a href="../index.html"><h1 class="planet">GUARD</h1></a>
      </div>
    </div>
    <div> 
        <a href="https://www.instagram.com/ecoguardslz/" target="_blank">
           <img src="../assets/images/instagramicon.svg" alt="foto instagram" class="imgRodape"> 
        </a>
        <a href="https://x.com/ecoguardslz?s=21" target="_blank">
            <img src="../assets/images/twittericon.svg" alt="foto twiter" class="imgRodape">
        </a>
    </div>
  </footer>
  
</body>
</html>
