<?php

namespace App\Http\Controllers;

use App\Models\ChangePayment;
use Illuminate\Http\Request;

class ChangePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChangePayment  $changePayment
     * @return \Illuminate\Http\Response
     */
    public function show(ChangePayment $changePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChangePayment  $changePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(ChangePayment $changePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChangePayment  $changePayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChangePayment $changePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChangePayment  $changePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChangePayment $changePayment)
    {
        //
    }

    public function changePayment(Request $request)
    {
        $money = $request->money;
        $price = $request->price;
        $mas = [];
        if($money >= $price){
        $changePrice = $money - $price;
        $cashArray = [500, 100, 50, 10, 5, 1];
        $cashList = ['500', '100', '50', '10', '5', '1'];

        $cashLength = count($cashArray);
        for($i=0; $i<$cashLength; $i++){
            $amount[$i] = intval($changePrice/$cashArray[$i]);
            $mas[$cashList[$i]] = $cashList[$i].' = '.$amount[$i];
            $changePrice = $changePrice%$cashArray[$i];
        }
        }
        

        return $mas;


    }
}
