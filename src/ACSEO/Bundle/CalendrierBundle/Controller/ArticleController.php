<?php

namespace ACSEO\Bundle\CalendrierBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ACSEO\Bundle\CalendrierBundle\Entity\Article;

// Inclusion de la classe Entity d'APYDataGrid
use APY\DataGridBundle\Grid\Source\Entity;

/**
 * Article controller.
 *
 * @Route("/article")
 */
class ArticleController extends Controller
{

    /**
     * Lists all Article entities.
     *
     * @Route("/", name="article")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function indexAction()
    {

        // Initialisation de la source de données
        $source = new Entity('ACSEOCalendrierBundle:Article');

        // Récupération du service Grid
        $grid = $this->container->get('grid');

        // Affectation de la source 
        $grid->setSource($source);
        
        // Renvoie une réponse
        return $grid->getGridResponse('ACSEOCalendrierBundle:Article:index.html.twig');
    }

    /**
     * Finds and displays a Article entity.
     *
     * @Route("/{id}", name="article_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACSEOCalendrierBundle:Article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
