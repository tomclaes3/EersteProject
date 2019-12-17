<?php
namespace scr\Controller;

use scr\View\CustomerView;
use scr\Model\PDOCustomersModel;

class CustomersController
{
    /**
     * @var CustomerView
     */
    private $customerView;
    /**
     * @var PDOCustomersModel
     */
    private $customersModel;

    public function __construct(CustomerView $customerView, PDOCustomersModel $customersModel)
    {
        $this->customerView = $customerView;
        $this->customersModel = $customersModel;
    }

    public function addPersonByIdAndName($id, $firstame , $lastname , $geslacht)
    {
        $statuscode = 201;
        $customer = null;

        try {
            if ($this->customersModel->idExists($id)) {
                $statuscode = 200;
            }

            $customer = $this->customersModel->addPersonByIdAndName($id, $firstame, $lastname, $geslacht);
        } catch (\InvalidArgumentException $exception) {
            $statuscode = 400;
        } catch (\PDOException $exception) {
            $statuscode = 500;
        }

        $this->customerView->show(['customer' => $customer, 'statuscode' => $statuscode]);
    }


}