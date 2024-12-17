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
            <div class="col-xl-12">
              <form action="/asset-type/create" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">

                <div class="row mb-2">
                  <label class="col-xl-2 offset-xl-2 col-form-label">ชื่อ</label>
                  <div class="col-xl-4">
                    <input type="text" class="form-control form-control-sm" name="name" required>
                    <div class="invalid-feedback">
                      กรุณากรอกข้อมูล!
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <label class="col-xl-2 offset-xl-2 col-form-label">รายการตรวจสอบ</label>
                  <div class="col-xl-6">
                    <select class="form-control form-control-sm checklist-select" name="checklist[]" multiple></select>
                  </div>
                </div>

                <div class="row justify-content-center mb-2">
                  <div class="col-xl-10">
                    <h5>ข้อมูลเพิ่มเติม</h5>
                    <div class="table-responsive">
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th width="10%">#</th>
                            <th width="20%">ชื่อ</th>
                            <th width="20%">ประเภท</th>
                            <th width="30%">ตัวเลือก</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="tr-input">
                            <td class="text-center">
                              <button type="button" class="btn btn-sm btn-success increase-btn">+</button>
                              <button type="button" class="btn btn-sm btn-danger decrease-btn">-</button>
                            </td>
                            <td>
                              <input type="text" class="form-control form-control-sm" name="item_name[]">
                            </td>
                            <td>
                              <select class="form-control form-control-sm input-type-select" name="item_type[]"></select>
                              <div class="invalid-feedback">
                                กรุณากรอกข้อมูล!
                              </div>
                            </td>
                            <td>
                              <input type="text" class="form-control form-control-sm" name="item_text[]" placeholder="ตัวอย่าง. ใช่,ไม่ใช่">
                              <div class="invalid-feedback">
                                กรุณากรอกข้อมูล!
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="row justify-content-center mb-2">
                  <div class="col-xl-3 mb-2">
                    <button type="submit" class="btn btn-sm btn-success btn-block">
                      <i class="fas fa-check pr-2"></i>ยืนยัน
                    </button>
                  </div>
                  <div class="col-xl-3 mb-2">
                    <a href="/asset-type" class="btn btn-sm btn-danger btn-block">
                      <i class="fa fa-arrow-left pr-2"></i>กลับ
                    </a>
                  </div>
                </div>

              </form>
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
<script>
  $(".decrease-btn").hide();
  $(document).on("click", ".increase-btn", function() {
    $(".input-type-select").select2("destroy");
    let row = $(".tr-input:last");
    let clone = row.clone();
    clone.find("input, select").val("");
    clone.find(".increase-btn").hide();
    clone.find(".decrease-btn").show();
    clone.find(".decrease-btn").on("click", function() {
      $(this).closest("tr").remove();
    });
    row.after(clone);
    clone.show();

    initializeSelect2($(".input-type-select"), "-- ประเภท --", "/asset-type/input-type-select");
  });

  initializeSelect2($(".input-type-select"), "-- ประเภท --", "/asset-type/input-type-select");
</script>