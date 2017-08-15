<?php
final class Gallery_Show extends GWF_Method
{
    public function execute()
    {
        $gallery = GWF_Gallery::findById(Common::getGetString('id'));
        return $this->templatePHP('gallery.php', ['gallery' => $gallery]);
    }
    
}
