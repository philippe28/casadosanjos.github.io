<?php
	function enviarEmail($email, $assunto, $conteudo)
    {
		return mail($email, $assunto, $conteudo);
    }
	
	function montarEmail($nome, $mensagem){
		return
		"Nome: {$nome}
		 Mensagem: {$mensagem}";
	}
	
	if ($_POST){
	    $enviado = enviarEmail($_POST['email'], "Contato - Site", montarEmail($_POST['nome'], $_POST['mensagem']));
		if ($enviado){
			$msg = "Email enviado com sucesso.";
		}
		else{
			$msg = "Não foi possivel enviar o email.";
		}
		echo "<script>alert($msg);window.location.href='/index.php';</script>";
	}
?>