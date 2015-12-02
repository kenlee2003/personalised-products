<?php

namespace Richdynamix\PersonalisedProducts\Model;

use \Richdynamix\PersonalisedProducts\Api\Data\ExportInterface;
use \Magento\Framework\Model\AbstractModel;
use \Magento\Catalog\Model\ProductFactory as ProductFactory;

/**
 * Class Export
 *
 * @category    Richdynamix
 * @package     PersonalisedProducts
 * @author 		Steven Richardson (steven@richdynamix.com) @mage_gizmo
 */
class Export extends AbstractModel implements ExportInterface
{
    /**
     * Export constructor.
     * @param ProductFactory $productFactory
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        ProductFactory $productFactory,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    )
    {
        $this->_productFactory = $productFactory;

        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
    }

    /**
     * Export constructor
     */
    protected function _construct()
    {
        $this->_init('Richdynamix\PersonalisedProducts\Model\ResourceModel\Export');
    }

    /**
     * Get table increment ID
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getData(self::INCREMENT_ID);
    }

    /**
     * Get product ID
     *
     * @return mixed
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Get created time
     *
     * @return mixed
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get updated time
     *
     * @return mixed
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Check product is exported
     *
     * @return bool
     */
    public function isExported()
    {
        return (bool) $this->getData(self::IS_EXPORTED);
    }

    /**
     * Set table row increment ID
     *
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::INCREMENT_ID, $id);
    }

    /**
     * Set row product ID
     *
     * @param $productId
     * @return $this
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * Set row created time
     *
     * @param $creationTime
     * @return $this
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Set row updated time
     *
     * @param $updatedTime
     * @return $this
     */
    public function setUpdateTime($updatedTime)
    {
        return $this->setData(self::UPDATE_TIME, $updatedTime);
    }

    /**
     * Set product as being exported
     *
     * @param $isExported
     * @return $this
     */
    public function setIsExported($isExported)
    {
        return $this->setData(self::IS_ACTIVE, $isExported);
    }

    /**
     * Get category ID's of the product
     *
     * @return array
     */
    public function getCategoryIds()
    {
        $product = $this->_productFactory->create();
        $product->load($this->getData(self::PRODUCT_ID));

        return $product->getCategoryIds();
    }
}
