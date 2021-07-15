<!DOCTYPE html>
<html lang="ja" class="support tyc ">
<head>
	<meta charset="utf-8">
	<title>
					Terms And Conditions | good-enough 
			</title>
	
							
	
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" type="image/x-icon" href="{{$currentPath}}/../assets/img/tn-favicon.ico.png">
		<link rel="stylesheet" href="{{asset('css/basic.css')}}">
				
				

			<link rel="stylesheet" href="{{$currentPath}}/../assets/css/app.min-v=0.01.25.css">
	<link rel="stylesheet" href="{{$currentPath}}/../assets/css/custom-d-v=0.01.25.css">
	<link rel="stylesheet" href="{{$currentPath}}/../assets/css/custom-j-v=0.01.25.css">



		
											
						
		</head>
		<body>
		<div class="main-wrap">
		
		@include('layouts.header')

		@include('layouts.inquery_form')

		@include('layouts.inquery_responce')

		@include('layouts.header2')
		
			
<div class="container my-6 termsConditions">
    <div class="row">
    	<div class="col-12 my-5">
			<h1 class="text-center">Electronic Signatures</h1>
		</div>       
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<h2>Electronic Signatures</h2>
            <p class="text-bigger">
			The parties agree that the electronic signature of a party to this agreement will be as valid as the original signature of that party and will be effective to bind that party to this Agreement. The parties agree that any electronically signed document (including this greement) will be considered (i) as “written” or “in writing”, (ii) as signed and (iii) as a record established and maintained in the ordinary course of business and an original written record when printed from electronic files. These printed or “printed” copies, if presented as evidence in any judicial, arbitration, mediation or administrative proceeding, shall be admissible between the parties to the same extent and under the same conditions as other original commercial records created and maintained in documentary form. Neither party will challenge the admissibility of true and accurate copies of electronically signed documents based on the best testing rule or as not complying with the trade records exception to the rumor rule. For the purposes of this document, “electronic signature” means an original signature signed manually that is then transmitted by electronic means; “Transmitted by electronic means” means sent in the form of a facsimile or sent over the Internet as a “pdf” (portable document format) or another replication image attached to an email message; and,“electronically signed document” means a document transmitted by electronic means and containing, or for which it is placed, an electronic signature.
			</p>

			
			
    	</div>
    </div>
</div>

	@include('layouts.footer')
	
	<a href="javascript:void(0);" id="scroll-top" title="Scroll to Top" style="display: none; opacity: 0.5;">Top<span></span></a>

	<script type="text/javascript" src="{{$currentPath}}/../assets/js/signature_pad.umd.js"></script>

	<script type="text/javascript" src="{{$currentPath}}/../assets/js/app.min-v=0.01.25.js"></script>

	<!-- TrustBox script --> <script type="text/javascript" src="https://widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script> <!-- End TrustBox script -->

			
	
	<script type="text/javascript">   
	jQuery(function () {
        if (appEnv.cookies.permission == "dismiss") {
            /*$('#modalCookie1').modal({ 
                keyboard: true
            });*/
            jQuery('#modalCookie1').modal('hide');       
        } else {
            jQuery('#modalCookie1').modal({
                backdrop: 'static',
                keyboard: false
            });
            jQuery('#modalCookie1').modal('show'); jQuery('#modalCookie1').modal('handleUpdate');
            setCookie('permission', 'waiting', 300);

            jQuery( "#cookiesdismiss" ).on("click", function() 
            {
                setCookie('permission','dismiss', (180 * 24 * 60 * 60));
                setTimeout(function () {
                    (appEnv.params.slug == "/cookies-declined") ? document.location.href = appEnv.uri.home : document.location.href = appEnv.params.slug                    
                }, 1000);
            });
            jQuery( "#cookiedecline" ).on("click", function() 
            {
                deleteAllCookies();
                setCookie('permission','declined', 200);
                setTimeout(function () {
                   (appEnv.params.slug == "/cookies-declined") ? document.location.href = appEnv.uri.home : document.location.href = appEnv.params.slug
                }, 2000);
            });
        }
	}); 	
	</script>


	
		</div>			
			
	</body>
			</html>