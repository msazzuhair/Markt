<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'contents', 'uuid', 'shared', 'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'shared' => 'boolean',
    ];

    protected $with = [
        'user',
    ];

    /**
     * @inheritDoc
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = Controller::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShowLinkAttribute(): string
    {
        return trim(route('note.show', HasUuid::slugify($this->title) . '-' . $this->uuid), '-');
    }

    public function getReadLinkAttribute(): string
    {
        return trim(route('note.read', HasUuid::slugify($this->title) . '-' . $this->uuid), '-');
    }
}
