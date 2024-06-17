<!-- pc -->
<div class="d-none d-sm-block">
  <div class="container">
    <div class="row d-flex flex-wrap align-items-center pt-2 py-2 mb-4 text-center border-bottom">
      <div class="col-md-5 text-start"">
        <a href=" <?= base_url('/profile') ?>"
        class="d-flex align-items-center mb-md-0 me-md-auto text-dark text-decoration-none">
        <img class="img-logo" src="<?= base_url('/assets/icons/icon_isem.png') ?>" width="50">
        </a>
      </div>
      <div class="col-md-7 d-flex align-self-center justify-content-end">
        <button class="btn btn-outline-secondary" id="logoutBtnWeb">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
            <path fill="currentColor"
              d="M6 2h9a2 2 0 0 1 2 2v1a1 1 0 0 1-2 0V4H6v16h9v-1a1 1 0 0 1 2 0v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2" />
            <path fill="currentColor"
              d="M16.795 16.295c.39.39 1.02.39 1.41 0l3.588-3.588a1 1 0 0 0 0-1.414l-3.588-3.588a.999.999 0 0 0-1.411 1.411L18.67 11H10a1 1 0 0 0 0 2h8.67l-1.876 1.884a.999.999 0 0 0 .001 1.411" />
          </svg>
          Logout
        </button>
      </div>
    </div>
  </div>
</div>

<div class="container d-none d-sm-block mt-3">
  <div class="row">
    <div class="col-12 d-flex justify-content-between">
      <h4>ข้อมูลผู้สูงอายุ</h4>
      <a class="btn btn-primary" href="<?= base_url('profile/create') ?>">เพิ่มข้อมูล</a>
    </div>
  </div>

  <div class="row ">
    <?php foreach ($profile as $row): ?>
      <div class="col-4 mt-3">
        <div class="card">
          <img src="<?= base_url(esc($row['file_image'])); ?>" class="card-img-top" width="150" height="200">
          <div class="card-body">
            <h5 class="card-title">
              <?= esc($row['prefix'] . $row['fname']); ?>&nbsp;<?= esc($row['lname']); ?>
            </h5>
            <p class="card-text">โรคประจำตัว : <?= esc($row['disease_details'] ?? 'ไม่มี'); ?><br>
              ผู้ดูแล : <?= esc($row['caretaker'] ?? 'ไม่มี'); ?><br>
              ยาที่ใช้ : <?= esc($row['medicines'] ?? 'ไม่มี'); ?></p>
            <div class="text-end">
              <div class="btn-group " role="group" aria-label="Basic mixed styles example">
                <a href="<?= base_url('/profile/delete/' . esc($row['id'])) ?>" class="btn btn-danger deleteBtnMobile">ลบข้อมูล</a>
                <a href="<?= base_url('/profile/edit/' . esc($row['id'])) ?>" class="btn btn-warning">แก้ไข</a>
                <a href="#" class="btn btn-primary">ดูเพิ่มเติม</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- end pc -->

<!-- mobile -->

<div class="d-block d-sm-none d-md-none d-lg-none">
  <div class="container">
    <div class="row d-flex flex-wrap align-items-center pt-2 py-2 mb-4 text-center border-bottom">
      <div class="col-5 text-start"">
        <a href=" <?= base_url('/profile') ?>"
        class="d-flex align-items-center mb-md-0 me-md-auto text-dark text-decoration-none">
        <img class="img-logo" src="<?= base_url('/assets/icons/icon_isem.png'); ?>" width="50">
        </a>
      </div>
      <div class="col-7 d-flex align-self-center justify-content-end">
        <button class="btn btn-outline-secondary" id="logoutBtnMobile">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
            <path fill="currentColor"
              d="M6 2h9a2 2 0 0 1 2 2v1a1 1 0 0 1-2 0V4H6v16h9v-1a1 1 0 0 1 2 0v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2" />
            <path fill="currentColor"
              d="M16.795 16.295c.39.39 1.02.39 1.41 0l3.588-3.588a1 1 0 0 0 0-1.414l-3.588-3.588a.999.999 0 0 0-1.411 1.411L18.67 11H10a1 1 0 0 0 0 2h8.67l-1.876 1.884a.999.999 0 0 0 .001 1.411" />
          </svg>
          Logout
        </button>
      </div>
    </div>
  </div>
