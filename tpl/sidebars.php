<?php
$navbar instanceof GWF_Navbar;
if ($navbar->isLeft())
{
    $navbar->addField(GDO_Link::make('link_gallery')->href(href('Gallery', 'List')));
    
}
elseif ($navbar->isRight())
{
    $user = GWF_User::current();
    $navbar->addField(GDO_Link::make()->href(href('Gallery', 'List', '&user='.$user->getID())));
}