"use strict";

var FormValidator = function (form) {
    this.form = form;
    this.errorsMessage = this.form.find('.error-message');
    this.errors = [];
};

FormValidator.prototype.checkRequired = function () {
    var fields = $('[data-required]');
    var currentField, fieldName;

    // on boucle sur tous les champ qui possèdent l'attribut data-required
    for (var index = 0; index < fields.length; index++) {
        currentField = fields[index];
        fieldName = currentField.dataset.name;

        // si le champ est vide on créée un erreur
        if (currentField.value === "") {
            this.errors.push('Le champ <strong>' + fieldName + '</strong> est requis');
        }
    }

};

FormValidator.prototype.checkLength = function () {
    var fields, currentField, fieldName, length, index;

    // on boucle sur tous les champ qui possèdent l'attribut data-minLength
    fields = $('[data-minlength]');
    for (index = 0; index < fields.length; index++) {
        currentField = fields[index];                       // champ filtré
        fieldName = currentField.dataset.name;              // nom du champ filtré
        length = currentField.dataset.minlength;            // valeur de la longeur minimum

        if (currentField.value !== "" && currentField.value.length < length) {
            this.errors.push('Le champ <strong>' + fieldName + '</strong> doit faire au moins <strong>' + length + '</strong> caractère(s)');
        }
    }

    // on boucle sur tous les champ qui possèdent l'attribut data-maxLength
    fields = $('[data-maxlength]');
    for (index = 0; index < fields.length; index++) {
        currentField = fields[index];                       // champ filtré
        fieldName = currentField.dataset.name;              // nom du champ filtré
        length = currentField.dataset.maxlength;            // valeur de la longeur minimum

        if (currentField.value.length > length) {
            this.errors.push('Le champ <strong>' + fieldName + '</strong> doit faire au plus <strong>' + length + '</strong> caractère(s)');
        }
    }
};

FormValidator.prototype.checkType = function () {
    var fields, currentField, fieldName, fieldType, index, regex;

    fields = $('[data-type]');

    for (index = 0; index < fields.length; index++) {
        currentField = fields[index];                       // champ filtré
        fieldName = currentField.dataset.name;              // nom du champ filtré
        fieldType = currentField.dataset.type;              // type de champ filtré

        switch (fieldType) {

            case "positiveInteger":
                if (!isInteger(currentField.value) || parseInt(currentField.value) < 0)
                    this.errors.push('Le champ <strong>' + fieldName + '</strong> doit être un entier positif');
                break;

            case "email":
                // expression régulière pour identifier un email
                regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([\w]+\.)+[a-zA-Z]{2,}))$/;
                if (currentField.value.match(regex) === null)
                    this.errors.push('Le champ <strong>' + fieldName + '</strong> doit être un email valide');
                break;

            case "password":
                regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\-.$@!%*?&\s#])[\w\s\-.$@!%*?&#]*/;
                if (currentField.value.match(regex) === null)
                    this.errors.push('Le champ <strong>' + fieldName + '</strong> doit contenir au moins une lettre majuscule, minuscule, chiffre et caractère spécial.');
                break;
        }
    }
};


FormValidator.prototype.displayErrors = function () {
    /**
     * on veut remplacer le contenu de la zone d'erreur
     * 1. on commence par générer un <ul>
     * 2. on boucle sur les erreurs du formulaire
     * 3. à chaque erreur on créée un nouvel <li>
     * 4. une fois terminé on affiche ce bloc
     */
    var ul = $('<ul>');
    $.each(this.errors, function () {
        ul.append($('<li>').html(this))
    });
    this.errorsMessage.html(ul).fadeIn();
};

FormValidator.prototype.onSubmitForm = function (event) {
    this.errors = [];

    // vérification des différentes contraintes sur le formulaire
    this.checkRequired();
    this.checkType();
    this.checkLength();

    // Si des erreurs ont étées détectées sur la vérification du formulaire
    // on bloque son envoi au php (preventDefault) et on affiche les erreurs
    if (this.errors.length > 0) {
        // on empèche la soumission du formulaire
        event.preventDefault();

        // on affiche les erreurs
        this.displayErrors();
    }
};

FormValidator.prototype.init = function () {

    // lors de l'envoi du formulaire on lance la vérification
    this.form.submit(this.onSubmitForm.bind(this))

};