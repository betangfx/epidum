$(document).ready(function() {

    $('#submit_profile').click(function() {
        var UserID = $('#UserID').val();
        var UserLevelID = $('#UserLevelID').val();
        var NIP = $('#NIP').val();
        var NamaLengkap = $('#NamaLengkap').val();
        var TempatLahir = $('#TempatLahir').val();
        var TanggalLahir = $('#TanggalLahir').val();
        var NoTelp = $('#NoTelp').val();
        var Email = $('#Email').val();
        var Alamat = $('#Alamat').val();
        var Kota = $('#Kota').val();
        var Provinsi = $('#Provinsi').val();
        var Kodepos = $('#Kodepos').val();
        $.ajax({
            type: 'POST',
            url: '../modules/setting/profile/profile.process.php',
            data: {
                'UserID': UserID,
                'UserLevelID': UserLevelID,
                'NIP': NIP,
                'NamaLengkap': NamaLengkap,
                'TempatLahir': TempatLahir,
                'TanggalLahir': TanggalLahir,
                'NoTelp': NoTelp,
                'Email': Email,
                'Alamat': Alamat,
                'Kota': Kota,
                'Provinsi': Provinsi,
                'Kodepos': Kodepos,
                'modul': 'profile'
            },
            success: function(hasil) {
                if (hasil == 'sukses' || hasil == 'sukses	') {
                    location.href = "/index.php?page=profile"
                } else {
                    alert();
                }
            }
        })
    });

    $('#newModal').on('show.bs.modal', function(e) {
        var action = $(e.relatedTarget).data('action');
        var size = $(e.relatedTarget).data('size');
        var header = $(e.relatedTarget).data('header');
        var sub_header = $(e.relatedTarget).data('sub-header');
        var module = $(e.relatedTarget).data('module');
        var sub = $(e.relatedTarget).data('submodule');
        var folder = $(e.relatedTarget).data('folder');
        var page = $(e.relatedTarget).data('form');
        var id = $(e.relatedTarget).data('id');
        var UserID = $(e.relatedTarget).data('userid');
        var UserLevel = $(e.relatedTarget).data('userlevel');
        if (action == 'tambah') {
            $('#newModal .modal-dialog').addClass('modal-dialog').addClass('modal-' + size);
            $('#newModal .modal-title').text('Form ' + header + ' ' + sub_header);
            $('#newModal .modal-header .close').hide();
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../modules/' + folder + '/' + module + '/' + page + '.form.php',
                data: { 'ID': id, 'modul': modul, 'submodul': sub, 'UserID': UserID, 'UserLevel': UserLevel },
                success: function(data) {
                    var divs = data.split('---');
                    $('#newModal .modal-body-data').html(divs[0]);
                    $('#newModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'ubah') {
            $('#newModal .modal-dialog').addClass('modal-dialog').addClass('modal-' + size);
            $('#newModal .modal-title').text('Form ' + header + ' ' + sub_header);
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../modules/' + folder + '/' + module + '/' + page + '.form.php',
                data: { 'ID': id, 'modul': modul, 'submodul': sub, 'UserID': UserID, 'UserLevel': UserLevel },
                success: function(data) {
                    var divs = data.split('---');
                    $('#newModal .modal-body-data').html(divs[0]);
                    $('#newModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'lihat') {
            $('#newModal .modal-dialog').addClass('modal-dialog').addClass('modal-' + size);
            $('#newModal .modal-title').text(header + ' ' + sub_header);
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../modules/' + folder + '/' + module + '/' + page + '.form.php',
                data: { 'ID': id, 'modul': modul, 'submodul': sub, 'UserID': UserID, 'UserLevel': UserLevel },
                success: function(data) {
                    var divs = data.split('---');
                    $('#newModal .modal-body-data').html(divs[0]);
                    $('#newModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'hapus') {
            $('#newModal .modal-dialog').removeClass('modal-dialog').removeClass('modal-dialog').removeClass('modal-lg').addClass('modal-dialog').addClass('modal-' + size);
            $('#newModal .modal-title').text('Form ' + header + ' ' + sub_header);
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../modules/' + folder + '/' + module + '/' + page + '.form.php',
                data: { 'ID': id, 'modul': modul, 'submodul': sub, 'UserID': UserID, 'UserLevel': UserLevel },
                success: function(data) {
                    var divs = data.split('---');
                    $('#newModal .modal-body-data').html(divs[0]);
                    $('#newModal .modal-footer-data').html(divs[1]);
                }
            });

        }
    });
});