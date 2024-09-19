<?php
// Print
if($_POST['printWorkOrders']=='Y')
{
    include_once(DIR_MODULOS.'pdf_woprint.php');
}
// Label
if($_POST['labelWorkOrders']=='Y')
{
    include_once(DIR_MODULOS.'pdf_wolabel.php');
}
?>
<div class="container-fluid">
    <div class="card card-cascade narrower">
        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center" id="Tblbotones">
            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Add" id="WorkOrder_Add">
                    <i class="fas fa-plus mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="View" id="WorkOrder_View">
                    <i class="fas fa-eye mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Edit" id="WorkOrder_Edit">
                    <i class="fas fa-pencil-alt mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Print" id="WorkOrder_Print">
                    <i class="fas fa-print mt-0"></i>
                </button>
            </div>
            <a href="#" class="white-text text-center mx-3">Work Orders</a>
            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Label" id="WorkOrder_Label">
                    <i class="fas fa-tags mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="E-mail" id="WorkOrder_Email">
                    <i class="fas fa-paper-plane mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Delivered" id="WorkOrder_Delivered">
                    <i class="fas fa-check"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Delete" id="WorkOrder_Delete">
                    <i class="far fa-trash-alt mt-0"></i>
                </button>
            </div>
        </div>
        <div class="px-4">
            <div class="table-wrapper">
                <table class="table table-sm table-bordered table-hover-edgar"
                    id="tabla_workorders"
                    data-toggle="table"
                    data-search="true"
                    data-click-to-select="true"
                    data-single-select="true"
                    data-pagination="true"
                    data-height="600"
                    data-search-align="left"
                    data-show-fullscreen="true"
                    data-show-refresh="true"
                    data-show-toggle="true"
                    data-id-field="WorkOrder_ID"
                    data-select-item-name="WorkOrder_ID"
                    data-buttons-class="blue lighten-4 btn-md"
                    data-show-columns="true"
                    data-show-export="true"
                    data-row-style="rowStyle"
                    data-page-size="25"
                    data-page-list="[25, 50, 100, 200, All]"
                    data-export-options='{"fileName": "ListWorkOrders"}'
                    data-export-types='{"doc","excel","pdf"}'
                    data-url="json/json_workorders.php">
                    <thead class="blue accent-5 white-text">
                        <tr>
                            <th data-radio="true" class="active" data-show-select-title="true">&#10003;</th>
                            <th data-field="WorkOrder_ID" data-switchable="false" data-sortable="true" class="text-center"><i class="fab fa-slack-hash mr-2"></i>ID</th>
                            <th data-field="WorkOrder_Fecha" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-list mr-2"></i>Work Order Date</th>
                            <th data-field="WorkOrder_Cliente" data-sortable="true" data-halign="center" data-align="left"><i class="fas fa-user mr-2"></i>Client</th>
                            <th data-field="WorkOrder_Marca" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-car mr-2"></i>Make</th>
                            <th data-field="WorkOrder_Modelo" data-sortable="true" data-halign="center" data-align="center"><i class="fa fa-tasks mr-2"></i>Model</th>
                            <th data-field="WorkOrder_Motor" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-cogs mr-2"></i>Motor</th>
                            <th data-field="WorkOrder_Year" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-calendar mr-2"></i>Year</th>
                            <th data-field="WorkOrder_Servicio" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-info-circle mr-2"></i>Service</th>
                            <th data-field="WorkOrder_Amount" data-sortable="true" data-halign="center" data-align="center" data-formatter="montoColores"><i class="fas fa-dollar mr-2"></i>Amount</th>
                            <th data-field="WorkOrder_Delivered" data-sortable="true" data-halign="center" data-align="center" data-formatter="estatusColores"><i class="fas fa-check mr-2"></i>Delivered</th>
                            <th data-field="WorkOrder_Company" data-switchable="false" data-visible="false">Company</th>
                            <th data-field="WorkOrder_Phone" data-switchable="false" data-visible="false">Phone</th>
                            <th data-field="WorkOrder_Email" data-switchable="false" data-visible="false">Email</th>
                            <th data-field="WorkOrder_Address" data-switchable="false" data-visible="false">Address</th>
                            <th data-field="WorkOrder_FechaDos" data-switchable="false" data-visible="false">Fecha</th>
                            <th data-field="WorkOrder_Distro" data-switchable="false" data-visible="false">Distribution</th>
                            <th data-field="WorkOrder_Note" data-switchable="false" data-visible="false">Note</th>
                            <th data-field="WorkOrder_ClienteID" data-switchable="false" data-visible="false">ClienteID</th>
                            <th data-field="WorkOrder_ServicioID" data-switchable="false" data-visible="false">ServiceID</th>
                            <th data-field="WorkOrder_MarcaID" data-switchable="false" data-visible="false">MarcaID</th>
                            <th data-field="WorkOrder_ModeloID" data-switchable="false" data-visible="false">ModeloID</th>
                            <th data-field="fechaSinFormato" data-visible="false">Fecha Sin Formato</th>
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
                <p class="heading lead"><i class="fas fa-plus mr-2"></i>Add Work Order</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="FrmAddWorkOrder" id="FrmAddWorkOrder" method="post" action="index.php?xpt=002">
                <div class="modal-body">
                    <div class="row">
                        <!-- Client -->
                        <div class="col-lg-6 mb-2">
                            <i class="fas fa-user pink-text"></i>
                            <label for="Client_Selected" class="active"><em>Client</em></label>
                            <select class="selectpicker" name="Client_Selected" id="Client_Selected" data-width="100%" data-style="btn-info" data-live-search="true" data-actions-box="true" title="Select a Client...">
                                <?php
                                $myQuery = "SELECT
                                    db_clientes.id_clientes, 
                                    db_clientes.clientes_nombre,
                                    db_clientes.clientes_empresa
                                    FROM
                                    db_clientes";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option data-subtext='".$registro[2]."' value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Add Customers -->
                        <div class="d-flex align-items-end mb-3">
                            <button class="btn btn-light-green btn-md" type="button" id="btnAddCliente"><i class="fas fa-user-friends mr-2"></i>+ New</button>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Phone -->
                        <div class="col-md-3 mb-2">
                            <i class="fas fa-mobile-alt red-text"></i>
                            <label for="Client_Phone" class="active"><em>Phone Number</em></label>
                            <input type="tel" name="Client_Phone" id="Client_Phone" class="form-control red-text" disabled>
                        </div>
                        <!-- Address -->
                        <div class="col-md-5 mb-2">
                            <i class="fas fa-map-marker prefix red-text"></i>
                            <label for="Client_Address" class="active"><em>Address</em></label>
                            <input type="text" name="Client_Address" id="Client_Address" class="form-control red-text" disabled>
                        </div>
                        <!-- Email -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-envelope red-text"></i>
                            <label for="Client_Email" class="active"><em>eMail</em></label>
                            <input type="email" name="Client_Email" id="Client_Email" class="form-control red-text" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Date -->
                        <div class="col-md-3 mb-2">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="WorkOrder_Date"><em>Date</em></label>
                            <input type="date" name="WorkOrder_Date" id="WorkOrder_Date" class="form-control datepicker indigo-text" readonly data-value="<?php echo date("j, n, Y");?>">
                        </div>
                        <!-- Pieza -->
                        <div class="col-md-3 mb-2">
                            <i class="fas fa-puzzle-piece red-text"></i>
                            <label for="WorkOrder_Part" class="active"><em>Part</em></label>
                            <select class="selectpicker" name="WorkOrder_Part[]" id="WorkOrder_Part" multiple data-width="100%" data-style="btn-info" data-live-search="true" data-selected-text-format="count>1" data-actions-box="false">
                                <?php
                                $myQuery = "SELECT
                                    db_piezas.pieza_id,
                                    db_piezas.pieza_nombre 
                                    FROM
                                    db_piezas 
                                    ORDER BY db_piezas.pieza_nombre";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Services -->
                        <div class="col-md-6 mb-2">
                            <i class="fas fa-wrench pink-text"></i>
                            <label for="Services_Selected" class="active"><em>Services</em></label>
                            <select class="selectpicker" name="Services_Selected" id="Services_Selected" data-width="100%" data-style="btn-info" data-live-search="true" data-actions-box="true">
                                <option selected value="">- Select -</option>
                                <?php
                                $myQuery = "SELECT
                                    db_services.id_service, 
                                    db_services.service_cual
                                    FROM
                                    db_services
                                    ORDER BY db_services.service_cual";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Make -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-car pink-text"></i>
                            <label for="Cars_Selected" class="active"><em>Make</em></label>
                            <select class="selectpicker" name="Cars_Selected" id="Cars_Selected" data-width="100%" data-style="btn-info" data-live-search="true" data-actions-box="true">
                                <option selected value="">- Select -</option>
                                <?php
                                $myQuery = "SELECT
                                    db_carro_marca.marca_id, 
                                    db_carro_marca.marca_nombre
                                    FROM
                                    db_carro_marca";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Models -->
                        <div class="col-md-4 mb-2">
                            <i class="fa fa-tasks pink-text"></i>
                            <label for="CarsModel_Selected" class="active">Model</label>
                            <select class="selectpicker" name="CarsModel_Selected" id="CarsModel_Selected" data-style="btn-info" data-live-search="true" data-actions-box="true"></select>
                        </div>
                        <!-- Trim -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-cogs pink-text"></i>
                            <label for="CarsTrim_Selected" class="active">Motor</label>
                            <input type="text" name="CarsTrim_Selected" id="CarsTrim_Selected" class="form-control indigo-text">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Year -->
                        <div class="col-md-2 mb-2">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="CarsYear_Selected" class="active"><em>Year</em></label>
                            <input type="number" name="CarsYear_Selected" id="CarsYear_Selected" class="form-control red-text" min="1960" max="2030" step="1" value=""/>
                        </div>
                        <!-- Distribution -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-map-marker prefix red-text"></i>
                            <label for="Services_Distribution" class="active"><em>Distribution</em></label>
                            <select class="form-control" name="Services_Distribution" id="Services_Distribution">
                                <option value="Drop Off">Drop Off</option>
                                <option value="Pickup">Pickup</option>
                            </select>
                        </div>
                        <!-- Amount -->
                        <div class="col-md-2 mb-2">
                            <i class="fas fa-dollar red-text"></i>
                            <label for="Client_Amount" class="active"><em>Amount</em></label>
                            <input type="text" name="Client_Amount" id="Client_Amount" class="form-control red-text">
                        </div>                        
                    </div>
                    <div class="row">
                        <!-- Notes -->
                        <div class="col-md-8 mb-2">
                            <i class="fas fa-comments prefix red-text"></i>
                            <label for="Services_Note" class="active"><em>Comments</em></label>
                            <input type="text" name="Services_Note" id="Services_Note" class="form-control red-text"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="form-btnAddWorkOrder"><i class="fas fa-save mr-2"></i>Save</button>
                    <input type="Hidden" name="btnAddWorkOrder" value="Y">
                </div>
            </form> 
        </div>
    </div>
