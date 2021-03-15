Require Psalm etc.

TailwindCSS Theme:



.env

blade

css

postcss / tailwind





1) Define your fonts in tailwind.config.js

```json
theme: {
    fontFamily: {
        'sans': ['"Your Font"', 'ui-sans-serif', 'system-ui', ...],
                 'serif': ['Serif4You', 'Georgia', 'Cambria', ...],
        'mono': ['"For ur code"', 'SFMono-Regular', ...],
                 'display': ['Oswald'],
        'body': ['"Open Sans"'],
   	}
}
```

Don't forget to load the Fonts (e.g. Google Fonts???)



2) Define colors:



https://materialpalettes.com/

https://www.itsolutionstuff.com/post/laravel-6-crud-application-tutorialexample.html

http://preview.themeforest.net/item/avada-responsive-multipurpose-theme/full_screen_preview/2833226

https://tailwindcss.com/docs/customizing-colors

https://laravel.com/docs/8.x/mix -> .env -> mix -> tailwind -> blade

https://github.com/vendeka-nl/tailwind-config-php

https://gist.github.com/dillonchanis/7b76ae89d13b662eb44866f570da817b - Text Gradients (but not on SVGs...), maybe better to https://tailwindcss.com/docs/background-clip

- tui-primary (array)
- tui-secondary (array)
- tui-grey (array)
- tui-white (array)
- tui-black (array)
- tui-main
  - tui-main-header
  - tui-main-text
  - tui-main-bg
- tui-section
  - tui-section-header
  - tui-section-text 
  - tui-section-bg
- tui-design
  - tui-design-header
  - tui-design-text
  - tui-design-bg
- tui-cta
  - tui-cta-header
  - tui-cta-text
  - tui-cta-bg
- tui-info
- tui-success
- tui-warning
- tui-danger



- Themes
  - Deep Blue
  - Rainbow
  - Green Energy
  - Black & White
  - Stylist
  - Pedantic



```json
theme: {
    extend: {
        colors: {
              "primary": {
                "50": "#e4e8ed",
                "100": "#bac7d4",
                "200": "#8ea2b7",
                "300": "#647f9a",
                "400": "#426587",
                "500": "#174c77",
                "600": "#0e456f",
                "700": "#023c64",
                "800": "#003358",
                "900": "#012340"
              },
              "secondary": {
                "50": "#e9f5e9",
                "100": "#cae5c9",
                "200": "#a8d5a8",
                "300": "#86c585",
                "400": "#6db96c",
                "500": "#56ad53",
                "600": "#4d9e4a",
                "700": "#428c3f",
                "800": "#387b35",
                "900": "#265c24"
              }
          
            

            secondary: colors.cyan,

			'cta-button': '',
			'cta-text': '',
            
            success: '',
			warning: '',
            danger:	'',

            
            button: 
            
            'tui-base': {
                light: '#0460D9',
                DEFAULT: '#032859',
                dark: '#012340',
            },
            'tui-cta': '#428C3F',
            'tui-cta-text': '#ffffff',
        }
    }
},
```







TallUI VSCode:

+ tomphilbin.lodash-snippets
+ hridoy.animate-css, sofern Animate bleibt!
+ simonsiefke.prettier-vscode - macht nix besser in blade aber 5 sterne
+ apility.beautify-blade - macht nix besser in blade aber 5 sterne

- amirmarmul.laravel-blade-vscode - auch disabled? 5 sterne



TallUI ist eine UI für TALL



Features

- Responsive Website
- Login, User Profile, Teams (Jetstream), Roles (Spatie), 
- App, Dashboard
- Admin, Backend
  - User Management
  - Packages, Themes
  - Routes
  - CRUD, Pages, Blog, Comments



Packages

- TallUI Core
- TallUI Theme XXX
- TallUI Plugin XXX
- TallUI Component XXX
- TallUI Admin

Core

- Default Theme included, works out of the box (when views published or partials included)
- First Version without all the other stuff, just learn theming
- How to include CSS, Tailwind, Mix etc?
- Wenn eine fertige app.css da liegt ...
- How to include Layouts?



## dump the rest?



Write JS:

- Use Lodash - https://lodash.com/docs/
