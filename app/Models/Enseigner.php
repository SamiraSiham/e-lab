<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enseigner extends Model {
    use HasFactory, HasRoles;
    protected $table = 'enseigner';
    protected $primaryKey = 'id';
    protected $guarded = [];
    // protected $casts = [
    //     'date_deroulement' => 'date',
    //     'heure_debut' => 'datetime',
    //     'heure_fin' => 'datetime',
    // ];

    public function modules() : BelongsTo {
        return $this->belongsTo( Module::class, 'module_id' );
    }

    public function salles(): BelongsTo {
        return $this->belongsTo( Salle::class, 'salle_id' );
    }

    public function users(): BelongsTo {
        return $this->belongsTo( User::class, 'user_id' );
    }
}
