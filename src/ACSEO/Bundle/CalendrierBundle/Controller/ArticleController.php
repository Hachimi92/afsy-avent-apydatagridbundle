<?php

namespace ACSEO\Bundle\CalendrierBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ACSEO\Bundle\CalendrierBundle\Entity\Article;

// Inclusion de la classe Entity d'APYDataGrid
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use APY\DataGridBundle\Grid\Action\RowAction;

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

        $rowAction = new RowAction("Voir l'article", 'article_show');
        $grid->addRowAction($rowAction);
        
        $rowAction = new RowAction("Supprimer l'article", 'article_delete', true, '_self');
        $rowAction->setConfirmMessage("Etes vous sur de vouloir supprimer cet article ?");
        $grid->addRowAction($rowAction);

        $nbCommentsColumn = new BlankColumn(array('id' => 'nbComments', 'title' => 'Commentaires'));
        $grid->addColumn($nbCommentsColumn, 8);
 
        // Manipulation des données
        $source->manipulateRow(
            function ($row) {
                $row->setField('author', $row->getField("writer.firstName")." ".$row->getField("writer.lastName"));

                $nbComments = $row->getEntity()->getNbComments();
                $comment = "Amazing !";
                if ($nbComments == 0) {
                    $comment = "";
                }
                elseif ($nbComments < 100 ) {
                    $comment = "Not Bad !";
                }
                $row->setField('nbComments', sprintf("%s. %s", $nbComments, $comment));
                
                $publishedDate = $row->getField("publishedDate");
                if ($publishedDate > new \Datetime())
                {
                    $row->setColor("#CCCCCC");    
                }
                
                return $row;
        });       

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

        /**
     * Finds and displays a Article entity.
     *
     * @Route("/{id}", name="article_delete")
     * @Method("GET")
     * @Template()
     */
    public function deleteAction($id)
    {
       return array();
    }
}
