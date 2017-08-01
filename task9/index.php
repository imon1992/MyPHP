<?php

include ('libs/HtmlHelper.php');

$select = HtmlHelper::select('sumeName', 3, ['Sum tenx','Mere text', 'else more text'],2);

$ulOl = HtmlHelper::ulOl('ol',3,['first','second','last']);

$table =  HtmlHelper::table('Obuv',2,2,[['12',12],[34,45]]);

include ('templates/index.php');
