$('form').form({
    fields: {
        email: {
            identifier: 'email',
            rules: [
                {
                    type: 'empty',
                    prompt: 'Empty email'
                },
                {
                    type: 'email',
                    prompt: 'Invalid email address'
                }
            ]
        },
        password: {
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