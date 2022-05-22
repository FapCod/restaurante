@extends('adminlte::page')

@section('title', 'Mi Alexia')

@section('content_header')
    <h1>Reportes</h1>
@stop

@section('content')
    <p>puto reportes.</p>
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
