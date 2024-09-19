<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav sn-bg-5 fixed">
    <ul class="custom-scrollbar">
        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
            <div class="text-center">
                <a href="index.php" class="pl-0"><img src="img/jabezsoftware.png" style="width:150px;"></a>
            </div>
        </li>
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="index.php?xpt=001" class="collapsible-header waves-effect <?php if($_GET['xpt']=='001'){echo 'active';}?>"><i class="w-fa fas fa-user-friends"></i>Clients</a> <!-- 001 -->
                </li>
                <li>
                    <a href="index.php?xpt=002" class="collapsible-header waves-effect <?php if($_GET['xpt']=='002'){echo 'active';}?>""><i class="w-fa fas fa-tasks"></i>Work Orders</a> <!-- 002 -->
                </li>
                <li>
                    <a href="index.php?xpt=003" class="collapsible-header waves-effect <?php if($_GET['xpt']=='003'){echo 'active';}?>""><i class="w-fa fas fa-file-invoice"></i>Invoices</a> <!-- 003 -->
                </li>
                <!-- <li>
                    <a href="index.php?xpt=004" class="collapsible-header waves-effect <?php if($_GET['xpt']=='004'){echo 'active';}?>""><i class="w-fa fas fa-car"></i>CarData</a>
                </li> -->
                <li>
                    <a href="#" class="collapsible-header waves-effect arrow-r"><i class="w-fa fas fa-print"></i>Reports<i class="fas fa-angle-down rotate-icon"></i></a> <!-- 005 -->
                    <div class="collapsible-body">
                        <ul>
                            <!-- <li><a href="index.php?xpt=051" class="waves-effect"><i class="fas fa-user-friends"></i>Clients</a> 051</li> -->
                            <li><a href="#" id="Print_Clientes" class="waves-effect"><i class="fas fa-user-friends"></i>Clients</a> <!-- 051 --></li>
                            <li><a href="#MyModalWorkOrders" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-tasks"></i>Work Orders</a></li>
                            <li><a href="#MyModalInvoices" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-file-invoice"></i>Invoices</a></li>
                            <li><a href="#MyModalTaxes" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-dollar"></i>Taxes</a></li>
                        </ul>
                    </div>
                </li>                
                <li>
                    <a href="index.php?xpt=010" class="collapsible-header waves-effect <?php if($_GET['xpt']=='010'){echo 'active';}?>"><i class="w-fa fas fa-comments"></i>Messages</a> <!-- 010 -->
                </li>                
                <li>
                    <a href="#" class="collapsible-header waves-effect arrow-r"><i class="w-fa fas fa-cogs"></i>Settings<i class="fas fa-angle-down rotate-icon"></i></a> <!-- 011 -->
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#MyModalSetCompany" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-building"></i>Company</a></li>
                            <li><a href="#MyModalSetWO" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-tasks"></i>Work Orders</a></li>
                            <li><a href="#MyModalSetInvoice" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-file-invoice"></i>Invoices</a></li>
                            <li><a href="#MyModalSetParts" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-puzzle-piece"></i>Parts</a></li>
                            <li><a href="#MyModalSetServices" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-wrench"></i>Services</a></li>
                            <li><a href="#MyModalSetItems" data-toggle="modal" class="normal-link" class="waves-effect"><i class="fas fa-solid fa-fill"></i>Items</a></li>
                        </ul>
                    </div>
                </li>
                <?php
                if($_SESSION["ses_tipo_jabezTimotes"]=='W')
                {
                    echo '<li>';
                    if($_GET['xpt']=='100' or $_GET['xpt']=='101') 
                    {
                        echo '<a href="#" class="collapsible-header waves-effect arrow-r active"><i class="fas fa-hat-wizard"></i>WebMaster<i class="fas fa-angle-down rotate-icon"></i></a>';
                    }else{
                        echo '<a href="#" class="collapsible-header waves-effect arrow-r"><i class="fas fa-hat-wizard"></i>WebMaster<i class="fas fa-angle-down rotate-icon"></i></a>';
                    }
                    echo '<div class="collapsible-body">';
                    echo '<ul>';
                    echo '<li>';
                    if($_GET['xpt']=='100') // 100 
                    {
                        echo '<a href="index.php?xpt=100" class="waves-effect active"><i class="fas fa-users"></i>Users</a>';
                    }else{
                        echo '<a href="index.php?xpt=100" class="waves-effect"><i class="fas fa-users"></i>Users</a>';
                    }
                    if($_GET['xpt']=='101') // 101 
                    {
                        echo '<a href="index.php?xpt=101" class="waves-effect active"><i class="fas fa-database"></i> Logs</a>';
                    }else{
                        echo '<a href="index.php?xpt=101" class="waves-effect"><i class="fas fa-database"></i> Logs</a>';
                    }
                    echo '</li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</li>';
                }
                ?>
            </ul>
        </li>
    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div>
<!-- Print Report WorkOrders -->
<div class="modal fade" id="MyModalWorkOrders" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fa fa-print mr-2"></i>Print Work Orders</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formWOPrint" id="formWOPrint" method="post" action="index.php?xpt=002">
                <div class="modal-body">
                    <div class="row">
                        <!-- From -->
                        <div class="col-md-5 mb-3">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="WorkOrderPrint_Desde"><em>From</em></label>
                            <input type="date" name="WorkOrderPrint_Desde" id="WorkOrderPrint_Desde" class="form-control datepicker indigo-text" readonly>
                        </div>          
                        <!-- To -->
                        <div class="col-md-5 mb-3">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="WorkOrderPrint_Hasta"><em>To</em></label>
                            <input type="date" name="WorkOrderPrint_Hasta" id="WorkOrderPrint_Hasta" class="form-control datepicker indigo-text" readonly>
                        </div>          
                    </div>
                    <!-- Delivered -->    
                    <div class="row">        
                        <div class="col-md-4 mb-2">
                            <i class="fas fa-check red-text"></i>
                            <label for="WO_Delivered" class="active"><em>Delivered</em></label>
                            <select class="form-control" name="WO_Delivered" id="WO_Delivered">
                                <option value="All">All</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="PrintWorkOrder"><i class="fa fa-print mr-2"></i>Print</button>
                    <input type="hidden" name="printRecord" id="printRecord">
                    <input type="hidden" name="fechaDesdeHidden" id="fechaDesdeHidden">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Setting Company -->
