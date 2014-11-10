<b>ZDateHandler</b>

The trait ZFormHandler makes basic operations with dates, such as get the current date, get the current time or get
the difference between two dates.
The following is an example of its use:

<?php

    require_once 'ZDateHandler.php';

    use ZDateHandler;

    echo $this->getCurrentDate(true);

?>