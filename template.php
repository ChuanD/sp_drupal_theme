<?php
/*
 * Funkce motivu sveta pribehu
 * aneb
 * co bylo potreba overridnout...
 * TODO OBSAH
*/
function pribehovymotiv_preprocess_comment(&$variables)
{
    /*nutne deklarace*/
    $comment = $variables['elements']['#comment'];
    /*
     * Úprava komentářových dat pro zobrazení – u needitovaných komentářů nezobrazujeme informaci o editaci
     * bohužel created / changed se často liší o pár sekund, takže je potřeba počítat s jistou hysterezí...
     * */
    if (($comment->changed) - ($comment->created) < 10) {
        $variables['changed'] = '';
        //TODO jak moc velká prasárna je, když tu není nic? Changed se zobrazí, ale prázdný...
    } else {
        $variables['changed'] = t('Edited') . " " . format_date($comment->changed);
    }

    /*zamezime zobrazeni odkazu, ktere nechceme*/
    unset($variables['content']['links']['comment']['#links']['comment-reply']);
    unset($variables['links']['comment']['#links']['comment_forbidden']);


    $variables['user_picture'] = '';
    $UzivatelskaIkona = '';
    $UzivatelskaIkonaURL = '';
    // dpm($comment);
    if (!empty($comment->uid)) {
        $profiledata = profile2_by_uid_load($comment->uid, 'main');
        if ($profiledata) {
            //vytahne z rozsireneho profilu uzivatelskou ikonu a zobrazi ji
            $UzivatelskaIkona = field_get_items('profile2', $profiledata, 'field_profil_ikonka');
            if (!is_array($UzivatelskaIkona)) {
                //uzivatel nema ikonu, potrebujeme implicitni!
                $info = field_info_field('field_profil_ikonka');
                $default_icon = file_load($info["settings"]["default_image"])->uri;
                $UzivatelskaIkonaURL = image_style_url("ikona", $default_icon);
            } else {
                //zobrazit uzivatelovu ikonu
                $UzivatelskaIkonaURL = image_style_url("ikona", $UzivatelskaIkona[0]['uri']);
            }
            $variables['user_picture'] = '<img src=' . $UzivatelskaIkonaURL . '>';
        }
    }
}

function pribehovymotiv_form_comment_form_alter(&$form, &$form_state, $form_id)
{
    // dpm($form);
    $namelabel = t('Name:');

    if (isset($form['author']['_author'])) {
        $form['author']['_author']['#title'] = $namelabel;
    } else {
        $form['author']['name']['#title'] = $namelabel;
    }


    $commentlabel = t('Comment:');
    $form['comment_body']['und'][0]['#title'] = $commentlabel;
}

function pribehovymotiv_preprocess_views_view(&$variables)
{
    unset($variables['links']['comment']['#links']['comment_forbidden']);
}

function pribehovymotiv_comment_view_alter(&$build)
{
    /*zamezi zobrazeni odkazu prihlasit se a registrovat pro anonymni uzivatele*/
    unset($build['links']['comment']['#links']['comment_forbidden']);
}

/*
* Override filter.module's theme_filter_tips() function to disable tips display.
 * zamezuje zobrazeni tipu k formatum textu...
*/
function pribehovymotiv_filter_tips($tips, $long = FALSE, $extra = '')
{
    return '';
}

function pribehovymotiv_filter_tips_more_info()
{
    return '';
}
?>