<div class="modal fade" id="MyModalSetCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fas fa-building mr-2"></i>Setting Company</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formSettingCompany" id="formSettingCompany" method="post" action="index.php">
                <?php
                // Consulta BD
                $myQuery_a= "SELECT
                    db_parametros.id, 
                    db_parametros.prm_empresa, 
                    db_parametros.prm_direccion, 
                    db_parametros.prm_citymaszip, 
                    db_parametros.prm_email, 
                    db_parametros.prm_phone,
                    db_parametros.prm_taxes
                    FROM
                    db_parametros
                    WHERE db_parametros.id=1";
                    $mi_consulta->conectar();
                    $mi_consulta->ejecutar_consulta($myQuery_a);
                    $records=$mi_consulta->valores_campo();
                    $parm_empresa = $records['prm_empresa'];
                    $parm_address = $records['prm_direccion'];
                    $parm_citymaszip = $records['prm_citymaszip'];
                    $parm_email = $records['prm_email'];
                    $parm_phone = $records['prm_phone'];
                    $parm_taxes = $records['prm_taxes'];
                ?>
                <div class="modal-body">
                    <!-- Company -->
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <i class="fas fa-building red-text"></i>
                            <label for="Company_Setting"><em>Company</em></label>
                            <input type="text" name="Company_Setting" id="Company_Setting" class="form-control indigo-text" value="<?php echo $parm_empresa;?>">
                        </div>       
                    </div>
                    <div class="row">
                        <!-- Address -->
                        <div class="col-md-6 mb-2">
                            <i class="fas fa-map-marker red-text"></i>
                            <label for="Address_Setting"><em>Address</em></label>
                            <input type="text" name="Address_Setting" id="Address_Setting" class="form-control indigo-text" value="<?php echo $parm_address;?>">
                        </div>
                        <!-- City -->
                        <div class="col-md-6 mb-2">
                            <i class="fas fa-city red-text"></i>
                            <label for="City_Setting"><em>City & Zip Code</em></label>
                            <input type="text" name="City_Setting" id="City_Setting" class="form-control indigo-text" value="<?php echo $parm_citymaszip;?>">
                        </div>    
                    </div>
                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-6 mb-2">
                            <i class="fas fa-envelope red-text"></i>
                            <label for="Email_Setting"><em>Email</em></label>
                            <input type="email" name="Email_Setting" id="Email_Setting" class="form-control indigo-text" value="<?php echo $parm_email;?>">
                        </div>
                        <!-- Phone -->
                        <div class="col-md-6 mb-2">
                            <i class="fas fa-mobile-alt red-text"></i>
                            <label for="Phone_Setting"><em>Phone</em></label>
                            <input type="text" name="Phone_Setting" id="Phone_Setting" class="form-control indigo-text" value="<?php echo $parm_phone;?>">
                        </div>    
                    </div>
                    <div class="row">
                        <!-- Taxes -->
                        <div class="col-md-3 mb-2">
                            <i class="fas fa-percent red-text"></i>
                            <label for="Taxes_Setting"><em>Taxes</em></label>
                            <input type="number" name="Taxes_Setting" id="Taxes_Setting" class="form-control indigo-text" value="<?php echo $parm_taxes;?>">
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-purple btn-md" type="button" id="form-btnSettingCompany"><i class="fas fa-sync-alt mr-2"></i>Update</button>
                    <input type="hidden" name="btnSettingCompany" id="btnSettingCompany" value="Y">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Setting WorkOrder -->
<div class="modal fade" id="MyModalSetWO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fas fa-tasks mr-2"></i>Setting Work Orders</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formSettingWorkOrder" id="formSettingWorkOrder" method="post" action="index.php">
                <?php
                // Consulta BD
                $myQuery_a= "SELECT
                    db_parametros.id, 
                    db_parametros.prm_advertisement,
                    db_parametros.prm_notes,
                    db_parametros.prm_piedepagina
                    FROM
                    db_parametros
                    WHERE db_parametros.id=1";
                    $mi_consulta->conectar();
                    $mi_consulta->ejecutar_consulta($myQuery_a);
                    $records=$mi_consulta->valores_campo();
                    $parm_publicidad = $records['prm_advertisement'];
                    $parm_notas= $records['prm_notes'];
                    $parm_footer = $records['prm_piedepagina'];
                ?>
                <div class="modal-body">
                    <!-- Publicidad -->
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <i class="fas fa-ad red-text"></i>
                            <label for="Publicidad_Setting"><em>Advertisement/Message</em></label>
                            <input type="text" name="Publicidad_Setting" id="Publicidad_Setting" class="form-control indigo-text" value="<?php echo $parm_publicidad;?>">
                        </div>       
                    </div>
                    <!-- Notes -->
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <i class="fas fa-comments red-text"></i>
                            <label for="Notes_Setting"><em>Notes</em></label>
                            <input type="text" name="Notes_Setting" id="Notes_Setting" class="form-control indigo-text" value="<?php echo $parm_notas;?>">
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <i class="fas fa-file-alt red-text"></i>
                            <label for="Footer_Setting"><em>Footer</em></label>
                            <input type="text" name="Footer_Setting" id="Footer_Setting" class="form-control indigo-text" value="<?php echo $parm_footer;?>">
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-purple btn-md" type="button" id="form-btnSettingAd"><i class="fas fa-sync-alt mr-2"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Setting Invoices -->
<div class="modal fade" id="MyModalSetInvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fas fa-file-invoice mr-2"></i>Setting Invoices</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formSettingInvoices" id="formSettingInvoices" method="post" action="index.php">
                <?php
                // Consulta BD
                $myQuery_a= "SELECT
                    db_parametros.id, 
                    db_parametros.prm_termsdias,
                    db_parametros.prm_invoice_color
                    FROM
                    db_parametros
                    WHERE db_parametros.id=1";
                    $mi_consulta->conectar();
                    $mi_consulta->ejecutar_consulta($myQuery_a);
                    $records=$mi_consulta->valores_campo();
                    $parm_terms = $records['prm_termsdias'];
                    $parm_color = $records['prm_invoice_color'];
                    ?>
                <div class="modal-body">
                    <!-- Terms -->
                    <div class="row">
                        <div class="col-md-5 mb-2">
                            <i class="fas fa-dolar red-text"></i>
                            <label for="Terms_Setting"><em>Payment Term</em></label>
                            <select name="Terms_Setting" id="Terms_Setting" class="form-control indigo-text">
                                <option value="Upon Receipt">Upon Receipt</option>
                                <option value="Net 7">Net 7</option>
                                <option value="Net 21">Net 21</option>
                                <option value="Net 30">Net 30</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-2">
                            <i class="fas fa-dolar red-text"></i>
                            <label for="invoiceColor"><em>Invoice Color</em></label>
                            <input type="text" value="<?php echo $parm_color;?>" id="invoiceColor" class="kolorPicker">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-purple btn-md" type="button" id="form-btnSettinginvoice"><i class="fas fa-sync-alt mr-2"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Setting Parts -->
