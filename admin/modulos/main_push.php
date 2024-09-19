<div class="container-fluid">
    <div class="card card-cascade narrower">
        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center" id="Tblbotones">
            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Send"  id="Push_Add">
                    <i class="fas fa-paper-plane mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Resend"  id="Push_Resend">
                    <i class="fas fa-repeat mt-0"></i>
                </button>
            </div>
            <a href="#" class="white-text text-left mx-3">Push Notifications</a>
            <div>
            </div>
        </div>
        <div class="px-4">
            <div class="table-wrapper">
                <table class="table table-sm table-bordered table-hover"
                    id="tabla_push"
                    data-toggle="table"
                    data-search="true"
                    data-click-to-select="true"
                    data-pagination="true"
                    data-height="600"
                    data-search-align="left"
                    data-show-fullscreen="true"
                    data-show-refresh="true"
                    data-show-toggle="true"
                    data-id-field="Push_ID"
                    data-select-item-name="Push_ID"
                    data-buttons-class="blue lighten-4 btn-md"
                    data-show-columns="true"
                    data-show-export="true"
                    data-page-list="[10, 25, 50, 100, 200, All]"
                    data-export-options='{"fileName": "ListUsers"}'
                    data-export-types='{"doc","excel","pdf"}'
                    data-url="json/json_push.php">
                    <thead class="blue accent-5 white-text">
                        <tr>
                            <th data-radio="true" data-show-select-title="true">&#10003;</th>
                            <th data-field="push_id" data-switchable="false" data-sortable="true" data-align="center"><i class="fas fa-portrait mr-2"></i>ID</th>
                            <th data-field="push_title" data-sortable="true" data-halign="center" data-align="left"><i class="fas fa-prescription-bottle mr-2"></i>Title</th>
                            <th data-field="push_mensaje" data-sortable="false" data-halign="center" data-align="left"><i class="fas fa-envelope-open-text mr-2"></i>Message</th>
                            <th data-field="push_datesend" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-clock mr-2"></i>Sent Date</th>
                            <th data-field="push_tipo" data-sortable="false" data-halign="center" data-align="center" data-formatter="pushColores"><i class="fas fa-truck mr-2"></i>Delivery</th>
                            <th data-field="push_destino" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-mobile-alt mr-2"></i>Devices</th>
                            <th data-field="push_grupo" data-visible="false">Grupo</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Send Message -->
