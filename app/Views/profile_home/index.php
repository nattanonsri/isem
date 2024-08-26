<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<script src="<?= base_url() ?>assets/bootstrap5/js/bootstrap.bundle.min.js"></script>

<div class="container">

  <nav class="navbar navbar-expand-lg navbar-light bg-white mt-3 mb-4 border-bottom">
    <a href="<?= base_url('/profile') ?>"
      class="d-flex align-items-center text-dark">
      <img class="img-logo" src="<?= base_url(LIBRARY_PATH . '/icons/icon_isem.png') ?>" width="50">
    </a>

    <ul class="navbar-nav ms-auto d-none d-sm-block">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="me-2 d-lg-inline text-gray-600 small"><?= $admin_user['fullname'] ?></span>
          <i class="fa-solid fa-chevron-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="<?= base_url() . 'profile/profile_details/' . USER_UUID ?>">
              <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
              <?= lang('profile.profile') ?>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item" href="<?= base_url('logout') ?>">
              <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
              <?= lang('profile.logout') ?>
            </a>
          </li>
        </ul>
      </li>
    </ul>

    
<ul>
  <li></li>
</ul>


    
  </nav>

  <div class="row mt-3">
    <div class="col-md-4 ms-sm-auto">
      <form id="frm-search">
        <div class="input-group shadow">
          <input type="text" name="txtkeyword" id="txtkeyword" class="form-control bg-light border-0 small "
            placeholder="ค้นหา..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" onclick="searchButton();">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-12 d-flex justify-content-between">
      <h4><?= lang('profile.elderly-information') ?></h4>
      <a class="btn btn-primary" href="<?= base_url('profile/load_add_user') ?>"><?= lang('profile.add-profile') ?></a>
    </div>
  </div>
  <div class="row mb-3" id="card_getdatail"></div>

  <script>

    $(document).ready(function () {
      searchButton();
    });

    $('#logoutBtnWeb').on('click', function (event) {
      event.preventDefault();

      $.ajax({
        url: '<?= base_url('logout'); ?>',
        type: 'GET',
        success: function (resources) {

          Swal.fire({
            icon: 'success',
            title: "<?= lang('profile.logout-success') ?>",
            showConfirmButton: true,
          }).then(function () {
            window.location.href = "<?= base_url('login'); ?>"
          });
        },
        error: function (xhr, status, error) {
          Swal.fire({
            icon: 'error',
            title: "<?= lang('profile.error') ?>",
            text: error
          });
        }
      });
    });

    function deleteBtn(uuid) {

      Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: "คุณไม่สามารถย้อนกลับได้หลังจากลบข้อมูล!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ลบข้อมูล!',
        cancelButtonText: 'ยกเลิก'
      }).then(function (result) {
        if (result.isConfirmed) {
          $.ajax({
            url: '<?= base_url('profile/delete_form_user/') ?>' + uuid,
            type: 'DELETE',
            success: function (data) {
              var data = JSON.parse(data);
              if (data.status === 200) {
                Swal.fire({
                  icon: 'success',
                  title: data.message,
                  text: '',
                  showConfirmButton: true,
                }).then(function () {
                  location.reload();
                });
              } else {
                Swal.fire({
                  icon: 'warning',
                  title: data.message,
                  text: '',
                });
              }
            },
          });
        }
      });
    };

    function searchButton() {
      let search = $('#txtkeyword').val();
      $.ajax({
        url: '<?= base_url('profile/user_search') ?>',
        type: 'POST',
        data: {
          search: search,
          '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
        },
        dataType: 'html',
        success: function (result) {
          $('#card_getdatail').html(result);
        }
      });
    } 
  </script>
  <?= $this->endSection() ?>