<?php
$image instanceof GWF_GalleryImage;
$user = GWF_User::current();
?>
<md-card class="gwf-gallery-image">
  <md-card-title>
    <md-card-title-text>
      <span class="md-headline">
        <div>“<?= htmle($image->getDescription()); ?>”</div>
        <div class="gwf-card-date"><?= $image->displayDate(); ?></div>
      </span>
    </md-card-title-text>
  </md-card-title>
  <gwf-div></gwf-div>
  <md-card-content flex>
    <img src="<?= $image->href_show(); ?>" />
  </md-card-content>
</md-card>
