<?php

namespace App\Models;

use App\Models\Salle;
use App\Models\Placard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etagere extends Model
{
    use HasFactory;
    protected $table = "etageres";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salle::class, 'salle_id', 'id');
    }
    public function placard() : BelongsTo
    {
        return $this->belongsTo(Placard::class, 'placard_id', 'id');
    }
}
