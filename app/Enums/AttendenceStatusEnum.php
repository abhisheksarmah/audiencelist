<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Invalid
 * @method static static Valid 
 */
final class AttendenceStatusEnum extends Enum
{
    const No = 0;
    const Yes = 1;
}
