<style>
    #map {
        position: relative;
        width: 100%;
        height: 100vh;
        z-index: 0;
    }

    #controls {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1;
        background-color: #80C4E9;
        padding: 10px 35px 10px 35px;
        border-radius: 10px;
    }

    #menubar {
        position: absolute;
        z-index: 1;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    #frm-switch {
        position: absolute;
        z-index: 1;
        top: 60px;
        right: 10px;
        cursor: pointer;
        background-color: #fff;
        padding: 10px 35px 10px 35px;
        border-radius: 10px;
        display: none;

    }

    .close-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
    }

    .form-switch {
        padding-left: 1em;
    }

    .input-group {
        position: absolute;
        z-index: 1;
        width: 250px;
        top: 10px;
        left: 60px;
    }
</style>

<div id="map"></div>
<div id="controls" class="shadow bg-body d-none"></div>
<div id="menubar" class="shadow py-2 px-3 bg-body rounded"><i class="fa-solid fa-bars"></i></div>

<form id="frm-search">
    <div class="input-group shadow">
        <input type="text" name="txtkeyword" id="txtkeyword" class="form-control bg-light border-0 small"
            placeholder="ค้นหา..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button" onclick="searchButton();">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<div id="frm-switch">
    <i class="fa-solid fa-xmark close-btn fs-4 pe-1 pt-1"></i>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="medicine">
        <label class="form-check-label" for="medicine"><?= lang('Home.medicine'); ?></label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="relative">
        <label class="form-check-label" for="relative"><?= lang('Home.relative'); ?></label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="disease">
        <label class="form-check-label" for="disease"><?= lang('Home.disease'); ?></label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="succor">
        <label class="form-check-label" for="succor"><?= lang('Home.succor'); ?></label>
    </div>

</div>


</div>

<script>

    if (typeof map !== 'undefined') {
        map.remove();
    }
    var key = 'SP0YvasznjoCPiwDZi6N';
    var map = L.map('map').setView([13.7563, 100.5018], 10); // Bangkok, Thailand

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        apiKey: key,
        attribution: '© ISEM'
    }).addTo(map);

    var profileData = <?php echo $profile_json; ?>;
    
    var profile = JSON.parse(JSON.stringify(profileData));
    var markers = [];

    function addMarkers(profile) {
        markers.forEach(m => map.removeLayer(m.marker));
        markers = [];

        profile.forEach((item, index) => {
            if (!item.coordinates || item.coordinates.length !== 2) {
                console.error(`Invalid coordinates for item at index ${index}`);
                return;
            }

            let blueIcon = new L.Icon({
                iconUrl: '<?= base_url('assets/icons/marker-icon-blue.png'); ?>',
                shadowUrl: '<?= base_url('assets/icons/marker-shadow.png'); ?>',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            let marker = L.marker(item.coordinates, { icon: blueIcon }).bindPopup(`
                    <img src="${item.file_image}" alt="Image for Marker ${index + 1}" style="width:100%;height:auto;">            
                    <p style="font-size: 14pt">${item.prefix}${item.fullname} <br/>
                    - ${item.disease_name} <br/>
                    - ${item.succor_name} <br/>
                    - ${item.relative_name}
                    <p>Marker at ${item.coordinates}</p>
                `);

            markers.push({ marker, item });
            marker.addTo(map);
        });
    }

    addMarkers(profile);



    $('#menubar').click(function () {
        $('#frm-switch').toggle();
    });

    $('.close-btn').click(function () {
        $('#frm-switch').hide();
    });

    function searchButton() {
        let search = $('#txtkeyword').val();
        $.ajax({
            url: '<?= base_url('Home/check_search_user'); ?>',
            type: 'POST',
            data: {
                search: search,
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
            },
            dataType: 'json',
            success: function (data) {
                if (data.status == 200) {
                    profile = data.data;
                    addMarkers(profile);
                    console.log(data.data);
                } else {
                    console.log(data.message);
                }
            }
        });
    }

</script>