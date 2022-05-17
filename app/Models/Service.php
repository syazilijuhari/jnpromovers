<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Service extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'category',
        'description'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($service) {
            if (!$service->id) {
                while (true) {
                    try {
                        $latest = Service::latest('id')->first();
                        $sid=100;

                        if ($latest != null && $latest->exists()) {
                            $sid = random_int(101, 999);
                        }

                        $service->id = 'S' . $sid;
                        break;
                    } catch (QueryException $exception) {
                        continue;
                    }
                }
            }
        });
    }
}
