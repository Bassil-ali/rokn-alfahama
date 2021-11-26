<?php

namespace App\Traits;

use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait HasTranslations
{
    use BaseHasTranslations;
    public function getTranslations(string $key = null): array
    {
        if ($key !== null) {
            $this->guardAgainstNonTranslatableAttribute($key);

            return json_decode($this->getAttributes()[$key] ?? '' ?: '{}', true);
        }

        return array_reduce($this->getTranslatableAttributes(), function ($result, $item) {
            $result[$item] = $this->getTranslations($item);
            return $result;
        });
    }
    public function toArray()
    {
        $attributes = parent::toArray();
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, app()->getLocale());
        }
        return $attributes;
    }
    public function getTranslationsAttribute()
    {
        $translations = [];
        $attributes = $this->getTranslatableAttributes();
        foreach ($attributes as $attribute) {
            $attr_translations = $this->getTranslations($attribute);
            foreach (array_keys($attr_translations) as $locale)
                $translations = array_merge($translations, [
                    [

                        'field' => $attribute,
                        'locale' => $locale,
                        'value' => $attr_translations[$locale]
                    ]
                ]);
        }
        return $translations;
    }
}
