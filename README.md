# ZDateHandler #

The ZFormHandler class makes basic operations with dates, such as:
- get the current date;
- get the current time;
- get the difference between two dates.

_The following is an example of its use:_

```
<?php
require_once 'ZDateHandler.php';
$zDateHandler = new ZDateHandler();
echo $zDateHandler->getDateInterval("15/11/1987", "10/11/2014", "days");
?>
```
