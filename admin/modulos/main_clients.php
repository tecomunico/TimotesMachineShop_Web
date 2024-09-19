<?php
if(isset($_POST['printClients']))
{
    include_once(DIR_MODULOS.'pdf_clients.php');
}
?>
<div class="container-fluid">
    <div class="card card-cascade narrower">
        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center" id="Tblbotones">
            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Add" id="Clients_Add">
                    <i class="fas fa-plus mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Edit" id="Clients_Edit">
                    <i class="fas fa-pencil-alt mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Delete" id="Clients_Delete">
                    <i class="far fa-trash-alt mt-0"></i>
                </button>
            </div>
            <a href="#" class="white-text text-center mx-3">Clients</a>
            <div>
            </div>
        </div>
        <div class="px-4">
            <div class="table-wrapper">
                <table class="table table-sm table-bordered table-hover-edgar"
                    id="tabla_clients"
                    data-toggle="table"
                    data-search="true"
                    data-click-to-select="true"
                    data-pagination="true"
                    data-height="600"
                    data-search-align="left"
                    data-show-fullscreen="true"
                    data-show-refresh="true"
                    data-show-toggle="true"
                    data-id-field="id_clientes"
                    data-select-item-name="id_clientes"
                    data-buttons-class="blue lighten-4 btn-md"
                    data-show-columns="true"
                    data-show-export="true"
                    data-page-list="[10, 25, 50, 100, 200, All]"
                    data-export-options='{"fileName": "ListClients"}'
                    data-export-types='{"doc","excel","pdf"}'
                    data-url="json/json_clients.php">
                    <thead class="blue accent-5 white-text">
                        <tr>
                            <th data-radio="true" data-show-select-title="true">&#10003;</th>
                            <th data-field="id_clientes" data-switchable="false" data-sortable="true" class="text-center">ID</th>
                            <th data-field="clientes_nombre" data-sortable="true" data-halign="center" data-align="left"><i class="fas fa-users mr-2"></i>Client</th>
                            <th data-field="clientes_empresa" data-sortable="true" data-halign="center" data-align="left"><i class="fas fa-map-marker mr-2"></i>Company</th>
                            <th data-field="clientes_phone" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-phone mr-2"></i>Phone</th>
                            <th data-field="clientes_email" data-sortable="true" data-halign="center" data-align="left"><i class="fas fa-envelope mr-2"></i>Email</th>
                            <th data-field="clientes_address" data-sortable="true" data-halign="center" data-align="left"><i class="fas fa-map-marker mr-2"></i>Address</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Add -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-plus mr-2"></i>Add Client</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formAddClient" id="formAddClient" method="post" action="index.php?xpt=001">
                <div class="modal-body">
                    <div class="row">
                        <!-- Client -->
                        <div class="col-md-6 mb-4">
                            <i class="fas fa-user indigo-text"></i>
                            <label for="Clients_Who" class="active"><em>Name</em></label>
                            <input type="text" name="Clients_Who" id="Clients_Who" class="form-control">
                        </div>
                        <!-- Phone -->
                        <div class="col-md-5 mb-4">
                            <i class="fas fa-mobile-alt indigo-text"></i>
                            <label for="Clients_Phone" class="active"><em>Phone Number</em></label>
                            <input type="tel" name="Clients_Phone" id="Clients_Phone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-5 mb-4">
                            <i class="fas fa-envelope indigo-text"></i>
                            <label for="Clients_Email" class="active"><em>eMail</em></label>
                            <input type="email" name="Clients_Email" id="Clients_Email" class="form-control">
                        </div>
                        <!-- Company -->
                        <div class="col-md-6 mb-4">
                            <i class="fas fa-envelope indigo-text"></i>
                            <label for="Clients_Company" class="active"><em>Company</em></label>
                            <input type="text" name="Clients_Company" id="Clients_Company" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Address -->
                        <div class="col-md-6 mb-4">
                            <i class="fas fa-map-marker indigo-text"></i>
                            <label for="Clients_Address" class="active"><em>Address</em></label>
                            <input type="text" name="Clients_Address" id="Clients_Address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="form-btnAddClient"><i class="fas fa-save mr-2"></i>Save</button>
                    <input type="Hidden" name="btnAddClient" value="Y">
                </div>
            </form> 
        </div>
    </div>
</div>
<!-- Edit -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-pencil-alt mr-2"></i>Edit Client</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formEditClient" id="formEditClient" method="post" action="index.php?xpt=001">
                <div class="modal-body">
                    <div class="row">
                        <!-- Client -->
                        <div class="col-md-6 mb-4">
                            <i class="fas fa-user indigo-text"></i>
                            <label for="ClientEdit_Who" class="active"><em>Name</em></label>
                            <input type="text" name="ClientEdit_Who" id="ClientEdit_Who" class="form-control">
                        </div>
                        <!-- Phone -->
                        <div class="col-md-5 mb-4">
                            <i class="fas fa-mobile-alt indigo-text"></i>
                            <label for="ClientEdit_Phone" class="active"><em>Phone Number</em></label>
                            <input type="tel" name="ClientEdit_Phone" id="ClientEdit_Phone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-5 mb-4">
                            <i class="fas fa-envelope indigo-text"></i>
                            <label for="ClientEdit_Email" class="active"><em>eMail</em></label>
                            <input type="email" name="ClientEdit_Email" id="ClientEdit_Email" class="form-control">
                        </div>
                        <!-- Company -->
                        <div class="col-md-6 mb-4">
                            <i class="fas fa-envelope indigo-text"></i>
                            <label for="ClientEdit_Company" class="active"><em>Company</em></label>
                            <input type="text" name="ClientEdit_Company" id="ClientEdit_Company" class="form-control">
                        </div>                        
                    </div>
                    <div class="row">
                        <!-- Address -->
                        <div class="col-md-6 mb-4">
                            <i class="fas fa-map-marker indigo-text"></i>
                            <label for="ClientEdit_Address" class="active"><em>Address</em></label>
                            <input type="text" name="ClientEdit_Address" id="ClientEdit_Address" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-purple btn-md" type="button" id="form-btnEditClient"><i class="fas fa-sync-alt mr-2"></i>Update</button>
                    <input type="Hidden" name="btnEditClient" value="Y">
                    <input type="Hidden" name="IDClientEdit" id="IDClientEdit">
                </div>
            </form>    
        </div>
    </div>
