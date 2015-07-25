# sp_drupal_theme
Na drupal webu sedí root projektu ve složce sites/all/themes/pribehovymotiv. Autentické téma Drupalu, které řeší všechny potřebné customizace od preprocess funkcí až po stylopisy.

Obsahuje soubory:
		
		pribehovymotiv.info – soubor s definici a popisem tematu pro Drupal, definice regionu, zakladni soubor sablony.
		
		template.php – Obsahuje PHP preprocress funkce pro drupal, které se starají o drobné úpravy a overridy webu, občas to něco schovává nebo zobrazuje navíc  
		
		config.rb – nastavení pro sass->css preprocessor compass, je nutné pro překládání sass souborů použít toho nebo ekvivalentní nastavení!
		
	
	
Obsahuje složky:
		
		scss - zdrojové soubory stylopisu ve formátu scss, tyto je potřeba editovat, výsledný stylopis ve složce stylesheets je automaticky kompilován sass->css preprocessorem.
		
		stylesheets - výsledné stylopisy používané webem, zkompilované ze sass souborů.
		
		templates - obsahuje různé .tpl.php soubory, které určují strukturu stránek a obsahu, do těchto souborů se vkládají proměnné a výsledné šablony slouží k definici struktury webu od layoutu po styl některých polí.
		
		img - obrázky použité na webu resp. ve stylopisech, ikony, pozadí, přechody...
			icons - ikony k využtí na webu (TODO)
			menuIcons - Ikony použité v hlavním menu
			commentIcons - Ikony související s komentáři
			messageIcons - Ikony pro zprávy a komunikaci
		
		forum_pribehu - motiv pro modul fóra, obsahuje ikony a stylopisy.
