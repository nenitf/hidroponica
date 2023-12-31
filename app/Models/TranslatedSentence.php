<?php

namespace App\Models;

use App\Enums\LanguageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperTranslatedSentence
 */
class TranslatedSentence extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'language',
    ];

    protected $casts = [
        'language' => LanguageType::class,
    ];

    public function sentence(): BelongsTo
    {
        return $this->belongsTo(Sentence::class);
    }
}
