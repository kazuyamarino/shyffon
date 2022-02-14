<!-- Footer are 'sticky' -->
<footer class="footer">
	<hr>
	<div class="fcontent">
		<a target="_blank" href="@( 'mailto:admin@kazuyamarino.com' )">Vikry Yuansah</a>
		<span>-</span>
		<a href="@( base_url() )">Shyffon</a> @( get_version() ), 2018 - @( date("Y") ).
	</div>
</footer>
<!-- call footer assets method -->
@( footer_assets() )

<!-- call datatables init method -->
@( datatables_crud_init() )
</body>
</html>
