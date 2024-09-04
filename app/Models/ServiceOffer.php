<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceOffer extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $guarded = [];

    public function serviceOfferImages(): HasMany
    {
        return $this->hasMany(ServiceOfferImage::class);
    }
}
