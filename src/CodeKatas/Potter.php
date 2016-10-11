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
    const BOOK_SERIE = 5;

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
        $cost = 0;

        // 2 calc special bookset (2*1, 2*2, 2*3, 1*4, 1*5)
        // @todo: need a better solution for this speical situation
        $restAfterSpecialCheck = $this->getRestAfterSpecialSetCheck($books);
        if (is_array($restAfterSpecialCheck)) {
            $cost += $this->calcSpecialSet();
            $books = $restAfterSpecialCheck;
        }

        // 3 calc normal bookset
        if (is_array($books) && !empty($books)) {
            $set = array_unique($books);
            $cost += $this->calcBookSet($set);

            // 4. calc rest recursively
            $diff = array_diff_assoc($books, $set);
            if ($this->hasDiff($diff)) {
                $cost += $this->calc($diff);
            }
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

    /**
     * @param      $books
     * @param int  $count
     * @param bool $recursive
     *
     * @return array|bool
     */
    protected function getRestAfterSpecialSetCheck($books, $count = self::BOOK_SERIE, $recursive = true)
    {
        $set = array_unique($books);
        if (count($set) != $count) {
            return false;
        }

        $diff = array_diff_assoc($books, $set);
        if ($recursive) {
            $diff = $this->getRestAfterSpecialSetCheck($diff, self::BOOK_SERIE - 2, false);
        }

        return $diff;
    }

    /**
     * @return int
     */
    protected function calcSpecialSet()
    {
        $cost4Books = self::SINGLE_PRICE * (self::BOOK_SERIE - 1) *$this->getDiscount(self::BOOK_SERIE - 1);

        return 2 * $cost4Books;
    }
}
