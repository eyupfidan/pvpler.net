var form = {
		/**
		 * jQuery Form Element
		 */
		element : null,
		/**
		 * Form Data
		 */
		data : null,
		/**
		 * Ajaxtan Gelen Cevabı Depolar
		 */
		response : null,
		/**
		 * Formu Valide Et Hata Varsa Göster Yok İse Submit Et
		 */
		validation : function(){
	        jQuery('.form-fv').formValidation({
	            framework: 'bootstrap',
	            locale : 'tr_TR',
	            icon: {
	                valid: 'glyphicon glyphicon-ok',
	                invalid: 'glyphicon glyphicon-remove',
	                validating: 'glyphicon glyphicon-refresh'
	            }
	        }).on('success.form.fv', function(e) { //Başarılı İse
	            e.preventDefault();
	            form.element = $(e.target); //jQuery Form
	            form.data = form.element.data();
	            //Summernote aktifse
	            if(form.data.summernote === true){
		            form.summernoteCode();
	            }
	            if(form.data.ckeditor === true){
		            form.ckCode();
	            }
	            form.submit() //formu submit et
	        }).on('err.validator.fv', function(e, data) { //Hata var ise
	           //Yalnız 1 hata mesajı göster
	            data.element
	                .data('fv.messages')
	                // Tüm mesajları gizle
	                .find('.help-block[data-fv-for="' + data.field + '"]').hide()
	                // Sadece geçerli mesajı göster
	                .filter('[data-fv-validator="' + data.validator + '"]').show();
	        });
		},
		/**
		 * Form submit
		 */
		submit :  function(){
			form.element.ajaxSubmit({
				cache : false,
				dataType : 'json',
				beforeSubmit: form.beforeSubmit,
				success : form.afterSubmit
			});
		},
		/**
		 * submit etmeden önce
		 */
		beforeSubmit : function(formData, jqForm, options){
			form.loadingBtn();
			return true;
		},
		/**
		 * Başarılı ile submit olursa
		 */
		afterSubmit : function(responseText, statusText, xhr, $form){
			form.response = responseText;
			form.showMessage(responseText.status,responseText.message)
			form.resetBtn();
			form.process();
		},
		/**
		 * Gelen mesajı göster
		 * @param type -> response status
		 * @param message -> response message
		 */
		showMessage :  function(status,message){
			//Alert divini bul ve temizle
			var alert = form.element.find(".alert");
			alert.removeClass("alert-success alert-danger");
			//Message divini bul ve temizle
			var messageDiv = alert.find(".message");
			messageDiv.html("");
			//Duruma göre sınıfı ekle
			if(status === "success"){
				alert.addClass("alert-success");
			}else{
				alert.addClass("alert-danger")
			}
			//Mesajı göster
			messageDiv.html(message);
			alert.removeClass("hide");
		},
		process : function (){
			var process = form.data.process;
			var response = form.response;
			if(typeof process !== 'undefined'){
				process = process.split(",");
				if(response.status === 'success'){
					for (i = 0; i < process.length; i++) { 
					    switch(process[i]){
					    	case 'reload':
					    		app.pageReload();
					    		break;
					    	case 'redirect':
					    		app.goPage(form.data.redirect);
					    		break;
					    	case 'responseRedirect':
					    		app.goPage(response.redirect);
					    		break;
					    	case 'hideBtn':
					    		form.hideBtn();
					    		form.element.attr('disabled','disabled');
					    		break;
					    	default:
					    }
					}
				}
			}
		},
		loadingBtn : function(){
			form.element.find('button[type="submit"]').button('loading');
		},
		resetBtn : function(){
			form.element.find('button[type="submit"]').button('reset');
		},
		hideBtn : function(){
			form.element.find('button[type="submit"]').eq(1).hide();
		},
		summernoteCode : function (){
			jQuery( ".summernote" ).each(function( index ) {
				  jQuery(this).val(jQuery(this).code());
			});
		},
		ckCode:function(){
			 for ( instance in CKEDITOR.instances ){
				 CKEDITOR.instances[instance].updateElement();
			 }  
		},
		init : function (){
			form.validation();
		}
}
form.init();