<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ShippingStatusUpdated;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use App\Order;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use stdClass;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order=new stdClass;
        $order->usermer_id=1;
        $order->usercus_id=1;
        $order->status='terkirim';

        $sendTo = new stdClass;
        $sendTo->email = 'gensbookcities@gmail.com';
        $sendTo->name = 'indra';
        // echo Cache::store('database')->get('bar');
        // Cache::store('database')->put('bar','bax',600);
        // Cache::put('users','indra',now()->addMinutes(1));
        // echo Cache::get('users');
        // echo cache('users');
        // Mail::to($request->user())->send(new OrderShipped($order));
        Mail::to($sendTo)
            // ->send(new OrderShipped($order))
            ->queue(new OrderShipped($order))
            ;
        // return (new \App\Mail\OrderShipped($order))->render();
        echo 'ok';
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
        $request->validate([
            'usermer_id' => 'required',
        ]);
        $params = [
            'usermer_id' => $request->usermer_id,
            'usercus_id' => Auth::user()->id,
            'status' => 'Pesanan masuk'
        ];
        // dd($params);
        $order = Order::create($params);
        // dd($order);
        broadcast(new ShippingStatusUpdated($order))->toOthers();

        redirect()->route('home')->with('success', 'Pesanan disimpan');
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
        //
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
