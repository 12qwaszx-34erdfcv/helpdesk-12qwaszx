<?php
$menu = "Setting";
$page = "SettingUser";
require_once(__DIR__ . "/../layout/header.php");
?>

<main>
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow-lg">
        <div class="card-header">
          <h4 class="text-center">รายละเอียด</h4>
        </div>
        <div class="card-body">
          <form action="/setting/user-create" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">อีเมล</label>
              <div class="col-xl-4">
                <input type="email" class="form-control form-control-sm" name="email" required>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">ชื่อ</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="firstname" required>
                <div class="invalid-feedback">
                  กรุณากรอกข้อมูล!
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">นามสกุล</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="lastname" required>
                <div class="invalid-feedback">
                  กรุณากรอกข้อมูล!
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">ติดต่อ</label>
              <div class="col-xl-4">
                <textarea class="form-control form-control-sm" name="contact" rows="3"></textarea>
                <div class="invalid-feedback">
                  กรุณากรอกข้อมูล!
                </div>
              </div>
            </div>

            <div class="row justify-content-center mb-2">
              <div class="col-xl-3 mb-2">
                <button type="submit" class="btn btn-sm btn-success btn-block">
                  <i class="fas fa-check pr-2"></i>ตกลง
                </button>
              </div>
              <div class="col-xl-3 mb-2">
                <a href="/setting/user" class="btn btn-sm btn-danger btn-block">
                  <i class="fa fa-arrow-left pr-2"></i>กลับ
                </a>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
require_once(__DIR__ . "/../layout/footer.php");
?>