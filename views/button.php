<?php
// Output the HTML that goes in your page where you want the ShareThis button(s) to appear. You can customize this view to have it show the way you want.
// Default output is individual buttons (because that's what I wanted in my site when I wrote the extension).
?>
<a id="ck_email" class="stbar chicklet" href="javascript:void(0);"><img src="http://w.sharethis.com/chicklets/email.gif" /></a>
<a id="ck_facebook" class="stbar chicklet" href="javascript:void(0);"><img src="http://w.sharethis.com/chicklets/facebook.gif" /></a>
<a id="ck_twitter" class="stbar chicklet" href="javascript:void(0);"><img src="http://w.sharethis.com/chicklets/twitter.gif" /></a>
<a id="ck_sharethis" class="stbar chicklet" href="javascript:void(0);"><img src="http://w.sharethis.com/chicklets/sharethis.gif" />ShareThis</a>
<script type="text/javascript">
	var shared_object = SHARETHIS.addEntry({
	title: document.title,
	url: document.location.href
});

shared_object.attachButton(document.getElementById("ck_sharethis"));
shared_object.attachChicklet("email", document.getElementById("ck_email"));
shared_object.attachChicklet("facebook", document.getElementById("ck_facebook"));
shared_object.attachChicklet("twitter", document.getElementById("ck_twitter"));
</script>
