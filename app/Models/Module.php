<?php

namespace App\Models;

use App\Models\Salle;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model {
    use HasFactory, HasRoles;
    protected $table = 'modules';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function salles(): HasMany {
        return $this->hasMany( Salle::class, 'salle_id', 'id' );
    }
}
