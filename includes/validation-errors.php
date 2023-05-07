<?php
session_start();
if (isset($_SESSION['validationErrors']) && is_array($_SESSION['validationErrors']) && count($_SESSION['validationErrors'])) {
    ?>
    <ul>
        <?php
        foreach ($_SESSION['validationErrors'] as $key => $value) {
            echo '<li>' . $value . '</li>';
        }
        ?>
    </ul>
    <?php
    unset($_SESSION['validationErrors']);
}
