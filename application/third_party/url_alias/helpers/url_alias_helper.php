<?php

function url_alias()
{
    $CI = null;
    url_alias_init(&$CI);
}

function url_alias_update()
{
    $CI = null;
    url_alias_init(&$CI);
}

function url_alias_insert()
{
    $CI = null;
    url_alias_init(&$CI);
}

function url_alias_delete()
{
    $CI = null;
    url_alias_init(&$CI);
}

function url_alias_init(&$CI)
{
    $CI = get_instance();
    $CI->load->library('url_alias');
}