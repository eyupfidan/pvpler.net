var modal = function () {
	return {
		init: function (){
			modal.clickElement();
			modal.clearModalCache();
		},
		clickElement : function (){
			jQuery('body').on('click','.load-modal',function(e){
				e.preventDefault();
				var data = jQuery(this).data();
				var href = jQuery(this).attr('href');
				modal.loadModal(data,href);
				return false;
			})
		},
		loadModal :function (data,href){
			jQuery(data.target).find(".modal-content").load(href,function(responseTxt, statusTxt, xhr){
				if(data.form){
					form.submitForm();
				}
				//lastHref= href;
			});
			jQuery(data.target).modal();
			
			return false;
		},
		clearModalCache : function (){
		    jQuery('body').on('hidden.bs.modal', '#generalModal', function (event) {
		        jQuery(this).removeData('bs.modal').find('.modal-content').empty();
		    });
		}
	}
}();
modal.init();
