<!-- call alerts method -->
@( pull_alerts($message) )
<div class="content">
	<hr>
	<div class="grid-x grid-padding-x align-center">
		<div class="large-5 medium-5 cell">
			<h5 class="text-center"><a href="@( base_url() )">Back</a></h5>
			<h5>Users Registration</h5>
			<form action="@( base_url('crud/insert') )" method="POST" data-abide novalidate class="grid-x grid-padding-x">
				<div class="large-12 cell">
					<div data-abide-error class="alert callout" style="display: none;">
						<p><i class="fi-alert"></i> There are some errors in your form.</p>
					</div>

					<label>Username&nbsp;<small>(required)</small>
						<input type="text" name="username" id="username-help" placeholder="3 - 50 characters" pattern="^[a-z0-9\._-]{3,50}$" required>
						<span class="form-error">
							<ul>
								<li>Username must be lowercase</li>
								<li>Can only contain dot (&nbsp;.&nbsp;), underscore (&nbsp;_&nbsp;), & minus (&nbsp;-&nbsp;)</li>
							</ul>
						</span>
					</label>
					<p class="help-text" id="username-help">Enter your username here.</p>

					<label>Password&nbsp;<small>(required)</small>
						<input type="password" name="password" id="password-first" placeholder="5 - 16 characters" pattern="^[a-zA-Z0-9\.]{5,16}$" required>
						<span class="form-error">
							<ul>
								<li>Password is required.</li>
								<li>Can only contain dot (&nbsp;.&nbsp;)</li>
							</ul>
						</span>
					</label>
					<label>Confirm Password&nbsp;<small>(required)</small>
						<input type="password" placeholder="5 - 16 characters" pattern="^[a-zA-Z0-9\.]{5,16}$" data-equalto="password-first" required>
						<span class="form-error">The password did not match</span>
					</label>
					<p class="help-text" id="password-help">Enter your password here.</p>

					<label for="radio-stat">Status Active&nbsp;<small>(required)</small>
						<div id="radio-stat" class="radio-group">
							<input type="radio" name="status" value="Y" id="act-stat" required><label for="act-stat">Yes</label>
							<input type="radio" name="status" value="N" id="deact-stat"><label for="deact-stat">No</label>
							<span class="form-error">Must select at least one</span>
						</div>
						<p class="help-text" id="status-help">Choose one user status.</p>
					</label>

					<div id="term-cond">
						<input id="term-cond" required data-min-required="1" type="checkbox" name="term-cond" value="Agree">
						<label for="term-cond" class="pointer" data-open="term-cond-modal">
							<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="Click to read the terms &amp; conditions">Terms & Conditions</span>
						</label>
						<div class="small reveal" id="term-cond-modal" data-reveal>
							<h1>Terms &amp; Condition</h1>
							<p class="lead">You and Me... Last Man Standing!</p>
							<button class="close-button" data-close aria-label="Close reveal" type="button">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div class="action-btn text-center">
						<button class="button" type="submit">Submit</button>
						<button class="button secondary" type="reset">Reset</button></div>
					</div>
				</form>
			</div>
		</div>

		<div class="grid-x grid-padding-x">
			<div class="large-12 medium-12 cell">
				<form id="multidelete-frm" action="@( base_url('crud/multidelete') )" method="POST" data-abide novalidate>
					<div class="grid-x">
						<div class="large-6 cell">
							<h5>Users Database</h5>
						</div>
						<div class="large-6 cell text-right">
							<button id="reset-filter" class="button secondary" type="reset">Reset</button>
							<button id="multidelete-btn" class="button alert" type="button">Delete Selected</button>
						</div>
					</div>
					<table id="example" class="display responsive" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>
									<div class="main-checkbox">
										<input id="select-all" name="select-all" type="checkbox">
									</div>
								</th>
								<th>ID</th>
								<th>User Code</th>
								<th>User Name</th>
								<th>Status</th>
								<th>Create Date</th>
								<th>Update Date</th>
								<th>Additional Date</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
