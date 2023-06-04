<?php

/**
 * Joomla OPSS 2023 Evaluation Task.
 * 
 * php version 8.1.0
 * 
 * @package    Joomla.Site
 * @subpackage mod_cat_articles
 * 
 * @license GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use CatArticlesNamespace\Module\CatArticles\Site\Helper\CatArticlesHelper;

// add the CatArticlesHelper.php file using a relative path
require_once dirname(__FILE__) . '/Helper/CatArticlesHelper.php';

$category = $params->get('catid');

$articles = CatArticlesHelper::getArticles($category);

require ModuleHelper::getLayoutPath('mod_cat_articles', $params->get('layout', 'default'));
