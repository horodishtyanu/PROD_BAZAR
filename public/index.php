<?php
$_SERVER["DOCUMENT_ROOT"] = "/www/market/app/core";
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';
set_time_limit(0);

while (ob_get_level())
    ob_end_flush();


use App\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable(E_RECOVERABLE_ERROR & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED, false);
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
