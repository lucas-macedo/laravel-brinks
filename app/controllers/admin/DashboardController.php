<?php
namespace Admin;
use BaseController;

class DashboardController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */


	public function getIndex() { return "ee"; }
	public function getOla() { return "ola"; }

}
