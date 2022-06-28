<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable= [
      'name',
      'display_name',
      'price',
      'description',
      'image',
        'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }


}
