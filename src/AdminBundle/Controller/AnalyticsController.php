<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ob\HighchartsBundle\Highcharts\Highchart;

/**
 * Analytics controller.
 *
 * @Route("/analytics")
 */
class AnalyticsController extends Controller {

    /**
     * Update
     *
     * @Route("/update/{day}", name="analytics_update")
     * @Method("GET")
     */
    public function updateAction($day = 30) {

        $analyticsHelper = $this->get('admin.analytics.helper');
        $analyticsHelper->updateAction();
        die;
    }

    /**
     * Index.
     *
     * @Route("/", name="analytics_index")
     * @Method("GET")
     */
    public function indexAction() {

        $analyticsHelper = $this->get('admin.analytics.helper');
        $analytics = $analyticsHelper->indexAction();
        $highcharts = array();
        foreach ($analytics as $id => $serie) {
            $series = array(array(
                    "name" => $serie['chart']['y'] . ' par ' . $serie['chart']['x'],
                    "data" => array_map(function($value) {return (int) $value;}, $serie['chart']['data'])));
            $ob = new Highchart();
            $ob->chart->renderTo($id);
            $ob->title->text($serie['chart']['name']);
            $ob->xAxis->title(array('text' => $serie['chart']['x']));
            $ob->yAxis->title(array('text' => $serie['chart']['y']));
            $ob->series($series);
            $highcharts[$id] = $ob;
        }

        return $this->render('@AdminBundle/Resources/view/Analytics/index.html.twig', array('highcharts' => $highcharts));
    }

}
