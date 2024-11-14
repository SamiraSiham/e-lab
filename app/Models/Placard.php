<?php

namespace App\Models;

use App\Models\Salle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Placard extends Model
{
    use HasFactory;
    protected $table = "placards";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salle::class, 'salle_id', 'id');
    }
}
