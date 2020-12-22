<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $orders = Order::query();
        if ($user->priviledge == 0)
            $orders = $orders->where('user_id', '=', $user->id);
        $orders = $orders->simplePaginate(10);
        return response(view("orders.index", ['orders' => $orders, 'user' => $user]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::findOrFail(request()->get('user'));
        $event = Event::findOrFail(request()->get('event'));
        return response(view("orders.create", ["user" => $user, "event" => $event]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $tickets = $request->all()['tickets'];
        $order = new Order(
            $request->validated()
        );
        $order->save();
        Ticket::query()->whereIn('id', $tickets)->update(
            [
                'status' => 'забронирован',
                'order_id' => $order->id,
            ]
        );
        return response(redirect(route("orders.index")));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response(route("orders.show"), ["order" => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return response(route("orders.edit"), ["order" => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->fill($request->all());
        $order->update();
        return response(redirect(route("orders.index")));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response(redirect(route("orders.index")));
    }
}
