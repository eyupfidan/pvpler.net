var app = {
	baseUri : '',
	pageReload : function (){
		location.reload(true);
	},
	goPage : function(url){
		location.href =  url;
	},
	alertHide : function(){
		jQuery("body").on("click","[data-hide='alert']",function(){
			jQuery(this).parent(".alert").addClass("hide");
		});
	},

	init : function(baseUri){
		this.baseUri = baseUri;
		app.alertHide();
	}
};

