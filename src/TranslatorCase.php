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

enum TranslatorCase
{
    case original;
    case small;
    case upcaseFirst;
    case upcaseString;
    case upcaseOnlyFirst;
}
