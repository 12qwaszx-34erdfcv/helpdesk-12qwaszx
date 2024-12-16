<?php
$menu = "Setting";
$page = "SettingSystem";
require_once(__DIR__ . "/../layout/header.php");
?>

<main>
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header">
          <h4 class="text-center">ตั้งค่าระบบ</h4>
        </div>
        <div class="card-body">
          <form action="/setting/system-update" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">ชื่อระบบ</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $system['name'] ?>">
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">อีเมล</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="email" value="<?php echo $system['email'] ?>" required>
                <div class="invalid-feedback">
                  กรุณากรอกข้อมูล!
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">ชื่ออีเมล</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="email_name" value="<?php echo $system['email_name'] ?>" required>
                <div class="invalid-feedback">
                  กรุณากรอกข้อมูล!
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">รหัสผ่าน (อีเมล)</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="email_password" value="<?php echo $system['email_password'] ?>" required>
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