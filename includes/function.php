<?php

/**
 * Security String
 *
 * @param string $string
 */
function e($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}


/**
 * Make Cross-Site Request Forgery Token
 *
 * @return string
 */
function csrf()
{
    return '<input type="hidden" name="token" value="' . Token::get() . '" />' . "\n";
}

/**
 * Nese teksti i pare eshte e zbrazet, shto tekstin e dyte
 *
 * @param string $text
 * @param string $default
 */
function con(string $text, string $text2 = null)
{
    if (empty($text)) {
        return $text2;
    }

    return $text;
}


function config($path)
{
    return Config::get($path);
}

/**
 * Slug function
 *
 * @param string $text
 * @return string
 *
 */
function slugify($text, string $divider = '-')
{
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    $text = preg_replace('~[^-\w]+~', '', $text);

    $text = trim($text, $divider);

    $text = preg_replace('~-+~', $divider, $text);

    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

/**
 *
 * @param string $text
 * @return string
 */

function slug($text)
{
    return slugify($text, '-');
}

function stringGenerate($len = 15)
{
    $big = "QWERTYUIOPASDFGHJKLZXCVBNM";
    $small = "qwertyuiopasdfghjklzxcvbnm";
    $number = "1234567890";
//    $symbol = "!@#$%^&*?*";
    $token = $big . $small . $number;
    $token = str_shuffle($token);
    $token = substr($token, 0, $len);


    return $token;
}

function uniq_slug(string $text, string $table, $column)
{
    $slug = slug($text);
    $query = DB::getDB()->sql("SELECT COUNT(*) AS NumHits FROM ? WHERE  ?  LIKE '$slug%'", [$table, $column]);

    $numHits = $query['NumHits'];

    return ($numHits > 0) ? ($slug . '-' . $numHits) : $slug;
}


function getErrors()
{

    if (Session::exist('success')) {
        echo '<span style="color: green" "><strong>' . Session::flash('success') . '</strong></span>';
    }
    ?>


    <?php
    if (Session::exist('error')) {
        echo '<span style="color: red" "><strong>' . Session::flash('error') . '</strong></span>';
    }

}


