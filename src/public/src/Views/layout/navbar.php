<nav class="navbar navbar-expand-xl sticky-top shadow-lg w-100">
  <div class="container-fluid">

    <a class="navbar-brand d-none d-xl-block" id="sidebarCollapse" href="javascript:void(0)">
      <i class="fa fa-bars pr-2"></i>
      <span class="font-weight-bold"><?php echo (!empty($system['name']) ? $system['name'] : "SystemName") ?></span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
      <i class="fas fa-bars pr-2"></i>
      <span class="font-weight-bold"><?php echo (!empty($system['name']) ? $system['name'] : "SystemName") ?></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-menu">

      <ul class="navbar-nav ml-3 d-xl-none">
        <li class=" nav-item">
          <a class="nav-link" href="/home">
            <i class="fa fa-home pr-2"></i>
            <span class="font-weight-bold">หน้าหลัก</span>
          </a>
        </li>
        <li class=" nav-item dropdown">
          <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
            <i class="fa fa-list pr-2"></i>
            <span class="font-weight-bold">ข้อมูลส่วนตัว</span>
            <i class="fas fa-caret-down pl-2"></i>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/user/profile">
              <i class="fa fa-address-book pr-2"></i>
              <span class="font-weight-bold">รายละเอียด</span>
            </a>
          </div>
        </li>
        <li class=" nav-item dropdown">
          <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
            <i class="fa fa-list pr-2"></i>
            <span class="font-weight-bold">บริการ</span>
            <i class="fas fa-caret-down pl-2"></i>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/">
              <i class="fa fa-bars pr-2"></i>
              แจ้งปัญหาการใช้งาน
              <span class="font-weight-bold"></span>
            </a>
            <a class="dropdown-item" href="/">
              <i class="fa fa-bars pr-2"></i>
              ข้อมูลทรัพย์สิน
              <span class="font-weight-bold"></span>
            </a>
          </div>
        </li>
        <li class=" nav-item dropdown">
          <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
            <i class="fa fa-list pr-2"></i>
            <span class="font-weight-bold">ตั้งค่าระบบ</span>
            <i class="fas fa-caret-down pl-2"></i>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="/system">
              <i class="fa fa-gear pr-2"></i>
              <span class="font-weight-bold">ระบบ</span>
            </a>
            <a class="dropdown-item" href="/auth">
              <i class="fa fa-gear pr-2"></i>
              <span class="font-weight-bold">จัดการสิทธิ์</span>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <button class="nav-link btn-logout">
            <i class="fa fa-sign-out pr-2"></i>
            <span class="font-weight-bold">ออกจากระบบ</span>
          </button>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto d-none d-xl-block">
        <li class="nav-item dropdown">
          <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
            <span class="font-weight-bold"><?php echo $user['fullname'] ?></span>
            <i class="fas fa-caret-down pl-3"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="/user/view">
              <i class="fa fa-address-book pr-2"></i>
              <span class="font-weight-bold">รายละเอียด</span>
            </a>
            <button class="dropdown-item btn-logout">
              <i class="fa fa-sign-out pr-2"></i>
              <span class="font-weight-bold">ออกจากระบบ</span>
            </button>
          </div>
        </li>
      </ul>

    </div>
  </div>
</nav>