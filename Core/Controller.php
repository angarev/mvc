<?php

namespace Core;

/**
 *
 * Base Controller;
 *
 */

 abstract class Controller
 {
     /**
     * Parameters from the matched route
     *
     * @var array
     */
     protected $route_params = [];

     /**
      * Class counstructor
      *
      * @param array $route_params Parameters from the route
      * @return void
      */
     public function __construct($route_params)
     {
         $this->route_params = $route_params;
     }

     /**
      * Call method
      *
      * @param [type] $name
      * @param array $args Arguments passed to the method.
      * @return void
      */
     public function __call($name, $args)
     {
         $method = $name . 'Action';

         if (method_exists($this, $method)) {
             if ($this->before() !== false) {
                 call_user_func_array([$this,$method], $args);
                 $this->after();
             } else {
                 throw new \Exception("Method $method noy found in controller " . get_class($this));
             }
         }
     }

     /**
      * Before filter - called before an action method.
      *
      * @return void
      */
     protected function before()
     {
         # code...
     }

     /**
      * After filter - called after an action method.
      *
      * @return void
      */
     protected function after()
     {
         # code...
     }
 }
