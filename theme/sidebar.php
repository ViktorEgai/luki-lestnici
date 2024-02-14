
<div class="catalog-sidebar">
  <? 
  $args = [
    'taxonomy'      => [ 'product_cat' ], 	
    'parent'         => 0,
    
  ];

  $categories = get_terms( $args ); 
  
  foreach($categories as $term) {?>

  <div class="catalog-sidebar-block">
    <h3 class="catalog-sidebar-block__title"><?= $term -> name ?></h3>
    <ul class="catalog-sidebar-list">
      <? 
      $child_args = [
        'taxonomy'      => [ 'product_cat' ], 	
        'parent'         => $term -> term_id,
        
      ];

      $child_categories = get_terms( $child_args ); 

      foreach ($child_categories as $term) {?>
        <li class="catalog-sidebar-list__item">
          <a href="<?= get_term_link( $term) ?>"
            ><?= $term -> name ?>
            <span class="arrow">
              <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                  stroke="#909CB5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </a>
          <ul class="catalog-sidebar-sublist">
            <li class="catalog-sidebar-sublist__item">

            <? 
            $ter_child_args = [
              'taxonomy'      => [ 'product_cat' ], 	
              'parent'         => $term -> term_id,
              
            ];

            $ter_child_categories = get_terms( $ter_child_args ); 
            
            foreach( $ter_child_categories as $term ) {?>
              <h4 class="catalog-sidebar-sublist__item-title"><?= $term -> name ?>:</h4>

               <?                 // параметры по умолчанию
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
                  <a href="<? the_permalink() ?>"><? the_title() ?></a>

                <? }

                wp_reset_postdata(); // сброс
                ?>
                        
              
            <? } ?>
            </li>            
          </ul>
        </li>
      <? } ?>
    
      <!-- <li class="catalog-sidebar-list__item">
        <a href="#"
          >Полд покраску
          <span class="arrow">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                stroke="#909CB5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </a>
        <ul class="catalog-sidebar-sublist">
          <li class="catalog-sidebar-sublist__item">
            <h4 class="catalog-sidebar-sublist__item-title">Люки с амортизаторами:</h4>

            <a href="#">Люк  напольный «ЮПИТЕР»</a>

            <a href="#">Люк напольный «ЮПИТЕР» лайт</a>

            <a href="#">Люк напольный «МАРС» угол</a>

            <a href="#">Люк напольный «МАРС» короб </a>

            <a href="#">Люк напольный «ТОПАЗ» сталь</a>

            <a href="#">Люк напольный «ТОПАЗ» короб</a>

            <a href="#">Люк напольный «ТОПАЗ» риф</a>

            <a href="#">Люк напольный «ТОПАЗ» эконом</a>

            <a href="#">Люк уличный тротуарный «ТОУЭР»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки с электроприводом:</h4>

            <a href="#">Люк с эл. приводом «ЗЕВС»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки съемные:</h4>

            <a href="#">Люк «ГРАНИТ» 30 мм </a>

            <a href="#">Люк «ГРАНИТ» лайт 30 мм риф </a>

            <a href="#">Люк «АГАТ» 50 мм с ГВЛ </a>

            <a href="#">Люк «ОНИКС» 54 мм</a>

            <a href="#">Люк «ОНИКС» лайт 54 мм риф</a>

            <a href="#">Люк «ОНИКС» смол 50 мм</a>
          </li>
        </ul>
      </li>
      <li class="catalog-sidebar-list__item">
        <a href="#"
          >Нажимные под плитку
          <span class="arrow">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                stroke="#909CB5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </a>
        <ul class="catalog-sidebar-sublist">
          <li class="catalog-sidebar-sublist__item">
            <h4 class="catalog-sidebar-sublist__item-title">Люки с амортизаторами:</h4>

            <a href="#">Люк  напольный «ЮПИТЕР»</a>

            <a href="#">Люк напольный «ЮПИТЕР» лайт</a>

            <a href="#">Люк напольный «МАРС» угол</a>

            <a href="#">Люк напольный «МАРС» короб </a>

            <a href="#">Люк напольный «ТОПАЗ» сталь</a>

            <a href="#">Люк напольный «ТОПАЗ» короб</a>

            <a href="#">Люк напольный «ТОПАЗ» риф</a>

            <a href="#">Люк напольный «ТОПАЗ» эконом</a>

            <a href="#">Люк уличный тротуарный «ТОУЭР»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки с электроприводом:</h4>

            <a href="#">Люк с эл. приводом «ЗЕВС»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки съемные:</h4>

            <a href="#">Люк «ГРАНИТ» 30 мм </a>

            <a href="#">Люк «ГРАНИТ» лайт 30 мм риф </a>

            <a href="#">Люк «АГАТ» 50 мм с ГВЛ </a>

            <a href="#">Люк «ОНИКС» 54 мм</a>

            <a href="#">Люк «ОНИКС» лайт 54 мм риф</a>

            <a href="#">Люк «ОНИКС» смол 50 мм</a>
          </li>
        </ul>
      </li>
      <li class="catalog-sidebar-list__item">
        <a href="#"
          >Сантехнические
          <span class="arrow">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                stroke="#909CB5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </a>
        <ul class="catalog-sidebar-sublist">
          <li class="catalog-sidebar-sublist__item">
            <h4 class="catalog-sidebar-sublist__item-title">Люки с амортизаторами:</h4>

            <a href="#">Люк  напольный «ЮПИТЕР»</a>

            <a href="#">Люк напольный «ЮПИТЕР» лайт</a>

            <a href="#">Люк напольный «МАРС» угол</a>

            <a href="#">Люк напольный «МАРС» короб </a>

            <a href="#">Люк напольный «ТОПАЗ» сталь</a>

            <a href="#">Люк напольный «ТОПАЗ» короб</a>

            <a href="#">Люк напольный «ТОПАЗ» риф</a>

            <a href="#">Люк напольный «ТОПАЗ» эконом</a>

            <a href="#">Люк уличный тротуарный «ТОУЭР»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки с электроприводом:</h4>

            <a href="#">Люк с эл. приводом «ЗЕВС»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки съемные:</h4>

            <a href="#">Люк «ГРАНИТ» 30 мм </a>

            <a href="#">Люк «ГРАНИТ» лайт 30 мм риф </a>

            <a href="#">Люк «АГАТ» 50 мм с ГВЛ </a>

            <a href="#">Люк «ОНИКС» 54 мм</a>

            <a href="#">Люк «ОНИКС» лайт 54 мм риф</a>

            <a href="#">Люк «ОНИКС» смол 50 мм</a>
          </li>
        </ul>
      </li> -->
    </ul>
  </div>

  <? } ?>
 
  <!-- <div class="catalog-sidebar-block">
    <h3 class="catalog-sidebar-block__title">Чердачные лестницы</h3>
    <ul class="catalog-sidebar-list">
      <li class="catalog-sidebar-list__item">
        <a href="#"
          >Лестницы FAKRO
          <span class="arrow">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                stroke="#909CB5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </a>
        <ul class="catalog-sidebar-sublist">
          <li class="catalog-sidebar-sublist__item">
            <h4 class="catalog-sidebar-sublist__item-title">Люки с амортизаторами:</h4>

            <a href="#">Люк  напольный «ЮПИТЕР»</a>

            <a href="#">Люк напольный «ЮПИТЕР» лайт</a>

            <a href="#">Люк напольный «МАРС» угол</a>

            <a href="#">Люк напольный «МАРС» короб </a>

            <a href="#">Люк напольный «ТОПАЗ» сталь</a>

            <a href="#">Люк напольный «ТОПАЗ» короб</a>

            <a href="#">Люк напольный «ТОПАЗ» риф</a>

            <a href="#">Люк напольный «ТОПАЗ» эконом</a>

            <a href="#">Люк уличный тротуарный «ТОУЭР»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки с электроприводом:</h4>

            <a href="#">Люк с эл. приводом «ЗЕВС»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки съемные:</h4>

            <a href="#">Люк «ГРАНИТ» 30 мм </a>

            <a href="#">Люк «ГРАНИТ» лайт 30 мм риф </a>

            <a href="#">Люк «АГАТ» 50 мм с ГВЛ </a>

            <a href="#">Люк «ОНИКС» 54 мм</a>

            <a href="#">Люк «ОНИКС» лайт 54 мм риф</a>

            <a href="#">Люк «ОНИКС» смол 50 мм</a>
          </li>
        </ul>
      </li>
      <li class="catalog-sidebar-list__item">
        <a href="#"
          >Лестницы OMAN
          <span class="arrow">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                stroke="#909CB5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </a>
        <ul class="catalog-sidebar-sublist">
          <li class="catalog-sidebar-sublist__item">
            <h4 class="catalog-sidebar-sublist__item-title">Люки с амортизаторами:</h4>

            <a href="#">Люк  напольный «ЮПИТЕР»</a>

            <a href="#">Люк напольный «ЮПИТЕР» лайт</a>

            <a href="#">Люк напольный «МАРС» угол</a>

            <a href="#">Люк напольный «МАРС» короб </a>

            <a href="#">Люк напольный «ТОПАЗ» сталь</a>

            <a href="#">Люк напольный «ТОПАЗ» короб</a>

            <a href="#">Люк напольный «ТОПАЗ» риф</a>

            <a href="#">Люк напольный «ТОПАЗ» эконом</a>

            <a href="#">Люк уличный тротуарный «ТОУЭР»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки с электроприводом:</h4>

            <a href="#">Люк с эл. приводом «ЗЕВС»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки съемные:</h4>

            <a href="#">Люк «ГРАНИТ» 30 мм </a>

            <a href="#">Люк «ГРАНИТ» лайт 30 мм риф </a>

            <a href="#">Люк «АГАТ» 50 мм с ГВЛ </a>

            <a href="#">Люк «ОНИКС» 54 мм</a>

            <a href="#">Люк «ОНИКС» лайт 54 мм риф</a>

            <a href="#">Люк «ОНИКС» смол 50 мм</a>
          </li>
        </ul>
      </li>
      <li class="catalog-sidebar-list__item">
        <a href="#"
          >Деревянные лестницы
          <span class="arrow">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                stroke="#909CB5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </a>
        <ul class="catalog-sidebar-sublist">
          <li class="catalog-sidebar-sublist__item">
            <h4 class="catalog-sidebar-sublist__item-title">Люки с амортизаторами:</h4>

            <a href="#">Люк  напольный «ЮПИТЕР»</a>

            <a href="#">Люк напольный «ЮПИТЕР» лайт</a>

            <a href="#">Люк напольный «МАРС» угол</a>

            <a href="#">Люк напольный «МАРС» короб </a>

            <a href="#">Люк напольный «ТОПАЗ» сталь</a>

            <a href="#">Люк напольный «ТОПАЗ» короб</a>

            <a href="#">Люк напольный «ТОПАЗ» риф</a>

            <a href="#">Люк напольный «ТОПАЗ» эконом</a>

            <a href="#">Люк уличный тротуарный «ТОУЭР»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки с электроприводом:</h4>

            <a href="#">Люк с эл. приводом «ЗЕВС»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки съемные:</h4>

            <a href="#">Люк «ГРАНИТ» 30 мм </a>

            <a href="#">Люк «ГРАНИТ» лайт 30 мм риф </a>

            <a href="#">Люк «АГАТ» 50 мм с ГВЛ </a>

            <a href="#">Люк «ОНИКС» 54 мм</a>

            <a href="#">Люк «ОНИКС» лайт 54 мм риф</a>

            <a href="#">Люк «ОНИКС» смол 50 мм</a>
          </li>
        </ul>
      </li>
      <li class="catalog-sidebar-list__item">
        <a href="#"
          >Ножничные лестницы
          <span class="arrow">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                stroke="#909CB5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </a>
        <ul class="catalog-sidebar-sublist">
          <li class="catalog-sidebar-sublist__item">
            <h4 class="catalog-sidebar-sublist__item-title">Люки с амортизаторами:</h4>

            <a href="#">Люк  напольный «ЮПИТЕР»</a>

            <a href="#">Люк напольный «ЮПИТЕР» лайт</a>

            <a href="#">Люк напольный «МАРС» угол</a>

            <a href="#">Люк напольный «МАРС» короб </a>

            <a href="#">Люк напольный «ТОПАЗ» сталь</a>

            <a href="#">Люк напольный «ТОПАЗ» короб</a>

            <a href="#">Люк напольный «ТОПАЗ» риф</a>

            <a href="#">Люк напольный «ТОПАЗ» эконом</a>

            <a href="#">Люк уличный тротуарный «ТОУЭР»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки с электроприводом:</h4>

            <a href="#">Люк с эл. приводом «ЗЕВС»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки съемные:</h4>

            <a href="#">Люк «ГРАНИТ» 30 мм </a>

            <a href="#">Люк «ГРАНИТ» лайт 30 мм риф </a>

            <a href="#">Люк «АГАТ» 50 мм с ГВЛ </a>

            <a href="#">Люк «ОНИКС» 54 мм</a>

            <a href="#">Люк «ОНИКС» лайт 54 мм риф</a>

            <a href="#">Люк «ОНИКС» смол 50 мм</a>
          </li>
        </ul>
      </li>
      <li class="catalog-sidebar-list__item">
        <a href="#"
          >Металлические лестницы
          <span class="arrow">
            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                stroke="#909CB5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </a>
        <ul class="catalog-sidebar-sublist">
          <li class="catalog-sidebar-sublist__item">
            <h4 class="catalog-sidebar-sublist__item-title">Люки с амортизаторами:</h4>

            <a href="#">Люк  напольный «ЮПИТЕР»</a>

            <a href="#">Люк напольный «ЮПИТЕР» лайт</a>

            <a href="#">Люк напольный «МАРС» угол</a>

            <a href="#">Люк напольный «МАРС» короб </a>

            <a href="#">Люк напольный «ТОПАЗ» сталь</a>

            <a href="#">Люк напольный «ТОПАЗ» короб</a>

            <a href="#">Люк напольный «ТОПАЗ» риф</a>

            <a href="#">Люк напольный «ТОПАЗ» эконом</a>

            <a href="#">Люк уличный тротуарный «ТОУЭР»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки с электроприводом:</h4>

            <a href="#">Люк с эл. приводом «ЗЕВС»</a>

            <h4 class="catalog-sidebar-sublist__item-title">Люки съемные:</h4>

            <a href="#">Люк «ГРАНИТ» 30 мм </a>

            <a href="#">Люк «ГРАНИТ» лайт 30 мм риф </a>

            <a href="#">Люк «АГАТ» 50 мм с ГВЛ </a>

            <a href="#">Люк «ОНИКС» 54 мм</a>

            <a href="#">Люк «ОНИКС» лайт 54 мм риф</a>

            <a href="#">Люк «ОНИКС» смол 50 мм</a>
          </li>
        </ul>
      </li>
    </ul>
  </div> -->
</div>
