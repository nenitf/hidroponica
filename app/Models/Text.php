<?php

namespace App\Models;

use App\Enums\LanguageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @mixin IdeHelperText
 */
class Text extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'audio',
        'language',
        'is_active',
    ];

    protected $casts = [
        'language' => LanguageType::class,
    ];

    public function sentences(): HasMany
    {
        return $this->hasMany(Sentence::class)->orderBy('start_at', 'asc');
    }

    public function translatedSentences(): HasManyThrough
    {
        return $this->hasManyThrough(TranslatedSentence::class, Sentence::class)->orderBy('start_at', 'asc');
    }

    public function translatedSentencesGroupByLanguage()
    {
        return $this->translatedSentences()->get()->groupBy('language');
    }
}
