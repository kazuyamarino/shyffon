<div class="content">
	<hr>
	<div class="grid-x grid-padding-x">
		<div class="large-5 medium-5 cell">
			<a class="back-btn" href="@( base_url('crud') )"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
	<div class="grid-x grid-padding-x align-center">
		<div class="large-5 medium-5 cell">
			<h5>Users Information</h5>
			<form action="@( base_url('crud/update/'. $data['id']. '') )" method="POST" data-abide novalidate class="grid-x grid-padding-x">
				<div class="large-12 cell">
					<div data-abide-error class="alert callout" style="display: none;">
						<p><i class="fi-alert"></i> There are some errors in your form.</p>
					</div>

					<label>Username&nbsp;<small>(required)</small>
						<input type="text" name="username" id="username-help" placeholder="3 - 50 characters" pattern="^[a-z0-9\._-]{3,50}$" value="@( $data['user_name'] )" required>
						<span class="form-error">
							<ul>
								<li>Username must be lowercase</li>
								<li>Can only contain dot (&nbsp;.&nbsp;), underscore (&nbsp;_&nbsp;), & minus (&nbsp;-&nbsp;)</li>
							</ul>
						</span>
					</label>
					<p class="help-text" id="username-help">Enter your username here.</p>

					<label>Password&nbsp;<small>(required)</small>
						<input type="password" name="password" id="password-first" placeholder="5 - 16 characters" pattern="^[a-zA-Z0-9\.]{5,16}$">
						<span class="form-error">
							<ul>
								<li>Password is required.</li>
								<li>Can only contain dot (&nbsp;.&nbsp;)</li>
							</ul>
						</span>
					</label>
					<label>Confirm Password&nbsp;<small>(required)</small>
						<input type="password" placeholder="5 - 16 characters" pattern="^[a-zA-Z0-9\._-]{5,16}$" data-equalto="password-first">
						<span class="form-error">The password did not match</span>
					</label>
					<p class="help-text" id="password-help">Enter your password here.</p>

					<label for="radio-stat">Status Active&nbsp;<small>(required)</small></label>
					<div id="radio-stat" class="radio-group">
						<input type="radio" name="status" value="Y" id="act-stat" @( terner( ('Y' == $data['user_status']), 'checked', '') ) required><label for="act-stat">Yes</label>
						<input type="radio" name="status" value="N" id="deact-stat" @( terner( ('N' == $data['user_status']), 'checked', '' ) )><label for="deact-stat">No</label>
						<span class="form-error">Must select at least one</span>
					</div>
					<p class="help-text" id="status-help">Choose one user status.</p>

					<div class="action-btn text-center">
						<button class="button" type="submit">Update</button>
						<button class="button secondary" type="reset">Reset</button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
