<?php

/**
 * Class 로 관리하기 애매한 함수 단위 기능 모음
 */

/**
 * 숫자만 남김
 *
 * @param $val
 *
 * @return string
 */
function remain_number_only(string $val)
{
    return preg_replace("/[^0-9]/", "", $val);
}
