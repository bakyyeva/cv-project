<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Portfolio extends Model
{
    protected $guarded = [];

    public function portfolioImage(): HasMany
    {
        return $this->hasMany(PortfolioImage::class, 'portfolio_id', 'id');
    }

    public function featureImage(): HasOne
    {
        return $this->hasOne(PortfolioImage::class, 'portfolio_id', 'id')
            ->where('feature_status', 1)
            ->where('status', 1);
    }



}
