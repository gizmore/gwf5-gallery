<?php
final class Module_Gallery extends GWF_Module
{
    public function getClasses() { return ['GWF_Gallery', 'GWF_GalleryImage']; }
    public function onLoadLanguage() { $this->loadLanguage('lang/gallery'); }

    public function onRenderFor(GWF_Navbar $navbar)
    {
        $this->templatePHP('sidebars.php', ['navbar'=>$navbar]);
      
    }
}
