<?php

require_once('IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-L7BC22G4JylEzkWZfkkED8a7VZn3tizD");
        $options->setSecretKey("sandbox-uOgoEltiOnl9AunXEGZ0uHdUc6hfH2qV");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        return $options;
    }
}