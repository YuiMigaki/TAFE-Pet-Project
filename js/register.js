// version1

function validateForm(e) {
    'use strict';

    // Get the event object:
	if (typeof e == 'undefined') e = window.event;

    // Get form references:
	var firstName = U.$('firstName');
	var lastName = U.$('lastName');
	var email = U.$('email');
	var phone = U.$('phone');
	var city = U.$('city');
	var state = U.$('state');
	var post = U.$('post');
	var messageSubject = U.$('messageSubject');
	var messageBody = U.$('messageBody');
	var terms = U.$('terms');

	// Flag variable:
		var correct = false;
	    var error = false;

	// Validate the first name:
	if (/^[A-Z \.\-']{2,20}$/i.test(firstName.value)) {
		removeErrorMessage('firstName', 'Please enter your first name.');
		addCorrectMessage('firstName', '✓');
		correct = true;
    } else {
		addErrorMessage('firstName', 'Please enter your first name.');
		removeCorrectMessage('firstName', '✓');
		error = true;
    }
	if (/^[A-Z \.\-']{2,20}$/i.test(lastName.value)) {
		removeErrorMessage('lastName', 'Please enter your last name.');
		addCorrectMessage('lastName', '✓');
		correct = true;
    } else {
		addErrorMessage('lastName', 'Please enter your last name.');
		removeCorrectMessage('lastName', '✓');
		error = true;
    }
	
	// Validate the email address:
	if (/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/.test(email.value)) {
		removeErrorMessage('email', 'Please enter your email address.');
		addCorrectMessage('email', '✓');
		correct = true;
} else {
		addErrorMessage('email', 'Please enter your email address.');
		removeCorrectMessage('email', '✓');
		error = true;
}
	
	// Validate the phone number:
		if (/^\d{2}[ \-\.]?\d{4}[ \-\.]?\d{4}$/.test(phone.value)) {
		removeErrorMessage('phone', 'Please enter your phone number.');
		addCorrectMessage('phone', '✓');
		correct = true;
} else {
		addErrorMessage('phone', 'Please enter your phone number.');
		removeCorrectMessage('phone', '✓');
		error = true;
}

// Validate the city:
if (/^[A-Z \.\-']{2,20}$/i.test(city.value)) {
	removeErrorMessage('city', 'Please enter your city');
	addCorrectMessage('city', '✓');
	correct = true;
} else {
	addErrorMessage('city', 'Please enter your city');
	removeCorrectMessage('city', '✓');
	error = true;
}
	
	// Validate the state:
	if (state.selectedIndex != 0) {
		removeErrorMessage('state',  'Please select your state.');
		addCorrectMessage('state', '✓');
		correct = true;
} else {
		addErrorMessage('state', 'Please select your state.');
		removeCorrectMessage('state', '✓');
		error = true;
}
	
	// Validate the post code:
	if (/^\d{4}(-\d{3})?$/.test(post.value)) {
		removeErrorMessage('post', 'Please enter your postcode.');
		addCorrectMessage('post', '✓');
		correct = true;
	} else {
		addErrorMessage('post', 'Please enter your post code.');
		removeCorrectMessage('post', '✓');
		error = true;
	}
	// Validate the message subject:
	if (/^[A-Z \.\-']{2,20}$/i.test(messageSubject.value)) {
		removeErrorMessage('messageSubject', 'Please enter message subject.');
		addCorrectMessage('messageSubject', '✓');
		correct = true;
    } else {
		addErrorMessage('messageSubject', 'Please enter message subject.');
		removeCorrectMessage('messageSubject', '✓');
		error = true;
    }
	// Validate the message body:
	if (/^[A-Z \.\-']{2,20}$/i.test(messageBody.value)) {
		removeErrorMessage('messageBody', 'Please enter message.');
		addCorrectMessage('messageBody', '✓');
		correct = true;
    } else {
		addErrorMessage('messageBody', 'Please enter message.');
		removeCorrectMessage('messageBody', '✓');
		error = true;
    }

    // If an error occurred, prevent the default behavior:
	if (error) {

		// Prevent the form's submission:
	    if (e.preventDefault) {
	        e.preventDefault();
	    } else {
	        e.returnValue = false;
	    }
	    return false;
    
	}
    
} // End of validateForm() function.

// Function called when the terms checkbox changes.
// Function enables and disables the submit button.
function toggleSubmit() {
	'use strict';
    
	// Get a reference to the submit button:
	var submit = U.$('submit');
	
	// Toggle its disabled property:
	if (U.$('terms').checked) {
		submit.disabled = false;
	} else {
		submit.disabled = true;
	}
	
} // End of toggleSubmit() function.

// Establish functionality on window load:
window.onload = function() {
    'use strict';

	// The validateForm() function handles the form:
    U.addEvent(U.$('theForm'), 'submit', validateForm);

	// Disable the submit button to start:
	U.$('submit').disabled = true;

	// Watch for changes on the terms checkbox:
    U.addEvent(U.$('terms'), 'change', toggleSubmit);

	// Enbable tooltips on the phone number:
	U.enableTooltips('phone');
	U.enableTooltips('post');

    
};