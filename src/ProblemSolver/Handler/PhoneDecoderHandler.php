<?php

namespace ProblemSolver\Handler;

class PhoneDecoderHandler
{
    const PHONE_CODE = [
        'a' => 22,
        'b' => 222,
        'c' => 2222,
        'd' => 33,
        'e' => 333,
        'f' => 3333,
        'g' => 44,
        'h' => 444,
        'i' => 4444,
        'j' => 55,
        'k' => 555,
        'l' => 5555,
        'm' => 66,
        'n' => 666,
        'o' => 6666,
        'p' => 77,
        'q' => 777,
        'r' => 7777,
        's' => 77777,
        't' => 88,
        'u' => 888,
        'v' => 8888,
        'w' => 99,
        'x' => 999,
        'y' => 9999,
        'z' => 99999,
    ];

    /**
     * @param $code
     *
     * @return int
     */
    public function decode($code)
    {
        $sum = 0;
        $letters = str_split($code);

        foreach ($letters as $letter) {
            if (intval($letter) != 0) {
                $sum += $letter;
            } else {
                $sum += $this->decodeLetter($letter);
            }
        }

        return $sum;
    }

    /**
     * @param $letter
     *
     * @return int
     */
    public function decodeLetter($letter)
    {
        return $this->sumValue(self::PHONE_CODE[$letter]);
    }

    /**
     * @param $value
     *
     * @return int
     */
    public function sumValue($value)
    {
        $total = 0;
        $nums = str_split(strval($value));

        foreach ($nums as $num) {
            $total += $num;
        }

        return $total;
    }
}
