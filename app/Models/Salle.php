<?php

namespace App\Models;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Salle extends Model {
    use HasFactory;
    protected $table = 'salles';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function enseigner(): HasMany  {
        return $this->hasMany( Enseigner::class, 'salle_id' );
    }

    public function placards(): HasMany  {
        return $this->hasMany( Placard::class, 'salle_id' );
    }
}
