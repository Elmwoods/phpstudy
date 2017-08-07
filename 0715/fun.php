<?php
function test(){
    static $count;
    $count = 0;
    $count++;
    echo $count;
}
test();
echo '<hr/>';
echo '<hr/>';
echo '<hr/>';
echo '<hr/>';
test();

echo '<hr/>';
echo '<hr/>';
echo '<hr/>';
echo '<hr/>';