<div class="modal fade" id="MyModalSetParts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fas fa-puzzle-piece mr-2"></i>Setting Parts</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="">
                <div id="Botonera_Parts">
                    <button type="button" class="btn btn-success btn-sm" id="PartsSet_Agregar"><i class="fa fa-plus-square px-2"></i><span>Add</span></button>
                    <button type="button" class="btn btn-info btn-sm" id="PartsSet_Editar"><i class="fas fa-pencil-alt px-2"></i><span>Edit</span></button>
                    <button type="button" class="btn btn-danger btn-sm" id="PartsSet_Borrar"><i class="far fa-trash-alt px-2"></i><span>Delete</span></button>
				</div>
				<div class="px-4">
					<table id="Tabla_Parts" class="table table-striped table-hover-edgar mb-0"
						data-url="json/json_piezas.php"
						data-toolbar="#Botonera_Parts"
						data-toggle="table"
						data-show-refresh="false"
						data-show-export="false"
						data-id-field="pieza_id"
						data-click-to-select="true"
						data-search="true"
                        data-pagination="true"
                        data-page-list="[3,6]"
                        data-page-size="6"
						data-row-style="rowStyle"
						data-show-footer="false">
						<thead class="blue accent-5 white-text">
                            <tr>
                                <th data-field="" data-radio="true" class="text-center"></th>
                                <th data-field="pieza_id" data-width="100" data-halign="center" data-sortable="true" data-align="center">ID</th>
                                <th data-field="pieza_nombre" data-halign="center" data-sortable="true" data-align="left">Part Name</th>
                            </tr>
						</thead>
					</table>
                    <br><br>
				</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
            </div>        
        </div>
    </div>
</div>
<!-- Add Parts -->
<div class="modal fade" id="AddPartsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header light-green">
                <p class="heading lead white-text"><i class="fa fa-plus-square mr-2"></i>Add Parts</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Part Name -->
                    <div class="col-md-12 mb-3">
                        <i class="fas fa-puzzle-piece prefix red-text"></i>
                        <label for="Add_PartsName" class="active"><em>Part Name</em></label>
                        <input type="text" name="Add_PartsName" id="Add_PartsName" class="form-control indigo-text">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                <button class="btn btn-info btn-md" type="button" id="botonSaveAddParts"><i class="fas fa-save mr-2"></i>Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Parts -->
<div class="modal fade" id="EditPartsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header light-blue">
                <p class="heading lead white-text"><i class="fas fa-pencil-alt mr-2"></i>Edit Part</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Part Name -->
                    <div class="col-md-12 mb-3">
                        <i class="fas fa-puzzle-piece prefix red-text"></i>
                        <label for="Edit_PartsName" class="active"><em>Part Name</em></label>
                        <input type="text" name="Edit_PartsName" id="Edit_PartsName" class="form-control indigo-text">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                <button class="btn btn-purple btn-md" type="button" id="btnUpdateParts"><i class="fas fa-sync-alt mr-2"></i>Update</button>
                <input type="hidden" name="EditIDIDparts" id="EditIDIDparts">
            </div>
        </div>
    </div>
</div>
<!-- Delete Parts -->
<div class="modal fade" id="DelPartsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header red">
                <p class="heading lead white-text"><i class="far fa-trash-alt mr-2 white-text"></i>Delete Parts</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                    <p></p>
                    <p class="text-center"><i class="far fa-trash-alt fa-4x"></i></p>
                    </div>
                    <div class="col-9">
                        <p>Delete Parts, it is erase all the information in the DataBase. Do you want delete Part <span class="red-text font-weight-bold font-italic mr-2" id='idPartDelete'></span> ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>No</a>
                <a type="button" class="btn btn-info" id="BotondeletePart"><i class="fas fa-check mr-2"></i>Yes</a>
                <input type="Hidden" name="DeleteIDParts" id="DeleteIDParts">
            </div>
        </div>
    </div>
