<?php

function algo ($num) {
    $exp_num = explode ('.', strval($num));

    if (intval($exp_num[1]) == 5) {
        # code...
        $val = round($num);
    }elseif (intval($exp_num[1]) < 5) {
        # code...
        $val = intval($exp_num[0]) + 0.5;
    }

    return $val;
}

echo algo(52.5);

<!-- ec96f4cabc36f01303c441ee5cd04ada -->
<!-- auth token -->

// +19085096481
<!-- ACa889cacec67fd613c3a96695b0cea877  -->
<!-- account sid -->



?>