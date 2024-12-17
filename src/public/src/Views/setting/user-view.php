<?php
$menu = "Setting";
$page = "SettingUser";
require_once(__DIR__ . "/../layout/header.php");

$param = (isset($params) ? explode("/", $params) : "");
$uuid = (isset($param[0]) ? $param[0] : "");

$row = $USER->UserView([$uuid, $uuid]);
?>

<main>
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow-lg">
        <div class="card-header">
          <h4 class="text-center">รายละเอียด</h4>
        </div>
        <div class="card-body">
          <form action="/setting/user-update" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
            <div class="row mb-2" style="display: none;">
              <label class="col-xl-2 offset-xl-2 col-form-label">UserID</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="id" value="<?php echo $row['id'] ?>" readonly>
              </div>
            </div>
            <div class="row mb-2" style="display: none;">
              <label class="col-xl-2 offset-xl-2 col-form-label">UUID</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="uuid" value="<?php echo $row['uuid'] ?>" readonly>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">อีเมล</label>
              <div class="col-xl-4">
                <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $row['email'] ?>">
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">ชื่อ</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="firstname" value="<?php echo $row['firstname'] ?>" required>
                <div class="invalid-feedback">
                  กรุณากรอกข้อมูล!
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">นามสกุล</label>
              <div class="col-xl-4">
                <input type="text" class="form-control form-control-sm" name="lastname" value="<?php echo $row['lastname'] ?>" required>
                <div class="invalid-feedback">
                  กรุณากรอกข้อมูล!
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">ติดต่อ</label>
              <div class="col-xl-4">
                <textarea class="form-control form-control-sm" name="contact" rows="3"><?php echo $row['contact'] ?></textarea>
                <div class="invalid-feedback">
                  กรุณากรอกข้อมูล!
                </div>
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">สิทธิ์</label>
              <div class="col-xl-8">
                <div class="row pb-2">
                  <div class="col-xl-3">
                    <label class="form-check-label px-3">
                      <input class="form-check-input" type="radio" name="level" value="1" <?php echo (intval($row['level']) === 1 ? "checked" : "") ?> required>
                      <span class="text-info">ผู้ใช้งาน</span>
                    </label>
                  </div>
                  <div class="col-xl-3">
                    <label class="form-check-label px-3">
                      <input class="form-check-input" type="radio" name="level" value="9" <?php echo (intval($row['level']) === 9 ? "checked" : "") ?> required>
                      <span class="text-primary">ผู้ดูแลระบบ</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-2 offset-xl-2 col-form-label">สถานะ</label>
              <div class="col-xl-8">
                <div class="row pb-2">
                  <div class="col-xl-3">
                    <label class="form-check-label px-3">
                      <input class="form-check-input" type="radio" name="status" value="1" <?php echo (intval($row['status']) === 1 ? "checked" : "") ?> required>
                      <span class="text-success">ใช้งาน</span>
                    </label>
                  </div>
                  <div class="col-xl-3">
                    <label class="form-check-label px-3">
                      <input class="form-check-input" type="radio" name="status" value="2" <?php echo (intval($row['status']) === 2 ? "checked" : "") ?> required>
                      <span class="text-danger">ระงับการใช้งาน</span>
                    </label>
                  </div>
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