<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['invoice', 'installment', 'value', 'client_id', 'due_date', 'payment_date'];
    /** 
*
*@return  Illuminate\Database\Eloquent\Relations\BelongsTo
*
*/
    public function client(): BelongsTo
    {
        return $this->beLongsTo(client::class);
    }
}
