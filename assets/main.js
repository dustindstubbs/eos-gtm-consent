function scriptAccept() {
	document.cookie = 'gtm-consent=accepted; path=/; max-age=604800';
	document.getElementById("sc-popup").classList.add("d-none");
	
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
	document.getElementById("sc-popup").classList.add("d-none");
}