<?php
final class Gallery_Crud extends GWF_MethodCrud
{
    public function hrefList()
    {
        return href('Gallery', 'List');
    }

    public function gdoTable()
    {
        return GWF_Gallery::table();
        
    }

    /**
     * @return GWF_Gallery
     */
    public function getGallery()
    {
        return $this->gdo;
    }
    
    public function createFormButtons(GWF_Form $form)
    {
        $field = GDO_File::make('images')->imageFile()->maxfiles(100)->minfiles(1);
        if ($this->crudMode === self::EDITED)
        {
            $files = [];
            $images = $this->getGallery()->getImages();
            foreach ($images as $image)
            {
                $image instanceof GWF_GalleryImage;
                $file = $image->getFile();
                $file->tempHref($image->href_show());
                $files[] = $file;
            }
            $field->setGDOValue($files);
        }
        $form->addFields(array(
            $field,
        ));
        parent::createFormButtons($form);
    }
    
    public function afterCreate(GWF_Form $form)
    {
        $images = $form->getVar('images');
        foreach ($images as $image)
        {
            GWF_GalleryImage::blank(array(
                'image_file' => $image->getID(),
                'image_gallery' => $this->gdo->getID(),
                'image_description' => null,
            ))->replace();
        }
    }
    
}
