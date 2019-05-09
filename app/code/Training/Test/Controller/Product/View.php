<?php
/**
 * Created by PhpStorm.
 * User: pavelmelnichuk
 * Date: 5/9/19
 * Time: 10:03 PM
 */

namespace Training\Test\Controller\Product;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class View extends \Magento\Catalog\Controller\Product\View
{
    public $resultRedirectFactory;
    private $customerSession;
    public function __construct(
        Context $context,
        \Magento\Catalog\Helper\Product\View $viewHelper,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
        PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\RedirectFactory $factory,
        \Magento\Customer\Model\Session $customerSession
    )
    {
        $this->resultRedirectFactory = $factory;
        $this->customerSession = $customerSession;
        parent::__construct($context, $viewHelper, $resultForwardFactory, $resultPageFactory);
    }

    public function execute()
    {
        if (!$this->customerSession->isLoggedIn()) {

            return $this->resultRedirectFactory->create()->setPath('customer/account/login');
        }
        return parent::execute(); // TODO: Change the autogenerated stub
    }

}