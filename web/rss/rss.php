<?php

include("feedcreator.class.php");

$rss = new UniversalFeedCreator();

//10 min cache, does not seem to work 
$rss->useCached("feed.xml", 600);
$rss->title = "Börstjänaren RSS-feed";
$rss->description = "";
$rss->link = "https://" . $_SERVER['HTTP_HOST'];
$rss->syndicationURL = "https://" . $_SERVER['HTTP_HOST'] . "/rss/rss.php";



// get your news items from somewhere, e.g. your database:

require_once(dirname(__FILE__) . '/../../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
sfContext::createInstance($configuration);

$databaseManager = new sfDatabaseManager($configuration);
$databaseManager->loadConfiguration();


$q = Doctrine_Query::create()->from('Article a')->where('a.art_statID <> ? and a.article_date <= ? ', array(2,date('Y-m-d H:i:s')))->addOrderBy('a.article_date desc')->limit(25)->offset(0);

$articles = $q->execute();

foreach ($articles as $data) {
    $item = new FeedItem();
    $item->title = $data->getTitle();

    $url = "https://" . $_SERVER['HTTP_HOST'] . "/borst/borstArticleDetails/article_id/" . $data->getArticleId();

    $item->link = $url;

    $item->source = "https://" . $_SERVER['HTTP_HOST'];
    $rss->addItem($item);
}

$rss->saveFeed("RSS1.0", "feed.xml");
?>
