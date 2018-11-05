// get the country data from the plugin
var countryData = $.fn.intlTelInput.getCountryData(),
  telInput = $("#phone"),
  telCode = $("#cntrycode");

// init plugin
/*
telInput.intlTelInput({
  utilsScript: "Telebuild/js/utils.js" // just for formatting/placeholders etc
});
*/
telInput.intlTelInput({
	  initialCountry: "auto",
	  geoIpLookup: function(callback) {
		$.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
		  var countryCode = (resp && resp.country) ? resp.country : "";		 
		  callback(countryCode);
		});
	  },
	  utilsScript: "../Telebuild/js/utils.js" // just for formatting/placeholders etc
});
/*
// populate the country dropdown
$.each(countryData, function(i, country) {
  addressDropdown.append($("<option></option>").attr("value", country.iso2).text("+" + country.dialCode));
});
*/
// set it's initial value

var initialDialCode = telCode.val().replace(/\+/g,"");
if(initialDialCode!='') {
	$.each(countryData, function(i, country) {
		if(country.dialCode == initialDialCode) {
			telInput.intlTelInput("setCountry", country.iso2);
		}
	});	
	
} else {
var initialCountry = telInput.intlTelInput("getSelectedCountryData").iso2;
var initialDialCode = telInput.intlTelInput("getSelectedCountryData").dialCode;
telCode.val(initialDialCode);
}

// listen to the telephone input for changes
telInput.on("countrychange", function(e, countryData) {
  //addressDropdown.val(countryData.iso2);
  telCode.val(countryData.dialCode);
});
/*
// listen to the address dropdown for changes
addressDropdown.change(function() {
  telInput.intlTelInput("setCountry", $(this).val());
  telCode.val($(this).val());
});
*/