<?php

/** Sessionet
 * @method get();
 * @method put();
 * @method exist();
 * @method delete();
 * @method flash();
 */
class Session
{
    /**
     * Krijo session
     *
     * @param string $name
     */
    public static function get(String $name)
    {
        return $_SESSION[$name];
    }

    /**
     * Barazo sessionet
     *
     * @param string $name
     * @param string $value
     */

    public static function put(String $name, $value)
    {
        //sesioni                //vlera "md5(uniqid()));"
        return $_SESSION[$name] = $value;
    }

    /**
     * Shiko nese sessioni ekziston
     *
     * @param string $name
     */
    public static function exist(String $name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    /**
     * Fshij session
     *
     * @param string $name
     */
    public static function delete(String $name)
    {
        if (self::exist($name)) {
            unset($_SESSION[$name]);
        }
    }

    /**
     * Trego messashin vetem një herë
     *
     * @param string $name
     * @param string $value
     * @return string
     *
     */
    public static function flash(mixed $name, String $string = '')
    {
        if (self::exist($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
    }

    public static function has(String $name)
    {
        return isset($_SESSION[$name]);
    }

//    get all session
    public static function all()
    {
        return $_SESSION;
    }

}
