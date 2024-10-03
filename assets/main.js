// Update consent on page load
document.addEventListener("DOMContentLoaded", function() {
	// Check for gtm-consent cookie
	cookieValue = (value_or_null = (document.cookie.match(/^(?:.*;)?\s*gtm-consent\s*=\s*([^;]+)(?:.*)?$/)||[,null])[1]);
	if ( cookieValue  !== null ) {
		if (cookieValue !== "rejected" ) {
			gtag('consent', 'update', {
				'ad_storage': 'granted',
				'ad_personalization': 'granted',
				'ad_user_data': 'granted',
				'analytics_storage': 'granted'
			});
		}else{
			gtag('consent', 'update', {
				'ad_storage': 'denied',
				'ad_personalization': 'denied',
				'ad_user_data': 'denied',
				'analytics_storage': 'denied'
			});
		}
	}else{
		if ( document.getElementById("gc-popup") != null ) { document.getElementById("gc-popup").classList.remove("d-none"); }
	}
});

// Update consent on click
function scriptAccept() {
	document.cookie = 'gtm-consent=accepted; path=/; max-age=604800';
	if ( document.getElementById("gc-popup") != null ) { document.getElementById("gc-popup").classList.add("d-none"); }
	if ( document.getElementById("gc-btn-box") != null) { document.getElementById("gc-btn-box").innerHTML = "<span class='py-2'><b>Consent preference updated.</b><span>"; }
	
	gtag('consent', 'update', {
		'ad_storage': 'granted',
		'ad_personalization': 'granted',
		'ad_user_data': 'granted',
		'analytics_storage': 'granted'
	});

	gtag('event', 'page_view');
}

function scriptReject() {
	document.cookie = 'gtm-consent=rejected; path=/; max-age=604800';
	if ( document.getElementById("gc-popup") != null ) { document.getElementById("gc-popup").classList.add("d-none"); }
	if ( document.getElementById("gc-btn-box") != null) { document.getElementById("gc-btn-box").innerHTML = "<span class='py-2'><b>Consent preference updated.</b><span>"; }

	gtag('consent', 'update', {
		'ad_storage': 'denied',
		'ad_personalization': 'denied',
		'ad_user_data': 'denied',
		'analytics_storage': 'denied'
	});
}