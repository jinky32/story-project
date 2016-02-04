<?php
/**
 * Created by PhpStorm.
 * User: stuartbrown
 * Date: 04/02/2016
 * Time: 20:21
 */

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

$driver = new GoutteDriver();

$session = new Session($driver);

$session->visit('http://www.three.co.uk');

var_dump($session->getStatusCode(), $session->getCurrentUrl());

$page = $session->getPage();

var_dump(substr($page->getText(), 0, 75));