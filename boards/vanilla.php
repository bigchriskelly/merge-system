<?php
/**
 * MyBB 1.8 Merge System
 * Copyright 2014 MyBB Group, All Rights Reserved
 *
 * Website: http://www.mybb.com
 * License: http://www.mybb.com/download/merge-system/license/
 */

// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

class VANILLA_Converter extends Converter
{

	/**
	 * String of the bulletin board name
	 *
	 * @var string
	 */
	var $bbname = "Vanilla 2";

	/**
	 * String of the plain bulletin board name
	 *
	 * @var string
	 */
	var $plain_bbname = "Vanilla 2";

	/**
	 * Whether or not this module requires the loginconvert.php plugin
	 *
	 * @var boolean
	 */
	var $requires_loginconvert = true;

	/**
	 * Array of all of the modules
	 *
	 * @var array
	 */
	var $modules = array("db_configuration" => array("name" => "Database Configuration", "dependencies" => ""),
						 "import_usergroups" => array("name" => "Usergroups", "dependencies" => "db_configuration"),
						 "import_users" => array("name" => "Users", "dependencies" => "db_configuration,import_usergroups"),
						 "import_forums" => array("name" => "Forums", "dependencies" => "db_configuration,import_users"),
						 "import_threads" => array("name" => "Threads", "dependencies" => "db_configuration,import_forums"),
						 "import_posts" => array("name" => "Posts", "dependencies" => "db_configuration,import_threads"),
						 "import_privatemessages" => array("name" => "Private Messages", "dependencies" => "db_configuration,import_users"),
						 "import_avatars" => array("name" => "Avatars", "dependencies" => "db_configuration,import_users"),
						);

	/**
	 * The table we check to verify it's "our" database
	 *
	 * @var String
	 */
	var $check_table = "regarding";

	/**
	 * The table prefix we suggest to use
	 *
	 * @var String
	 */
	var $prefix_suggestion = "gdn_";
	
	/**
	 * An array of vanilla -> mybb groups
	 * 
	 * @var array
	 */
	var $groups = array(
		2 => MYBB_GUESTS, // Guests
		3 => MYBB_AWAITING, // Unconfirmed
		4 => MYBB_AWAITING, // Applicant
		8 => MYBB_REGISTERED, // Member
		16 => MYBB_ADMINS, // Administrators
		32 => MYBB_MODS, // Moderator
	);

	/**
	 * What BBCode Parser we're using
	 *
	 * @var String
	 */
	var $parser_class = "html";

	/**
	 * An array of supported databases
	 * Vanilla only supports MySQL
	 */
	var $supported_databases = array("mysql");
}