</div>
<!-- Setting Services -->
<div class="modal fade" id="MyModalSetServices" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fas fa-wrench mr-2"></i>Setting Services</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="">
                <div id="Botonera_Services">
                    <button type="button" class="btn btn-success btn-sm" id="ServicesSet_Agregar"><i class="fa fa-plus-square px-2"></i><span>Add</span></button>
                    <button type="button" class="btn btn-info btn-sm" id="ServicesSet_Editar"><i class="fas fa-pencil-alt px-2"></i><span>Edit</span></button>
                    <button type="button" class="btn btn-danger btn-sm" id="ServicesSet_Borrar"><i class="far fa-trash-alt px-2"></i><span>Delete</span></button>
				</div>
				<div class="px-4">
					<table id="Tabla_Services" class="table table-striped table-hover-edgar mb-0"
						data-url="json/json_services.php"
						data-toolbar="#Botonera_Services"
						data-toggle="table"
						data-show-refresh="false"
						data-show-export="false"
						data-id-field="id_service"
						data-click-to-select="true"
						data-search="true"
                        data-pagination="true"
                        data-page-list="[3,6]"
                        data-page-size="6"
						data-row-style="rowStyle"
						data-show-footer="false">
						<thead class="blue accent-5 white-text">
                            <tr>
                                <th data-field="" data-radio="true" class="text-center"></th>
                                <th data-field="id_service" data-width="100" data-halign="center" data-sortable="true" data-align="center">ID</th>
                                <th data-field="service_cual" data-halign="center" data-sortable="true" data-align="left">Service</th>
                            </tr>
						</thead>
					</table>
                    <br><br>
				</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
            </div>        
        </div>
    </div>
</div>
<!-- Add Services -->
<div class="modal fade" id="AddServicesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header light-green">
                <p class="heading lead white-text"><i class="fa fa-plus-square mr-2"></i>Add Service</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Service -->
                    <div class="col-md-12 mb-3">
                        <i class="fas fa-wrench prefix red-text"></i>
                        <label for="Add_ServiceName" class="active"><em>Service</em></label>
                        <input type="text" name="Add_ServiceName" id="Add_ServiceName" class="form-control indigo-text">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                <button class="btn btn-info btn-md" type="button" id="botonSaveAddServices"><i class="fas fa-save mr-2"></i>Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Services -->
<div class="modal fade" id="EditServicesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header light-blue">
                <p class="heading lead white-text"><i class="fas fa-pencil-alt mr-2"></i>Edit Service</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Service -->
                    <div class="col-md-12 mb-3">
                        <i class="fas fa-puzzle-piece prefix red-text"></i>
                        <label for="Edit_ServiceName" class="active"><em>Service</em></label>
                        <input type="text" name="Edit_ServiceName" id="Edit_ServiceName" class="form-control indigo-text">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                <button class="btn btn-purple btn-md" type="button" id="btnUpdateServices"><i class="fas fa-sync-alt mr-2"></i>Update</button>
                <input type="hidden" name="EditIDIDservice" id="EditIDIDservice">
            </div>
        </div>
    </div>
</div>
<!-- Delete Services -->
<div class="modal fade" id="DelServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header red">
                <p class="heading lead white-text"><i class="far fa-trash-alt mr-2 white-text"></i>Delete Services</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                    <p></p>
                    <p class="text-center"><i class="far fa-trash-alt fa-4x"></i></p>
                    </div>
                    <div class="col-9">
                        <p>Delete Services, it is erase all the information in the DataBase. Do you want delete Services <span class="red-text font-weight-bold font-italic mr-2" id='idServiceDelete'></span> ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>No</a>
                <a type="button" class="btn btn-info" id="BotondeleteService"><i class="fas fa-check mr-2"></i>Yes</a>
                <input type="Hidden" name="DeleteIDServices" id="DeleteIDServices">
            </div>
        </div>
    </div>
</div>
<!-- Setting Items -->
<div class="modal fade" id="MyModalSetItems" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fas fa-solid fa-fill mr-2"></i>Setting Items</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="">
                <div id="Botonera_Items">
                    <button type="button" class="btn btn-success btn-sm" id="ItemsSet_Agregar"><i class="fa fa-plus-square px-2"></i><span>Add</span></button>
                    <button type="button" class="btn btn-info btn-sm" id="ItemsSet_Editar"><i class="fas fa-pencil-alt px-2"></i><span>Edit</span></button>
                    <button type="button" class="btn btn-danger btn-sm" id="ItemsSet_Borrar"><i class="far fa-trash-alt px-2"></i><span>Delete</span></button>
				</div>
				<div class="px-4">
					<table id="Tabla_Items" class="table table-striped table-hover-edgar mb-0"
						data-url="json/json_items.php"
						data-toolbar="#Botonera_Items"
						data-toggle="table"
						data-show-refresh="false"
						data-show-export="false"
						data-id-field="pieza_id"
						data-click-to-select="true"
						data-search="true"
                        data-pagination="true"
                        data-page-list="[3,6]"
                        data-page-size="6"
						data-row-style="rowStyle"
						data-show-footer="false">
						<thead class="blue accent-5 white-text">
                            <tr>
                                <th data-field="" data-radio="true" class="text-center"></th>
                                <th data-field="id_items" data-width="100" data-halign="center" data-sortable="true" data-align="center">ID</th>
                                <th data-field="items_job" data-halign="center" data-sortable="true" data-align="left">Item</th>
                            </tr>
						</thead>
					</table>
                    <br><br>
				</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
            </div>        
        </div>
    </div>
</div>
<!-- Add Items -->
<div class="modal fade" id="AddItemsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header light-green">
                <p class="heading lead white-text"><i class="fa fa-plus-square mr-2"></i>Add Items</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Items Name -->
                    <div class="col-md-12 mb-3">
                        <i class="fa fa-list-alt prefix red-text"></i>
                        <label for="Add_ItemsName" class="active"><em>Item</em></label>
                        <input type="text" name="Add_ItemsName" id="Add_ItemsName" class="form-control indigo-text">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                <button class="btn btn-info btn-md" type="button" id="botonSaveAddItem"><i class="fas fa-save mr-2"></i>Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Items -->
