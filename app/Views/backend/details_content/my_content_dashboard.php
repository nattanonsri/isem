<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="fs-4 mb-0 text-gray-800">Dashboard</div>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row" data-aos="fade-up">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow rounded-2 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="fw-500 text-gray-600 fs-5 mb-1">
                            ทั้งหมด</div>
                        <div class="fs-4 fw-500">140</div>
                    </div>
                    <div class="col-auto">
                        <img src="<?= base_url() . LIBRARY_PATH . '/icons/user_sum.svg' ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow rounded-2 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="fw-500 text-gray-600 fs-5 mb-1">
                            ผู้ชาย</div>
                        <div class="fs-4 fw-500">120</div>
                    </div>
                    <div class="col-auto">
                        <img src="<?= base_url() . LIBRARY_PATH . '/icons/user_mr.svg' ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow rounded-2 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="fw-500 text-gray-600 fs-5 mb-1">
                            ผู้หญิง</div>
                        <div class="fs-4 fw-500">20</div>
                    </div>
                    <div class="col-auto">
                        <img src="<?= base_url() . LIBRARY_PATH . '/icons/user_mis.svg' ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" data-aos="fade-up">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow rounded-2 mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="text-primary fw-500 fs-6 m-0">จำนวนผู้เข้าใช้งาน</div>
            </div>
            <div class="card-body">
                <div class="p-2">
                    <canvas id="acquisitions"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-lg-5">
        <div class="card shadow rounded-2 mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="text-primary fw-500 fs-6 m-0">จำนวนผู้เข้าใช้งานทั้งหมด</h6>
            </div>

            <div class="card-body">
                <div class="p-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

    function generatePastDates(numOfDays) {
        let pastDateNumbers = [];
        const millisecondsPerDay = 24 * 60 * 60 * 1000;
        const currentDate = new Date();
       
        for (let i = 0; i <= numOfDays; i++) {
            const pastDate = new Date(currentDate.getTime() - i * millisecondsPerDay);
            const pastDateNumber = pastDate.getDate();
            pastDateNumbers.push(pastDateNumber);
        }
        return pastDateNumbers;
    }

    var numOfDays = 4;
    var number = generatePastDates(numOfDays);
    var datatimes = <?= json_encode($datetime) ?>;

    new Chart($('#acquisitions'), {
        type: 'bar',
        data: {
            labels: [
                'วันที่ ' + number[4],
                'วันที่ ' + number[3],
                'วันที่ ' + number[2],
                'วันที่ ' + number[1],
                'วันที่ ' + number[0],
            ],
            datasets: [{
                label: 'จำนวนผู้เข้าใช้งาน',
                data: [
                    datatimes.get_dateTime5,
                    datatimes.get_dateTime4,
                    datatimes.get_dateTime3,
                    datatimes.get_dateTime2,
                    datatimes.get_dateTime1,
                ],
                backgroundColor: '#9BD0F5',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true,
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    var data = {
        // labels: [
        //     'Red',
        //     'Blue',
        //     'Yellow'
        // ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };


    var circle = $('#myPieChart');

    new Chart(circle, {
        type: 'doughnut',
        data: {
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        }
    })
</script>