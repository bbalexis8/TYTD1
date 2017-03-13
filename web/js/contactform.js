$(document).ready(function() {

    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nomU: {
                validators: {
                    stringLength: {
                        min: 2
                    },
                    notEmpty: {
                        message: 'Merci de taper votre nom'
                    }
                }
            },
            prenomU: {
                validators: {
                    stringLength: {
                        min: 2
                    },
                    notEmpty: {
                        message: 'Merci de taper votre prenom'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Merci de taper votre adresse email'
                    },
                    emailAddress: {
                        message: 'Merci de choisir une adresse email valide'
                    }
                }
            },
            addresse: {
                validators: {
                    stringLength: {
                        min: 5
                    },
                    notEmpty: {
                        message: 'Merci de taper votre adresse'
                    }
                }
            },
            ville: {
                validators: {
                    stringLength: {
                        min: 4
                    },
                    notEmpty: {
                        message: 'Merci de taper le nom de votre ville'
                    }
                }
            },
            pays: {
                validators: {
                    notEmpty: {
                        message: 'Merci de taper le nom de votre pays'
                    }
                }
            },
            codepostal: {
                validators: {
                    notEmpty: {
                        message: 'Merci de taper votre code postal'
                    }
                }
            },
            descriptionU: {
                validators: {
                    notEmpty: {
                        message: 'Merci de taper un message.'
                    }
                }
            }
        }
    })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow")
            $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});

