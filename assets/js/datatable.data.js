$(document).ready(function() {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $.fn.dataTable
                .tables({ visible: true, api: true })
                .columns.adjust();
        })
        // table = $('#list-rencana').DataTable({
        //     retrieve: true,
        //     responsive: true,
        //     "pagingType": "simple"
        // });
    table = $("#Berkas_Umum").DataTable({
        responsive: true
    });

    table = $("#Users_Data, #Levels_Data, #Access_Data").DataTable({
        responsive: true
    });
});