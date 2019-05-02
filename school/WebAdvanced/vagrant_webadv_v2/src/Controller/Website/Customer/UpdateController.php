<?php
namespace App\Controller\Website\Customer;

use App\Entity\Customers;
use App\Form\Type\CustomerType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class UpdateController
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManager
    ) {
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * @Template("website/customer/update.html.twig")
     * @Route("/customer/{customer}/update", name="website_customer_update")
     *
     * @param Customers $customer
     * @param Request $request
     * @param RouterInterface $router
     *
     * @return array|RedirectResponse
     */
    public function __invoke(Customers $customer, Request $request, RouterInterface $router)
    {
        $form = $this->formFactory->create(CustomerType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return new RedirectResponse($router->generate('website_index'));
        }

        return [
            'form' => $form->createView(),
        ];
    }
}