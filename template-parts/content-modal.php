<div id="book-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="d_question-component-row">
      <div class="d_question-component-col">
        <p class="modal-desc-style-one"><?php pll_e('Запишитесь на прием<br>в удобный для вас день'); ?></p>
      </div>
      <div class="d_question-component-col">
        <?php if (pll_current_language() == 'ru') {
          echo do_shortcode('[contact-form-7 id="9975" title="Запись на прием" html_class="d_form"]');
        } else {
          echo do_shortcode('[contact-form-7 id="11666" title="Запись на прием UA" html_class="d_form"]');
        } ?>
      </div>
    </div>
  </div>
</div>


<div id="book-modal2" class="modal2">
  <div class="modal-content2">
    <span class="close2">&times;</span>
    <div>
      <div>
        <h2 class="modal-h2-title">
          <?php pll_e('Подробности акции'); ?></h2>
        <p class="modal-desc-style modal-desc-doctor">
          <?php pll_e('Оставьте свой номер телефона. Мы перезвоним, чтобы рассказать подробности об акции:'); ?>
          <span id="action_name"></span>
        </p>
      </div>
      <div>
        <?php if (pll_current_language() == 'ru') {
          echo do_shortcode('[contact-form-7 id="10521" title="Подробности акции"]');
        } else {
          echo do_shortcode('[contact-form-7 id="11667" title="Подробности акции UA"]');
        } ?>
      </div>
    </div>
  </div>
</div>