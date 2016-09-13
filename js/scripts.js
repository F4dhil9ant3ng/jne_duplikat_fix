$(document).ready(function() {
	$.get("act.tarif.php?action=cekKota", function(data, status){
		var arr = JSON.parse(data);
		$("#inTujuan").typeahead({
			source:arr
		});
  });
	$.get("act.tarif.php?action=cekKota", function(data, status){
		var arr = JSON.parse(data);
		$("#inSekarang").typeahead({
			source:arr
		});
  });

	$("#btn_awb").click(function(){
		var awb_value = $("#awb_value").val();
		if (awb_value ==="") {
			alert("NOMOR AWB TIDAK BOLEH KOSONG");
		} else {
			$("#awb_form").submit(function(e){
				var postData = $(this).serializeArray();
				var formURL = $(this).attr("action");
				$.ajax(
				{
					url : formURL,
					type: "POST",
					data : postData,
					success:function(data, textStatus, jqXHR)
						{
							var obj = JSON.parse(data);
							$('#awbModalDialog').modal('show');
							$("#awb_data").append("<td>"+obj[0].awb+"</td>");
							$("#awb_data").append("<td>"+obj[0].barang+"</td>");
							$("#awb_data").append("<td>"+obj[0].pengirim+"</td>");
							$("#awb_data").append("<td>"+obj[0].penerima+"</td>");
							$("#awb_data").append("<td>"+obj[0].tujuan+"</td>");
							$("#awb_data").append("<td>"+obj[0].jenis+"</td>");
							$("#awb_data").append("<td>"+obj[0].status+"</td>");
							$("#awb_data").append("<td><a href='view.details.php?awb="+obj[0].awb+"'>Details</a></td>");
						},
					error: function(jqXHR, textStatus, errorThrown)
						{
							alert(errorThrown);
						}
				});
					e.preventDefault();	//STOP default action
			});
			$("#awb_form").submit(); //SUBMIT FORM
		}
	});

	$("#btnCekTarif").click(function(){
		$("#cekTarif").submit(function(e){
			var postData = $(this).serializeArray();
			var formURL = $(this).attr("action");
			$.ajax(
			{
				url : formURL,
				type: "POST",
				data : postData,
				success:function(data, textStatus, jqXHR)
					{
						var obj = JSON.parse(data);
						var berat = $("#tarif_berat").val();
						var inNow = $("#inSekarang").val();
						var totalHarga='';
						$.each(obj, function() {
							var harga = parseInt(this.harga);
							totalHarga = berat*harga;
						  $("#tarif_data").append(
								$("<tr>").append(
									$("<td>").text(inNow),
									$("<td>").text(this.tujuan),
									$("<td>").text("Rp."+this.harga+"/KG"),
									$("<td>").text(this.paket),
									$("<td>").text(this.estimasi),
									$("<td>").text(berat+" KG"),
									$("<td>").text("Rp."+totalHarga)
								)
							);
						});
						$('#tarif_dialog').modal('show');

					},
				error: function(jqXHR, textStatus, errorThrown)
					{
						alert(errorThrown);
					}
			});
				e.preventDefault();	//STOP default action
		});
		$("#cekTarif").submit(); //SUBMIT FORM
	});
	$(".btn_close").click(function(){
		location.reload();
	});
});
