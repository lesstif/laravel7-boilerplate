<?php

/**
 * 서비스 관련 설정은 여기에
 *
 * config('my-setting.key');
 *
 */

return [
    'key' => 'value',

    // FIXME "php vendor/bin/optimus spark" 명령어로 솟수 생성
    'optimus' => [
        'prime' => env('OPTIMUS_PRIME'),
        'inverse' => env('OPTIMUS_INVERSE'),
        'xor' => env('OPTIMUS_XOR'),
    ],
];
