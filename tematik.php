<?php 
// echo "<pre>";
// print_r($tematik);
// echo "</pre>";
?>

<div class="container my-5">
	


	<h3 class="text-success fw-bold">Data Peta Tematik</h3>
	<hr>
	<div class="row">
		<?php foreach ($tematik as $key => $value): ?>
			<div class="col-md-3 col-6 mb-3">
				<div class="card">
					<img src="<?php echo base_url('assets/temantik/'.'300_300_'.$value['file_tematik']) ?>" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title"><?php echo $value["nama_tematik"] ?></h5>
						<p class="card-text"><?php echo $value["deskripsi_tematik"] ?></p>
						<div class="text-center">
							<a href="<?php echo base_url("assets/temantik/".$value["file_tematik"]) ?>" target="_BLANK" class="btn btn-success">Download</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
<h1>
	<script>
		let start = performance.now();

		window.onload = function () {
			let end = performance.now();
        let loadTime = ((end - start) / 1000).toFixed(2); // detik
        document.body.insertAdjacentHTML("beforeend",
        	"<div style='position:fixed;bottom:5px;right:5px;background:#000;color:#0f0;padding:5px;border-radius:5px;z-index:9999;'>Waktu loading: " 
        	+ loadTime + " detik (" + loadTime + " second)</div>"
        	);
    };
</script>

</h1>