<div class="modal fade" id="AddModalPush" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-notify modal-info modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-bell mr-1"></i>Send Push Notification</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>
            <form name="formPushMessage" id="formPushMessage" method="post" action="index.php?xpt=003">
                <div class="modal-body">
                    <div class="row">
                        <!-- Receiver -->
                        <div class="col-md-3 mb-3">
                            <i class="fas fa-mail-bulk indigo-text"></i>
                            <label for="Scheduling_Selected" class="active"><em>Receiver</em></label>
                            <select class="selectpicker" name="Scheduling_Selected" id="Scheduling_Selected">
                                <option selected value="">- Select -</option>
                                <option value="All">All Users</option>
                                <option value="Coaches">Coaches</option>
                                <option value="Parents">Parents</option>
                                <option value="Players">Players</option>
                                <option value="Admins">Admins</option>
                            </select>
                        </div>
                        <div class="col-md-1 mb-3"></div>
                        <select hidden name="SelectPinCual" id="SelectPinCual"></select>
                        <!-- All -->    
                        <div class="col-md-4 mb-3" id="DivAll" hidden>
                            <i class="w-fa fas fa-users indigo-text"></i>
                            <label class="active">&nbsp;All Users</label>
                            <select class="selectpicker" name="Scheduling_All[]" id="Scheduling_All" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count" data-actions-box="true"></select>
                        </div>
                        <!-- Coaches -->    
                        <div class="col-md-4 mb-3" id="DivCoaches" hidden>
                            <i class="w-fa fas fa-baseball-ball indigo-text"></i>
                            <label class="active">Coaches</label>
                            <select class="selectpicker" name="Scheduling_Coaches[]" id="Scheduling_Coaches" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count>1" data-actions-box="true"></select>
                        </div>
                        <!-- Parents -->
                        <div class="col-lg-6 mb-3" id="DivParents" hidden>
                            <i class="psi-male-female indigo-text"></i>
                            <label for="Scheduling_Parents" class="active">Parents</label>
                            <select class="selectpicker" name="Scheduling_Parents[]" id="Scheduling_Parents" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count" data-actions-box="true"></select>
                        </div>
                        <!-- Players -->
                        <div class="col-lg-6 mb-3" id="DivPlayers" hidden>
                            <i class="psi-cool-guy indigo-text"></i>
                            <label for="Scheduling_Players" class="active">Players</label>
                            <select class="selectpicker" name="Scheduling_Players[]" id="Scheduling_Players" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count" data-actions-box="true"></select>
                        </div>
                        <!-- Admins -->
                        <div class="col-lg-6 mb-3" id="DivAdmins" hidden>
                            <i class="psi-business-mens indigo-text"></i>
                            <label for="Scheduling_Admins" class="active">Admins</label>
                            <select class="selectpicker" name="Scheduling_Admins[]" id="Scheduling_Admins" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count" data-actions-box="true"></select>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-users indigo-text mr-2"></i>
                            <label for="Push_Title" class="active red-text"><em>Title</em></label>
                            <input type="text" name="Push_Title" id="Push_Title" class="form-control" placeholder="max 20 character">
                        </div>
                        <!-- Agendado -->
                        <div class="custom-control custom-checkbox form-control col-md-2 mb-2 align-self-end">
                            <input type="checkbox" name="Push_When" id="Push_When" class="custom-control-input" value="now" checked>
                            <label class="custom-control-label" for="Push_When">Send Now</label>
                        </div>
                        <!-- Date -->
                        <div class="col-md-3 mb-2" id="mostrarDateHidden">
                            <i class="fas fa-calendar indigo-text"></i>
                            <label for="Push_ScheduleDate" class="active red-text"><em>Date</em></label>
                            <input type="date" name="Push_ScheduleDate" id="Push_ScheduleDate" class="form-control datepicker indigo-text" readonly>
                        </div>
                        <!-- Time -->
                        <div class="col-md-3 mb-2" id="mostrarTimeHidden">
                            <i class="fas fa-clock indigo-text"></i>
                            <label for="Push_Time" class="active red-text"><em>Time</em></label>
                            <input type="text" name="Push_Time" id="Push_Time" class="form-control timepicker indigo-text" readonly>
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <!-- Mensaje -->
                        <div class="emoji-picker-container col-md-12 mb-4">
                            <i class="fas fa-keyboard indigo-text"></i>
                            <label for="Push_MessageSend" class="active red-text"><em>Message</em></label>
                            <textarea name="Push_MessageSend" id="Push_MessageSend" class="form-control" style="width: 400px; height: 60px" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="form-btnSendPush"><i class="fas fa-paper-plane mr-2"></i>Send</button>
                    <input type="Hidden" name="btnPushSend" value="Y">
                    <input type="Hidden" name="cuantosSelectedPushSend" id="cuantosSelectedPushSend">
                </div>
            </form>  
        </div>
    </div>
