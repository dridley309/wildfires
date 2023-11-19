<?php 

declare(strict_types=1);

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

final class GlobalExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('url_encode_with_forward_slash', [$this, 'encodeStringWithSlash']),
        ];
    }

    public function encodeStringWithSlash(string $string): string
    {
        return str_replace('%2F','%252F', rawurlencode($string));
    }
}