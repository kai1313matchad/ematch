
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
   Remove this if you use the .htaccess -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="initial-scale=1.0, target-densitydpi=device-dpi" /><!-- this is for mobile (Android) Chrome -->
<meta name="viewport" content="initial-scale=1.0, width=device-height"><!--  mobile Safari, FireFox, Opera Mobile  -->
<script src="<?php echo base_url();?>assets/libs/modernizr.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="../libs/flashcanvas.js"></script>
<![endif]-->
<style type="text/css">

	div {
		margin-top:1em;
		margin-bottom:1em;
	}
	input {
		padding: .5em;
		margin: .5em;
	}
	select {
		padding: .5em;
		margin: .5em;
	}
	
	#signatureparent {
		color:darkblue;
		background-color:darkgrey;
		/*max-width:600px;*/
		padding:20px;
	}
	
	/*This is the div within which the signature canvas is fitted*/
	#signature {
		border: 2px dotted black;
		background-color:lightgrey;
		*width: 70%;
	}

	@media(max-width: 767px) {
		#signature {
			width: 100%;
			min-height: 200px
		}
		canvas {
			min-height: 200px;
		}
	}

	/* Drawing the 'gripper' for touch-enabled devices */ 
	html.touch #content {
		float:left;
		width:92%;
	}
	html.touch #scrollgrabber {
		float:right;
		width:4%;
		margin-right:2%;
		background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAFCAAAAACh79lDAAAAAXNSR0IArs4c6QAAABJJREFUCB1jmMmQxjCT4T/DfwAPLgOXlrt3IwAAAABJRU5ErkJggg==)
	}
	html.borderradius #scrollgrabber {
		border-radius: 1em;
	}
	 
</style>
</head>
<body>
<div>
<div id="content">
	<div id="signatureparent2" style="">
		<div style="display: none;">jSignature inherits colors from parent element. Text = Pen color. Background = Background. (This works even when Flash-based Canvas emulation is used.)</div>
		
	</div>
	<div id="tools"></div>
	<div><p>Display Area:</p><div id="displayarea"></div></div>
</div>

<div id="signature"></div>

<div id="scrollgrabber"></div>
<button name="GetContents" onclick="GetCanvasContents()">Get contents</button>
</div>
<div id="hasil">
	
</div>
<div><button type="button" id="btnSave">Save</button></div>
<input type="text" id="hiddenSigData" name="hiddenSigData" />

<script src="<?php echo base_url();?>assets/libs/jquery.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/src/jSignature.js"></script>
<script src="<?php echo base_url();?>assets/src/plugins/jSignature.CompressorBase30.js"></script>
<script src="<?php echo base_url();?>assets/src/plugins/jSignature.CompressorSVG.js"></script>
<script src="<?php echo base_url();?>assets/src/plugins/jSignature.UndoButton.js"></script> 
<script src="<?php echo base_url();?>assets/src/plugins/signhere/jSignature.SignHere.js"></script> 
<script>
	function GetCanvasContents() {
	    // var datapair = $("#signature").jSignature("getData", "svgbase64")
	    var datapair = $("#signature").jSignature("getData", "image")

	    var i = new Image()
	    i.src = "data:" + datapair[0] + "," + datapair[1]
	    $(i).appendTo($("#displayarea"))
	    var SetImage = $("#frameDemo").contents();

	    alert(datapair);
	    // document.getElementById('hasil').innerHTML = '<img src="data:'+ datapair[1]+'"';
	    console.log(typeof(datapair));

	    // SendSignatureImage(SetImage);
	    // SendSignatureImage(datapair);
	    //Ajax Load data from ajax
	    $.ajax({
	        url : "<?php echo site_url('Test/insert')?>",
	        type: "POST",
	        data: {image: datapair},
	        success: function(data)
	        {
	            alert('Success!');
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error');
	        }
	    });
	}

	$('#btnSave').click(function(){
        var sigData = $('#signature').jSignature('getData','image');
        $('#hiddenSigData').val(sigData);

        $.post("<?php echo site_url('Test/insert')?>", { image : $("#hiddenSigData").val() }, null, "json")
	        .fail(
	            function(data) {
	                alert(data.errors);
	            })
	        .done(
	            function(data) {
	                alert(data.success);
	            })
	    ;
    });

	function SendSignatureImage(Image) {
	    ///######## SENDING THE INFORMATION BY AJAX
	    $.ajax({
	        type: "POST",             ///######## SEND TYPE
	        url: "<?php echo base_url('Test/insert');?>",   ///######## TARGET FILE TO RETRIEVE INFORMATION
	        data: {
	            'image': Image
	        },
	        ///######## IN CASE OF SUCCESS
	        success: function (response) {
	            if (response == "ok") {
	                alert("correct");
	            }
	            else {
	                alert("Response = " + response);
	            }
	        }
	        
	    }
	    );
	}
