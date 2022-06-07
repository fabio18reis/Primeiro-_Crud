<!DOCTYPE html>
<html lang="pt">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


   <title>Cadastro</title>
</head>

<body>
   <div></div>
   <form method="post" action="crud.php?acao=inserir" name="dados" onSubmit="return enviardados();">

      <table width="588" border="0" align="center">

         <tr>
            <td width="118">
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome completo:</font>
            </td>
            <td width="460">
               <input name="nome" type="text" class="formbutton" id="nome" size="52" maxlength="150">
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">Data:</font>
            </td>
            <td>
               <font size="2">
                  <input name="data" type="date" id="data" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font size="1" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font>
            </td>
            <td>
               <font size="2">
                  <input name="email" type="text" id="email" size="52" maxlength="150" class="formbutton">
               </font>
            </td>
         </tr>

         <tr>
            <td>
               <font face="Verdana, Arial, Helvetica, sans-serif">
                  <font size="1">Mensagem<strong>:</strong></font>
               </font>
            </td>
            <td rowspan="2">
               <font size="2">
                  <textarea name="mensagem" cols="50" rows="8" class="formbutton" id="mensagem" input></textarea>
               </font>
            </td>
         </tr>
         <tr>
            <td height="85">
               <p><strong>
                     <font face="Verdana, Arial, Helvetica, sans-serif">
                        <font size="1">
                        </font>
                     </font>
                  </strong></p>
            </td>
         </tr>
         <tr>
            <td height="22"></td>
            <td>
               <input name="Submit" type="submit" class="formobjects" value="Cadastrar">
               <input name="Reset" type="reset" class="formobjects" value="Limpar campos">
               <button type='submit' formaction='crud.php?acao=consultar'>Consultar</button>
              
               


            </td>
         </tr>
      </table>
   </form>
</div>
</body>

</html>