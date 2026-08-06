<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class PanelType extends Model
{
    use LogsActivity;
    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'panel_type_user');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'panel_type_permission');
    }
}
