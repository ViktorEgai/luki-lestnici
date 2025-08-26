<? 
$args = [
	'taxonomy'      => [ 'product_cat' ], 	
	'parent'         => 0,
	
];

$categories = get_terms( $args );


 ?>
<div class="catalog-menu">
  <div class="catalog-menu-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
            
          <div class="catalog-menu-categories">
            
            <div class="catalog-menu-categories-nav">
              <? 
              $data_index = 0;
              foreach( $categories as $term ){
                echo '<button class="catalog-menu-categories-nav__item" data-index="'. $data_index .'">'. $term -> name .'</button>';
                $data_index++;
              }
              ?>              
             
            </div>
            <? 
              foreach( $categories as $term ){
                $child_args = [
                  'taxonomy'      => [ 'product_cat' ],  
                  'parent'        =>  $term -> term_id,
                  
                ];
                $child_categories = get_terms( $child_args );
                ?>
                <ul class="catalog-menu-categories-list">
                  <? 
                  $data_index = 0;
                  foreach( $child_categories as $term ){
                    echo '<li data-index="'. $data_index .'" class="catalog-menu-categories-list__item '. $term -> slug .'">
                    '. $term -> name .'
                     <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M1 8.49937H8.89189M8.89189 8.49937L5 4.44531M8.89189 8.49937L5 12.5534"
                        stroke="#909CB5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </li>';
                    $data_index++;
                  }
                  ?>
                  
                </ul>
              <? } ?>  
          </div>
        </div>
        <div class="col-lg-9">
          <? 
          foreach( $categories as $term ){ ?>
            <div class="catalog-menu-body">
              <? 
              $child_args = [
                  'taxonomy'      => [ 'product_cat' ],  
                  'parent'        =>  $term -> term_id,
                  
                ];
                $child_categories = get_terms( $child_args );
                foreach( $child_categories as $term ){

                  $ter_child_args = [
                    'taxonomy'      => [ 'product_cat' ],  
                    'parent'        =>  $term -> term_id,
                    
                  ];
                  $ter_child_categories = get_terms( $ter_child_args );
                
                ?>
                <div class="catalog-menu-category-item">
                  <? if (  !empty( $ter_child_categories ) ) : ?>
                    <div class="catalog-menu-category-item-nav">
                      <? $data_index = 0;
                        
                      foreach ($ter_child_categories as $term) { 
                        echo '<button class="catalog-menu-category-item-nav__item" data-index="'.$data_index.'">'. $term -> name.'</button>';
                      $data_index++;    
                    } ?>
                      
                      
                    </div>
                    <div class="catalog-menu-category-item-body">
                      <?
                      foreach ($ter_child_categories as $term) {  ?>
                        <ul class="catalog-menu-category-item-list row">
                          <? 
                          // параметры по умолчанию
                          $products = get_posts( array(
                            'numberposts' => -1,                          
                            'post_type'   => 'product',
                            'suppress_filters' => true, 
                            'tax_query' => array(
                              array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => $term -> slug
                              )
                            )
                          ) );

                          global $post;

                          foreach( $products as $post ){
                            setup_postdata( $post );?>
                          <li class="catalog-menu-category-item-list__item col-lg-4 mb-3 col-sm-6">
                            <a href="<? the_permalink() ?>">
                              <?= woocommerce_get_product_thumbnail( ); ?>
                              <span><? the_title() ?></span>
                            </a>
                          </li>

                          <? }

                          wp_reset_postdata(); // сброс
                          ?>
                          
                          
                        </ul>
                    <? } ?>
                    
                    
                    </div>
                  <? else : ?>
                    <div class="catalog-menu-category-item-body">
                      <p class="catalog-menu-category-item-nav__item mb-3 "><?= $term -> name ?></p>
                      <ul class="catalog-menu-category-item-list row">
                        <? 
                        // параметры по умолчанию
                        $products = get_posts( array(
                          'numberposts' => -1,                          
                          'post_type'   => 'product',
                          'suppress_filters' => true, 
                          'tax_query' => array(
                            array(
                              'taxonomy' => 'product_cat',
                              'field'    => 'slug',
                              'terms'    => $term -> slug
                            )
                          )
                        ) );

                        global $post;

                        foreach( $products as $post ){
                          setup_postdata( $post );?>
                        <li class="catalog-menu-category-item-list__item col-lg-4 mb-3 col-sm-6">
                          <a href="<? the_permalink() ?>">
                            <?= woocommerce_get_product_thumbnail( ); ?>
                            <span><? the_title() ?></span>
                          </a>
                        </li>

                        <? }

                        wp_reset_postdata(); // сброс
                        ?>
                        
                        
                      </ul>
                   
                   
                   
                  </div>
                  <? endif ?>
                </div>
              <? } ?>  
             
            </div>
          <? } ?>              
         
        </div>
      </div>
    </div>
  </div>
</div>