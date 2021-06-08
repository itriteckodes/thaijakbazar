<?php

namespace App\Values;

use App\Models\Value;

class SetValue {
    
    public static function OrderTax(){
        $value = Value::where('key','order_tax')->first();
        return $value->value;
    }
    
    public static function CompanyCommission(){
        $value = Value::where('key','order_percentage')->first();
        return $value->value;
    }

   
    
}