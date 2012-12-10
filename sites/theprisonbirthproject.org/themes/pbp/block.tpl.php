<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block <?php print $block_classes; ?>"><div class="block-inner">

<!--These are the opening tags for the black/green rounded corner scheme-->
   <div id="roundedbox-inner">
      <div id="top-inner">
         <div id="topleft-inner">&nbsp;</div>
         <div id="topright-inner">&nbsp;</div>
      </div>
      <div id="boxcontent-inner">
  <?php if ($block->subject): ?>
    <h2 class="title"><?php print $block->subject; ?></h2>
  <?php endif; ?>

  <div class="content">
    <?php print $block->content; ?>
  </div>

  <?php print $edit_links; ?>


  <!--    These are the closing tags for the black/green rounded corners scheme-->
    </div>
      <div id="bottom-inner">
         <div id="bottomleft-inner">&nbsp;</div>
         <div id="bottomright-inner">&nbsp;</div>
      </div>
   </div>

</div></div> <!-- /block-inner, /block -->
