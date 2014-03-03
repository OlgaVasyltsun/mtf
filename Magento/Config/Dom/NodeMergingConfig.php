<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */

namespace Magento\Config\Dom;

/**
 * Configuration of identifier attributes to be taken into account during merging
 */
class NodeMergingConfig
{
    /**
     * @var NodePathMatcher
     */
    private $nodePathMatcher;

    /**
     * @var array Format: array('/node/path' => '<node_id_attribute>', ...)
     */
    private $idAttributes = array();

    /**
     * @param NodePathMatcher $nodePathMatcher
     * @param array $idAttributes
     */
    public function __construct(NodePathMatcher $nodePathMatcher, array $idAttributes)
    {
        $this->nodePathMatcher = $nodePathMatcher;
        $this->idAttributes = $idAttributes;
    }

    /**
     * Retrieve name of an identifier attribute for a node
     *
     * @param string $nodeXpath
     * @return string|null
     */
    public function getIdAttribute($nodeXpath)
    {
        foreach ($this->idAttributes as $pathPattern => $idAttribute) {
            if ($this->nodePathMatcher->match($pathPattern, $nodeXpath)) {
                return $idAttribute;
            }
        }
        return null;
    }
}
