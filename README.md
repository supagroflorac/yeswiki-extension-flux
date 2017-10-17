# Flux
Extension pour YesWiki pour afficher un flux RSS/Atom

## Installation :
```sh
git clone https://github.com/supagroflorac/yeswiki-extension-flux.git [racine_du_wiki]/tools/flux
cd [racine_du_wiki]/tools/flux
composer install
```

Pour installer composer : https://getcomposer.org/download/

## Usage :
```
{{flux src='url_du_flux' template='nom_du_template' nb='Nombre d'élément a afficher'}}
```

Templates disponibles :
 - default
 - no-title (comme default mais sans le titre et le logo)
