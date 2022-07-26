<?php

    function stop(): never {
        echo "STOP" . PHP_EOL;
        exit();
    }

    stop();

    echo "Hello Gan"; //Tidak dieksekusi karena fungsi dihentikan setelah fungsi stop()