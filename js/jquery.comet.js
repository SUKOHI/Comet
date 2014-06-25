/*  Dependency: jQuery  */

jQuery.extend({
	
	comet: {
		
		loadingFlag: false, 
		params: {}, 
		callbacks: {}, 
		lastUpdated: $.now(), 
		init: function(params, interval) {

			var comet = this;
			comet.callbacks.success = params.success;
			comet.callbacks.error = params.error;
			comet.params = params;
			comet.params.success = function(data, textStatus, jqXHR) {

				comet.loadingFlag = false;
				comet.callbacks.success(data, textStatus, jqXHR);
				comet.lastUpdated = $.now();
				
			};
			comet.params.error = function(jqXHR, textStatus, errorThrown) {

				comet.loadingFlag = false;
				comet.callbacks.error();
				comet.lastUpdated = $.now();
				
			};
			
			setInterval(function(){

				if(!comet.loadingFlag) {
					
					comet.loadingFlag = true;
					params.data['last_updated'] = comet.lastUpdated;
					$.ajax(comet.params, params.data);
					
				}
				
			}, interval);
			
		}
		
	}
	
});
