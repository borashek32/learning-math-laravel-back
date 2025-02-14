<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
