<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exchanges;
use App\Jobs\SendMailProcess;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exchanges $exchange)
    {

        return $exchange->hello();
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

      $exchange = new Exchanges;

        // Catch by the type of exchange who is the seller and buyer
        if ($request->type == 'request'){
          $exchange->id_seller = $request->actualUserId;
          $exchange->id_buyer = $request->involvedUserId;
        }
        if ($request->type == 'send'){
          $exchange->id_seller = $request->involvedUserId;
          $exchange->id_buyer = $request->actualUserId;
        }

        $exchange->id_creator = $request->actualUserId;
        $exchange->status = 0;
        $exchange->concept = $request->concept;
        $exchange->amount = $request->hours * 60 + $request->minutes;
        $exchange->accepted_time = now();
        $exchange->finished_time = now();
        $exchange->cancelled_time = now();
        $exchange->save();
        //Mail::send(new StatusMail(16));
        SendMailProcess::dispatch($exchange->id);

        pushUrlMailwork();

        return $exchange->id; //Return new created exchange id
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Exchanges::changeStatus($request, $id);
        SendMailProcess::dispatch($id);
        //Mail::send(new StatusMail($id));
        pushUrlMailwork();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
