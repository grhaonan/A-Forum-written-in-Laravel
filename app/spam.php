<?php
/**
 * Created by PhpStorm.
 * User: haonanliu
 * Date: 2017/9/21
 * Time: 20:28
 */

namespace App;


use Mockery\Exception;

class spam {

    public function detect($body)

    {
        $this->spamKeyWords($body);

        return false;
    }

    protected function spamKeyWords($body)
    {

        $invalidKeyWords = [
            'Trump',
            'Russian',
            'porn video',
            'sexy video',
        ];

        foreach ($invalidKeyWords as $keyWord)
        {
            if (stripos($keyWord, $body)!== false)
            {
                throw new Exception('The word is spammed');
            }
        }
    }

}