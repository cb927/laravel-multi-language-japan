<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery読み込み -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- 全体 -->
    <link rel="stylesheet" href="{{asset('css/basic.css')}}">
    <link rel="stylesheet" href="{{asset('css/header_and_footer.css')}}">

     <!-- 会員ページ全体 -->
    <link rel="stylesheet" href="{{asset('css/left_profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/over_menu.css')}}">

     <!-- 本ページ -->
    <link rel="stylesheet" href="{{asset('css/summary.css')}}">
    <link rel="stylesheet" href="{{asset('css/summary_main.css')}}">

	<title>
		GOOD ENOUGH FX
    </title>
</head>

<body>
<div class="main-wrap">
@include('layouts.header')

<div class="container">
	
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="background: linear-gradient(0.25turn, #0F141C,#343F47);padding-bottom:50px;margin-top:50px;margin-bottom:50px;">

			<div class="row center_text" style="color:white;height:100px;line-height:100px;font-size:20px;">
				会社概要
			</div>

			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 pad0" style="background: white;">
			<table class="table">					  
				<tbody>
				@foreach($summary_main_table_body as $row)
					<tr>
						<th class="col-md-3" style="background-color:#F8F8F8;">
							<div class="center_text">
							{{$row[0]}}
							</div>
						</th>
						<td class="col-md-9">
							<div class="text_left_box2">
							@if($row[1] == "multi_contents")
								@foreach($row[2] as $content)
								{{$content}}<br>
								@endforeach
							@else
							{{$row[1]}}
							@endif
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			</div>
			<div class="col-md-2"></div>
			</div>

		</div>
		<div class="col-md-2"></div>
	</div>
	
</div>

@include('layouts.footer')
</div>

</body>
</html>

