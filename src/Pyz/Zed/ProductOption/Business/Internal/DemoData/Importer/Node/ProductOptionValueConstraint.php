<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;

class ProductOptionValueConstraint implements VisitableProductInterface
{

    /**
     * @var string
     */
    private $target;

    /**
     * @var string
     */
    private $operator;

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface $visitor
     *
     * @return void
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitProductOptionValueConstraint($this);
    }

    /**
     * @param string $target
     * @param string $operator
     */
    public function __construct($target, $operator)
    {
        $this->target = $target;
        $this->operator = $operator;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

}
