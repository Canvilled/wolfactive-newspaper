<?php
echo '<ul id="crumbs">';
if (!is_home()) {
echo '<li class="breadcumb-item-home"><a href="';
echo get_option('home');
echo '">';
echo 'Trang chủ';
echo "</a></li>";
 if (is_category() || is_single()) {
        if(is_category())
        {
          $this_category = get_category(get_query_var( 'cat' ));
          $categories = get_the_category();
          if ($this_category->category_parent == 0) {
            $category_link = get_category_link($this_category);
            ?>
            <li class="breadcumb-item">
              <i class='fas fa-angle-right'></i> <a href="<?php echo $category_link; ?>"><?php single_cat_title(); ?></a>
            </li>
            <?php
          }
          else if($this_category->category_parent != 0) {
            foreach ($categories as $cat) {
              $id=$cat->cat_ID;
              $category_link = get_category_link($id);
              ?>
              <li class="breadcumb-item">
                <?php echo ' <i class="fas fa-angle-right"></i> '; echo '<a href="'.$category_link.'">'.$cat->name.'</a></li>'; ?>
              </li>
              <?php
            }
          }
        }
        if (is_single()) {
                echo "</li><span>›</span><li>";
                the_title();
                echo '</li>';
        }
} elseif (is_page()) {
        echo '<span>›</span><li>';
        echo the_title();
        echo '</li>';
}
}
elseif (is_tag()) {single_tag_title();}
elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
echo '</ul>';
