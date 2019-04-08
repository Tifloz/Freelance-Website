$('form').form({
    fields: {
        firstName: {
            identifier: 'email',
            rules: [
                {
                    type: 'email',
                    prompt: 'Invalid email address'
                }
            ]
        },
        email: {
            identifier: 'password',
            rules: [
                {
                    type: 'empty',
                    prompt: 'Invalid password'
                }
            ]
        }
    },
    onSuccess: function(e) {
    }
});

$('.ui.checkbox')
    .checkbox()
;