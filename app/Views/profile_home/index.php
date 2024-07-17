<div class="container">
  <div class="row d-flex flex-wrap align-items-center pt-2 py-2 mb-4 text-center border-bottom ">
    <div class="col-md-5 col-6 text-start"">
        <a href=" <?= base_url('/profile') ?>"
      class="d-flex align-items-center mb-md-0 me-md-auto text-dark text-decoration-none">
      <img class="img-logo" src="<?= base_url('/assets/icons/icon_isem.png') ?>" width="50">
      </a>
    </div>
    <div class="col-md-7 col-6 d-flex align-self-center justify-content-end">
      <button class="btn btn-outline-secondary" id="logoutBtnWeb">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
          <path fill="currentColor"
            d="M6 2h9a2 2 0 0 1 2 2v1a1 1 0 0 1-2 0V4H6v16h9v-1a1 1 0 0 1 2 0v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2" />
          <path fill="currentColor"
            d="M16.795 16.295c.39.39 1.02.39 1.41 0l3.588-3.588a1 1 0 0 0 0-1.414l-3.588-3.588a.999.999 0 0 0-1.411 1.411L18.67 11H10a1 1 0 0 0 0 2h8.67l-1.876 1.884a.999.999 0 0 0 .001 1.411" />
        </svg>
        <?= lang('profile.logout') ?>
      </button>
    </div>
  </div>

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

      console.log(search);

      $.ajax({
        url: '<?= base_url('profile/user_search') ?>',
        type: 'POST',
        data: {
          search: search,
          '<?= csrf_token() ?>': '<?= csrf_hash() ?>',
        },
        success: function (result) {
          $('#card_getdatail').html(result);
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error: " + status + " " + error);
        }
      });
    } 
  </script>