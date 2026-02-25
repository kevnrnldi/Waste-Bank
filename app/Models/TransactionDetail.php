<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    //
    protected $guarded = [];

    public function transaction (): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function sampah (): BelongsTo
    {
        return $this->belongsTo(Sampah::class);
    }

}
