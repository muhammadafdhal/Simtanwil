$('select[name="id_provinsi"]').on('change', function () {
    $('select[name="id_kecamatan"]').empty();
    $('select[name="id_keldes"]').empty();
});
$('select[name="id_kabkota"]').on('change', function () {
    $('select[name="id_keldes"]').empty();
});
$(document).ready(function () {
    $('select[name="id_provinsi"]').on('change', function () {
        $("option[class='pilih_provinsi']").remove();
        let provinceId = $(this).val();
        if (provinceId) {
            jQuery.ajax({
                url: '/daerah/kabupaten/' + provinceId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="id_kabkota"]').empty();
                    $('select[name="id_kabkota"]').append('<option value="pilih" class="pilih_kabupaten">Pilih Kabupaten</option>');
                    $.each(data, function (key, value) {
                        $('select[name="id_kabkota"]').append('<option value="' + value + '">' + key + '</option>');
                    });
                },
            });
        } else {
            $('select[name="id_provinsi"]').empty();
        }
    });
});
$(document).ready(function () {
    $('select[name="id_kabkota"]').on('change', function () {
        $("option[class='pilih_kabupaten']").remove();
        let kabupatenId = $(this).val();
        if (kabupatenId) {
            jQuery.ajax({
                url: '/daerah/kecamatan/' + kabupatenId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="id_kecamatan"]').empty();
                    $('select[name="id_kecamatan"]').append('<option value="pilih" class="pilih_kecamatan">Pilih Kecamatan</option>');
                    $.each(data, function (key, value) {
                        $('select[name="id_kecamatan"]').append('<option value="' + value + '">' + key + '</option>');
                    });
                },
            });
        } else {
            $('select[name="id_kabkota"]').empty();
        }
    });
});
$(document).ready(function () {
    $('select[name="id_kecamatan"]').on('change', function () {
        $("option[class='pilih_kecamatan']").remove();
        let kabupatenId = $(this).val();
        if (kabupatenId) {
            jQuery.ajax({
                url: '/daerah/kelurahan/' + kabupatenId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="id_keldes"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="id_keldes"]').append('<option value="' + value + '">' + key + '</option>');
                    });
                },
            });
        } else {
            $('select[name="id_kecamatan"]').empty();
        }
    });
});

function numberFilter(evt) {
    let charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
