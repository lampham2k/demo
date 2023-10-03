<?php
function connect(){
    $connect = mysqli_connect('host.docker.internal:33061','root','root','project_2_J2school');
    return $connect;
}

