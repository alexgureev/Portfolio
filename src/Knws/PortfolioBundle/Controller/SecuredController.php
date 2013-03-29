<?php

namespace Knws\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Knws\PortfolioBundle\Model\Navigation;

class SecuredController extends Controller
{
    public function loginAction($_route)
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        $content = array(
            'navigation' => Navigation::get($_route),
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
            );

        return $this->render(
            'KnwsPortfolioBundle::login.html.twig',
            $content
        );
    }

    public function logoutAction()
    {
        // The security layer will intercept this request
    }

    public function loginCheckAction()
    {
        // The security layer will intercept this request
    }
}
