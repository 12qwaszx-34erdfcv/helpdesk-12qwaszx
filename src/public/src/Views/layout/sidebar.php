<?php
$UserMenu = (isset($menu) && ($menu === "User") ? "show" : "");
$UserView = (isset($page) && ($page === "UserView") ? 'class="active"' : "");

$ServiceMenu = (isset($menu) && ($menu === "Service") ? "show" : "");

$SettingMenu = (isset($menu) && ($menu === "Setting") ? "show" : "");
$SettingSystem = (isset($page) && ($page === "SettingSystem") ? 'class="active"' : "");
$SettingService = (isset($page) && ($page === "SettingService") ? 'class="active"' : "");
$SettingUser = (isset($page) && ($page === "SettingUser") ? 'class="active"' : "");
$SettingAuthorize = (isset($page) && ($page === "SettingAuthorize") ? 'class="active"' : "");
?>
<nav id="sidebar">
  <ul class="list-unstyled">
    <li>
      <a href="/home">หน้าหลัก</a>
    </li>
    <li>
      <a href="#dashboard-menu" data-toggle="collapse" class="dropdown-toggle">รายงาน</a>
      <ul class="collapse list-unstyled" id="dashboard-menu">
        <?php
        foreach ($services as $key => $service) :
          $user_authorize_check = (isset($user_authorize[$key]) ? intval($user_authorize[$key]) : "");
          if ($user_authorize_check === 1) :
        ?>
            <li>
              <a href="/<?php echo "{$service['link']}-report" ?>">
                <i class="fa fa-chart-line pr-2"></i>
                <?php echo $service['name'] ?>
              </a>
            </li>
        <?php
          endif;
        endforeach;
        ?>
      </ul>
    </li>
    <li>
      <a href="#user-menu" data-toggle="collapse" class="dropdown-toggle">ข้อมูลส่วนตัว</a>
      <ul class="collapse list-unstyled <?php echo $UserMenu ?>" id="user-menu">
        <li <?php echo $UserView ?>>
          <a href="/user/view">
            <i class="fa fa-address-book pr-2"></i>
            รายละเอียด
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#service-menu" data-toggle="collapse" class="dropdown-toggle">
        บริการ
      </a>
      <ul class="collapse list-unstyled <?php echo $ServiceMenu ?>" id="service-menu">
        <?php
        foreach ($services as $key => $service) :
          $user_authorize_check = (isset($user_authorize[$key]) ? intval($user_authorize[$key]) : "");
          if ($user_authorize_check === 1) :
        ?>
            <li <?php echo (isset($page) && ($page === "Service" . ucfirst($service['link'])) ? 'class="active"' : "") ?>>
              <a href="/<?php echo $service['link'] ?>">
                <i class="fa fa-bars pr-2"></i>
                <?php echo $service['name'] ?>
                <span class="badge badge-danger ml-2"></span>
              </a>
            </li>
        <?php
          endif;
        endforeach;
        ?>
      </ul>
    </li>

    <?php if (intval($user['level']) === 9) : ?>
      <li>
        <a href="#setting-menu" data-toggle="collapse" class="dropdown-toggle">ระบบ</a>
        <ul class="collapse list-unstyled <?php echo $SettingMenu ?>" id="setting-menu">
          <li <?php echo $SettingSystem ?>>
            <a href="/setting/system">
              <i class="fa fa-gear pr-2"></i>
              ตั้งค่าระบบ
            </a>
          </li>
          <li <?php echo $SettingService ?>>
            <a href="/setting/service">
              <i class="fa fa-gear pr-2"></i>
              เมนูบริการ
            </a>
          </li>
          <li <?php echo $SettingUser ?>>
            <a href="/setting/user">
              <i class="fa fa-gear pr-2"></i>
              ผู้ใช้งาน
            </a>
          </li>
          <li <?php echo $SettingAuthorize ?>>
            <a href="/setting/authorize">
              <i class="fa fa-gear pr-2"></i>
              จัดการสิทธิ์
            </a>
          </li>
        </ul>
      </li>
    <?php endif; ?>
  </ul>
</nav>