</div>
<!-- View -->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-eye mr-2"></i>View Work Order</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Client -->
                    <div class="col-lg-6 mb-3">
                        <i class="fas fa-user indigo-text"></i>
                        <label for="ClientView_Selected" class="active"><em>Client</em></label>
                        <input type="text" name="ClientView_Selected" id="ClientView_Selected" class="form-control red-text" disabled>
                    </div>
                    <!-- Company -->
                    <div class="col-md-6 mb-4">
                        <i class="fas fa-building indigo-text"></i>
                        <label for="ClientView_Company" class="active"><em>Company</em></label>
                        <input type="text" name="ClientView_Company" id="ClientView_Company" class="form-control red-text" disabled>
                    </div>
                </div>
                <div class="row">
                    <!-- Phone -->
                    <div class="col-md-3 mb-2">
                        <i class="fas fa-mobile-alt indigo-text"></i>
                        <label for="ClientView_Phone" class="active"><em>Phone Number</em></label>
                        <input type="text" name="ClientView_Phone" id="ClientView_Phone" class="form-control red-text" disabled>
                    </div>
                    <!-- Address -->
                    <div class="col-md-5 mb-2">
                        <i class="fas fa-map-marker prefix indigo-text"></i>
                        <label for="ClientView_Address" class="active"><em>Address</em></label>
                        <input type="text" name="ClientView_Address" id="ClientView_Address" class="form-control red-text" disabled>
                    </div>
                    <!-- Email -->
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-envelope indigo-text"></i>
                        <label for="ClientView_Email" class="active"><em>eMail</em></label>
                        <input type="text" name="ClientView_Email" id="ClientView_Email" class="form-control red-text" disabled>
                    </div>
                </div>
                <div class="row">
                    <!-- Date -->
                    <div class="col-md-3 mb-2">
                        <i class="fas fa-calendar indigo-text"></i>
                        <label for="WorkOrderView_Date"><em>Date</em></label>
                        <input type="text" name="WorkOrderView_Date" id="WorkOrderView_Date" class="form-control red-text" disabled>
                    </div>
                    <!-- Pieza -->
                    <div class="col-md-3 mb-2">
                        <i class="fas fa-puzzle-piece indigo-text"></i>
                        <label for="WorkOrderView_Part" class="active"><em>Part</em></label>
                        <select class="form-control red-text" name="WorkOrderView_Part" id="WorkOrderView_Part"></select>
                    </div>
                    <!-- Services -->
                    <div class="col-md-6 mb-2">
                        <i class="fas fa-wrench indigo-text"></i>
                        <label for="ServicesView_Selected" class="active"><em>Services</em></label>
                        <input type="text" name="ServicesView_Selected" id="ServicesView_Selected" class="form-control red-text" disabled>
                    </div>
                </div>
                <div class="row">
                    <!-- Make -->
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-car indigo-text"></i>
                        <label for="CarsView_Selected" class="active"><em>Make</em></label>
                        <input type="text" name="CarsView_Selected" id="CarsView_Selected" class="form-control red-text" disabled>
                    </div>
                    <!-- Models -->
                    <div class="col-md-4 mb-2">
                        <i class="fa fa-tasks indigo-text"></i>
                        <label for="CarsModelView_Selected" class="active">Model</label>
                        <input type="text" name="CarsModelView_Selected" id="CarsModelView_Selected" class="form-control red-text" disabled>
                    </div>
                    <!-- Trim -->
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-cogs indigo-text"></i>
                        <label for="CarsTrimView_Selected" class="active">Motor</label>
                        <input type="text" name="CarsTrimView_Selected" id="CarsTrimView_Selected" class="form-control red-text" disabled>
                    </div>
                </div>
                <div class="row">
                    <!-- Year -->
                    <div class="col-md-2 mb-2">
                        <i class="fas fa-calendar indigo-text"></i>
                        <label for="CarsYearView_Selected" class="active"><em>Year</em></label>
                        <input type="text" name="CarsYearView_Selected" id="CarsYearView_Selected" class="form-control red-text" disabled/>
                    </div>
                    <!-- Distribution -->
                    <div class="col-md-4 mb-2">
                        <i class="fas fa-map-marker prefix indigo-text"></i>
                        <label for="ServicesView_Distribution" class="active"><em>Distribution</em></label>
                        <input type="text" name="ServicesView_Distribution" id="ServicesView_Distribution" class="form-control red-text" disabled/>
                    </div>
                    <!-- Amount -->
                    <div class="col-md-2 mb-2">
                        <i class="fas fa-dollar indigo-text"></i>
                        <label for="ClientView_Amount" class="active"><em>Amount</em></label>
                        <input type="text" name="ClientView_Amount" id="ClientView_Amount" class="form-control red-text" disabled>
                    </div>                     
                </div>
                <div class="row">
                    <!-- Notes -->
                    <div class="col-md-8 mb-2">
                        <i class="fas fa-comments prefix indigo-text"></i>
                        <label for="ServicesView_Note" class="active"><em>Comments</em></label>
                        <input type="text" name="ServicesView_Note" id="ServicesView_Note" class="form-control red-text" disabled/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-pencil-alt mr-2"></i>Edit Work Order</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formEditWorkOrder" id="formEditWorkOrder" method="post" action="index.php?xpt=002">
                <div class="modal-body">
                    <div class="row">
                        <!-- Client -->
                        <div class="col-lg-6 mb-2">
                            <i class="fas fa-user indigo-text"></i>
                            <label for="ClientEdit_Selected" class="active"><em>Client</em></label>
                            <select class="selectpicker" name="ClientEdit_Selected" id="ClientEdit_Selected" data-width="100%" data-style="btn-info" data-live-search="true" data-actions-box="true" title="Select a Client...">
                                <?php
                                $myQuery = "SELECT
                                    db_clientes.id_clientes, 
                                    db_clientes.clientes_nombre,
                                    db_clientes.clientes_empresa
                                    FROM
                                    db_clientes
                                    ORDER BY db_clientes.clientes_nombre ASC";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option data-subtext='".$registro[2]."' value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Phone -->
                        <div class="col-md-3 mb-2">
                            <i class="fas fa-mobile-alt indigo-text"></i>
                            <label for="ClientEdit_Phone" class="active"><em>Phone Number</em></label>
                            <input type="text" name="ClientEdit_Phone" id="ClientEdit_Phone" class="form-control red-text" disabled>
                        </div>
                        <!-- Address -->
                        <div class="col-md-5 mb-2">
                            <i class="fas fa-map-marker prefix indigo-text"></i>
                            <label for="ClientEdit_Address" class="active"><em>Address</em></label>
                            <input type="text" name="ClientEdit_Address" id="ClientEdit_Address" class="form-control red-text" disabled>
                        </div>
                        <!-- Email -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-envelope indigo-text"></i>
                            <label for="ClientEdit_Email" class="active"><em>eMail</em></label>
                            <input type="text" name="ClientEdit_Email" id="ClientEdit_Email" class="form-control red-text" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Date -->
                        <div class="col-md-3 mb-2">
                            <i class="fas fa-calendar indigo-text"></i>
                            <label for="WorkOrderEdit_Date"><em>Date</em></label>
                            <input type="date" name="WorkOrderEdit_Date" id="WorkOrderEdit_Date" class="form-control datepicker indigo-text" readonly>
                        </div>
                        <!-- Pieza -->
                        <div class="col-md-3 mb-2">
                            <i class="fas fa-puzzle-piece indigo-text"></i>
                            <label for="WorkOrderEdit_Part" class="active"><em>Part</em></label>
                            <select class="selectpicker" name="WorkOrderEdit_Part[]" id="WorkOrderEdit_Part" multiple data-width="100%" data-style="btn-info" data-live-search="true" data-selected-text-format="count>1" data-actions-box="false">
                                <?php
                                $myQuery = "SELECT
                                    db_piezas.pieza_id,
                                    db_piezas.pieza_nombre 
                                    FROM
                                    db_piezas 
                                    ORDER BY db_piezas.pieza_nombre";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Services -->
                        <div class="col-md-6 mb-2">
                            <i class="fas fa-wrench indigo-text"></i>
                            <label for="ServicesEdit_Selected" class="active"><em>Services</em></label>
                            <select class="selectpicker" name="ServicesEdit_Selected" id="ServicesEdit_Selected" data-width="100%" data-style="btn-info" data-live-search="true" data-selected-text-format="count>1" data-actions-box="false">
                                <?php
                                $myQuery = "SELECT
                                    db_services.id_service, 
                                    db_services.service_cual
                                    FROM
                                    db_services
                                    ORDER BY db_services.service_cual";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Make -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-car indigo-text"></i>
                            <label for="CarsEdit_Selected" class="active"><em>Make</em></label>
                            <select class="selectpicker" name="CarsEdit_Selected" id="CarsEdit_Selected" data-width="100%" data-style="btn-info" data-live-search="true">
                                <?php
                                $myQuery = "SELECT
                                    db_carro_marca.marca_id, 
                                    db_carro_marca.marca_nombre
                                    FROM
                                    db_carro_marca";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Models -->
                        <div class="col-md-4 mb-2">
                            <i class="fa fa-tasks indigo-text"></i>
                            <label for="CarsModelEdit_Selected" class="active">Model</label>
                            <select class="selectpicker" name="CarsModelEdit_Selected" id="CarsModelEdit_Selected" data-width="100%" data-style="btn-info" data-live-search="true">
                                <?php
                                $myQuery = "SELECT
                                    db_carro_modelo.modelo_id, 
                                    db_carro_modelo.modelo_nombre
                                    FROM
                                    db_carro_modelo";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Trim -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-cogs indigo-text"></i>
                            <label for="CarsTrimEdit_Selected" class="active">Motor</label>
                            <input type="text" name="CarsTrimEdit_Selected" id="CarsTrimEdit_Selected" class="form-control indigo-text">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Year -->
                        <div class="col-md-2 mb-2">
                            <i class="fas fa-calendar indigo-text"></i>
                            <label for="CarsYearEdit_Selected" class="active"><em>Year</em></label>
                            <input type="number" name="CarsYearEdit_Selected" id="CarsYearEdit_Selected" class="form-control indigo-text" min="1960" max="2030" step="1"/>
                        </div>
                        <!-- Distribution -->
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-map-marker prefix indigo-text"></i>
                            <label for="ServicesEdit_Distribution" class="active"><em>Distribution</em></label>
                            <select class="form-control indigo-text" name="ServicesEdit_Distribution" id="ServicesEdit_Distribution">
                                <option value="Drop Off">Drop Off</option>
                                <option value="Pickup">Pickup</option>
                            </select>                        
                        </div>
                        <!-- Amount -->
                        <div class="col-md-2 mb-2">
                            <i class="fas fa-dollar indigo-text"></i>
                            <label for="ClientEdit_Amount" class="active"><em>Amount</em></label>
                            <input type="text" name="ClientEdit_Amount" id="ClientEdit_Amount" class="form-control indigo-text">
                        </div>      
                    </div>
                    <div class="row">
                        <!-- Note -->
                        <div class="col-md-6 mb-2">
                            <i class="fas fa-comments prefix indigo-text"></i>
                            <label for="ServicesEdit_Note" class="active"><em>Comments</em></label>
                            <input type="text" name="ServicesEdit_Note" id="ServicesEdit_Note" class="form-control indigo-text"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-purple btn-md" type="button" id="form-btnEditPlayer"><i class="fas fa-sync-alt mr-2"></i>Update</button>
                    <input type="Hidden" name="btnEditWorkOrder" value="Y">
                    <input type="Hidden" name="fechaDMY" id="fechaDMY" value="Y">
                    <input type="Hidden" name="IDWorkOrderEdit" id="IDWorkOrderEdit">
                </div>
            </form> 
        </div>
    </div>
