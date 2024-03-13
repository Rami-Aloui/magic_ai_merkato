<?php

namespace App\Models\Chatbot;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chatbot extends Model
{
    protected $table = 'chatbot';

    protected $fillable = [
        'title',
        'role',
        'model',
        'first_message',
        'instructions',
        'chatbot_interests',
        'image',
        'width',
        'height',
        'color',
        'status'
    ];

    public function imageUrl(): Attribute
    {
        return new Attribute(
            get: fn () => asset('uploads/' . $this->image)
        );
    }

    public function data(): HasMany
    {
        return $this->hasMany(ChatbotData::class, 'chatbot_id');
    }

    public function trainingData(): HasMany
    {
        return $this->hasMany(ChatbotData::class, 'chatbot_id', 'id')
            ->where('status', 'trained');
    }
}
