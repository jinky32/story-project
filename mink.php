<?php
/**
 * Created by PhpStorm.
 * User: stuartbrown
 * Date: 04/02/2016
 * Time: 20:21
 */

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Session;

//$driver = new GoutteDriver();

$driver = new Selenium2Driver();

$session = new Session($driver);
$session->start();

$session->visit('http://www.three.co.uk');

var_dump($session->getCurrentUrl());

$page = $session->getPage();

var_dump(substr($page->getText(), 0, 75));

$header = $page->find('css', '.main');



$header = $page->findLink('Tablets');
$header->click();
var_dump($session->getCurrentUrl());

$session->stop();