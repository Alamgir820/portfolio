<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function work()
    {
        return $this->hasOne(Work::class);
    }
}
