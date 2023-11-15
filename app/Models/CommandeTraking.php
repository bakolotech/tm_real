<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeTraking extends Model
{
    protected $fillable =[
        'track_jobId',
        'pickup_job_id',
        'delivery_job_id',
        'order_id',
        'pickup_tracking_link',
        'delivery_tracing_link'
    ];
}
