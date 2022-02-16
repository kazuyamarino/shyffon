<!doctype html>
<html class="no-js" lang="@( get_lang_code() )">
<head>
	<!-- call sweetalert -->
	@( sweetalert_init() )

	<!-- call header assets method -->
	@( header_assets() )
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<header style="margin-top: 1rem;" class="header grid-x grid-padding-x align-middle">
		<div class="large-2 cell">
			<a href="@( base_url() )"><img src="@( img_url('logo.png') )" width="200"/></a>
		</div>
		<div class="large-8 cell text-center">
			<h2>Welcome to Project Shyffon</h2>
			<h5>NSY PHP Framework + Foundation CSS Framework.</h5>
			<h5>Shyffon is a sweet cake of PHP Framework</h5>
		</div>
		<div class="large-2 cell">
			<div class="text-center">
				<a target="_blank" href="https://github.com/kazuyamarino/shyffon"><i class="fab fa-github fa-5x"></i>
					<p>View On Github</p>
				</a>
			</div>
		</div>
	</header>
