<?php

/**
 * This file is part of the EasyCore package.
 *
 * (c) Marcin Stodulski <marcin.stodulski@devsprint.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace mstodulski\translator;

class Translator
{
    private array $translations = [];

    public function defineTranslations(array $translations) : void
    {
        $this->translations = $this->createTranslationKeys([], $translations);
    }

    public function translate(string $translationKey) : string
    {
        if (isset($this->translations[$translationKey]) && (is_string($this->translations[$translationKey]))) {
            return $this->translations[$translationKey];
        } else {
            return $translationKey;
        }
    }

    private function createTranslationKeys(array $trans, array $translations, string $keyPrefix = ''): array
    {
        foreach ($translations as $key => $translation) {
            if (is_array($translation)) {
                $trans = $this->createTranslationKeys($trans, $translation, $keyPrefix . $key . '.');
            } else {
                $trans[$keyPrefix . $key] = $translation;
            }
        }

        return $trans;
    }
}