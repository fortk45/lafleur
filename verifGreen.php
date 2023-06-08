<?php 
if ($namePage==$aP) {
    echo "style='color:green'";
} else {
    if ((isset($testPage)) && ($testPage==$aP)) {
        echo "style='color:green'";
    }
}
?>