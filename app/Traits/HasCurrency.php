<?php
namespace App\Traits;
use App\Models\Tenant\FinancialSetting;

trait HasCurrency{
    public function getCurrencyAttribute(){
        $currency = FinancialSetting::find('system_currency');
        if($currency){
            return $currency->code;
        }
        return "SAR";
    }
}