<div class="modal fade" id="EditItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header light-blue">
                <p class="heading lead white-text"><i class="fas fa-pencil-alt mr-2"></i>Edit Items</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Items Name -->
                    <div class="col-md-12 mb-3">
                        <i class="fas fa-list-alt prefix red-text"></i>
                        <label for="Edit_ItemsName" class="active"><em>Item</em></label>
                        <input type="text" name="Edit_ItemsName" id="Edit_ItemsName" class="form-control indigo-text">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                <button class="btn btn-purple btn-md" type="button" id="btnUpdateItems"><i class="fas fa-sync-alt mr-2"></i>Update</button>
                <input type="hidden" name="EditIDIDitems" id="EditIDIDitems">
            </div>
        </div>
    </div>
</div>
<!-- Delete Parts -->
<div class="modal fade" id="DelItemsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header red">
                <p class="heading lead white-text"><i class="far fa-trash-alt mr-2 white-text"></i>Delete Items</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                    <p></p>
                    <p class="text-center"><i class="far fa-trash-alt fa-4x"></i></p>
                    </div>
                    <div class="col-9">
                        <p>Delete Items, it is erase all the information in the DataBase. Do you want delete the Item <span class="red-text font-weight-bold font-italic mr-2" id='idItemDelete'></span> ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>No</a>
                <a type="button" class="btn btn-info" id="BotondeleteItem"><i class="fas fa-check mr-2"></i>Yes</a>
                <input type="Hidden" name="DeleteIDItems" id="DeleteIDItems">
            </div>
        </div>
    </div>
</div>
<!-- Print Report Invoices -->
<div class="modal fade" id="MyModalInvoices" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fa fa-print mr-2"></i>Print Invoices</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formInvoicePrint" id="formInvoicePrint" method="post" action="index.php?xpt=003">
                <div class="modal-body">
                    <div class="row">
                        <!-- From -->
                        <div class="col-md-5 mb-3">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="InvoicePrint_Desde"><em>From</em></label>
                            <input type="date" name="InvoicePrint_Desde" id="InvoicePrint_Desde" class="form-control datepicker indigo-text" readonly>
                        </div>          
                        <!-- To -->
                        <div class="col-md-5 mb-3">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="InvoicePrint_Hasta"><em>To</em></label>
                            <input type="date" name="InvoicePrint_Hasta" id="InvoicePrint_Hasta" class="form-control datepicker indigo-text" readonly>
                        </div>          
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="PrintInvoices"><i class="fa fa-print mr-2"></i>Print</button>
                    <input type="hidden" name="printRecordInvoice" id="printRecordInvoice">
                    <input type="hidden" name="fechaDesdePrint" id="fechaDesdePrint">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Print Report Taxes -->
<div class="modal fade" id="MyModalTaxes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-notify modal-indigo" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead white-text"><i class="fa fa-print mr-2"></i>Print Invoices</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formTaxesPrint" id="formTaxesPrint" method="post" action="index.php?xpt=003">
                <div class="modal-body">
                    <div class="row">
                        <!-- From -->
                        <div class="col-md-5 mb-3">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="TaxesPrint_Desde"><em>From</em></label>
                            <input type="date" name="TaxesPrint_Desde" id="TaxesPrint_Desde" class="form-control datepicker indigo-text" readonly>
                        </div>          
                        <!-- To -->
                        <div class="col-md-5 mb-3">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="TaxesPrint_Hasta"><em>To</em></label>
                            <input type="date" name="TaxesPrint_Hasta" id="TaxesPrint_Hasta" class="form-control datepicker indigo-text" readonly>
                        </div>          
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="PrintTaxes"><i class="fa fa-print mr-2"></i>Print</button>
                    <input type="hidden" name="printTaxesInvoice" id="printTaxesInvoice">
                    <input type="hidden" name="fechaDesdeTaxes" id="fechaDesdeTaxes">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- JQuery -->
