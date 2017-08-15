<?php
final class Gallery_List extends GWF_MethodQueryList
{
    public function gdoTable()
    {
        return GWF_Gallery::table();
    }

    public function gdoQuery()
    {
        $query = $this->gdoTable()->select();
        if ($userId = Common::getGetInt('user'))
        {
            $query->where('gallery_creator='.$userId);
        }
        return $query;
    }
    
    
}
