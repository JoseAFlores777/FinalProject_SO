<div id="vehiculos">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Vehículos</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row justify-content-between">
                <div class="col-4">
                    <h6 class="m-0 font-weight-bold text-primary">Vehículos</h6>
                </div>
                <div class="col-4 ">
                    <button id="addVehiculo" class="btn btn-outline-success float-right">
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

                        $Consulta = "select *from Aplicantes;";
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

        $('#addVehiculo').click(async function() {
            const {
                value: formValues
            } = await Swal.fire({
                title: 'Agregar un Vehiculo ',
                html: '<label for="swal-input1">Codigo</label>' +
                    '<input id="swal-input1" class="swal2-input">' +
                    '<label for="swal-input2">Nombre</label>' +
                    '<input id="swal-input2" class="swal2-input">' +
                    '<label for="swal-input3">Profesion</label>' +
                    '<input id="swal-input3" class="swal2-input">' +
                    '<label for="swal-input4">Tel</label>' +
                    '<input id="swal-input4" class="swal2-input">' +
                    '<label for="swal-input5">Dir</label>' +
                    '<input id="swal-input5" class="swal2-input">' +
                    '<label for="swal-input6">Email</label>' +
                    '<input id="swal-input6" class="swal2-input">' +
                    '<label for="swal-input7">Status</label>' +
                    '<input id="swal-input7" class="swal2-input">' +
                    '<label for="swal-input8">Traccion</label>' +
                    '<input id="swal-input8" class="swal2-input">' +
                    '<label for="swal-input9">Precio</label>' +
                    '<input id="swal-input9" class="swal2-input">',
                focusConfirm: false,
                preConfirm: () => {
                    return [
                        document.getElementById('swal-input1').value,
                        document.getElementById('swal-input2').value,
                        document.getElementById('swal-input3').value,
                        document.getElementById('swal-input4').value,
                        document.getElementById('swal-input5').value,
                        document.getElementById('swal-input6').value,
                        document.getElementById('swal-input7').value,
                        document.getElementById('swal-input8').value,
                        document.getElementById('swal-input9').value
                    ]
                }
            })

            if (formValues) {
                Swal.fire(JSON.stringify(formValues))
                console.log({
                    ...formValues
                })

                $.ajax({
                    url: "addVehicles.php",
                    type: 'post',
                    data: {
                        ...formValues
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;

                        if (status == 'true') {
                            $.ajax({
                                    url: 'vehiculos.php',
                                })
                                .done(function(html) {
                                    $("#page").empty().append(html);
                                })

                            Swal.fire(
                                'Exito!',
                                'El vehiculo se ha agregado',
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