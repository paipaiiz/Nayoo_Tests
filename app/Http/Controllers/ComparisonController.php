<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    public function comparing(Request $request){
        $buyPrice = $request->buyPrice;
        $priceShop1 = 25;
        $amountShop1 = intval($buyPrice/$priceShop1);
        $promotionShop1 = 20;
        $newamountShop1 = intval($buyPrice/$promotionShop1);
        $changeShop1 = $buyPrice - ($amountShop1*$priceShop1);
        $newChangeShop1 = intval($buyPrice-($newamountShop1*$promotionShop1));
        $promotionShop2 = 3;
        $priceShop2 = 30;
        $amountShop2 = intval($buyPrice/$priceShop2);
        $freeAmount = intval($amountShop2/$promotionShop2);
        $totalAmount2 = $amountShop2+$freeAmount;
        $changeShop2 = intval($buyPrice-($amountShop2*$priceShop2));
        if($amountShop1>=10){
            $result1 = 'ร้านที่ 1 ซื้อได้ '.$newamountShop1.' ชิ้น'.' เหลือเงินทอน '.$newChangeShop1.' บาท';
        }else{
            $result1 = 'ร้านที่ 1 ซื้อได้ '.$amountShop1.' ชิ้น'.' เหลือเงินทอน '.$changeShop1.' บาท';
        }
        if($amountShop2>=3){
            $result2 = ' ร้านที่ 2 ซื้อได้ '.$totalAmount2.' ชิ้น'.' เหลือเงินทอน '.$changeShop2. ' บาท';
        }else{
            $result2 = ' ร้านที่ 2 ซื้อได้ '.$totalAmount2.' ชิ้น'.' เหลือเงินทอน '.$changeShop2. ' บาท';
        }
        if ($amountShop1>$totalAmount2&&($newChangeShop1||$changeShop1)>$changeShop2) {
            $result = 'แนะนำร้านที่ 1';
        }elseif($amountShop1>$totalAmount2&&($newChangeShop1||$changeShop1)<$changeShop2) {
            $result = 'แนะนำร้านที่ 1';
        }elseif($amountShop1==$totalAmount2&&($newChangeShop1||$changeShop1)>$changeShop2) {
            $result = 'แนะนำร้านที่ 1';
        }elseif($amountShop1>$totalAmount2&&($newChangeShop1||$changeShop1)==$changeShop2) {
            $result = 'แนะนำร้านที่ 1';
        }elseif($amountShop1<$totalAmount2&&($newChangeShop1||$changeShop1)<$changeShop2) {
            $result = 'แนะนำร้านที่ 2';
        }elseif($amountShop1<$totalAmount2&&($newChangeShop1||$changeShop1)>$changeShop2) {
            $result = 'แนะนำร้านที่ 2';
        }elseif($amountShop1==$totalAmount2&&($newChangeShop1||$changeShop1)<$changeShop2) {
            $result = 'แนะนำร้านที่ 2';
        }elseif($amountShop1>$totalAmount2&&($newChangeShop1||$changeShop1)==$changeShop2) {
            $result = 'แนะนำร้านที่ 2';
        }elseif($amountShop1==$totalAmount2&&($newChangeShop1||$changeShop1)==$changeShop2) {
            $result = 'ร้านไหนก็ได้';
        }

        return $result1.' '.$result2.' '.$result;
    }
}
