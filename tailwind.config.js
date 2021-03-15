const defaultConfig = require('tailwindcss/defaultConfig');
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    important: true,
    purge: [
        'resources/views/**/*.blade.php',
        'resources/js/**/*.js',
    ],
    theme: {
        fontFamily: {
            'sans': ['Roboto', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', '"Helvetica Neue"', 'Arial', '"Noto Sans"', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"'],
            'serif': ['ui-serif', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
            'mono': ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
            'display': ['Oswald'],
            'body': ['"Open Sans"'],
        },
        extend: {
            colors: {
                cyan: colors.cyan,
                "tui-primary": {
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
                "tui-secondary": {
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
                },
                "tui-grey": {
                    "50": "#fbfbfb",
                    "100": "#f6f6f6",
                    "200": "#f1f1f1",
                    "300": "#e6e6e6",
                    "400": "#c3c3c3",
                    "500": "#a5a5a5",
                    "600": "#7b7b7b",
                    "700": "#676767",
                    "800": "#484848",
                    "900": "#262626"
                },
                "tui-main": "#003358",
                "tui-main-header": "#012340",
                "tui-main-text": "#000000",
                "tui-main-bg": "#bac7d4",
                "tui-section": "#484848",
                "tui-section-header": "#f6f6f6",
                "tui-section-text": "#ffffff",
                "tui-section-bg": "#f6f6f6",
                "tui-design": "#0460D9",
                "tui-design-header": "#0460D9",
                "tui-design-text": "#ffffff",
                "tui-design-bg": "#0460D9",
                "tui-cta": "#428C3F",
                "tui-cta-header": "#428C3F",
                "tui-cta-text": "#ffffff",
                "tui-cta-bg": "#e9f5e9",
                "tui-info": "#0460D9",
                "tui-success": "#428C3F",
                "tui-warning": "#FFC20E",
                "tui-danger": "#E71A19",
            }
        }
    },
    variants: {
        extend: {
            opacity: ['disabled'],
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ]
}
