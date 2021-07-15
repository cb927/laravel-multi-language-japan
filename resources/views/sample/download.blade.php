<html>
    <head>
        <title>sample</title>
    </head>
    <body>

        <form action="{{ url('sample/download2') }}" method="post"  >
            @csrf
			<input type="hidden" name="login" value="111111">
            <input type="submit" >
        </form>

    </body>
</html>
