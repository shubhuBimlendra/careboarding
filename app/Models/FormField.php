<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;
    protected $fillable = [
        'form_id',
        'label',
        'is_required',
        'field_type',
        'field_options',
    ];

    protected $casts = [
        'field_options' => 'array', 
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
