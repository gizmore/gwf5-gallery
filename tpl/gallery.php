<?php $gallery instanceof GWF_Gallery; ?>
<?php 
$button = GDO_Button::make()->icon('add')->href(href('Gallery', 'Crud', "&id={$gallery->getID()}"));
$bar = GDO_Bar::make();
$bar->addField($button);
echo $bar->renderCell();

$images = GWF_GalleryImage::table();
$query = $images->select('*')->where("image_gallery={$gallery->getID()}");
$list = GDO_List::make();
$list->paginate();
$list->query($query);
echo $list->renderCell();