<script src="js/jquery.js"></script>
<script>
	$(function () 
	{
        // DatePicker (WO)
        $('#WorkOrderPrint_Desde').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(2000,1,01),
            selectYears: 18
        });
        $('#WorkOrderPrint_Hasta').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(2000,1,01),
            selectYears: 18
        });
        $('#InvoicePrint_Desde').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(2000,1,01),
            selectYears: 18
        });
        $('#InvoicePrint_Hasta').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(2000,1,01),
            selectYears: 18
        });
        $('#TaxesPrint_Desde').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(2000,1,01),
            selectYears: 18
        });
        $('#TaxesPrint_Hasta').pickadate(
        {
            format: 'ddd dd, mmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(2000,1,01),
            selectYears: 18
        });

        // Validar Print/WorkOrder
        $('#PrintWorkOrder').click(function()
        {
            var cualFechaFrom = $('#WorkOrderPrint_Desde').val();
            var cualFechaTo = $('#WorkOrderPrint_Hasta').val();             
            if($("#WorkOrderPrint_Desde").val()=="")
            {
                alert("Error: the date field is empty");
                $("#WorkOrderPrint_Desde").focus();
                return;
            }
            if($("#WorkOrderPrint_Hasta").val()=="")
            {
                alert("Error: the date field is empty");
                $("#WorkOrderPrint_Hasta").focus();
                return;
            }
            if(Date.parse(cualFechaFrom) > Date.parse(cualFechaTo)){
                alert("Invalid Date Range");
                $('#WorkOrderPrint_Desde').focus();
                return;
            }           
            // Enviar Formulario
            // $("#formWOPrint").submit();
            printWorkoredrs();
        })
        
        // Setting Company
        $('#form-btnSettingCompany').click(function()
        {
            if($("#Company_Setting").val()=="")
            {
                alert("Error: the company field is empty");
                $("#Company_Setting").focus();
                return;
            }
            if($("#Address_Setting").val()=="")
            {
                alert("Error: the address field is empty");
                $("#Address_Setting").focus();
                return;
            }
            if($("#City_Setting").val()=="")
            {
                alert("Error: the city field is empty");
                $("#City_Setting").focus();
                return;
            }
            if($("#Email_Setting").val()=="")
            {
                alert("Error: the email field is empty");
                $("#Email_Setting").focus();
                return;
            }
            if($("#Phone_Setting").val()=="")
            {
                alert("Error: the phone field is empty");
                $("#Phone_Setting").focus();
                return;
            }
            var company = $("#Company_Setting").val();
            var address = $("#Address_Setting").val();
            var city = $("#City_Setting").val();
            var email = $("#Email_Setting").val();
            var phone = $("#Phone_Setting").val();
            var dataString='company='+company+'&address='+address+'&city='+city+'&email='+email+'&phone='+phone;
            $.ajax({
                type: "POST",
                url: "json/json_setcompany.php",
                data: dataString,
                success: function() 
                {
                    alert("Company Data Was Submitted");
                    $('#MyModalSetCompany').modal('toggle');
                }
            });
            return false;
        })

        // Setting WorkOrders
        $('#form-btnSettingAd').click(function()
        {
            var publicidad= $("#Publicidad_Setting").val();
            var notas = $("#Notes_Setting").val();
            var footer = $("#Footer_Setting").val();
            var dataString='publicidad='+publicidad+'&notas='+notas+'&footer='+footer;
            $.ajax({
                type: "POST",
                url: "json/json_setworkorder.php",
                data: dataString,
                success: function() 
                {
                    alert("WorkOrder Data Was Submitted");
                    $('#MyModalSetWO').modal('toggle');
                }
            });
            return false;
        })

        // Setting Invoices
        $('#form-btnSettinginvoice').click(function()
        {
            var terminos = $("#Terms_Setting").val();
            var cualColor = $("#invoiceColor").val();
            var dataString ='terminos='+terminos+'&colorcual='+cualColor;
            $.ajax({
                type: "POST",
                url: "json/json_setinvoices.php",
                data: dataString,
                success: function() 
                {
                    alert("Informatio was updated");
                    $('#MyModalSetInvoice').modal('toggle');
                }
            });
            return false;
        })

        // Print Clientes
        $('#Print_Clientes').click(function()
        {
            var path = document.location.pathname;
            var directory = path.substring(path.indexOf('/'), path.lastIndexOf('/'))+'/tmp/';
            $.ajax({
                type: "POST",
                url: "modulos/pdf_clients.php",
                success: function() 
                {
                    printJS(directory+'/list_clients.pdf')
                }
            });
        })

        // Print WorkOrders
        function printWorkoredrs()
        {
            var path = document.location.pathname;
            var directory = path.substring(path.indexOf('/'), path.lastIndexOf('/'))+'/tmp/';
            var desde = $("#WorkOrderPrint_Desde").val();
            var hasta = $("#WorkOrderPrint_Hasta").val();
            var delivered = $("#WO_Delivered").val();
            var $inputDesde = $('#WorkOrderPrint_Desde').pickadate();
            var $inputHasta= $('#WorkOrderPrint_Hasta').pickadate();
            var pickerDesde = $inputDesde.pickadate('picker');
            var pickerHasta = $inputHasta.pickadate('picker');
            var desdeSubmit = pickerDesde.get('select', 'yyyy-mm-dd');
            var hastaSubmit = pickerHasta.get('select', 'yyyy-mm-dd');
            var dataString='WorkOrderPrint_Desde='+desde+'&WorkOrderPrint_Hasta='+hasta+'&WO_Delivered='+delivered+'&WorkOrderPrint_Desde_submit='+desdeSubmit+'&WorkOrderPrint_Hasta_submit='+hastaSubmit;
            $.ajax({
                type: "POST",
                url: "modulos/pdf_workorders.php",
                data: dataString,
                success: function() 
                {
                    printJS(directory+'/list_workorders.pdf')
                }
            });
        }

        // Add Parts
        $('#PartsSet_Agregar').click(function()
        {
            $('#AddPartsModal').modal('show');
        })

        // Validar Add Parts
        $('#botonSaveAddParts').click(function()
        {
            var cualParte = $('#Add_PartsName').val();    
            if($("#Add_PartsName").val()=="")
            {
                alert("Error: the field is empty");
                $("#Add_PartsName").focus();
                return;
            }
            var dataString='pieza='+cualParte;
            $.ajax({
                type: "POST",
                url: "json/json_addsetpieza.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaParts();
                    $("#Add_PartsName").val("");
                    $('#AddPartsModal').modal('toggle');
                }
            });
        })

        // Refresh Agregar/Parts
        function RefreshTablaParts()
        {
            var mydata;
            $table = $('#Tabla_Parts');
            $.getJSON('json/json_piezas.php', function(json) {
                mydata = json;
            });
            $('#Tabla_Parts').bootstrapTable(
            {
                data: mydata
            });
            $table.bootstrapTable('refresh');
        }

        // Edit Parts
        $('#PartsSet_Editar').click(function()
        {
            idid = $('#Tabla_Parts').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(idid != "")
            {
                var data = JSON.stringify($("#Tabla_Parts").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var cualParte = obj[0].pieza_nombre;
                $('#EditIDIDparts').val(idid);
                $('#Edit_PartsName').val(cualParte);
                $('#EditPartsModal').modal('show');
            }else{
                alert("Error !! You must be select a record");
            }
        })

        // Validar Edit Parts
        $('#btnUpdateParts').click(function()
        {
            var cualParte = $('#Edit_PartsName').val();    
            if($("#Edit_PartsName").val()=="")
            {
                alert("Error: the field is empty");
                $("#Edit_PartsName").focus();
                return;
            }
            var cuaIDfue = $('#EditIDIDparts').val();
            var dataString='id='+cuaIDfue+'&pieza='+cualParte;
            $.ajax({
                type: "POST",
                url: "json/json_editsetpieza.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaParts();
                    $("#Edit_PartsName").val("");
                    $('#EditPartsModal').modal('toggle');
                }
            });
        })
        
        // Delete Parts
        $('#PartsSet_Borrar').click(function()
        {
            idid = $('#Tabla_Parts').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(idid != "")
            {
                var data = JSON.stringify($("#Tabla_Parts").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var cualParte = obj[0].pieza_nombre;
                $('#DeleteIDParts').val(idid);
                $('#idPartDelete').text(cualParte);
                $('#DelPartsModal').modal('show');
            }else{
                alert("Error !! You must be select a record");
            }
        })

        // Validar Delete Parts
        $('#BotondeletePart').click(function()
        {
            var cuaIDfue = $('#DeleteIDParts').val();
            var dataString='id='+cuaIDfue;
            $.ajax({
                type: "POST",
                url: "json/json_delsetpieza.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaParts();
                    $('#DelPartsModal').modal('toggle');
                }
            });
        })
        
        // Add Service
        $('#ServicesSet_Agregar').click(function()
        {
            $('#AddServicesModal').modal('show');
        })

        // Validar Add Service
        $('#botonSaveAddServices').click(function()
        {
            var cualServicio = $('#Add_ServiceName').val();    
            if($("#Add_ServiceName").val()=="")
            {
                alert("Error: the field is empty");
                $("#Add_ServiceName").focus();
                return;
            }
            var dataString='servicio='+cualServicio;
            $.ajax({
                type: "POST",
                url: "json/json_addsetservicio.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaServices();
                    $("#Add_ServiceName").val("");
                    $('#AddServicesModal').modal('toggle');
                }
            });
        })
        
        // Refresh Agregar/Services
        function RefreshTablaServices()
        {
            var mydata;
            $table = $('#Tabla_Services');
            $.getJSON('json/json_services.php', function(json) {
                mydata = json;
            });
            $('#Tabla_Services').bootstrapTable(
            {
                data: mydata
            });
            $table.bootstrapTable('refresh');
        }
        
        // Edit Services
        $('#ServicesSet_Editar').click(function()
        {
            idid = $('#Tabla_Services').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(idid != "")
            {
                var data = JSON.stringify($("#Tabla_Services").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var cualServicio = obj[0].service_cual;
                $('#EditIDIDservice').val(idid);
                $('#Edit_ServiceName').val(cualServicio);
                $('#EditServicesModal').modal('show');
            }else{
                alert("Error !! You must be select a record");
            }
        })
        
        // Validar Edit Services
        $('#btnUpdateServices').click(function()
        {
            var cualServicio = $('#Edit_ServiceName').val();    
            if($("#Edit_ServiceName").val()=="")
            {
                alert("Error: the field is empty");
                $("#Edit_ServiceName").focus();
                return;
            }
            var cuaIDfue = $('#EditIDIDservice').val();
            var dataString='id='+cuaIDfue+'&servicio='+cualServicio;
            $.ajax({
                type: "POST",
                url: "json/json_editsetservicio.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaServices();
                    $("#Edit_ServiceName").val("");
                    $('#EditServicesModal').modal('toggle');
                }
            });
        })
        
        // Delete Services
        $('#ServicesSet_Borrar').click(function()
        {
            idid = $('#Tabla_Services').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(idid != "")
            {
                var data = JSON.stringify($("#Tabla_Services").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var cualServicio = obj[0].service_cual;
                $('#DeleteIDServices').val(idid);
                $('#idServiceDelete').text(cualServicio);
                $('#DelServiceModal').modal('show');
            }else{
                alert("Error !! You must be select a record");
            }
        })
        
        // Validar Delete Services
        $('#BotondeleteService').click(function()
        {
            var cuaIDfue = $('#DeleteIDServices').val();
            var dataString='id='+cuaIDfue;
            $.ajax({
                type: "POST",
                url: "json/json_delsetservicio.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaServices();
                    $('#DelServiceModal').modal('toggle');
                }
            });
        })

        // Add Items
        $("#ItemsSet_Agregar").click(function()
        {
            $('#AddItemsModal').modal('show');
        })

        // Validar Add Item
        $('#botonSaveAddItem').click(function()
        {
            var cualItems = $('#Add_ItemsName').val();    
            if($("#Add_ItemsName").val()=="")
            {
                alert("Error: the field is empty");
                $("#Add_ItemsName").focus();
                return;
            }
            var dataString='item='+cualItems;
            $.ajax({
                type: "POST",
                url: "json/json_addsetitem.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaItems();
                    $("#Add_ItemsName").val("");
                    $('#AddItemsModal').modal('toggle');
                }
            });
        })

        // Refresh Agregar/Items
        function RefreshTablaItems()
        {
            var mydata;
            $table = $('#Tabla_Items');
            $.getJSON('json/json_items.php', function(json) {
                mydata = json;
            });
            $('#Tabla_Items').bootstrapTable(
            {
                data: mydata
            });
            $table.bootstrapTable('refresh');
        }

        // Edit Items
        $('#ItemsSet_Editar').click(function()
        {
            idid = $('#Tabla_Items').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(idid != "")
            {
                var data = JSON.stringify($("#Tabla_Items").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var cualItem = obj[0].items_job;
                $('#EditIDIDitems').val(idid);
                $('#Edit_ItemsName').val(cualItem);
                $('#EditItemModal').modal('show');
            }else{
                alert("Error !! You must be select a item");
            }
        })

        // Update Items
        $('#btnUpdateItems').click(function()
        {
            var cualItem = $('#Edit_ItemsName').val();    
            if($("#Edit_ItemsName").val()=="")
            {
                alert("Error: the field is empty");
                $("#Edit_ItemsName").focus();
                return;
            }
            var cuaIDfue = $('#EditIDIDitems').val();
            var dataString='id='+cuaIDfue+'&item='+cualItem;
            $.ajax({
                type: "POST",
                url: "json/json_editsetitem.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaItems();
                    $("#Edit_ItemsName").val("");
                    $('#EditItemModal').modal('toggle');
                }
            });
        })

        // Delete Items
        $('#ItemsSet_Borrar').click(function()
        {
            idid = $('#Tabla_Items').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(idid != "")
            {
                var data = JSON.stringify($("#Tabla_Items").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var cualItem = obj[0].items_job;
                $('#DeleteIDItems').val(idid);
                $('#idItemDelete').text(cualItem);
                $('#DelItemsModal').modal('show');
            }else{
                alert("Error !! You must be select a record");
            }
        })

        // Validar Delete Items
        $('#BotondeleteItem').click(function()
        {
            var cuaIDfue = $('#DeleteIDItems').val();
            var dataString='id='+cuaIDfue;
            $.ajax({
                type: "POST",
                url: "json/json_delsetitem.php",
                data: dataString,
                success: function() 
                {
                    RefreshTablaItems();
                    $('#DelItemsModal').modal('toggle');
                }
            });
        })

        // Validar Print/Invoices
        $('#PrintInvoices').click(function()
        {
            var cualFechaFrom = $('#InvoicePrint_Desde').val();
            var cualFechaTo = $('#InvoicePrint_Hasta').val();             
            if($("#InvoicePrint_Desde").val()=="")
            {
                alert("Error: the date field is empty");
                $("#InvoicePrint_Desde").focus();
                return;
            }
            if($("#InvoicePrint_Hasta").val()=="")
            {
                alert("Error: the date field is empty");
                $("#InvoicePrint_Hasta").focus();
                return;
            }
            if(Date.parse(cualFechaFrom) > Date.parse(cualFechaTo)){
                alert("Invalid Date Range");
                $('#InvoicePrint_Desde').focus();
                return;
            }
            printInvoices();
        })

        // Validar Print/Taxes
        $('#PrintTaxes').click(function()
        {
            var cualFechaFrom = $('#TaxesPrint_Desde').val();
            var cualFechaTo = $('#TaxesPrint_Hasta').val();             
            if($("#TaxesPrint_Desde").val()=="")
            {
                alert("Error: the date field is empty");
                $("#TaxesPrint_Desde").focus();
                return;
            }
            if($("#TaxesPrint_Hasta").val()=="")
            {
                alert("Error: the date field is empty");
                $("#TaxesPrint_Hasta").focus();
                return;
            }
            if(Date.parse(cualFechaFrom) > Date.parse(cualFechaTo)){
                alert("Invalid Date Range");
                $('#TaxesPrint_Desde').focus();
                return;
            }
            printTaxes();
        })

        // Print Invoices
        function printInvoices()
        {
            var path = document.location.pathname;
            var directory = path.substring(path.indexOf('/'), path.lastIndexOf('/'))+'/tmp/';
            var desde = $("#InvoicePrint_Desde").val();
            var hasta = $("#InvoicePrint_Hasta").val();
            var $inputDesde = $('#InvoicePrint_Desde').pickadate();
            var $inputHasta= $('#InvoicePrint_Hasta').pickadate();
            var pickerDesde = $inputDesde.pickadate('picker');
            var pickerHasta = $inputHasta.pickadate('picker');
            var vdesdeSubmit = pickerDesde.get('select', 'yyyy-mm-dd');
            var vhastaSubmit = pickerHasta.get('select', 'yyyy-mm-dd');
            var dataString = {desdeCuando:desde, hastaCuando:hasta, desdeSubmit:vdesdeSubmit, cuandoSubmit:vhastaSubmit};
            $.ajax({
                type: "POST",
                url: "modulos/pdf_invoices.php",
                data: dataString,
                success: function() 
                {
                    printJS(directory+'/list_invoices.pdf')
                }
            });
        }

        // Print Taxes
        function printTaxes()
        {
            var path = document.location.pathname;
            var directory = path.substring(path.indexOf('/'), path.lastIndexOf('/'))+'/tmp/';
            var desde = $("#TaxesPrint_Desde").val();
            var hasta = $("#TaxesPrint_Hasta").val();
            var $inputDesde = $('#TaxesPrint_Desde').pickadate();
            var $inputHasta= $('#TaxesPrint_Hasta').pickadate();
            var pickerDesde = $inputDesde.pickadate('picker');
            var pickerHasta = $inputHasta.pickadate('picker');
            var vdesdeSubmit = pickerDesde.get('select', 'yyyy-mm-dd');
            var vhastaSubmit = pickerHasta.get('select', 'yyyy-mm-dd');
            var dataString = {desdeCuando:desde, hastaCuando:hasta, desdeSubmit:vdesdeSubmit, cuandoSubmit:vhastaSubmit};
            $.ajax({
                type: "POST",
                url: "modulos/pdf_taxes.php",
                data: dataString,
                success: function() 
                {
                    printJS(directory+'/list_taxes.pdf')
                }
            });
        }

        // Tabla Colores
        $('#Tabla_Items').on('click-row.bs.table', function (e, row, $element) 
        {
            $('.filaSelected').removeClass('filaSelected');
            $($element).addClass('filaSelected');
        });

        // Tabla Colores
        $('#Tabla_Parts').on('click-row.bs.table', function (e, row, $element) 
        {
            $('.filaSelected').removeClass('filaSelected');
            $($element).addClass('filaSelected');
        });

        // Tabla Colores
        $('#Tabla_Services').on('click-row.bs.table', function (e, row, $element) 
        {
            $('.filaSelected').removeClass('filaSelected');
            $($element).addClass('filaSelected');
        });
    })
</script>