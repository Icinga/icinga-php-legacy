<?php

namespace gipfl\Translation;

trait TranslationHelper
{
    /** @var TranslatorInterface */
    private static $translator;

    /**
     * @param string $message
     * @param ?string $context
     * @return string
     */
    public function translate(string $message, ?string $context = null): string
    {
        return self::getTranslator()->translate($message);
    }

    public static function getTranslator()
    {
        return StaticTranslator::get();
    }

    public static function setNoTranslator()
    {
        StaticTranslator::set(new NoTranslator());
    }

    /**
     * @param TranslatorInterface $translator
     */
    public static function setTranslator(TranslatorInterface $translator)
    {
        StaticTranslator::set($translator);
    }
}
