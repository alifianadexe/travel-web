<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller
{

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance = &$this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class) {
			$this->$var = &load_class($class);
		}

		$this->load = &load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

	public function loadSidebar($shownNav, $activedNav)
	{
		$showUser = null;
		$showProduct = null;
		$showCategory = null;
		$showOrder = null;
		$manageUserActive = null;
		$manageProductActive = null;
		$manageCategoryActive = null;
		$manageOrderActive = null;
		$manageCartActive = null;
		$addProductActive = null;
		$addCategoryActive = null;

		if ($shownNav == "show_user") {
			$showUser = "show";
		} elseif ($shownNav == "show_product") {
			$showProduct = "show";
		} elseif ($shownNav == "show_category") {
			$showCategory = "show";
		} elseif ($shownNav == "show_order") {
			$showOrder = "show";
		}

		if ($activedNav == "manage_user_active") {
			$manageUserActive = "active";
		}
		if ($activedNav == "manage_product_active") {
			$manageProductActive = "active";
		}
		if ($activedNav == "manage_category_active") {
			$manageCategoryActive = "active";
		}
		if ($activedNav == "manage_order_active") {
			$manageOrderActive = "active";
		}
		if ($activedNav == "manage_cart_active") {
			$manageCartActive = "active";
		}
		if ($activedNav == "add_product_active") {
			$addProductActive = "active";
		}
		if ($activedNav == "add_category_active") {
			$addCategoryActive = "active";
		}
		$this->load->view('layout/dashboard/sidebar', array(
			"show_user" => $showUser,
			"show_product" => $showProduct,
			"show_category" => $showCategory,
			"show_order" => $showOrder,
			"manage_user_active" => $manageUserActive,
			"manage_product_active" => $manageProductActive,
			"manage_category_active" => $manageCategoryActive,
			"manage_order_active" => $manageOrderActive,
			"manage_cart_active" => $manageCartActive,
			"add_product_active" => $addProductActive,
			"add_category_active" => $addCategoryActive
		));
	}

	public function loadUserSidebar($shownNav, $activedNav)
	{
		$showProfile = null;
		$showCartOrder = null;

		$changeDetailActive = null;
		$changePasswordActive = null;

		$yourCartActive = null;
		$yourOrderActive = null;

		if ($shownNav == "show_profile") {
			$showProfile = "show";
		} elseif ($shownNav == "show_cart_order") {
			$showCartOrder = "show";
		}

		if ($activedNav == "change_detail_active") {
			$changeDetailActive = "active";
		}
		if ($activedNav == "change_password_active") {
			$changePasswordActive = "active";
		}
		if ($activedNav == "your_cart_active") {
			$yourCartActive = "active";
		}
		if ($activedNav == "your_order_active") {
			$yourOrderActive = "active";
		}

		$this->load->view('layout/user/sidebar', array(
			"show_profile" => $showProfile,
			"show_cart_order" => $showCartOrder,
			"change_detail_active" => $changeDetailActive,
			"change_password_active" => $changePasswordActive,
			"your_cart_active" => $yourCartActive,
			"your_order_active" => $yourOrderActive
		));
	}
}
