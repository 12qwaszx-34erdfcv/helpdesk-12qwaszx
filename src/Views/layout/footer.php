<?php if (!empty($_SESSION['alert']) && !empty($_SESSION['text'])) : ?>
  <div style="position: absolute; top: 120px; right: 0; width: 30rem;">
    <div class="toast hide" data-delay="5000">
      <div class="toast-header bg-<?php echo $_SESSION['alert'] ?>">
        <strong class="mr-auto text-white">แจ้งเตือน</strong>
        <button type="button" class="ml-5 close" data-dismiss="toast">
          <i class="fa fa-times text-white"></i>
        </button>
      </div>
      <div class="toast-body">
        <h5 class="text-<?php echo $_SESSION['alert'] ?>"><?php echo $_SESSION['text'] ?></h5>
      </div>
    </div>
  </div>
<?php
endif;
unset($_SESSION['alert'], $_SESSION['text']);
?>

<script src="/vendor/components/jquery/jquery.min.js"></script>
<script src="/vendor/twitter/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="/vendor/select2/select2/dist/js/select2.min.js"></script>
<script src="/vendor/moment/moment/min/moment.min.js"></script>
<script src="/vendor/pnikolov/bootstrap-daterangepicker/js/daterangepicker.min.js"></script>
<script src="/styles/javascript/sweetalert2.all.min.js"></script>
<script src="/styles/javascript/axios.min.js"></script>
<script src="/styles/javascript/main.js"></script>
<script>
  $(document).on("click", ".btn-logout", function() {
    Swal.fire({
      title: 'คุณต้องการ\nออกจากระบบใช่ไหม?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ปิด",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "/logout";
      } else {
        return false;
      }
    });
  });
</script>
</body>

</html>