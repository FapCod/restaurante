@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
<div class="container">
    <div class=" mx-auto content card text-center mp-10  text-dark" style="background-color: #F7D24E">
        <h1 class="m-4 font-weight-bold">Reportes<span class="badge badge-secondary ">Gestion</span></h1>
    </div>
</div>
@stop

@section('content')
    @livewire('admin.report-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        Livewire.on('cleanupEvent',() => {
            Livewire.emit('cleanup');
            $("#table_id").dataTable().fnDestroy();
            setTimeout(() => {
                    $(document).ready(function() {
                        var table = $('#table_id').DataTable({
                                responsive: true,
                                select: true,
                                scrollY: '200px',
                                scrollX:true,
                                scrollCollapse: true,
                                "language": {
                                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                                    }
                            })
                            .columns.adjust()
                            .responsive.recalc();
                    });
                }, 1000);
        });
        
       $(document).ready(function() {
                var table = $('#table_id').DataTable({
                        responsive: true,
                        select: true,
                        scrollY: '200px',
                        scrollX:true,
                        scrollCollapse: true,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                            }
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
    </script>
    
@stop
