<?php
require_once(__DIR__ . "/vendor/autoload.php");

$ROUTER = new AltoRouter();

##################### PREVENTIVE #####################
$ROUTER->map("GET", "/preventive", function () {
  require(__DIR__ . "/src/Views/preventive/index.php");
});

##################### HELPDESK #####################
$ROUTER->map("GET", "/helpdesk", function () {
  require(__DIR__ . "/src/Views/helpdesk/index.php");
});

##################### ASSET CHECKLIST #####################
$ROUTER->map("GET", "/asset-checklist", function () {
  require(__DIR__ . "/src/Views/asset-checklist/index.php");
});

##################### ASSET BRAND #####################
$ROUTER->map("GET", "/asset-brand", function () {
  require(__DIR__ . "/src/Views/asset-brand/index.php");
});

##################### ASSET LOCATION #####################
$ROUTER->map("GET", "/asset-location", function () {
  require(__DIR__ . "/src/Views/asset-location/index.php");
});

##################### ASSET DEPARTMENT #####################
$ROUTER->map("GET", "/asset-department", function () {
  require(__DIR__ . "/src/Views/asset-department/index.php");
});

##################### ASSET TYPE #####################
$ROUTER->map("GET", "/asset-type", function () {
  require(__DIR__ . "/src/Views/asset-type/index.php");
});
$ROUTER->map("GET", "/asset-type/create", function () {
  require(__DIR__ . "/src/Views/asset-type/create.php");
});
$ROUTER->map("POST", "/asset-type/[**:params]", function ($params) {
  require(__DIR__ . "/src/Views/asset-type/action.php");
});

##################### ASSET #####################
$ROUTER->map("GET", "/asset", function () {
  require(__DIR__ . "/src/Views/asset/index.php");
});

##################### SETTING #####################
$ROUTER->map("GET", "/setting/system", function () {
  require(__DIR__ . "/src/Views/setting/system.php");
});
$ROUTER->map("GET", "/setting/service", function () {
  require(__DIR__ . "/src/Views/setting/service.php");
});
$ROUTER->map("GET", "/setting/user", function () {
  require(__DIR__ . "/src/Views/setting/user.php");
});
$ROUTER->map("GET", "/setting/user-create", function () {
  require(__DIR__ . "/src/Views/setting/user-create.php");
});
$ROUTER->map("GET", "/setting/user-view/[**:params]", function ($params) {
  require(__DIR__ . "/src/Views/setting/user-view.php");
});
$ROUTER->map("GET", "/setting/user-export", function () {
  require(__DIR__ . "/src/Views/setting/user-export.php");
});
$ROUTER->map("GET", "/setting/authorize", function () {
  require(__DIR__ . "/src/Views/setting/authorize.php");
});
$ROUTER->map("POST", "/setting/[**:params]", function ($params) {
  require(__DIR__ . "/src/Views/setting/action.php");
});

##################### USER #####################
$ROUTER->map("GET", "/user/view", function () {
  require(__DIR__ . "/src/Views/user/view.php");
});
$ROUTER->map("POST", "/user/[**:params]", function ($params) {
  require(__DIR__ . "/src/Views/user/action.php");
});

##################### HOME #####################
$ROUTER->map("GET", "/", function () {
  require(__DIR__ . "/src/Views/home/index.php");
});
$ROUTER->map("GET", "/info", function () {
  require(__DIR__ . "/src/Views/home/info.php");
});
$ROUTER->map("GET", "/check", function () {
  require(__DIR__ . "/src/Views/home/check.php");
});
$ROUTER->map("GET", "/home", function () {
  require(__DIR__ . "/src/Views/home/home.php");
});
$ROUTER->map("GET", "/logout", function () {
  require(__DIR__ . "/src/Views/home/logout.php");
});
$ROUTER->map("GET", "/error", function () {
  require(__DIR__ . "/src/Views/home/error.php");
});
$ROUTER->map("POST", "/[**:params]", function ($params) {
  require(__DIR__ . "/src/Views/home/action.php");
});

$MATCH = $ROUTER->match();

if (is_array($MATCH) && is_callable($MATCH["target"])) {
  call_user_func_array($MATCH["target"], $MATCH["params"]);
} else {
  header("HTTP/1.1 404 Not Found");
  require_once(__DIR__ . "/src/Views/home/error.php");
}
