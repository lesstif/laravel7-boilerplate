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

function get_all_models_from_cache_or_put(string $key, string $model) : \Illuminate\Support\Collection
{
    $d = Cache::get('key');

    if ($d === null) {
        $d = (new $model)->all();

        Cache::forever($key, $d);
    }

    return $d;
}