</div>
<!-- Imprimir -->
<!-- <form id="frm_imprimir" method="post" action="index.php?xpt=001">
	<input type="hidden" name="printClients" id="printClients" value="Y">
</form> -->
<!-- Delete -->
<div class="modal fade" id="DeletedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead"><i class="far fa-trash-alt mr-2 white-text"></i>Delete User </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formDeleteClient" id="formDeleteClient" method="post" action="index.php?xpt=001">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                        <p></p>
                        <p class="text-center"><i class="far fa-trash-alt fa-4x"></i></p>
                        </div>
                        <div class="col-9">
                            <p>Delete Client, it is erase all the information in the DataBase. Do you want Erase all information of <span class="red-text font-weight-bold font-italic mr-2" id='idClientDeleteTo'></span> ?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>No</a>
                    <a type="button" class="btn btn-info" id="FrmBtndeleteClient"><i class="fas fa-check mr-2"></i>Yes</a>
                    <input type="Hidden" name="btnDeleteClient" value="Y">
                    <input type="Hidden" name="idClientDelete" id="idClientDelete">
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
        // ToolTips
        $('[data-toggle="tooltip"]').tooltip()

        // Add
		$('#Clients_Add').click(function () 
        {
			$('#AddModal').modal('show');
        })

        // Validar Add
        $("#form-btnAddClient").click(function () 
        {
            // Client
            if($("#Clients_Who").val()=="")
            {
                alert("Error: Field Client name is empty");
                $("#Clients_Who").focus();
                return;
            }
            // Phone
            if($("#Clients_Phone").val()=="")
            {
                alert("Error: Field Phone Number is empty");
                $("#Clients_Phone").focus();
                return;
            }
            // Enviar Formulario
            $("#formAddClient").submit();
        })

        // Edit
        $('#Clients_Edit').click(function () 
        {
            id = $('#tabla_clients').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(id != "")
            {
                var data = JSON.stringify($("#tabla_clients").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var Nombre = obj[0].clientes_nombre;
                var Phone = obj[0].clientes_phone;
                var Email = obj[0].clientes_email;
                var Address = obj[0].clientes_address;
                var Empresa = obj[0].clientes_empresa;
                $("#ClientEdit_Who").val(Nombre);
                $("#ClientEdit_Who").css('color','blue');
                $("#ClientEdit_Phone").val(Phone);
                $("#ClientEdit_Phone").css('color','blue');
                $("#ClientEdit_Email").val(Email);
                $("#ClientEdit_Email").css('color','blue');
                $("#ClientEdit_Address").val(Address);
                $("#ClientEdit_Address").css('color','blue');
                $("#ClientEdit_Company").val(Empresa);
                $("#ClientEdit_Company").css('color','blue');
                $("#IDClientEdit").val(id);
                $('#EditModal').modal('show');
            }else{
                alert("Error !! You must be select a User");
            }
		})

        // Validar Edit
        $("#form-btnEditClient").click(function () 
        {
            // Client
            if($("#ClientEdit_Who").val()=="")
            {
                alert("Error: Field Client name is empty");
                $("#ClientEdit_Who").focus();
                return;
            }
            // Phone
            if($("#ClientEdit_Phone").val()=="")
            {
                alert("Error: Field Phone Number is empty");
                $("#ClientEdit_Phone").focus();
                return;
            }
            // Enviar Formulario
            $("#formEditClient").submit();
        })

        // PDF
		// $('#Clients_Pdf').click(function ()
        // {
		// 	$("#frm_imprimir").submit();
		// })

        // Delete Client
        $('#Clients_Delete').click(function()
        {   
            IDID = $('#tabla_clients').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(IDID != "")
            {
                var data = JSON.stringify($("#tabla_clients").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var nombre = obj[0].clientes_nombre;
                $('#idClientDeleteTo').text(nombre);
                $('#idClientDelete').val(IDID);
                $('#DeletedModal').modal('show');
            }else{
                alert("Error !! You must be select a Client");
            }
        })

        // Confirm Delete Client
        $('#FrmBtndeleteClient').click(function()
        {
            $('#formDeleteClient').submit();
        })

        // Tabla Colores
        $('#tabla_clients').on('click-row.bs.table', function (e, row, $element) 
        {
            $('.filaSelected').removeClass('filaSelected');
            $($element).addClass('filaSelected');
        });
    });
</script>