$('#addBusinessForm').validate({
    rules: {
        business_name: {
            required: true,
        },
        business_email: {
            required: true,
            email: true,
            validEmail: true
        },
        business_phone: {
            required: true,
            validPhone: true
        },
        business_logo: {
            required: true,
        },
    },
    messages: {
        business_name: {
            required: 'Please enter a valid Business name'
        },
        business_email: {
            required: 'Please enter a valid Business email',
            email: 'Not a valid email'
        },
        business_phone: {
            required: 'Please enter a valid Business phone'
        },
        business_logo: {
            required: 'Please select a valid Business logo'
        },
    },
    submitHandler: function (form) {
        form.submit()
    }
})

$('#addBranchForm').validate({
    rules: {
        branch_name: {
            required: true,
        },
        branch_image: {
            required: true,
        },
    },
    messages: {
        branch_name: {
            required: 'Please enter a valid Business name'
        },
        branch_image: {
            required: 'Please select atleast one branch image'
        },
    },
    submitHandler: function (form) {
        form.submit()
    }
})

jQuery.validator.addMethod(
    'validEmail',
    function (value, element) {
        return (
            this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(value)
            )
        },
    'Please enter a valid email address'
)
        
jQuery.validator.addMethod(
    'validPhone',
    function (value, element) {
        return (
            this.optional(element) || /[0-9]{10}/.test(value)
        )
        // if (value.length > $(element).attr('maxlength') || value.length < $(element).attr('maxlength')) {
        //     return false
        // }
        // return true
    },
    'Please enter a valid phone number'
)