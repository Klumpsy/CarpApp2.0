<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\CustomCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;

class LoginFormAuthenticator extends AbstractAuthenticator
{
    private const EMAIL_NOT_FOUND = 'Email not found';

    public function __construct(
        protected EntityManagerInterface $em,
        protected RouterInterface $routerInterface
    ){
    }

    public function supports(Request $request): ?bool
    {
        return $request->getPathInfo() ===  '/login' && $request->isMethod('POST');
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        return new Passport(
            new UserBadge($email, function($userIdentifier) {
                $user = $this->em->getRepository(User::class)->findUser($userIdentifier);

                if(!$user) {
                    throw new UserNotFoundException(self::EMAIL_NOT_FOUND);
                }

                return $user;
            }),
           new PasswordCredentials($password)
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
       return new RedirectResponse(
           $this->routerInterface->generate('homepage')
       );
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $request->getSession()
            ->set(Security::AUTHENTICATION_ERROR, $exception);

        return new RedirectResponse(
            $this->routerInterface->generate('login_page')
        );
    }
}