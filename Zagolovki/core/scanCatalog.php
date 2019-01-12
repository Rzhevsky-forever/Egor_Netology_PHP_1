<?php
function scanCatalog() {
    $testsCatalog = "tests/";
    $scanCatalog = scandir($testsCatalog);
//    var_dump($scanCatalog); //Test print
        return $scanCatalog;
}
?>  