<div>
    <style>
        h1 {
            text-align: center;
            font: bold;
            font-family: Arial, Helvetica, sans-serif;
            background: gray;
            color: white;
        }
        div {
            text-align: center;
        }
        label {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            width: 300px;
            height: 100px;
            border: 3px solid brown;
            border-radius: 22px;
            margin-top: 12px;
            background: gray;
            box-shadow: 0px 0px 60px black;
        }
        td {
            text-align: center;
        }
        tr {
            color: white;
        }
        th {
            color: rgb(255, 255, 255);
        }
    </style>
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
        <!--Title-->
        <h1>
            Productos
        </h1>
        @if (empty($start_date) && empty($end_date) && empty($status))
            <div>
                Todos los Productos
            </div>
        @elseif (empty($start_date) && empty($end_date))
            <div>
                Productos con estado:
                @if ($status == 1)
                    <span>No Publicado</span>
                @else
                    <span>Publicado</span>
                @endif
            </div>
        @else
            <div>
                <label for="">Fecha Inicio:</label>
                <input type="date"> <b>{{ $start_date }}</b>
                <label for="">Fecha Fin:</label>
                <input type="date"> <b>{{ $end_date }}</b>
                @if ($status == 2 || $status == 1)
                    <label>Estado:</label>
                    @if ($status == 2)
                        <b>Publicados</b>
                    @elseif ($status == 1)
                        <b>No publicados</b>
                    @else
                        <b>Todos</b>
                    @endif
                @endif
            </div>
        @endif


        <!--Card-->
        <div id='recipients' class="p-8 mb-6 mt-4 lg:mt-0 rounded shadow bg-white">
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="2">NOMBRE</th>
                        <th data-priority="3">ESTADO</th>
                        <th data-priority="4">STOCK</th>
                        <th data-priority="5">FECHA CREACION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                           
                            @if ($product->status == 1)
                                <td style="color:red">No publicado</td>
                            @else
                                <td style="color:green">Publicado</td>
                            @endif
                            @if (isset($product->stock))
                                @if ($product->stock == 0)
                                    <td style="color:red">Sin stock</td>
                                @else
                                    <td>{{ $product->stock }}</td>
                                @endif
                            @else
                                <td>Tiene presentaciones</td>
                            @endif
                            <td>{{ $product->created_at }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--/Card-->
    </div>

</div>