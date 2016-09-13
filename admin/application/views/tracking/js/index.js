<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();

        $('#id_barang').select2({
          placeholder: "Masukan Kata Kunci KODE AWB | ID Barang | Nama Barang",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'tracking/getBarang',
            type: "POST",
            dataType: 'json',
            delay: 20,
            data: function (cari) {
              return {
                q: cari.term,
                page: 20
              };
            },
            processResults: function (data) {
              return {
                results: $.map(data, function(obj) {
                  return {
                    id: obj.awb,
      							text: obj.awb+" | "+obj.id_barang+" | "+obj.nama_barang
                  };
                })
              };
            },
            cache: true
          }
        });

        $('#id_exp').select2({
          placeholder: "Masukan Kata Kunci KODE Expedisi | Asal | Tujuan",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'tracking/getExp',
            type: "POST",
            dataType: 'json',
            delay: 20,
            data: function (cari) {
              return {
                q: cari.term,
                page: 20
              };
            },
            processResults: function (data) {
              return {
                results: $.map(data, function(obj) {
                  return {
                    id: obj.id_antar,
      							text: obj.kode_expedisi+" | "+obj.asal+" | "+obj.tujuan
                  };
                })
              };
            },
            cache: true
          }
        });

    });
</script>
