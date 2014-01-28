function CallbackViewModel()
{
	var self = this;
	
	self.title = ko.observable();
	self.name = ko.observable('');
	self.name.message = ko.observable('');
	
	self.phoneNumber = ko.observable('');
	self.phoneNumber.message = ko.observable('');
	
	self.email = ko.observable('');
	self.email.message = ko.observable('');
	
	self.enquiry = ko.observable('');
	self.enquiry.message = ko.observable('');
	
	self.captcha = ko.observable('');
	self.captcha.message = ko.observable('');
	
	self.availableTitles = ko.observableArray(['Mr','Mrs','Miss','Dr']);
	
	self.reset = function() {
		self.title('Mr');
		self.name('');
		self.name.message('');
		
		self.phoneNumber('');
		self.phoneNumber.message('');
		
		self.email('');
		self.email.message('');
		
		self.enquiry('');
		self.enquiry.message('');
	}
	
	var validateField = function(field, text) {
		if(field() === '') {
			field.message(text);
			return false;
		}
		else {
			field.message('');
		}
		
		return true;
	}
	
	self.isValid = function() {
		var valid = true;
		
		valid = !validateField(self.name, 'Name is required') ? false : valid;
		valid = !validateField(self.phoneNumber, 'Phone number is required') ? false : valid;
		valid = !validateField(self.email, 'Email address is requried') ? false : valid;
		valid = !validateField(self.enquiry, 'Nature of enquiry is required') ? false : valid;
		
		return valid;		
	}
	
	self.sendEnquiry = function(data) {
		
		if(self.isValid()) {
			
			var target = jQuery('#callbackModal')[0];
			var spinner = new Spinner().spin(target);
			
			jQuery.ajax(callbackProperties.enquiryUrl, {
				data: ko.toJSON(data),
				type: 'post',
				contentType: "application/json",
				success:function(result){
					spinner.stop();
					var jsonResult = jQuery.parseJSON(result);
					
					console.info(result);
					
					if(jsonResult.status == 0) {
						self.reset();
						toastr.success('You request was submitted successfully','Success');
						jQuery('#callbackModal').modal('hide');
					}
					else if(jsonResult.status == 2) {
						for(var i=0;i<jsonResult.validationMessages.length;i++) {
							var field = jsonResult.validationMessages[i].field;
							var message = jsonResult.validationMessages[i].message;
							
							self[field].message(message);
						}
						toastr.error('Submitted data was invalid. Please correct it and try again','Error');
					}
					else {
						toastr.error('There was a problem submitting your request. Please try again later.','Error');	
					}
				},
				error:function(result) {
					spinner.stop();
					toastr.error('There was a problem submitting your request. Please try again later.');
				}
			});
		}
	}
}

jQuery(document).ready(function() {
	ko.applyBindings(new CallbackViewModel());
	ko.validation.registerExtenders();
	
	jQuery('.dropdown-submenu-toggle').mouseover(function(){
		var a = jQuery(this);
		var parent = a.parent();
		var drop = parent('.dropdown-menu');
		jQuery(this).parent()('.dropdown-menu').show();
	});
});

