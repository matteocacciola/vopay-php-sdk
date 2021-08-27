<?php

namespace DataMat\VoPay\Utilities;

class Utility
{
    /**
     * @param string $function
     *
     * @return string
     */
    public static function endpointize(string $function) : string
    {
        $pieces = self::getPieces($function);

        foreach ($pieces as &$piece) {
            if (preg_match('@^[[:upper:]]+$@', $piece)) {
                // Leave an entirely uppercase piece alone.
                continue;
            }

            $piece = lcfirst($piece);
        }

        return self::implodeAndTrimPieces($pieces, '-');
    }

    /**
     * @param string $function
     *
     * @return string
     */
    public static function classize(string $function) : string
    {
        return ucfirst($function);
    }

    /**
     * @param string $string
     *
     * @return array|false|string[]
     */
    private static function getPieces(string $string)
    {
        return preg_split('@((?<=.)(?=[[:upper:]][[:lower:]])|(?<=[[:lower:]])(?=[[:upper:]]))@', $string);
    }

    /**
     * @param array $pieces
     * @param string $glue
     *
     * @return string
     */
    private static function implodeAndTrimPieces(array $pieces, string $glue) : string
    {
        return trim(implode($glue, $pieces));
    }
}
