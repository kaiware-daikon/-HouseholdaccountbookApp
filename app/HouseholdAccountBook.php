<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseholdAccountBook extends Model
{
    const UNIT_YEN = "円";

    protected $guarded = array('id');
    protected $dates = ['payment_date'];

    public static $rules = array(
        'name' => 'required',
        'unit_price' => 'required',
        'payment_date' => 'required',
    );

    public function getPriceAttribute(): int
    {
        return $this->unit_price * $this->num;
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price) . self::UNIT_YEN;
    }
}