</div>
<!-- Imprimir WO -->
<form id="frm_imprimir" method="post" action="index.php?xpt=002">
	<input type="hidden" name="printWorkOrders" id="printWorkOrders" value="Y">
	<input type="hidden" name="printWoID" id="printWoID" value="Y">
</form>
<!-- Label -->
<form id="frm_label" method="post" action="index.php?xpt=002">
	<input type="hidden" name="labelWorkOrders" id="labelWorkOrders" value="Y">
	<input type="hidden" name="labelWoID" id="labelWoID" value="Y">
</form>
<!-- Send Email -->
<div class="modal fade" id="SendModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">                          
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fa fa-paper-plane mr-2"></i>Send Email</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formEmailSend" id="formEmailSend" method="post" action="index.php?xpt=002">
                <div class="modal-body">
                    <div class="d-flex justify-content-left">
                        <!-- Email -->
                        <div class="col-md-12 mb-2">
                            <i class="fas fa-envelope red-text"></i>
                            <label for="WorkOrder_EmailSend" class="active"><em>eMail</em></label>
                            <input type="email" name="WorkOrder_EmailSend" id="WorkOrder_EmailSend" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex justify-content-left">
                        <!-- Email CC -->
                        <div class="col-md-12 mb-2">
                            <i class="fas fa-mail-bulk red-text"></i>
                            <label for="WorkOrder_EmailCCSend" class="active"><em>CC</em></label>
                            <input type="email" name="WorkOrder_EmailCCSend" id="WorkOrder_EmailCCSend" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="SendEmail"><i class="fa fa-plane mr-2"></i>Send</button>
                    <input type="hidden" name="BtnSendEmail" id="BtnSendEmail" value="Y">
                    <input type="hidden" name="WoEmailID" id="WoEmailID">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delivered -->
