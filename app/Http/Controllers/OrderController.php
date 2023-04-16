<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
       return view('admin.orders.index');
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
