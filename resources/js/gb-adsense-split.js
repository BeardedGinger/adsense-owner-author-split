(function (window, document) {

	var ownerAboveAd = GINGERBEARD_CONTENT_ADS.owner_above_ad,
		ownerAboveWeight = GINGERBEARD_CONTENT_ADS.owner_above_weight,
		ownerBelowAd = GINGERBEARD_CONTENT_ADS.owner_below_ad,
		ownerBelowWeight = GINGERBEARD_CONTENT_ADS.owner_below_weight,
		authorAboveAd = GINGERBEARD_CONTENT_ADS.author_above_ad,
		authorBelowAd = GINGERBEARD_CONTENT_ADS.author_below_ad;

	var aboveAds = [ ownerAboveAd, authorAboveAd ],
		aboveAdWeights = [ ownerAboveWeight, 10-ownerAboveWeight ];

	var belowAds = [ ownerBelowAd, authorBelowAd ],
		belowAdWeights = [ ownerBelowWeight, 10-ownerBelowWeight ];

	aboveAdsSplit = new Array();
	belowAdsSplit = new Array();

	var aboveCount = 0,
		belowCount = 0;

	while(aboveCount<aboveAds.length) {
		for(i=0; i<aboveAdWeights[aboveCount]; i++ )
			aboveAdsSplit[aboveAdsSplit.length]=aboveAds[aboveCount]
		aboveCount++
	}

	while(belowCount<belowAds.length) {
		for(i=0; i<belowAdWeights[belowCount]; i++ )
			belowAdsSplit[belowAdsSplit.length]=belowAds[belowCount]
		belowCount++
	}


})(window, document);