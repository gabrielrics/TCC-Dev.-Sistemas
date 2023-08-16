<?php include("../login/cabecalho.php");
    /* 
	include('conexao.php');
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/login/style.css">.
    
        <title>Login</title>

	<!-- Abrindo script -->
	<script>
		// Abrindo função confere senha 
		function confereSenha() {		
			// Variáveis para o campo da senha e o campo de conferir senha
			const regPass = document.querySelector('input[name=regPass]');
			const regConfirm = document.querySelector('input[name=regConfirm]');

			// Se os campos coincidirem, prosseguir, se não, emitir mensagem
			if(regConfirm.value === regPass.value) {
				regConfirm.setCustomValidity('');
			} else {
				regConfirm.setCustomValidity('As senhas não conferem');
			}
		}
		// Fução para emitir alerta de sucesso ao cadastrar
		function sucesso() {
			alert("Usuário cadastrado com sucesso! :)")
		}

		</script>
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="full-height">
				<div class="center-box">
					<h2><span>Login </span><span>Cadastro</span></h2>
					<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
					<label for="reg-log"></label>
					<div class="card-3d-wrap">
						<div class="card-3d-wrapper">
							<div class="card-front">
								<div class="center-wrap">
									<div class="section text-center">
										<h4>Login</h4>
										<form action="" method="post">
											<div class="msg-error">
												<?php
													// Verificação se o email e senha coincidem com o banco
													if(isset($_POST['email']) || isset($_POST['senha'])) {

														$email = $mysqli->real_escape_string($_POST['email']);
														$senha = $mysqli->real_escape_string(sha1($_POST['senha']));
													
														$sql_code = "SELECT * FROM tbusuario WHERE email = '$email' AND senha = '$senha'";
														$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
												
														$quantidade = $sql_query->num_rows;

														if($quantidade == 1) {

															$usuario = $sql_query->fetch_assoc();
												
															if(!isset($_SESSION)) {
																session_start();
															}
												
															$_SESSION['id_usuario'] = $usuario['id_usuario'];
															$_SESSION['username'] = $usuario['username'];
												
															header("Location: index-usuario.php");
												
														} else {
															echo "Falha ao logar! E-mail ou senha incorretos.";
														}
													}																
												?>
											</div>
											<div class="form-group">
												<input type="email" name="email" required class="form-style" placeholder="Seu Email" id="logEmail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="senha" required class="form-style" placeholder="Sua Senha" id="logPass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<input type="submit" class="btn" value="Log In">
											<p><a href="#0" class="link">Esqueceu sua senha?</a></p>
										</form>
									</div>
								</div>
							</div>
							<div class="card-back">
								<div class="center-wrap">
									<div class="section text-center">
										<h4>Cadastro</h4>
										<form action="salvar-usuario.php" onsubmit="sucesso()"  method="post">
											<div class="form-group">
												<input type="text" name="regName" required class="form-style" placeholder="Seu Username" id="regName" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="regEmail" required class="form-style" placeholder="Seu Email" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="regPass" required onchange='confereSenha();' class="form-style" placeholder="Sua Senha" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" name="regConfirm" required onchange='confereSenha();' class="form-style" placeholder="Confirmar Senha" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
												<input type="submit" class="btn" value="Registrar">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>                    
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>