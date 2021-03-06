<?php
/**
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\CurrencySymbol\Controller\Adminhtml\System\Currency;

class Index extends \Magento\CurrencySymbol\Controller\Adminhtml\System\Currency
{
    /**
     * Currency management main page
     *
     * @return void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu('Magento_CurrencySymbol::system_currency_rates');
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Currency Rates'));
        $this->_addContent(
            $this->_view->getLayout()->createBlock('Magento\CurrencySymbol\Block\Adminhtml\System\Currency')
        );
        $this->_view->renderLayout();
    }
}
