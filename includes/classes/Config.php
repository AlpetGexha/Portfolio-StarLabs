<?php

/**
 * Konfigurimi i variables globale ne ini.php
 * 
 * @return sessin/sessionName
 * */
class Config
{
    /**
     * Merr variablen globale dhe naje me '/'
     *
     * @var string
     *
     * @return string session/sessionName
     */
    public static function get(String $path = null)
    {
        if ($path) {
            $config = $GLOBALS['config'];
            $path  = explode('/', $path);
            //explode — Split a string by a string

            foreach ($path as $data) {
                if (isset($config[$data])) {
                    // echo  "<pre>";
                    $config = $config[$data];
                }
            }
            return $config;
        }
        return false;
    }
}
