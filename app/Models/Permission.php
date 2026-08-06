<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class Permission extends Model
{
    use LogsActivity;
    protected $fillable = ['name', 'slug'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

    public function panelTypes()
    {
        return $this->belongsToMany(PanelType::class, 'panel_type_permission');
    }
}
