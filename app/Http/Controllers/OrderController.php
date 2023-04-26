<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\ValidationRules;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Traits\HasRoles;

class OrderController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = User::find(Auth::id());
            if($user->hasRole('admin')){
                return view('admin.orders.index');
            }elseif($user->hasRole('customer')){
                return view('customer.orders.index');
            }
        }
    }
    public function create()
    {
        // return view('')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $orders = Order::create([
            'user_id' => $id,
        ]); 
        return to_route('customer.dashboard');
    }
    public function destroy($id)
    {
        $order = Order::find($id);
        if(!$order->trashed()){
            Order::find($id)->delete();
            $status = 'Orden eliminado exitosamente';
        }
        else{
            $status = 'No se puede borrar un orden ya eliminado o inexistente';
        }
        return to_route('orders.index')->with('status', $status);
    }
    public function restore($id)
    {
        $order = Order::withTrashed()->find($id);
        if($order->trashed()){
            $order->restore();
            $status = 'Orden restaurado exitosamente';
        }
        else{
            $status = 'No se puede restaurar un orden activo o inexistente';
        }

        return to_route('orders.index')->with('status', $status);
    }
}
