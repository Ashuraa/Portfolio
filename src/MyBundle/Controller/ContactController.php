<?php
namespace MyBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyBundle\Form\Type\ContactType;
use MyBundle\Form\Model\Contact;
class ContactController extends Controller
{
   /**
    * Contact
    *
    */
    public function indexAction()
    {
        $form = $this->get('portfolio.contact.form');
         // Get the request
        $request = $this->get('request');
        // Get the handler
        $formHandler = $this->get('portfolio.contact.form.handler');
        $process = $formHandler->process();
        if ($process)
        {
            // Launch the message flash
            $this->get('session')->getFlashBag()->set('notice', 'Merci de m\'avoir contacté, je répondrai dans les plus brefs délais.');
        }
        return $this->render('MyBundle:Contact:index.html.twig',
                array(
                    'form' => $form->createView(),
                    'hasError' => $request->getMethod() == 'POST' && !$form->isValid()
                ));
    }
}