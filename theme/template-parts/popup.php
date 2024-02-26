<div class="popup" id="popup">
  <div class="popup-title small-title">Заказать звонок</div>
  <form class="popup__form form">
    <div class="form__field">
      <div class="form__label">Имя<span>*</span></div>
      <input type="text" class="form__input" placeholder="Имя" />
    </div>
    <div class="form__field">
      <div class="form__label">Телефон <span>*</span></div>
      <input type="tel" class="form__input" placeholder="+7 (_ _ _) - _ _ _ - _ _ - _ _" />
    </div>
    <div class="form-acceptance">
      Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c <a href="#">политикой конфиденциальности</a>
    </div>
    <button class="form__btn btn">Заказать звонок</button>
  </form>
  
</div>
<div class="popup" id="sign-in">
  <div class="popup-title small-title">Вход в личный кабинет</div>
  <form class="woocommerce-form woocommerce-form-login login form popup__form" method="post">

    <?php do_action( 'woocommerce_login_form_start' ); ?>

    <p class="form__field">      
      <input required type="text" class="form__input form__input woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>*" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
    </p>
    <p class="form__field">
      
      <input required class="form__input form__input woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>*" />
      <svg class="show-password" width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M4.31926 10.7145C2.9541 9.74515 1.8738 8.48431 1.26336 7.68815C1.09266 7.46838 1 7.19802 1 6.91974C1 6.64146 1.09266 6.3711 1.26336 6.15132C2.36807 4.7092 5.0185 1.73987 8.11288 1.73987C9.50098 1.73987 10.7988 2.33699 11.9087 3.12649"
            stroke="#AFAFAF"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M9.68904 5.35593C9.48356 5.14702 9.23875 4.98087 8.96873 4.86705C8.69871 4.75323 8.40883 4.694 8.1158 4.69277C7.82278 4.69154 7.53241 4.74834 7.26145 4.8599C6.99048 4.97145 6.74429 5.13555 6.53706 5.34272C6.32984 5.5499 6.16568 5.79606 6.05406 6.06699C5.94245 6.33793 5.88558 6.62829 5.88674 6.92131C5.88789 7.21434 5.94706 7.50423 6.06081 7.77428C6.17457 8.04432 6.34067 8.28917 6.54953 8.49471"
            stroke="#AFAFAF"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path class="line" d="M2.19336 12.8389L14.0322 1" stroke="#AFAFAF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path
            d="M6.63281 11.8799C7.11318 12.0228 7.61148 12.0966 8.11267 12.0989C11.2071 12.0989 13.8575 9.12954 14.9622 7.68742C15.1328 7.46744 15.2254 7.19691 15.2253 6.9185C15.2251 6.64009 15.1323 6.36965 14.9614 6.14984C14.5732 5.64336 14.1567 5.15917 13.7139 4.69958"
            stroke="#AFAFAF"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
    </p>

    <?php do_action( 'woocommerce_login_form' ); ?>

    <p class="form__field">
      <label class="d-flex align-items-center woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
      </label>
      <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>    </p>

    <button type="submit" class="btn form-btn woocommerce-button  woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>

   
      <!-- <a class="forget-password" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a> -->
   

    <a href="#forget-password" data-fancybox class="forget-password"> Забыли пароль? </a>
    <a href="#sign-up" data-fancybox class="sign-up">Зарегистрироваться </a>

    <?php do_action( 'woocommerce_login_form_end' ); ?>

  </form>
   
</div>

<div class="popup" id="forget-password">
  <div class="popup-title small-title">Забыли пароль?</div>
  <form method="post" class="form popup__form woocommerce-ResetPassword lost_reset_password">

    <p class="form__text mb-3"><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

    <p class="form__field">
      <label for="user_login"></label>
      <input class="form__input" type="text" name="user_login" id="user_login" autocomplete="username" placehodler="<?php esc_html_e( 'Username or email', 'woocommerce' ); ?>" />
    </p>

    

    <?php do_action( 'woocommerce_lostpassword_form' ); ?>

    <p class="woocommerce-form-row form-row">
      <input type="hidden" name="wc_reset_password" value="true" />
      <button type="submit" class="btn form-btn woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
    </p>

    <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

  </form>