<div class="modal fade" id="DeliveredModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" style="max-width: 20%;" role="document">                          
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fas fa-check mr-2"></i>Work Order Delivered</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formWODelivered" id="formWODelivered" method="post" action="index.php?xpt=002">
                <div class="modal-body">
                    <!-- Date -->
                    <div class="col-md-6 mb-3">
                        <i class="fas fa-calendar red-text"></i>
                        <label for="WorkOrderDelivered_Date"><em>Date</em></label>
                        <input type="date" name="WorkOrderDelivered_Date" id="WorkOrderDelivered_Date" class="form-control datepicker indigo-text" readonly>
                    </div>        
                    <!-- Delivered -->   
                    <div class="col-xl-10 mb-2">
                        <i class="fas fa-check red-text"></i>
                        <label for="WorkOrderDelivered_Who" class="active"><em>Receive by</em></label>
                        <input type="text" name="WorkOrderDelivered_Who" id="WorkOrderDelivered_Who" class="form-control red-text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="DeliveredWorkOrder"><i class="fas fa-save mr-2"></i>Delivered</button>
                    <input type="hidden" name="btnDeliveredWO" id="btnDeliveredWO" value="Y">
                    <input type="hidden" name="DelivereID" id="DelivereID">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="DeletedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead"><i class="far fa-trash-alt mr-2 white-text"></i>Delete Work Order</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formDeleteWO" id="formDeleteWO" method="post" action="index.php?xpt=002">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                        <p></p>
                        <p class="text-center"><i class="far fa-trash-alt fa-4x"></i></p>
                        </div>
                        <div class="col-9">
                            <p>Delete Work Order, it is erase all the information in the DataBase. Do you want delete work order of <span class="red-text font-weight-bold font-italic mr-2" id='idClientDelete'></span> ?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>No</a>
                    <a type="button" class="btn btn-info" id="BotondeleteWO"><i class="fas fa-check mr-2"></i>Yes</a>
                    <input type="Hidden" name="btnDeleteWO" value="Y">
                    <input type="Hidden" name="DeleteID" id="DeleteID">
                </div>
            </form>    
        </div>
    </div>
