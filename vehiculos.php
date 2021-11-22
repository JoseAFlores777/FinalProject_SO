<div id="vehiculos">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Vehículos</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-4">
                <h6 class="m-0 font-weight-bold text-primary">Vehículos</h6>
            </div>
            <div class="col-4 ">
                <button class="btn btn-outline-success float-right">
                    Agregar Vehículo
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
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Anio</th>
                        <th>Recorrido</th>
                        <th>Motor</th>
                        <th>Traccion</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Codigo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Anio</th>
                        <th>Recorrido</th>
                        <th>Motor</th>
                        <th>Traccion</th>
                        <th>Precio</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php include('database.php');

                    $Consulta = "select *from Vehiculo;";
                    $Resultado = $VCon->query($Consulta);

                    while ($Fila = $Resultado->fetch_assoc()) {

                        $Codigo = $Fila["codigo"];
                        $Marca = $Fila["Marca"];
                        $Modelo = $Fila["Modelo"];
                        $Color = $Fila["Color"];
                        $Anio = $Fila["Anio"];
                        $Recorrido = $Fila["Recorrido"];
                        $Motor = $Fila["Motor"];
                        $Traccion = $Fila["Traccion"];
                        $Precio = $Fila["Precio"]; 

                        echo "<tr>";
                            echo "<td>$Codigo</td>";
                            echo "<td>$Marca</td>";
                            echo "<td>$Modelo</td>";
                            echo "<td>$Color</td>";
                            echo "<td>$Anio</td>";
                            echo "<td>$Recorrido</td>";
                            echo "<td>$Motor</td>";
                            echo "<td>$Traccion</td>";
                            echo "<td>$Precio</td>";
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
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

    </script>