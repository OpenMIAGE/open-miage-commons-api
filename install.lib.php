<?php

/**
 * recover OpenM.util package
 */
$util = explode("=", file_get_contents("OpenM.util.version"));
$lib = "http://open-miage.org/download/" . $util[0] . "/" . $util[1];
$lib_dir = "../lib";
if (!is_dir($lib_dir)) {
    if (mkdir($lib_dir))
        echo " - $lib_dir <b>created</b><br>";
    else
        die("<h1>error occurs during creation of $lib_dir</h1>");
}
$lib_abs_dir = realpath($lib_dir);
$target = "$lib_abs_dir/temp/";
if (!is_dir($target))
    mkdir($target);

$targetZip = $target . $util[1];
if (copy($lib, $targetZip))
    echo " - $lib <b>copied to</b> $targetZip<br>";
else
    die("<h1>error occurs during copy of $lib</h1>");

$zip = new ZipArchive();
$res = $zip->open($targetZip);
if ($res === TRUE) {
    if ($zip->extractTo($target))
        echo " - $targetZip <b>unZip in</b> $target<br>";
    else
        die("<h1>error occurs during unZip of $targetZip</h1>");
    $zip->close();
    if (unlink($targetZip))
        echo " - $targetZip <b>correctly removed</b><br>";
    else
        die("<h1>error occurs during removing $targetZip</h1>");


    require_once $target . "lib/" . $util[0] . "/Import.class.php";
    Import::php("util.file.OpenM_Dir");
    OpenM_Dir::cp($target . "lib/", $lib_abs_dir);
    echo " - $target" . "lib/ <b>correctly copied in</b> $lib_abs_dir<br>";
    echo ' - lib OpenM.util succesfully installed !<br>';
}
else
    die('<h1>error occurs</h1>');

/**
 * recover other packages
 */
Import::php("util.Properties");
Import::php("util.OpenM_Dir");
$libs = Properties::fromFile("install.lib.version");
$e = $libs->getAll()->keys();
while ($e->hasNext()) {
    $lib_path = $e->next();
    $lib_file = $libs->get($lib_path);
    $lib = "http://open-miage.org/download/" . $lib_path . "/" . $lib_file;
    $targetZip = $target . $lib_file;
    OpenM_Dir::rm($target);
    echo " - $target <b>correctly removed</b><br>";
    mkdir($target);
    echo " - $target <b>correctly created</b><br>";
    if (copy($lib, $targetZip))
        echo " - $lib <b>copied to</b> $targetZip<br>";
    else
        die("<h1>error occurs during copy of $lib</h1>");
    $zip = new ZipArchive();
    $res = $zip->open($targetZip);
    if ($res === TRUE) {
        if ($zip->extractTo($target))
            echo " - $targetZip <b>unZip in</b> $target<br>";
        else
            die("<h1>error occurs during unZip of $targetZip</h1>");
        $zip->close();
        if (unlink($targetZip))
            echo " - $targetZip <b>correctly removed</b><br>";
        else
            die("<h1>error occurs during removing $targetZip</h1>");

        echo ' - lib OpenM.util succesfully installed !<br>';
    }
    else
        die("<h1>error occurs ($res)</h1>");
}

Import::php("util.file.OpenM_Dir");
OpenM_Dir::rm($target);
?>