</script>
<script>
$(document).ready(function() {
	
	// This is the part where jSignature is initialized.
	var $sigdiv = $("#signature").jSignature({'UndoButton':true});

	
	
	// All the code below is just code driving the demo. 
	/*
	, $tools = $('#tools')
	, $extraarea = $('#displayarea')
	, pubsubprefix = 'jSignature.demo.'
	
	var export_plugins = $sigdiv.jSignature('listPlugins','export')
	, chops = ['<span><b>Extract signature data as: </b></span><select>','<option value="">(select export format)</option>']
	, name
	for(var i in export_plugins){
		if (export_plugins.hasOwnProperty(i)){
			name = export_plugins[i]
			chops.push('<option value="' + name + '">' + name + '</option>')
		}
	}
	chops.push('</select><span><b> or: </b></span>')
	
	$(chops.join('')).bind('change', function(e){
		if (e.target.value !== ''){
			var data = $sigdiv.jSignature('getData', e.target.value)
			$.publish(pubsubprefix + 'formatchanged')
			if (typeof data === 'string'){
				$('textarea', $tools).val(data)
			} else if($.isArray(data) && data.length === 2){
				$('textarea', $tools).val(data.join(','))
				$.publish(pubsubprefix + data[0], data);
			} else {
				try {
					$('textarea', $tools).val(JSON.stringify(data))
				} catch (ex) {
					$('textarea', $tools).val('Not sure how to stringify this, likely binary, format.')
				}
			}
		}
	}).appendTo($tools)

	
	$('<input type="button" value="Reset">').bind('click', function(e){
		$sigdiv.jSignature('reset')
	}).appendTo($tools)
	
	$('<div><textarea style="width:100%;height:7em;"></textarea></div>').appendTo($tools)
	
	$.subscribe(pubsubprefix + 'formatchanged', function(){
		$extraarea.html('')
	})

	$.subscribe(pubsubprefix + 'image/svg+xml', function(data) {

		try{
			var i = new Image()
			i.src = 'data:' + data[0] + ';base64,' + btoa( data[1] )
			$(i).appendTo($extraarea)
		} catch (ex) {

		}
		
		var message = [
			"If you don't see an image immediately above, it means your browser is unable to display in-line (data-url-formatted) SVG."
			, "This is NOT an issue with jSignature, as we can export proper SVG document regardless of browser's ability to display it."
			, "Try this page in a modern browser to see the SVG on the page, or export data as plain SVG, save to disk as text file and view in any SVG-capabale viewer."
           ]
		$( "<div>" + message.join("<br/>") + "</div>" ).appendTo( $extraarea )
	});

	$.subscribe(pubsubprefix + 'image/svg+xml;base64', function(data) {
		var i = new Image()
		i.src = 'data:' + data[0] + ',' + data[1]
		$(i).appendTo($extraarea)
		
		var message = [
			"If you don't see an image immediately above, it means your browser is unable to display in-line (data-url-formatted) SVG."
			, "This is NOT an issue with jSignature, as we can export proper SVG document regardless of browser's ability to display it."
			, "Try this page in a modern browser to see the SVG on the page, or export data as plain SVG, save to disk as text file and view in any SVG-capabale viewer."
           ]
		$( "<div>" + message.join("<br/>") + "</div>" ).appendTo( $extraarea )
	});
	
	$.subscribe(pubsubprefix + 'image/png;base64', function(data) {
		var i = new Image()
		i.src = 'data:' + data[0] + ',' + data[1]
		$('<span><b>As you can see, one of the problems of "image" extraction (besides not working on some old Androids, elsewhere) is that it extracts A LOT OF DATA and includes all the decoration that is not part of the signature.</b></span>').appendTo($extraarea)
		$(i).appendTo($extraarea)
	});
	
	$.subscribe(pubsubprefix + 'image/jsignature;base30', function(data) {
		$('<span><b>This is a vector format not natively render-able by browsers. Format is a compressed "movement coordinates arrays" structure tuned for use server-side. The bonus of this format is its tiny storage footprint and ease of deriving rendering instructions in programmatic, iterative manner.</b></span>').appendTo($extraarea)
	});

	if (Modernizr.touch){
		$('#scrollgrabber').height($('#content').height())		
	}
	*/
})
</script>
</body>
</html>
