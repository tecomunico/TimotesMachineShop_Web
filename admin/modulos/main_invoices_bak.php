<?php
// if($_POST['invoice_print'] == "Y")
// {
// 	include_once(DIR_MODULOS.'pdf_invoice.php');
// }
?>
<div class="container-fluid">
    <div class="card card-cascade narrower">
        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center" id="Tblbotones">
            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Add" id="Invoice_Add">
                    <i class="fas fa-plus mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="View" id="Invoice_View">
                    <i class="fas fa-eye mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Edit" id="Invoice_Edit">
                    <i class="fas fa-pencil-alt mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Mark Paid" id="Invoice_Paid">
                    <i class="fas fa-hand-holding-usd mt-0"></i>
                </button>
            </div>
            <a href="#" class="white-text text-center mx-3">Invoices</a>
            <div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Print" id="Invoice_Print">
                    <i class="fas fa-print mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="E-mail" id="Invoice_Email">
                    <i class="fas fa-paper-plane mt-0"></i>
                </button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="tooltip" data-placement="bottom" title="Delete" id="Invoice_Delete">
                    <i class="far fa-trash-alt mt-0"></i>
                </button>
            </div>
        </div>
        <div class="px-4">
            <div class="table-wrapper">
                <table class="table table-sm table-bordered table-hove"
                    id="tabla_invoices"
                    data-toggle="table"
                    data-search="true"
                    data-click-to-select="true"
                    data-pagination="true"
                    data-height="600"
                    data-search-align="left"
                    data-show-fullscreen="true"
                    data-show-refresh="true"
                    data-show-toggle="true"
                    data-id-field="IDID"
                    data-select-item-name="IDID"
                    data-buttons-class="blue lighten-4 btn-md"
                    data-show-columns="true"
                    data-show-export="true"
                    data-page-list="[10, 25, 50, 100, 200, All]"
                    data-export-options='{"fileName": "ListInvoices"}'
                    data-export-types='{"doc","excel","pdf"}'
                    data-url="json/json_invoices.php">
                    <thead class="blue accent-5 white-text">
                        <tr>
                            <th data-radio="true" data-show-select-title="true">&#10003;</th>
                            <th data-field="InvoiceNumber" data-switchable="false" data-sortable="true" class="text-center"># Invoice</th>
                            <th data-field="InvoiceCliente" data-sortable="true" data-halign="center" data-align="left"><i class="fas fa-user mr-2"></i>Client Name</th>
                            <th data-field="InvoiceClienteTlf" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-phone mr-2"></i>Phone Number</th>
                            <th data-field="InvoiceFecha" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-calendar mr-2"></i>Invoice Date</th>
                            <th data-field="InvoiceDue" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-calendar mr-2"></i>Due Date</th>
                            <th data-field="InvoiceStatus" data-sortable="true" data-halign="center" data-align="center" data-formatter="coloresInvoiceFormat"><i class="fas fa-check mr-2"></i>Status</th>
                            <th data-field="InvoiceFormadePago" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-hand-holding-usd mr-2"></i>Payment</th>
                            <th data-field="InvoiceMonto" data-sortable="true" data-halign="center" data-align="right"><i class="fas fa-dollar mr-2"></i>Amount</th>
                            <th data-field="InvoiceNumero" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceClienteAddress" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceClienteCorreo" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceFechaPlazo" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceEmpresa" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceClienteID" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceFechaSin" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceFechadePago" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceReferenciaPago" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceNotaPago" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoicePaidFechaSin" data-switchable="false" data-visible="false"></th>
                            <th data-field="InvoiceFuePagado" data-switchable="false" data-visible="false"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Crear Invoice -->
<div class="modal" id="ModalAddInvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-file-invoice mr-2"></i>Create Invoice</p>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button> -->
            </div>
            <form name="FrmAddInvoice" id="FrmAddInvoice" method="post" action="index.php?xpt=003">
                <!-- <div class="modal-body" style="height: 80%;"> -->
                <div class="modal-body">
                    <div class="row mb-1">
                        <!-- Client -->
                        <div class="col-6">
                            <i class="fas fa-user pink-text"></i>
                            <label for="Client_Selected" class="active"><em>Client</em></label>
                            <select class="selectpicker" name="Client_Selected" id="Client_Selected" data-width="100%" data-style="btn-info" data-live-search="true" data-actions-box="true" title="Select a Client...">
                                <?php
                                $myQuery = "SELECT
                                    db_clientes.id_clientes, 
                                    db_clientes.clientes_nombre,
                                    db_clientes.clientes_empresa,
                                    db_clientes.clientes_address,
                                    db_clientes.clientes_email,
                                    db_clientes.clientes_phone
                                    FROM
                                    db_clientes";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option data-phone='".$registro[5]."' data-email='".$registro[4]."' data-address='".$registro[3]."' data-subtext='".$registro[2]."' value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="d-flex align-items-end">
                            <button class="btn btn-light-green btn-md" type="button" id="btnAddCliente"><i class="fas fa-user-friends mr-2"></i>New Client</button>
                            <button class="btn btn-danger btn-md" type="button" id="btnAddPayment"><i class="fas fa-hand-holding-usd mr-2"></i>Payment</button>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <!-- Datos Cliente -->
                        <div class="col-md-6" style="border:1px solid #ABABAB;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><i class="fas fa-map-marker blue-grey-text"></td>
                                        <td><label class="control-label text-black-50"></i></label>Address:</td>
                                        <td><label name="ClienteDireccion" id="ClienteDireccion" class="font-italic blue-text border-success border-0">--</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-envelope blue-grey-text"></td>
                                        <td><label class="control-label text-black-50"></label>Email:</td>
                                        <td><label name="ClienteCorreo" id="ClienteCorreo" class="font-italic blue-text border-success border-0">--</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-mobile-alt blue-grey-text"></td>
                                        <td><label class="control-label text-black-50"></label>Phone:</td>
                                        <td><label name="ClienteTelefono" id="ClienteTelefono" class="font-italic blue-text border-success border-0">--</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Fecha -->
                        <div class="col-md-6" style="border:1px solid #ABABAB;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-calendar blue-grey-text"></td>
                                        <td><label class="control-label" for="FechaInvoice"></label>Date:</td>
                                        <td><input type="date" name="FechaInvoice" id="FechaInvoice" class="datepicker p-1 blue-text border-success border-0" readonly data-value="<?php echo date("j, n, Y");?>"></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-file-word-o blue-grey-text"></td>
                                        <td><label class="control-label" for="plazoInvoice"></label>Terms: </td>
                                        <td>
                                            <select name="plazoInvoice" id="plazoInvoice" class="p-1 blue-text border-success border-0">
                                                <option data-id="0" value=""></option>
                                                <option data-id="1" value="Upon Receipt">Upon Receipt</option>
                                                <option data-id="7" value="Net 7">Net 7</option>
                                                <option data-id="21" value="Net 21">Net 21</option>
                                                <option data-id="30" value="Net 30">Net 30</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-calendar-check-o blue-grey-text"></td>
                                        <td><label class="control-label" for="VenceInvoice"></label>Due: </td>
                                        <td><label name="VenceInvoice" id="VenceInvoice" class="p-1 red-text border-success border-0"></td>
                                    </tr>
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                    <div class="ui-widget">
                        <label for="tags">Tags: </label>
                        <input id="tags">
                    </div>
                    <div class="tableWrapper">    
                        <div class="col-md-12">
                            <table class="tablesmall" id="tablaFacturas">
                                <tr class="tablesmallHead tableTHFreeze">
                                    <th class="tablesmallTH" width="50">#</th>
                                    <th class="tablesmallTH" width="100">Item</th>
                                    <th class="tablesmallTH">Description</th>
                                    <th class="tablesmallTH" width="120">Price</th>
                                    <th class="tablesmallTH" width="80">Qty</th>
                                    <th class="tablesmallTH" width="120">Total Cost</th>
                                    <th class="tablesmallTH" width="50"><i class="fa fa-table" aria-hidden="true"></i></th>
                                </tr>
                                <tr class="altoDeFila">
                                    <td class="tablesmallTD text-center text-danger">1</td>
                                    <td class="tablesmallTD"><input type="text" name='Invoice_Item[]' id='Invoice_Item_1' class="form-control sin-border text-center" maxlength="6" for="1"></td>
                                    <td class="tablesmallTD"><input type="text" name='Invoice_Description[]' id='Invoice_Description_1' class="form-control sin-border" maxlength="60" for="1"></td>
                                    <td class="tablesmallTD"><input type="number" data-type="Invoice_Price" id='Invoice_Price_1' name='Invoice_Price[]' class="form-control sin-border text-right Invoice_Price" for="1"></td>
                                    <td class="tablesmallTD"><input type="number" id='Invoice_Qty_1' name='Invoice_Qty[]' step="1" min="0" value="1" oninput="this.value = Math.round(this.value);" class="form-control sin-border text-center Invoice_Qty" for="1"></td>
                                    <td class="tablesmallTD tablesmallTtlFondo"><input type="text" id='Invoice_Total_1' name='Invoice_Total[]' class="form-control sin-border text-right Invoice_Total" for="1" readonly></td>
                                    <td class="tablesmallTD text-center"><button type="button" name="btnAddFilas" id="btnAddFilas" class="btn btn-xs btn-light-green">+</button></td> 
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="col-md-12">
                        <table class="tablesmall bg-info sinBordes">
                            <tr>
                                <th width="50px"></th>
                                <th width="100px"></th>
                                <th></th>
                                <th width="120px"></th>
                                <th class="conBordes text-right bg-info white-text" width="80px">Taxes: </th>
                                <th class="text-right white-text" width="80px"></th>
                                <th width="90px"></th>
                            </tr>
                            <tr>
                                <th width="50px"></th>
                                <th width="100px"></th>
                                <th></th>
                                <th width="120px"></th>
                                <th class="conBordes text-right bg-info white-text" width="80px">Total: </th>
                                <th class="text-right white-text" width="80px" id="TotaldeTotales"></th>
                                <th width="90px"></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-md" type="button" id="btnCloseinvoice" name="btnCloseinvoice"><i class="fas fa-window-close mr-1"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="btnAddinvoice" name="btnAddinvoice"><i class="fas fa-save mr-1"></i>Save</button>
                </div>
                <input type="hidden" name="FacturacuantasFilaSon" id="FacturacuantasFilaSon">
                <input type="hidden" name="FacturaSave" id="FacturaSave" value="Y">
                <input type="hidden" name="FechaDueSave" id="FechaDueSave">
                <input type="hidden" name="TotalValorSave" id="TotalValorSave">
                <input type="hidden" name="AddDatePago" id="AddDatePago">
                <input type="hidden" name="AddFormaDepago" id="AddFormaDepago">
                <input type="hidden" name="AddRefDepago" id="AddRefDepago">
                <input type="hidden" name="AddNotesDepago" id="AddNotesDepago">
                <input type="hidden" name="AddFacturaPagada" id="AddFacturaPagada">
                <input type="hidden" name="facturaEstatus" id="facturaEstatus">
            </form>
        </div>
    </div>
