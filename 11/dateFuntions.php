<?php
/*
Date :
d - Represents the day of the month (01 to 31)
D - A textual representation of a day, three letters (Mon, Sun)
l - Represents the day of the week (Monday, Sunday)
w - Numeric representation of the day of the week (0-6)

m - Represents a month (01 to 12)
M - A short textual representation of a month, three letters (Jan, Dec)
F - A full textual representation of a month (January, March)

Y - Represents a year (in 4 digits)
y - Represents a year (in 2 digits)

z - The day of the year (0-365)

Time :
h - 12-hour format of an hour with leading zeros (01 to 12)
H - 24-hour format of an hour with leading zeros (00-23)
i - Minutes with leading zeros (00 to 59)
s - Seconds with leading zeros (00 to 59)
a - Lowercase Ante meridiem and Post meridiem (am or pm)
*/

$today = date("Y-H-i-s h:i:s a",strtotime("2018-08-15"));
echo $today . '<br>';

$dTS = time(); // mktime() deprecate used time()
echo $dTS . '<br>';
echo strtotime("2000-01-01 12:03:23") . '<br>';

echo 'Server Date parts ';
print_r(getdate(34567));
echo '<br>';

echo idate('i',strtotime('2005-5-23 13:12:33')) . '<br>';

echo mktime() . '<br>';
echo microtime() . '<br>';

echo date_default_timezone_get() . '<br>';
echo date("Y-m-d h:i:s a")  . '<br>';
date_default_timezone_set("Asia/Tokyo");
echo date_default_timezone_get() . '<br>';
echo date("Y-m-d h:i:s a")  . '<br>';

$d1 = new DateTime("2000-01-01");
$d2 = new DateTime("2005-01-01");
echo "D1 : " . date("Y-m-d h:i:s",$d1->getTimestamp()) . '<br>';
echo "D2 : " . date("Y-m-d h:i:s",$d2->getTimestamp()) . '<br>';
$d1->setDate(1990,1,1);
$d1->setTime(12,5,58);
echo "D1 : " . date("Y-m-d h:i:s",$d1->getTimestamp()) . '<br>';

$d2->add(new DateInterval("P1Y1M1DT10M"));
echo "D2 : " . date("Y-m-d h:i:s",$d2->getTimestamp()) . '<br>';
$d2->sub(new DateInterval("P12Y1M1DT10M"));
echo "D2 : " . date("Y-m-d h:i:s",$d2->getTimestamp()) . '<br>';

echo date_timestamp_get($d1) . '<br>';

$dd = $d1->diff($d2);
print_r($dd);

echo  '<br><br>';
echo $d2->format("Y m d") . '<br>';
$dArr = date_parse("1998-04-12 16:12:59");
print_r($dArr);
