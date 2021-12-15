<div id="aplicantes">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Aplicantes</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h6 class="m-0 font-weight-bold text-primary">Aplicantes</h6>
                </div>
                <div class="col-4 ">
                    <button id="addAplicante" class="btn btn-outline-success float-right">
                        Agregar Aplicante
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
                            <th>Profesion</th>
                            <th>Tel</th>
                            <th>Dir</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Profesion</th>
                            <th>Tel</th>
                            <th>Dir</th>
                            <th>Email</th>
                            <th>Status</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php include('database.php');

                        $Consulta = "select * from Aplicantes;";
                        $Resultado = $VCon->query($Consulta);

                        while ($Fila = $Resultado->fetch_assoc()) {

                            $id = $Fila["id"];
                            $Nombre = $Fila["Nombre"];
                            $Profesion = $Fila["Profesion"];
                            $Tel = $Fila["Tel"];
                            $Dir = $Fila["Dir"];
                            $Email = $Fila["Email"];
                            $Status = $Fila["Status"];


                            echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$Nombre</td>";
                            echo "<td>$Profesion</td>";
                            echo "<td>$Tel</td>";
                            echo "<td>$Dir</td>";
                            echo "<td>$Email</td>";
                            echo "<td>$Status</td>";
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

        $('#addAplicante').click(async function() {
            const {
                value: formValues
            } = await Swal.fire({
                html:
          'Agrega tus datos para optimizar el llenado de los formularios' +
          '<input type="text" id="swal-input1" placeholder="Nombre del Aplicante" class="swal2-input">' +
          '<input type="text" id="swal-input2" placeholder="Profesion" class="swal2-input">' +
          '<input type="text" id="swal-input3" placeholder="Telefono" class="swal2-input">' +
          '<input type="text" id="swal-input4" placeholder="Dirección" class="swal2-input">' +
          '<input type="text" id="swal-input5" placeholder="email" class="swal2-input">' +
          '<select type="text" id="swal-input6" class="form-select" aria-label="Default select example"><option value="" selected>Seleccione el Transporte</option><option value="En Espera">En Espera</option><option value="Contratado">Contratado</option></select>',
                preConfirm: () => {
                    return [
                        document.getElementById('swal-input1').value,
                        document.getElementById('swal-input2').value,
                        document.getElementById('swal-input3').value,
                        document.getElementById('swal-input4').value,
                        document.getElementById('swal-input5').value,
                        document.getElementById('swal-input6').value,
                    ]
                }
            })

            if (formValues) {
                Swal.fire(JSON.stringify(formValues))
                console.log({
                    ...formValues
                })

                $.ajax({
                    url: "addAplicantes.php",
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
                                    url: 'aplicantes.php',
                                })
                                .done(function(html) {
                                    $("#page").empty().append(html);
                                })

                            Swal.fire(
                                'Exito!',
                                'Aplicante agregado',
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