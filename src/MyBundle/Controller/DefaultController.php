<?php

namespace MyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function aboutAction()
    {
        return $this->render('MyBundle:about:about.html.twig');
    }

    public function cvAction()
    {
    	return $this->render('MyBundle:cv:cv.html.twig');
    }

    public function arygaAction()
    {
    	return $this->render('MyBundle:stages:aryga.html.twig');
    }

    public function dartyAction()
    {
    	return $this->render('MyBundle:stages:darty.html.twig');
    }

    public function ppeCsharpAction()
    {
    	return $this->render('MyBundle:projetEtudiant:ppeCsharp.html.twig');
    }

    public function ppeSymfonyAction()
    {
    	return $this->render('MyBundle:projetEtudiant:ppeSymfony.html.twig');
    }

    public function cordovaAction()
    {
    	return $this->render('MyBundle:veilleTechno:cordova.html.twig');
    }

    public function contactAction()
    {
    	return $this->render('MyBundle:contact:contact.html.twig');
    }

    public function pongAction()
    {
        return $this->render('MyBundle:jeu:pong.html.twig');
    }

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('email', 'email')
                ->add('subject', 'text')
                ->add('content', 'textarea');
    }


    public function getName()
    {
        return 'Contact';
    }

    public function envoimail()
    {
        $transport = \Swift_SmtpTransport::newInstance()
            ->setUsername('mymail@outlook.com')->setPassword('mypassword')
            ->setHost('smtp-mail.outlook.com')
            ->setPort(587)->setEncryption('tls');

        $mailer = \Swift_Mailer::newInstance($transport);
        
        $message = \Swift_Message::newInstance()
       ->setSubject($param['title'])
       ->setFrom(array('mymail@outlook.com' => 'I am someone'))
       ->setTo(array('mail@mail.com' => "mail@mail.com"))
       ->addPart("<h1>Welcome</h1>",'text/html');
        
        $result = $mailer->send($message);
    }

    public function contact()
    {
        $form = $this->get('form.factory')->create(new ContactType());
         // Get the request
        $request = $this->get('request');
        // Get the handler
        $formHandler = new ContactHandler($form, $request, $this->get('mailer'));
        $process = $formHandler->process();
        if ($process)
        {
            // Launch the message flash
            $this->get('session')->setFlash('notice', 'Merci de nous avoir contacté, nous répondrons à vos questions dans les plus brefs délais.');
        }
        return $this->render('tutoWelcomeBundle:Contact:index.html.twig',
                array(
                    'form' => $form->createView(),
                    'hasError' => $request->getMethod() == 'POST' && !$form->isValid()
                ));
    }

    public function telechargementCvPdfAction()
   {
 
       $fichier = "CV_Mezdari_Achraf.pdf";
       $chemin = "bundles/My/files/"; // emplacement de votre fichier .pdf
 
       $response = new Response();
       $response->setContent(file_get_contents($chemin . $fichier));
       $response->headers->set(
           'Content-Type',
           'application/pdf'
       ); // Affiche le pdf au lieux de le télécharger
       $response->headers->set('Content-disposition', 'filename=' . $fichier);
 
       return $response;
   }

   public function telechargementSymfonyDocPdfAction()
   {
 
       $fichier = "MiniDocSymfony.pdf";
       $chemin = "bundles/My/files/"; // emplacement de votre fichier .pdf
 
       $response = new Response();
       $response->setContent(file_get_contents($chemin . $fichier));
       $response->headers->set(
           'Content-Type',
           'application/pdf'
       ); // Affiche le pdf au lieux de le télécharger
       $response->headers->set('Content-disposition', 'filename=' . $fichier);
 
       return $response;
   }
}
