<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav info-color-dark">
    <!-- SideNav slide-out button -->
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
    </div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-dn mr-auto">
     <!-- <p>Modals</p> -->
    </div>
    <!-- Navbar links -->
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-danger" aria-labelledby="userDropdown">
                <a class="dropdown-item" id="cual"><i class="fas fa-user mr-2 blue-text"></i>My Account</a>
                <a class="dropdown-item" href="index.php?var_=Ult"><i class="fas fa-sign-out-alt mr-2 blue-text"></i>Log Out</a>
            </div>
        </li>
    </ul>
</nav>
<!-- Modal Account -->
<div class="modal fade right" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header light-blue darken-3 white-text">
                <h4 class=""><i class="fas fa-user mr-2"></i>My Account</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formNewPassword" id="formNewPassword" method="post" action="index.php?var_=Ult">
                <div class="modal-body mb-0">
                    <div class="md-form form-sm">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" id="accountLogin" name="accountLogin" value="<?php echo $_SESSION["ses_login_jabezTimotes"];?>" disabled class="form-control form-control-sm">
                    </div>
                    <div class="md-form form-sm">
                        <i class="fas fa-user prefix"></i>
                        <input type="text" id="accountNombre" name="accountNombre" value="<?php echo $_SESSION["ses_usuario_jabezTimotes"];?>" class="form-control form-control-sm">
                    </div>
                    <div class="md-form form-sm">
                        <i class="fas fa-key prefix"></i>
                        <input type="password" id="accountOldPW" name="accountOldPW" class="form-control form-control-sm">
                        <label for="form1">Old Password</label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fas fa-key prefix"></i>
                        <input type="password" id="accountNewPW" name="accountNewPW" class="form-control form-control-sm">
                        <label for="form2">New Password</label>
                    </div>
                    <div class="text-center mt-1-half">
                        <button class="btn btn-danger mb-2" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                        <button type="button" name="BotonSalvar" id="BotonSalvar" disabled class="btn btn-info mb-2">Send <i class="fas fa-paper-plane ml-1"></i></button>
                        <input type="hidden" name="PwOculto" id="PwOculto" value="<?php echo $_SESSION["ses_pw_jabezTimotes"];?>">
                        <input type="hidden" name="IDUsuarioPW" id="IDUsuarioPW" value="<?php echo $_SESSION["ses_id_jabezTimotes"];?>">
                        <input type="hidden" name="btnSaveAccount" id="btnSaveAccount" value="Y">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Script-->
<script src="js/jquery.js"></script>
<script>
    $(function () 
    {
        // Password Change
		$('#cual').click(function () 
        {
            $("#accountOldPW").val("");
			$('#modalContactForm').modal('show');
		})
        
        // Verificar Pasword entrado
        $("#accountOldPW").change(function()
        {
            var estaVisible = $('#modalContactForm').is(':visible');
            if(estaVisible)
            {
                var claveGuardada=$("#PwOculto").val();
                var claveColocada=$("#accountOldPW").val();
                if(claveGuardada != claveColocada)
                {
                    alert("Wrong Current Password");
                    $("#accountOldPW").val("");
                    $("#accountOldPW").focus();
                    return;
                }else{
                    $('#BotonSalvar').prop('disabled', false);    
                }
            }
        })

        $("#BotonSalvar").click(function()
        {
            var nuevaClave = $("#accountNewPW").val();
            if(nuevaClave=="" || nuevaClave=="null")
            {
                alert("Error: New Password field was left empty !!");
                $("#accountNewPW").focus();
                return;
            }else{
                $("#formNewPassword").submit();
            }
        })
    });
</script>