</div>


<div class="container d-block d-sm-none d-md-none d-lg-none mt-3">
  <div class="row">
    <div class="col-12 d-flex justify-content-between">
      <h4>ข้อมูลผู้สูงอายุ</h4>
      <a class="btn btn-primary" href="<?= base_url('profile/create') ?>">เพิ่มข้อมูล</a>
    </div>
  </div>

  <div class="row mt-3">
    <?php foreach ($profile as $row): ?>
      <div class="col-12 mt-3">
        <div class="card">
          <img src="<?= base_url(esc($row['file_image'])); ?>" class="card-img-top" width="150" height="200">
          <div class="card-body">
            <h5 class="card-title">
              <?= esc($row['prefix'] . $row['fname']); ?>&nbsp;<?= esc($row['lname']); ?>
            </h5>
            <p class="card-text">โรคประจำตัว : <?= esc($row['disease_details'] ?? 'ไม่มี') ?><br>
              ผู้ดูแล : <?= esc($row['caretaker'] ?? 'ไม่มี'); ?><br>
              ยาที่ใช้ : <?= esc($row['medicines'] ?? 'ไม่มี'); ?></p>
            <div class="text-end">

              <div class="btn-group " role="group" aria-label="Basic mixed styles example">
                <a href="<?= base_url('/profile/delete/' . esc($row['id'])) ?>"
                  class="btn btn-danger deleteBtnMobile">ลบข้อมูล</a>
                <a href="<?= base_url('/profile/edit/' . esc($row['id'])) ?>" class="btn btn-warning">แก้ไข</a>
                <a href="#" class="btn btn-primary">ดูเพิ่มเติม</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<!-- end mobile -->


<script>
  $(document).ready(function () {

    $('#logoutBtnWeb').on('click', function (event) {
      event.preventDefault();

      $.ajax({
        url: '<?= base_url('logout'); ?>',
        type: 'GET',
        success: function (resources) {

          Swal.fire({
            icon: 'success',
            title: 'ล็อกเอ้าสำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then(function () {
            window.location.href = '<?= base_url('login'); ?>'
          });
        },
        error: function (xhr, status, error) {
          Swal.fire({
            icon: 'error',
            title: 'เกิดข้อผิดพลาด',
            text: error
          });
        }
      });
    });

    $('#logoutBtnMobile').on('click', function (event) {
      event.preventDefault();

      $.ajax({
        url: '<?= base_url('logout'); ?>',
        type: 'GET',
        success: function (resources) {

          Swal.fire({
            icon: 'success',
            title: 'ล็อกเอ้าสำเร็จ',
            showConfirmButton: false,
            timer: 1500
          }).then(function () {
            window.location.href = '<?= base_url('login'); ?>'
          });
        },
        error: function (xhr, status, error) {
          Swal.fire({
            icon: 'error',
            title: 'เกิดข้อผิดพลาด',
            text: error
          });
        }
      });
    });

    $(document).on('click', '.deleteBtnMobile', function (e) {
      e.preventDefault();

      var url = $(this).attr('href');

      Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: "คุณไม่สามารถย้อนกลับได้หลังจากลบข้อมูล!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ลบข้อมูล!',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: url,
            type: 'DELETE',
            success: function (response) {
              if (response.success) {
                Swal.fire({
                  icon: 'success',
                  title: 'ลบข้อมูลสำเร็จ',
                  showConfirmButton: false,
                  timer: 1500
                }).then(function () {
                  // Reload the page or redirect
                  location.reload();
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'เกิดข้อผิดพลาด',
                  text: 'ไม่สามารถลบข้อมูลได้: ' + response.message
                });
              }
            },
            error: function (xhr, status, error) {
              Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'ไม่สามารถลบข้อมูลได้: ' + xhr.responseText
              });
            }
          });

        }
      });
    });


  });


</script>