<?php
setcookie("member_id", "", time()-1200);
header("Location: ./index.php");