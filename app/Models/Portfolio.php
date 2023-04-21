<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portfolio extends Model
{
    protected $guarded = [];

    public function portfolioImage(): HasMany
    {
        return $this->hasMany(PortfolioImage::class, 'portfolio_id', 'id');
    }
}
