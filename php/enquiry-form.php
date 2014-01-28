<form class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-3 control-label" for="inputTitle">Title</label>
		<div class="col-sm-6">
			<select id="inputTitle" class="form-control" data-bind="options: availableTitles, value:title">
			</select>
		</div>
		<div class="col-sm-3"></div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label" for="inputName">Name</label>
		<div class="col-sm-6">
			<input id="inputName" class="form-control" type="text" data-bind="value: name">
		</div>
		<div class="col-sm-3">
			<span data-bind="text:name.message"></span>	
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label" for="inputPhone">Phone Number</label>
		<div class="col-sm-6">
			<input id="inputPhone" class="form-control" type="text" data-bind="value:phoneNumber"/>
		</div>
		<div class="col-sm-3">
			<span data-bind="text:phoneNumber.message"></span>	
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label" for="inputEmail">Email address</label>
		<div class="col-sm-6">
			<input id="inputEmail" class="form-control" type="email" data-bind="value:email"/>
		</div>
		<div class="col-sm-3">
			<span data-bind="text:email.message"></span>	
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label" for="inputEnquiry">Nature of Enquiry</label>
		<div class="col-sm-6">
			<textarea id="inputEnquiry" rows="4" class="form-control" data-bind="value:enquiry"></textarea>
		</div>
		<div class="col-sm-3">
			<span data-bind="text:enquiry.message"></span>
		</div>
	</div>
</form>