</div>
<!-- Add Clientes-->
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
                    <input type="hidden" name="btnAddClient" value="Y">
                </div>
            </form> 
        </div>
    </div>
</div>
<!-- Ver Invoice -->
<div class="modal" id="ModalViewInvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-eye mr-2"></i>View Invoice <span id='facturaHeaderVer'></span></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Client -->
                    <div class="col-6 mb-1">
                        <i class="fas fa-user pink-text"></i>
                        <label for="ClientView_Nombre" class="active"><em>Client</em></label>
                        <label name="ClientView_Nombre" id="ClientView_Nombre" class="p-1 font-italic blue-text border-0" readonly>
                    </div>
                    <button class="btn btn-danger btn-md" type="button" id="btnVerPayment"><i class="fas fa-hand-holding-usd mr-2"></i>Payment</button>
                </div>
                <div class="row">
                    <!-- Datos Cliente -->
                    <div class="col-md-6" style="border:1px solid #ABABAB;">
                        <table>
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-map-marker blue-grey-text"></td>
                                    <td><label class="control-label text-black-50"></i></label>Address:</td>
                                    <td><label name="ClienteView_Address" id="ClienteView_Address" class="p-1 font-italic blue-text border-0"></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-envelope blue-grey-text"></td>
                                    <td><label class="control-label text-black-50"></label>Email:</td>
                                    <td><label name="ClienteView_Email" id="ClienteView_Email" class="p-1 font-italic blue-text border-0"></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-mobile-alt blue-grey-text"></td>
                                    <td><label class="control-label text-black-50"></label>Phone:</td>
                                    <td><label name="ClienteView_Tlf" id="ClienteView_Tlf" class="p-1 font-italic blue-text border-0"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Fecha -->
                    <div class="col-md-6" style="border:1px solid #ABABAB;">
                        <table>
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-calendar blue-grey-text"></td>
                                    <td><label class="control-label" for="FechaInvoiceView"></label>Date:</td>
                                    <td><input type="text" name="FechaInvoiceView" id="FechaInvoiceView" class="p-1 blue-text border-0" readonly></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-file-word-o blue-grey-text"></td>
                                    <td><label class="control-label" for="plazoInvoiceView"></label>Terms: </td>
                                    <td><input type="text" name="plazoInvoiceView" id="plazoInvoiceView" class="p-1 blue-text border-0" readonly></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-calendar-check-o blue-grey-text"></td>
                                    <td><label class="control-label" for="VenceInvoiceView"></label>Due: </td>
                                    <td><input type="text" name="VenceInvoiceView" id="VenceInvoiceView" class="p-1 blue-text border-success border-0" readonly></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-dollar red-text"></td>
                                    <td><label class="control-label" for="VenceInvoiceView"></label><strong><span class="red-text">Total: </span></strong></td>
                                    <td><input type="text" name="TotalInvoiceView" id="TotalInvoiceView" class="p-1 red-text border-success border-0" readonly></td>
                                </tr>
                            </tbody>
                        </table>                            
                    </div>
                </div>
            </div>
            <!-- View Invoice/Detalle -->
            <div align="center">
                <table id="tblAppendGridVer"></table>
            </div>
            <br>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Imprimir Invoice -->
<form name="frm_print_invoice" id="frm_print_invoice" method="POST" class="form-horizontal" action="index.php?xpt=003">
	<input type="hidden" name="invoice_print" id="invoice_print" value="Y">
    <input type="hidden" name="invoice_IDID" id="invoice_IDID">
    <input type="hidden" name="iCliente__NumeroDeFactura" id="iCliente__NumeroDeFactura">
    <input type="hidden" name="iCliente__FechaDeFactura" id="iCliente__FechaDeFactura">
    <input type="hidden" name="iCliente__PlazoDeFactura" id="iCliente__PlazoDeFactura">
    <input type="hidden" name="iCliente__VenceDeFactura" id="iCliente__VenceDeFactura">
    <input type="hidden" name="iCliente__Empresa" id="iCliente__Empresa">
    <input type="hidden" name="iCliente__Nombre" id="iCliente__Nombre">
    <input type="hidden" name="iCliente__Address" id="iCliente__Address">
    <input type="hidden" name="iCliente__Phone" id="iCliente__Phone">
    <input type="hidden" name="iCliente__Email" id="iCliente__Email">
    <input type="hidden" name="iCliente__InvoicePaid" id="iCliente__InvoicePaid">
    <input type="hidden" name="iCliente__InvoicePaidDMY" id="iCliente__InvoicePaidDMY">
    <input type="hidden" name="iCliente__InvoicePaidForma" id="iCliente__InvoicePaidForma">
    <input type="hidden" name="iCliente__InvoicePaidRefer" id="iCliente__InvoicePaidRefer">
</form>
<!-- Delete Invoice -->
<div class="modal fade" id="DeletedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead"><i class="far fa-trash-alt mr-2 white-text"></i>Delete Invoice </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="formDeleteInvoice" id="formDeleteInvoice" method="post" action="index.php?xpt=003">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                        <p></p>
                        <p class="text-center"><i class="far fa-trash-alt fa-4x"></i></p>
                        </div>
                        <div class="col-9">
                            <p>Delete Invoice, it is erase all the information in the DataBase. Do you want Erase all information of <span class="red-text font-weight-bold font-italic mr-2" id='idInvoiceDelete'></span> ?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>No</a>
                    <a type="button" class="btn btn-info" id="FrmBtndeleteInvoice"><i class="fas fa-check mr-2"></i>Yes</a>
                    <input type="Hidden" name="btnDeleteInvoice" value="Y">
                    <input type="Hidden" name="idInvoiceErase" id="idInvoiceErase">
                </div>
            </form>    
        </div>
    </div>
