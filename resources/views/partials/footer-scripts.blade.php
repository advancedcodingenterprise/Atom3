    <!-- Bootstrap core JavaScript
    ================================================= -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript">
	var csrf_token = '{{ csrf_token() }}';
	</script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>