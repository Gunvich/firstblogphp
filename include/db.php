<?php
$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
);

if($connection == false)
{
    echo 'error!<br>';
    echo mysqli_connect_error();
    die;
}