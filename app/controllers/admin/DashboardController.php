<?php
namespace Admin;
use Auth;
use BaseController;

class DashboardController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */


	public function getIndex() { dd(Auth::user()->get()); }
	public function getOla() { return "ola"; }

}
