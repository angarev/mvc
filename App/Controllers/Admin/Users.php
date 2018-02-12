<?php

namespace App\Controllers\Admin;

/**
 * User admin controller
 */
class Users extends \Core\Controller
{
    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        echo "(before )";//Make sure that admin user is logged in.
        //return false;
    }


    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        echo "User admin index";
    }
}
