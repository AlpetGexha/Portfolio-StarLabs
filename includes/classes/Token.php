<?php

/** csrf token */
class Token
{
    /**
     * Krijo CSRF token
     *
     * @return string
     */
    public static function get(): String  //bd9ea63646a18c9c404753d1e957cd17
    {
        return Session::put(Config::get('session/sessionToken'), md5(uniqid()));
    }

    /**
     * Shiko nese tokeni është valid
     *
     * @param string $token
     * @return bool
     *
     */
    public static function check(String $token): bool
    {

        $tokenName = Config::get('session/sessionToken');

        if (Session::exist($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}
