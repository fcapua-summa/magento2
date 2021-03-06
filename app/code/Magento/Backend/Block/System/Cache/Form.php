<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Backend\Block\System\Cache;

/**
 * Cache management form page
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Core\Helper\Data
     */
    protected $_coreData;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Core\Helper\Data $coreData
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Core\Helper\Data $coreData,
        array $data = []
    ) {
        $this->_coreData = $coreData;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Initialize cache management form
     *
     * @return $this
     */
    public function initForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $fieldset = $form->addFieldset('cache_enable', ['legend' => __('Cache Control')]);

        $fieldset->addField(
            'all_cache',
            'select',
            [
                'name' => 'all_cache',
                'label' => '<strong>' . __('All Cache') . '</strong>',
                'value' => 1,
                'options' => [
                    '' => __('No change'),
                    'refresh' => __('Refresh'),
                    'disable' => __('Disable'),
                    'enable' => __('Enable'),
                ]
            ]
        );

        foreach ($this->_coreData->getCacheTypes() as $type => $label) {
            $fieldset->addField(
                'enable_' . $type,
                'checkbox',
                [
                    'name' => 'enable[' . $type . ']',
                    'label' => __($label),
                    'value' => 1,
                    'checked' => (int)$this->_cacheState->isEnabled($type)
                ]
            );
        }
        $this->setForm($form);
        return $this;
    }
}
