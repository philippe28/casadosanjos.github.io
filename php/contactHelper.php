<?php
	function enviarEmail($email, $assunto, $conteudo)
    {
        $config['protocol']  = 'smtp';
        $config['smtp_host'] = ''; //to-do
        $config['smtp_port'] = 587;
        $config['smtp_user'] = ''; //to-do
        $config['smtp_pass'] = ''; //to-do
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['wordwrap']  = true;
        $config['newline']   = "\r\n";

        $this->email->initialize($config);

        $this->email->from('', 'Contato - Site'); //to-do
        $this->email->to($email);
        $this->email->subject($assunto);
        $this->email->message($conteudo);
    }
	
	function montarEmail($nome, $mensagem){
		return
		"Nome: {$nome}
		 Mensagem: {$mensagem}";
	}
?>