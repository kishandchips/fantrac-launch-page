<?php if ( ! function_exists( 'get_top_level_category' )) {
	function get_top_level_category($id, $taxonomy = 'category'){
		$term = get_top_level($id, $taxonomy);
		$term_id = ($term) ? $term : $id;
		return get_term_by( 'id', $term_id, $taxonomy);
	}
}


if ( ! function_exists( 'get_top_level' )) {
	function get_top_level($id, $object){
		$terms = get_ancestors($id, $object);
		return (!empty($terms)) ? $terms[count($terms) - 1] : null;
	}
}

if ( ! function_exists( 'get_sub_category' )) {
	function get_sub_category($id){
		$sub_categories = get_categories( array('child_of' => $id, 'hierarchical' => false, 'orderby' => 'count'));
		foreach($sub_categories as $sub_category){
			if(has_category($sub_category->term_id)){
				$category = $sub_category;
			}
		}

		return (isset($category)) ? $category : null;
	}
}

if ( ! function_exists( 'get_the_adjacent_fukn_post' )) {
	function get_the_adjacent_fukn_post($adjacent, $post_type = 'post', $category = array(), $post_parent = 0){
		global $post;
		$args = array( 
			'post_type' => $post_type,
			'order' => 'ASC', 
			'posts_per_page' => -1,
			'category__in' => $category,
			'post_parent' => $post_parent
		);
		$curr_post = $post;
		$new_post = NULL;
		$custom_query = new WP_Query($args);
		$posts = $custom_query->get_posts();
		$total_posts = count($posts);
		$i = 0;
		foreach($posts as $a_post) {
			if($a_post->ID == $curr_post->ID){
				if($adjacent == 'next'){
					$new_i = ($i + 1 >= $total_posts) ? 0 : $i + 1; 
					$new_post = $posts[$new_i];	
				} else {
					$new_i = ($i - 1 < 0) ? $total_posts - 1 : $i - 1; 
					$new_post = $posts[$new_i];	
				}
				break;	
			}
			$i++;
		}
		
		return $new_post;
	}
}

if ( ! function_exists( 'get_latest_post' )) {
	function get_latest_post() {
		$posts = get_posts(array('posts_per_page' => 1));
		return $posts[0];
	}
}

if ( ! function_exists( 'get_current_url' )) {
	function get_current_url() {
		$url = 'http';
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') $url .= 's';
			$url .= '://';

		if ($_SERVER['SERVER_PORT'] != '80') {
			$url .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		} else {
			$url .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		}
		return $url;
	}
}

if ( ! function_exists( 'get_queried_page' )) {
	function get_queried_page($depth = 0){
		$curr_url = get_current_url();
		if($depth != -1) $curr_url = strtok($curr_url, '?');

		$curr_uri = str_replace(get_bloginfo('url'), '', $curr_url);
		
		if($depth){
			$curr_uri_ary = array_filter(explode('/', $curr_uri));
			$curr_uri = trailingslashit(implode('/', array_splice($curr_uri_ary, 0, $depth)));
		}
		
		$page = get_page_by_path($curr_uri);
		if($page) return $page;
		return null;
	}
}

add_action("gform_field_standard_settings", "custom_gform_standard_settings", 10, 2);
function custom_gform_standard_settings($position, $form_id){
    if($position == 25){
    	?>
        <li style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text</label>
            <input type="text" id="field_placeholder" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php
    }
}

add_action('gform_enqueue_scripts',"custom_gform_enqueue_scripts", 10, 2);
function custom_gform_enqueue_scripts($form, $is_ajax=false){
    ?>
<script>
    jQuery(function(){
        <?php
        foreach($form['fields'] as $i=>$field){
            if(isset($field['placeholder']) && !empty($field['placeholder'])){
                ?>
                jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');
                <?php
            }
        }
        ?>
    });
    </script>
    <?php
}

add_filter("gform_validation_message", "change_message", 10, 2);
function change_message($message, $form){
  return "<div class='validation_error'><span class='icon-error'></span> There was a problem with your submission. Errors have been highlighted below.</div>";
}
