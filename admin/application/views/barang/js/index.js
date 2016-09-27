<script type="text/javascript">
    $(document).ready(function () {
        $("#btnCekHarga").click(function() {
          var asal = $("#asal").val();
          var tujuan = $("#tujuan").val();
          var berat = $("#Berat").val();
          var jenis = $("#jenis").val();
          $.get("<?php echo site_url('')?>barang/getharga/"+asal+"/"+tujuan+"/"+berat+"/"+jenis, function(data, status){
        		// var obj = JSON.parse(data);
            // console.log(obj);
            $("#harga").val(data);
          });
        });
        $("#mytable").dataTable();
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
        $('#program_studi').select2({
          placeholder: "Masukan Kata Kunci Prodi KODE | Nama | Ketua",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'dosen/getProdi',
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
                    id: obj.id_prodi,
      							text: obj.id_prodi+ " | " +obj.nm_prodi+" | "+obj.nm_ketua
                  };
                })
              };
            },
            cache: true
          }
        });
    });
</script>
