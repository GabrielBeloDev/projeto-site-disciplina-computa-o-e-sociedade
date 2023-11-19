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


