<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsActivity;

class QuoteAgentHistory extends Model
{
    use LogsActivity;
    
    protected $fillable = ['user_id', 'quote_id', 'title', 'description'];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
