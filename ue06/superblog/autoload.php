<?php

function autoload($className) {
    if (file_exists("../app/model/{$className}.php")) {
        require "../app/model/{$className}.php";
    }
}
spl_autoload_register('autoload');