<div id="empresas">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Empresas</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h6 class="m-0 font-weight-bold text-primary">Empresas</h6>
                </div>
                <div class="col-4 ">
                    <button id="addEmpresa" class="btn btn-outline-success float-right">
                        Agregar Empresa
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Tel</th>
                            <th>Dir</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Tel</th>
                            <th>Dir</th>
                            <th>Status</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php include('database.php');

                        $Consulta = "select * from Empresas;";
                        $Resultado = $VCon->query($Consulta);

                        while ($Fila = $Resultado->fetch_assoc()) {

                            $id = $Fila["id"];
                            $Nombre = $Fila["Nombre"];
                            $Tel = $Fila["Tel"];
                            $Dir = $Fila["Dir"];
                            $status = $Fila["status"];


                            echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$Nombre</td>";
                            echo "<td>$Tel</td>";
                            echo "<td>$Dir</td>";
                            echo "<td>$status</td>";
                            echo "</tr>";
                        }

                        $VCon->close();

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        $('#addEmpresa').click(async function() {
            const {
                value: formValues
            } = await Swal.fire({
                html:
          'Agrega tus datos para optimizar el llenado de los formularios' +
          '<input type="text" id="swal-input1" placeholder="Nombre de la Empresa" class="swal2-input">' +
          '<input type="text" id="swal-input2" placeholder="Telefono" class="swal2-input">' +
          '<input type="text" id="swal-input3" placeholder="Dirección" class="swal2-input">' +
          '<select type="text" id="swal-input4" class="form-select" aria-label="Default select example"><option value="" selected>Seleccione el Status</option><option value="Con Cupos">Con Cupos</option><option value="Sin Cupos">Sin Cupos</option></select>',
                preConfirm: () => {
                    return [
                        document.getElementById('swal-input1').value,
                        document.getElementById('swal-input2').value,
                        document.getElementById('swal-input3').value,
                        document.getElementById('swal-input4').value,
                    ]
                }
            })

            if (formValues) {
                Swal.fire(JSON.stringify(formValues))
                console.log({
                    ...formValues
                })

                $.ajax({
                    url: "addEmpresas.php",
                    type: 'post',
                    data: {
                        ...formValues
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;
                        console.log('json',data)

                        if (status == 'true') {
                            $.ajax({
                                    url: 'empresas.php',
                                })
                                .done(function(html) {
                                    $("#page").empty().append(html);
                                })

                            Swal.fire(
                                'Exito!',
                                'Empresa agregada',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Error!',
                                'Algo anda mal',
                                'error'
                            )
                        }
                    }
                })


            }
        })








    });
</script>