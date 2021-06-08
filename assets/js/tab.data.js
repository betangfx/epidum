$(document).ready(function() {
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('#BerkasTab a[href="' + activeTab + '"]').tab('show');
        $('#UserTab a[href="' + activeTab + '"]').tab('show');
    }
});