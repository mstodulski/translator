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

    public function defineTranslations(array $translations, string $environment = 'prod') : void
    {
        $this->translations = $this->createTranslationKeys([], $translations);
    }

    public function translate(string $translationKey, TranslatorCase $translatorCase = TranslatorCase::upcaseOnlyFirst) : string
    {
        if (isset($this->translations[$translationKey]) && (is_string($this->translations[$translationKey]))) {
            $translation = $this->translations[$translationKey];
            switch ($translatorCase) {
                case TranslatorCase::small:
                    $translation = mb_strtolower($translation);
                    break;
                case TranslatorCase::upcaseFirst:
                    $translation = $this->mb_ucfirst($translation);
                    break;
                case TranslatorCase::upcaseString:
                    $translation = mb_strtoupper($translation);
                    break;
                case TranslatorCase::upcaseOnlyFirst:
                    $translation = ucfirst(mb_strtolower($translation));
                    break;
                default:
                    break;
            }
            return $translation;
        } else {
            return $translationKey;
        }
    }

    public function getTranslations() : array
    {
        return $this->translations;
    }

    public function setTranslations(array $translations)
    {
        $this->translations = $translations;
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

    private function mb_ucfirst(string $string, ?string $encoding = null)
    {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $rest = mb_substr($string, 1, null, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $rest;
    }
}
