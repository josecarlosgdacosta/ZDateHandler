<?php
/**
 * Created by PhpStorm.
 * User: jose.costa
 * Date: 10/11/14
 * Time: 14:17
 */

require 'ZDateHandler.php';

$zDateHandler = new ZDateHandler();

echo $zDateHandler->getDateInterval("15/11/1987", "10/11/2014", "days");