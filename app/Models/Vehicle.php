<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class Vehicle extends Model
{
    use LogsActivity;
    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'vin',
        'length_ft',
        'length_in',
        'width_ft',
        'width_in',
        'height_ft',
        'height_in',
        'weight',
        'condition',
        'modified',
        'modified_info',
        'available_at_auction',
        'available_link',
        'trailer_type',
        'load_method',
        'unload_method',
        'type',
        'quote_id',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function getConditionLabelAttribute(): string
    {
        if (!$this->condition) {
            return '<span class="badge bg-secondary">N/A</span>';
        }

        $class = strtolower($this->condition) === 'running' ? 'success' : 'danger';
        return '<span class="badge bg-' . $class . '">' . e($this->condition) . '</span>';
    }

    public function getTrailerTypeLabelAttribute(): string
    {
        if (!$this->trailer_type) {
            return '<span class="badge bg-secondary">N/A</span>';
        }

        $value = strtolower(trim($this->trailer_type));

        // Map trailer types to colors
        $successTypes = ['open trailer', 'flatbed'];   
        $infoTypes    = ['enclosed trailer'];                  
        $warningTypes = ['flatbed'];                    

        if (in_array($value, $successTypes)) {
            $class = 'success';
        } elseif (in_array($value, $infoTypes)) {
            $class = 'info';
        } elseif (in_array($value, $warningTypes)) {
            $class = 'warning';
        } else {
            $class = 'danger';
        }

        return '<span class="badge bg-' . $class . '">' . e($this->trailer_type) . '</span>';
    }
}
