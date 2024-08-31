<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'original_name', 'uploaded_by'];

    protected $guarded = [];

    public static function boot(){
        parent::boot();

        self::deleted(function($file){
            $file->SharedFiles()->delete();
        });
    }

    /**
     * Get the user that owns the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by' , 'id');
    }

    /**
     * Get all of the comments for the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function SharedFiles(): HasMany
    {
        return $this->hasMany(FileShare::class, 'file_id', 'id');
    }


}
