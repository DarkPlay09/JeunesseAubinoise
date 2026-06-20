import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                background: '#f9f9f9',
                surface: '#f9f9f9',
                'surface-muted': '#F5F5F5',
                'surface-container': '#eeeeee',
                'surface-container-low': '#f3f3f4',
                'surface-variant': '#e2e2e2',
                'inverse-surface': '#2f3131',
                'on-background': '#1a1c1c',
                'on-surface': '#1a1c1c',
                secondary: '#5e5e5e',
                primary: '#005c99',
                'storm-blue': '#1C75BC',
                'safari-dark': '#121212',
                outline: '#717882',
                'outline-variant': '#c0c7d2',
            },
            fontFamily: {
                sans: ['Hanken Grotesk', ...defaultTheme.fontFamily.sans],
                display: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                container: '1280px',
            },
            spacing: {
                'margin-mobile': '20px',
                'margin-desktop': '64px',
                gutter: '24px',
            },
            borderRadius: {
                '2xl': '1.5rem',
                '3xl': '2rem',
            },
        },
    },
    plugins: [forms],
};
