<?php
require_once(__DIR__ . "/vendor/autoload.php");

$ROUTER = new AltoRouter();

##################### SETTING #####################
$ROUTER->map("GET", "/setting/system", function () {
  require(__DIR__ . "/src/Views/setting/system.php");
});
$ROUTER->map("GET", "/setting/service", function () {
  require(__DIR__ . "/src/Views/setting/service.php");
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
