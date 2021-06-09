$(document).ready(function() {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $.fn.dataTable
            .tables({ visible: true, api: true })
            .columns.adjust();
    })
    table = $("#Perkara_Umum").DataTable({
        responsive: true,
        columnDefs: [
            { className: "text-center align-middle", targets: 0 },
            { className: "text-center align-middle", targets: 1 },
            { className: "text-center align-middle", targets: 3 },
            { className: "text-center align-middle", targets: 4 },
            { className: "text-center align-middle", targets: 5 }
        ]
    });

    table = $("#Manajemen_Umum").DataTable({
        responsive: true,
        columnDefs: [
            { className: "text-center align-middle", targets: 0 },
            { className: "text-center align-middle", targets: 1 },
            { className: "text-center align-middle", targets: 3 },
            { className: "text-center align-middle", targets: 4 },
            { className: "text-center align-middle", targets: 5 }
        ]
    });

    table = $("#Berkas_Umum").DataTable({
        responsive: true,
        columnDefs: [
            { className: "text-center align-middle", targets: 0 },
            { className: "text-center align-middle", targets: 1 },
            { className: "text-center align-middle", targets: 3 },
            { className: "text-center align-middle", targets: 4 },
            { className: "text-center align-middle", targets: 5 }
        ]
    });

    table = $("#Users_Data, #Levels_Data, #Access_Data").DataTable({
        responsive: true
    });
});