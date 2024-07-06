
   <script>
    if (typeof map !== 'undefined') {
        map.remove();
    }

    var map = L.map('map').setView([13.7563, 100.5018], 10); // Bangkok, Thailand

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
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
                    <p style="font-size: 14pt">${item.fname} ${item.lname} <br/>
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
</script>
