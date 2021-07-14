<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArvRefill extends Model
{
    use HasFactory;
    protected $table = "arv_refills";

    protected $guarded = [];

    public function withRefills()
    {
        return array();
    }
}
