<?php

header('Content-type: text/html; charset=UTF-8');

require_once 'class.phpmailer.php';

$nome 			= 	$_POST['nome'];
$email 			= 	$_POST['email'];
$telefone 		= 	$_POST['telefone'];
$empresa		=	$_POST['empresa'];
$cnpj			=	$_POST['cnpj'];
$estado			=	$_POST['estado'];
$cidade			=	$_POST['cidade'];
$mensagem		=	$_POST['mensagem'];

$subject = 'Formulário de Contato Baladas Brasil:';

$msg .= '<html><body>';
$msg .= '<table style="width:600px;margin:0 auto;padding:0;background:#fff" border="0" align="center" cellpadding="0" cellspacing="0" valign="top">';		
$msg .= '<tr>
			<td width="50%" style="text-align:left;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">
				<strong>Nome:</strong> 
			</td>
			<td width="50%" style="text-align:right;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">'
				.$nome.
			'</td>
		</tr>';
$msg .= '<tr>
			<td width="50%" style="text-align:left;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">
				<strong>E-mail:</strong> 
			</td>
			<td width="50%" style="text-align:right;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">'
				.$email.
			'</td>
		</tr>';
$msg .= '<tr>
			<td width="50%" style="text-align:left;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">
				<strong>Telefone:</strong> 
			</td>
			<td width="50%" style="text-align:right;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">'
				.$telefone.
			'</td>
		</tr>';
$msg .= '<tr>
			<td width="50%" style="text-align:left;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">
				<strong>Empresa:</strong> 
			</td>
			<td width="50%" style="text-align:right;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">'
				.$empresa.
			'</td>
		</tr>';
$msg .= '<tr>
			<td width="50%" style="text-align:left;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">
				<strong>CNPJ:</strong> 
			</td>
			<td width="50%" style="text-align:right;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">'
				.$cnpj.
			'</td>
		</tr>';
$msg .= '<tr>
			<td width="50%" style="text-align:left;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">
				<strong>Estado:</strong> 
			</td>
			<td width="50%" style="text-align:right;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">'
				.$estado.
			'</td>
		</tr>';
$msg .= '<tr>
			<td width="50%" style="text-align:left;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">
				<strong>Cidade:</strong> 
			</td>
			<td width="50%" style="text-align:right;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">'
				.$cidade.
			'</td>
		</tr>';		
$msg .= '<tr>
			<td width="50%" style="text-align:left;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">
				<strong>Mensagem:</strong> 
			</td>
			<td width="50%" style="text-align:right;font-family:arial;color:#333;font-size:12px;line-height:17px;border-bottom:1px dotted #aaa;padding-top:5px;padding-bottom:5px">' 
				.nl2br($mensagem).
			'</td>
		</tr>';
$msg .= '</table><br><br><br><br>';
$msg .= '</td></tr>';
$msg .= '</table>';
$msg .= '</body></html>';

$mail = new PHPMailer(true);
$mail->CharSet = "UTF-8";
$mail->SetFrom($email, $nome);
$mail->Subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
$mail->MsgHTML($msg);
$mail->AddAddress('a@a.com', 'Conexão Inteligente');

if (!$mail->Send()) {
	echo 'Erro ao enviar mensagem';
} else {
	echo 'Mensagem enviada com sucesso';
}