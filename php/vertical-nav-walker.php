<?php
	class Vertical_Nav_Walker extends Walker_Nav_Menu  {
		
		private $menu_lvl=1;
		private $hasActiveChild = false;
		
		function start_lvl(&$output, $depth=0, $args=array()) {
			
			if($this->hasActiveChild) {
			   $output .= '<ul id="sub-list-'.$this->menu_lvl.'" class="nav nav-list collapse in">';			
			}
			else {
				$output .= '<ul id="sub-list-'.$this->menu_lvl.'" class="nav nav-list collapse">';	
			}
			
			$this->menu_lvl++;
		}
		
		function end_lvl(&$output, $depth=0, $args=array()) {
			$output .= '</ul>';
		}
		
		function start_el(&$output, $item, $depth=0, $args=array()) {
			
			$classes = '';
			$content = '';
			
			if ( $this->is_active($item) ){
				$classes = $this->addClass($classes,'active');
    		}
			
			if($item->hasChildren) {
				$classes = $this->addClass($classes, 'parent');
				
				$content .= '<a tile="Expand '.$item->title.'" data-toggle="collapse" href="#sub-list-'
				.$this->menu_lvl.'" data-parent="#'
				.$args->container_id.'">'
				.'<span class="placeholder glyphicon glyphicon-chevron-down"></span></a>'
				.'<a href="'.$item->url.'"><span class="title">'.$item->title.'</span></a>';
			}	
			else {
				if($depth > 0) {
					$content .= '<a href="'.$item->url.'"><span class="placeholder glyphicon glyphicon-chevron-right">&nbsp;</span><span class="title">'.$item->title.'</span></a>';
				}
				else {
					$content .= '<a href="'.$item->url.'"><span class="placeholder">&nbsp;</span><span class="title">'.$item->title.'</span></a>';
				}
			}
			
			$output .= '<li class="'.
				$classes.'">'.
				$content;
		}
		
		function end_el(&$output, $item, $depth=0, $args=array()) {
		  
		    $output .= '</li>';
		}
		
		// Only follow down one branch
		function display_element( $item, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
 			
			// check whether this item has children, and set $item->hasChildren accordingly 
            $item->hasChildren = isset($children_elements[$item->ID]) && !empty($children_elements[$item->ID]);
			$this->hasActiveChild = false;
			
			if($item->hasChildren) {
				foreach($children_elements[$item->ID] as $child) {
					if($this->is_active($child)) {
						$this->hasActiveChild = true;
						break;
					}
				}
			}
    		parent::display_element( $item, $children_elements, $max_depth, $depth, $args, $output );
		}
		
		function is_active($item){
			
			global $wp_query;
			
			$current_url = get_permalink($wp_query->post->ID);
			
			if( $current_url == $item->url) {
				return true;
			}
			
			return false;
		}  
		
		function addClass($classes, $addition) {
			if(strlen($classes) == 0) {
				return $addition;
			}
			
			return $classes.' '.$addition;
		}    
	}
?>