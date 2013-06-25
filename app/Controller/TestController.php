<?php
class TestController extends AppController
{
    function __construct()
    {
        parent::__construct();
        echo phpinfo();die();
    }
}