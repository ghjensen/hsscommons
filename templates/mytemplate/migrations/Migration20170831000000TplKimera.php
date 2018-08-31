<?php

use Hubzero\Content\Migration\Base;

// No direct access
defined('_HZEXEC_') or die();

/**
 * Migration script for adding entry for Template - Mytemplate plugin
 **/
class Migration20170831000000TplMytemplate extends Base
{
	/**
	 * Up
	 **/
	public function up()
	{
		$this->addTemplateEntry('mytemplate', 'mytemplate', 0, 1, 1, null, 1);
	}

	/**
	 * Down
	 **/
	public function down()
	{
		$this->deleteTemplateEntry('mytemplate', 0);
	}
}
