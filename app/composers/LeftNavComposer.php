<?php

class LeftNavComposer {

    /**
     * Show the left nav sidbar of the admin panel.
     * 
     * @param  View $view 
     * @return View       
     */
    public function compose($view)
    {
        $currentRouteAction = Route::currentRouteAction();
        list($currentController, $currentAction) = explode('@', $currentRouteAction);

        $view->with('currentRouteAction', $currentRouteAction);
        $view->with('currentController', $currentController);
        $view->with('currentAction', $currentAction);
    }

}