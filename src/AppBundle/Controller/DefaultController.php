<?php
namespace AppBundle\Controller;

use AppBundle\Entity\GuestBookEntry;
use AppBundle\Form\CreateEntryForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var \Doctrine\ORM\EntityRepository $repo */
        $repo = $em->getRepository('AppBundle:GuestBookEntry');

        $qb = $repo->createQueryBuilder('e')
                ->orderBy('e.date', 'DESC');

        /** @var GuestBookEntry[] $entries */
        $entries = $qb->getQuery()->execute();

        $newEntryForm = $this->createForm(CreateEntryForm::class, null, [
          'action' => $this->generateUrl('homepage'),
          'method' => 'POST'
        ]);

        $newEntryForm->handleRequest($request);
        if($newEntryForm->isSubmitted() && $newEntryForm->isValid()) {
            /** @var GuestBookEntry $newEntry */
            $newEntry = $newEntryForm->getData();
            $newEntry->date = new \DateTime();
            $em->persist($newEntry);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render(':default:index.html.twig', [
          'entries' => $entries,
          'newEntryForm' => $newEntryForm->createView()
        ]);
    }
}
