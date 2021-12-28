<?php
 require_once "processa.php";
 $u = new Usuario;


?>



<?php
isset($_POST["nome"]);
{


$nome= addslashes($_POST["nome"]);
$telefone = addslashes($_POST["telefone"]);
$email =addslashes($_POST["email"]);
$senha =addslashes($_POST["senha"]); 
$confirmaSenha = addslashes($_POST["confSenha "]);
// Verificar se nao esta vazio
if (! empty($nome) && !empty($telefone)&& !empty($email) &&!empty($senha) && !empty($confirmaSenha)   )
{
 $u->connectar("projetologin","localhost","root"," ");
 if ($u ->msgErro =="") // esta ok
{
             if  ($senha == $confirmaSenha)
            
                 {
                      if  ($u->cadastrar($nome, $telefone,$email,$senha))
                          {
                                     echo "Cadastrado com sucesso ! acesse para entrar! ";
                                }
                                 else
                               {
                                     echo "Email ja cadastrado!";
                             }

                           }
                        else
                      {
                             echo "Senha invalida";
                  }
           
            }
         else

        {
                 echo "Erro:".$u->msgErro;
       } 
     }else
   {
                echo "Preencha todos os campos !";
  }

}

?>

