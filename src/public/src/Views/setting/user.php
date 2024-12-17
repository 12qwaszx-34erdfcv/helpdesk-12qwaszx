<?php
$menu = "Setting";
$page = "SettingUser";
require_once(__DIR__ . "/../layout/header.php");
?>

<main>
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header">
          <h4 class="text-center">ผู้ใช้งาน</h4>
        </div>
        <div class="card-body">

          <div class="row justify-content-end mb-2">
            <div class="col-xl-3 mb-2">
              <a href="/setting/user-export" class="btn btn-danger btn-sm btn-block">
                <i class="fas fa-download pr-2"></i>นำข้อมูลออก
              </a>
            </div>
            <div class="col-xl-3 mb-2">
              <a href="/setting/user-create" class="btn btn-primary btn-sm btn-block">
                <i class="fas fa-plus pr-2"></i>เพิ่ม
              </a>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-xl-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover user-data">
                  <thead>
                    <tr>
                      <th width="10%">สถานะ</th>
                      <th width="10%">สิทธิ์</th>
                      <th width="10%">อีเมล</th>
                      <th width="20%">ชื่อ</th>
                      <th width="20%">นามสกุล</th>
                      <th width="20%">ติดต่อ</th>
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
<script>
  filter_datatable();

  function filter_datatable(type, department, location) {
    $(".user-data").DataTable({
      serverSide: true,
      searching: true,
      scrollX: true,
      order: [],
      ajax: {
        url: "/setting/user-data",
        type: "POST",
        data: {
          type: type,
          department: department,
          location: location,
        }
      },
      columnDefs: [{
        targets: [0, 1, 2],
        className: "text-center",
      }, {
        targets: [3, 4, 5],
        className: "text-left",
      }],
      "oLanguage": {
        "sLengthMenu": "แสดง _MENU_ ลำดับ ต่อหน้า",
        "sZeroRecords": "ไม่พบข้อมูลที่ค้นหา",
        "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ ลำดับ",
        "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 ลำดับ",
        "sInfoFiltered": "",
        "sSearch": "ค้นหา :",
        "oPaginate": {
          "sFirst": "หน้าแรก",
          "sLast": "หน้าสุดท้าย",
          "sNext": "ถัดไป",
          "sPrevious": "ก่อนหน้า"
        }
      },
    });
  };
</script>