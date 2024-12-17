<?php
$menu = "Service";
$page = "ServiceAsset";
require_once(__DIR__ . "/../layout/header.php");
?>

<main>
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow-lg">
        <div class="card-header">
          <h4 class="text-center">ประเภท</h4>
        </div>
        <div class="card-body">

          <div class="row justify-content-end mb-2">
            <div class="col-xl-3 mb-2">
              <a href="/asset-type/export" class="btn btn-sm btn-success btn-block">
                <i class="fa fa-download pr-2"></i>นำข้อมูลออก
              </a>
            </div>
            <div class="col-xl-3 mb-2">
              <a href="/asset-type/create" class="btn btn-sm btn-primary btn-block">
                <i class="fa fa-plus pr-2"></i>เพิ่ม
              </a>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-xl-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover data">
                  <thead>
                    <tr>
                      <th width="10%">#</th>
                      <th width="30%">ประเภท</th>
                      <th width="30%">รายการตรวจสอบ</th>
                      <th width="30%">ผู้รับผิดชอบ</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

          <div class="row justify-content-center mb-2">
            <div class="col-xl-3">
              <a href="/asset" class="btn btn-sm btn-danger btn-block">
                <i class="fa fa-arrow-left pr-2"></i>กลับ
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

<?php
require_once(__DIR__ . "/../layout/footer.php");
?>