</div>
<!-- Edit Invoice -->
<div class="modal" id="ModalEditInvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header indigo">
                <p class="heading lead"><i class="fas fa-pencil-alt mr-2"></i>Edit Invoice <span id='facturaHeaderEdit'></span></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <form name="FrmEditInvoice" id="FrmEditInvoice" method="post" action="index.php?xpt=003">
                <div class="modal-body">
                    <div class="row">
                        <!-- Client -->
                        <div class="col-6 mb-3">
                            <i class="fas fa-user pink-text"></i>
                            <label for="ClientEdit_Selected" class="active"><em>Client</em></label>
                            <select class="selectpicker" name="ClientEdit_Selected" id="ClientEdit_Selected" data-width="100%" data-style="btn-info" data-live-search="true" data-actions-box="true" title="Select a Client...">
                                <?php
                                $myQuery = "SELECT
                                    db_clientes.id_clientes, 
                                    db_clientes.clientes_nombre,
                                    db_clientes.clientes_empresa,
                                    db_clientes.clientes_address,
                                    db_clientes.clientes_email,
                                    db_clientes.clientes_phone
                                    FROM
                                    db_clientes";
                                $mi_consulta->conectar();					
                                $tabla=$mi_consulta->ejecutar_consulta($myQuery);
                                while ($registro = mysqli_fetch_row($tabla))
                                { 	
                                    echo "<option data-phone='".$registro[5]."' data-email='".$registro[4]."' data-address='".$registro[3]."' data-subtext='".$registro[2]."' value='".$registro[0]."'>".strtoupper($registro[1])."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="d-flex align-items-end mb-3">
                            <button class="btn btn-danger btn-md" type="button" id="btnEditPayment"><i class="fas fa-hand-holding-usd mr-2"></i>Payment</button>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Datos Cliente -->
                        <div class="col-md-6" style="border:1px solid #ABABAB;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><i class="fas fa-map-marker blue-grey-text"></td>
                                        <td><label class="control-label text-black-50"></i></label>Address:</td>
                                        <td><label name="ClienteEditDireccion" id="ClienteEditDireccion" class="font-italic blue-text border-success border-0">--</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-envelope blue-grey-text"></td>
                                        <td><label class="control-label text-black-50"></label>Email:</td>
                                        <td><label name="ClienteEditCorreo" id="ClienteEditCorreo" class="font-italic blue-text border-success border-0">--</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-mobile-alt blue-grey-text"></td>
                                        <td><label class="control-label text-black-50"></label>Phone:</td>
                                        <td><label name="ClienteEditTelefono" id="ClienteEditTelefono" class="font-italic blue-text border-success border-0">--</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Fecha -->
                        <div class="col-md-6" style="border:1px solid #ABABAB;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-calendar blue-grey-text"></td>
                                        <td><label class="control-label" for="FechaEditInvoice"></label>Date:</td>
                                        <td><input type="date" name="FechaEditInvoice" id="FechaEditInvoice" class="datepicker p-1 blue-text border-success border-0" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-file-word-o blue-grey-text"></td>
                                        <td><label class="control-label" for="plazoEditInvoice"></label>Terms: </td>
                                        <td>
                                            <select name="plazoEditInvoice" id="plazoEditInvoice" class="p-1 blue-text border-success border-0">
                                                <option data-id="1" value="Upon Receipt">Upon Receipt</option>
                                                <option data-id="7" value="Net 7">Net 7</option>
                                                <option data-id="21" value="Net 21">Net 21</option>
                                                <option data-id="30" value="Net 30">Net 30</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-calendar-check-o blue-grey-text"></td>
                                        <td><label class="control-label" for="VenceEditInvoice"></label>Due: </td>
                                        <td><label name="VenceEditInvoice" id="VenceEditInvoice" class="p-1 red-text border-success border-0"></td>
                                    </tr>
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
                <!-- Edit Invoice/Detalle -->
                <div align="center">
                    <table id="tblAppendGridEdit"></table>
                </div>
                <table id="TablaFooter">
					<tr>
						<td width="80px"></td>
						<td width="670px"></td>
						<td width="50px"></td>
						<td width="58px"></td>
						<td width="80px" class="edgar-background-footer">TOTAL:&nbsp;</td>
						<td width="104px" class="edgar-total-footer" id="totaldeTotalesEdit"></td>
					</tr>
				</table>
				<br>
                <div class="modal-footer">
                    <button class="btn btn-danger waves-effect btn-md" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="btnEditinvoice" name="btnEditinvoice"><i class="fas fa-save mr-2"></i>Update</button>
                </div>
                <input type="hidden" name="FacturaCountRows" id="FacturaCountRows">
                <input type="hidden" name="FacturaUpdate" id="FacturaUpdate" value="Y">
                <input type="hidden" name="FechaDueSaveEdit" id="FechaDueSaveEdit">
                <input type="hidden" name="TotalValorUpdated" id="TotalValorUpdated">
                <input type="hidden" name="FacturaIDID" id="FacturaIDID">
                <input type="hidden" name="Date_Edit_Edit" id="Date_Edit_Edit">
                <input type="hidden" name="PaymentEditado" id="PaymentEditado" value="N">
                <input type="hidden" name="PaymentEditFecha" id="PaymentEditFecha">
                <input type="hidden" name="PaymentEditForma" id="PaymentEditForma">
                <input type="hidden" name="PaymentEditRef" id="PaymentEditRef">
                <input type="hidden" name="PaymentEditNotes" id="PaymentEditNotes">
            </form> 
        </div>
    </div>
</div>
<!-- Add Payment-->
<div class="modal fade" id="AddModalPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white" style="padding:10px 10px 1px;">
                <p class="heading lead"><i class="fas fa-hand-holding-usd mr-2"></i>Payment</p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Fecha de Pago -->
                    <div class="col-md-5 mb-4">
                        <i class="fas fa-calendar red-text"></i>
                        <label for="FechaDePago"><em>Date</em></label>
                        <input type="date" name="FechaDePago" id="FechaDePago" class="form-control datepicker indigo-text" readonly data-value="<?php echo date("j, n, Y");?>">
                    </div>
                </div>
                <div class="row">
                    <!-- Method -->
                    <div class="col-md-6 mb-4">
                        <i class="fas fa-landmark prefix red-text"></i>
                        <label for="FormaDepago" class="active"><em>Payment Method</em></label>
                        <select class="form-control" name="FormaDepago" id="FormaDepago">
                            <option value="">- Select -</option>
                            <option value="Cash">Cash</option>
                            <option value="Check">Check</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Zelle">Zelle</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <!-- Reference -->
                    <div class="col-md-6 mb-4">
                        <i class="fas fa-file-invoice-dollar red-text"></i>
                        <label for="RefDepago" class="active"><em># Reference</em></label>
                        <input type="text" name="RefDepago" id="RefDepago" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <!-- Notes -->
                    <div class="col-md-12 mb-4">
                        <i class="fas fa-comments prefix red-text"></i>
                        <label for="NotesDepago" class="active"><em>Notes</em></label>
                        <textarea id="NotesDepago" name="NotesDepago" rows="2" class="form-control red-text"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" type="button" id="btnCerrarPago"><i class="fas fa-window-close mr-2"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- View Payment -->
<div class="modal fade" id="VerModalPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white" style="padding:10px 10px 1px;">
                <p class="heading lead"><i class="fas fa-eye mr-2"></i>View Payment</p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Fecha de Pago -->
                    <div class="col-md-5 mb-4">
                        <i class="fas fa-calendar red-text"></i>
                        <label for="VerFechaDePago"><em>Date</em></label>
                        <input type="text" name="VerFechaDePago" id="VerFechaDePago" class="form-control datepicker indigo-text" disabled>
                    </div>
                </div>
                <div class="row">
                    <!-- Method -->
                    <div class="col-md-6 mb-4">
                        <i class="fas fa-landmark prefix red-text"></i>
                        <label for="VerFormaDepago" class="active"><em>Payment Method</em></label>
                        <input type="text" name="VerFormaDepago" id="VerFormaDepago" class="form-control indigo-text" disabled>
                    </div>
                    <!-- Reference -->
                    <div class="col-md-6 mb-4">
                        <i class="fas fa-file-invoice-dollar red-text"></i>
                        <label for="VerRefDepago" class="active"><em># Reference</em></label>
                        <input type="text" name="VerRefDepago" id="VerRefDepago" class="form-control" disabled/>
                    </div>
                </div>
                <div class="row">
                    <!-- Notes -->
                    <div class="col-md-12 mb-4">
                        <i class="fas fa-comments prefix red-text"></i>
                        <label for="VerNotesDepago" class="active"><em>Notes</em></label>
                        <textarea id="VerNotesDepago" name="VerNotesDepago" rows="2" class="form-control red-text" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger waves-effect btn-md" type="button" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Payment -->
<div class="modal fade" id="EditModalPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white" style="padding:10px 10px 1px;">
                <p class="heading lead"><i class="fas fa-pencil-alt mr-2"></i>Edit Payment</p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Fecha de Pago -->
                    <div class="col-md-5 mb-4">
                        <i class="fas fa-calendar red-text"></i>
                        <label for="EditFechaDePago"><em>Date</em></label>
                        <input type="date" name="EditFechaDePago" id="EditFechaDePago" class="form-control datepicker indigo-text">
                    </div>
                </div>
                <div class="row">
                    <!-- Method -->
                    <div class="col-md-6 mb-4">
                        <i class="fas fa-landmark prefix red-text"></i>
                        <label for="EditFormaDepago" class="active"><em>Payment Method</em></label>
                        <select class="form-control" name="EditFormaDepago" id="EditFormaDepago">
                            <option value="Cash">Cash</option>
                            <option value="Check">Check</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Zelle">Zelle</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <!-- Reference -->
                    <div class="col-md-6 mb-4">
                        <i class="fas fa-file-invoice-dollar red-text"></i>
                        <label for="EditRefDepago" class="active"><em># Reference</em></label>
                        <input type="text" name="EditRefDepago" id="EditRefDepago" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <!-- Notes -->
                    <div class="col-md-12 mb-4">
                        <i class="fas fa-comments prefix red-text"></i>
                        <label for="EditNotesDepago" class="active"><em>Notes</em></label>
                        <textarea id="EditNotesDepago" name="EditNotesDepago" rows="2" class="form-control red-text"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-md" type="button" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                <button class="btn btn-info btn-md" type="button" id="btnEditinvoicePaid" name="btnEditinvoicePaid"><i class="fas fa-save mr-2"></i>Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Mark Payment-->
<div class="modal fade" id="AddModalMarkPaid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white" style="padding:10px 10px 1px;">
                <p class="heading lead"><i class="fas fa-hand-holding-usd mr-2"></i>Pay Invoice  <span class="font-italic mr-2" id='idInvoicePaid'></span> </p>
            </div>
            <form name="FrmMarkPaidInvoice" id="FrmMarkPaidInvoice" method="post" action="index.php?xpt=003">
                <div class="modal-body">
                    <div class="row">
                        <!-- Fecha de Pago -->
                        <div class="col-md-5 mb-4">
                            <i class="fas fa-calendar red-text"></i>
                            <label for="MarkFechaDePago"><em>Date</em></label>
                            <input type="date" name="MarkFechaDePago" id="MarkFechaDePago" class="form-control datepicker indigo-text" readonly data-value="<?php echo date("j, n, Y");?>">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Method -->
                        <div class="col-md-6 mb-4">
                            <i class="fas fa-landmark prefix red-text"></i>
                            <label for="MarkFormaDepago" class="active"><em>Payment Method</em></label>
                            <select class="form-control" name="MarkFormaDepago" id="MarkFormaDepago">
                                <option value="">- Select -</option>
                                <option value="Cash">Cash</option>
                                <option value="Check">Check</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Zelle">Zelle</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <!-- Reference -->
                        <div class="col-md-6 mb-4">
                            <i class="fas fa-file-invoice-dollar red-text"></i>
                            <label for="MarkRefDepago" class="active"><em># Reference</em></label>
                            <input type="text" name="MarkRefDepago" id="MarkRefDepago" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Notes -->
                        <div class="col-md-12 mb-4">
                            <i class="fas fa-comments prefix red-text"></i>
                            <label for="MarkNotesDepago" class="active"><em>Notes</em></label>
                            <textarea id="MarkNotesDepago" name="MarkNotesDepago" rows="2" class="form-control red-text"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-md" type="button" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i>Close</button>
                    <button class="btn btn-info btn-md" type="button" id="btnMarkPaid" name="btnMarkPaid"><i class="fas fa-check mr-2"></i>Paid</button>
                </div>
                <input type="hidden" name="FacturaMarKPaid" id="FacturaMarKPaid" value="Y">
                <input type="hidden" name="FacturaIDPaid" id="FacturaIDPaid">
            </form>
        </div>
    </div>
</div>
<!-- Script-->
<script src="js/jquery.js"></script>
<script>
	$(function () 
    {
        // Scroll Down
        for (var i = 0; i < 100; i++) {
            $('.tableWrappery').append(i + '<br>');
        }

        // ToolTips
        $('[data-toggle="tooltip"]').tooltip();
        
        // DatePicker
        $('#FechaInvoice').pickadate({format: 'ddd dd, mmm yyyy', formatSubmit: 'yyyy-mm-dd', min: new Date(2000,1,01), selectYears: 18});
        $('#FechaEditInvoice').pickadate({clear:'', format: 'ddd dd, mmm yyyy', formatSubmit: 'yyyy-mm-dd', min: new Date(2000,1,01), selectYears: 18});
        $('#FechaDePago').pickadate({clear:'', format: 'ddd dd, mmm yyyy', formatSubmit: 'yyyy-mm-dd', min: new Date(2000,1,01), selectYears: 18});
        $('#EditFechaDePago').pickadate({clear:'', format: 'ddd dd, mmm yyyy', formatSubmit: 'yyyy-mm-dd', min: new Date(2000,1,01), selectYears: 18});
        $('#MarkFechaDePago').pickadate({clear:'', format: 'ddd dd, mmm yyyy', formatSubmit: 'yyyy-mm-dd', min: new Date(2000,1,01), selectYears: 18});

        // Crear Facturas
		$('#Invoice_Add').click(function () 
        {
            $.getJSON("json/json_parametros.php", function(data)
            {
                items = data;
                items.forEach(function(items) 
                {
                    foo = items.prm_termsdias;
                    FechaInvoice(foo);
                });
            });
			$('#ModalAddInvoice').modal('show');
		});

        // Fecha Invoice OnStrat
        function FechaInvoice(data)
        {
            $variable = data;
            var fechaParaGrabar=moment().format("YYYY-MM-DD");
            $('#plazoInvoice').val($variable);
            switch($variable)
            {
                case 'Upon Receipt':
                    var cantidadDias = 0;
                break

                case 'Net 7':
                    var cantidadDias = 7;
                break

                case 'Net 21':
                    var cantidadDias = 21;
                break

                case 'Net 30':
                    var cantidadDias = 30;
                break
            }
            var fechaSumada = moment().add(cantidadDias,'days').format("MM-DD-YYYY");
			var fechaVenceConFormato=moment(fechaSumada).format("ddd DD, MMM yyyy");
			var fechaVenceGrabar=moment(fechaSumada).format("YYYY-MM-DD");
            $("#VenceInvoice").text(fechaVenceConFormato);
        }

        // Add Invoice / Change Date
        $('#FechaInvoice').change(function()
        {
            var $inputAddDMY = $('#FechaInvoice').pickadate();
            var pickerDMY = $inputAddDMY.pickadate('picker');
            var pickDMY = pickerDMY.get('select', 'yyyy/mm/dd');
            var plazo = $('#plazoInvoice').val();
            switch(plazo)
            {
                case 'Upon Receipt':
                    var cantidadDias = 0;
                break

                case 'Net 7':
                    var cantidadDias = 7;
                break

                case 'Net 21':
                    var cantidadDias = 21;
                break

                case 'Net 30':
                    var cantidadDias = 30;
                break
            }
            var dateSumada = moment(pickDMY).add(cantidadDias,'days').format("MM-DD-YYYY");
            var dateVenceConFormato=moment(dateSumada).format("ddd DD, MMM yyyy");
            var dateVenceGrabar=moment(dateSumada).format("YYYY-MM-DD");
            $("#FechaDueSave").val(dateVenceGrabar);
            $("#VenceInvoice").text(dateVenceConFormato);
        })

        // Agregar Clientes
        $('#btnAddCliente').click(function () 
        {
			$('#AddModalCliente').modal('show');
		});

        // Close Add Cliente
        $("#BtnCloseClient").click(function () 
        {
            $("#formAddClient")[0].reset();
        })

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

        // Cliente Seleccionado
        $('#Client_Selected').change(function()
        {
            var selected = $(this).find('option:selected');
            var CualAddress=selected.data('address');
            var CualEmail=selected.data('email');
            var CualPhone=selected.data('phone');
            $("#ClienteDireccion").text(CualAddress);        
            $("#ClienteCorreo").text(CualEmail);        
            $("#ClienteTelefono").text(CualPhone);        
        })

        // Cambiar Fecha/Add Invoice
        $('#plazoInvoice').change(function()
        {
            var $inputAddDMY = $('#FechaInvoice').pickadate();
            var pickerDMY = $inputAddDMY.pickadate('picker');
            var pickDMY = pickerDMY.get('select', 'yyyy/mm/dd');
            var selected = $("#plazoInvoice").val(); 
            switch(selected)
            {
                case 'Upon Receipt':
                    var cantidadDias = 0;
                break

                case 'Net 7':
                    var cantidadDias = 7;
                break

                case 'Net 21':
                    var cantidadDias = 21;
                break

                case 'Net 30':
                    var cantidadDias = 30;
                break
            }
            var dateSumada = moment(pickDMY).add(cantidadDias,'days').format("MM-DD-YYYY");
            var dateVenceConFormato=moment(dateSumada).format("ddd DD, MMM yyyy");
            var dateVenceGrabar=moment(dateSumada).format("YYYY-MM-DD");
            $("#FechaDueSave").val(dateVenceGrabar);
            $("#VenceInvoice").text(dateVenceConFormato);
        })

        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
            ];
        // // Add Fila
		// $('#tblAppendGrid').appendGrid({
		// 	columns: [
        //         { name: 'Unit_', type: 'text', display: 'Item', displayCss: { 'color': '#898888', 'text-align': 'center'}, ctrlCss: { 'width': '80px', 'border':'none', 'font-size':'10pt'}},
        //         { name: 'Job_', type: 'ui-autocomplete', display: 'Description', displayCss: { 'color': '#898888', 'text-align': 'center' }, ctrlCss: { 'width': '670px', 'border':'none', 'font-size':'10pt'}, uiOption:{source:'json/json_autoitems.php', minLength : 2},ctrlAttr: { 'maxlength': '80'}},
        //         { name: 'Qty_', type: 'number', display: 'Quantity', displayCss: { 'color': '#898888', 'text-align': 'center' }, ctrlCss: { 'width': '50px', 'text-align': 'center', 'border':'none', 'font-size':'10pt' }, onChange: function(evt, rowIndex){ Calcular(rowIndex);}},
        //         { name: 'Price_', type: 'number', display: 'Amount', displayCss: { 'color': '#898888', 'text-align': 'center' }, ctrlCss: { 'width': '80px', 'text-align': 'right', 'border':'none', 'font-size':'10pt'}, onChange: function(evt, rowIndex){ Calcular(rowIndex);}},
        //         { name: 'Total_', type: 'number', display: 'SubTotal', displayCss: { 'color': '#898888', 'text-align': 'center' }, ctrlCss: { 'width': '100px', 'text-align': 'right', 'border':'none', 'font-size':'10pt', 'background-color':'white', 'font-style':'italic'}, ctrlProp: { disabled: true }}
		// 	],
		// 	hideButtons: {
		// 		removeLast: true,
		// 		moveUp: true,
		// 		moveDown: true,
		// 		insert: true
        // 	},
		// 	idPrefix: 'invoice_add_',
		// 	initRows: 10,
		// 	rowDragging: true,
		// 	afterRowRemoved: function (caller, rowIndex) {
		// 		borroFila();
		// 	},
		// 	beforeRowRemove: function (caller, rowIndex) {
		// 		tablaVacia(rowIndex);
		// 	},
        //     maintainScroll: true,
		// });

        // Sumar Invoice
		// function Calcular(valorPasado)
		// {
		// 	var invoiceCantidad = $('#tblAppendGrid').appendGrid('getCtrlValue', 'Qty_', valorPasado);
		// 	var invoicePrecio = $('#tblAppendGrid').appendGrid('getCtrlValue', 'Price_', valorPasado);
		// 	if(invoiceCantidad<1)
		// 	{
		// 		$('#tblAppendGrid').appendGrid('setCtrlValue', 'Qty_', valorPasado, '1');
		// 		invoiceCantidad=1;
		// 	}
		// 	if(!$.isNumeric(invoicePrecio) && invoicePrecio !== "")
		// 	{
		// 		alert("Error: Wrong Price");
		// 		$('#tblAppendGrid').appendGrid('setCtrlValue', 'Price_', valorPasado, '0.00');
		// 		$('#tblAppendGrid').appendGrid('setCtrlValue', 'Total_', valorPasado, '0.00');
		// 		return;
		// 	}
		// 	var invoiceSubTotal = invoiceCantidad*invoicePrecio;
		// 	$('#tblAppendGrid').appendGrid('setCtrlValue', 'Total_', valorPasado, invoiceSubTotal.toFixed(2));
		// 	var totalFilas=$('#tblAppendGrid').appendGrid('getRowCount');
		// 	var sumaTotal=0;
		// 	var valorNumero=0;
		// 	for (var i=0; i<totalFilas; i++) 
		// 	{
		// 		valorNumero=parseFloat($('#tblAppendGrid').appendGrid('getCtrlValue', 'Total_', i)|| 0);
		// 		// if(valorNumero>0)
		// 		// {
		// 			sumaTotal=sumaTotal+valorNumero;
		// 		// }
		// 	}
        //     var formateadaNumero = Number(sumaTotal).toFixed(2);
		// 	$("#totaldeTotales").text(numberWithCommas(formateadaNumero));
		// 	$("#TotalValorSave").val(numberWithCommas(formateadaNumero));
		// }

        // Borrar Fila
		// function borroFila()
		// {
		// 	var totalFilas=$('#tblAppendGrid').appendGrid('getRowCount');
		// 	var sumaTotal=0;
		// 	var valorNumero=0;
		// 	for (var i=0; i<totalFilas; i++) 
		// 	{
		// 		valorNumero=parseFloat($('#tblAppendGrid').appendGrid('getCtrlValue', 'Total_', i)|| 0);
		// 		// if(valorNumero>0)
		// 		// {
		// 			sumaTotal=sumaTotal+valorNumero;
		// 		// }
		// 	}
        //     var formateadaNumero = Number(sumaTotal).toFixed(2);
		// 	$("#totaldeTotales").text(numberWithCommas(formateadaNumero));
		// 	$("#TotalValorSave").val(numberWithCommas(formateadaNumero));
		// }

        // Borrar Tabla
		// function tablaVacia(borrarCual)
		// {
		// 	var filasContadas=$('#tblAppendGrid').appendGrid('getRowCount');
		// 	if(filasContadas>1)
		// 	{
		// 		$('#tblAppendGrid').appendGrid('removeRow',borrarCual);
		// 	}else{
		// 		return;
		// 	}
		// }

        // Grabar Invoice
        $("#btnAddinvoice").click(function()
        {
			var clienteSeleccionado = $("#Client_Selected").val();
            if(clienteSeleccionado == "")
			{
                Swal.fire({icon: 'error',title: 'Oops...',text: 'You should select an customer'});
				$("#Client_Selected").focus();
				return false;
			}
            var MontoFactura =$("#TotalValorSave").val();
			if(MontoFactura <1)
			{
                Swal.fire({icon: 'error',title: 'Oops...',text: 'The total invoice is less than $1'});
				return false;
			}
            var plazo = $('#plazoInvoice').val();
            switch(plazo)
            {
                case 'Upon Receipt':
                    var cantidadDays = 0;
                break

                case 'Net 7':
                    var cantidadDays = 7;
                break

                case 'Net 21':
                    var cantidadDays = 21;
                break

                case 'Net 30':
                    var cantidadDays = 30;
                break
            }
            var $inputAddDMY = $('#FechaInvoice').pickadate();
            var pickerDMY = $inputAddDMY.pickadate('picker');
            var pickDMY = pickerDMY.get('select', 'yyyy/mm/dd');
            var dateSumada = moment(pickDMY).add(cantidadDays,'days').format("MM-DD-YYYY");
            var dateVenceGrabar=moment(dateSumada).format("YYYY-MM-DD");
            var cuantasFilaSon = ($('#tblAppendGrid').appendGrid('getRowCount'));
            $("#FechaDueSave").val(dateVenceGrabar);
			$("#FacturacuantasFilaSon").val(cuantasFilaSon);
            var PagoLaFactura = $("#AddFormaDepago").val();
            if(PagoLaFactura == "")
            {
                Swal.fire(
                {
                    title: 'Are you sure?',
                    text: "Do you want to save this Invoice without paying ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => 
                {
                    if (result.isConfirmed) 
                    {
                        $("#AddFacturaPagada").val("");
                        $("#facturaEstatus").val("Unpaid");
                        $("#FrmAddInvoice").submit();
                    }
                })
            }else{
                $("#AddFacturaPagada").val("Y");
                $("#facturaEstatus").val("Paid");
                $("#FrmAddInvoice").submit();
            }
		})

        // View Invoice
        $("#Invoice_View").click(function()
        {
            IDcodigo = $('#tabla_invoices').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(IDcodigo != "")
			{
                var data = JSON.stringify($("#tabla_invoices").bootstrapTable('getSelections'));
                var obj = JSON.parse(data);
                var inv_numero = obj[0].InvoiceNumber;
                var Nombre = obj[0].InvoiceCliente;
                var Direccion = obj[0].InvoiceClienteAddress;
                var Correo = obj[0].InvoiceClienteCorreo;
                var Telefono = obj[0].InvoiceClienteTlf;
                var FechaFactura = obj[0].InvoiceFecha;
                var PlazoFactura = obj[0].InvoiceFechaPlazo;
                var VenceFactura = obj[0].InvoiceDue;
                var NumeroDeFactura = obj[0].InvoiceNumero;
                var cuantoSumo = obj[0].InvoiceMonto;
                $('#facturaHeaderVer').text(inv_numero);
                $("#ClientView_Nombre").text(Nombre);
                $("#ClienteView_Address").text(Direccion);
                $("#ClienteView_Email").text(Correo);
                $("#ClienteView_Tlf").text(Telefono);
                $("#FechaInvoiceView").val(FechaFactura);
                $("#plazoInvoiceView").val(PlazoFactura);
                $("#VenceInvoiceView").val(VenceFactura);
                $("#TotalInvoiceView").val(cuantoSumo);
                $('#ModalViewInvoice').modal('show');
				// Ver Factura Detalle 
				$.ajax({
					url:'json/json_invoice_d.php?Inv='+NumeroDeFactura,
					type: 'get',
					dataType: 'json'
				}).done(function(data) 
                {
					$('#tblAppendGridVer').appendGrid(
                    {
						columns: [
                            { name: 'Unit_',  type: 'text', display: 'Item', displayCss: { 'color': '#898888', 'text-align': 'center'}, ctrlCss: { 'width': '80px', 'border':'none', 'font-size':'10pt'}, ctrlProp: { disabled: true }},
							{ name: 'Job_',   type: 'text', display: 'Description', displayCss: { 'color': '#898888', 'text-align': 'center' }, ctrlCss: { 'width': '670', 'border':'none', 'font-size':'10pt'}, ctrlProp: { disabled: true }},
							{ name: 'Qty_',   type: 'number', display: 'Quantity', displayCss: { 'color': '#898888', 'text-align': 'center' }, ctrlCss: { 'width': '50px', 'text-align': 'center', 'border':'none', 'font-size':'10pt' }, ctrlProp: { disabled: true }},
							{ name: 'Price_', type: 'text', display: 'Amount', displayCss: { 'color': '#898888', 'text-align': 'center' }, ctrlCss: { 'width': '80px', 'text-align': 'right', 'border':'none', 'font-size':'10pt'}, ctrlProp: { disabled: true } },
							{ name: 'Total_', type: 'text', display: 'SubTotal', displayCss: { 'color': '#898888', 'text-align': 'center' }, ctrlCss: { 'width': '100px', 'text-align': 'right', 'border':'none', 'font-size':'10pt', 'background-color':'#FEF7E0', 'font-style':'italic'}, ctrlProp: { disabled: true }}
						],
						hideButtons: {
							removeLast: true,
							moveUp: true,
							moveDown: true,
							insert: true,
							remove: true,
							append: true
						},
						initData: data
					});
				});
			}else{
				alert("You must select first an Invoice");
			}
        })

        // Imprimir Invoice
		$('#Invoice_Print').click(function()
		{
            IDcodigo = $('#tabla_invoices').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(IDcodigo == "")
			{
                alert("You must select first an Invoice");
				return;
			}
            var data = JSON.stringify($("#tabla_invoices").bootstrapTable('getSelections'));
            var obj = JSON.parse(data);
            var FacturaXMY = obj[0].InvoiceNumero;
            var Cliente__NumeroDeFactura = obj[0].InvoiceNumber;
            var Cliente__Nombre = obj[0].InvoiceCliente;
            var Cliente__Direccion = obj[0].InvoiceClienteAddress;
            var Cliente__Correo = obj[0].InvoiceClienteCorreo;
            var Cliente__Telefono = obj[0].InvoiceClienteTlf;
            var Cliente__FechaFactura = obj[0].InvoiceFecha;
            var Cliente__PlazoFactura = obj[0].InvoiceFechaPlazo;
            var Cliente__VenceFactura = obj[0].InvoiceDue;
            var Cliente__NumeroDeFactura = obj[0].InvoiceNumber;
            var Cliente__CuantoSumo = obj[0].InvoiceMonto;
            var Cliente__Empresa = obj[0].InvoiceEmpresa;
            var Cliente__InvoicePagado = obj[0].InvoiceFuePagado;
            var Cliente__InvoicePaidDMY = obj[0].InvoiceFechadePago;
            var Cliente__InvoicePaidForma = obj[0].InvoiceFormadePago;
            var Cliente__InvoicePaidRefer = obj[0].InvoiceReferenciaPago;
            var dataString = {iCliente__NumeroDeFactura:Cliente__NumeroDeFactura, iCliente__FechaDeFactura:Cliente__FechaFactura, iCliente__PlazoDeFactura:Cliente__PlazoFactura, iCliente__VenceDeFactura:Cliente__VenceFactura, iCliente__Empresa:Cliente__Empresa, iCliente__InvoicePaidDMY:Cliente__InvoicePaidDMY, iCliente__Nombre:Cliente__Nombre, iCliente__InvoicePaidForma:Cliente__InvoicePaidForma, iCliente__Address:Cliente__Direccion, iCliente__InvoicePaidRefer:Cliente__InvoicePaidRefer, iCliente__Phone:Cliente__Telefono, iCliente__Email:Cliente__Correo, iCliente__InvoicePaid:Cliente__InvoicePagado};
            var path = document.location.pathname;
            var directory = path.substring(path.indexOf('/'), path.lastIndexOf('/'))+'/tmp/';
            $.ajax({
                type: "POST",
                url: "modulos/pdf_invoice.php?xmy="+FacturaXMY,
                data: dataString,
                success: function() 
                {
                    printJS(directory+'invoice_'+FacturaXMY+'.pdf')
                }
            });	
        })

        // Delete Invoice
        $('#Invoice_Delete').click(function()
        {
            IDcodigo = $('#tabla_invoices').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(IDcodigo == "")
			{
                alert("You must select first an Invoice");
				return;
			}
            var data = JSON.stringify($("#tabla_invoices").bootstrapTable('getSelections'));
            var obj = JSON.parse(data);
            var IdErase = obj[0].InvoiceNumber;
            var IdEraseId = obj[0].InvoiceNumero;
            $("#idInvoiceErase").val(IdEraseId);
            $("#idInvoiceDelete").text(IdErase);
            $('#DeletedModal').modal('show');
        })

        // Delete Invoice/Validar
        $('#FrmBtndeleteInvoice').click(function()
        {
            $('#formDeleteInvoice').submit();
        })

        // Edit Invoice
        // $('#Invoice_Edit').click(function()
        // {
        //     IDcodigo = $('#tabla_invoices').find('[type="radio"]:checked').map(function(){
		// 		return $(this).closest('tr').find('td:nth-child(2)').text();
		// 	}).get();
        //     if(IDcodigo == "")
		// 	{
        //         alert("You must select first an Invoice");
		// 		return;
		// 	}
        //     var data = JSON.stringify($("#tabla_invoices").bootstrapTable('getSelections'));
        //     var obj = JSON.parse(data);
        //     var IDIDcliente = obj[0].InvoiceClienteID;
        //     var inv_numeroEdit = obj[0].InvoiceNumber;
        //     var DireccionEdit = obj[0].InvoiceClienteAddress;
        //     var CorreoEdit = obj[0].InvoiceClienteCorreo;
        //     var TelefonoEdit = obj[0].InvoiceClienteTlf;
        //     var FechaFacturaEdit = obj[0].InvoiceFecha;
        //     var PlazoFacturaEdit = obj[0].InvoiceFechaPlazo;
        //     var VenceFacturaEdit = obj[0].InvoiceDue;
        //     var NumberDeFactura = obj[0].InvoiceNumero;
        //     var cuantoSumoEdit = obj[0].InvoiceMonto;
        //     var dateFechaSin = obj[0].InvoiceFechaSin;
        //     $("#Date_Edit_Edit").val(dateFechaSin);
        //     $('#FacturaIDID').val(NumberDeFactura);
        //     $('#facturaHeaderEdit').text(inv_numeroEdit);
        //     $('#ClienteEditDireccion').text(DireccionEdit);
        //     $('#ClienteEditCorreo').text(CorreoEdit);
        //     $('#ClienteEditTelefono').text(TelefonoEdit);
        //     $("#ClientEdit_Selected").selectpicker('val',IDIDcliente);
        //     $('#FechaEditInvoice').val(FechaFacturaEdit);
        //     $('#plazoEditInvoice').val(PlazoFacturaEdit);
        //     $('#VenceEditInvoice').text(VenceFacturaEdit);
        //     $("#totaldeTotalesEdit").text(cuantoSumoEdit);
        //     $("#TotalValorUpdated").val(cuantoSumoEdit);
        //     $('#ModalEditInvoice').modal('show');
        //     // Editar Factura Detalle 
        //     $.ajax({
        //         url:'json/json_invoice_d.php?Inv='+NumberDeFactura,
        //         type: 'get',
        //         dataType: 'json'
        //     }).done(function(data) 
        //     {
        //         $('#tblAppendGridEdit').appendGrid({
        //             columns: [
        //                 { name: 'Unit_', type: 'text', display: 'Item', displayCss: { 'color': '#24476A', 'text-align': 'center' }, ctrlCss: { 'width': '80px', 'border':'none', 'font-size':'10pt'}},
        //                 { name: 'Job_', type: 'ui-autocomplete', display: 'Description', displayCss: { 'color': '#24476A', 'text-align': 'center' }, ctrlCss: { 'width': '670px', 'border':'none', 'font-size':'10pt'}, uiOption:{source:'json/json_items.php', minLength:2}},
        //                 { name: 'Qty_', type: 'number', display: 'Quantity', displayCss: { 'color': '#24476A', 'text-align': 'center' }, ctrlCss: { 'width': '50px', 'text-align': 'center', 'border':'none', 'font-size':'10pt' },onChange: function(evt, rowIndex){ Calcular_Edit(rowIndex);}},
        //                 { name: 'Price_', type: 'number', display: 'Amount', displayCss: { 'color': '#24476A', 'text-align': 'center' }, ctrlCss: { 'width': '80px', 'text-align': 'right', 'border':'none', 'font-size':'10pt'},onChange: function(evt, rowIndex){ Calcular_Edit(rowIndex);}},
        //                 { name: 'Total_2', type: 'text', display: 'SubTotal', displayCss: { 'color': '#24476A', 'text-align': 'center' }, ctrlCss: { 'width': '100px', 'text-align': 'right', 'border':'none', 'font-size':'10pt', 'background-color':'#FEF7E0', 'font-style':'italic'}, ctrlProp: { disabled: true }}
        //             ],
        //             hideButtons: {
        //                 removeLast: true,
        //                 moveUp: true,
        //                 moveDown: true,
        //                 insert: true
        //             },
        //             initData: data,
        //             rowDragging: true,
        //             afterRowRemoved: function (caller, rowIndex) {
        //                 borroFilaEdit();
        //             }
        //         });
        //     });
        // })

        // Sumar Invoice Editado
		// function Calcular_Edit(valorPasado)
		// {
		// 	var invoiceCantidadEdit = $('#tblAppendGridEdit').appendGrid('getCtrlValue', 'Qty_', valorPasado);
		// 	var invoicePrecioEdit = $('#tblAppendGridEdit').appendGrid('getCtrlValue', 'Price_', valorPasado);
		// 	if(invoiceCantidadEdit<1)
		// 	{
		// 		$('#tblAppendGridEdit').appendGrid('setCtrlValue', 'Qty_', valorPasado, '1');
		// 		invoiceCantidadEdit=1;
		// 	}
		// 	if(!$.isNumeric(invoicePrecioEdit) && invoicePrecioEdit !== "")
		// 	{
        //         alert("Error: Wrong Price");
		// 		$('#tblAppendGridEdit').appendGrid('setCtrlValue', 'Price_', valorPasado, '');
		// 		return;
		// 	}
		// 	var invoiceSubTotalEdit = invoiceCantidadEdit*invoicePrecioEdit;
		// 	$('#tblAppendGridEdit').appendGrid('setCtrlValue', 'Total_2', valorPasado, invoiceSubTotalEdit.toFixed(2));
		// 	var totalFilasEdit=$('#tblAppendGridEdit').appendGrid('getRowCount');
		// 	var sumaTotalEdit=0;
		// 	var valorNumeroEdit=0;
		// 	for (var i=0; i<totalFilasEdit; i++) 
		// 	{
		// 		valorNumeroEdit=parseFloat($('#tblAppendGridEdit').appendGrid('getCtrlValue', 'Total_2', i)|| 0);
		// 		if(valorNumeroEdit>0)
		// 		{
		// 			sumaTotalEdit=sumaTotalEdit+valorNumeroEdit;
		// 		}
		// 	}
        //     var formateadaNumeroEdit = Number(sumaTotalEdit).toFixed(2);
		// 	$("#totaldeTotalesEdit").text(numberWithCommas(formateadaNumeroEdit));
        //     $("#TotalValorUpdated").val(numberWithCommas(formateadaNumeroEdit));
		// }

        // Cambiar Plazo Fecha/Edit Invoice
        $('#plazoEditInvoice').change(function()
        {
            var selectedEdit = $("#plazoEditInvoice").val();
            var fechaSelectedEdit = $("#Date_Edit_Edit").val();
            switch(selectedEdit)
            {
                case 'Upon Receipt':
                    var cantidadDiasEdit = 0;
                break

                case 'Net 7':
                    var cantidadDiasEdit = 7;
                break

                case 'Net 21':
                    var cantidadDiasEdit = 21;
                break

                case 'Net 30':
                    var cantidadDiasEdit = 30;
                break
            }
            var fechaSumadaEdit = moment(fechaSelectedEdit).add(cantidadDiasEdit,'days').format("MM-DD-YYYY");
			var fechaVenceEditFormato=moment(fechaSumadaEdit).format("ddd DD, MMM yyyy");
			var fechaVenceGrabar=moment(fechaSumadaEdit).format("YYYY-MM-DD");
            $("#FechaDueSaveEdit").val(fechaVenceGrabar);
            $("#VenceEditInvoice").text(fechaVenceEditFormato);
        })

        // Borrar Fila/Edit
		// function borroFilaEdit()
		// {
		// 	var totalFilas=$('#tblAppendGridEdit').appendGrid('getRowCount');
		// 	var sumaTotal=0;
		// 	var valorNumero=0;
		// 	for (var i=0; i<totalFilas; i++) 
		// 	{
		// 		valorNumero=parseFloat($('#tblAppendGridEdit').appendGrid('getCtrlValue', 'Total_2', i)|| 0);
		// 		// if(valorNumero>0)
		// 		// {
		// 			sumaTotal=sumaTotal+valorNumero;
		// 		// }
		// 	}
        //     var formateadaNumero = Number(sumaTotal).toFixed(2);
		// 	$("#totaldeTotalesEdit").text(numberWithCommas(formateadaNumero));
		// 	$("#TotalValorUpdated").val(numberWithCommas(formateadaNumero));
		// }

        // Update Invoice
        // $("#btnEditinvoice").click(function()
        // {
        //     var fecha_x = $('#Date_Edit_Edit').val();
        //     var plazo_x = $("#plazoEditInvoice").val(); 
        //     var cuantasFilaFueron = ($('#tblAppendGridEdit').appendGrid('getRowCount'));
		// 	var MontoFacturaEdit =$("#TotalValorUpdated").val();
		// 	if(MontoFacturaEdit <1)
		// 	{
		// 		alert("Error, total invoice is less than $1");
		// 		return false;
		// 	}
        //     switch(plazo_x)
        //     {
        //         case 'Upon Receipt':
        //             var cantidadDias_X = 0;
        //         break

        //         case 'Net 7':
        //             var cantidadDias_X = 7;
        //         break

        //         case 'Net 21':
        //             var cantidadDias_X = 21;
        //         break

        //         case 'Net 30':
        //             var cantidadDias_X = 30;
        //         break
        //     }
        //     var dateSumada = moment(fecha_x).add(cantidadDias_X,'days').format("MM-DD-YYYY");
        //     var dateVenceGrabar=moment(dateSumada).format("YYYY-MM-DD");
		// 	$("#FacturaCountRows").val(cuantasFilaFueron);
		// 	$("#FechaDueSaveEdit").val(dateVenceGrabar);
		// 	$("#FrmEditInvoice").submit();
		// })

        // Cliente Seleccionado/Edit
        $('#ClientEdit_Selected').change(function()
        {
            var selectedEdit = $(this).find('option:selected');
            var CualAddressEdit=selectedEdit.data('address');
            var CualEmailEdit=selectedEdit.data('email');
            var CualPhoneEdit=selectedEdit.data('phone');
            $("#ClienteEditDireccion").text(CualAddressEdit);       
            $("#ClienteEditCorreo").text(CualEmailEdit);        
            $("#ClienteEditTelefono").text(CualPhoneEdit);        
        })

        // Cambiar Fecha/Edit
        $('#FechaEditInvoice').change(function()
        {
            var $inputAddDMY = $('#FechaEditInvoice').pickadate();
            var pickerDMY = $inputAddDMY.pickadate('picker');
            var fecha_x = pickerDMY.get('select', 'yyyy/mm/dd');
            var plazo_x = $("#plazoEditInvoice").val();
            var fechaSin_x = moment(fecha_x).format("YYYY-MM-DD");
            switch(plazo_x)
            {
                case 'Upon Receipt':
                    var cantidadDias_X = 0;
                break

                case 'Net 7':
                    var cantidadDias_X = 7;
                break

                case 'Net 21':
                    var cantidadDias_X = 21;
                break

                case 'Net 30':
                    var cantidadDias_X = 30;
                break
            }
            var fechaSumada_X = moment(fecha_x).add(cantidadDias_X,'days').format("MM-DD-YYYY");
            var fechaVence_X = moment(fechaSumada_X).format("ddd DD, MMM yyyy");
            var fechaVenceSin_x = moment(fechaSin_x).add(cantidadDias_X,'days').format("YYYY-MM-DD");
            $("#VenceEditInvoice").text(fechaVence_X);
            $("#FechaDueSaveEdit").val(fechaVenceSin_x);
            $("#Date_Edit_Edit").val(fechaSin_x);
        })

        // Add Payment
        $("#btnAddPayment").click(function()
        {
            $('#AddModalPayment').modal('show');
        });

        // Close Invoice
        $("#btnCloseinvoice").click(function()
        {
            $('#FormaDepago').val("");
            $('#RefDepago').val("");
            $('#NotesDepago').val("");
            $('#AddDatePago').val("");
            // $('#tablaFacturas').empty();
            $('#ModalAddInvoice').modal('hide');
        });

        // Close Payment
        $("#btnCerrarPago").click(function()
        {
            var $inputAddDMY = $('#FechaDePago').pickadate();
            var pickerDMY = $inputAddDMY.pickadate('picker');
            var fecha_pago = pickerDMY.get('select', 'yyyy/mm/dd');
            var getFormadePago = $('#FormaDepago').val();
            var getRefdePago = $('#RefDepago').val();
            var getNotadePago = $('#NotesDepago').val();
            $('#AddFormaDepago').val(getFormadePago);
            $('#AddRefDepago').val(getRefdePago);
            $('#AddNotesDepago').val(getNotadePago);
            $('#AddDatePago').val(fecha_pago);
            $('#AddModalPayment').modal('hide');
        });

        // View Payment
        $("#btnVerPayment").click(function()
        {
            var data = JSON.stringify($("#tabla_invoices").bootstrapTable('getSelections'));
            var obj = JSON.parse(data);
            var ver_fecha = obj[0].InvoiceFechadePago;
            var ver_forma = obj[0].InvoiceFormadePago;
            var ver_referencia = obj[0].InvoiceReferenciaPago;
            var ver_notes = obj[0].InvoiceNotaPago;
            $('#VerFechaDePago').val(ver_fecha);
            $('#VerFormaDepago').val(ver_forma);
            $('#VerRefDepago').val(ver_referencia);
            $('#VerNotesDepago').val(ver_notes);
            $('#VerModalPayment').modal('show');
        });

        // Edit Payment
        $("#btnEditPayment").click(function()
        {
            var data = JSON.stringify($("#tabla_invoices").bootstrapTable('getSelections'));
            var obj = JSON.parse(data);
            var edit_fecha = obj[0].InvoiceFechadePago;
            var edit_forma = obj[0].InvoiceFormadePago;
            var edit_referencia = obj[0].InvoiceReferenciaPago;
            var edit_notes = obj[0].InvoiceNotaPago;
            var edit_pagado = obj[0].InvoiceFuePagado;
            var edit_pagadosin = obj[0].InvoicePaidFechaSin;
            var pickerFecha = $('#EditFechaDePago').pickadate('picker');
            if(edit_pagado == "Y")
            {
                pickerFecha.set('select', edit_pagadosin,{format: 'yyyy-mm-dd'});
                $('#EditFormaDepago').val(edit_forma);
                $('#EditRefDepago').val(edit_referencia);
                $('#EditNotesDepago').val(edit_notes);
                $('#EditModalPayment').modal('show');
            }else{
                Swal.fire({icon: 'error',title: 'Oops...',text: 'This Invoice has not been paid. Please mark it paid'});
				return false;
            }
        });

        // Edit Payment/Update
        $("#btnEditinvoicePaid").click(function()
        {
            var $inputAddDMY = $('#EditFechaDePago').pickadate();
            var pickerDMY = $inputAddDMY.pickadate('picker');
            var fecha_x = pickerDMY.get('select', 'yyyy/mm/dd');
            var forma = $("#EditFormaDepago").val();
            var referencia = $("#EditRefDepago").val();
            var notas = $("#EditNotesDepago").val();
            $("#PaymentEditado").val("Y");
            $("#PaymentEditFecha").val(fecha_x);
            $("#PaymentEditForma").val(forma);
            $("#PaymentEditRef").val(referencia);
            $("#PaymentEditNotes").val(notas);
            $('#EditModalPayment').modal('hide');
        })

        // Mark Paid
        $("#Invoice_Paid").click(function()
        {
            IDcodigo = $('#tabla_invoices').find('[type="radio"]:checked').map(function(){
				return $(this).closest('tr').find('td:nth-child(2)').text();
			}).get();
            if(IDcodigo == "")
			{
                alert("You must select first an Invoice");
				return;
			}
            var data = JSON.stringify($("#tabla_invoices").bootstrapTable('getSelections'));
            var obj = JSON.parse(data);
            var ver_invoiceEs = obj[0].InvoiceNumber;
            var ver_fuePagado = obj[0].InvoiceFuePagado;
            var ver_NumberDeFactura = obj[0].InvoiceNumero;
            if(ver_fuePagado == "Y")
            {
                Swal.fire({icon: 'error',title: 'Oops...',text: 'This Invoice has been paid before'});
				return false;
            }
            $('#FacturaIDPaid').val(ver_NumberDeFactura);
            $("#idInvoicePaid").text(ver_invoiceEs);
            $('#AddModalMarkPaid').modal('show');
        });

        // Validar Mark Paid
        $("#btnMarkPaid").click(function()
        {
            if($("#MarkFormaDepago").val()=="")
            {
                alert("Error: Select a Method Payment");
                $("#MarkFormaDepago").focus();
                return false;
            }
            $("#FrmMarkPaidInvoice").submit();
        })

        // Add Rows
        var rowCount = 1;
        $("#btnAddFilas").click(function()
        {
            rowCount++;
            $('#tablaFacturas').append('<tr class="altoDeFila" id="row'+rowCount+'"><td class="tablesmallTD text-center text-danger">'+rowCount+'</td><td class="tablesmallTD"><input class="form-control text-center sin-border" type="text" id="Invoice_Item_'+rowCount+'" name="Invoice_Item[]" maxlength="6" for="'+rowCount+'"/></td><td class="tablesmallTD"><input class="form-control sin-border" type="text" id="Invoice_Description_'+rowCount+'" name="Invoice_Description[]" maxlength="60" for="'+rowCount+'"/></td><td class="tablesmallTD"><input class="form-control sin-border text-right Invoice_Price" type="number" id="Invoice_Price_'+rowCount+'" data-type="Invoice_Price" name="Invoice_Price[]" for="'+rowCount+'"/></td><td class="tablesmallTD"><input class="form-control sin-border text-center Invoice_Qty" type="number" step="1" min="0" value="1" oninput="this.value = Math.round(this.value);" id="Invoice_Qty_'+rowCount+'" name="Invoice_Qty[]" for="'+rowCount+'"/></td><td class="tablesmallTD tablesmallTtlFondo"><input class="form-control sin-border text-right Invoice_Total" type="text" id="Invoice_Total_'+rowCount+'" name="Invoice_Total[]" readonly for="'+rowCount+'"/></td><td class="tablesmallTD text-center"><button type="button" name="remove" id="'+rowCount+'" class="btn btn-xs btn-danger btn_borraFila">-</button></td></tr>');
        });

        // Delete Rows
        $(document).on('click', '.btn_borraFila', function() 
        {
          var button_id = $(this).attr('id');
          $('#row'+button_id+'').remove();
          var fila = 0;
          $("#tablaFacturas").find('tr').each(function(i,el)
          {
            var tds = $(this).find('td');
            tds.eq(0).text(fila);
            fila ++;
          });
          rowCount = fila-1;
          calculateSubTotal();
        });

        // Columnas Precio, Cantidad
        $("#tablaFacturas").on('input', 'input.Invoice_Qty,input.Invoice_Price', function() 
        {
            getTotalCost($(this).attr("for"));
        });

        // Sumar Columnas
        function getTotalCost(ind) 
        {
            var qty = $('#Invoice_Qty_'+ind).val();
            var price = $('#Invoice_Price_'+ind).val();
            var totNumber = (qty * price);
            var tot = currency(totNumber,{separator:',',decimal: '.'}).format();
            $('#Invoice_Total_'+ind).val(tot);
            calculateSubTotal();
        }

        // Sumar Todo
        function calculateSubTotal() 
        {
          var subtotal = 0;
          var valorGet = 0;
          $('.Invoice_Total').each(function() 
          {
            if($(this).val() == "")
            {
                valorGet = 0;
            }else{
                valorGet = $(this).val();
            }
            subtotal = currency(subtotal).add(valorGet);
          });
          var totTotal = currency(subtotal,{separator:',',decimal: '.'}).format();
          $('#TotaldeTotales').text(totTotal);
          $('#TotaldeTotales').val(totTotal);
        }

        $("#tags").autocomplete({source: availableTags});
    });

    // Formato Número
    function numberWithCommas(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    // Asignar Colores Invoice
	function coloresInvoiceFormat(value)
	{
		var valorAsignado = value;
		switch (valorAsignado)
		{
			case 'Unpaid':
				asignadoDevuelta='<div style="margin: auto;width:80px;background-color:red;color:white;font-size:12;">'+valorAsignado+'</div>';
			break;

			case 'Paid':
				asignadoDevuelta='<div style="margin: auto;width:80px;background-color:#adedc6;color:black;font-size:12;">'+valorAsignado+'</div>';
			break;

			default:
				asignadoDevuelta="error";
			break;
		}
		return asignadoDevuelta;
	}
</script>