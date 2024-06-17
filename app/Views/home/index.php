<style>
    #map {
        width: 100%;
        height: 100vh;

    }
    .slider{

    }
</style>


<div id="map"></div>
<div id="controls"></div>


<script>
    const profileData = <?php echo $profile_json; ?>;
    const jsArray = JSON.parse(JSON.stringify(profileData));

    // สร้างแผนที่ที่กำหนดตำแหน่งเริ่มต้น
    var map = L.map('map').setView([13.7563, 100.5018], 10); // Bangkok, Thailand

    // เพิ่ม tile layer ให้แผนที่
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // ตำแหน่ง marker ที่ได้จาก jsArray
    const markerPositions = jsArray.map(item => item.coordinates);
    // console.log(markerPositions);

    // รูปภาพสำหรับ marker ทั้ง 10
    // var markerImages = [
    // 'path/to/image1.jpg',
    // 'path/to/image2.jpg',
    // 'path/to/image3.jpg',
    // 'path/to/image4.jpg',
    // 'path/to/image5.jpg',
    // 'path/to/image6.jpg',
    // 'path/to/image7.jpg',
    // 'path/to/image8.jpg',
    // 'path/to/image9.jpg',
    // 'path/to/image10.jpg'
    // ];

    // สีสำหรับ marker ทั้ง 10
    var markerColors = [
        'red',
        'blue',
        'green',
        'orange',
        'purple',
        'yellow',
        'cyan',
        'magenta',
        'lime',
        'pink'
    ];

    // สร้าง marker และเก็บไว้ใน array
    var markers = [];

    var controls = document.getElementById('controls');
    for (var i = 0; i < jsArray.length; i++) {
        (function (index) {
            var item = jsArray[index];

            // ตรวจสอบว่าค่าพิกัดไม่เป็น null หรือ undefined
            if (!item.coordinates || item.coordinates.length !== 2) {
                console.error(`Invalid coordinates for item at index ${index}`);
                return; // ข้ามมาร์กเกอร์นี้ถ้าข้อมูลไม่ถูกต้อง
            }

            // สร้าง icon สำหรับ marker ที่มีสีไม่ซ้ำกัน
            var blueIcon = new L.Icon({
                iconUrl: '<?= base_url('assets/icons/marker-icon-blue.png'); ?>',
                shadowUrl: '<?= base_url('assets/icons/marker-shadow.png'); ?>',
                iconSize: [25,41],
                iconAnchor: [12,41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]

            })

            var marker = L.marker(item.coordinates, { icon: blueIcon }).bindPopup(`
                        <img src="${item.file_image}" alt="Image for Marker ${index + 1}" style="width:100%;height:auto;">            
                        <p style="font-size: 14pt">${item.fname} ${item.lname} <br/>
                        - ${item.disease} <br/>
                        - ${item.succor} <br/>
                        - ${item.relative}
                        <p>Marker at ${item.coordinates}</p>
                        
                    `);
            markers.push(marker);
            marker.addTo(map);

            // สร้างปุ่มสวิตช์สำหรับ marker แต่ละตัว
            var switchContainer = document.createElement('div');
            switchContainer.innerHTML = `
                        <label class="switch">
                            <input type="checkbox" id="toggleMarker${item.disease}" checked>
                            <span class="slider"></span>
                        </label>
                        <label for="toggleMarker${item.disease}">Marker ${item.disease}</label>
                    `;
            controls.appendChild(switchContainer);

            // เพิ่ม event listener ให้ปุ่มสวิตช์
            document.getElementById(`toggleMarker${item.disease}`).addEventListener('change', function () {
                if (this.checked) {
                    map.addLayer(marker);
                } else {
                    map.removeLayer(marker);
                }
            });

        })(i);
    }
</script>