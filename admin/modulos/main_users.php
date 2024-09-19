<div class="container-fluid">
    <div class="card card-cascade narrower">
        <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center" id="Tblbotones">
            <div>
            </div>
            <a href="#" class="white-text text-left mx-3">Users</a>
            <div>
            </div>
        </div>
        <div class="px-4">
            <div class="table-wrapper">
                <table class="table table-sm table-bordered table-hover"
                    id="tabla_users"
                    data-toggle="table"
                    data-search="true"
                    data-click-to-select="true"
                    data-pagination="true"
                    data-height="600"
                    data-search-align="left"
                    data-show-fullscreen="true"
                    data-show-refresh="true"
                    data-show-toggle="true"
                    data-id-field="id_usuario"
                    data-select-item-name="id_usuario"
                    data-buttons-class="blue lighten-4 btn-md"
                    data-show-columns="true"
                    data-show-export="true"
                    data-page-list="[10, 25, 50, 100, 200, All]"
                    data-url="json/json_users.php">
                    <thead class="blue accent-5 white-text">
                        <tr>
                            <th data-radio="true" data-show-select-title="true">&#10003;</th>
                            <th data-field="id_usuario" data-switchable="false" data-sortable="true" data-align="center"><i class="fas fa-portrait mr-2"></i>ID</th>
                            <th data-field="usuario_nombre" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-user mr-2"></i>User</th>
                            <th data-field="usuario_login" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-portrait mr-2"></i>Login</th>
                            <th data-field="usuario_clave" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-key mr-2"></i>Password</th>
                            <th data-field="tipoDeUsuario" data-sortable="false" data-halign="center" data-align="center"><i class="fas fa-info-circle mr-2"></i>Type</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>