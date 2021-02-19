<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DomCrawler;

/**
 * Link represents an HTML link (an HTML a, area or link tag).
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Link extends AbstractUriElement
{
    protected function getRawUri()
    {
        $href = $this->node->getAttribute('href');
        $href = !empty($href) ? $href : $this->node->getAttribute('src');
        return $href;
    }

    protected function setNode(\DOMElement $node)
    {
//        if ('a' !== $node->nodeName && 'area' !== $node->nodeName && 'link' !== $node->nodeName) {
        if ('a' !== $node->nodeName && 'area' !== $node->nodeName && 'link' !== $node->nodeName && 'frame' !== $node->nodeName) {
            throw new \LogicException(sprintf('Unable to navigate from a "%s" tag.', $node->nodeName));
        }

        $this->node = $node;
    }
}
