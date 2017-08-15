<?php
final class Gallery_Image extends GWF_Method
{
    public function execute()
    {
        $image = GWF_GalleryImage::getById(Common::getGetString('id'));
        return $this->renderImage($image, method('GWF', 'GetFile'));
    }
    
    private function renderImage(GWF_GalleryImage $image, GWF_GetFile $method)
    {
        return $method->executeWithId($image->getFile()->getID());
    }
}