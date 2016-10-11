<?php

namespace CodeKatas;

/**
 * Class Potter
 *
 * @package CodeKatas
 */
class Potter
{

    /**
     *
     */
    const SINGLE_PRICE = 8;

    /**
     *
     */
    const BOOK_SERIES_LENGTH = 5;

    /**
     * @var array
     */
    protected $discountMapping = [1, .95, .9, .8, .75];

    /**
     * @param array $books
     *
     * @return int
     */
    public function calc($books)
    {
        // 1 validate
        $this->validate($books);

        // 2 calc bookset
        $cost = 0;
        $set = array_unique($books);
        $cost += $this->calcBookSet($set);

        // 3. calc rest
        $diff = array_diff_assoc($books, $set);
        if ($this->hasDiff($diff)) {
            $cost += $this->calc($diff);
        }

        return $cost;
    }

    /**
     * @param $books
     */
    protected function validate($books)
    {
        if (!is_array($books) || empty($books)) {
            throw new \InvalidArgumentException("not an array!");
        }
    }

    /**
     * @param array $set
     *
     * @return int
     */
    protected function calcBookSet($set)
    {
        $cost = 0;
        $setCount = count($set);
        if ($setCount > 0) {
            $cost += $setCount * self::SINGLE_PRICE * $this->getDiscount($setCount);
        }

        return $cost;
    }

    /**
     * @param array $diff
     *
     * @return bool
     */
    protected function hasDiff($diff)
    {
        return $diff && is_array($diff) && !empty($diff);
    }

    /**
     * @param int $count
     *
     * @return mixed
     */
    protected function getDiscount($count)
    {
        return $this->discountMapping[$count - 1];
    }
}
