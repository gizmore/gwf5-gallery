<?php
final class GWF_Gallery extends GDO
{
    public function gdoColumns()
    {
        return array(
            GDO_AutoInc::make('gallery_id'),
            GDO_String::make('gallery_title'),
            GDO_Message::make('gallery_description'),
            GDO_CreatedBy::make('gallery_creator'),
            GDO_CreatedAt::make('gallery_created'),
        );
    }
    
    public function canEdit(GWF_User $user) { return $this->getCreatorID() === $user->getID(); }
    

    /**
     * @return GWF_User
     */
    public function getCreator() { return $this->getValue('gallery_creator'); }
    public function getCreatorID() { return $this->getVar('gallery_creator'); }
    public function getCreated() { return $this->getVar('gallery_created'); }
    
    public function getTitle() { return $this->getVar('gallery_title'); }
    public function getMessage() { return $this->getVar('gallery_description'); }
    public function displayDate() { return tt($this->getCreated()); }
    public function displayDescription() { return $this->gdoColumn('gallery_description')->renderCell(); }
    
    public function href_show() { return href('Gallery', 'Show', "&id={$this->getID()}"); }
    
    public function renderList() { return GWF_Template::modulePHP('Gallery', 'listitem/gallery.php', ['gallery'=>$this]); }
    
    public function getImages()
    {
        return $this->queryImages();
    }
    
    public function queryImages()
    {
        return GWF_GalleryImage::table()->select()->where("image_gallery={$this->getID()}")->exec()->fetchAllObjects();
    }
    
    public function getImageCount()
    {
        return $this->queryImageCount();
    }
    
    public function queryImageCount()
    {
        return GWF_GalleryImage::table()->countWhere("image_gallery={$this->getID()}");
    }
    
}
