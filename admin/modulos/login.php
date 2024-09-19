<?php
 /*	
	Login
	Autor: Edgar Rafael García
	Fecha: Julio 2019
*/
?>
<?php
if(isset($_POST['boton_login']))
{
	// Buscar usuario en BD
	$MyQuery = "SELECT * FROM ".TABLA_USUARIOS." WHERE usuario_login='$_POST[loginTXT]' AND usuario_clave='$_POST[passwordTXT]'";
	$mi_consulta->conectar();
	$mi_consulta->ejecutar_consulta($MyQuery);
	$fila=$mi_consulta->valores_campo();
	$registros=$mi_consulta->total_registros();
	if ($registros==0)
	{	
		echo "<script>alert('User not found !!')</script>";
	}else{
		$_SESSION["ses_id_jabezTimotes"]=$fila["id_usuario"];
		$_SESSION["ses_usuario_jabezTimotes"]=$fila["usuario_nombre"];
		$_SESSION["ses_login_jabezTimotes"]=$fila["usuario_login"];
		$_SESSION["ses_pw_jabezTimotes"]=$fila["usuario_clave"];
		$_SESSION["ses_tipo_jabezTimotes"]=$fila["usuario_tipo"];
		$_SESSION['ses_jabezTimotes']=true;
		header("location:index.php");
	}
}
?>
<title>.:TimotesMachineShop:.</title>
<style>
	html,
	body,
	header,
	.view {
		height: 100%;
	}
	@media (min-width: 560px) and (max-width: 740px) {
		html,
		body,
		header,
		.view {
			height: 650px;
		}
	}
	@media (min-width: 800px) and (max-width: 850px) {
		html,
		body,
		header,
		.view  {
			height: 650px;
		}
	}
</style>
<div class="view" style="background-image: url('img/wallengine.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	<section class="view intro-2">
		<div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
						<div class="card wow fadeIn" data-wow-delay="0.2s">
							<div class="card-body">
								<form name="frmLogin" id="frmLogin" class="form-horizontal" method="POST" action="index.php">
									<div class="form-header blue-gradient">
										<h4 class="font-weight-100 my-2 py-1"><i class="fas fa-key"></i> System Access</h4>
									</div>
									<div class="md-form">
										<i class="fas fa-user prefix white-text"></i>
										<input type="text" name="loginTXT" id="loginTXT" class="form-control">
										<label>Your email</label>
									</div>
									<div class="md-form">
										<i class="fas fa-lock prefix white-text"></i>
										<input type="password" name="passwordTXT" id="passwordTXT" class="form-control">
										<label>Your password</label>
									</div>
									<div class="text-center">
										<button name="boton_login" type="submit" value='N' id="boton_login" class="btn btn-red btn-lg"><i class="fas fa-sign-in-alt mr-1"></i> Sign in</button>
										<hr class="mt-4">
									</div>
								</form>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- <script src="js/jquery.js"></script> -->
<script>
	// $(function () 
	// {
	// 	$('#boton_login').click(function () 
	// 	{
	// 		if($('#loginTXT').val()=='')
	// 		{
	// 			alert("Email can't be blank");
	// 			$("#loginTXT").focus();
	// 			return false;
	// 		}
	// 		if($('#passwordTXT').val()=='')
	// 		{
	// 			alert("Password can't be blank");
	// 			$("#passwordTXT").focus();
	// 			return false;
	// 		}
	// 		$("#boton_login").val('Y');
	// 		$("#frmLogin").submit();
	// 	})
	// })
</script>