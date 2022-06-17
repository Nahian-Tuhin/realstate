<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyQuery extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'name',
        'email',
        'mobile',
        'default_message',
        'created_at'

    ];

    public function property()
    {
        return $this->belongsTo(Property::class)->withDefault();
    }
}
