<?php
get_header();
$cat_id = get_query_var('cat');
$term = get_category($cat_id);
$type_display = get_field('type_display',$term);
?>
 <section class="wrapper" id="PostCategory">
   <?php switch ($type_display) {
     case 1:
       get_template_part('page-templates/category-type-1');
       break;
    case 2:
         get_template_part('page-templates/category-type-2');
       break;
    case 3:
         get_template_part('page-templates/category-type-3');
      break;
     default:
       break;
   } ?>
 </section>
<?php
get_footer();
?>
