<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUsedCouponLogs extends Model
{
    use HasFactory;

    protected $table = 'coupon_users_logs';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coupon()
    {
        return $this->belongsTo(CouponCode::class, 'code', 'code');
    }
}
