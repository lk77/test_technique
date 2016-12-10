<?php

namespace AdminBundle\Helper;

class AnalyticsHelper {

    private $analyticsService;
    private $viewId;
    private $root;
    private $analytics = array(
        'sessions' => array("method" => "getSessionsDateRange", "chart" => array("name" => "Sessions", "y" => "sessions", "x" => "jour", "data" => array())),
        'bounceRate' => array("method" => "getBounceRateDateRange", "chart" => array("name" => "Taux de rebond", "y" => "rebond(%)", "x" => "jour", "data" => array())),
        'avgTimeOnPage' => array("method" => "getAvgTimeOnPageDateRange", "chart" => array("name" => "Temps passé", "y" => "durée(m)", "x" => "jour", "data" => array())),
        'pageViewsPerSession' => array("method" => "getPageviewsPerSessionDateRange", "chart" => array("name" => "Vues par session", "y" => "vues(session)", "x" => "jour", "data" => array())),
        'percentNewVisits' => array("method" => "getPercentNewVisitsDateRange", "chart" => array("name" => "Nouveaux visiteurs(%)", "y" => "noueaux visiteurs(%)", "x" => "jour", "data" => array())),
        'pageViews' => array("method" => "getPageViewsDateRange", "chart" => array("name" => "Pages vues", "y" => "vues", "x" => "jour", "data" => array())),
        'avgPageLoadTime' => array("method" => "getAvgPageLoadTimeDateRange", "chart" => array("name" => "Temps de chargement", "y" => "chargement(s)", "x" => "jour", "data" => array())));

    public function __construct($analyticsService, $viewId, $root) {
        $this->analyticsService = $analyticsService;
        $this->viewId = $viewId;
        $this->root = $root;
    }

    public function updateAction($day = 30, $analytics = array("sessions", "bounceRate", "avgTimeOnPage", "pageViewsPerSession", "percentNewVisits", "pageViews", "avgPageLoadTime")) {

        foreach ($analytics as $serie) {
            for ($i = $day; $i > 1; $i--) {
                $method = $this->analytics[$serie]['method'];
                $this->analytics[$serie]['chart']['data'][] = $this->analyticsService->$method($this->viewId, ($i) . 'daysAgo', ($i - 1) . 'daysAgo');
            }
            file_put_contents($this->root . '/' . $day . 'day_' . $serie . '.array', serialize($this->analytics[$serie]['chart']));
        }

        return $this->analytics;
    }

    public function indexAction($day = 30, $analytics = array("sessions", "bounceRate", "avgTimeOnPage", "pageViewsPerSession", "percentNewVisits", "pageViews")) {

        $response = array();
        foreach ($analytics as $serie) {
            $chart = unserialize(file_get_contents($this->root . '/' . $day . 'day_' . $serie . '.array'));
            $this->analytics[$serie]['chart'] = $chart;
            $response[$serie] = $this->analytics[$serie];
        }

        return $response;
    }

}
