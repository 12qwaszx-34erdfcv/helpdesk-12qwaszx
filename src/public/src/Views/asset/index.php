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
          <h4 class="text-center">ข้อมูลทรัพย์สิน</h4>
        </div>
        <div class="card-body">

          <div class="row mb-2">
            <div class="col mb-2">
              <div class="card h-100 bg-primary text-white shadow card-summary" id="1">
                <div class="card-body">
                  <h3 class="text-right"><?php echo (isset($card['total_asset']) ? $card['total_asset'] : 0) ?></h3>
                  <h5 class="text-right">ทรัพย์สินทั้งหมด</h5>
                </div>
              </div>
            </div>
            <div class="col mb-2">
              <div class="card h-100 bg-success text-white shadow card-summary" id="2">
                <div class="card-body">
                  <h3 class="text-right"><?php echo (isset($card['total_type']) ? $card['total_type'] : 0) ?></h3>
                  <h5 class="text-right">ประเภท</h5>
                </div>
              </div>
            </div>
            <div class="col mb-2">
              <div class="card h-100 bg-warning text-white shadow card-summary" id="3">
                <div class="card-body">
                  <h3 class="text-right"><?php echo (isset($card['total_department']) ? $card['total_department'] : 0) ?></h3>
                  <h5 class="text-right">แผนก/ฝ่าย</h5>
                </div>
              </div>
            </div>
            <div class="col mb-2">
              <div class="card h-100 bg-danger text-white shadow card-summary" id="4">
                <div class="card-body">
                  <h3 class="text-right"><?php echo (isset($card['total_location']) ? $card['total_location'] : 0) ?></h3>
                  <h5 class="text-right">สถานที่</h5>
                </div>
              </div>
            </div>
          </div>

          <div class="row justify-content-end mb-2">
            <div class="col-xl-3 mb-2">
              <a href="/asset-type" class="btn btn-sm btn-info btn-block">
                <i class="fa fa-file-lines pr-2"></i>ประเภท
              </a>
            </div>
            <div class="col-xl-3 mb-2">
              <a href="/asset-department" class="btn btn-sm btn-info btn-block">
                <i class="fa fa-file-lines pr-2"></i>แผนก/ฝ่าย
              </a>
            </div>
            <div class="col-xl-3 mb-2">
              <a href="/asset-location" class="btn btn-sm btn-info btn-block">
                <i class="fa fa-file-lines pr-2"></i>สถานที่
              </a>
            </div>
            <div class="col-xl-3 mb-2">
              <a href="/asset-brand" class="btn btn-sm btn-info btn-block">
                <i class="fa fa-file-lines pr-2"></i>ยี่ห้อ
              </a>
            </div>
            <div class="col-xl-3 mb-2">
              <a href="/asset-checklist" class="btn btn-sm btn-info btn-block">
                <i class="fa fa-file-lines pr-2"></i>รายการตรวจสอบ
              </a>
            </div>
          </div>

          <div class="row justify-content-end mb-2">
            <div class="col-xl-3 mb-2">
              <a href="javascript:void(0)" class="btn btn-sm btn-success btn-block asset-export">
                <i class="fa fa-download pr-2"></i>นำข้อมูลออก
              </a>
            </div>
            <div class="col-xl-6"></div>
            <div class="col-xl-3 mb-2">
              <a href="/asset/create" class="btn btn-sm btn-primary btn-block">
                <i class="fa fa-plus pr-2"></i>เพิ่ม
              </a>
            </div>
          </div>

          <div class="row justify-content-end mb-2">
            <div class="col-xl-3 mb-2">
              <select class="form-control form-control-sm type-select"></select>
            </div>
            <div class="col-xl-3 mb-2">
              <select class="form-control form-control-sm department-select"></select>
            </div>
            <div class="col-xl-3 mb-2">
              <select class="form-control form-control-sm location-select"></select>
            </div>
            <div class="col-xl-3 mb-2">
              <select class="form-control form-control-sm brand-select"></select>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-xl-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover data">
                  <thead>
                    <tr>
                      <th width="10%">#</th>
                      <th width="20%">ชื่อ</th>
                      <th width="10%">เลขที่ทรัพย์สิน</th>
                      <th width="10%">รหัสอุปกรณ์</th>
                      <th width="10%">ประเภท</th>
                      <th width="10%">ฝ่าย/แผนก</th>
                      <th width="10%">สถานที่</th>
                    </tr>
                  </thead>
                </table>
              </div>
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