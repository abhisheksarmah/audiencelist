<?php

namespace App\Rules;

use DateTime;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\ValidationException;

class DateValidation implements Rule
{
    protected $startDate, $endDate;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $requestDate = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        $fromUser = new DateTime($requestDate);
        $startDate = new DateTime($this->startDate);
        $endDate = new DateTime($this->endDate);

        if ($this->isDateBetweenDates($fromUser, $startDate, $endDate)) {
            return true;
        }
        return false;
    }

    public function isDateBetweenDates(DateTime $date, DateTime $startDate, DateTime $endDate)
    {
        return $date >= $startDate && $date <= $endDate;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the date should be between list start date and end date.';
    }
}