</div>
<!-- Resend Message -->
<div class="modal fade" id="ResendModalPush" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-notify modal-info modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-bell mr-1"></i>Resend Push Notification</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>
            <form name="formResendMessage" id="formResendMessage" method="post" action="index.php?xpt=003">
                <div class="modal-body">
                    <div class="row">
                        <!-- Receiver -->
                        <div class="col-md-3 mb-3">
                            <i class="fas fa-mail-bulk indigo-text"></i>
                            <label for="ResendWho_Selected" class="active"><em>Receiver</em></label>
                            <select class="selectpicker" name="ResendWho_Selected" id="ResendWho_Selected">
                                <option selected value="">- Select -</option>
                                <option value="All">All Users</option>
                                <option value="Coaches">Coaches</option>
                                <option value="Parents">Parents</option>
                                <option value="Players">Players</option>
                                <option value="Admins">Admins</option>
                            </select>
                        </div>
                        <div class="col-md-1 mb-3"></div>
                        <select hidden name="ResendSelectPinCual" id="ResendSelectPinCual"></select>
                        <!-- All -->    
                        <div class="col-md-4 mb-3" id="DivAllResend" hidden>
                            <i class="w-fa fas fa-users indigo-text"></i>
                            <label class="active">&nbsp;All Users</label>
                            <select class="selectpicker" name="ResendScheduling_All[]" id="ResendScheduling_All" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count" data-actions-box="true"></select>
                        </div>
                        <!-- Coaches -->    
                        <div class="col-md-4 mb-3" id="DivCoachesResend" hidden>
                            <i class="w-fa fas fa-baseball-ball indigo-text"></i>
                            <label class="active">Coaches</label>
                            <select class="selectpicker" name="SchedulingResend_Coaches[]" id="SchedulingResend_Coaches" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count>1" data-actions-box="true"></select>
                        </div>
                        <!-- Parents -->
                        <div class="col-lg-6 mb-3" id="DivParentsResend" hidden>
                            <i class="psi-male-female indigo-text"></i>
                            <label for="SchedulingResend_Parents" class="active">Parents</label>
                            <select class="selectpicker" name="SchedulingResend_Parents[]" id="SchedulingResend_Parents" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count" data-actions-box="true"></select>
                        </div>
                        <!-- Players -->
                        <div class="col-lg-6 mb-3" id="DivPlayersResend" hidden>
                            <i class="psi-cool-guy indigo-text"></i>
                            <label for="SchedulingResend_Players" class="active">Players</label>
                            <select class="selectpicker" name="SchedulingResend_Players[]" id="SchedulingResend_Players" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count" data-actions-box="true"></select>
                        </div>
                        <!-- Admins -->
                        <div class="col-lg-6 mb-3" id="DivAdminsResend" hidden>
                            <i class="psi-business-mens indigo-text"></i>
                            <label for="SchedulingResend_Admins" class="active">Admins</label>
                            <select class="selectpicker" name="SchedulingResend_Admins[]" id="SchedulingResend_Admins" multiple data-width="120%" data-style="btn-info" data-live-search="true" data-selected-text-format="count" data-actions-box="true"></select>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-users indigo-text mr-2"></i>
                            <label for="PushResend_Title" class="active red-text"><em>Title</em></label>
                            <input type="text" name="PushResend_Title" id="PushResend_Title" class="form-control" placeholder="max 20 character">
                        </div>
                        <!-- Agendado -->
                        <div class="custom-control custom-checkbox form-control col-md-2 mb-2 align-self-end">
                            <input type="checkbox" name="PushResend_When" id="PushResend_When" class="custom-control-input" value="now" checked>
                            <label class="custom-control-label" for="PushResend_When">Send Now</label>
                        </div>
                        <!-- Date -->
                        <div class="col-md-3 mb-2" id="ViewDateHidden">
                            <i class="fas fa-calendar indigo-text"></i>
                            <label for="PushResend_ScheduleDate" class="active red-text"><em>Date</em></label>
                            <input type="date" name="PushResend_ScheduleDate" id="PushResend_ScheduleDate" class="form-control datepicker indigo-text" readonly>
                        </div>
                        <!-- Time -->
                        <div class="col-md-3 mb-2" id="ViewTimeHidden">
                            <i class="fas fa-clock indigo-text"></i>
                            <label for="PushResend_Time" class="active red-text"><em>Time</em></label>
                            <input type="text" name="PushResend_Time" id="PushResend_Time" class="form-control timepicker indigo-text" readonly>
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <!-- Mensaje -->
                        <div class="emoji-picker-container col-md-12 mb-4">
                            <i class="fas fa-keyboard indigo-text"></i>
                            <label for="Push_MessageReSend" class="active red-text"><em>Message</em></label>
                            <textarea name="Push_MessageReSend" id="Push_MessageReSend" class="form-control" style="width: 400px; height: 60px" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="form-btnReSendPush"><i class="fas fa-paper-plane mr-2"></i>Send</button>
                    <input type="Hidden" name="btnPushReSend" value="Y">
                    <input type="Hidden" name="cuantosPushReSend" id="cuantosPushReSend">
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
        $("#Push_MessageSend").emojioneArea({
            filtersPosition: "bottom"
        });
        $("#Push_MessageReSend").emojioneArea({
            filtersPosition: "bottom"
        });

        // Select
        // $('#Scheduling_Coaches').selectpicker();

        // DatePicker
        $('#Push_ScheduleDate').pickadate(
            {formatSubmit: 'yyyy-mm-dd'}
        );
        $('#PushResend_ScheduleDate').pickadate(
            {formatSubmit: 'yyyy-mm-dd'}
        );

        // TimePicker
        $('#Push_Time').pickatime(
        {
            twelvehour: false
        });
        $('#PushResend_Time').pickatime(
        {
            twelvehour: false
        });

        // Add
		$('#Push_Add').click(function () 
        {
            $('#formPushMessage')[0].reset();
            $('#mostrarDateHidden').hide();
            $('#mostrarTimeHidden').hide();
			$('#AddModalPush').modal('show');
		})

        // Resend
		$('#Push_Resend').click(function () 
        {
            id = $('#tabla_push').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(id != "")
            {
                var data = JSON.stringify($("#tabla_push").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var titulo = obj[0].push_title;
                var mensaje = obj[0].push_mensaje;
                $('#formResendMessage')[0].reset();
                $('#ViewDateHidden').hide();
                $('#ViewTimeHidden').hide();
                $('#PushResend_Title').val(titulo);
                $("#Push_MessageReSend")[0].emojioneArea.setText(mensaje);
                $('#ResendModalPush').modal('show');
            }else{
                alert("Error !! You must be select a Message");
            }
		})

        // Confirm Push Notifications
        $('#form-btnSendPush').click(function()
        {
            // Select
            var seleccionHizo = $("#Scheduling_Selected").val();
            if( seleccionHizo == '')
            {
                alert("Please Select a Group");
                $('#Scheduling_Selected').focus();
                return;
            }

            // Validar Empresa
            var whenCuando = $('#Push_When').prop('checked');
            // Validar Mensaje
            var selecTextArea = $('#Push_MessageSend').val();
            if( selecTextArea == '')
            {
                alert("Error !! Message is empty");
                $('#Push_MessageSend').focus();
                return;
            }
            // Validar date & Time
            if(whenCuando == false)
            {
                var pushFecha = $('#Push_ScheduleDate').val();
                var pushHora = $('#Push_Time').val();
                // Fecha
                if(pushFecha == '')
                {
                    alert("Error !! You must be select a valid date");
                    $('#Push_ScheduleDate').focus();
                    return;
                }
                // Hora
                if(pushHora == '')
                {
                    alert("Error !! You must be select a valid time");
                    $('#Push_Time').focus();
                    return;
                }
            }
            // Validar Usuarios
            var selecAll = $("#Scheduling_All").serialize();
            var selecCoach = $("#Scheduling_Coaches").serialize();
            var selecParents= $('#Scheduling_Parents').serialize();
            var selecPlayers = $('#Scheduling_Players').serialize();
            var selecAdmins = $('#Scheduling_Admins').serialize();
            switch(seleccionHizo)
            {
                case "All":
                    if(selecAll == "") 
                    {
                        alert("Error: You should select a User");
                        $("#Scheduling_All").focus();
                        return;
                    }
                break;

                case "Coaches":
                    if(selecCoach == "") 
                    {
                        alert("Error: You should select a Coach");
                        $("#Scheduling_Coaches").focus();
                        return;
                    }
                break;

                case "Parents":
                    if(selecParents == "") 
                    {
                        alert("Error: You should select a Parent");
                        $("#Scheduling_Parents").focus();
                        return;
                    }
                break;

                case "Players":
                    if(selecPlayers == "") 
                    {
                        alert("Error: You should select a Player");
                        $("#Scheduling_Players").focus();
                        return;
                    }
                break;

                case "Admins":
                    if(selecAdmins == "") 
                    {
                        alert("Error: You should select a User");
                        $("#Scheduling_Admins").focus();
                        return;
                    }
                break;
            }
            $('#formPushMessage').submit();
        })

        // Agendado/Verificar
        $("#Push_When").click(function()
        {
            if($('#Push_When').prop('checked'))
            {
                $('#mostrarDateHidden').hide();
                $('#mostrarTimeHidden').hide();
            }else{
                $("#Push_ScheduleDate").val("");
                $("#Push_Time").val("");
                $('#mostrarDateHidden').show();
                $('#mostrarTimeHidden').show();
            }
        })

        // Selected/Users
        $("#Scheduling_Selected").change(function () 
        {
            var seleccionado = $("#Scheduling_Selected").val();
            switch(seleccionado)
            {
                case 'All':
                    $("#DivAll").prop("hidden",false);
                    $("#DivCoaches").prop("hidden",true);
                    $("#DivParents").prop("hidden",true);
                    $("#DivPlayers").prop("hidden",true);
                    $("#DivAdmins").prop("hidden",true);
                    $('#Scheduling_Players').selectpicker('deselectAll');
                    $('#Scheduling_Parents').selectpicker('deselectAll');
                    $('#Scheduling_Coaches').selectpicker('deselectAll');
                    $('#Scheduling_Admins').selectpicker('deselectAll');
                    $('#Scheduling_All').empty();
                    $.get("json/json_userfilters.php", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#Scheduling_All').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#Scheduling_All').selectpicker('refresh');
                        $('#Scheduling_All').selectpicker('selectAll');
                    });
                break;
                
                case 'Coaches':
                    $("#DivCoaches").prop("hidden",false);
                    $("#DivParents").prop("hidden",true);
                    $("#DivPlayers").prop("hidden",true);
                    $("#DivAdmins").prop("hidden",true);
                    $("#DivAll").prop("hidden",true);
                    $('#Scheduling_Players').selectpicker('deselectAll');
                    $('#Scheduling_Parents').selectpicker('deselectAll');
                    $('#Scheduling_All').selectpicker('deselectAll');
                    $('#Scheduling_Admins').selectpicker('deselectAll');
                    $('#Scheduling_Coaches').empty();
                    $.get("json/json_userfilters.php?tp=C", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#Scheduling_Coaches').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#Scheduling_Coaches').selectpicker('refresh');
                        $('#Scheduling_Coaches').selectpicker('selectAll');
                    });
                break;

                case 'Parents':
                    $("#DivParents").prop("hidden",false);
                    $("#DivCoaches").prop("hidden",true);
                    $("#DivPlayers").prop("hidden",true);
                    $("#DivAdmins").prop("hidden",true);
                    $("#DivAll").prop("hidden",true);
                    $('#Scheduling_Coaches').selectpicker('deselectAll');
                    $('#Scheduling_Players').selectpicker('deselectAll');
                    $('#Scheduling_Admins').selectpicker('deselectAll');
                    $('#Scheduling_All').selectpicker('deselectAll');
                    $('#Scheduling_Parents').empty();
                    $.get("json/json_userfilters.php?tp=R", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#Scheduling_Parents').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#Scheduling_Parents').selectpicker('refresh');
                        $('#Scheduling_Parents').selectpicker('selectAll');
                    });
                break;

                case 'Players':
                    $("#DivPlayers").prop("hidden",false);
                    $("#DivCoaches").prop("hidden",true);
                    $("#DivParents").prop("hidden",true);
                    $("#DivAll").prop("hidden",true);
                    $("#DivAdmins").prop("hidden",true);
                    $('#Scheduling_Parents').selectpicker('deselectAll');
                    $('#Scheduling_Coaches').selectpicker('deselectAll');
                    $('#Scheduling_All').selectpicker('deselectAll');
                    $('#Scheduling_Admins').selectpicker('deselectAll');
                    $('#Scheduling_Players').empty();
                    $.get("json/json_userfilters.php?tp=P", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#Scheduling_Players').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#Scheduling_Players').selectpicker('refresh');
                        $('#Scheduling_Players').selectpicker('selectAll');
                    });
                break;

                case 'Admins':
                    $("#DivAdmins").prop("hidden",false);
                    $("#DivPlayers").prop("hidden",true);
                    $("#DivCoaches").prop("hidden",true);
                    $("#DivParents").prop("hidden",true);
                    $("#DivAll").prop("hidden",true);
                    $('#Scheduling_Parents').selectpicker('deselectAll');
                    $('#Scheduling_Coaches').selectpicker('deselectAll');
                    $('#Scheduling_All').selectpicker('deselectAll');
                    $('#Scheduling_Players').selectpicker('deselectAll');
                    $('#Scheduling_Admins').empty();
                    $.get("json/json_userfilters.php?tp=A", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#Scheduling_Admins').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#Scheduling_Admins').selectpicker('refresh');
                        $('#Scheduling_Admins').selectpicker('selectAll');
                    });
                break;

                default:
                    $("#DivCoaches").prop("hidden",true);
                    $("#DivParents").prop("hidden",true);
                    $("#DivPlayers").prop("hidden",true);
                    $("#DivAll").prop("hidden",true);
                    $("#DivAdmins").prop("hidden",true);
                    $('#Scheduling_Coaches').selectpicker('deselectAll');
                    $('#Scheduling_Parents').selectpicker('deselectAll');
                    $('#Scheduling_Players').selectpicker('deselectAll');
                    $('#Scheduling_All').selectpicker('deselectAll');
                    $('#Scheduling_Admins').selectpicker('deselectAll');
                    $('#Scheduling_All').empty();
                    $('#Scheduling_Coaches').empty();
                    $('#Scheduling_Parents').empty();
                    $('#Scheduling_Players').empty();
                    $('#Scheduling_Admins').empty();
                break;    
            }
        })

        // Confirm Resend Notifications
        $('#form-btnReSendPush').click(function()
        {
            // Select
            var seleccionHizo = $("#ResendWho_Selected").val();
            if( seleccionHizo == '')
            {
                alert("Please Select a Group");
                $('#ResendWho_Selected').focus();
                return;
            }

            // Validar Empresa
            var whenCuando = $('#PushResend_When').prop('checked');
            // Validar Mensaje
            var selecTextArea = $('#Push_MessageReSend').val();
            if( selecTextArea == '')
            {
                alert("Error !! Message is empty");
                $('#Push_MessageReSend').focus();
                return;
            }
            // Validar date & Time
            if(whenCuando == false)
            {
                var pushFecha = $('#PushResend_ScheduleDate').val();
                var pushHora = $('#PushResend_Time').val();
                // Fecha
                if(pushFecha == '')
                {
                    alert("Error !! You must be select a valid date");
                    $('#PushResend_ScheduleDate').focus();
                    return;
                }
                // Hora
                if(pushHora == '')
                {
                    alert("Error !! You must be select a valid time");
                    $('#PushResend_Time').focus();
                    return;
                }
            }
            // Validar Usuarios
            var selecAll = $("#ResendScheduling_All").serialize();
            var selecCoach = $("#SchedulingResend_Coaches").serialize();
            var selecParents= $('#SchedulingResend_Parents').serialize();
            var selecPlayers = $('#SchedulingResend_Players').serialize();
            var selecAdmins = $('#SchedulingResend_Admins').serialize();
            switch(seleccionHizo)
            {
                case "All":
                    if(selecAll == "") 
                    {
                        alert("Error: You should select a User");
                        $("#ResendScheduling_All").focus();
                        return;
                    }
                break;

                case "Coaches":
                    if(selecCoach == "") 
                    {
                        alert("Error: You should select a Coach");
                        $("#SchedulingResend_Coaches").focus();
                        return;
                    }
                break;

                case "Parents":
                    if(selecParents == "") 
                    {
                        alert("Error: You should select a Parent");
                        $("#SchedulingResend_Parents").focus();
                        return;
                    }
                break;

                case "Players":
                    if(selecPlayers == "") 
                    {
                        alert("Error: You should select a Player");
                        $("#SchedulingResend_Players").focus();
                        return;
                    }
                break;

                case "Admins":
                    if(selecAdmins == "") 
                    {
                        alert("Error: You should select a User");
                        $("#SchedulingResend_Admins").focus();
                        return;
                    }
                break;
            }
            $('#formResendMessage').submit();
        })

        // Agendado/Verificar/Resend
        $("#PushResend_When").click(function()
        {
            if($('#PushResend_When').prop('checked'))
            {
                $('#ViewDateHidden').hide();
                $('#ViewTimeHidden').hide();
            }else{
                $("#Push_ScheduleDate").val("");
                $("#PushResend_Time").val("");
                $('#ViewDateHidden').show();
                $('#ViewTimeHidden').show();
            }
        })

        // Selected/Users/Resend
        $("#ResendWho_Selected").change(function () 
        {
            var seleccionado = $("#ResendWho_Selected").val();
            switch(seleccionado)
            {
                case 'All':
                    $("#DivAllResend").prop("hidden",false);
                    $("#DivCoachesResend").prop("hidden",true);
                    $("#DivParentsResend").prop("hidden",true);
                    $("#DivPlayersResend").prop("hidden",true);
                    $("#DivAdminsResend").prop("hidden",true);
                    $('#SchedulingResend_Players').selectpicker('deselectAll');
                    $('#SchedulingResend_Parents').selectpicker('deselectAll');
                    $('#SchedulingResend_Coaches').selectpicker('deselectAll');
                    $('#SchedulingResend_Admins').selectpicker('deselectAll');
                    $('#ResendScheduling_All').empty();
                    $.get("json/json_userfilters.php", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#ResendScheduling_All').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#ResendScheduling_All').selectpicker('refresh');
                        $('#ResendScheduling_All').selectpicker('selectAll');
                    });
                break;
                
                case 'Coaches':
                    $("#DivCoachesResend").prop("hidden",false);
                    $("#DivParentsResend").prop("hidden",true);
                    $("#DivPlayersResend").prop("hidden",true);
                    $("#DivAdminsResend").prop("hidden",true);
                    $("#DivAllResend").prop("hidden",true);
                    $('#SchedulingResend_Players').selectpicker('deselectAll');
                    $('#SchedulingResend_Parents').selectpicker('deselectAll');
                    $('#ResendScheduling_All').selectpicker('deselectAll');
                    $('#SchedulingResend_Admins').selectpicker('deselectAll');
                    $('#SchedulingResend_Coaches').empty();
                    $.get("json/json_userfilters.php?tp=C", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#SchedulingResend_Coaches').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#SchedulingResend_Coaches').selectpicker('refresh');
                        $('#SchedulingResend_Coaches').selectpicker('selectAll');
                    });
                break;

                case 'Parents':
                    $("#DivParentsResend").prop("hidden",false);
                    $("#DivCoachesResend").prop("hidden",true);
                    $("#DivPlayersResend").prop("hidden",true);
                    $("#DivAdminsResend").prop("hidden",true);
                    $("#DivAllResend").prop("hidden",true);
                    $('#SchedulingResend_Coaches').selectpicker('deselectAll');
                    $('#SchedulingResend_Players').selectpicker('deselectAll');
                    $('#SchedulingResend_Admins').selectpicker('deselectAll');
                    $('#ResendScheduling_All').selectpicker('deselectAll');
                    $('#SchedulingResend_Parents').empty();
                    $.get("json/json_userfilters.php?tp=R", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#SchedulingResend_Parents').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#SchedulingResend_Parents').selectpicker('refresh');
                        $('#SchedulingResend_Parents').selectpicker('selectAll');
                    });
                break;

                case 'Players':
                    $("#DivPlayersResend").prop("hidden",false);
                    $("#DivCoachesResend").prop("hidden",true);
                    $("#DivParentsResend").prop("hidden",true);
                    $("#DivAllResend").prop("hidden",true);
                    $("#DivAdminsResend").prop("hidden",true);
                    $('#SchedulingResend_Parents').selectpicker('deselectAll');
                    $('#SchedulingResend_Coaches').selectpicker('deselectAll');
                    $('#ResendScheduling_All').selectpicker('deselectAll');
                    $('#SchedulingResend_Admins').selectpicker('deselectAll');
                    $('#SchedulingResend_Players').empty();
                    $.get("json/json_userfilters.php?tp=P", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#SchedulingResend_Players').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#SchedulingResend_Players').selectpicker('refresh');
                        $('#SchedulingResend_Players').selectpicker('selectAll');
                    });
                break;

                case 'Admins':
                    $("#DivAdminsResend").prop("hidden",false);
                    $("#DivPlayersResend").prop("hidden",true);
                    $("#DivCoachesResend").prop("hidden",true);
                    $("#DivParentsResend").prop("hidden",true);
                    $("#DivAllResend").prop("hidden",true);
                    $('#SchedulingResend_Parents').selectpicker('deselectAll');
                    $('#SchedulingResend_Coaches').selectpicker('deselectAll');
                    $('#ResendScheduling_All').selectpicker('deselectAll');
                    $('#SchedulingResend_Players').selectpicker('deselectAll');
                    $('#SchedulingResend_Admins').empty();
                    $.get("json/json_userfilters.php?tp=A", function(data)
                    {
                        var response = JSON.parse(data);
                        $.each(response, function(i, obj)
                        {
                            $('#SchedulingResend_Admins').append($('<option>').text(obj.access_usuario_nombre).attr('value', obj.access_pin));
                        });
                        $('#SchedulingResend_Admins').selectpicker('refresh');
                        $('#SchedulingResend_Admins').selectpicker('selectAll');
                    });
                break;

                default:
                    $("#DivCoachesResend").prop("hidden",true);
                    $("#DivParentsResend").prop("hidden",true);
                    $("#DivPlayersResend").prop("hidden",true);
                    $("#DivAllResend").prop("hidden",true);
                    $("#DivAdminsResend").prop("hidden",true);
                    $('#SchedulingResend_Coaches').selectpicker('deselectAll');
                    $('#SchedulingResend_Parents').selectpicker('deselectAll');
                    $('#SchedulingResend_Players').selectpicker('deselectAll');
                    $('#ResendScheduling_All').selectpicker('deselectAll');
                    $('#SchedulingResend_Admins').selectpicker('deselectAll');
                    $('#ResendScheduling_All').empty();
                    $('#SchedulingResend_Coaches').empty();
                    $('#SchedulingResend_Parents').empty();
                    $('#SchedulingResend_Players').empty();
                    $('#SchedulingResend_Admins').empty();
                break;    
            }
        })
    })

    function pushColores(value)
	{
        var valorAsignado = value;
        var valorRetornado = "";
        if(valorAsignado=='Standard')
        {
            valorRetornado='<span class="blue-text font-italic">'+valorAsignado+'</span>';
        }else{
            valorRetornado='<span class="green-text font-italic">'+valorAsignado+'</span>';
        }
        return valorRetornado;
    }
</script>