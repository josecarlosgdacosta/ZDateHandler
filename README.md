# ZDateHandler

The trait ZFormHandler makes basic operations with dates, such as:
- get the current date;
- get the current time;
- get the difference between two dates.

_The following is an example of its use:_

require 'ZDateHandler.php';
$zDateHandler = new ZDateHandler();
echo $zDateHandler->getDateInterval("15/11/1987", "10/11/2014", "days");
