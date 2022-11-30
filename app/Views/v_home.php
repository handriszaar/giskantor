<div id="map" style="height: 400px;"></div>


<script>
    const map = L.map('map').setView([-7.41020154175453, 109.3328996807962], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
<?php foreach ($kantor as $key =>$value) { ?>
        L.marker([<?= $value['lat'] ?>, <?= $value['long']  ?>]).addTo(map)
        .bindPopup('<b><?= $value['nama_kantor']?></b><br />');
        
<?php } ?>
</script>