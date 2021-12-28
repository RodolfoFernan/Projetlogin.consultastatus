<? php

class usuario {

    private $pdo;
    public  $msgErro="";
   
    public function connectar ($nome, $root,$usuario,$senha)

    {
      
       

        global  $pdo;
         try
         {
        $pdo=new PDO("maysql:dbname=".nome.";host=".$root,$usuario,$senha);
       } catch (PDOException $e){
           $mdgErro= $e->getMessage();
        
    }
}

    public function cadastrar( $nome, $telefone,$email,$senha);
   {


    global  $pdo;
    //verificar se já existe email cadastrado

$sql = $pdo->prepare("SELECT  id_usuario from usuarios WHERE email = :e");
$sql->bindValue(":e",$email);
$sql-> execute();
if ($sql -> rowCount()  > 0)
{

    return false;  // já esta cadastrada 
}
else
{
//caso não , cadastrar
$SQL = $pdo->prepare ("INSERT INTO usuarios (nome (nome, telefone, email,  senha,) VALUES (:n, :t, :e, :s)" );
$sql->bindValue(":n",$nome);
$sql->bindValue(":t",$telefone);
$sql->bindValue(":e",$email);
$sql->bindValue(":s",md5($senha));
$sql->execute()
return true;

  }
 }
public function logar($email, $senha,)
{

global  $pdo;
// Verificar  se o email e senha estão cadastrados , se sim 
$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE  email= :e AND senha  = :s");
$sql->bindValue(":e",$email);
$sql->bindValue(":s",md5($senha));
$sql->execute();
if ($sql->rowCount() >0)
{
// entrar no sistema (sessâo)
$dado= $sql->fetch();
session_start();
$_session["id_usuario"]= $dado["is_usuario"];
return true ;
//logado com sucesso

}
else

{
  return false;   //Não foi possivel logar
    }
   }
 }

?>
