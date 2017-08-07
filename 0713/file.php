<?php
function mkdirs($dir, $mode = 0777)
 {
     if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
     if (!mkdirs(dirname($dir), $mode)) return FALSE;
     return @mkdir($dir, $mode);
 } 
 mkdirs("aa01");