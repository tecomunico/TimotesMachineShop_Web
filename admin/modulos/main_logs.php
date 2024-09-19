<div class="container-fluid">
    <div class="card card-cascade narrower">
        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center" id="Tblbotones">
            <div>
            </div>
            <a href="#" class="white-text text-left mx-3">Logs Transactions</a>
            <div>
            </div>
        </div>
        <div class="px-4">
            <div class="table-wrapper">
                <table class="table table-sm table-bordered table-hover"
                    id="tabla_logs"
                    data-toggle="table"
                    data-search="true"
                    data-click-to-select="true"
                    data-pagination="true"
                    data-height="600"
                    data-search-align="left"
                    data-show-fullscreen="true"
                    data-show-refresh="true"
                    data-show-toggle="true"
                    data-id-field="id"
                    data-select-item-name="id"
                    data-buttons-class="blue lighten-4 btn-md"
                    data-show-columns="true"
                    data-show-export="true"
                    data-page-list="[10, 25, 50, 100, 200, All]"
                    data-url="json/json_logs.php">
                    <thead class="blue accent-5 white-text">
                        <tr>
                            <th data-radio="true" data-show-select-title="true">&#10003;</th>
                            <th data-field="id" data-switchable="false" data-sortable="true" data-align="center"><i class="fas fa-portrait mr-2"></i>ID</th>
                            <th data-field="cuandoSeHizo" data-sortable="true" data-halign="center" data-align="center"><i class="fas fa-clock mr-2"></i>When</th>
                            <th data-field="hist_username" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-user mr-2"></i>User</th>
                            <th data-field="hist_event" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-calendar mr-2"></i>Event</th>
                            <th data-field="hist_detalle" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-info-circle mr-2"></i>Details</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>