</div>
<!-- Add Clientes -->
<div class="modal fade" id="AddModalCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <button class="btn btn-danger waves-effect btn-md" id="BtnCloseClient" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="form-btnAddClient"><i class="fas fa-save mr-2"></i>Save</button>
                    <input type="Hidden" name="btnAddClient" value="Y">
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
        // DatePicker
        $('#WorkOrder_Date').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(2000,1,01),
            selectYears: 18
        });
        // DatePicker (Edit)
        $('#WorkOrderEdit_Date').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(2000,1,01),
            selectYears: 18
        });
        // DatePicker (Delivered)
        $('#WorkOrderDelivered_Date').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            selectYears: 18,
            onStart: function() { this.set({ select: new Date()}); }
        });

        // Add
		$('#WorkOrder_Add').click(function () 
        {
			$('#AddModal').modal('show');
        })

        // Validar Add
        $("#form-btnAddWorkOrder").click(function () 
        {
            // Client
            if($("#Client_Selected").val() == "")
            {
                alert("Error: the client field is empty");
                $("#Client_Selected").focus();
                return;
            }
            // Date
            if($("#WorkOrder_Date").val()=="")
            {
                alert("Error: the date field name is empty");
                $("#WorkOrder_Date").focus();
                return;
            }
            // Pieza
            var selectPieza = $('#WorkOrder_Part').serialize();
            if(selectPieza == "") 
            {
                alert("Please select an option");
                $("#WorkOrder_Part").focus();
                return;
            }
            // Service
            if($("#Services_Selected").val() == "")
            {
                alert("Please select a service");
                $("#Services_Selected").focus();
                return;
            }
            // Make
            if($("#Cars_Selected").val() == "")
            {
                alert("Please select a make car");
                $("#Cars_Selected").focus();
                return;
            }
            // Model
            if($("#CarsModel_Selected").val() == "")
            {
                alert("Please select a car model");
                $("#CarsModel_Selected").focus();
                return;
            }
            // Trim
            if($("#CarsTrim_Selected").val() == "")
            {
                alert("Please select a car trim");
                $("#CarsTrim_Selected").focus();
                return;
            }
            // Year
            // if($("#CarsYear_Selected").val() == "")
            // {
            //     alert("Please select a year");
            //     $("#CarsYear_Selected").focus();
            //     return;
            // }
            $("#FrmAddWorkOrder").submit();
        })

        // View
        $('#WorkOrder_View').click(function () 
        {
            id = $('#tabla_workorders').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(id != "")
            {
                $('#WorkOrderView_Part').empty();
                var data = JSON.stringify($("#tabla_workorders").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var Cliente = obj[0].WorkOrder_Cliente;
                var Company = obj[0].WorkOrder_Company;
                var Phone = obj[0].WorkOrder_Phone;
                var Email = obj[0].WorkOrder_Email;
                var Address = obj[0].WorkOrder_Address;
                var Fecha = obj[0].WorkOrder_Fecha;
                var Service = obj[0].WorkOrder_Servicio;
                var Marca = obj[0].WorkOrder_Marca;
                var Modelo = obj[0].WorkOrder_Modelo;
                var Trim = obj[0].WorkOrder_Motor;
                var Year = obj[0].WorkOrder_Year;
                var Distro = obj[0].WorkOrder_Distro;
                var Note = obj[0].WorkOrder_Note;
                var Precio = obj[0].WorkOrder_Amount;
                $("#ClientView_Selected").val(Cliente);
                $("#ClientView_Company").val(Company);
                $("#ClientView_Phone").val(Phone);
                $("#ClientView_Email").val(Email);
                $("#ClientView_Address").val(Address);
                $("#WorkOrderView_Date").val(Fecha);
                $("#ServicesView_Selected").val(Service);
                $("#CarsView_Selected").val(Marca);
                $("#CarsModelView_Selected").val(Modelo);
                $("#CarsTrimView_Selected").val(Trim);
                $("#CarsYearView_Selected").val(Year);
                $("#ServicesView_Distribution").val(Distro);
                $("#ServicesView_Note").val(Note);
                $("#ClientView_Amount").val(Precio);
                $.get("json/json_partsselected.php?op="+id, function(data)
                {
                    var response = JSON.parse(data);
                    $.each(response, function(i, obj)
                    {
                        $('#WorkOrderView_Part').append($('<option>').text(obj.pieza_nombre));
                    });
                });
                $('#ViewModal').modal('show');
            }else{
                alert("Error !! You must be select a Work Order");
            }
		})

        // Edit
        $('#WorkOrder_Edit').click(function () 
        {
            id = $('#tabla_workorders').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(id != "")
            {
                var data = JSON.stringify($("#tabla_workorders").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var ClienteID = obj[0].WorkOrder_ClienteID;
                var Cliente = obj[0].WorkOrder_Cliente;
                var Company = obj[0].WorkOrder_Company;
                var Phone = obj[0].WorkOrder_Phone;
                var Email = obj[0].WorkOrder_Email;
                var Address = obj[0].WorkOrder_Address;
                var Fecha = obj[0].WorkOrder_Fecha;
                var Service = obj[0].WorkOrder_ServicioID;
                var Marca = obj[0].WorkOrder_MarcaID;
                var Modelo = obj[0].WorkOrder_ModeloID;
                var Trim = obj[0].WorkOrder_Motor;
                var Year = obj[0].WorkOrder_Year;
                var Distro = obj[0].WorkOrder_Distro;
                var Note = obj[0].WorkOrder_Note;
                var FechaSin = obj[0].fechaSinFormato;
                var Precio = obj[0].WorkOrder_Amount;
                var select_items = new Array();
                $.get("json/json_partsselected.php?op="+id, function(data)
                {
                    var json = $.parseJSON(data);
                    for (i = 0; i < json.length; i++) 
                    {
                        select_items.push(json[i].pieza_id);
                    }
                    $("#WorkOrderEdit_Part").selectpicker('val', select_items);
                });
                $("#ClientEdit_Selected").selectpicker('val', ClienteID);
                $("#ClientEdit_Company").val(Company);
                $("#ClientEdit_Phone").val(Phone);
                $("#ClientEdit_Email").val(Email);
                $("#ClientEdit_Address").val(Address);
                $("#WorkOrderEdit_Date").val(Fecha);
                $("#ServicesEdit_Selected").selectpicker('val', Service);
                $("#CarsEdit_Selected").selectpicker('val', Marca);
                $("#CarsModelEdit_Selected").selectpicker('val', Modelo);
                $("#CarsTrimEdit_Selected").val(Trim);
                $("#CarsYearEdit_Selected").val(Year);
                $("#ServicesEdit_Distribution").val(Distro);
                $("#ServicesEdit_Note").val(Note);
                $("#ClientEdit_Amount").val(Precio);
                $("#IDWorkOrderEdit").val(id);
                $("#fechaDMY").val(FechaSin);
                $('#EditModal').modal('show');
            }else{
                alert("Error !! You must be select a Work Order");
            }
		})

        // Validar Edit
        $("#form-btnEditPlayer").click(function () 
        {
            // Date
            if($("#WorkOrderEdit_Date").val()=="")
            {
                alert("Error: the date field name is empty");
                $("#WorkOrderEdit_Date").focus();
                return;
            }
            // Pieza
            var selectPieza = $('#WorkOrderEdit_Part').serialize();
            if(selectPieza == "") 
            {
                alert("Please select an option (Parts)");
                $("#WorkOrderEdit_Part").focus();
                return;
            }
            // Service
            if($("#ServicesEdit_Selected").val() == "")
            {
                alert("Please select a service");
                $("#ServicesEdit_Selected").focus();
                return;
            }
            // Model
            if($("#CarsModelEdit_Selected").val() == "")
            {
                alert("Please select a car model");
                $("#CarsModelEdit_Selected").focus();
                return;
            }
            // Trim
            if($("#CarsTrimEdit_Selected").val() == "")
            {
                alert("Please select a car trim");
                $("#CarsTrimEdit_Selected").focus();
                return;
            }
            // Year
            // if($("#CarsYearEdit_Selected").val() == "" || $("#CarsYearEdit_Selected").val() == 0)
            // {
            //     alert("Please select a year");
            //     $("#CarsYearEdit_Selected").focus();
            //     return;
            // }
            // Enviar Formulario
            $("#formEditWorkOrder").submit();
        })

        // Confirm Delete User
        $('#BotondeletePlayer').click(function()
        {
            $('#formDeletePlayer').submit();
        })

        // Selected/Clients
        $("#Client_Selected").change(function ()
        {
            var_seleccion = $(this).val();
            $.get("json/json_clients.php?", function(result)
            {
                var json = $.parseJSON(result);
                if (var_seleccion == 0) 
                {
                    $("#Client_Phone").val("");
                    $("#Client_Address").val("");
                    $("#Client_Email").val("");
                    $("#Client_Company").val("");
                }else{
                    for (i = 0; i < json.length; i++) 
                    {
                        if (json[i]['id_clientes'] == var_seleccion) 
                        {
                            $("#Client_Phone").val(json[i].clientes_phone);
                            $("#Client_Address").val(json[i].clientes_address);
                            $("#Client_Email").val(json[i].clientes_email);
                            $("#Client_Company").val(json[i].clientes_empresa);
                        }
                    }
                }
            });
        })

        // Selected/Cars
        $("#Cars_Selected").change(function ()
        {
            var valorCual = $(this).val();
            $('#CarsModel_Selected').empty();
            $('#CarsTrim_Selected').empty();
            // $('#CarsTrim_Selected').selectpicker('refresh');
            $.get("json/json_carselected.php?car="+valorCual, function(data)
            {
                $('#CarsModel_Selected').append($('<option selected value="">- Select -</option>'));
                var response = JSON.parse(data);
                $.each(response, function(i, obj)
                {
                    $('#CarsModel_Selected').append($('<option value='+obj.modelo_id+'>').text(obj.modelo_nombre));
                });
                $('#CarsModel_Selected').selectpicker('refresh');
            });
        })

        // Selected/Trim
        // $("#CarsModel_Selected").change(function()
        // {
        //     var CualModelo = $("#CarsModel_Selected").val();
        //     $('#CarsTrim_Selected').empty();
        //     $.get("json/json_trimselected.php?model="+CualModelo, function(data)
        //     {
        //         $('#CarsTrim_Selected').append($('<option selected value="">- Select -</option>'));
        //         var response = JSON.parse(data);
        //         $.each(response, function(i, obj)
        //         {
        //             $('#CarsTrim_Selected').append($('<option value='+obj.car_id+'>').text(obj.trim));
        //         });
        //         $('#CarsTrim_Selected').selectpicker('refresh');
        //     });
        // })

        // Selected/Clients/Edit
        $("#ClientEdit_Selected").change(function ()
        {
            var_seleccion = $(this).val();
            $.get("json/json_clients.php?", function(result)
            {
                var json = $.parseJSON(result);
                if (var_seleccion == 0) 
                {
                    $("#ClientEdit_Phone").val("");
                    $("#ClientEdit_Address").val("");
                    $("#ClientEdit_Email").val("");
                    $("#ClientEdit_Company").val("");
                }else{
                    for (i = 0; i < json.length; i++) 
                    {
                        if (json[i]['id_clientes'] == var_seleccion) 
                        {
                            $("#ClientEdit_Phone").val(json[i].clientes_phone);
                            $("#ClientEdit_Address").val(json[i].clientes_address);
                            $("#ClientEdit_Email").val(json[i].clientes_email);
                            $("#ClientEdit_Company").val(json[i].clientes_empresa);
                        }
                    }
                }
            });
        })

        // Selected/Cars/Edit
        $("#CarsEdit_Selected").change(function ()
        {
            var valorCual = $(this).val();
            $('#CarsModelEdit_Selected').empty();
            $('#CarsTrimEdit_Selected').empty();
            // $('#CarsTrimEdit_Selected').selectpicker('refresh');
            $.get("json/json_carselected.php?car="+valorCual, function(data)
            {
                $('#CarsModelEdit_Selected').append($('<option selected value="">- Select -</option>'));
                var response = JSON.parse(data);
                $.each(response, function(i, obj)
                {
                    $('#CarsModelEdit_Selected').append($('<option value='+obj.modelo_id+'>').text(obj.modelo_nombre));
                });
                $('#CarsModelEdit_Selected').selectpicker('refresh');
            });
        })

        // Selected/Trim/Edit
        // $("#CarsModelEdit_Selected").change(function()
        // {
        //     var CualModelo = $("#CarsModelEdit_Selected").val();
        //     $('#CarsTrimEdit_Selected').empty();
        //     $.get("json/json_trimselected.php?model="+CualModelo, function(data)
        //     {
        //         $('#CarsTrimEdit_Selected').append($('<option selected value="">- Select -</option>'));
        //         var response = JSON.parse(data);
        //         $.each(response, function(i, obj)
        //         {
        //             $('#CarsTrimEdit_Selected').append($('<option value='+obj.car_id+'>').text(obj.trim));
        //         });
        //         $('#CarsTrimEdit_Selected').selectpicker('refresh');
        //     });
        // })

        // WorkOrder Delivered
        $('#WorkOrder_Delivered').click(function()
        {
            id = $('#tabla_workorders').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(id != "")
            {   
                $("#DelivereID").val(id);
                $('#DeliveredModal').modal('show');
            }else{
                alert("Error !! You must be select a Work Order");
            }
        })

        // Confirm Delivered
        $('#DeliveredWorkOrder').click(function()
        {
            if($("#WorkOrderDelivered_Date").val()=="")
            {
                alert("Error: the date field to is empty");
                $("#WorkOrderDelivered_Date").focus();
                return;
            }
            $('#formWODelivered').submit();
        })

        // Delete WorkOrder
        $('#WorkOrder_Delete').click(function()
        {
            id = $('#tabla_workorders').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(id != "")
            {   
                var data = JSON.stringify($("#tabla_workorders").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var Cliente = obj[0].WorkOrder_Cliente;
                $("#DeleteID").val(id);
                $("#idClientDelete").text(Cliente);
                $('#DeletedModal').modal('show');
            }else{
                alert("Error !! You must be select a Work Order");
            }
        })

        // Confirm Delete
        $('#BotondeleteWO').click(function()
        {
            $('#formDeleteWO').submit();
        })

        // Print WorkOrder
        $('#WorkOrder_Print').click(function()
        {
            WoID = $('#tabla_workorders').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(WoID != "")
            {
                var dataString='printWoID='+WoID;
                var path = document.location.pathname;
                var directory = path.substring(path.indexOf('/'), path.lastIndexOf('/'))+'/tmp/';
                $.ajax({
                    type: "POST",
                    url: "modulos/pdf_woprint.php",
                    data: dataString,
                    success: function() 
                    {
                        printJS(directory+'wo_'+WoID+'.pdf')
                    }
                });
            }else{
                alert("Error !! You must be select a Work Order");
            }
        })

        // Print WorkOrder Label
		$('#WorkOrder_Label').click(function () 
        {
            id = $('#tabla_workorders').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(id != "")
            {
                $('#labelWoID').val(id);
                $('#frm_label').submit();
            }else{
                alert("Error !! You must be select a Work Order");
            }
        })

        // Email WorkOrder
		$('#WorkOrder_Email').click(function () 
        {
            id = $('#tabla_workorders').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(id != "")
            {
                var data = JSON.stringify($("#tabla_workorders").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var Email = obj[0].WorkOrder_Email;
                $('#WorkOrder_EmailSend').val(Email);
                $('#WoEmailID').val(id);
                $('#SendModal').modal('show');
            }else{
                alert("Error !! You must be select a Work Order");
            }
        })

        // Confirm Email
        $('#SendEmail').click(function()
        {
            if($("#WorkOrder_EmailSend").val()=="")
            {
                alert("Error: the email address is mandatory");
                $("#WorkOrder_EmailSend").focus();
                return;
            }
            $('#formEmailSend').submit();
        })

        // Agregar Clientes
        $('#btnAddCliente').click(function () 
        {
			$('#AddModalCliente').modal('show');
		});
        
        // Validar Add Clientes
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
            // Grabar Cliente
            var cliente = $("#Clients_Who").val();
            var address = $("#Clients_Address").val();
            var email = $("#Clients_Email").val();
            var phone = $("#Clients_Phone").val();
            var company = $("#Clients_Company").val();
            var dataString='company='+company+'&address='+address+'&cliente='+cliente+'&email='+email+'&phone='+phone;
            $.ajax({
                type: "POST",
                url: "json/json_savecliente.php",
                data: dataString
            });
            $('#Client_Selected').empty();
            $.get("json/json_clients.php",function(data)
            {
                var response = JSON.parse(data);
                $.each(response, function(i, obj)
                {
                    $('#Client_Selected').append($('<option data-address='+obj.clientes_address+' data-email='+obj.clientes_email+' data-phone='+obj.clientes_phone+' data-subtext='+obj.clientes_empresa+' value='+obj.id_clientes+'>').text(obj.clientes_nombre));
                });
                $('#Client_Selected').selectpicker('refresh');
            });
            $("#formAddClient")[0].reset();
            $('#AddModalCliente').modal('hide');
        })

        // Tabla Colores
        $('#tabla_workorders').on('click-row.bs.table', function (e, row, $element) 
        {
            $('.filaSelected').removeClass('filaSelected');
            $($element).addClass('filaSelected');
        });
    });
    function estatusColores(value)
	{
        var valorAsignado = value;
        var valorRetornado = "";
		switch (valorAsignado)
		{
            case 'Yes':
                valorRetornado='<span class="green-text font-italic">Yes</span>';
			break;

            default:
                valorRetornado='<span class="red-text font-italic">No</span>';
			break;
        }
        return valorRetornado;
    }
    function montoColores(value)
	{
        var valorAsignado = value;
        if (valorAsignado == null ||  valorAsignado == "")
        {
            valorRetornado='';
        }else{
            valorRetornado='<span class="blue-text">'+valorAsignado+'</span>';
        }
        return valorRetornado;
    }

    function rowStyle(row, index) 
    {
        var cualEs = moment(row.WorkOrder_Fecha).week();
        if(cualEs % 2 == 0)
        {
            return {classes: "tblcssPares" }
        }else{
            return {classes: "tblcssNones" }
        }
    }
</script>