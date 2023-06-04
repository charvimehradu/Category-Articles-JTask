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
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Table\Table;

foreach ($articles as $article) {
    //Load the full article
    $fullArticle = Table::getInstance('Content');
    $fullArticle->load($article->id);

    //Get the author
    if ($fullArticle->created_by_alias) {
        $author = $fullArticle->created_by_alias;
    } else {
        $author = Factory::getUser($fullArticle->created_by)->name;
    }

    //Format the published date
    $publishedDate = HTMLHelper::_('date', $fullArticle->publishedDate, Text::_('DATE_FORMAT_LC3'));
    
    echo '<h3><a href="' . Route::_(ContentHelperRoute::getArticleRoute($article->id)) . '">' . $article->title . '</a></h3>';
    echo '<p>Author: ' . $author . '</p>';
    echo '<p>Published Date: ' . $publishedDate . '</p>';
    echo '<p>' . $fullArticle->introtext . '</p>';
}
