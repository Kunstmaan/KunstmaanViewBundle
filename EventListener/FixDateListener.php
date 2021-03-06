<?php

namespace Kunstmaan\ViewBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;

/**
 * Fixes bug with date vs Date headers
 */
class FixDateListener
{
   /**
    * Make sure response has a timestamp
    *
    * @param GetResponseEvent $event
    */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        if ($response) {
            $date = $response->getDate();
            if (empty($date)) {
                $response->setDate(new \DateTime());
            }
        }
    }
}
