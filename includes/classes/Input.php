<?php

class Input
{
    /**
     * Shiko nese input ekziston
     *
     * @param string $name
     * @return bool
     */
    public static function exist(String $item = 'post')
    {
        switch ($item) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }

        //  echo "submitedd";
    }

    /**
     * Merr $_POST ose $_GET input
     *
     * @param String $name
     * @return string
     */
    public static function get(String $item) //$_POST['username'] || $_GET['username'];
    {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        } else {
            return '';
        }
    }

    /**
     * Inputi për array properties
     *
     * @param String $item
     * @return string|void
     *
     */
     public static function getArray(String $item){
        $test = self::get($item);

       if(is_array($test)) {
          return  implode(',', $test);
       }
     }
    /**
     * Fshij të gjitha vlerat e inputit
     *
     * @return void
     */
    public static function reset()
    {
        if (self::exist()) {
            foreach ($_POST as $key => $value) {
                $_POST[$key] = '';
            }
        }
    }
}
