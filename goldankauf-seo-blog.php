<?php
/*
Plugin Name: Goldankauf SEO Blog
Description: SEO Landingpages für Goldankauf Städte
Version: 1.0
Author: Gold und Silber Haus
*/

function goldankauf_register_pages() {

    $pages = [
        "goldankauf-recklinghausen" => "Goldankauf Recklinghausen",
        "goldankauf-kamen" => "Goldankauf Kamen",
        "zahngold-verkaufen-recklinghausen" => "Zahngold verkaufen Recklinghausen"
    ];

    foreach ($pages as $slug => $title) {

        if(!get_page_by_path($slug)){

            wp_insert_post([
                'post_title' => $title,
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => goldankauf_generate_content($title)
            ]);

        }
    }
}

register_activation_hook(__FILE__, 'goldankauf_register_pages');

function goldankauf_generate_content($title){

$content = "
<h1>$title</h1>

<p>Sie möchten Gold verkaufen? Beim Gold und Silber Haus erhalten Sie eine professionelle Bewertung und faire Preise für Ihr Edelmetall.</p>

<h2>Welche Edelmetalle kaufen wir?</h2>

<ul>
<li>Goldschmuck</li>
<li>Zahngold</li>
<li>Goldmünzen</li>
<li>Silberbesteck</li>
<li>Altgold</li>
</ul>

<h2>So funktioniert der Ankauf</h2>

<ol>
<li>Gold vorbeibringen</li>
<li>Bewertung vor Ort</li>
<li>Sofortige Auszahlung</li>
</ol>

<h2>Standort</h2>

<p>Gold und Silber Haus<br>
Sachsenstraße 170<br>
45665 Recklinghausen</p>

";

return $content;

}
?>
