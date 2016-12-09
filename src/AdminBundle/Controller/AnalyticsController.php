<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Analytics controller.
 *
 * @Route("/analytics")
 */
class AnalyticsController extends Controller 
{

    /**
     * Index.
     *
     * @Route("/", name="analytics_index")
     * @Method("GET")
     */
    public function indexAction() {

        $analyticsService = $this->get('google_analytics_api.api');
        $viewId = $this->container->getParameter('google_analytics_view_id');

        $sessions = $analyticsService->getSessionsDateRange($viewId, '30daysAgo', 'today');
        $bounceRate = $analyticsService->getBounceRateDateRange($viewId, '30daysAgo', 'today');
        $avgTimeOnPage = $analyticsService->getAvgTimeOnPageDateRange($viewId, '30daysAgo', 'today');
        $pageViewsPerSession = $analyticsService->getPageviewsPerSessionDateRange($viewId, '30daysAgo', 'today');
        $percentNewVisits = $analyticsService->getPercentNewVisitsDateRange($viewId, '30daysAgo', 'today');
        $pageViews = $analyticsService->getPageViewsDateRange($viewId, '30daysAgo', 'today');
        $avgPageLoadTime = $analyticsService->getAvgPageLoadTimeDateRange($viewId, '30daysAgo', 'today');

        echo $sessions;

        return $this->render('@AdminBundle/Analytics/index.html.twig');
    }

}
