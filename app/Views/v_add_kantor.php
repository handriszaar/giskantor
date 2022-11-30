<div class="col-sm-7">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Lokasi
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <div id="map" style="height: 400px;"></div>

            </div>
        </div>
    </div>
</div>

<div class="col-sm-5">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"> Data Kantor </div>
            <div class="panel-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    ADA KESALAHAN INPUT DATA YAITU
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                        <li>
                            <?= esc($error) ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php
                }
                ?>
                <?php
                echo form_open_multipart('kantor/save');
                ?>
                <div class="form-group">
                    <label>Nama Kantor</label>
                    <input name="nama_kantor" class="form-control" placeholder="Nama Kantor">
                </div>
                <div class="form-group">
                    <label>No Telfon</label>
                    <input name="no_telfon" class="form-control" placeholder="No Telfon">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" placeholder="Alamat Kantor">
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input id="lat" name="lat" class="form-control" placeholder="Latitude">
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input id="long"  name="long" class="form-control" placeholder="Longitude">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input name="deskripsi" class="form-control" placeholder="Deskripsi Kantor">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Simpan</button>
                </div>


                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>


<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 00) {
        curLocation = [-7.41020154175453, 109.3328996807962];
    };
    const map = L.map('map').setView([-7.41020154175453, 109.3328996807962], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function (event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#lat").val(position.lat);
        $("#long").val(position.lng).keyup();
        $("#lat, #long").change(function () {
            var position = [parseInt($("#lat").val()), parseInt($("#long").val())];
            marker.setLatlng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            map.panTo(position);
        });
    });
    map.addLayer(marker);

</script>