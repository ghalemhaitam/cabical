/**
 * Contributed by Jean-Yves ORSSAUD, Rouen, France
 * And a litte help from an anonymous, er, helper
 */
;(function($) {
	if($("html").attr("lang")=='fr-FR')
	{
		$.extend($.fn.validate.messages, {
			required			: "Ce champ est requis.",
			email				: "Veuillez saisir une adresse mail valide.",
			url					: "Veuillez saisir une URL valide.",
			creditcard			: "Veuillez saisir un num�ro de carte de cr�dit valide.",
			date				: "Veuillez saisir une date valide.",
			datetime			: "Veuillez saisir une date/heure valide.(aaaa-mm-jjThh:mm:ssZ)",
			'datetime-local'	: "Veuillez saisir une date/heure locale valide.(aaaa-mm-jjThh:mm:ss)",
			time				: "Veuillez saisir une heure valide.",
			alphabetic			: "Veuillez ne saisir que des lettres.",
			alphanumeric		: "Veuillez ne saisir que des lettres, soulign� et chiffres.",
			color				: "Veuillez saisir une couleur valide. (nomm�e, hexadecimale ou rvb)",
			month				: "Veuillez saisir une ann�e et un mois. (ex.: 1974-03)",
			week				: "Veuillez saisir une ann�e et une semaine. (ex.: 1974-W43)",
			number				: "Veuillez saisir un nombre.(ex.: 12,-12.5,-1.3e-2)",
			integer				: "Veuillez saisir un nombre sans decimales.",
			zipcode				: "Veuillez saisir un code postal valide.",
			minlength			: "Veuillez saisir au moins {0} caract�res.",
			maxlength			: "Veuillez ne pas saisir plus de {0} caract�res.",
			min					: "Veuillez saisir une valeur sup�rieure ou �gale � {0}.",
			max					: "Veuillez saisir une valeur inf�rieure ou �gale � {0}.",
			mustmatch			: "Veuillez resaisir la m�me valeur.",
			captcha				: "Votre r�ponse ne correspond pas au texte de l'image. R�esayez.",
			personnummer		: "Veuillez saisir un personnummer valide. (aaaammjj-aaaa)",
			organisationsnummer	: "Veuillez saisir un organisationsnummer valide. (xxyyzz-aaaa)",
			ipv4				: "Veuillez saisir une adresse IP valide (version 4).",
			ipv6				: "Veuillez saisir une adresse IP valide (version 6).",
			tel					: "Veuillez saisir un num�ro de t�l�phone valide.",
			remote				: "Veuillez v�rifier ce champ." // ? why?
		});
	}
})(jQuery);
