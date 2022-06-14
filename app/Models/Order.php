<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    public $incrementing = false;

    protected $fillable = [
        'order_id',
        'name',
        'package',
        'booking_date',
        'booking time',
        'address_from',
        'address_to',
        'vehicle_type',
        'extra_service',
        'note',
        'photo',
        'payment_method',
        'transaction_id',
        'payment_status'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($order) {
            if (!$order->order_id) {
                while (true) {
                    try {
                        $latest = Order::latest('order_id')->first();
                        $oid=100;

                        if ($latest != null && $latest->exists()) {
                            $oid = random_int(101, 999);
                        }

                        $order->order_id = 'O' . $oid;
                        break;
                    } catch (QueryException $exception) {
                        continue;
                    }
                }
            }
        });
    }
}