<?php

/**
 * Joomla OPSS 2023 Evaluation Task.
 *
 * This helper file is responsible for retrieving 
 * the last three articles of a specific category
 * in Joomla!
 * 
 * php version 8.1.0
 * 
 * @package    Joomla.Site
 * @subpackage mod_cat_articles
 * 
 * @license GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace CatArticlesNamespace\Module\CatArticles\Site\Helper;

use Joomla\CMS\Factory;

// add so that this PHP file is not directly callable
\defined('_JEXEC') or die;

/**
 * Helper for mod_articles_category
 */
class CatArticlesHelper
{
    /**
     * Get the last three Articles from a specific category
     *
     * @param int $categoryId holds the category parameter
     * 
     * @return mixed
     */
    public static function getArticles($categoryId)
    {
        $db = Factory::getDbo();
        $query = $db->getQuery(true)
            ->select('a.id, a.title')
            ->from('#__content AS a')
            ->join('LEFT', '#__categories AS c ON c.id = a.catid')
            ->where('c.id = ' . (int)$categoryId)
            ->where('a.state = 1')
            ->order('a.created DESC')
            ->setLimit(3);
        $db->setQuery($query);

        return $db->loadObjectList();
    }
}
