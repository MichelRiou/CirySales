<?php

namespace controller;

abstract class  Controller {

    protected function getViewContent($view, array $params = [], $template = null) {
        extract($params);
        ob_start();
        require ("view/$view.php");
        $content = ob_get_clean();
        if ($template != null) {
            require ("view/$template.php");
        } else {
            echo $content;
        }
    }

}
