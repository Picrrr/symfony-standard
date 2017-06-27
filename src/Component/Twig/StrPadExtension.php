<?php
namespace Component\Twig;

/**
 * StrPadExtension class
 */

class StrPadExtension extends \Twig_Extension
{

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('strPadLeft', array($this, 'strPadLeft')),
        );
    }


    /**
     * Add the str_pad left php function
     *
     * @param  string $string
     * @param  int $pad_lenght
     * @param  string $pad_string
     * @return mixed
     */
    public function strPadLeft($string, $pad_length, $pad_string)
    {
        return str_pad($string, $pad_length, $pad_string, STR_PAD_LEFT);
    }

}