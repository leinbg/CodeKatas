<?php

namespace CodeKatas;

/**
 * Class DictionaryReplacer
 *
 * @package CodeKatas
 */
class DictionaryReplacer
{

    /**
     * @var array
     */
    protected $dict = [];

    /**
     * DictionaryReplacer constructor.
     *
     * @param $dict
     */
    public function __construct($dict)
    {
        $this->dict = $dict;
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    public function replace($string)
    {
        if (!is_array($this->dict) || empty($this->dict)) {
            throw new \InvalidArgumentException('dictionary provided invalid');
        }

        foreach ($this->dict as $key => $replacement) {
            $pattern = '*' . $key . '*';
            $string = str_replace($pattern, $replacement, $string);
        }

        return $string;
    }
}
