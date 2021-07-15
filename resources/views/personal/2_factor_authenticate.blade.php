<!-- Modal 2-Factor Auth -->
<div class="modal fade" id="activateTwoFactor" tabindex="-1" role="dialog" aria-labelledby="activateTwoFactorTitle" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content border-0 shadow-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="activateTwoFactorTitle">2-Factor Authentication</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
								<div class="modal-body" data-authaction="activate">
					<p>Increase your security just following a few simple steps.</p>
					<ol class="list-group list-group-flush">
						<li class="list-group-item">
							<b>1. Install the app </b>
							<p>Install the Google Authenticator App in your phone</p>
							<a class="logo play-store" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" target="_blank"><img src="{{$currentPath}}/MT4 管理画面 _ good-enough _files/play-store.png"></a>
							<a class="logo app-store" href="https://itunes.apple.com/gb/app/google-authenticator/id388497605" target="_blank"><img src="{{$currentPath}}/MT4 管理画面 _ good-enough _files/app-store.png"></a>
						</li>
						<li class="list-group-item">
							<b>2. Add your good-enough Account to Google Authenticator </b>
							<p>If there are any existing good-enough codes for <b>MT4 715238</b>, delete them. Scan the QR code bellow to add a good-enough Account</p>
							<iframe src='{{$google2fa_url}}/showQR.php?user={{$username}}&secret={{$google2fa_secret}}' width='230' height='230'></iframe>
							<br><a href="{{route('setting')}}">Unable to scan the code?</a>

							<ol>
								<li>In Google Authenticator, tap +</li>
								<li>Key type: make sure 'Time-based' is selected</li>
								<li>In 'Account' type your full email address</li>
								<li>In 'Key' type your secret key: <b><span id="authsecret">4Z6KKONOIM2P5RSRPYKW5AMX7NVMPQZN</span></b></li>
								<li>Tap Done</li>
							</ol>
						</li>
						<li class="list-group-item">
							<b>3. Enter generated key</b>
							<p>Enter generated key to verify your authenticator </p>
							<form method="POST" id="authvalidate" novalidate="" action="{{route('two-factor-authenticate')}}">
								@csrf
								<div class="input-group mb-3">
									<input type="hidden" name="secret" value="{{$google2fa_secret}}">
									<input type="text" name="oneCode" class="form-control" placeholder="Enter Key" aria-label="Enter Key" aria-describedby="button-addon" required="">
									<div class="input-group-append">
										<button class="btn btn-outline-secondary" type="submit" id="button-addon">
											<span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
											Verify
										</button>
									</div>
								</div>
							</form>
							<div>
								@if($google2fa_valid)
								status: valid
								@else
								status: invalid
								@endif
							</div>
						</li>
					</ol>
				</div>
				<div class="modal-body d-none" data-authaction="newkeys">
										<b>2-Factor succesfully activated</b>
					<p>Now, the next time when you login you will need code into your Authenticator App.</p>
				</div>
								<div class="modal-footer">	
					<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
