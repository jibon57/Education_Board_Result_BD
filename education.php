<?php
/**
* @author	Jibon Lawrence Costa
* @copyright Copyright (C) 2015, Jibon Lawrence Costa. All rights reserved.
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
$request = parse_url($_SERVER['REQUEST_URI']);
$result = rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $request["path"]), '');
$url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$result;
?>
<html>
<head>
<script src="jquery.js"></script>
</head>
<body>
<script type="text/javascript">
jQuery("document").ready(function(){
	var $ = jQuery;
	$("#submit").click(function(){
		var exam = $("#exam").val();
		var year = $("#year").val();
		var board = $("#board").val();
		var roll = $("#roll").val();
		var url = "<?php echo $url;?>helper.php?exam="+exam+"&year="+year+"&board="+board+"&roll="+roll;
		//console.log(url);
		$("#result").html("<img src='loading.gif' alt= 'loading...'?>");
		$.ajax({
			url: url,
			method: 'GET',
			crossDomain: true,
			cache: false
		}).done (function (msg){
			$.each(msg, function(key, val){
				//console.log(val[0]['results']);
				$("#result").html(val[0]['results']);
			});
		});
	});
});
</script>
<select name="exam" class="textfield05" id="exam" onchange="fd(this);">
                            <option value="">Select One</option>
                            <option value="jsc">JSC/JDC</option>
                            <option value="ssc">SSC/Dakhil</option>
							<option value="ssc_voc">SSC(Vocational)</option>
                            <option value="hsc">HSC/Alim</option>
							<option value="hsc_voc">HSC(Vocational)</option>
							<option value="hsc_hbm">HSC(BM)</option>
							<option value="hsc_dic">Diploma in Commerce</option>
							<option value="hsc_dibs">Diploma in Business Studies</option>
                          </select><br>
						  <select name="year" class="textfield05" id="year">
                            <option value="2015" selected="">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option>
                          </select><br>
						     <select name="board" class="textfield05" id="board">
                          <option value="" selected="">Select One</option>
						  <option value="barisal">Barisal</option>
						  <option value="chittagong">Chittagong</option>
						  <option value="comilla">Comilla</option>
                          <option value="dhaka">Dhaka</option>
						  <option value="dinajpur">Dinajpur</option>
						  <option value="jessore">Jessore</option>
                          <option value="rajshahi">Rajshahi</option>
                          <option value="sylhet">Sylhet</option>
                          <option value="madrasah">Madrasah</option>
						  <option value="tec">Technical</option>
						  <option value="dibs">DIBS(Dhaka)</option>
                          </select><br>
						   <input name="roll" class="textfield06" id="roll" maxlength="6" onkeypress="return onlyNumbers()" type="text">
<br>
<input name="Reset" id="button" value="Reset" type="reset">
                            <input name="button2" id="submit" value="Submit" type="submit">

                       
<div id="result">
</div>

</body>
</html>