</div>

<div class="popup" id="sign-up">
  <div class="popup-title small-title">Регистрация</div>
  <form method="post" class="form popup__form woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

      	<p class="form__field">
					<input required type="text" class="form__input " name="billing_first_name" id="reg_billing_first_name" autocomplete="billing_first_name" value="<?php echo ( ! empty( $_POST['billing_first_name'] ) ) ? esc_attr( wp_unslash( $_POST['billing_first_name'] ) ) : ''; ?>"placeholder="Имя" /><?php // @codingStandardsIgnoreLine ?>
				</p>
      	<p class="form__field">
					<input required type="text" class="form__input " name="billing_last_name" id="reg_billing_last_name" autocomplete="billing_last_name" value="<?php echo ( ! empty( $_POST['billing_last_name'] ) ) ? esc_attr( wp_unslash( $_POST['billing_last_name'] ) ) : ''; ?>"placeholder="Фамилия" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="form__field">
					<input required type="text" class="form__input woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"placeholder="Логин (мин. 3 символа)" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

      <p class="form__field">
        <input required type="tel" class="form__input " name="billing_phone" id="reg_billing_phone" autocomplete="billing_phone" value="<?php echo ( ! empty( $_POST['billing_phone'] ) ) ? esc_attr( wp_unslash( $_POST['billing_phone'] ) ) : ''; ?>"placeholder="Телефон" /><?php // @codingStandardsIgnoreLine ?>
      </p>
        
			<p class="form__field">
				<input required type="email" class="form__input woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'Email address', 'woocommerce' ); ?>*" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="form__field">
					
					<input required type="password" class="form__input woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" />

          <svg class="show-password" width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M4.31926 10.7145C2.9541 9.74515 1.8738 8.48431 1.26336 7.68815C1.09266 7.46838 1 7.19802 1 6.91974C1 6.64146 1.09266 6.3711 1.26336 6.15132C2.36807 4.7092 5.0185 1.73987 8.11288 1.73987C9.50098 1.73987 10.7988 2.33699 11.9087 3.12649"
              stroke="#AFAFAF"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M9.68904 5.35593C9.48356 5.14702 9.23875 4.98087 8.96873 4.86705C8.69871 4.75323 8.40883 4.694 8.1158 4.69277C7.82278 4.69154 7.53241 4.74834 7.26145 4.8599C6.99048 4.97145 6.74429 5.13555 6.53706 5.34272C6.32984 5.5499 6.16568 5.79606 6.05406 6.06699C5.94245 6.33793 5.88558 6.62829 5.88674 6.92131C5.88789 7.21434 5.94706 7.50423 6.06081 7.77428C6.17457 8.04432 6.34067 8.28917 6.54953 8.49471"
              stroke="#AFAFAF"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path class="line" d="M2.19336 12.8389L14.0322 1" stroke="#AFAFAF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path
              d="M6.63281 11.8799C7.11318 12.0228 7.61148 12.0966 8.11267 12.0989C11.2071 12.0989 13.8575 9.12954 14.9622 7.68742C15.1328 7.46744 15.2254 7.19691 15.2253 6.9185C15.2251 6.64009 15.1323 6.36965 14.9614 6.14984C14.5732 5.64336 14.1567 5.15917 13.7139 4.69958"
              stroke="#AFAFAF"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php //do_action( 'woocommerce_register_form' ); ?>

			
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>

				<button type="submit"  class="btn form-btn woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
        <div class="form-acceptance">
          <span>Согласен с <a href="#">Политикой конфиденциальности</a></span>
        </div>
			

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>
  <!-- <form class="form popup__form">
    <div class="form__field">
      <input type="text" class="form__input" required placeholder="Имя" id="username" name="username" />
    </div>
    <div class="form__field">
      <input type="text" class="form__input" required placeholder="Пароль" id="usersurname" name="usersurname" />
    </div>
    <div class="form__field">
      <input type="text" class="form__input" required placeholder="Логин (мин. 3 сивола)" id="login" name="login" />
    </div>
    <div class="form__field">
      <input type="tel" class="form__input" required placeholder="Телефон" id="phone" name="phone" />
    </div>
    <div class="form__field">
      <input type="email" class="form__input" required placeholder="Email" id="Email" name="Email" />
    </div>
    <div class="form__field">
      <input type="password" class="form__input" required placeholder="Пароль" id="password" name="password" />
      <svg class="show-password" width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M4.31926 10.7145C2.9541 9.74515 1.8738 8.48431 1.26336 7.68815C1.09266 7.46838 1 7.19802 1 6.91974C1 6.64146 1.09266 6.3711 1.26336 6.15132C2.36807 4.7092 5.0185 1.73987 8.11288 1.73987C9.50098 1.73987 10.7988 2.33699 11.9087 3.12649"
          stroke="#AFAFAF"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
        <path
          d="M9.68904 5.35593C9.48356 5.14702 9.23875 4.98087 8.96873 4.86705C8.69871 4.75323 8.40883 4.694 8.1158 4.69277C7.82278 4.69154 7.53241 4.74834 7.26145 4.8599C6.99048 4.97145 6.74429 5.13555 6.53706 5.34272C6.32984 5.5499 6.16568 5.79606 6.05406 6.06699C5.94245 6.33793 5.88558 6.62829 5.88674 6.92131C5.88789 7.21434 5.94706 7.50423 6.06081 7.77428C6.17457 8.04432 6.34067 8.28917 6.54953 8.49471"
          stroke="#AFAFAF"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
        <path class="line" d="M2.19336 12.8389L14.0322 1" stroke="#AFAFAF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path
          d="M6.63281 11.8799C7.11318 12.0228 7.61148 12.0966 8.11267 12.0989C11.2071 12.0989 13.8575 9.12954 14.9622 7.68742C15.1328 7.46744 15.2254 7.19691 15.2253 6.9185C15.2251 6.64009 15.1323 6.36965 14.9614 6.14984C14.5732 5.64336 14.1567 5.15917 13.7139 4.69958"
          stroke="#AFAFAF"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </div>
    <div class="form__field">
      <input type="password" class="form__input" required placeholder="Подтверждение пароля" id="password-repeat" name="password-repeat" />
      <svg class="show-password" width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M4.31926 10.7145C2.9541 9.74515 1.8738 8.48431 1.26336 7.68815C1.09266 7.46838 1 7.19802 1 6.91974C1 6.64146 1.09266 6.3711 1.26336 6.15132C2.36807 4.7092 5.0185 1.73987 8.11288 1.73987C9.50098 1.73987 10.7988 2.33699 11.9087 3.12649"
          stroke="#AFAFAF"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
        <path
          d="M9.68904 5.35593C9.48356 5.14702 9.23875 4.98087 8.96873 4.86705C8.69871 4.75323 8.40883 4.694 8.1158 4.69277C7.82278 4.69154 7.53241 4.74834 7.26145 4.8599C6.99048 4.97145 6.74429 5.13555 6.53706 5.34272C6.32984 5.5499 6.16568 5.79606 6.05406 6.06699C5.94245 6.33793 5.88558 6.62829 5.88674 6.92131C5.88789 7.21434 5.94706 7.50423 6.06081 7.77428C6.17457 8.04432 6.34067 8.28917 6.54953 8.49471"
          stroke="#AFAFAF"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
        <path class="line" d="M2.19336 12.8389L14.0322 1" stroke="#AFAFAF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path
          d="M6.63281 11.8799C7.11318 12.0228 7.61148 12.0966 8.11267 12.0989C11.2071 12.0989 13.8575 9.12954 14.9622 7.68742C15.1328 7.46744 15.2254 7.19691 15.2253 6.9185C15.2251 6.64009 15.1323 6.36965 14.9614 6.14984C14.5732 5.64336 14.1567 5.15917 13.7139 4.69958"
          stroke="#AFAFAF"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </div>

    <button class="btn form-btn" type="submit">Зарегистрироваться</button>
    <div class="form-acceptance">
      <span>Согласен с <a href="#">Политикой конфиденциальности</a></span>
    </div>
  </form> -->
</div>

<div class="popup" id="product-popup">
	
</div>
