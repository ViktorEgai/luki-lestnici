<section class="contacts">
  <div class="container">
    <div class="contacts-map" id="map">
     <? the_field('contacts_map', 'options') ?>
    </div>
    <div class="contacts-info">
      <h2 class="contacts__title section-title">Контакты</h2>
     
      <?= do_shortcode('[contact-form-7 id="3d71c08" title="Форма Контакты" html_class="contacts__form form"]') ?>
    </div>
  </div>
</section>