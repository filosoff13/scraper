<?php
require('simple_html_dom.php');
// Create DOM from URL
$html = file_get_html('https://www.townandcountrypropertyauctions.co.uk/auctions/');

preg_match('/<a href=\"http.*\">View Details<\/a>/', $html, $matches);
$title = $matches[0];
var_dump($title);

if ($html->find('PAST AUCTIONS', 0)) {
    preg_match('/<a href=\"http.*\">View Details<\/a>/', $html, $matches);
    $pages = $matches[0];
    var_dump($pages);
    //$title = $html->find('View Details', 0);
    foreach ($pages as $page) {
        $page = $html->find('Lots', 0);

        echo $page . "<br>\n";
        echo $page->href;
    }
}

//// creating an array of elements
//$pages = [];
//foreach ($html->find('View Details') as $page) {
//
//    if ($html->find('PAST AUCTIONS')) {
//
//        // Find item link element
//        $lotDetails = $page->find('Lots', 0);
//
//        // get title attribute
//        $lotTitle = $lotDetails->title;
//
//        // get href attribute
//        $lotUrl = $lotDetails->href;
//
//        // push to a list of pages
////        $pages[] = [
////            'title' => $lotTitle,
////            'url' => $lotUrl
////        ];
//        $pages[] = [
//            'title' => $page
//        ];
//    }
//}
//
//var_dump($pages);