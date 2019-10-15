<div class="bk_form_container">
	<form class="bk_form" method="post" action="<?php echo esc_url(admin_url("admin-post.php")); ?>">
		<input type="hidden" name="action" value="bk_submit_form">
		<input type="hidden" name="bk_nonce" value="<?php wp_create_nonce("bk_nonce");?>">
		<input type="hidden" name="bk_thankyoupage" value="<?php echo $attributes->thankyoupage; ?>">
		<label for="bk_form_service_id"><?php _e("Van welk ongedierte heb je last?", Plugin::DOMAIN); ?>
			<select class="bk_form_input bk_form_select" id="bk_form_service_id" name="bk_form_fields[service_id]">
				<option value="1"><?php _e('Bedwantsen', Plugin::DOMAIN); ?></option>
				<option value="26" selected="selected"><?php _e('Beestjes onbekend', Plugin::DOMAIN); ?></option>
				<option value="5"><?php _e('Boktor', Plugin::DOMAIN); ?></option>
				<option value="6"><?php _e('Duiven', Plugin::DOMAIN); ?></option>
				<option value="7"><?php _e('Houtworm', Plugin::DOMAIN); ?></option>
				<option value="8"><?php _e('Kakkerlakken', Plugin::DOMAIN); ?></option>
				<option value="9"><?php _e('Kevers', Plugin::DOMAIN); ?></option>
				<option value="10"><?php _e('Mieren', Plugin::DOMAIN); ?></option>
				<option value="11"><?php _e('Mollen', Plugin::DOMAIN); ?></option>
				<option value="175"><?php _e('Motmuggen', Plugin::DOMAIN); ?></option>
				<option value="12"><?php _e('Motten', Plugin::DOMAIN); ?></option>
				<option value="13"><?php _e('Muggen', Plugin::DOMAIN); ?></option>
				<option value="14"><?php _e('Muizen', Plugin::DOMAIN); ?></option>
				<option value="16"><?php _e('Papiervisjes', Plugin::DOMAIN); ?></option>
				<option value="17"><?php _e('Ratten', Plugin::DOMAIN); ?></option>
				<option value="18"><?php _e('Rioolvliegjes', Plugin::DOMAIN); ?></option>
				<option value="20"><?php _e('Spinnen', Plugin::DOMAIN); ?></option>
				<option value="21"><?php _e('Vliegen', Plugin::DOMAIN); ?></option>
				<option value="22"><?php _e('Vlooien', Plugin::DOMAIN); ?></option>
				<option value="23"><?php _e('Wespen', Plugin::DOMAIN); ?></option>
				<!-- <option value="176"><?php _e('Wespen', Plugin::DOMAIN); ?></option> -->
				<option value="24"><?php _e('Zilvervisjes', Plugin::DOMAIN); ?></option>
				<option value="25"><?php _e('Zwam', Plugin::DOMAIN); ?></option>
			</select>
		</label>
		<label for="bk_form_question">
			<textarea name="bk_form_fields[question]" required="required" aria-required="true" class="bk_form_input bk_form_textarea" id="bk_form_question" placeholder="<?php _e("Wat is je vraag/probleem?", "beestjeskwijt-form"); ?>"></textarea>
		</label>
		<label for="bk_form_zipcode">
			<input type="text" class="bk_form_input bk_form_text" id="bk_form_zipcode" name="bk_form_fields[zipcode]" pattern="[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[a-zA-Z]{2}" maxlength="6" required="required" aria-required="true" placeholder="<?php _e('Postcode (0000XX)', Plugin::DOMAIN);?>">
		</label>
		<label for="bk_form_email">
			<input type="email" class="bk_form_input bk_form_text" id="bk_form_email" name="bk_form_fields[email]" required="required" aria-required="true" placeholder="<?php _e('E-mailadres', Plugin::DOMAIN);?>">
		</label>
		<label for="bk_form_streetname">
			<input type="text" class="bk_form_input bk_form_text" id="bk_form_streetname" name="bk_form_fields[streetname]" required="required" aria-required="true" placeholder="<?php _e('Straatnaam', Plugin::DOMAIN);?>">
		</label>
		<label for="bk_form_house_number">
			<input type="text" class="bk_form_input bk_form_text" id="bk_form_house_number" name="bk_form_fields[house_number]" required="required" aria-required="true" placeholder="<?php _e('Huisnummer', Plugin::DOMAIN); ?>">
		</label>
		<label for="bk_form_phone_number">
			<input type="tel" class="bk_form_input bk_form_text" id="bk_form_phone_number" name="bk_form_fields[phone_number]" required="required" aria-required="true" placeholder="<?php _e('Telefoonnummer', Plugin::DOMAIN); ?>">
		</label>
	</form>
</div>
