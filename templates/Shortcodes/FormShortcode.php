<?php
	namespace Beestjeskwijt;
?>
<div class="bk_form_container">
	<div class="bk_notice bk_form_success" style="<?php echo !isset($_GET['bk_success']) ? 'display:none;' : '' ?>">&#10003; <?php esc_html_e("Uw aanvraag is ontvangen!", 'beestjeskwijt-form') ?></div>
	<div class="bk_notice bk_form_error" style="<?php echo !isset($_GET['bk_error']) ? 'display:none;' : '' ?>"><?php echo isset($_GET['bk_error']) ? esc_html($_GET['bk_error']) : ''; ?></div>
	<form class="bk_form">
		<input type="hidden" name="url" value="<?php echo $attributes['affiliateurl']; ?>" />
		<input type="hidden" name="type_contact" value="<?php echo isset($attributes['type_contact']) ? sanitize_text_field($attributes['type_contact']) : 'particulier' ?>" />
		<label for="bk_form_service_id"><span class="bk_label_text"><?php esc_html_e("Van welk ongedierte heb je last?", 'beestjeskwijt-form'); ?><span class="bk_required">*</span></span>
			<select class="bk_form_input bk_form_select" id="bk_form_service_id" name="service_id">
				<option value="1"><?php esc_html_e('Bedwantsen', 'beestjeskwijt-form'); ?></option>
				<option value="26" selected="selected"><?php esc_html_e('Beestjes onbekend / niet in de lijst', 'beestjeskwijt-form'); ?></option>
				<option value="5"><?php esc_html_e('Boktor', 'beestjeskwijt-form'); ?></option>
				<option value="6"><?php esc_html_e('Duiven', 'beestjeskwijt-form'); ?></option>
				<option value="7"><?php esc_html_e('Houtworm', 'beestjeskwijt-form'); ?></option>
				<option value="8"><?php esc_html_e('Kakkerlakken', 'beestjeskwijt-form'); ?></option>
				<option value="9"><?php esc_html_e('Kevers', 'beestjeskwijt-form'); ?></option>
				<option value="10"><?php esc_html_e('Mieren', 'beestjeskwijt-form'); ?></option>
				<option value="11"><?php esc_html_e('Mollen', 'beestjeskwijt-form'); ?></option>
				<option value="175"><?php esc_html_e('Motmuggen', 'beestjeskwijt-form'); ?></option>
				<option value="12"><?php esc_html_e('Motten', 'beestjeskwijt-form'); ?></option>
				<option value="13"><?php esc_html_e('Muggen', 'beestjeskwijt-form'); ?></option>
				<option value="14"><?php esc_html_e('Muizen', 'beestjeskwijt-form'); ?></option>
				<option value="16"><?php esc_html_e('Papiervisjes', 'beestjeskwijt-form'); ?></option>
				<option value="17"><?php esc_html_e('Ratten', 'beestjeskwijt-form'); ?></option>
				<option value="18"><?php esc_html_e('Rioolvliegjes', 'beestjeskwijt-form'); ?></option>
				<option value="20"><?php esc_html_e('Spinnen', 'beestjeskwijt-form'); ?></option>
				<option value="21"><?php esc_html_e('Vliegen', 'beestjeskwijt-form'); ?></option>
				<option value="22"><?php esc_html_e('Vlooien', 'beestjeskwijt-form'); ?></option>
				<option value="23"><?php esc_html_e('Wespen', 'beestjeskwijt-form'); ?></option>
				<!-- <option value="176"><?php esc_html_e('Wespen', 'beestjeskwijt-form'); ?></option> -->
				<option value="24"><?php esc_html_e('Zilvervisjes', 'beestjeskwijt-form'); ?></option>
				<option value="25"><?php esc_html_e('Zwam', 'beestjeskwijt-form'); ?></option>
			</select>
		</label><br />
		<label for="bk_form_question">
			<span class="bk_label_text"><?php esc_html_e("Wat is je vraag/probleem?", 'beestjeskwijt-form'); ?><span class="bk_required">*</span></span>
			<textarea name="question" required="required" aria-required="true" class="bk_form_input bk_form_textarea" id="bk_form_question" placeholder="<?php esc_html_e("Wat is je vraag/probleem?", "beestjeskwijt-form"); ?>"></textarea>
		</label><br />
		<label for="bk_form_name">
			<span class="bk_label_text"><?php esc_html_e('Voor- en achternaam', 'beestjeskwijt-form'); ?><span class="bk_required">*</span></span>
			<input type="text" class="bk_form_input bk_form_text" id="bk_form_name" name="name" required="required" aria-required="true" placeholder="<?php esc_html_e('Voor- en achternaam', 'beestjeskwijt-form');?>">
		</label><br />
		<label for="bk_form_streetname">
			<span class="bk_label_text"><?php esc_html_e('Straatnaam', 'beestjeskwijt-form'); ?><span class="bk_required">*</span></span>
			<input type="text" class="bk_form_input bk_form_text" id="bk_form_streetname" name="streetname" required="required" aria-required="true" placeholder="<?php esc_html_e('Straatnaam', 'beestjeskwijt-form');?>">
		</label><br />
		<label for="bk_form_house_number">
			<span class="bk_label_text"><?php esc_html_e('Huisnummer', 'beestjeskwijt-form'); ?><span class="bk_required">*</span></span>
			<input type="text" class="bk_form_input bk_form_text" id="bk_form_house_number" name="house_number" required="required" aria-required="true" placeholder="<?php esc_html_e('Huisnummer', 'beestjeskwijt-form'); ?>">
		</label><br />
		<label for="bk_form_zipcode">
			<span class="bk_label_text"><?php esc_html_e('Postcode (1234AB)', 'beestjeskwijt-form'); ?><span class="bk_required">*</span></span>
			<input type="text" class="bk_form_input bk_form_text" id="bk_form_zipcode" name="zipcode" pattern="[0-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[a-zA-Z]{2}" maxlength="6" required="required" aria-required="true" placeholder="<?php esc_html_e('Postcode (1234AB)', 'beestjeskwijt-form');?>">
		</label><br />
		<label for="bk_form_email">
			<span class="bk_label_text"><?php esc_html_e('E-mailadres', 'beestjeskwijt-form'); ?><span class="bk_required">*</span></span>
			<input type="email" class="bk_form_input bk_form_text" id="bk_form_email" name="email" required="required" aria-required="true" placeholder="<?php esc_html_e('E-mailadres', 'beestjeskwijt-form');?>">
		</label><br />
		<label for="bk_form_phone_number">
			<span class="bk_label_text"><?php esc_html_e('Telefoonnummer', 'beestjeskwijt-form'); ?><span class="bk_required">*</span></span>
			<input type="tel" class="bk_form_input bk_form_text" id="bk_form_phone_number" name="phone_number" required="required" aria-required="true" placeholder="<?php esc_html_e('Telefoonnummer', 'beestjeskwijt-form'); ?>">
		</label><br />
		<button type="submit" class="bk_form_input bk_form_button" id="bk_form_submit">
			<?php esc_html_e('Verzenden &raquo;', 'beestjeskwijt-form'); ?>
		</button>
	</form>
</div>
