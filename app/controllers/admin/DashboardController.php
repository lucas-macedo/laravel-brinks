<?php
namespace Admin;
use BaseController;

class DashboardController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */


	protected function getIndex()
	{
		return "ee";
	}


}
