<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
  
  <?php $slides = ''; ?>
  
  <?php foreach ($view->result as $id => $row): 
    
    //dpm($row); 
    
    $img_full['path'] = file_create_url($row->field_field_hero_image_full[0]['rendered']['#item']['uri']);
    $img_full['attributes'] = array('class' => 'full');
    
    $img_mobile['path'] = file_create_url($row->field_field_hero_image_mobile[0]['rendered']['#item']['uri']);
    $img_mobile['attributes'] = array('class' => 'mobile');
    
    if(!empty($row->field_field_call_to_action)){
      $cta = '<div class="btn">' . $row->field_field_call_to_action . '</div>';
    }
  
    $slides .= '<li class="slide">';
        $slides .= '<div class="hero-img">';
          $slides .= theme_image($img_full);
          $slides .= theme_image($img_mobile);
        $slides .= '</div>';
        $slides .= '<div class="hero-text">';
          $slides .= $row->field_body[0]['raw']['safe_value'];
          $slides .= (!empty($cta) ? $cta : '');
        $slides .= '</div>';
    $slides .= '</li>';
  
  endforeach; ?>
  
  
<div id="home-slider">
  <ul id="home-slides">  
    <?php print $slides; ?>
  </ul>
</div>

<?php 
  $flexslider = drupal_get_path('theme','gambit') . '/js/jquery.flexslider-min.js';
  $slideshow_js = drupal_get_path('theme','gambit') . '/js/slideshow.js';
  drupal_add_js($flexslider, 'file');
  drupal_add_js($slideshow_js, 'file');
?>