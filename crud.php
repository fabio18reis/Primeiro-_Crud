<?php
include_once "conexao.php";

$acao = $_GET['acao'];

if(isset($_GET['id']))

{
    $id = $_GET['id'];
}

switch ($acao){
    case 'inserir':
        
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $mensagem = $_POST['mensagem'];

    $sqlInsert = "INSERT INTO users (user_name, user_email, user_date, user_mensagem) 
    VALUES ('$nome', '$email', '$data', '$mensagem')";
    
    if(!mysqli_query($conexao,$sqlInsert))
    {
        die("erro ao inserir informações" . mysqli_error($conexao));
    }
    else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados Cadastrados!')
        window.location.href='crud.php?acao=selecionar'</script>";
    }

        break;
        
    case 'montar':

        $id = $_GET['id'];
        $sql = 'SELECT * FROM users WHERE user_id =' .$id;
        $resultado = mysqli_query($conexao,$sql) or die ("Erro ao Editar Registros");

        echo "<Form method = 'post' name = 'dados' action='crud.php?acao=atualizar' onSubmit='return Enviardados();'>";
        echo "<table width='588' border ='0' align = 'center'>";
        

        while($registro = mysqli_fetch_array($resultado)){
            echo "<Tr>";
            echo  "<td width = '118'><font size = '1' face=verdana, Arial,  Helvetica, sans-serif'>Codigo:</font></td>";
            echo  "<td width = '118'>";
            echo  "<input name='id' type ='text' class='formbutton' id='id' size='5' maxlenght='10' value=" .$id." readonly>";
            echo  "</td>";
            echo  "<tr>";

            echo "<tr>";
            echo  "<td width = '118'><font size = '1' face=verdana, Arial,  Helvetica, sans-serif'>Nome:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo  "<input type=text name='nome' id='nome' value='".($registro['user_name'])."'>"; 
            echo "</font></td>";
            echo "<tr>";

            echo "<tr>";
            echo  "<td width = '118'><font size = '1' face=verdana, Arial,  Helvetica, sans-serif'>Email:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo  "<input type='text' name='email' id='email' value='".($registro['user_email'])."'>"; 
            echo "</font></td>";
            echo "<tr>";

            echo "<tr>";
            echo  "<td width = '118'><font size = '1' face=verdana, Arial,  Helvetica, sans-serif'>Data:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo  "<input type='date' name='data' id='data' value='".($registro['user_date'])."'>"; 
            echo "</font></td>";
            echo "<tr>";

            echo "<tr>";
            echo  "<td width = '118'><font size = '1' face=verdana, Arial,  Helvetica, sans-serif'>Mensagem:</font></td>";
            echo  "<td rowspan='2'><font size='2'>";
            echo  "<style>Textarea[resize:none;}</style>";
            echo  "<textarea name='mensagem' cols='50' rows='3' class='formbutton'>" .htmlspecialchars($registro['user_mensagem']) . "</textarea>";
            echo "</font></td>";
            echo "<tr>";

            
            echo "<tr>";
            echo "<td height = '22'></td>";
            echo "<td>";
            echo "<input type= 'submit' class='formobjects'  value='Atualizar'>";
            echo "<button type='submit' formaction = 'crud.php?acao=selecionar'>Selecionar</button> ";
            echo "<input type= 'reset' name='reset' class='formobjects'  value='Limpar Campos'>";
            echo "</td>";
            echo "</tr>";

            echo "</table>";
            echo "</form>";

        

        mysqli_close($conexao);

        break;

        }
        
        break;
        
    case'atualizar':
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        $data = $_POST['data'];
        
        


        $sqlUpdate= "UPDATE users SET user_name = '$nome', user_email = '$email', user_mensagem  = '$mensagem', user_date= '$data' WHERE user_id = '$id'";
        $resultado = mysqli_query($conexao, $sqlUpdate) or die ("Erro ao retornar dados");


        if(!mysqli_query($conexao,$sqlUpdate))
            { echo"<script language='javascript' type='text/javascript'>
              alert('Erro!');window.location ='crud.php?acao=selecionar'</script>";
            }

        else
        {
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuario Alterado!');window.location ='crud.php?acao=selecionar'</script>";
        }

        break;
        
    case 'deletar':
        
        $sql = "DELETE FROM users WHERE user_id = '" . $id . "'";
        
        if(!mysqli_query($conexao,$sql))
    {
        die("erro ao inserir informações" . mysqli_error($conexao));
    }
        else
    {
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados Deletados!')
        window.location.href='crud.php?acao=selecionar'</script>";
    }
    mysqli_close($conexao);
    header("Location:crud.php?acao=selecionar");
        
        
        break;
        
    case 'selecionar':
        
        date_default_timezone_set('America/Sao_Paulo');
      
        
        echo"<meta charset='UTF-8'>";
        echo"<center><table border=1>";
        echo"<tr>";
        echo"<th>CODIGO</th>";
        echo"<th>NOME</th>";
        echo"<th>EMAIL</th>";
        echo"<th>DATA CADASTRO</th>";
        echo"<th>MENSAGEM</th>";
        echo"<th>AÇÃO</th>";
        echo"</tr>";
        
        $sqlInsert = "SELECT * FROM users";
        $resultado = mysqli_query($conexao,$sqlInsert) or die("Erro ao retornar dados");
        
        echo"<center><h1>Registro cadastrados na base de dados</h1><br/></center>";
        echo"</br>";
        
        while($registro = mysqli_fetch_array($resultado)){
            
            $id = $registro['user_id'];
            $nome = $registro['user_name'];
            $email = $registro['user_email'];
            $data = $registro['user_date'];
            $mensagem = $registro['user_mensagem'];
            
            echo"<tr>";
            echo"<td>" . $id . "</td>";
            echo"<td>" . $nome . "</td>";
            echo"<td>" . $email . "</td>";
            echo"<td>" . date("d/m/Y", strtotime($data)) . "</td>";
            echo"<td>" . $mensagem . "</td>";
            echo"<td> <a href='crud.php?acao=deletar&id=$id'><img src='excluir.png' alt='Deletar registro' style width='40px'></a>
            <a href='crud.php?acao=montar&id=$id'><img src='edita.png' alt='Atualizar' title='atualizar registro' style width='40px'></a>";
           
            
            
        }
        echo"</tr>";
        echo "<tr>";
        echo "<a href='index.php'><img src='inserir.png' alt='Inseir' title='Inserir registro' style width='40px'></a>";
        echo "</tr>";
        mysqli_close($conexao);


        break;
    
    default:
        header("Location:crud.php?acao=selecionar");
        break;
}

