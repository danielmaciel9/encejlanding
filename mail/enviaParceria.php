<?php

/*apenas dispara o envio da mensagem caso houver/existir $_POST['enviar']*/
if (isset($_POST['enviaMsg']))

{
/* #### ALTERE OS CAMPOS ENTRE ASPAS SIMPLES DESTACADOS ABAIXO #### */

/* ## CAMPO 1 ## Informe o e-mail que receberá o formulário */
$destinatarios = 'comunicacao@encej.com.br';

/* ## CAMPO 2 ## Informe o nome que será exibido no e-mail do formulário */
$nomeDestinatario = 'Email sobrbe o ENCEJ';

/* ## CAMPO 3 ## Informe o endereço de e-mail completo criado em sua hospedagem, que será o remetente da mensagem. Como por exemplo teste@seudominio */
$usuario = 'encej@adoteumprogramador.com.br';

/* ## CAMPO 4 ## Informe a senha do endereço de e-mail acima */
$senha = '1234encej';



/*abaixo as veriaveis principais, que devem conter em seu formulario*/
// $nomeRemetente = $_POST['nome'];
$assunto = "ENCEJ - Site";
$_POST['mensagem'] = nl2br(
	'<strong>Nome: </strong> '.$_POST['nomeDoParceiro'].'
	<strong>Email: </strong> '. $_POST['emailDoParceiro'].'
	<strong>Mensagem: </strong> '. $_POST['telefoneDoParceiro']
);



/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

include_once("class.phpmailer.php");

$To = $destinatarios;
$Subject = $assunto;
$Message = $_POST['mensagem'];

$Host = 'smtp.'.substr(strstr($usuario, '@'), 1);
$Username = $usuario;
$Password = $senha;
$Port = "587";

$mail = new PHPMailer();
$body = $Message;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = $Host; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Port = $Port; // set the SMTP port for the service server
$mail->Username = $Username; // account username
$mail->Password = $Password; // account password

$mail->SetFrom($usuario, $nomeDestinatario);
$mail->Subject = $Subject;
$mail->MsgHTML($body);
$mail->AddAddress($To, "");

if(!$mail->Send()) {
//$mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
echo "<script type='text/javascript'>alert('Erro ao enviar e-mail: ". print($mail->ErrorInfo)."')</script>";
} else {
//$mensagemRetorno = 'E-mail enviado com sucesso!';
echo "<script type='text/javascript'>

	</script>";
}
}
?>



